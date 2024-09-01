@extends('layouts.app')
@section('content')
    <div class="cursor"></div>

            <!-- Page Title -->
            <section class="page-title" id="to-top-div">
                <div class="auto-container">
                    <h1><span>contact</span></h1>
                    <div class="bread-crumb">
                        <ul class="clearfix">
                            <li><a href="index.html">home</a></li>
                            <li class="current">contact</li>
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
                        <div class="subtitle">get in touch</div>
                        <h3>contact us</h3>
                    </div>

                    <div class="info-box">
                        <div class="row clearfix">
                            <!--Block-->
                            <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="icon-box"><span class="fa fa-phone"></span></div>
                                        <h5>Reception Desk</h5>
                                        <div class="info"><a href="tel:(+01)1234567899">(+01) 123 456 7899</a></div>
                                    </div>
                                </div>
                            </div>
                            <!--Block-->
                            <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="icon-box"><span class="far fa-clock"></span></div>
                                        <h5>Working Hours</h5>
                                        <div class="info">Monday - Friday  /  08:00-17:00</div>
                                    </div>
                                </div>
                            </div>
                            <!--Block-->
                            <div class="info-block col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="icon-box"><span class="fa fa-map-marker-alt"></span></div>
                                        <h5>Address</h5>
                                        <div class="info">Example street nr 23</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-box">
                        <div class="row clearfix">
                            <div class="form-col col-xl-8 col-lg-12 col-md-12 col-sm-12">
                                <h5>Send message</h5>
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
                                    <form method="post" action="" >
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="inner-col col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="field-label"><span class="icon fa fa-user"></span> Name</div>
                                                    <div class="field-inner"><input type="text" name="name" value="" placeholder="" ><i class="dot"></i></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="field-label"><span class="icon far fa-envelope"></span> E-mail</div>
                                                    <div class="field-inner"><input type="email" name="email" value="" placeholder="" ><i class="dot"></i></div>
                                                </div>
                                            </div>
                                            <div class="inner-col col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="field-label">Message</div>
                                                    <div class="field-inner"><textarea name="message" placeholder="" ></textarea><i class="dot"></i></div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="theme-btn btn-style-two"><span>Send Message</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="map-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                <div class="inner">
                                    <div class="map-box"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385284068286!2d144.9535863151755!3d-37.8172509797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2s!4v1656222373994!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection