@extends('layouts.app_admin')

@section('title', 'Create New Category')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container py-4">
        <div class="card shadow-sm" style="border-radius: 10px; border: none;">
            <div class="card-header py-3" style="background: linear-gradient(135deg, #b18b5e 0%, #d4b483 100%);">
                <h4 class="mb-0 text-white">
                    <i class="fas fa-plus-circle mr-2"></i> Create New Category
                </h4>
            </div>
            
            <div class="card-body p-4" style="background-color: #f8f9fa;">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="name" class="font-weight-bold mb-3" style="color: #5a4a3a; font-size: 1.05rem;">
                            <i class="fas fa-tag mr-2"></i> Category Name
                        </label>
                        <input type="text" name="name" id="name" class="form-control p-3" 
                               placeholder="Enter category name" required
                               style="border: 2px solid #d1c7b7; border-radius: 6px; 
                                      background-color: white; color: #5a4a3a;
                                      box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <small class="form-text d-block mt-2" style="color: #6c757d;">
                            <i class="fas fa-info-circle mr-1"></i> Enter a unique name for the new category
                        </small>
                    </div>

                    <div class="d-flex justify-content-end align-items-center pt-3 border-top">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light px-4 py-2 mr-3" 
                           style="border: 1px solid #b18b5e; color: #b18b5e;">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </a>
                        <button type="submit" class="btn px-4 py-2 text-white" 
                                style="background: linear-gradient(135deg, #b18b5e 0%, #d4b483 100%); 
                                       border: none; transition: all 0.3s;">
                            <i class="fas fa-save mr-2"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .form-control:focus {
        border-color: #b18b5e !important;
        box-shadow: 0 0 0 0.2rem rgba(177, 139, 94, 0.25) !important;
        outline: none;
    }
    .btn-light:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection