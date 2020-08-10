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
                    <label>@lang('admin.logo')</label>
                        <input type="file" name="logo" class="form-control logo">
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
