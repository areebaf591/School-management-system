@extends('layouts.admin')

@section('content')
<h1>Pending Users</h1>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Assign Role</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <form action="{{ route('admin.approve_user', $user->id) }}" method="POST">
                @csrf
                <select name="role_id" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Approve</button>
            </form>
        </td>
        <td>
        <form action="{{ route('admin.users.reject', $user->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
        Reject
    </button>
</form>


@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-2">
        {{ session('success') }}
    </div>
@endif

        </td>
    </tr>
    @endforeach
</table>
@endsection
