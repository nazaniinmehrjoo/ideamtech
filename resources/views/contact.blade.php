@extends('layouts.app2', ['title' => 'تماس با ما'])
@section('content')
<div class="cursor"></div>

<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <!-- <h1><span>ارتباط با ما</span></h1> -->
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="index.html">خانه</a></li>
                <li class="current">ارتباط با ما</li>
            </ul>
        </div>
    </div>
</section>
<!--End Banner Section -->


<!--Contact Section-->
<section class="contact-section">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <div class="subtitle">با تیم برنادرارتباط باشید</div>
            <h3>ارتباط با ما</h3>
        </div>

        <div class="info-box">
            <div class="row clearfix">
                <!--Block-->
                <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa fa-phone"></span></div>
                            <h5>شماره تماس</h5>
                            <div class="info"><a href="tel:(+01)1234567899">021-88302036</a></div>
                        </div>
                    </div>
                </div>
                <!--Block-->
                <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="far fa-clock"></span></div>
                            <h5>ساعت کاری</h5>
                            <div class="info">شنبه - پنج شنبه / 08:00-17:00</div>
                        </div>
                    </div>
                </div>
                <!--Block-->
                <div class="info-block col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa fa-map-marker-alt"></span></div>
                            <h5>آدرس</h5>
                            <div class="info">
                            دفتر مرکزی تهران: خیابان گاندی، نبش کوچه 8، ساختمان مروارید، طبقه سوم، واحد 9
                            <br>
                                 کارخانه 1 : جاده قدیم قم-کاشان، بعد از پل جمکران کوچه عدل
                                <br>    
                                 کارخانه 2: اتوبان تهران-قم، شهرک صنعتی محمود آباد
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-box" style="background-color:#343a40;border-radius: 18px;">
            <div class="row clearfix">
                <div class="form-col col-xl-8 col-lg-12 col-md-12 col-sm-12">
                    <h5></h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('payamkarbar'))
                        <div class="alert alert-success">
                            <div>
                                {{session('payamkarbar')}}
                            </div>
                        </div>

                    @endif
                    <div class="contact-form">
                        <form method="post" action="">
                            @csrf
                            <div class="row clearfix">
                                <div class="inner-col col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="field-label"><span class="icon fa fa-user"></span> نام </div>
                                        <div class="field-inner"><input type="text" name="name" value=""
                                                placeholder=""><i class="dot"></i></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-label"><span class="icon far fa-envelope"></span>نام خانوادگی
                                        </div>
                                        <div class="field-inner"><input type="email" name="email" value=""
                                                placeholder=""><i class="dot"></i></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-label"><span class="icon fa fa-phone"></span>شماره تماس</div>
                                        <div class="field-inner"><input type="email" name="email" value=""
                                                placeholder=""><i class="dot"></i></div>
                                    </div>
                                </div>
                                <div class="inner-col col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="field-label">پیام شما</div>
                                        <div class="field-inner"><textarea name="message" placeholder=""></textarea><i
                                                class="dot"></i></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn btn-style-two"><span>ثبت</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="map-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="map-box"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d202.37435577121454!2d51.41236873933295!3d35.751058109808554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1730210128395!5m2!1sen!2s"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                style="border-radius: 18px;"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection