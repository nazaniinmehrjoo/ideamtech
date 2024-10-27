@extends('layouts.app2')

@section('content')
<div class="container bg-dark text-white p-5 rounded">
    <h1 class="text-center mb-4">مشاهده محصول</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Product Image -->
            <div class="text-center mb-4">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : '/assets/images/default-product.png' }}" class="img-fluid" alt="{{ $product->name }}" width="300">
            </div>

            <!-- Product Details -->
            <div class="card bg-dark text-white">
                <div class="card-body" style="direction:rtl;">
                    <h5 class="card-title">نام محصول: {{ $product->name }}</h5>
                    <p class="card-text">توضیحات محصول: {{ $product->description }}</p>
                    <p class="card-text">تعداد کلیک‌ها: {{ $product->clicks }}</p>
                    <p class="card-text">تعداد بازدیدها: {{ $product->views }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">بازگشت به لیست محصولات</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
