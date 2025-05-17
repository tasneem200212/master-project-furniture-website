@extends('layouts.app')

@section('title','Ecommerce Furniture')

@section('content')
<!-- Body main wrapper start -->
<main>
    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
        <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg-furniture.jpg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-12">
                    <div class="breadcrumb__wrapper text-center">
                        <h2 class="breadcrumb__title">Product</h2>
                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li>
                                        <span>
                                            <a href="{{route('Pro.index')}}">Home</a>
                                        </span>
                                    </li>
                                    <li>
                                        <span>Product</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->
    <!-- Product area start -->
    <section class="bd-product__area section-space">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="bd-product__result mb-30">
                        <h4>{{ $products->count() }} Item{{ $products->count() !== 1 ? 's' : '' }} On List</h4>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6">
                    <div class="product__filter-wrapper d-flex flex-wrap gap-3 align-items-center justify-content-md-end mb-30">
                        <div class="bd-product__filter-btn d-lg-none">                         
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas">
                                <i class="fa-solid fa-filter"></i>
                                Filter
                            </button>
                        </div>
                        
                        <div class="d-none d-lg-block">
                            <div class="filter-section bg-light p-3 rounded shadow-sm">
                                <form method="GET" action="{{ route('product.show') }}" class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="filter-group">
                                            <label class="filter-label">Categories</label>
                                            <div class="filter-options btn-group">
                                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ request('category_id') ? $categories->firstWhere('id', request('category_id'))->name ?? 'Select Category' : 'All Categories' }}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('product.show', array_merge(request()->except('category_id', 'page'))) }}">All Categories</a></li>
                                                    @foreach ($categories as $category)
                                                        <li>
                                                            <a class="dropdown-item {{ request('category_id') == $category->id ? 'active' : '' }}" 
                                                               href="{{ route('product.show', array_merge(request()->except('page'), ['category_id' => $category->id])) }}">
                                                                {{ $category->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-auto">
                                        <div class="filter-group">
                                            <label class="filter-label">Price Range</label>
                                            <div class="filter-options btn-group">
                                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @php
                                                        $priceText = 'All Prices';
                                                        if (request('price') == 'under50') $priceText = 'Under JD50';
                                                        elseif (request('price') == '50to100') $priceText = 'JD50 - JD100';
                                                        elseif (request('price') == '100to200') $priceText = 'JD100 - JD200';
                                                        elseif (request('price') == 'above200') $priceText = 'Above JD200';
                                                    @endphp
                                                    {{ $priceText }}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('product.show', array_merge(request()->except('price', 'page'))) }}">All Prices</a></li>
                                                    <li><a class="dropdown-item {{ request('price') == 'under50' ? 'active' : '' }}" 
                                                           href="{{ route('product.show', array_merge(request()->except('page'), ['price' => 'under50'])) }}">Under JD50</a></li>
                                                    <li><a class="dropdown-item {{ request('price') == '50to100' ? 'active' : '' }}" 
                                                           href="{{ route('product.show', array_merge(request()->except('page'), ['price' => '50to100'])) }}">JD50 - JD100</a></li>
                                                    <li><a class="dropdown-item {{ request('price') == '100to200' ? 'active' : '' }}" 
                                                           href="{{ route('product.show', array_merge(request()->except('page'), ['price' => '100to200'])) }}">JD100 - JD200</a></li>
                                                    <li><a class="dropdown-item {{ request('price') == 'above200' ? 'active' : '' }}" 
                                                           href="{{ route('product.show', array_merge(request()->except('page'), ['price' => 'above200'])) }}">Above JD200</a></li>
                                                </ul>                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if(request('category_id') || request('price'))
                                        <div class="col-auto">
                                            <a href="{{ route('product.show') }}" class="btn btn-outline-danger">
                                                <i class="fas fa-times"></i> Clear Filters
                                            </a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="header-search">
                                    <form method="GET" action="{{ route('product.show') }}">
                                        <input type="text" name="query" placeholder="Search products..." value="{{ request('query') }}">
                                        <button type="submit">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.4443 13.4445L16.9999 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.2222 8.11111C15.2222 12.0385 12.0385 15.2222 8.11111 15.2222C4.18375 15.2222 1 12.0385 1 8.11111C1 4.18375 4.18375 1 8.11111 1C12.0385 1 15.2222 4.18375 15.2222 8.11111Z" stroke="white" stroke-width="2" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
            <div class="row">
                <div class="col-xxl-12">
                    <div class="product__filter-tab">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row g-5">
                                    @foreach ($products as $product)
                                    <div class="col-xxl-3 col-xl-3 col-md-6 col-sm-6 d-flex">
                                        <div class="product-item w-100">
                                            @if($product->discount && $product->discount->discount_percentage > 0)
                                            <div class="product-badge">
                                                <span class="fo-discount">GET {{ round($product->discount->discount_percentage) }}% OFF</span>
                                            </div>
                                        @endif
                                            <div class="product-thumb">
                                                <a href="{{ route('product-details', $product->id) }}">
                                                    @if ($product->productImages->isNotEmpty())
                                                        <img src="{{ asset('storage/' . $product->productImages->first()->image_path) }}" alt="{{ $product->name }}" class="img-fluid">
                                                    @else
                                                        <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image" class="img-fluid">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-tag">
                                                    <span class="badge" style="text-align: left">{{ $product->category->name ?? 'No Category' }}</span>
                                                </div>
                                                <h4 class="product-title">
                                                    <a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                </h4>
                                                <div class="product-price">
                                                    @if($product->discount && $product->discount->discount_percentage > 0)
                                                        @php
                                                            $oldPrice = $product->price / (1 - $product->discount->discount_percentage / 100);
                                                        @endphp
                                                        <span class="product-old-price">
                                                            <del>JD{{ number_format($oldPrice, 2) }}</del>
                                                        </span>
                                                    @endif
                                                    <span class="product-new-price">JD{{ number_format($product->price, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row g-5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="bd-basic__pagination mt-50 d-flex align-items-center justify-content-center">
                    <nav>
                        <ul>
                            @if ($products->onFirstPage())
                                <li class="disabled">
                                </li>
                            @else
                                <li>
                                    <a href="{{ $products->previousPageUrl() }}">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>
                            @endif
                
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                @if ($page == $products->currentPage())
                                    <li>
                                        <span class="current">{{ $page }}</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                
                            @if ($products->hasMorePages())
                                <li>
                                    <a href="{{ $products->nextPageUrl() }}">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $products->nextPageUrl() }}">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Product area end -->

    <!-- Mobile Filter Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filterOffcanvasLabel">Filter Products</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="GET" action="{{ route('product.show') }}">
                <!-- Category Filter Mobile -->
                <div class="mb-4">
                    <h6 class="mb-3">Categories</h6>
                    <div class="list-group">
                        <a href="{{ route('product.show', array_merge(request()->except('category_id', 'page'))) }}" 
                           class="list-group-item list-group-item-action {{ !request('category_id') ? 'active' : '' }}">
                            All Categories
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ route('product.show', array_merge(request()->except('page'), ['category_id' => $category->id])) }}" 
                               class="list-group-item list-group-item-action {{ request('category_id') == $category->id ? 'active' : '' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Price Filter Mobile -->
                <div class="mb-4">
                    <h6 class="mb-3">Price Range</h6>
                    <div class="list-group">
                        <a href="{{ route('product.show', array_merge(request()->except('price', 'page'))) }}" 
                           class="list-group-item list-group-item-action {{ !request('price') ? 'active' : '' }}">
                            All Prices
                        </a>
                        <a href="{{ route('product.show', array_merge(request()->except('page'), ['price' => 'under50'])) }}" 
                           class="list-group-item list-group-item-action {{ request('price') == 'under50' ? 'active' : '' }}">
                            Under JD50
                        </a>
                        <a href="{{ route('product.show', array_merge(request()->except('page'), ['price' => '50to100'])) }}" 
                           class="list-group-item list-group-item-action {{ request('price') == '50to100' ? 'active' : '' }}">
                            JD50 - JD100
                        </a>
                        <a href="{{ route('product.show', array_merge(request()->except('page'), ['price' => '100to200'])) }}" 
                           class="list-group-item list-group-item-action {{ request('price') == '100to200' ? 'active' : '' }}">
                            JD100 - JD200
                        </a>
                        <a href="{{ route('product.show', array_merge(request()->except('page'), ['price' => 'above200'])) }}" 
                           class="list-group-item list-group-item-action {{ request('price') == 'above200' ? 'active' : '' }}">
                            Above JD200
                        </a>
                    </div>
                </div>
                
                <!-- Apply/Clear Buttons -->
                <div class="d-grid gap-2">
                    @if(request('category_id') || request('price'))
                        <a href="{{ route('product.show') }}" class="btn btn-outline-danger">
                            <i class="fas fa-times"></i> Clear Filters
                        </a>
                    @endif
                    <button type="button" class="btn btn-primary" data-bs-dismiss="offcanvas">
                        <i class="fas fa-check"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<!-- Body main wrapper end -->

@section('styles')
<style>
    .filter-section {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
    }

    .filter-label {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
        display: block;
        font-weight: 500;
    }

    .filter-options .dropdown-toggle {
        min-width: 160px;
        text-align: left;
        position: relative;
        padding-right: 30px;
    }

    .filter-options .dropdown-toggle::after {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .filter-group {
        margin-bottom: 0;
    }

    .dropdown-item.active {
        background-color: #0d6efd;
        color: white;
    }

    .offcanvas-body .list-group-item {
        border-radius: 0.25rem !important;
        margin-bottom: 0.25rem;
    }

    @media (max-width: 991.98px) {
        .filter-section {
            padding: 1rem;
        }
    }
</style>
@endsection

@endsection