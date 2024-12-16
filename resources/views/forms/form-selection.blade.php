@extends('layouts.app')

@section('content')
<section class="services-two" style="padding-top: 5%;">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
        </div>

        <div class="row parent-row clearfix">
            <div class="tabs-col col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="tabs-box def-tabs-box">
                    <ul class="tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#employmentForm"><span>{{ __('index.employment_form') }}</span></li>
                        <li class="tab-btn" data-tab="#cooperationForm"><span>{{ __('index.cooperation_form') }}</span></li>
                    </ul>
                    <div class="tabs-content">
                        <!-- Employment Form Tab -->
                        <div class="tab active-tab" id="employmentForm">
                            <div class="formContent">
                                <div class="form-section">
                                    @include('employment_form.create')
                                </div>
                            </div>
                        </div>

                        <!-- Cooperation Form Tab -->
                        <div class="tab" id="cooperationForm">
                            <div class="formContent">
                                <div class="form-section">
                                    @include('cooperations.create')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                const target = this.dataset.tab;

                // Remove active classes
                tabs.forEach(t => t.classList.remove('active-btn'));
                tabContents.forEach(c => c.classList.remove('active-tab'));

                // Activate selected tab and content
                this.classList.add('active-btn');
                document.querySelector(target).classList.add('active-tab');
            });
        });
    });
</script>
@endpush
