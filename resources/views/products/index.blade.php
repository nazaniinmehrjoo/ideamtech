@extends('layouts.app')

@section('content')
<div class="container bg-dark text-white p-5 rounded">
    <h1 class="text-center mb-4">محصولات</h1>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to create a new product -->
    <div class="text-center mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-primary">+</a>
    </div>

    <!-- Product Grid -->
    <div class="row row-cols-1 row-cols-md-3 g-4" >
        @forelse($products as $product)
            <div class="col">
                <div class="card bg-dark text-white h-100">
                    <!-- Product Image -->
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : '/assets/images/default-product.png' }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                    
                    <!-- Product Info -->
                    <div class="card-body" style="direction:rtl;">
                        <h5 class="card-title">نام محصول: {{ $product->name }}</h5>
                        <p class="card-text">توضیحات محصول: {{ Str::limit($product->description, 100) }}</p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="card-footer d-flex justify-content-between">
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
        @empty
            <div class="col-md-12 text-center">
                <p>هیچ محصولی یافت نشد.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
