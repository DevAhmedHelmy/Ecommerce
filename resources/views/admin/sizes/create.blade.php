@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.sizes')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.sizes.index')}}">{{trans('admin.sizes')}}</a></li>

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
            <form action="{{ route('admin.sizes.store') }}" method="POST" enctype="multipart/form-data">
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

            <div class="col form-group">
                <label for="category_id">@lang('general.categories')</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">@lang('general.choose')</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="is_public">@lang('general.is_public')</label>
                <select name="is_public" id="is_public" class="form-control">

                     <option value="">@lang('general.choose')</option>
                     <option value="yes">@lang('general.yes')</option>
                     <option value="no">@lang('general.no')</option>

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
