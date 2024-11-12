@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-10" style="direction: rtl;">
            <!-- Main Box Container -->
            <div class="card bg-dark text-white p-4">
                <h3 class="text-center text-white mb-4">دسته بندی‌ها</h3>

                <!-- Success and Error Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Button to create a new category -->
                <div class="text-center mb-4">
                    <a href="{{ route('categories.create') }}" class="theme-btn btn-style-two">ایجاد دسته بندی جدید</a>
                </div>

                <!-- Tabs for Switching Between Categories -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#khoskkon" role="tab">خشک کن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#korepokht" role="tab">کوره پخت</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#mashinAlatShekldehi" role="tab">ماشین آلات شکل دهی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#mashinalatvatajhizat" role="tab">ماشین آلات و تجهیزات</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-4">
                    <!-- Khoskkon Section -->
                    <div class="tab-pane fade show active" id="khoskkon" role="tabpanel">
                        @if(isset($categories['khoskkon']) && $categories['khoskkon']->count() > 0)
                            <div class="row mb-4">
                                @foreach($categories['khoskkon'] as $category)
                                    <div class="col-md-4 mb-4">
                                        <div class="card bg-dark text-white h-100">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>
                                                <div class="mt-auto text-end">
                                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">هیچ دسته‌بندی‌ای برای خشک کن موجود نیست.</p>
                        @endif
                    </div>

                    <!-- Korepokht Section -->
                    <div class="tab-pane fade" id="korepokht" role="tabpanel">
                        @if(isset($categories['korepokht']) && $categories['korepokht']->count() > 0)
                            <div class="row mb-4">
                                @foreach($categories['korepokht'] as $category)
                                    <div class="col-md-4 mb-4">
                                        <div class="card bg-dark text-white h-100">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>
                                                <div class="mt-auto text-end">
                                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">هیچ دسته‌بندی‌ای برای کوره پخت موجود نیست.</p>
                        @endif
                    </div>

                    <!-- MashinAlatShekldehi Section -->
                    <div class="tab-pane fade" id="mashinAlatShekldehi" role="tabpanel">
                        @if(isset($categories['mashinAlatShekldehi']) && $categories['mashinAlatShekldehi']->count() > 0)
                            <div class="row mb-4">
                                @foreach($categories['mashinAlatShekldehi'] as $category)
                                    <div class="col-md-4 mb-4">
                                        <div class="card bg-dark text-white h-100">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>
                                                <div class="mt-auto text-end">
                                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">هیچ دسته‌بندی‌ای برای ماشین آلات شکل دهی موجود نیست.</p>
                        @endif
                    </div>

                    <!-- Mashinalatvatajhizat Section -->
                    <div class="tab-pane fade" id="mashinalatvatajhizat" role="tabpanel">
                        @if(isset($categories['mashinalatvatajhizat']) && $categories['mashinalatvatajhizat']->count() > 0)
                            <div class="row mb-4">
                                @foreach($categories['mashinalatvatajhizat'] as $category)
                                    <div class="col-md-4 mb-4">
                                        <div class="card bg-dark text-white h-100">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>
                                                <div class="mt-auto text-end">
                                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">هیچ دسته‌بندی‌ای برای ماشین آلات و تجهیزات موجود نیست.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
