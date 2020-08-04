@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.states') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.states.index')}}">@lang('admin.states')</a></li>
            <li class="breadcrumb-item active">{!! $title  !!}</li>
        </ol>
    </div>
@endsection
@section('content')
<div class="card">

    <div class="card-header">


    </div>
    <div class="card-body">

        <div class="row mb-5">


            <div class="col-sm-3 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.name')</h5>
                <span class="description-text"> {{ $state->name }} </span>
                </div>
            </div>
            <div class="col-sm-3 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.country')</h5>
                <span class="description-text"> {{ $state->country->name }} </span>
                </div>
            </div>
            <div class="col-sm-3 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.country')</h5>
                <span class="description-text"> {{ $state->city->name }} </span>
                </div>
            </div>
            <div class="col-sm-3 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.created_at')</h5>
                <span class="description-text"> {{ $state->created_at->format('Y/m/d') }} </span>
                </div>
            </div>



        </div>



    </div>







</div>

@endsection
