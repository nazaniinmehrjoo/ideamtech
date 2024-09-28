@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست فرم های ارسال شده</title>
</head>

<div class="container my-5">
    <h1 class="text-center mb-4">لیست فرم های ارسال شده</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Create New Form Button -->
    <div class="mb-3">
        <a href="{{ route('customer.create') }}" class="btn btn-primary">ایجاد فرم جدید</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark" style="white-">
                <tr>
                    <th>کد</th>
                    <th>نام کارخانه</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>شماره کارخانه</th>
                    <th>شماره همراه</th>
                    <th>استان</th>
                    <th>شهر</th>
                    <th>محصولات</th>
                    <th>نوع کوره</th>
                    <th>نوع خشک کن</th>
                    <th>تعداد قمیر</th>
                    <th>پیام رسان‌ها</th>
                    <th>آیدی اینستاگرام</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->factory_code }}</td>
                    <td>{{ $customer->factory_name }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->factory_phone }}</td>
                    <td>{{ $customer->mobile_phone }}</td>
                    <td>{{ $customer->province }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ is_array($customer->products) ? implode(', ', $customer->products) : $customer->products }}</td>
                    <td>{{ $customer->kiln_type }}</td>
                    <td>{{ $customer->dryer_type }}</td>
                    <td>{{ $customer->dough_count }}</td>
                    <td>{{ is_array($customer->messenger) ? implode(', ', $customer->messenger) : $customer->messenger }}</td>
                    <td>{{ $customer->instagram_id ?? '-' }}</td>
                    <td > 
                        <!-- Edit button -->
                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید که می‌خواهید حذف کنید؟')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('customer.export') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Export to Excel</button>
        </form>
    </div>
</div>
@endsection
