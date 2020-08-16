@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.countries')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.countries.index')}}">{{trans('admin.countries')}}</a></li>

                <li class="breadcrumb-item active">{{trans('admin.create')}}</li>

            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title">  {{  $title }}</h3>
    </div>
    <div class="card-body text-secondary">

        <div class="col-md-12">


            <form action="{{ route('admin.countries.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="{{ $locale.'[name]' }}" id="{{ $locale . '[name]' }}" placeholder="@lang('admin.' . $locale . '.name')" class="form-control @error("$locale.name" ) is-invalid @enderror">
                            @error("$locale.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    @endforeach

                </div>
                <div class="d-flex justify-content-between">

                    <div class="col form-group">
                        <label for="">@lang('admin.currency')</label>
                        <input type="text" name="currency" id="currency" class="form-control @error("currency" ) is-invalid @enderror" placeholder="@lang('admin.currency')">
                        @error("currency")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="">@lang('admin.iso_code')</label>
                        <input type="text" name="iso_code" id="iso_code" class="form-control @error("iso_code" ) is-invalid @enderror" placeholder="@lang('admin.iso_code')">
                        @error("iso_code")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>
                <div class="d-flex justify-content-between">

                    <div class="col form-group">
                        <label for="">@lang('admin.code')</label>
                        <input type="text" name="code" id="code" class="form-control @error("code" ) is-invalid @enderror" placeholder="@lang('admin.code')">
                        @error("code")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="">@lang('admin.logo')</label>
                        <input type="file" name="logo" id="logo" class="form-control @error("logo" ) is-invalid @enderror" placeholder="@lang('admin.logo')">
                        @error("logo")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
