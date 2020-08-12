@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.sizes') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.sizes.index')}}">@lang('admin.sizes')</a></li>
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


            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.name')</h5>
                <span class="description-text"> {{ $size->name }} </span>
                </div>
            </div>


            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.created_at')</h5>
                <span class="description-text"> {{ $size->created_at->format('Y/m/d') }} </span>
                </div>
            </div>



        </div>



    </div>
</div>

@endsection
