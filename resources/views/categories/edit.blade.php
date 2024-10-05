@extends('layouts.app2')

@section('content')
<div class="container">
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Category Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Category Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Page Name Dropdown -->
        <div class="mb-3">
            <label for="page_name" class="form-label">{{ __('Page Name') }}</label>
            <select name="page_name" id="page_name" class="form-control @error('page_name') is-invalid @enderror" required>
                <option value="">{{ __('-- Select Page --') }}</option>
                @foreach($pages as $page)
                    <option value="{{ $page }}" {{ $category->page_name == $page ? 'selected' : '' }}>{{ ucfirst($page) }}</option>
                @endforeach
            </select>
            @error('page_name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">{{ __('Update Category') }}</button>
    </form>
</div>
@endsection
