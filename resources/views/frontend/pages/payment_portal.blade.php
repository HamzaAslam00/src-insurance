@extends('frontend.layouts.app')

@section('title', '| Payment Portal')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">Payment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Payment Portal
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
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="mb-4 mt-1">
                        Make a Payment</h1>
                    <p class="mb-3">
                        Please enter your payment information below
                    </p>
                    <div class="rounded">
                        <div class="d-flex align-items-center bg-white rounded ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-5">
                        <div class="mb-5">
    
                        </div>
                        <form>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">PAYER</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">EMAIL ADDRESS</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">PRODUCER NUMBER</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">INVOICE/POLICY NUMBER</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="gmail" placeholder="Gurdian Email" />
                                        <label for="gmail">AMOUNT</label>
                                    </div>
                                </div>
    
                                <div class="mt-5">
                                    <h6>PAYMENT TYPE</h6>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="card" id="creditBtn"
                                                    value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Credit Card
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="card" id="achBtn"
                                                    value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    ACH
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="creditDiv" class="row">
    
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                            <label for="gname">Name on Card</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="gname"
                                                placeholder="Gurdian Name" />
                                            <label for="gname">Credit Card Number</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="gname"
                                                placeholder="Gurdian Name" />
                                            <label for="gname">Month (MM)</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="gname"
                                                placeholder="Gurdian Name" />
                                            <label for="gname">Year (YYYY)</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="gname"
                                                placeholder="Gurdian Name" />
                                            <label for="gname">CVC</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="gname"
                                                placeholder="Gurdian Name" />
                                            <label for="gname">Postal Code</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="achDiv" class="row hidden">
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                            <label for="gname">Bank Account Holder Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="gname"
                                                placeholder="Gurdian Name" />
                                            <label for="gname">Routing Nummber</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                            <label for="gname">Account Number</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                            <label for="gname">Confirm Account Number</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-sm-6">
                                    <div class="mt-5">
                                        <h6>ATTACHMENTS</h6>
                                    </div>
                                    <div class="form-floating">
                                        <input type="file" class="form-control" id="gname" placeholder="Gurdian Name" />
                                        <label for="gname">ATTACHMENTS</label>
                                    </div>
                                </div>
    
                                <div class="col-sm-6">
                                    <div class="mt-5">
                                        <h6>NOTES</h6>
                                    </div>
                                    <div class="form-floating">
                                        <textarea name="" class="form-control" id="" cols="" rows="10"></textarea>
                                        <label for="gname">NOTES</label>
                                    </div>
                                </div>
    
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="checkbox" class="" id="cname" placeholder="" /> Save my bank
                                        account/card for future use
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="checkbox" class="" id="cname" placeholder="" /> I Agree Terms &
                                        Conditions.
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary py-3 px-5" type="submit">
                                        Send
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