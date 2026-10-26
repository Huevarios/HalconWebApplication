@extends('layouts.main')
@section('content')
    <h1>Orders</h1>
    <p>
    <a href="{{ route('orders.create') }}">Create order</a>
</p>
<table>
    <tr>
        <th>Invoice</th>
        <th>Customer</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->invoice_number }}</td>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
            <a href="{{ route('orders.show',$order) }}">View</a> | <a href="{{ route('orders.edit',$order) }}">Edit</a> <form method="POST" action="{{ route('orders.destroy',$order) }}" style="display:inline" onsubmit="return confirm('Archive this order?')">
            @csrf
            @method('DELETE')
            <button>Archive</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
