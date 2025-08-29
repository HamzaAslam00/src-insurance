@extends('frontend.layouts.app')

@section('title', '| '. __('messages.services'))

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">{{ __('messages.services') }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.services') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-4">{{ __('messages.our_people') }}
                    </h1>
                    <p class="mb-4">
                        {{ __('messages.src_insurance_is_one_of') }}
                    </p>
                    <div class="row g-3">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <a href="{{ route('frontend.request-a-quote') }}?business_owners_policy"><div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-05-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.commercial_packages') }}</h5>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <a href="{{ route('frontend.request-a-quote') }}?business_owners_policy"><div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-07-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.excess_umbrella') }}</h5>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <a href="{{ route('frontend.request-a-quote') }}?business_owners_policy"><div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-03-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.business_owners_policy') }}</h5>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <a href="{{ route('frontend.request-a-quote') }}?worker_compensation"><div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-01-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.disability') }}</h5>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <a href="{{ route('frontend.request-a-quote') }}?worker_compensation"><div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-07-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.workers_compensation') }}</h5>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-light rounded h-100 p-3">
                                <a href="{{ route('frontend.request-a-quote') }}?worker_compensation"><div
                                    class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                    <img class="align-self-center mb-3 filter-hue" src="{{ asset('frontend/img/icon/icon-07-primary.png') }}"
                                        alt="" />
                                    <h5 class="mb-0">{{ __('messages.personal_lines') }}</h5>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

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
                        <a href="" class="btn btn-light btn-lg px-5">{{ __('messages.join_us') }}</a>
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
