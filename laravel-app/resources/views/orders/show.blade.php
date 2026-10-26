@extends('layouts.main')
@section('content')
    <h1>Order {{ $order->invoice_number }}</h1>
    <p>Customer: {{ $order->customer->name }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Process: {{ $order->process_name }}</p>
    <p>Process date: {{ $order->process_date }}</p>
    <p>Notes: {{ $order->notes }}</p>
    <h2>Products</h2>
    <ul>
        @forelse($order->details as $detail)
        <li>{{ $detail->product->name }} — {{ $detail->quantity }} × {{ $detail->unit_price }}</li>
        @empty<li>No products</li>
        @endforelse
    </ul>
    <h2>Evidence</h2>
    @forelse($order->photoEvidences as $photo)
    <p>{{ $photo->status }} — {{ $photo->created_at }}</p>
    <img src="{{ asset('storage/'.$photo->path) }}" alt="Evidence" style="max-width:350px">
    @empty<p>No photos</p>
    @endforelse
    <p>
    <a href="{{ route('orders.edit',$order) }}">Edit</a>
</p>
@endsection
