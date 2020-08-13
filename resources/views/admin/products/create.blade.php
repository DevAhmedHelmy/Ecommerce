@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.products')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">{{trans('admin.products')}}</a></li>

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
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <button class="btn btn-primary">@lang('admin.save')</button>
            <button class="btn btn-success">@lang('admin.save_and_continue')</button>
            <button class="btn btn-info">@lang('admin.copy')</button>
            <button class="btn btn-danger">@lang('admin.delete')</button>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#product_info">@lang('admin.product_info') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#categories">@lang('admin.categories')</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#product_setting">@lang('admin.product_setting')</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#product_media">@lang('admin.product_media')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product_size_weight">@lang('admin.product_size_weight')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#additional_data">@lang('admin.additional_data')</a>
                </li>
              </ul>

              {{-- Tab panes --}}
              <div class="tab-content">
                <div class="tab-pane container active" id="product_info">
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
                                    <label>@lang('admin.' . $locale . '.content')</label>
                                @else
                                    <label>@lang('admin.content')</label>
                                @endif

                                <textarea name="{{ $locale.'[content]' }}" id="{{ $locale.'[content]' }}" placeholder="@lang('admin.' . $locale . '.content')" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            @error("{{ $locale . '.content' ['requried'] }} ")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        @endforeach

                    </div>

                </div>
                <div class="tab-pane container fade" id="categories">...</div>
                <div class="tab-pane container fade" id="product_setting">
                    <div class="d-flex justify-content-between">


                        <div class="col form-group">
                            <label>@lang('admin.color')</label>


                        </div>
                        <div class="col form-group">

                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="product_media">...</div>
                <div class="tab-pane container fade" id="product_size_weight">...</div>

                <div class="tab-pane container fade" id="additional_data">...</div>
              </div>









        {{--  <div class="col-12 text-center">
            <div class="mt-4 d-flex justify-content-between">
                <div class="col form-group">

                    <button type="submit" class="btn btn-success mt-3 text-center"><i class="fa fa-check"></i> @lang('admin.save')</button>
                </div>
            </div>
        </div>  --}}
    </form>

    </div>

    </div>


</div>



@endsection
