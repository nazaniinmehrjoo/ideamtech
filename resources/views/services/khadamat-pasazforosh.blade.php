@extends('layouts.app2')

@section('content')
<!-- Include Bootstrap CSS -->
<style>

    .services,
    .faq,
    .contact {
        background-color: #282828;
        color: #dcdcdc;
        padding: 50px 20px;
    }

    .section-title {
        color: white;
        margin-bottom: 30px;
    }

    .service-item,
    .faq-item,
    .contact form {
        background: #2a2a2a;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .service-item:hover,
    .faq-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .service-item h4,
    .faq summary,
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
    <h1>خدمات پس از فروش</h1>
    <p>به طور کل خدمات پس از فروش مجموعه اطلاعات و خدمات وآموزش ها و راهنمایی ها و ضمانت هایی است که یک شرکت به مشتریان اعلام میکند</p>
    <div class="joinUsBtnContainer">
        <button class="joinUsbtnContent">
            <svg width="200px" height="6q0px" viewBox="0 0 200 60">
                <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line"></polyline>
                <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line"></polyline>
            </svg>
            <span>پیوستن به خانواده&zwnj;ی برناگستر</span>
        </button>
    </div>
</section>


<!-- Services Section with Bootstrap Grid -->
<section class="services text-center">
    <h2 class="section-title"></h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>ارسال. نصب و راه اندازی رایگان </h4>
                <details>
                    <summary>ادامه</summary>
                    <p>
                        شامل خدماتی می باشد که درزمانی که محصول و یا قطعه با مشکل روبرو میشود ،نیرو های متخصص نسبت نعمیر محصول اقدام میکنند
                    </p>
                </details>
            </div>
        </div>
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>تعمیرات و نگهداری محصول</h4>
                <details>
                    <summary>ادامه</summary>
                    <p>
                        شامل خدماتی می باشد که درزمانی که محصول و یا قطعه با مشکل روبرو میشود ،نیرو های متخصص نسبت نعمیر محصول اقدام میکنند
                    </p>
                </details>
            </div>
        </div>
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>تهیه و توزیع قطعات محصول</h4>
                <details>
                    <summary>ادامه</summary>
                 <p>
                    شامل فروش کلیه قطعات مصنوعی محصول میباشد که به صورت کلی و جزیی برای مشتری در اسرع وقت ارسال میگردد
                 </p>
                </details>
            </div>
        </div>
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>آموزش</h4>
                <details>
                    <summary>ادامه</summary>
                    <p>
                        آموزش و ارایه اطلاعات مفید از جمله اطلاعات فنی،عمومی و تخصصی
                    </p>
                </details>
            </div>
        </div>
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>گارانتی محصول</h4>
                <details>
                    <summary>ادامه</summary>
                    <p>
                        تعدیست که شرکت به مشتریان خود میدهد دراین صورت که در مدت زمان مشخصی و محدودی از زمان خری یا نصب چناچه محصول دچار مشکل شود مشتریان نسبت به تعویض یا تعمیر رایگان اقدام خواهند  کرد
                    </p>
                </details>
            </div>
        </div>
        <div class="col">
            <div class="service-item h-100 p-3">
                <h4>پشتیلبانی آنلاین</h4>
                <details>
                    <summary>ادامه</summary>
                    <p>
                        ارایه خدمات پشتیبانی آنلاین شامل پاسخ گویی سریع به سوالات و ابهامات فوری مشتریان
                    </p>
                </details>
            </div>
        </div>
    </div>
</section>


<!-- FAQ Section with Accordion Style -->
<section class="faq text-center">
    <h2 class="section-title">Frequently Asked Questions</h2>
    <div class="accordion w-75 mx-auto" id="faqAccordion">
        <div class="accordion-item faq-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq1">
                    How do I request service?
                </button>
            </h3>
            <div id="faq1" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Contact us using the form below or call our support line for assistance. We're here to help!
                </div>
            </div>
        </div>
        <div class="accordion-item faq-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq2">
                    What types of services are included?
                </button>
            </h3>
            <div id="faq2" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Our services include setup, maintenance, repairs, and spare parts supply, all tailored to support
                    your specific needs.
                </div>
            </div>
        </div>
        <div class="accordion-item faq-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq3">
                    Do you offer on-site assistance?
                </button>
            </h3>
            <div id="faq3" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Yes, our technicians can provide on-site support when needed. We aim to minimize your equipment
                    downtime.
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function contactSupport() {
        window.location.href = 'mailto:info@brickind.com';
    }
</script>
@endsection