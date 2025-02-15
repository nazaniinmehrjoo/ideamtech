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
        background: #292c30;
    }

    .service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .service-item h4,
    .contact h4 {
        color: #f05928;
        font-size: 1.5rem;
    }

    .contact form input,
    .contact form textarea,
    {
    background-color: #333;
    color: #e0e0e0;
    border: 1px solid #444;
    }

    .afterSalesService div {
        margin-top: 1%;
    }

    .service-item details {
        direction: rtl;
    }

    .service-item p {
        direction: rtl;
    }
</style>

<!-- Hero Section -->
<section class="hero d-flex flex-column align-items-center justify-content-center text-center">

    <div class="joinUsBtnContainer">
        <button class="joinUsbtnContent"
            onclick="window.location.href='{{ url(__('khadamat-pasazforosh.aftersales.button_link')) }}'">
            <svg width="200px" height="60px" viewBox="0 0 200 60">
                <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line"></polyline>
                <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line"></polyline>
            </svg>
            <span>{{ __('khadamat-pasazforosh.aftersales.join_us_button') }}</span>
        </button>
    </div>
</section>



<!-- Services Section with Bootstrap Grid -->
<!-- Services Section with Bootstrap Grid -->
<section class="services text-center">
    <h2 class="section-title">{{ __('khadamat-pasazforosh.services.section_title') }}</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
        <div class="col mb-3">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.free_delivery_and_installation.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.free_delivery_and_installation.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 2 -->
        <div class="col mb-3">
            <div class="service-item h-100 p-3">
                <h4>{{ __('khadamat-pasazforosh.services.repair_and_maintenance.title') }}</h4>
                <details>
                    <summary>{{ __('khadamat-pasazforosh.services.details_continue') }}</summary>
                    <p>{{ __('khadamat-pasazforosh.services.repair_and_maintenance.description') }}</p>
                </details>
            </div>
        </div>
        <!-- Service 3 -->
        <div class="col mb-3">
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
    <div>
        <div class="faq">
            <!-- FAQ Section Title -->
            <h2 class="faq__title">{{ __('khadamat-pasazforosh.aftersales.title') }}</h2>

            <!-- FAQ Details 1 -->
            <details>
                <summary>{{ __('khadamat-pasazforosh.services.free_delivery_and_installation.title') }}</summary>
                <div class="faqText">
                    <p>{{ __('khadamat-pasazforosh.services.free_delivery_and_installation.description') }}</p>
                </div>
            </details>

            <!-- FAQ Details 2 -->
            <details>
                <summary>{{ __('khadamat-pasazforosh.services.repair_and_maintenance.title') }}</summary>
                <div class="faqText">
                    <p>{{ __('khadamat-pasazforosh.services.repair_and_maintenance.description') }}</p>
                </div>
            </details>

            <!-- FAQ Details 3 -->
            <details>
                <summary>{{ __('khadamat-pasazforosh.services.parts_distribution.title') }}</summary>
                <div class="faqText">
                    <p>{{ __('khadamat-pasazforosh.services.parts_distribution.description') }}</p>
                </div>
            </details>

            <!-- FAQ Details 4 -->
            <details>
                <summary>{{ __('khadamat-pasazforosh.services.training.title') }}</summary>
                <div class="faqText">
                    <p>{{ __('khadamat-pasazforosh.services.training.description') }}</p>
                </div>
            </details>

            <!-- FAQ Details 5 -->
            <details>
                <summary>{{ __('khadamat-pasazforosh.services.product_warranty.title') }}</summary>
                <div class="faqText">
                    <p>{{ __('khadamat-pasazforosh.services.product_warranty.description') }}</p>
                </div>
            </details>

            <!-- FAQ Details 6 -->
            <details>
                <summary>{{ __('khadamat-pasazforosh.services.online_support.title') }}</summary>
                <div class="faqText">
                    <p>{{ __('khadamat-pasazforosh.services.online_support.description') }}</p>
                </div>
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