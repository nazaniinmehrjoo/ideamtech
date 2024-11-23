@extends('layouts.app2')

@section('content')
<div class="container p-5">
    <h1 class="text-center mb-4">مدیریت محصولات</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to Add New Product -->
    <div class="text-center mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-outline-primary btn-lg" style="font-size: 1.25rem; padding: 0.5rem 2rem;">
            افزودن محصول جدید
        </a>
    </div>

    <!-- Tabs for Different Product Pages -->
    <ul class="nav nav-tabs" role="tablist">
        @foreach($products as $pageName => $pageProducts)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ $pageName }}" role="tab">
                    {{ __("pages.$pageName") }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content for Each Page -->
    <div class="tab-content mt-4">
        @foreach($products as $pageName => $pageProducts)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $pageName }}" role="tabpanel">
                @if($pageProducts->count() > 0)
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($pageProducts as $product)
                            <div class="col">
                                <div class="card text-white bg-dark w-100 d-flex flex-column">
                                    <!-- Product Image -->
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : '/assets/images/default-product.png' }}" 
                                         class="card-img-top img-fluid" 
                                         style="height: 200px; object-fit: cover; width: 100%;" 
                                         alt="{{ $product->name }}">

                                    <!-- Product Info -->
                                    <div class="card-body" style="direction: rtl;">
                                        <h5 class="card-title">نام محصول: {{ $product->name }}</h5>
                                        <p class="card-text">توضیحات: {{ Str::limit($product->description, 100) }}</p>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="card-footer d-flex justify-content-between bg-dark">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">مشاهده</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">هیچ محصولی برای {{ __("pages.$pageName") }} موجود نیست.</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
