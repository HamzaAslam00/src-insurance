@extends('backend.layouts.app')

@section('title', '| '. __('messages.clients'))

@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.clients_list')}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.clients')}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    {{-- <div class="card">
        <div class="card-body"> --}}
            {{-- @include('backend.clients.form') --}}
            @include('backend.clients.update')

        {{-- </div>
    </div> --}}
@endsection