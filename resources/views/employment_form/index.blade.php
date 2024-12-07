@extends('layouts.app2')

@section('content')

<div class="container mt-5" dir="rtl">
    <h1 class="mb-4 text-center">مدیریت فرم‌های استخدام</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
        </div>
    @endif

  

    <!-- Create Button -->
    <div class="text-center mb-4">
        <a href="{{ route('employment-forms.create') }}" class="btn create-object-btn btn-lg">افزودن فرم جدید</a>
    </div>

    <!-- Employment Forms Table -->
       <!-- Search Form -->
    <div class="text-center mb-4">
        <input type="text" id="formSearch" class="form-control w-50 mx-auto" placeholder="جستجوی فرم‌ها..."
            onkeyup="searchForms()">
    </div>
    @if($forms->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>تلفن</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody id="formTable">
                    @foreach($forms as $form)
                        <tr>
                            <td>{{ $form->first_name }}</td>
                            <td>{{ $form->last_name }}</td>
                            <td>{{ $form->email }}</td>
                            <td>{{ $form->phone }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('employment-forms.edit', $form->id) }}"
                                        class="btn btn-warning btn-sm">ویرایش</a>
                                    <form action="{{ route('employment-forms.destroy', $form->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="styled-pagination">
            {{ $forms->links('vendor.pagination.default') }}
        </div>
    @else
        <p class="text-muted text-center">هیچ فرم استخدامی ثبت نشده است.</p>
    @endif
</div>

<!-- JavaScript for Search Functionality -->
<script>
    function searchForms() {
        const input = document.getElementById("formSearch").value.toLowerCase();
        const tableRows = document.getElementById("formTable").getElementsByTagName("tr");

        for (let i = 0; i < tableRows.length; i++) {
            const row = tableRows[i];
            const firstName = row.getElementsByTagName("td")[0].innerText.toLowerCase();
            const lastName = row.getElementsByTagName("td")[1].innerText.toLowerCase();
            const email = row.getElementsByTagName("td")[2].innerText.toLowerCase();
            const phone = row.getElementsByTagName("td")[3].innerText.toLowerCase();

            // Display rows that match the search input
            if (firstName.includes(input) || lastName.includes(input) || email.includes(input) || phone.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
</script>

@endsection