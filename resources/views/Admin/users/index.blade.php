@extends('layouts.app_admin')

@section('title', 'All Users')

@section('content')
<div id="right-panel" class="right-panel">

<div class="container">
    <h1 class="my-4" style="color: #9b7a52">All Users</h1>

            <!-- Add User Button -->
            <div class="mb-3">
                <a href="{{ route('admin.users.create') }}" class="btn text-light" style="background-color: #b18b5e">Add New User</a>
            </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" style="background-color: #b18b5e; color: white;">Search</button>
            </div>
        </div>
    </form>

    <!-- Users Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to delete this user? All their data will be lost!');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i> Delete
                      </button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
