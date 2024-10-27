@extends('layouts.app2')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">ایجاد</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row" style="direction:rtl">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('blog.show', $post->id) }}" class="btn btn-info">مشاهده</a>
                        <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning">ویرایش</a>

                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
</div>
@endsection
