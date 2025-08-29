


@php
    $isEdit = isset($policy);
    $url = $isEdit ? route('policies.update', $policy->id ) : '#';
@endphp
@extends('backend.layouts.app')

@section('title', '| '. __('messages.policy'))

@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.policy')}}: {{ $policy->name }}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.policy')}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 style="text-align: center;" class="mt-3">{{ __('messages.business_details') }}</h3> <br>
                <div class="row mb-5">
                    <!-- Photo of Insured -->
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <a href="javascript:void(0)" id="image-trigger-business">
                            <div class="avatar business-chat-profile upload-button"
                                style="width: 150px; height: 150px; background:none">
                                <img alt="avatar" class="profile-pic businesschat-profile"
                                    src="{{ getImage(old('business_image') ?: ($isEdit ? $client->business_image : null), true) }}"
                                    style="width: 150px; height: 150px;">
                                <label class="mt-2">Photo of Business</label>
                            </div>
                        </a>

                    </div>
                    <!-- Right side fields -->
                    <div class="col-md-9">
                        <div class="row">
                            <!-- Business Name -->
                            <div class="col-md-12">
                                <div class="form-group pe-5">
                                    <input type="text" class="form-control" id="business_name" name="business_name"
                                        placeholder="Enter Business Name"
                                        value="{{ old('business_name', $client->business_name ?? '') }}" disabled>
                                </div>
                            </div>
                            <!-- Owner's Name -->
                            <div class="col-md-6">
                                <div class="form-group pe-5">
                                    <input type="text" class="form-control" id="owner_name" name="owner_name"
                                        placeholder="Enter Owner's Name"
                                        value="{{ old('owner_name', $client->owner_name ?? '') }}" disabled>
                                </div>
                            </div>
                            <!-- Telephone -->
                            <div class="col-md-6">
                                <div class="form-group pe-5">
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Enter Phone" value="{{ old('phone', $client->phone ?? '') }}" disabled>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group pe-5">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ old('email', $client->email ?? '') }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL-END -->
        <div class="col-xl-12">
            <div class="card">
                <div class="tab-menu-heading">
                    <div class="tabs-menu1 d-flex justify-content-between">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#tab25" class="active" data-bs-toggle="tab">{{ __('messages.policy_details') }}</a></li>
                            <li><a href="#tab26" data-bs-toggle="tab">{{ __('messages.notices_files') }}</a></li>
                            <li><a href="#tab27" data-bs-toggle="tab">{{ __('messages.payments') }}</a></li>
                        </ul>
                        <div class="my-auto me-4">
                            <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-sm dark-icon btn-primary" data-method="get"
                                data-title="Back">
                                    <i class="fe fe-arrow-left"></i> {{ __('messages.back') }}
                                </a>

                        </div>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body pb-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab25">
                            <div class="col-xl-12 px-0">
                                <form action="{{ $url }}" method="post" data-form="ajax-form"  data-modal="#ajax_model" data-datatable="#policies_datatable">
                                    @csrf
                                    @if ($isEdit)
                                        @method('PUT')
                                    @endif

                                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">{{ __('messages.policy_name') }}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" @if(auth()->user()->hasRole('client')) disabled @endif  name="name" id="name" value="{{ $isEdit ? $policy->name : '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="company_name">{{ __('messages.insurance_company_name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" @if(auth()->user()->hasRole('client')) disabled @endif  name="company_name" id="company_name" value="{{ $isEdit ? $policy->company_name : '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="policy_type">{{ __('messages.policy_type') }} <span class="text-danger">*</span></label>
                                            <div class="{{ $isEdit ? ($policy->policy_type != 'other' ? '' : 'row') : '' }}">
                                                <select required class="form-control form-select select-style {{ $isEdit ? ($policy->policy_type != 'other' ? 'col-md-12' : 'col-md-4') : 'col-md-12' }}" name="policy_type"
                                                    id="policy_type" @if(auth()->user()->hasRole('client')) disabled @endif>
                                                    <option value="" selected disabled>{{ __('messages.select_policy_type') }}</option>
                                                    <option value="commercial-general-liability" @if($isEdit && $policy->policy_type == 'commercial-general-liability') selected @endif>{{ __('messages.commercial_general_liability') }}</option>
                                                    <option value="worker-compensation" @if($isEdit && $policy->policy_type == 'worker-compensation') selected @endif>{{ __('messages.workers_compensation') }}</option>
                                                    <option value="property" @if($isEdit && $policy->policy_type == 'property') selected @endif>{{ __('messages.property') }}</option>
                                                    <option value="bop" @if($isEdit && $policy->policy_type == 'bop') selected @endif>{{ __('messages.bop') }}</option>
                                                    <option value="package" @if($isEdit && $policy->policy_type == 'package') selected @endif>{{ __('messages.package') }}</option>
                                                    <option value="bond" @if($isEdit && $policy->policy_type == 'bond') selected @endif>{{ __('messages.bond') }}</option>
                                                    <option value="other" @if($isEdit && $policy->policy_type == 'other') selected @endif>{{ __('messages.other') }}</option>
                                                </select>
                                                <div class="col-md-8 other {{ $isEdit ? ($policy->policy_type != 'other' ? 'd-none' : '') : 'd-none' }}">
                                                    <input type="text" class="form-control" name="policy_type_other"
                                                        id="policy_type_other" placeholder="{{ __('messages.explain_other_policy_type') }}"
                                                        value="{{ $isEdit ? $policy->policy_type_other : '' }}" @if(auth()->user()->hasRole('client')) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="policy_number">{{ __('messages.policy_number') }}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" @if(auth()->user()->hasRole('client')) disabled @endif  name="policy_number" id="policy_number" value="{{ $isEdit ? $policy->policy_number : '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="effective_date">{{ __('messages.effective_date') }}</label>
                                            <input type="date" class="form-control" name="effective_date" @if(auth()->user()->hasRole('client')) disabled @endif  id="effective_date" value="{{ $isEdit ? $policy->effective_date : '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="expiration_date">{{ __('messages.expiration_date') }}</label>
                                            <input type="date" class="form-control" name="expiration_date" @if(auth()->user()->hasRole('client')) disabled @endif  id="expiration_date" value="{{ $isEdit ? $policy->expiration_date : '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="premium">{{ __('messages.total_premium') }} <span class="text-danger">*</span></label>
                                            <input type="number" step="0.1" min="0" class="form-control" @if(auth()->user()->hasRole('client')) disabled @endif  name="premium" id="premium" value="{{ $isEdit ? $policy->premium : '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="file">Policy Document
                                                <span class="text-danger">*
                                                    @if($isEdit)
                                                        <small>{{ __('messages.dont_select_file') }}</small>
                                                    @endif
                                                </span>
                                            </label>
                                            <input type="file" class="form-control"
                                                   @if(auth()->user()->hasRole('client')) disabled @endif
                                                   name="file" id="file"
                                                   value="{{ $isEdit ? $policy->file : '' }}">

                                            @if($isEdit && $policy->file)
                                                <a href="{{ getFiles($policy->file) }}" target="_blank"> {{ __('messages.view_existing_file') }}</a>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status">{{ __('messages.status') }}</label>
                                            <select class="form-control select2 form-select form-select-modal" name="status" id="status" @if(auth()->user()->hasRole('client')) disabled @endif>
                                                <option value="active" @if($policy->status == 'active') selected @endif>{{ __('messages.active') }}</option>
                                                <option value="expired" @if($policy->status == 'expired') selected @endif>{{ __('messages.expired') }}</option>
                                                <option value="cancelled" @if($policy->status == 'cancelled') selected @endif>{{ __('messages.cancelled') }}</option>
                                                <option value="pending_cancellation" @if($policy->status == 'pending_cancellation') selected @endif>{{ __('messages.pending_cancellation') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="description">{{ __('messages.notes') }}</label>
                                            <textarea class="form-control" @if(auth()->user()->hasRole('client')) disabled @endif  name="description" id="description">{{ $isEdit ? $policy->description : '' }}</textarea>
                                        </div>
                                    </div>
                                    @if(auth()->user()->hasRole('admin'))
                                        <div class="col-md-12 px-0">
                                            <button type="submit" class="btn btn-primary" @if(auth()->user()->hasRole('client')) disabled @endif  data-button="submit">{{ __('messages.submit') }}</button>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab26">
                            <div class="col-xl-12 px-0">
                            @include('backend.notices.index')

                            </div>
                        </div>
                        <div class="tab-pane" id="tab27">
                            <div class="col-xl-12 px-0">
                            @include('backend.payments.index')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL-END -->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('change', '[name="policy_type"]', function (e) {
            if ($(this).val() == 'other') {
                $(this).siblings('.other').removeClass('d-none');
                $(this).addClass('col-md-4');
                $(this).removeClass('col-md-12');
                $(this).parent().addClass('row');
            } else {
                $(this).siblings('.other').addClass('d-none');
                $(this).addClass('col-md-12');
                $(this).removeClass('col ms-3');
                $(this).parent().removeClass('row');
            }
        });

        $(document).on('change', '#effective_date', function() {
            var effectiveDate = $(this).val();
            if (effectiveDate) {
                var date = new Date(effectiveDate);
                date.setFullYear(date.getFullYear() + 1);
                var expirationDate = date.toISOString().split('T')[0];
                $('#expiration_date').val(expirationDate);
            }
        });
    </script>
@endpush
