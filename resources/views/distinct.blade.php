@extends('layouts.app', ['title' => __('distinct.title')])

@section('content')
<style>
    .main_image {
        width: 100%;
        height: 100vh;
        background-image: url("{{ asset('/assets/images/main-slider/Distinc.jpg') }}");
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .main_image img {
        height: 100%;
    }

    .main_image h1 {
        font-size: 100px;
        color: rgba(255, 255, 255, 0.9);
        position: absolute;
        top: 20%;
        left: 10%;
    }

    .outer-container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #e5703e;
        color: white;
        width: 67%;
        direction: rtl;
    }
</style>

<section class="intro_section">
    <div class="main_image lazyloaded">
        <div class="scroll-icon">
            <div class="icon-container">
                <div class="mouse-icon">
                    <div class="wheel"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="separator"></div>

    <div class="outer-container">
        <div class="content-wrapper">
            <div class="panel-content">
                <h2 class="toAnim toDown anim">{{ __('distinct.project_distinction') }}</h2>
                <div class="content">
                    <p>{{ __('distinct.intro_text') }}</p>
                </div>
            </div>
        </div>

        <!-- Button Group -->
        <div class="button-group-outside">
            <!-- View Video Button -->
            <button class="custom-button" onclick="openVideoModal('{{ url(__('distinct.link_video')) }}')">
                {{ __('distinct.view_video') }}
            </button>

            <!-- Download Brochure Button -->
            <button class="custom-button" onclick="window.open('{{ url(__('distinct.brochure-link')) }}', '_blank')">
                {{ __('distinct.download_brochure') }}
            </button>
        </div>
        <!-- Video Modal -->
        <div id="videoModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeVideoModal()">&times;</span>
                <iframe id="videoFrame" width="100%" height="400px" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="additional-box">
    </div>

</section>

<section class="flow_section">
    <div class="container">
        <div class="flow-explain">
            <h2 title="{{ __('distinct.life_project_assistance') }}">{{ __('distinct.life_project_assistance') }}</h2>
            <div class="content">
                <p>{{ __('distinct.project_assistance_text') }}</p>
            </div>
        </div>
        <div class="graphics">
            <div class="flow-step">{{ __('distinct.before_execution') }}</div>
            <div class="flow-step">{{ __('distinct.during_execution') }}</div>
            <div class="flow-step">{{ __('distinct.after_delivery') }}</div>
        </div>

        <div class="flow-lists">
            <!-- Before Execution Section -->
            <div class="flow-list list-1 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">{{ __('distinct.before_execution') }}</div>
                </div>

                <h4 title="Think" class="box-header">{{ __('distinct.design_introduction') }}</h4>
                <div class="content">
                    <ol>
                        <li>{{ __('distinct.before_execution_item_1') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.before_execution_item_2') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.before_execution_item_3') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.before_execution_item_4') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.before_execution_item_5') }}</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>

            <!-- During Execution Section -->
            <div class="flow-list list-2 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">{{ __('distinct.during_execution') }}</div>
                </div>
                <h4 title="Design" class="box-header">{{ __('distinct.execution_method') }}</h4>
                <div class="content">
                    <ol>
                        <li>{{ __('distinct.during_execution_item_1') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.during_execution_item_2') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.during_execution_item_3') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.during_execution_item_4') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.during_execution_item_5') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.during_execution_item_6') }}</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>

            <!-- After Delivery Section -->
            <div class="flow-list list-3 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">{{ __('distinct.after_delivery') }}</div>
                </div>
                <h4 class="box-header">{{ __('distinct.sustainable_production') }}</h4>
                <div class="content">
                    <ol>
                        <li>{{ __('distinct.after_delivery_item_1') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.after_delivery_item_2') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.after_delivery_item_3') }}</li>
                        <div class="divider"></div>
                        <li>{{ __('distinct.after_delivery_item_4') }}</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    function openVideoModal(videoUrl) {
        let modal = document.getElementById('videoModal');
        let iframe = document.getElementById('videoFrame');

        // Ensure it's a YouTube embed link
        let embedUrl = videoUrl.replace("watch?v=", "embed/");

        iframe.src = embedUrl;
        modal.style.display = "block";
    }

    function closeVideoModal() {
        let modal = document.getElementById('videoModal');
        let iframe = document.getElementById('videoFrame');

        modal.style.display = "none";
        iframe.src = ""; 
    }
</script>
@endsection