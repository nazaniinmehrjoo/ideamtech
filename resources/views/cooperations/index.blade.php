@extends('layouts.app2')

@section('content')

<div class="container mt-5" dir="rtl">
    <h1 class="mb-4 text-center">مدیریت فرم همکاری‌</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
        </div>
    @endif

    <!-- Create Button -->
    <div class="text-center mb-4">
        <a href="{{ route('cooperations.create') }}" class="btn create-object-btn btn-lg">افزودن فرم جدید</a>
    </div>

    <!-- Search Form -->
    <div class="text-center mb-4">
        <input type="text" id="formSearch" class="form-control w-50 mx-auto" placeholder="جستجوی فرم‌ها..." onkeyup="searchForms()">
    </div>

    <!-- Cooperation Forms Table -->
    @if($cooperations->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>نام شرکت</th>
                        <th>تلفن شرکت</th>
                        <th>ایمیل شرکت</th>
                        <th>کشور</th>
                        <th>کد ملی</th>
                        <th>زمینه فعالیت</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody id="formTable">
                    @foreach($cooperations as $cooperation)
                        <tr>
                            <td>{{ $cooperation->company_name }}</td>
                            <td>{{ $cooperation->company_phone }}</td>
                            <td>{{ $cooperation->company_email }}</td>
                            <td>{{ $cooperation->country }}</td>
                            <td>{{ $cooperation->national_id }}</td>
                            <td>{{ $cooperation->activity_field }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('cooperations.edit', $cooperation->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                    <form action="{{ route('cooperations.destroy', $cooperation->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="styled-pagination d-flex justify-content-center mt-4">
            {{ $cooperations->links('vendor.pagination.default') }}
        </div>
    @else
        <p class="text-muted text-center">هیچ فرم همکاری ثبت نشده است.</p>
    @endif
</div>

<!-- JavaScript for Search Functionality -->
<script>
    function searchForms() {
        const input = document.getElementById("formSearch").value.toLowerCase();
        const tableRows = document.getElementById("formTable").getElementsByTagName("tr");

        for (let i = 0; i < tableRows.length; i++) {
            const row = tableRows[i];
            const companyName = row.getElementsByTagName("td")[0].innerText.toLowerCase();
            const companyPhone = row.getElementsByTagName("td")[1].innerText.toLowerCase();
            const companyEmail = row.getElementsByTagName("td")[2].innerText.toLowerCase();
            const country = row.getElementsByTagName("td")[3].innerText.toLowerCase();
            const nationalId = row.getElementsByTagName("td")[4].innerText.toLowerCase();
            const activityField = row.getElementsByTagName("td")[5].innerText.toLowerCase();

            // Display rows that match the search input
            if (
                companyName.includes(input) ||
                companyPhone.includes(input) ||
                companyEmail.includes(input) ||
                country.includes(input) ||
                nationalId.includes(input) ||
                activityField.includes(input)
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
</script>

@endsection
