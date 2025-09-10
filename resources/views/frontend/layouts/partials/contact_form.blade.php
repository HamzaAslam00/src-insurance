
<!-- Contact Start -->
<div class="container-xxl py-5" id="contact_form">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-6 mb-5">
                    {{ __('messages.if_you_have') }}
                </h1>
                <p class="mb-4">
                    {{ __('messages.have_questions') }}
                </p>
                <form action="{{ route('frontend.contact-us') }}" method="post" data-form="ajax-form" data-form-reset='true'>
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name"placeholder="{{ __('messages.your_name') }}" required/>
                                <label for="name">{{ __('messages.your_name') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('messages.your_email') }}" required/>
                                <label for="email">{{ __('messages.your_email') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{ __('messages.your_phone') }}" required/>
                                <label for="phone">{{ __('messages.your_phone') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="{{ __('messages.subject') }}" required/>
                                <label for="subject">{{ __('messages.subject') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="{{ __('messages.leave_message_here') }}" id="message" name="message" style="height: 100px" required></textarea>
                                <label for="message">{{ __('messages.message') }}</label>
                            </div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-5" type="submit" data-button="submit">
                                {{ __('messages.send_message') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px">
                <div class="position-relative rounded overflow-hidden h-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3027.0274604677124!2d-74.00685742427584!3d40.65132507140281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25ac7af83ffff%3A0x8add5d2a443b349e!2sSRC%20INSURANCE%20BROKERAGE%20INC.!5e0!3m2!1sen!2sbd!4v1713810553158!5m2!1sen!2sbd"
                        width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->