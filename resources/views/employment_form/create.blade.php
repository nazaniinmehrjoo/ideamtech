<form action="{{ route('employment-forms.store', ['locale' => app()->getLocale()]) }}" method="POST"
    enctype="multipart/form-data" class="text-white p-4 rounded" style="direction: rtl;">
    
    @csrf

    <!-- First Name -->
    <div class="row mb-3">
        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.first_name') }}</label>
        <div class="col-md-6">
            <input type="text" name="first_name" id="first_name"
                class="form-control bg-dark text-white @error('first_name') is-invalid @enderror" required>
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Last Name -->
    <div class="row mb-3">
        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.last_name') }}</label>
        <div class="col-md-6">
            <input type="text" name="last_name" id="last_name"
                class="form-control bg-dark text-white @error('last_name') is-invalid @enderror" required>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Gender -->
    <div class="row mb-3">
        <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.gender') }}</label>
        <div class="col-md-6">
            <select name="gender" id="gender"
                class="form-control bg-dark text-white @error('gender') is-invalid @enderror" required>
                <option value="">{{ __('employment_form.select_gender') }}</option>
                <option value="male">{{ __('employment_form.male') }}</option>
                <option value="female">{{ __('employment_form.female') }}</option>
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Marital Status -->
    <div class="row mb-3">
        <label for="marital_status" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.marital_status') }}</label>
        <div class="col-md-6">
            <select name="marital_status" id="marital_status"
                class="form-control bg-dark text-white @error('marital_status') is-invalid @enderror" required>
                <option value="">{{ __('employment_form.select_marital_status') }}</option>
                <option value="single">{{ __('employment_form.single') }}</option>
                <option value="married">{{ __('employment_form.married') }}</option>
            </select>
            @error('marital_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Military Status -->
    <div class="row mb-3">
        <label for="military_status" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.military_status') }}</label>
        <div class="col-md-6">
            <select name="military_status" id="military_status"
                class="form-control bg-dark text-white @error('military_status') is-invalid @enderror" required>
                <option value="">{{ __('employment_form.select_military_status') }}</option>
                <option value="completed">{{ __('employment_form.completed') }}</option>
                <option value="exempt">{{ __('employment_form.exempt') }}</option>
                <option value="postponed">{{ __('employment_form.postponed') }}</option>
            </select>
            @error('military_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Phone -->
    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.phone') }}</label>
        <div class="col-md-6">
            <input type="text" name="phone" id="phone"
                class="form-control bg-dark text-white @error('phone') is-invalid @enderror" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Email -->
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.email') }}</label>
        <div class="col-md-6">
            <input type="email" name="email" id="email"
                class="form-control bg-dark text-white @error('email') is-invalid @enderror" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Location -->
    <div class="row mb-3">
        <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.location') }}</label>
        <div class="col-md-6">
            <input type="text" name="location" id="location"
                class="form-control bg-dark text-white @error('location') is-invalid @enderror" required>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Experience Years -->
    <div class="row mb-3">
        <label for="experience_years"
            class="col-md-4 col-form-label text-md-end">{{ __('employment_form.experience_years') }}</label>
        <div class="col-md-6">
            <input type="number" name="experience_years" id="experience_years"
                class="form-control bg-dark text-white @error('experience_years') is-invalid @enderror" required>
            @error('experience_years')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Education History -->
    <div class="row mb-3">
        <label for="education_history" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.education_history') }}</label>
        <div class="col-md-6">
            <textarea name="education_history" id="education_history"
                class="form-control bg-dark text-white @error('education_history') is-invalid @enderror"
                required></textarea>
            @error('education_history')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Training Courses -->
    <div class="row mb-3">
        <label for="training_courses"
            class="col-md-4 col-form-label text-md-end">{{ __('employment_form.training_courses') }}</label>
        <div class="col-md-6">
            <textarea name="training_courses" id="training_courses"
                class="form-control bg-dark text-white @error('training_courses') is-invalid @enderror"></textarea>
            @error('training_courses')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Training Certificate -->
    <div class="row mb-3">
        <label for="training_certificate"
            class="col-md-4 col-form-label text-md-end">{{ __('employment_form.training_certificate') }}</label>
        <div class="col-md-6">
            <input type="file" name="training_certificate" id="training_certificate"
                class="form-control bg-dark text-white @error('training_certificate') is-invalid @enderror">
            @error('training_certificate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Work Experience -->
    <div class="row mb-3">
        <label for="work_experience" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.work_experience') }}</label>
        <div class="col-md-6">
            <textarea name="work_experience" id="work_experience"
                class="form-control bg-dark text-white @error('work_experience') is-invalid @enderror"></textarea>
            @error('work_experience')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Work Experience Photo -->
    <div class="row mb-3">
        <label for="work_experience_photo"
            class="col-md-4 col-form-label text-md-end">{{ __('employment_form.work_experience_photo') }}</label>
        <div class="col-md-6">
            <input type="file" name="work_experience_photo" id="work_experience_photo"
                class="form-control bg-dark text-white @error('work_experience_photo') is-invalid @enderror">
            @error('work_experience_photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Foreign Language -->
    <div class="row mb-3">
        <label for="foreign_language" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.foreign_language') }}</label>
        <div class="col-md-6">
            <input type="text" name="foreign_language" id="foreign_language"
                class="form-control bg-dark text-white @error('foreign_language') is-invalid @enderror" required>
            @error('foreign_language')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Language Proficiency -->
    <div class="row mb-3">
        <label for="language_proficiency"
            class="col-md-4 col-form-label text-md-end">{{ __('employment_form.language_proficiency') }}</label>
        <div class="col-md-6">
            <input type="number" name="language_proficiency" id="language_proficiency"
                class="form-control bg-dark text-white @error('language_proficiency') is-invalid @enderror" min="1"
                max="5" required>
            @error('language_proficiency')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Software Skills -->
    <div class="row mb-3">
        <label for="software_skills"
            class="col-md-4 col-form-label text-md-end">{{ __('employment_form.software_skills') }}</label>
        <div class="col-md-6">
            <textarea name="software_skills" id="software_skills"
                class="form-control bg-dark text-white @error('software_skills') is-invalid @enderror"></textarea>
            @error('software_skills')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- About Me -->
    <div class="row mb-3">
        <label for="about_me" class="col-md-4 col-form-label text-md-end">{{ __('employment_form.about_me') }}</label>
        <div class="col-md-6">
            <textarea name="about_me" id="about_me"
                class="form-control bg-dark text-white @error('about_me') is-invalid @enderror"></textarea>
            @error('about_me')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mb-0 mt-3">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('employment_form.submit_button') }}
            </button>
        </div>
    </div>
</form>
