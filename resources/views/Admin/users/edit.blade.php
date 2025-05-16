@extends('layouts.app_admin')

@section('title', 'Edit User')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 style="color: #b18b5e">Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (Leave blank to keep the current password)</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password if you want to change it">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Image (Optional)</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control">
            </div>

@if($user->profile_image)
<div class="form-group">
    <label for="current_image">Current Profile Image</label>
    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="img-fluid" width="150">
</div>
@endif


            <button type="submit" class="btn text-light" style="background-color: #b18b5e;">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ml-3">Cancel</a>

        </form>
    </div>
</div>
@endsection
