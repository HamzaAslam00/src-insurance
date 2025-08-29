@extends('backend.layouts.app')

@section('title', '| '. __('messages.dashboard'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.dashboard')}}</h1>

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.dashboard')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <!-- ROW-1 -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                @if(auth()->user()->user_type == 'admin')
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <a href="{{ route('clients.index') }}">
                            <div class="card overflow-hidden bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h5 class="">{{__('messages.total_clients')}}</h5>
                                            <h2 class="mb-0 number-font">{{ $clientsCount }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h5 class="">{{__('messages.active_policies')}}</h5>
                                        <h2 class="mb-0 number-font">{{ $activeCount }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h5 class="">{{ __('messages.expired_policies') }}</h5>
                                        <h2 class="mb-0 number-font">{{ $expiredCount }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h5 class="">{{ __('messages.cancelled_policies') }}</h5>
                                        <h2 class="mb-0 number-font">{{ $cancelledCount }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- ROW-1 END -->

@endsection
