<footer class="main-footer">
    <button class="scroll-top scroll-to-target" data-target="html" id="scroll-to-top">
        <span class="icon fa fa-arrow-alt-circle-up"></span>
    </button>
    <div class="footer-inner">
        <div class="auto-container">
            <div class="footer-logo">
                <a href="index.html"><img src="/assets/images/logo.png" alt="{{ __('footer.alt_logo') }}"></a>
            </div>
            <div class="info">
                <div class="row clearfix">
                    <!-- Address Block -->
                    <div class="info-block col-lg-6 col-md-6 col-sm-12">
                        <div class="i-title">{{ __('footer.address_title') }}</div>
                        <div class="text">
                            <span>{{ __('footer.factory_1_label') }}:</span> {{ __('footer.factory_1_address') }} 
                            <br>
                            <span>{{ __('footer.factory_2_label') }}:</span> {{ __('footer.factory_2_address') }} 
                            <br>
                            <span>{{ __('footer.head_office_label') }}:</span> {{ __('footer.head_office_address') }}
                        </div>
                    </div>
                    <!-- Contact Block -->
                    <div class="info-block col-lg-6 col-md-6 col-sm-12">
                        <div class="i-title">{{ __('footer.contact_title') }}</div>
                        <div class="text contactDetail">
                            <span class="icon fa fa-phone" style="color: #f05928;"></span> 
                            <a href="tel:+9821203026">{{ __('footer.phone1') }}</a> 
                            <br>
                            <span class="icon fa fa-phone" style="color: #f05928;"></span> 
                            <a href="tel:+9821203027">{{ __('footer.phone2') }}</a> 
                            <br>
                            <span class="icon fa fa-mobile-alt" style="color: #f05928;"></span> 
                            <a href="tel:+989011779898">{{ __('footer.mobile') }}</a> 
                            <br>
                            <span class="icon fa fa-envelope" style="color: #f05928;"></span> 
                            <a href="mailto:info@brickind.com">{{ __('footer.email') }}</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="loc-info">
                <a href="https://maps.app.goo.gl/4XxYkAToJHVHrEEW9">
                    <span class="icon fa fa-map-marker-alt"></span> {{ __('footer.map_directions') }}
                </a>
            </div>
        </div>
    </div>
</footer>
