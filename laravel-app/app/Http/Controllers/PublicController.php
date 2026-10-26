<?php
namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
class PublicController extends Controller 
{
    public function index(Request $request)
    {
        $order=null;
        if($request->filled('invoice_number'))
        {
            $request->validate(['invoice_number'=>'required|string|max:255']);
            $order=Order::with('photoEvidences')->where('invoice_number',$request->invoice_number)->first();
        }
        return view('public.home',compact('order'));
    }
}
