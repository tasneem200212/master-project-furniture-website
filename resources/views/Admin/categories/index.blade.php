<!-- resources/views/admin/categories/index.blade.php -->

@extends('layouts.app_admin')

@section('title', 'All Categories')

@section('content')
<div id="right-panel" class="right-panel pb-3">
<div class="container">
    <h1 class="my-4" style="color: #b18b5e">All Categories</h1>

            <!-- Add Category Button -->
            <div class="mb-3">
                <a href="{{ route('admin.categories.create') }}" class="btn text-light" style="background-color: #b18b5e">Add New Product</a>
            </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <!-- Add actions like Edit, Delete -->
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
