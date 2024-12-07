@extends('layouts.app2')

@section('content')
<div class="container" style="direction:rtl">
    <h1 class="text-center mb-5">مدیریت سرویس ها</h1>

    {{-- Display success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display error messages --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="text-center mb-4">
        <a href="{{ route('services.create') }}" class="btn create-object-btn btn-lg d-inline-block"
            style="font-size: 1.25rem; padding: 0.5rem 2rem;">
            ایجاد سرویس جدید
        </a>
    </div>

    {{-- Define categories for tabs --}}
    @php
        $categories = [
            'مشاوره' => 'show_on_consulting',
            'تامین قطعات' => 'show_on_parts_repairs',
            'خدمات مهندسی' => 'show_on_engineering',
            'نصب و راه اندازی' => 'show_on_installation',
            'خدمات پس از فروش' => 'show_on_after_sales',
        ];
    @endphp

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs" role="tablist">
        @foreach($categories as $categoryName => $columnName)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                    href="#{{ \Str::slug($categoryName) }}" role="tab">{{ $categoryName }}</a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4">
        @foreach($categories as $categoryName => $columnName)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ \Str::slug($categoryName) }}"
                role="tabpanel">
                <div class="category-section mb-5 p-4 border rounded shadow bg-darck">
                    <h2 class="categoryName">{{ $categoryName }}</h2>
                    <div class="row">
                        @forelse($services->where($columnName, true) as $service)
                            <div class="col-md-4 mb-4 d-flex">
                                <div class="card text-white bg-dark w-100 d-flex flex-column">
                                    <div class="card-header">
                                        <h5>{{ $service->title }}</h5>
                                    </div>
                                    <div class="card-body flex-grow-1" style="direction:rtl;">
                                        <h6>Category: {{ $service->category }}</h6>
                                        <p>{{ \Illuminate\Support\Str::limit($service->content, 100) }}</p>
                                        <div class="d-flex flex-wrap">
                                            {{-- Display banner images --}}
                                            @foreach(json_decode($service->banner_images) as $image)
                                                <img src="{{ asset('storage/' . $image) }}" alt="Banner Image" style="width: 50px;"
                                                    class="img-thumbnail mb-2">
                                            @endforeach
                                        </div>
                                        {{-- Display pages where this service appears --}}
                                        <p><strong>Displayed on Pages:</strong>
                                            @if(is_array($service->display_pages) && count($service->display_pages) > 0)
                                                {{ implode(', ', $service->display_pages) }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="{{ route('services.edit', $service->id) }}"
                                            class="btn btn-warning btn-sm">ویرایش</a>

                                        {{-- Inline delete form --}}
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">هیچ سرویس پیدا نشد {{ $categoryName }}.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection