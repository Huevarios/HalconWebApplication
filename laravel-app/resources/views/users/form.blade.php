@extends('layouts.main')
@section('content')
    <h1>{{ $user->exists?'Edit user':'Create user' }}</h1>
    <form method="POST" action="{{ $user->exists?route('users.update',$user):route('users.store') }}">
        @csrf
        @if($user->exists)
            @method('PUT')
        @endif
        <label>Name <input name="name" value="{{ old('name',$user->name) }}" required>
        </label>
        <label>Email <input type="email" name="email" value="{{ old('email',$user->email) }}" required>
        </label>
        <label>Password {{ $user->exists?'(leave blank to keep current)':'' }} <input type="password" name="password" {{ $user->exists?'':'required' }}>
        </label>
        <label>Role <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id',$user->role_id)==$role->id?'selected':'' }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </label>
    <label>Status <select name="is_active">
        <option value="1" {{ old('is_active',$user->exists?$user->is_active:1)==1?'selected':'' }}>Active</option>
        <option value="0" {{ (string) old('is_active',$user->exists ? $user->is_active : 1) === '0'?'selected':'' }}>Inactive</option>
    </select>
</label>
<button>Save</button>
</form>
@endsection
