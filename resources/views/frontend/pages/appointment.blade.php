@extends('frontend.layouts.app')

@section('title', '| Appointment')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Appointment
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Appointment Start -->
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 mb-3">
                        We're Award Winning Insurance Company
                    </h1>
                    <p class="mb-4 mt-4">
                        Please respond to that email with your filled in and completed Producer Agreement, W-9, Current E&O
                        Coverage, and Active State P&C Brokers Licenses.
                    </p>
                    <p class="mb-4">Please note: All paperwork must match the name on the W-9.
    
                    </p>
                    <p>You will receive a confirmation email shortly after you click ‘submit.’
    
                    </p>
                    <div class="rounded">
                        <div class="d-flex align-items-center bg-white rounded ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-5">
                        <div class="text-center mb-4">
                            <h3>Sign up to do business with us!
                            </h3>
                        </div>
                        <form>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">Entity Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">Owner Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="gmail" placeholder="Gurdian Email" />
                                        <label for="gmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="cname" placeholder="Child Name" />
                                        <label for="cname">Phone</label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="checkbox" class="" id="cname" placeholder="" /> Face to Face
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="checkbox" class="" id="cname" placeholder="" /> Virtual Video Call
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="checkbox" class="" id="cname" placeholder="" /> Phone Call
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary py-3 px-5" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
@endsection