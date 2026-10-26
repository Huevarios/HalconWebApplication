@extends('layouts.main')
@section('content')
    <h1>Login</h1>
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <label>Email <input type="email" name="email" value="{{ old('email') }}" required>
        </label>
        <label>Password <input type="password" name="password" required>
        </label>
        <button>Login</button>
    </form>
@endsection
