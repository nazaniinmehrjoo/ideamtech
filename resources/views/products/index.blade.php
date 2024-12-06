@extends('layouts.app2')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">مدیریت محصولات</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Section -->
    <form method="GET" action="{{ route('products.index') }}" class="row g-3 align-items-center mb-5">
        <div class="col-md-4">
            <label for="page_name" class="form-label">صفحه</label>
            <select name="page_name" id="page_name" class="form-select">
                <option value="all" {{ $selectedPage == 'all' ? 'selected' : '' }}>همه صفحات</option>
                @foreach($products->keys() as $pageName)
                    <option value="{{ $pageName }}" {{ $selectedPage == $pageName ? 'selected' : '' }}>
                        {{ __("pages.$pageName") }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="category_id" class="form-label">دسته‌بندی</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="all" {{ $selectedCategory == 'all' ? 'selected' : '' }}>همه دسته‌ها</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-funnel"></i> فیلتر
            </button>
        </div>
    </form>

    <!-- Tabs for Pages -->
    <ul class="nav nav-tabs mb-4" role="tablist">
        @foreach($products as $pageName => $pageProducts)
            <li class="nav-item">
                <a class="nav-link {{ $selectedPage == $pageName ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ Str::slug($pageName) }}" role="tab">
                    {{ __("pages.$pageName") }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        @foreach($products as $pageName => $pageProducts)
            <div class="tab-pane fade {{ $selectedPage == $pageName ? 'show active' : '' }}" id="{{ Str::slug($pageName) }}" role="tabpanel">
                @if($pageProducts->count() > 0)
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                        @foreach($pageProducts as $product)
                            <div class="col">
                                <div class="card border-0 shadow-sm h-100">
                                    <!-- Product Image -->
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : '/assets/images/default-product.png' }}" 
                                         class="card-img-top" 
                                         style="height: 200px; object-fit: cover;" 
                                         alt="{{ $product->name }}">

                                    <!-- Product Info -->
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="card-footer bg-light d-flex justify-content-around">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> مشاهده
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> ویرایش
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> حذف
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center mt-4 text-muted">هیچ محصولی برای این صفحه و دسته انتخاب شده موجود نیست.</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
