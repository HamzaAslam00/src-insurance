@extends('frontend.layouts.app')

@section('title', '| Home')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-7">
                                    <!-- <p class="fs-5 text-body mb-1"></p> -->
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown">
                                        <!-- Welcome to SRC Insurance General Agency -->
                                        {{ __('messages.we_are_experts') }}
                                    </h1>
                                    <p class="fs-5 text-body mb-4"> {{ __('messages.we_are_experts') }}</p>
                                    <a href="{{ route('frontend.contact-us') }}" class="btn btn-primary py-3 px-5">{{ __('messages.talk_to_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <img class="w-100" src="{{ asset('frontend/img/carousel-3.jpg') }}" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown">
                                        The Best Insurance Begins Here
                                    </h1>
                                    <p class="fs-5 text-body mb-5">
                                        we are committed to providing tailored solutions that protect what matters most to
                                        you.
                                    </p>
                                    <a href="" class="btn btn-primary py-3 px-5">Talk To Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="{{ asset('frontend/img/about.jpg') }}" alt="" style="object-fit: cover" />
                        <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                            style="width: 200px; height: 200px">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                                <h1 class="text-white mb-0">20</h1>
                                <h2 class="text-white">{{ __('messages.years') }}</h2>
                                <h5 class="text-white mb-0">{{ __('messages.experience') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-5">
                            {{ __('messages.who_we_are') }}
                            <!-- We're Here To Assist You With Exploring Protection -->
                        </h1>
                        <p class="mb-4">{{ __('messages.src_insurance_brokerage_inc_was_founded') }}
                        </p>
                        <p class="mb-4">{{ __('messages.95_percent_of_our') }}
                        </p>
                        <p class="mb-4">{{ __('messages.when_we_service') }}</p>
                        <div class="row g-4 mb-4 mt-1">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 me-3 filter-hue" src="{{ asset('frontend/img/icon/icon-04-primary.png') }}" alt="" />
                                    <h5 class="mb-0">{{ __('messages.flexible_insurance_plans') }}</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 me-3 filter-hue" src="{{ asset('frontend/img/icon/icon-03-primary.png') }}" alt="" />
                                    <h5 class="mb-0">{{ __('messages.small_businesses') }}</h5>
                                </div>
                            </div>
                        </div>
                        <!-- <button class="btn btn-primary py-3 px-5" type="submit">
                    Learn More
                  </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-fluid overflow-hidden my-5 px-lg-0">
        <div class="container facts px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 facts-text wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 px-4 ps-lg-0">
                        <h1 class="text-white mb-4">{{ __('messages.for_small_businesses') }}</h1>
                        <p class="text-light mb-5">{{ __('messages.with_a_focus_on') }}

                        </p>
                        <a href="" class="align-self-start btn btn-secondary py-3 px-5">{{ __('messages.more_details') }}</a>
                    </div>
                </div>
                <div class="col-lg-6 facts-counter wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 px-4 pe-lg-0">
                        <div class="row g-5">
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">10</h1>
                                <p class="fs-5 text-primary">{{ __('messages.src_partners') }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">1000</h1>
                                <p class="fs-5 text-primary">{{ __('messages.policies_serviced') }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">20</h1>
                                <p class="fs-5 text-primary">{{ __('messages.years_experience') }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">5</h1>
                                <p class="fs-5 text-primary">{{ __('messages.team_members') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-4">{{ __('messages.our_services') }}</h1>
                    <p class="mb-4">{{ __('messages.we_provide_small_businesses') }}</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-light rounded h-100 p-3">
                                <div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-06-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0 text-uppercase">
                                        {{ __('messages.business_owner_policies') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="bg-light rounded h-100 p-3">
                                <div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-03-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">
                                        {{ __('messages.personal_lines') }}</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="bg-light rounded h-100 p-3">
                                <div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-04-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.commercial') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-07-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.workers_compensation') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-5">
                            <a class="btn btn-primary btn-lg px-5" href="{{ route('frontend.services') }}">{{ __('messages.view_all') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp align-self-center text-center" data-wow-delay="0.5s">
                    <div class="position-relative rounded overflow-hidden">
                        <img src="{{ asset('frontend/img/stock-footage-animation.webp') }}" style="object-fit: cover; border: 1px solid #0292b7; border-radius: 10px;" class="my-auto">
                        {{-- <video style="object-fit: cover; border: 1px solid #0292b7; border-radius: 10px;" class="my-auto" autoplay loop muted>
                            <source src="{{ asset('frontend/img/stock-footage-animation.webp') }}" type="video/webm">
                            Your browser does not support the video tag.
                        </video>
                        <style>
                            #myVideo::-webkit-media-controls {
                                display: none !important;
                            }

                            #myVideo {
                                outline: none;
                            }
                        </style> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Service Start -->
    {{-- <div class="container-fluid why py-5">
        <div class="container py-5">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">
                    Why Choose Us!
                </h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <img class="img-fluid" src="{{ asset('frontend/img/icon/icon-10-light.png') }}" alt="" />
                            </div>
                            <h4 class="mb-0">$450M</h4>
                        </div>
                        <p class="mb-4">
                            We are proud to represent over $450,000,000 in annual written premium for our customers.

                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <img class="img-fluid" src="{{ asset('frontend/img/icon/icon-01-light.png') }}" alt="" />
                            </div>
                            <h4 class="mb-0">26</h4>
                        </div>
                        <p class="mb-4">
                            SRC Insurance joins over 25 members of the Bridge Specialty Group to bring a variety of
                            specialties and scale to better leverage the wholesale brokerage marketplace.

                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <img class="img-fluid" src="{{ asset('frontend/img/icon/icon-05-light.png') }}" alt="" />
                            </div>
                            <h4 class="mb-0">175</h4>
                        </div>
                        <p class="mb-4">
                            We are 175 teammates strong across 3 different offices
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <img class="img-fluid" src="{{ asset('frontend/img/icon/icon-08-light.png') }}" alt="" />
                            </div>
                            <h4 class="mb-0">20+</h4>
                        </div>
                        <p class="mb-4">
                            We work with 20+ binding authority markets to bind policies on behalf of dozens of insurance
                            companies.

                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <img class="img-fluid" src="{{ asset('frontend/img/icon/icon-07-light.png') }}" alt="" />
                            </div>
                            <h4 class="mb-0">Superior</h4>
                        </div>
                        <p class="mb-4">
                            We pride ourselves on offering superior service and some of the most innovative solutions in the
                            industry.

                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <img class="img-fluid" src="{{ asset('frontend/img/icon/icon-06-light.png') }}" alt="" />
                            </div>
                            <h4 class="mb-0">Markets</h4>
                        </div>
                        <p class="mb-4">
                            We have the ability to offer capacity through both admitted and non-admitted markets.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Service End -->

    <!-- Appointment Start -->
    <div class="container-fluid appointment py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.3s">
                    <h6 class="display-6 text-white">
                        {{ __('messages.collaborate_with_us') }}
                    </h6>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex justify-content-end">
                        <a href="#contact_form" class="btn btn-light btn-lg px-5">{{ __('messages.join_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

    {{-- <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">What They Say About Our Insurance</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-left h-100">
                        <img class="img-fluid animated pulse infinite" src="{{ asset('frontend/img/testimonial-1.jpg') }}" alt="" />
                        <img class="img-fluid animated pulse infinite" src="{{ asset('frontend/img/testimonial-2.jpg') }}" alt="" />
                        <img class="img-fluid animated pulse infinite" src="{{ asset('frontend/img/testimonial-3.jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/testimonial-1.jpg') }}" alt="" />
                            <p class="fs-5">
                                "I've been a client of SRC Insurance General Agency for several years now, and I couldn't be
                                happier with their service. Their team is always responsive, knowledgeable, and goes above
                                and beyond to ensure that my insurance needs are met. I highly recommend SRC Insurance to
                                anyone looking for reliable insurance solutions."
                            </p>
                            <h5>Sarah T.</h5>
                            <span>Business Owner</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/testimonial-2.jpg') }}" alt="" />
                            <p class="fs-5">
                                "Switching to SRC Insurance General Agency was one of the best decisions I've made for my
                                family's insurance needs. From our home to our vehicles, they took the time to understand
                                our requirements and found us comprehensive coverage at competitive rates. Now, I have peace
                                of mind knowing that we're properly protected. Thank you, SRC Insurance!"


                            </p>
                            <h5>David M.</h5>
                            <span>Homeowner</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/testimonial-3.jpg') }}" alt="" />
                            <p class="fs-5">"As a small business owner, finding the right insurance coverage can be
                                daunting. However, SRC Insurance General Agency made the process seamless. Their team guided
                                me through the options, answered all my questions, and helped me secure the perfect policy
                                for my business. I'm grateful for their professionalism and expertise."


                            </p>
                            <h5>Smith W.</h5>
                            <span>Small Business Owner
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-right h-100">
                        <img class="img-fluid animated pulse infinite" src="{{ asset('frontend/img/testimonial-1.jpg') }}" alt="" />
                        <img class="img-fluid animated pulse infinite" src="{{ asset('frontend/img/testimonial-2.jpg') }}" alt="" />
                        <img class="img-fluid animated pulse infinite" src="{{ asset('frontend/img/testimonial-3.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- partner Start -->
    <div class="container-fluid partner py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">Our Carrier Partners</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="owl-carousel partners">
                        <div class="partner-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/partners/partner_attune-bianco.jpg') }}"
                                alt="" />
                        </div>
                        <div class="partner-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/partners/partner_cna.jpg') }}" alt="" />
                        </div>
                        <div class="partner-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/partners/partner_hiscox.jpg') }}" alt="" />
                        </div>
                        <div class="partner-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/partners/partner_otsego.jpg') }}" alt="" />
                        </div>
                        <div class="partner-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/partners/partner_usli.jpg') }}" alt="" />
                        </div>
                        <div class="partner-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('frontend/img/partners/partner_utica.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partner End --> --}}
@endsection
