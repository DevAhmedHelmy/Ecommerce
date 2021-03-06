@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.cities')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.cities.index')}}">{{trans('admin.cities')}}</a></li>

                <li class="breadcrumb-item active">{{trans('admin.update')}}</li>

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
                <form action="{{ route('admin.cities.update',$city->id) }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="{{ $locale }}[name]" class="form-control @error( "$locale.name" ) is-invalid @enderror" value="{{ $city->translate($locale)->name }}">
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
                    <label>@lang('admin.countries')</label>
                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                            <option> @lang('admin.choose')</option>
                            @foreach($countries as $key => $value)
                                <option @if($city->country_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        @error("country_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="col form-group">
                </div>
            </div>

            <div class="col-12 text-center">
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">

                        <button type="submit" class="btn btn-success mt-3 text-center"><i class="fa fa-check"></i> @lang('admin.save')</button>
                    </div>
                </div>
            </div>
        </form>

        </div>

    </div>


</div>



@endsection
