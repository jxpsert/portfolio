@extends('pages.admin.layout')

@section('title', __('Dashboard'))

@section('content')
    <h1>{{ __('Welcome') }}, {{ auth()->user()->name }}</h1>
    <div class="row row-cols-4">
        <div class="col text-center">
            <span class="fs-xl fw-bold">{{ $experiences }}</span><br>
            <span>{{ strtolower(__('Experiences')) }}</span>
        </div>
        <div class="col text-center">
            <span class="fs-xl fw-bold">{{ $projects }}</span><br>
            <span>{{ strtolower(__('Projects')) }}</span>
        </div>
        <div class="col text-center">
            <span class="fs-xl fw-bold">{{ $companies }}</span><br>
            <span>{{ strtolower(__('Companies')) }}</span>
        </div>
        <div class="col text-center">
            <span class="fs-xl fw-bold">{{ $categories }}</span><br>
            <span>{{ strtolower(__('Categories')) }}</span>
        </div>
    </div>
@endsection
