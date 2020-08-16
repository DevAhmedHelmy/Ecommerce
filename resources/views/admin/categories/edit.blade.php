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
@push('js')
    <script>
        $(document).ready(function(){
            $('#jstree').jstree({ 'core' : {
                'data' : {!! categories($category->parent_id,$category->id) !!}
            },
            "checkbox" : {
                "keep_selected_style" : false
              }
             });
             $('#jstree').on('changed.jstree',function(e, data){
                var i , j, r =[];
                for(i=0,j=data.selected.length; i < j; i++)
                {
                r.push(data.instance.get_node(data.selected[i]).id);
                }
                $('.parent_id').val(r.join(', '));
             });

        });
    </script>
@endpush
@section('content')
<div class="card border-dark mb-3">

    <div class="card-header">
        <h3 class="card-title">  {{  $title }}</h3>
    </div>

    <div class="card-body text-secondary">
        <div id="jstree"></div>

        <div class="col-md-12">

            <form action="{{ route('admin.categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" class="parent_id" name="parent_id" value="{{ $category->parent_id }}">
                <div class="d-flex justify-content-between">
                    {{--  input name  --}}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col form-group">
                            @if(count(config('translatable.locales'))>1)
                                <label>@lang('admin.' . $locale . '.name')</label>
                            @else
                                <label>@lang('admin.name')</label>
                            @endif
                            <input type="text" name="{{ $locale }}[name]" class="form-control @error("$locale.name") is-invalid @enderror" value="{{ $category->translate($locale)->name }}">
                            @error("$locale.name")
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
                                <label>@lang('admin.' . $locale . '.description')</label>
                            @else
                                <label>@lang('admin.description')</label>
                            @endif
                            <input type="text" name="{{ $locale }}[description]" class="form-control @error("$locale.description" ) is-invalid @enderror" value="{{ $category->translate($locale)->description }}">
                            @error("$locale.description")
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
                                <label>@lang('admin.' . $locale . '.keywords')</label>
                            @else
                                <label>@lang('admin.keywords')</label>
                            @endif

                            <input type="text" name="{{ $locale }}[keywords]" class="form-control @error("$locale.keyword") is-invalid @enderror" value="{{ $category->translate($locale)->keywords }}">
                            @error("$locale.keyword")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    @endforeach

                </div>
                <div class="d-flex justify-content-between">
                    <div class="col form-group">
                        <label>@lang('admin.icon')</label>
                        <input type="file" name="icon"  class="form-control @error("icon") is-invalid @enderror" value="">
                        @error("icon")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if(!empty($category->icon) && \Storage::url($category->icon))
                            <img src="{{ \Storage::url($category->icon) }}" alt="" style="width: 100px; height:100px">
                        @endif
                    </div>
                    <div class="col form-group">

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
