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
@push('js')
    <script>
        $(document).ready(function(){
            $('#jstree').jstree({ 'core' : {
                'data' : {!! categories() !!}
            },
            "checkbox" : {
                "keep_selected_style" : true
              },
              "plugins" : [ "wholerow" ]
             });

        });
        $('#jstree').on('changed.jstree',function(e, data){
            var i , j,r  =[];
            var name = [];
            for(i=0,j=data.selected.length; i < j; i++)
            {
                r.push(data.instance.get_node(data.selected[i]).id);
                name.push(data.instance.get_node(data.selected[i]).text);
            }

            $('#delete_category').attr('href',"{{ adminUrl('categories') }}/"+r.join(', '));
            $('.cat_name').text(name,r.join(', '));


            if(r.join(', ') != '')
            {
                $('.showbtn_control').removeClass('d-none');

                $('.edit_category').attr('href',"{{ adminUrl('categories') }}/"+r.join(', ')+'/edit');
            }else{
                $('.showbtn_control').addClass('d-none');
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
        @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="col-md-12">
            @if(!isset($product))
                <form  action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @else
                <form  action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                {{-- @method('put') --}}
            @endif
                @csrf
            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
            <button type="submit" class="btn btn-success">@lang('admin.save_and_continue')</button>
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
                @include('admin.products.taps.product_info')
                @include('admin.products.taps.categories')
                @include('admin.products.taps.product_setting')
                @include('admin.products.taps.product_media')
                @include('admin.products.taps.product_size_weight')
                @include('admin.products.taps.product_additional_data')
                
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
