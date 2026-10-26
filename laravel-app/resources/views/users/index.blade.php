@extends('layouts.main')
@section('content')
    <h1>Users</h1>
    <p>
    <a href="{{ route('users.create') }}">Create user</a>
</p>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ optional($user->role)->name }}</td>
            <td>{{ $user->is_active?'Active':'Inactive' }}</td>
            <td>
            <a href="{{ route('users.edit',$user) }}">Edit</a>
        </td>
    </tr>
@endforeach
</table>{{ $users->links() }}
@endsection
