@extends('layouts.main')
@section('content')
    <h1>Archived orders</h1>
    <table>
        <tr>
            <th>Invoice</th>
            <th>Customer</th>
            <th>Archived on</th>
            <th>Action</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->invoice_number }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->deleted_at }}</td>
                <td>
                <form method="POST" action="{{ route('orders.restore',$order->id) }}">
                    @csrf
                    <button>Restore</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
