@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.categories')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">{{trans('admin.categories')}}</a></li>

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

            <form action="{{ route('admin.categories.store') }}" method="post">
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
                            <input type="text" name="{{ $locale.'[name]' }}" id="{{ $locale . '[name]' }}" placeholder="@lang('admin.name')" class="form-control @error("{{ $locale . '.name' }}" ) is-invalid @enderror">
                        </div>
                        @error("{{ $locale . '.name' ['requried'] }} ")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    {{--  input name  --}}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col form-group">
                            @if(count(config('translatable.locales'))>1)
                                <label>@lang('admin.' . $locale . '.description')</label>
                            @else
                                <label>@lang('admin.description')</label>
                            @endif
                            <input type="text" name="{{ $locale.'[description]' }}" id="{{ $locale . '[description]' }}" placeholder="@lang('admin.description')" class="form-control @error("{{ $locale . '.description' }}" ) is-invalid @enderror">
                        </div>
                        @error("{{ $locale . '.description' ['requried'] }} ")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    {{--  input name  --}}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col form-group">
                            @if(count(config('translatable.locales'))>1)
                                <label>@lang('admin.' . $locale . '.keywords')</label>
                            @else
                                <label>@lang('admin.keywords')</label>
                            @endif
                            <input type="text" name="{{ $locale.'[keywords]' }}" id="{{ $locale . '[keywords]' }}" placeholder="@lang('admin.keywords')" class="form-control @error("{{ $locale . '.keyword' }}" ) is-invalid @enderror">
                        </div>
                        @error("{{ $locale . '.keywords' ['requried'] }} ")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    <div class="col form-group">
                        <label>@lang('admin.icon')</label>
                        <input type="text" name="icon"  class="form-control" id="">
                    </div>
                    <div class="col form-group">
                        <label>@lang('admin.categories')</label>
                        <select class="form-control @error('parent





























































































































































































































                        ') is-invalid @enderror" name="parent





























































































































































































































                        ">
                            <option> @lang('admin.choose')</option>
                            @foreach($categories as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        @error('parent





























































































































































































































                        ')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

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
