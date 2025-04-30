<!-- resources/views/admin/categories/create.blade.php -->

@extends('layouts.app_admin')

@section('title', 'Create New Category')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1>Create New Category</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
</div>
@endsection
