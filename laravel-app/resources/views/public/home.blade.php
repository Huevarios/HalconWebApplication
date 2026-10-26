@extends('layouts.main')
@section('content')
    <h1>Halcon Order Tracking</h1>
    <form method="GET" action="{{ route('home') }}">
        <label>Invoice number <input name="invoice_number" value="{{ request('invoice_number') }}" required>
        </label>
        <button>Search</button>
    </form>
    @if(request()->filled('invoice_number'))
        @if($order)
            <h2>Invoice {{ $order->invoice_number }}</h2>
            <p>Status: {{ $order->status }}</p>
            @if($order->status==='Delivered')
                @php $photo=$order->photoEvidences->where('status','Delivered')->last();
                @endphp
                @if($photo)
                    <img src="{{ asset('storage/'.$photo->path) }}" alt="Delivery evidence" style="max-width:450px">
                @else<p>Delivery photograph not yet available.</p>
                @endif
            @else<p>Process: {{ $order->process_name ?: $order->status }}</p>
                <p>Date: {{ $order->process_date ? $order->process_date->format('Y-m-d H:i') : 'Not specified' }}</p>
            @endif
        @else<p>Invoice not found.</p>
        @endif
    @endif
@endsection
