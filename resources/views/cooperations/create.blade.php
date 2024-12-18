<form action="{{ route('cooperations.store', ['locale' => app()->getLocale()]) }}" method="POST"
    enctype="multipart/form-data" class="text-white p-4 rounded" style="direction: rtl;">
    
    @csrf

    <!-- Company Name -->
    <div class="row mb-3">
        <label for="company_name" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.company_name') }}</label>
        <div class="col-md-6">
            <input type="text" name="company_name" id="company_name"
                class="form-control bg-dark text-white @error('company_name') is-invalid @enderror" required>
            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Company Phone -->
    <div class="row mb-3">
        <label for="company_phone" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.company_phone') }}</label>
        <div class="col-md-6">
            <input type="text" name="company_phone" id="company_phone"
                class="form-control bg-dark text-white @error('company_phone') is-invalid @enderror" required>
            @error('company_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Company Email -->
    <div class="row mb-3">
        <label for="company_email" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.company_email') }}</label>
        <div class="col-md-6">
            <input type="email" name="company_email" id="company_email"
                class="form-control bg-dark text-white @error('company_email') is-invalid @enderror" required>
            @error('company_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Country -->
    <div class="row mb-3">
        <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.country') }}</label>
        <div class="col-md-6">
            <input type="text" name="country" id="country"
                class="form-control bg-dark text-white @error('country') is-invalid @enderror" required>
            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- National ID -->
    <div class="row mb-3">
        <label for="national_id" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.national_id') }}</label>
        <div class="col-md-6">
            <input type="text" name="national_id" id="national_id"
                class="form-control bg-dark text-white @error('national_id') is-invalid @enderror" required>
            @error('national_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Address -->
    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.address') }}</label>
        <div class="col-md-6">
            <textarea name="address" id="address"
                class="form-control bg-dark text-white @error('address') is-invalid @enderror" required></textarea>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Activity Field -->
    <div class="row mb-3">
        <label for="activity_field" class="col-md-4 col-form-label text-md-end">{{ __('cooperation.activity_field') }}</label>
        <div class="col-md-6">
            <input type="text" name="activity_field" id="activity_field"
                class="form-control bg-dark text-white @error('activity_field') is-invalid @enderror" required>
            @error('activity_field')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mb-0 mt-3">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn theme-btn btn-style-two">
                {{ __('cooperation.submit_button') }}
            </button>
        </div>
    </div>
</form>
