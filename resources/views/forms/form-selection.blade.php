@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center" style="padding: 3%; direction: rtl;">
    <!-- Logo and Switch Buttons -->
    <div class="d-flex align-items-center mb-4">
        <!-- Custom Styled Button for Employment Form -->
        <div class="joinUsBtnContainer me-2">
            <button class="joinUsbtnContent" id="switchToEmployment">
                <svg width="200px" height="60px" viewBox="0 0 200 60">
                    <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line" />
                    <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line" />
                </svg>
                <span>فرم استخدام</span>
            </button>
        </div>

        <!-- Custom Styled Button for Cooperation Form -->
        <div class="joinUsBtnContainer">
            <button class="joinUsbtnContent" id="switchToCooperation">
                <svg width="200px" height="60px" viewBox="0 0 200 60">
                    <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line" />
                    <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line" />
                </svg>
                <span>فرم همکاری</span>
            </button>
        </div>
    </div>

    <!-- Form Container -->
    <div class="col-md-7 col-lg-8">
        <!-- Employment Form (Default) -->
        <div id="employmentForm" class="form-section">
            @include('employment_form.create')
        </div>

        <!-- Cooperation Form (Hidden Initially) -->
        <div id="cooperationForm" class="form-section" style="display: none;">
            @include('cooperations.create')
        </div>
    </div>
</div>

<!-- JavaScript for toggling forms -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const switchToCooperation = document.getElementById('switchToCooperation');
        const switchToEmployment = document.getElementById('switchToEmployment');

        if (switchToCooperation) {
            switchToCooperation.addEventListener('click', function () {
                document.getElementById('employmentForm').style.display = 'none';
                document.getElementById('cooperationForm').style.display = 'block';
            });
        }

        if (switchToEmployment) {
            switchToEmployment.addEventListener('click', function () {
                document.getElementById('cooperationForm').style.display = 'none';
                document.getElementById('employmentForm').style.display = 'block';
            });
        }
    });
</script>
@endsection
