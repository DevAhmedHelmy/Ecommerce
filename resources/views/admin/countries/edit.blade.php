@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.countries')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.countries.index')}}">{{trans('admin.countries')}}</a></li>

                <li class="breadcrumb-item active">{{trans('admin.update')}}</li>

            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title">  {{  $titleEdit }}</h3>
    </div>

    <div class="card-body text-secondary">

        <div class="col-md-12">
                <form action="{{ route('admin.countries.update',$country->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
            <div class="d-flex justify-content-between">
                {{--  input name  --}}
                @foreach (config('translatable.locales') as $locale)
                    <div class="col form-group">
                        @if(count(config('translatable.locales'))>1)
                            <label>@lang('admin.' . $locale . '.name')</label>

                        @else
                            <label>@lang('admin.name')</label>

                        @endif
                        <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $country->translate($locale)->name }}">

                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    <label>@lang('admin.currency')</label>
                    <input type="text" name="currency" class="form-control ($errors->has('currency') ? ' is-invalid' : '' " value="{{ $country->currency }}" placeholder="@lang('admin.currency')" required>

                </div>
                <div class="col form-group">
                    <label>@lang('admin.iso_code')</label>
                    <input type="text" name="iso_code" class="form-control ($errors->has('iso_code') ? ' is-invalid' : '' " value="{{ $country->iso_code }}" placeholder="@lang('admin.iso_code')" required>

                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">

                    <label>@lang('admin.code')</label>
                    <input type="text" name="code" class="form-control ($errors->has('code') ? ' is-invalid' : '' " value="{{ $country->code }}" placeholder="@lang('admin.code')" required>

                </div>
                <div class="col form-group">
                    <label>@lang('admin.logo')</label>
                        <input type="file" name="logo" class="form-control logo">

                   @if(!empty($country->logo))

                        <img src="{{ Storage::url($country->logo) }}" style="width:50px;height: 50px;" />
                    @endif
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        {!! Form::button('<i class="fa fa-check"></i>'. ' ' .trans('admin.save'), ['class'=>'btn btn-success mt-3 text-center', 'type'=>'submit']) !!}
                    </div>
                </div>
            </div>
        </form>

        </div>

    </div>


</div>



@endsection
