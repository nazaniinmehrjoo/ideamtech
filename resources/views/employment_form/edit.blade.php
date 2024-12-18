@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ویرایش فرم استخدام</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employment-forms.update', $employmentForm->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('employment_form.partials.form', ['form' => $employmentForm])
        <button type="submit" class="btn theme-btn btn-style-two">ذخیره تغییرات</button>
    </form>
</div>
@endsection
