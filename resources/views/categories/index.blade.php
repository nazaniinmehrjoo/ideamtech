@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
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

                <!-- Check if there are any categories -->
                @if($categories->isEmpty())
                    <div class="text-center">
                        <p>هیچ دسته‌بندی‌ای موجود نیست.</p>
                    </div>
                @else
                    <!-- Khoskkon Section -->
                    @if(isset($categories['khoskkon']) && $categories['khoskkon']->count() > 0)
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="text-white text-center py-2 mb-4" style="backdrop-filter: blur(16px) saturate(180%); -webkit-backdrop-filter: blur(16px) saturate(180%); background-color: rgba(17, 25, 40, 0.75); border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.125);">
                                    خشک کن
                                </h3>
                            </div>

                            @foreach($categories['khoskkon'] as $category)
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-dark text-white h-100">
                                        <div class="card-body d-flex flex-column">
                                            <!-- Category Name -->
                                            <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>

                                            <!-- Action Buttons -->
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
                    @endif

                    <!-- Korepokht Section -->
                    @if(isset($categories['korepokht']) && $categories['korepokht']->count() > 0)
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="text-white text-center py-2 mb-4" style="backdrop-filter: blur(16px) saturate(180%); -webkit-backdrop-filter: blur(16px) saturate(180%); background-color: rgba(17, 25, 40, 0.75); border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.125);">
                                    کوره پخت
                                </h3>
                            </div>

                            @foreach($categories['korepokht'] as $category)
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-dark text-white h-100">
                                        <div class="card-body d-flex flex-column">
                                            <!-- Category Name -->
                                            <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>

                                            <!-- Action Buttons -->
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
                    @endif

                    <!-- MashinAlatShekldehi Section -->
                    @if(isset($categories['mashinAlatShekldehi']) && $categories['mashinAlatShekldehi']->count() > 0)
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="text-white text-center py-2 mb-4" style="backdrop-filter: blur(16px) saturate(180%); -webkit-backdrop-filter: blur(16px) saturate(180%); background-color: rgba(17, 25, 40, 0.75); border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.125);">
                                    ماشین آلات شکل دهی
                                </h3>
                            </div>

                            @foreach($categories['mashinAlatShekldehi'] as $category)
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-dark text-white h-100">
                                        <div class="card-body d-flex flex-column">
                                            <!-- Category Name -->
                                            <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>

                                            <!-- Action Buttons -->
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
                    @endif

                    <!-- Mashinalatvatajhizat Section -->
                    @if(isset($categories['mashinalatvatajhizat']) && $categories['mashinalatvatajhizat']->count() > 0)
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="text-white text-center py-2 mb-4" style="backdrop-filter: blur(16px) saturate(180%); -webkit-backdrop-filter: blur(16px) saturate(180%); background-color: rgba(17, 25, 40, 0.75); border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.125);">
                                    ماشین آلات و تجهیزات
                                </h3>
                            </div>

                            @foreach($categories['mashinalatvatajhizat'] as $category)
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-dark text-white h-100">
                                        <div class="card-body d-flex flex-column">
                                            <!-- Category Name -->
                                            <h5 class="card-title text-end" style="direction: rtl;">{{ $category->name }}</h5>

                                            <!-- Action Buttons -->
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
                    @endif
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
