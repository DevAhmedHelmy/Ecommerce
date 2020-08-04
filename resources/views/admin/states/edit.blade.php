@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.states')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.states.index')}}">{{trans('admin.states')}}</a></li>

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
                <form action="{{ route('admin.states.update',$state->id) }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $state->translate($locale)->name }}">

                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    <label>@lang('admin.countries')</label>
                        <select class="form-control" name="country_id">
                            <option> @lang('admin.choose')</option>
                            @foreach($countries as $key => $value)
                                <option @if($state->country_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>

                </div>
                <div class="col form-group">
                    <label>@lang('admin.states')</label>
                        <select class="form-control" name="city_id">
                            <option> @lang('admin.choose')</option>
                            @foreach($states as $key => $value)
                                <option @if($state->state_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
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
