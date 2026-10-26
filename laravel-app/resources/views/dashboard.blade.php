@extends('layouts.main')
@section('content')
    <h1>Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}.</p>
    <ul>
        <li>
        <a href="{{ route('users.index') }}">Manage users</a>
    </li>
    <li>
    <a href="{{ route('orders.index') }}">Manage orders</a>
</li>
<li>
<a href="{{ route('orders.archived') }}">Archived orders</a>
</li>
</ul>
@endsection
