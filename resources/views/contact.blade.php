@extends('layouts.app2', ['title' => __('contact.breadcrumbs.contact')])
@section('content')
<div class="cursor"></div>

<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="index.html">{{ __('contact.breadcrumbs.home') }}</a></li>
                <li class="current">{{ __('contact.breadcrumbs.contact') }}</li>
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
            <div class="subtitle">{{ __('contact.subtitle') }}</div>
            <h3>{{ __('contact.section_title') }}</h3>
        </div>

        <div class="info-box">
            <div class="row clearfix">
                <!-- Phone -->
                <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa fa-phone"></span></div>
                            <h5>{{ __('contact.contact_info.phone.title') }}</h5>
                            <div class="info"><a href="tel:{{ __('contact.contact_info.phone.value') }}">{{ __('contact.contact_info.phone.value') }}</a></div>
                        </div>
                    </div>
                </div>
                <!-- Hours -->
                <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="far fa-clock"></span></div>
                            <h5>{{ __('contact.contact_info.hours.title') }}</h5>
                            <div class="info">{{ __('contact.contact_info.hours.value') }}</div>
                        </div>
                    </div>
                </div>
                <!-- Address -->
                <div class="info-block col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa fa-map-marker-alt"></span></div>
                            <h5>{{ __('contact.contact_info.address.title') }}</h5>
                            <div class="info">
                                {{ __('contact.contact_info.address.values.head_office') }}<br>
                                {{ __('contact.contact_info.address.values.factory_1') }}<br>
                                {{ __('contact.contact_info.address.values.factory_2') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-box" style="background-color:#343a40;border-radius: 18px;">
            <div class="row clearfix">
                <div class="form-col col-xl-8 col-lg-12 col-md-12 col-sm-12">
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
                            {{ session('payamkarbar') }}
                        </div>
                    @endif
                    <div class="contact-form">
                        <form method="post" action="">
                            @csrf
                            <div class="row clearfix">
                                <div class="inner-col col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="field-label"><span class="icon fa fa-user"></span> {{ __('contact.form.name') }}</div>
                                        <div class="field-inner"><input type="text" name="name" placeholder=""><i class="dot"></i></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-label"><span class="icon far fa-envelope"></span>{{ __('contact.form.last_name') }}</div>
                                        <div class="field-inner"><input type="email" name="email" placeholder=""><i class="dot"></i></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="field-label"><span class="icon fa fa-phone"></span>{{ __('contact.form.phone') }}</div>
                                        <div class="field-inner"><input type="text" name="phone" placeholder=""><i class="dot"></i></div>
                                    </div>
                                </div>
                                <div class="inner-col col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="field-label">{{ __('contact.form.message') }}</div>
                                        <div class="field-inner"><textarea name="message" placeholder=""></textarea><i class="dot"></i></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn btn-style-two"><span>{{ __('contact.form.submit') }}</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="map-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="map-box"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d202.37435577121454!2d51.41236873933295!3d35.751058109808554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1730210128395!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border-radius: 18px;"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
