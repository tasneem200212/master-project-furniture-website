@extends('layouts.app_admin')

@section('title', 'Inventory Index')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="mb-4" style="color: #9b7a52">Welcome to the Inventory Page</h1>

        <!-- Add New Product Button -->
        <a href="{{ route('admin.inventory.create') }}" class="btn text-white mb-4" style="background-color: #9b7a52">
            <i class="fas fa-plus-circle me-2"></i> Add New Product
        </a>

        <!-- Table for Inventory -->
        <div class="card shadow-sm mb-4">
            <div class="card-header" style="background-color: #f8f9fa;">
                <h4 class="mb-0">Inventory List</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead text-white" style="background-color: #9b7a52">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventoryItems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product->name }}</td>  
                                <td>{{ $item->stock_quantity }}</td>
                                <td>JD{{ number_format($item->product->price, 2) }}</td>  
                                <td>{{ $item->product->description ?? 'No description' }}</td>                              
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('admin.inventory.edit', $item->id) }}" 
                                           class="btn btn-sm btn-outline-primary rounded-start me-2"
                                           title="Edit">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        
                                        <form action="{{ route('admin.inventory.destroy', $item->id) }}" 
                                              method="POST" 
                                              class="delete-form d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger rounded-end"
                                                    title="Delete">
                                                <i class="fas fa-trash-alt me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                @if($inventoryItems->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $inventoryItems->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Confirm before deleting
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Tooltip initialization
        $('[title]').tooltip();
    });
</script>
@endsection
