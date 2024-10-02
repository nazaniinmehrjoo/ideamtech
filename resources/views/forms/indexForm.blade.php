@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست فرم های ارسال شده</title>
    <style>
        .table-responsive {
            direction: rtl; /* Ensure the table follows RTL direction */
        }
        .dropdown-menu {
            text-align: right; /* Align dropdown items to the right */
            direction: rtl; /* Ensure RTL direction in the dropdown */
        }
        .bg-dark {
            background-color: #343a40 !important; /* Use dark background */
        }
        .text-light {
            color: #f8f9fa !important; /* Light text color */
        }
    </style>
</head>

<div class="container my-5 bg-dark text-light p-4 rounded">
    <h1 class="text-center mb-4">لیست فرم های ارسال شده</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Create New Form Button -->
    <div class="mb-3">
        <a href="{{ route('customer.create') }}" class="btn btn-primary">ایجاد فرم جدید</a>
    </div>

    <!-- Search Box -->
    <div class="mb-3">
        <form action="{{ route('customer.index') }}" method="GET">
            <input type="text" name="search" placeholder="جستجو..." class="form-control bg-secondary text-light" style="width: 300px; display: inline-block;">
            <button type="submit" class="btn btn-info">جستجو</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark">
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
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $customer->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                پیام رسان‌ها
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $customer->id }}">
                                @if(isset($customer->messenger) && is_array($customer->messenger))
                                    @foreach($customer->messenger as $type => $number)
                                        <div class="dropdown-item">{{ $type }}: {{ $number }}</div>
                                    @endforeach
                                @else
                                    <div class="dropdown-item">ندارد</div>
                                @endif
                            </div>
                        </div>
                    </td>

                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning btn-sm">ویرایش</a>

                        <!-- Delete form -->
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید که می‌خواهید حذف کنید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Export button -->
        <form action="{{ route('customer.export') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">تهیه گذارش</button>
        </form>
    </div>
</div>
@endsection
