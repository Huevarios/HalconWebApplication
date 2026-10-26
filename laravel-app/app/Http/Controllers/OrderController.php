<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Product;
use App\OrderDetail;
use App\PhotoEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::with('customer')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('orders.form', [
            'order' => new Order,
            'customers' => Customer::all(),
            'products' => Product::all()
        ]);
    }

    private function validated(Request $request, $id = null)
    {
        $rules = [
            'invoice_number' => 'required|string|max:255|unique:orders,invoice_number' . ($id ? ',' . $id : ''),
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:Ordered,In Process,In Route,Delivered',
            'process_name' => 'nullable|string|max:255',
            'process_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'required_with:product_id|nullable|integer|min:1',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
        ];

        return $request->validate($rules);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        DB::transaction(function () use ($request, $data) {
            $order = Order::create(
                collect($data)->except(['photo', 'product_id', 'quantity'])->all()
                + ['created_by' => auth()->id()]
            );

            if (!empty($data['product_id'])) {
                $p = Product::findOrFail($data['product_id']);

                $order->details()->create([
                    'product_id' => $p->id,
                    'quantity' => $data['quantity'],
                    'unit_price' => $p->price
                ]);
            }

            $this->savePhoto($request, $order);
        });

        return redirect()->route('orders.index')
            ->with('success', 'Order created.');
    }

    public function show(Order $order)
    {
        $order->load('customer', 'creator', 'details.product', 'photoEvidences');

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.form', [
            'order' => $order,
            'customers' => Customer::all(),
            'products' => Product::all()
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $data = $this->validated($request, $order->id);

        DB::transaction(function () use ($request, $data, $order) {
            $order->update(
                collect($data)->except(['photo', 'product_id', 'quantity'])->all()
            );

            if (!empty($data['product_id'])) {
                $p = Product::findOrFail($data['product_id']);

                $order->details()->create([
                    'product_id' => $p->id,
                    'quantity' => $data['quantity'],
                    'unit_price' => $p->price
                ]);
            }

            $this->savePhoto($request, $order);
        });

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order updated.');
    }

    private function savePhoto(Request $request, Order $order)
    {
        if (!$request->hasFile('photo')) {
            return;
        }

        if (!in_array($order->status, ['In Route', 'Delivered'])) {
            return;
        }

        $path = $request->file('photo')->store('evidence', 'public');

        $order->photoEvidences()->create([
            'user_id' => auth()->id(),
            'status' => $order->status,
            'path' => $path
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order archived.');
    }

    public function archived()
    {
        return view('orders.archived', [
            'orders' => Order::onlyTrashed()
                ->with('customer')
                ->latest('deleted_at')
                ->get()
        ]);
    }

    public function restore($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('orders.archived')
            ->with('success', 'Order restored.');
    }
}
