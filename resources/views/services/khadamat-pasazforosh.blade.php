@extends('layouts.app2')

@section('content')
<!-- Include Bootstrap CSS -->
<style>
    .services,
    .contact {
        /* background-color: #282828; */
        color: #dcdcdc;
        padding: 50px 20px;
    }

    .section-title {
        color: white;
        margin-bottom: 30px;
    }

    .service-item,
    .contact form {
        /* background: #2a2a2a; */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .service-item h4,
    .contact h4 {
        color: #f05928;
    }

    .contact form input,
    .contact form textarea,
    {
    background-color: #333;
    color: #e0e0e0;
    border: 1px solid #444;
    }
</style>

<!-- Hero Section -->
<section class="hero d-flex flex-column align-items-center justify-content-center text-center">
    <h1>{{ __('khadamat-pasazforosh.aftersales.title') }}</h1>
    <p>{{ __('khadamat-pasazforosh.aftersales.description') }}</p>
    <div class="joinUsBtnContainer">
        <button class="joinUsbtnContent">
            <svg width="200px" height="60px" viewBox="0 0 200 60">
                <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line"></polyline>
                <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line"></polyline>
            </svg>
            <span>{{ __('khadamat-pasazforosh.aftersales.join_us_button') }}</span>
        </button>
    </div>
</section>



<!-- Services Section with Bootstrap Grid -->
<section class="services text-center">
    <h2 class="section-title">{{ __('khadamat-pasazforosh.services.section_title') }}</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
        <!-- Service 1 -->
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.free_delivery_and_installation.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.free_delivery_and_installation.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 2 -->
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.repair_and_maintenance.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.repair_and_maintenance.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 3 -->
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.parts_distribution.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.parts_distribution.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 4 -->
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.training.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.training.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 5 -->
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.product_warranty.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.product_warranty.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 6 -->
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.online_support.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.online_support.description') }}</p>
                </details>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="faq">
            <h2 class="faq__title">سوالات متداول</h2>
            <details>
                <summary>What types of services are included?</summary>
                <p> Our services include setup, maintenance, repairs, and spare parts supply, all tailored to support
                    your specific needs.</p>
            </details>
            <details>
                <summary> What types of services are included?
                </summary>
                <p> Our services include setup, maintenance, repairs, and spare parts supply, all tailored to support
                    your specific needs.
                </p>
            </details>
            <details>
                <summary> Do you offer on-site assistance?
                </summary>
                <p> Yes, our technicians can provide on-site support when needed. We aim to minimize your equipment
                    downtime.</p>
            </details>
        </div>
    </div>
</section>

<script>
    function contactSupport() {
        window.location.href = 'mailto:info@brickind.com';
    }
</script>
@endsection