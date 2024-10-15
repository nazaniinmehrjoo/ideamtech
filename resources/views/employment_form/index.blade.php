@extends('layouts.app')

@section('content')
<div class="container">
    <h1>لیست فرم‌های استخدام</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('employment-forms.create') }}" class="btn btn-primary mb-3">افزودن فرم جدید</a>

    @if($forms->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>تلفن</th>
                    <th>اقدامات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form)
                    <tr>
                        <td>{{ $form->first_name }}</td>
                        <td>{{ $form->last_name }}</td>
                        <td>{{ $form->email }}</td>
                        <td>{{ $form->phone }}</td>
                        <td>
                            <a href="{{ route('employment-forms.show', $form->id) }}" class="btn btn-info btn-sm">مشاهده</a>
                            <a href="{{ route('employment-forms.edit', $form->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                            <form action="{{ route('employment-forms.destroy', $form->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>هیچ فرم استخدامی ثبت نشده است.</p>
    @endif
</div>
@endsection
