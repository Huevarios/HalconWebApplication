<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Halcon</title>
        <style>body{font:16px Arial,sans-serif;max-width:1000px;margin:30px auto;padding:0 15px;color:#222}nav a{margin-right:16px}table{border-collapse:collapse;width:100%}td,th{border:1px solid #ccc;padding:9px;text-align:left}input,select,textarea{padding:7px;margin:5px 0;max-width:100%}label{display:block;margin-top:10px}button{padding:8px 14px;cursor:pointer}.error{color:#a00}.success{color:green}</style>
    </head>
    <body>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            @auth<a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('users.index') }}">Users</a>
                <a href="{{ route('orders.index') }}">Orders</a>
                <a href="{{ route('orders.archived') }}">Archived</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button>Logout</button>
                </form>
            @else<a href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
        <hr>
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <ul class="error">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @yield('content')
    </body>
</html>
