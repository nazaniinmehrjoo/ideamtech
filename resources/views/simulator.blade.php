@extends('layouts.app2', ['title' => __('simulator.title')])

@section('content')
<style>
    .similatorButton {
        padding: 12px 30px;
        border-radius: 16px;
        border: 2px solid #5b5a59;
        background-color: #5b5a59;
        color: white;
        font-size: 16px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        width: 110px;
        display: block;
        margin: auto;
        
    }

    .similatorButton:hover {
        background-color: #ff4500;
        border: 2px solid #ff4500;

        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    .similatorButtonContainer p {
        text-align: center;
        color: #b9b9b9 !important;
        font-size: 18px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .similatorButtonContainer {
        text-align: center;
        margin-top: 40px;
        padding: 25px;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        align-items: center; 
        justify-content: center;ِّ
    }

    /* Modal styles */
    #similatorPdfModal  {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.5s ease-in-out;
    }

    #similatorPdfModal .modal-content {
        border-radius: 15px;
        max-width: 90%;
        overflow-y: auto;
        position: relative;
    }

    #similatorPdfModal .modal iframe {
        width: 100%;
        height: 500px;
        border: none;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 30px;
        color: #ff6347;
        cursor: pointer;
    }

    .close-btn:hover {
        color: #ff4500;
    }

    .download-btn {
        background-color: #ff6347;
        padding: 12px 30px;
        color: white;
        border-radius: 50px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        margin-top: 20px;
        display: inline-block;
        transition: all 0.3s ease-in-out;
    }

    .download-btn:hover {
        background-color: #ff4500;
        transform: translateY(-5px);
    }

    /* Animations */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>

<!-- Banner Section -->
<section class="banner-seven">
    <div class="banner-container">
        <div class="banner-slider-outer">
            <div class="slider-box">
                <div class="banner-slider-five">
                    <!-- Slide Item -->
                    <div class="slide-item">
                        <img src="/assets/images/main-slider/similator1.jpg" class="image-layer" alt="{{ __('simulator.slide_1_title') }}">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <h3><span>{{ __('simulator.slide_1_title') }}</span></h3>
                                            <div class="similatorButtonContainer pager-item">
                                            <p> {{ __('simulator.similatortext') }}</p>
                                            <button class="theme-btn btn-style-two" onclick="openPdfViewer()">
                                                {{ __('simulator.similatorbutton') }}
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="slide-item">
                        <img src="/assets/images/main-slider/similator2.jpg" class="image-layer" alt="{{ __('simulator.slide_2_title') }}">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <h3><span>{{ __('simulator.slide_2_title') }}</span></h3>
                                            <div class="similatorButtonContainer pager-item">
                                            <p>{{ __('simulator.similatortext') }}</p>
                                            <button class="theme-btn btn-style-two" onclick="openPdfViewer()">
                                                {{ __('simulator.similatorbutton') }}
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="slide-item">
                        <img src="/assets/images/main-slider/similatornew.jpeg" class="image-layer" alt="{{ __('simulator.slide_3_title') }}">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <h3><span>{{ __('simulator.slide_3_title') }}</span></h3>
                                            <div class="similatorButtonContainer pager-item">
                                            <p>{{ __('simulator.similatortext') }}</p>
                                            <button class="theme-btn btn-style-two" onclick="openPdfViewer()">
                                                {{ __('simulator.similatorbutton') }}
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pager-content" data-scrollbar="">

                    <div class="pager-outer">
                        <div class="pager-box">
                            <div class="pager-two">
                                <a href="" class="pager-item active" data-slide-index="0" style="direction:rtl;text-align: center;">
                                    <div class="inner">
                                        <div class="text">
                                            <strong>{{ __('simulator.pager_1_text') }}</strong>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="pager-item" data-slide-index="1" style="direction:rtl;text-align: center;">
                                    <div class="inner">
                                        <div class="text">
                                            <strong>{{ __('simulator.pager_2_text') }}</strong>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="pager-item" data-slide-index="2" style="direction:rtl;text-align: center;">
                                    <div class="inner">
                                        <div class="text">
                                            <strong>{{ __('simulator.pager_3_text') }}</strong>
                                        </div>
                                    </div>
                                </a>
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Modal for PDF viewer -->
<div id="similatorPdfModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closePdfViewer()">&times;</span>
        <iframe src="{{ url(__('simulator.link-file')) }}" width="100%" height="500px"></iframe>
    </div>
</div>

<script>
    function openPdfViewer() {
        document.getElementById('similatorPdfModal').style.display = 'flex';
    }

    function closePdfViewer() {
        document.getElementById('similatorPdfModal').style.display = 'none';
    }
</script>

@endsection
