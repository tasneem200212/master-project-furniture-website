@extends('layouts.app_admin')

@section('title', 'Add Inventory')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="mb-4" style="color: #9b7a52">Add New Product to Inventory</h1>

        <!-- Add Product Form -->
        <div class="card shadow-sm mb-4">
            <div class="card-header" style="background-color: #f8f9fa;">
                <h4 class="mb-0">Add Product to Inventory</h4>
            </div>
            <div class="card-body">
                <form id="inventoryForm" action="{{ route('admin.inventory.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="product_id">Product</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <option value="">Select a Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div id="product_error" class="text-danger" style="display:none;">Please select a product.</div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="stock_quantity">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}" required>
                        <div id="quantity_error" class="text-danger" style="display:none;">Please enter a valid quantity greater than 0.</div>
                    </div>

                    <button type="submit" class="btn text-white" style="background-color: #9b7a52">Add to Inventory</button>
                    <a href="{{ route('admin.inventory.index') }}" class="btn btn-secondary ml-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inventoryForm').addEventListener('submit', function(event) {
        let isValid = true;

        document.getElementById('product_error').style.display = 'none';
        document.getElementById('quantity_error').style.display = 'none';

        const productSelect = document.getElementById('product_id');
        if (productSelect.value === "") {
            document.getElementById('product_error').style.display = 'block';
            isValid = false;
        }

        const quantityInput = document.getElementById('stock_quantity');
        if (quantityInput.value === "" || quantityInput.value <= 0) {
            document.getElementById('quantity_error').style.display = 'block';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

@endsection
