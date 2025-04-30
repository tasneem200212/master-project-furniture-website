@extends('layouts.app_admin')

@section('title', 'Admin Profile')

@section('content')
<div id="right-panel" class="right-panel pl-3">
<div class="container">
    <h1 class="my-4" style="color: #9b7a52">Admin Profile</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
        </div>
    
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
        </div>
    
<div class="form-group mt-3">
    <label for="profile_image">Profile Image</label>

    @if($admin->profile_image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Current Profile Image" class="img-thumbnail" style="max-width: 150px;">
        </div>
    @endif

    <input type="file" name="profile_image" id="profile_image" class="form-control">
</div>
    
        <button type="submit" class="btn my-3" style="background-color: #b18b5e; color: white;">Update Profile</button>
    </form>
    
</div>
</div>
@endsection
