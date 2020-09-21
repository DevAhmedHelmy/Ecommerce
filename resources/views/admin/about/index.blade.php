@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.about')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{adminUrl('')}}">{{trans('admin.dashboard')}}</a></li>

                <li class="breadcrumb-item active">{{trans('admin.about')}}</li>

            </ol>
          </div><!-- /.col -->
@endsection
@section('content')

@if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title">  {{  $title }}</h3>
    </div>
    <div class="card-body text-secondary">

        <div class="col-md-12">


            <form action="{{ route('admin.save.about') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <input type="hidden" name="id" value="{{isset($about) ? $about->id : ''}}">

                <div class="d-flex justify-content-between">
                    {{--  input name  --}}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col form-group">
                            @if(count(config('translatable.locales'))>1)
                                <label>@lang('admin.' . $locale . '.title')</label>
                            @else
                                <label>@lang('admin.title')</label>
                            @endif

                            <input type="text" name="{{ $locale.'[title]' }}" id="{{ $locale . '[title]' }}" placeholder="@lang('admin.' . $locale . '.title')" class="form-control @error("$locale.title" ) is-invalid @enderror" value="{{ isset($about) ? $about->translate($locale)->title : '' }}">
                            @error("$locale.title")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    {{--  input name  --}}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col form-group">
                            @if(count(config('translatable.locales'))>1)
                                <label>@lang('admin.' . $locale . '.content')</label>
                            @else
                                <label>@lang('admin.content')</label>
                            @endif
                            @if(!isset($about))
                            <textarea name="{{ $locale.'[description]' }}" id="{{ $locale.'[description]' }}" placeholder="@lang('admin.' . $locale . '.description')" class="form-control" cols="30" rows="10"></textarea>
                            @else
                            <textarea name="{{ $locale.'[description]' }}" id="{{ $locale.'[description]' }}" placeholder="@lang('admin.' . $locale . '.description')" class="form-control" cols="30" rows="10">{{ $about->translate($locale)->description }}</textarea>

                            @endif
                        </div>
                        @error("{{ $locale . '.description' ['requried'] }} ")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    <div class="col form-group">
                        <label for="">@lang('admin.image')</label>
                        <input type="file" name="image" id="image" class="form-control @error("image" ) is-invalid @enderror" placeholder="@lang('admin.image')">
                        @error("image")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if(!empty($about->logo))

                        <img src="{{ Storage::url($about->logo) }}" style="width:50px;height: 50px;" />
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
