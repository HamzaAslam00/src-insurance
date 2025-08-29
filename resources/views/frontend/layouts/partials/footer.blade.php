<!-- Footer Start -->
<div class="container-fluid bg-dark footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="text-white mb-4 text-center">
                    <img class="img-fluid me-3" src="{{ asset('frontend/img/logo-insurance-preview.png') }}" alt="" />
                </h1>
                <p> {{ __('messages.src_insurance_brokerage_inc_was') }}</p>
                {{-- <div class="d-flex pt-2">
                    <a class="btn btn-square me-1" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square me-0" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                </div> --}}
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">{{ __('messages.quick_links') }}</h5>
                <a class="btn btn-link text-uppercase" href="{{ route('frontend.about-us') }}">{{ __('messages.about_us') }}</a>
                <a class="btn btn-link text-uppercase" href="{{ route('frontend.contact-us') }}">{{ __('messages.contact_us') }}</a>
                <a class="btn btn-link text-uppercase" href="{{ route('frontend.services') }}">{{ __('messages.our_services') }}</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">{{ __('messages.address') }}</h5>
                <p>
                    <i class="fa fa-map-marker-alt me-3"></i> {{ __('messages.src_insurance_brokerage_inc') }}
                </p>
                <p><i class="fa fa-phone-alt me-3"></i>718-438-0400</p>
                <p><i class="fa fa-envelope me-3"></i>INFO@SRCINSURANCE.COM</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="wow fadeIn" data-wow-delay="0.5s" style="min-height: 150px">
                    <div class="position-relative rounded overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3027.0274604677124!2d-74.00685742427584!3d40.65132507140281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25ac7af83ffff%3A0x8add5d2a443b349e!2sSRC%20INSURANCE%20BROKERAGE%20INC.!5e0!3m2!1sen!2sbd!4v1713810553158!5m2!1sen!2sbd"
                            height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                {{-- <h5 class="text-light mb-4">Newsletter</h5>
                <p>Subscribe to our newsletter to receive the latest updates, industry news, and exclusive offers from
                    SRC Insurance General Agency.</p>
                <div class="position-relative mx-auto" style="max-width: 400px">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email" />
                    <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        SignUp
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <hr>
                <div class="col-md-12 text-center mb-3 mb-md-0">
                    ©2024 ALL RIGHTS RESERVED SRC INSURANCE BROKERAGE INC.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
