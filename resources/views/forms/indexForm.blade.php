@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>لیست فرم های ارسال شده</title>
        <style>
            .customer-cards {
                display: flex;
                flex-direction: column;
                gap: 20px;
                direction: rtl;
            }

            .card-row {
                background-color: #ffffff;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border-radius: 15px;
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                justify-content: space-between;
                transition: transform 0.2s ease;
                position: relative;
                height: 80px;
                align-items: center;

            }



            .card-actions {
                display: none;
                top: 40px;
                left: 10px;
                background-color: #fff;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
                border-radius: 10px;
                padding: 10px;
                z-index: 999;
                min-width: 100px;
                z-index: 999999;
                display: block;
                gap: 10px;
                align-items: center;
                margin-top: 15px;
                position: absolute;
                z-index: 1;
                text-align: right;
            }



            .card-actions a,
            .card-actions form {
                margin-bottom: 5px;
                text-align: right;
            }

            .card-row:hover {
                transform: scale(1.01);
                z-index: 10;
            }


            .card-item {
                font-size: 14px;
                color: #333;
                text-align: center;
                width: 60px;
            }

            .customerAddress {
                width: 300px;
            }

            .customerCity {
                width: 200px;
            }

            .customerName {
                width: 100px;
            }

            .btn {
                border-radius: 8px;
                padding: 6px 14px;
                font-size: 13px;
                font-weight: bold;
                transition: all 0.3s ease;
            }

            .btn-warning {
                background-color: #ffc107;
                color: #000;
                border: none;
            }

            .btn-warning:hover {
                background-color: #e0a800;
            }

            .btn-danger {
                background-color: #dc3545;
                color: #fff;
                border: none;
            }

            .btn-danger:hover {
                background-color: #c82333;
            }

            .card-actions {
                display: none;
            }

            .actions {
                color: #333;
                cursor: pointer;
                vertical-align: middle;
            }

            .customerFactoryName {
                width: 150px;
            }

            .createLead {
                background-color: #FFB27D;
                padding:
                    10px;
                width: 158px;
                height: 48px;
                border-radius: 18px;
                color: #fff;
            }

            .createLead i {
                vertical-align: middle;
            }

            .actiondtl {
                width: 90px;
                display: flex;
                justify-content: space-between;
                align-items: center;

            }

            .card-titles {
                display: flex;
                justify-content: space-between;
                text-align: center;
                direction: rtl;

            }

            .card-titleitem {
                width: 60px;
                text-align: center;
            }
        </style>
    </head>

    <div class="my-5 text-light p-4 rounded">
        <h1 class="text-center mb-4">لیست سرنخ‌ها</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('customer.create', ['locale' => app()->getLocale()]) }}" class="btn createLead">سرنخ جدید
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="mb-3">
            <form action="{{ route('customer.index', ['locale' => app()->getLocale()]) }}" method="GET"
                class="d-flex flex-wrap gap-2 align-items-center">
                <select name="city" class="form-control bg-secondary text-light" style="width: 200px;">
                    <option value="">همه شهرها</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-info">اعمال فیلتر</button>
            </form>
        </div>
        <div class="card-titles">
            <div class="card-titleitem">شناسه</div>
            <div class="card-titleitem">کد</div>
            <div class="card-titleitem customerFactoryName">نام کارخانه</div>
            <div class="card-titleitem customerName">نام</div>
            <div class="card-titleitem">شماره کارخانه</div>
            <div class="card-titleitem">شماره همراه</div>
            <div class="card-titleitem customerCity">شهر</div>
            <div class="card-titleitem customerAddress">آدرس</div>
            <div class="card-titleitem">محصولات</div>
            <div class="card-titleitem">نوع کوره</div>
            <div class="card-titleitem">نوع خشک‌کن</div>
            <div class="card-titleitem">تعداد قمیر</div>
            <div class="card-titleitem">پیام‌رسان</div>
            <div class="card-titleitem">عملیات</div>




        </div>
        <div class="customer-cards">
            @foreach($customers as $customer)

                    <div class="card-row">
                        <div class="card-item">{{ $customer->id }}</div>
                        <div class="card-item">{{ $customer->factory_code }}</div>
                        <div class="card-item customerFactoryName">{{ $customer->factory_name }}</div>
                        <div class="card-item customerName"> {{ $customer->first_name }} {{ $customer->last_name }}</div>
                        <div class="card-item"> {{ $customer->mobile_phone }}</div>
                        <div class="card-item">{{ $customer->factory_phone ?? 'ندارد' }}</div>
                        <div class="card-item customerCity">{{ $customer->province }} / {{ $customer->city }}</div>
                        <div class="card-item customerAddress">{{ $customer->address ?? 'ندارد' }}</div>
                        <div class="card-item">
                            {{ implode(', ', json_decode($customer->products, true) ?? []) }}
                        </div>
                        <div class="card-item">{{ $customer->kiln_type }}</div>
                        <div class="card-item">{{ $customer->dryer_type }}</div>
                        <div class="card-item">{{ $customer->dough_count }}</div>

                        @php
                            $messengerData = json_decode($customer->messenger, true) ?? [];
                        @endphp
                        <div class="card-item">

                            @if (!empty($messengerData))
                                @foreach($messengerData as $type => $number)
                                    <div>{{ $type }}: {{ $number }}</div>
                                @endforeach
                            @else
                                ندارد
                            @endif
                        </div>
                        <div class="actions" onclick="toggleActions(this)">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('customer.edit', ['locale' => app()->getLocale(), 'customer' => $customer->id]) }}"
                                class="btn btn-sm actiondtl">ویرایش
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form
                                action="{{ route('customer.destroy', ['locale' => app()->getLocale(), 'customer' => $customer->id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm actiondtl"
                                    onclick="return confirm('آیا مطمئن هستید که می‌خواهید این فرم را حذف کنید؟')">
                                    حذف
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $customers->links('vendor.pagination.default') }}
        </div>


        <form action="{{ route('customer.export', ['locale' => app()->getLocale()]) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-success">تهیه گزارش</button>
        </form>
    </div>
    <script>
        function toggleActions(iconElement) {
            const parentCard = iconElement.closest('.card-row');
            const actionsDiv = parentCard.querySelector('.card-actions');

            document.querySelectorAll('.card-actions').forEach(el => {
                if (el !== actionsDiv) el.style.display = 'none';
            });

            actionsDiv.style.display = (getComputedStyle(actionsDiv).display === 'none') ? 'block' : 'none';
        }
    </script>

@endsection