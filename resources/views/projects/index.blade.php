@extends('layouts.app2')

@section('content')
<div class="container" style="direction: rtl;">
    <h1 class="text-center my-4">مدیریت پروژه‌ها</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Create Button -->
    <div class="text-center mb-4">
        <a href="{{ route('projects.create', ['locale' => app()->getLocale()]) }}" class="btn create-object-btn">
            <i class="fas fa-plus"></i> ایجاد پروژه جدید
        </a>
    </div>

    <!-- Projects Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead class="table-dark project-table">
                <tr>
                    <th>نام پروژه</th>
                    <th>کارفرما</th>
                    <th>تاریخ شروع</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('projects.edit', ['locale' => app()->getLocale(), 'project' => $project->id]) }}"
                                class="btn btn-sm btn-warning mx-1">
                                <i class="fas fa-edit"></i> ویرایش
                            </a>

                            <!-- Delete Form -->
                            <form action="{{ route('projects.destroy', ['locale' => app()->getLocale(), 'project' => $project->id]) }}"
                                method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mx-1"
                                    onclick="return confirm('آیا مطمئن هستید که می‌خواهید این پروژه را حذف کنید؟')">
                                    <i class="fas fa-trash-alt"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted">هیچ پروژه‌ای موجود نیست.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $projects->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
