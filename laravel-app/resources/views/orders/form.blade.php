@extends('layouts.main')
@section('content')
    <h1>{{ $order->exists?'Edit order':'Create order' }}</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ $order->exists?route('orders.update',$order):route('orders.store') }}">
        @csrf
        @if($order->exists)
            @method('PUT')
        @endif
        <label>Invoice number <input name="invoice_number" value="{{ old('invoice_number',$order->invoice_number) }}" required>
        </label>
        <label>Customer <select name="customer_id" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('customer_id',$order->customer_id)==$customer->id?'selected':'' }}>{{ $customer->name }} ({{ $customer->customer_number }})
            </option>
        @endforeach
    </select>
</label>
<label>Status <select name="status">
    @foreach(['Ordered','In Process','In Route','Delivered'] as $status)
        <option value="{{ $status }}" {{ old('status',$order->status)==$status?'selected':'' }}>{{ $status }}</option>
    @endforeach
</select>
</label>
<label>Process name <input name="process_name" value="{{ old('process_name',$order->process_name) }}">
</label>
<label>Process date <input type="datetime-local" name="process_date" value="{{ old('process_date',$order->process_date?$order->process_date->format('Y-m-d\\TH:i'):'') }}">
</label>
<label>Notes <textarea name="notes">{{ old('notes',$order->notes) }}</textarea>
</label>
<h3>Add product (optional)
</h3>
<label>Product <select name="product_id">
    <option value="">None</option>
    @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
    @endforeach
</select>
</label>
<label>Quantity <input type="number" name="quantity" min="1" value="1">
</label>
<label>Photo evidence (In Route or Delivered only) <input type="file" name="photo" accept="image/*" capture="environment">
</label>
<button>Save</button>
</form>
@endsection
