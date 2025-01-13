@extends('layouts.app2')

@section('content')

<div class="container mt-5" dir="rtl">
    <h1 class="mb-4 text-center">{{ __('employment_form.manage_forms', ['locale' => app()->getLocale()]) }}</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('employment_form.close') }}"></button>
        </div>
    @endif

    <!-- Create Button -->
    <!-- <div class="text-center mb-4">
        <a href="{{ route('employment-forms.create', ['locale' => app()->getLocale()]) }}" class="btn create-object-btn btn-lg">{{ __('employment_form.create_new_form') }}</a>
    </div> -->

    <!-- Search Form -->
    <div class="text-center mb-4">
        <input type="text" id="formSearch" class="form-control w-50 mx-auto" placeholder="{{ __('employment_form.search_placeholder') }}" onkeyup="searchForms()">
    </div>

    @if($forms->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>{{ __('employment_form.first_name') }}</th>
                        <th>{{ __('employment_form.last_name') }}</th>
                        <th>{{ __('employment_form.email') }}</th>
                        <th>{{ __('employment_form.phone') }}</th>
                        <th>{{ __('employment_form.actions') }}</th>
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
                                    <!-- Edit Button -->
                                    <a href="{{ route('employment-forms.edit', ['locale' => app()->getLocale(), 'employment_form' => $form->id]) }}" class="btn btn-warning btn-sm">{{ __('employment_form.edit') }}</a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('employment-forms.destroy', ['locale' => app()->getLocale(), 'employment_form' => $form->id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('employment_form.delete_confirmation') }}')">{{ __('employment_form.delete') }}</button>
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
            {{ $forms->withQueryString()->links('vendor.pagination.default') }}
        </div>
    @else
        <p class="text-muted text-center">{{ __('employment_form.no_forms') }}</p>
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
