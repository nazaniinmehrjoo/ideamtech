@extends('layouts.app2')

@section('content')

<div class="container mt-5" dir="rtl">
    <h1 class="mb-4 text-center">{{ __('cooperation.manage_forms') }}</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ __('cooperation.success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('cooperation.close') }}"></button>
        </div>
    @endif

    <!-- Create Button -->
    <div class="text-center mb-4">
        <a href="{{ route('cooperations.create', ['locale' => app()->getLocale()]) }}" class="btn create-object-btn btn-lg">
            {{ __('cooperation.create_new_form') }}
        </a>
    </div>

    <!-- Search Form -->
    <div class="text-center mb-4">
        <input type="text" id="formSearch" class="form-control w-50 mx-auto" placeholder="{{ __('cooperation.search_placeholder') }}" onkeyup="searchForms()">
    </div>

    <!-- Cooperation Forms Table -->
    @if($cooperations->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>{{ __('cooperation.company_name') }}</th>
                        <th>{{ __('cooperation.company_phone') }}</th>
                        <th>{{ __('cooperation.company_email') }}</th>
                        <th>{{ __('cooperation.country') }}</th>
                        <th>{{ __('cooperation.national_id') }}</th>
                        <th>{{ __('cooperation.activity_field') }}</th>
                        <th>{{ __('cooperation.actions') }}</th>
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
                                    <!-- Edit Button -->
                                    <a href="{{ route('cooperations.edit', ['locale' => app()->getLocale(), 'cooperation' => $cooperation->id]) }}" class="btn btn-warning btn-sm">
                                        {{ __('cooperation.edit') }}
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('cooperations.destroy', ['locale' => app()->getLocale(), 'cooperation' => $cooperation->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('cooperation.delete_confirmation') }}')">
                                            {{ __('cooperation.delete') }}
                                        </button>
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
            {{ $cooperations->withQueryString()->links('vendor.pagination.default') }}
        </div>
    @else
        <p class="text-muted text-center">{{ __('cooperation.no_forms') }}</p>
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
