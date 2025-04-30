@extends('layouts.app_admin')

@section('title', 'Add New Product')

@section('content')
<div id="right-panel" class="right-panel">

<div class="container">
    <h1 class="my-4">Add New Product</h1>

    <!-- Add Product Form -->
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required minlength="3">
        </div>

        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Enter product description" required minlength="10"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Product Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" required min="0">
        </div>

        <div class="form-group">
            <label for="category_id">Product Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- New Fields for additional product details -->
        <div class="form-group">
            <label for="weight">Product Weight (kg)</label>
            <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter product weight">
        </div>

        <div class="form-group">
            <label for="dimensions">Product Dimensions (LxWxH)</label>
            <input type="text" class="form-control" id="dimensions" name="dimensions" placeholder="Enter product dimensions">
        </div>

        <div class="form-group">
            <label for="color">Product Color</label>
            <input type="text" class="form-control" id="color" name="color" placeholder="Enter product color">
        </div>

        <div class="form-group">
            <label for="size">Product Size</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="Enter product size">
        </div>

        <div class="form-group">
            <label for="model">Product Model</label>
            <input type="text" class="form-control" id="model" name="model" placeholder="Enter product model">
        </div>

        <div class="form-group">
            <label for="shipping">Shipping Information</label>
            <textarea class="form-control" id="shipping" name="shipping" placeholder="Enter shipping information"></textarea>
        </div>

        <div class="form-group">
            <label for="care_info">Care Information</label>
            <textarea class="form-control" id="care_info" name="care_info" placeholder="Enter care instructions"></textarea>
        </div>

        <div class="form-group">
            <label for="brand">Product Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter product brand">
        </div>

        <div class="form-group">
            <label for="discount_id">Discount</label>
            <select class="form-control" id="discount_id" name="discount_id">
                <option value="">Select Discount (optional)</option>
                @foreach($discounts as $discount)
                    <option value="{{ $discount->id }}" {{ old('discount_id') == $discount->id ? 'selected' : '' }}>
                        {{ $discount->discount_percentage }}%
                    </option>
                @endforeach
            </select>
        </div>
        


        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn my-3" style="background-color: #9b7a52; color: white;">Add Product</button>
        </div>

        <span id="image-error" style="color: red; display: none;">Please upload a valid image file (jpeg, png, jpg, gif) with size under 2MB.</span>

    </form>


    <script>
        document.querySelector('form').addEventListener('submit', function(event){
            var price =document.getElementById('price').value;
            if(price<=0){
                alert("Price must be a positive number!");
                event.preventDefault();
            }

            let images = document.getElementById('images').files;
            let valid = true;
            let errorMessage = document.getElementById('image-error');

            errorMessage.style.display = 'none';

            for (let i = 0; i < images.length; i++) {
                let image = images[i];

                if (!['image/jpeg', 'image/png', 'image/jpg', 'image/gif'].includes(image.type)) {
                valid = false;
                errorMessage.style.display = 'block'; // عرض رسالة الخطأ
                break;
            }

            if (image.size > 2 * 1024 * 1024) { // 2MB
                valid = false;
                errorMessage.style.display = 'block'; // عرض رسالة الخطأ
                break;
            }
        }
        if (!valid) {
            event.preventDefault();
        }
        })
    </script>
</div>
</div>
@endsection
