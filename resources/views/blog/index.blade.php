@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="text-center my-4">مدیریت پست‌های وبلاگ</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Create Button -->
    <div class="text-center mb-4">
        <a href="{{ route('blog.create') }}" class="btn create-object-btn btn-lg">ایجاد پست جدید</a>
    </div>

    <!-- Blog Posts Grid -->
    <div class="row" style="direction: rtl;">
        @forelse($posts as $post)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm h-100 w-100">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    <div class="card-body d-flex flex-column" style="height: 250px;">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-info btn-sm">مشاهده</a>
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">هیچ پستی یافت نشد.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
