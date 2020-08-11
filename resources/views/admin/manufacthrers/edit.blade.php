@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.manufacthrers')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.manufacthrers.index')}}">{{trans('admin.manufacthrers')}}</a></li>

                <li class="breadcrumb-item active">{{trans('admin.update')}}</li>

            </ol>
          </div><!-- /.col -->
@endsection
@push('js')
@php
       $latitude = !empty($manufacthrer->latitude)? $manufacthrer->latitude : '27.140114909636054';
       $longitude = !empty($manufacthrer->longitude)? $manufacthrer->longitude : '29.471013069152864';

@endphp
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyDUWP2b1y4vXGJwjjt4W9QI-FZhZV8PMjI'></script>
    {{--  <script src="{{asset('adminPanal/js/google_map.js')}}"></script>  --}}
    <script src="{{asset('adminPanal/js/locationpicker.jquery.js')}}"></script>
    <script>
        $('#us1').locationpicker({
            location: {
                latitude: {{ $latitude }},
                longitude: {{ $longitude }}
            },
            radius: 300,
            markerIcon: "{{asset('adminPanal/uploads/map-marker-2-xl.png')}}",
            inputBinding: {
                latitudeInput: $('#latitude'),
                longitudeInput: $('#longitude'),
                //radiusInput: $('#us2-radius'),
                locationNameInput: $('#address')
            }

        });
    </script>
@endpush
@section('content')
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title">  {{  $title }}</h3>
    </div>

    <div class="card-body text-secondary">

        <div class="col-md-12">
                <form action="{{ route('admin.manufacthrers.update',$manufacthrer->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                <input type="hidden" value="{{ $latitude }}" id="latitude" name="latitude">
                <input type="hidden" value="{{ $longitude }}" id="longitude" name="longitude">
            <div class="d-flex justify-content-between">
                {{--  input name  --}}
                @foreach (config('translatable.locales') as $locale)
                    <div class="col form-group">
                        @if(count(config('translatable.locales'))>1)
                            <label>@lang('admin.' . $locale . '.name')</label>

                        @else
                            <label>@lang('admin.name')</label>

                        @endif
                        <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $manufacthrer->translate($locale)->name }}">

                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-between">
                {{--  input name  --}}
                @foreach (config('translatable.locales') as $locale)
                    <div class="col form-group">
                        @if(count(config('translatable.locales'))>1)
                            <label>@lang('admin.' . $locale . '.contact_name')</label>

                        @else
                            <label>@lang('admin.contact_name')</label>

                        @endif
                        <input type="text" name="{{ $locale }}[contact_name]" class="form-control" value="{{ $manufacthrer->translate($locale)->contact_name }}">

                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    <label>@lang('admin.email')</label>
                    <input type="text" name="email" class="form-control" value="{{ $manufacthrer->email }}">
                </div>
                <div class="col form-group">
                    <label>@lang('admin.phone')</label>
                    <input type="text" name="phone" class="form-control" value="{{ $manufacthrer->phone }}">
                </div>


            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    <label>@lang('admin.facebook')</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $manufacthrer->facebook }}">
                </div>
                <div class="col form-group">
                    <label>@lang('admin.twitter')</label>
                    <input type="text" name="twitter" class="form-control" value="{{ $manufacthrer->twitter }}">
                </div>


            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    <label>@lang('admin.website')</label>
                    <input type="text" name="website" class="form-control" value="{{ $manufacthrer->website }}">
                </div>
                <div class="col form-group">
                    <label>@lang('admin.address')</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $manufacthrer->address }}">
                </div>


            </div>
            <div class="d-flex justify-content-between">

                <div class="col form-group">
                    <label>@lang('admin.logo')</label>
                        <input type="file" name="logo" class="form-control logo">
                </div>
                <div class="col form-group">

                </div>

            </div>
            <div class="d-flex justify-content-between">
                <div id="us1" style="width: 500px; height: 400px;"></div>
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
