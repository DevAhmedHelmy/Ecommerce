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
            $(document).on('click','.save_and_continue',function(){
                var form_data = $('#product_form').serialize();
                $.ajax({
                    url:"{{route('admin.products.update',$product->id)}}",
                    dataType:'json',
                    type:'post',
                    data:form_data,
                    beforeSend:function(){
                        $('.loading_save').removeClass('d-none');
                    },
                    success:function(data){
                        if(data.status == true)
                        {
                            $('.loading_save').addClass('d-none');
                            $('.validate_massege').html('');
                            $('.error_message').addClass('d-none');
                            $('.success_message').html('<h2>'+data.message+'</h2>').removeClass('d-none');

                        }
                        
                        
                    },
                    error(response){
                        $('.loading_save').addClass('d-none');
                        var error_li = '';
                         
                        $.each(response.responseJSON.errors,function(index,value){
                            error_li += `<li>`+value+`</li>`
                        });
                        $('.error_message').removeClass('d-none');
                        $('.validate_massege').html(error_li);
                    }
                });
                return false;
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
            @if(isset($product))
                <form  action="{{ route('admin.products.update',$product->id) }}" id="product_form" method="POST" enctype="multipart/form-data">
                @method('patch')
            @else
            <form  action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

            @endif
                @csrf
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> @lang('admin.save')</button>
            <button type="submit" class="btn btn-success save_and_continue"><i class="fas fa-save"></i> @lang('admin.save_and_continue')
                <i class="fas fa-spinner loading_save d-none"></i></button>
            <button class="btn btn-info"><i class="fas fa-copy"></i> @lang('admin.copy')</button>
            <button class="btn btn-danger"><i class="fas fa-trash"></i> @lang('admin.delete')</button>
            <div class="alert alert-danger error_message d-none mt-2">
                <ul class="validate_massege">

                </ul>
            </div>
            <div class="alert alert-success success_message d-none mt-2">
                
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#product_info"><i class="fas fa-info-circle"></i> @lang('admin.product_info') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#categories"><i class="fas fa-list"></i> @lang('admin.categories')</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#product_setting"><i class="fas fa-cog"></i> @lang('admin.product_setting')</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#product_media"><i class="fas fa-photo-video"></i> @lang('admin.product_media')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product_size_weight"><i class="fas fa-info"></i> @lang('admin.product_size_weight')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#additional_data"><i class="fas fa-database"></i> @lang('admin.additional_data')
                    </a>
                </li>
              </ul>

              {{-- Tab panes --}}
            <div class="tab-content">
                @include('admin.products.taps.product_info')
                @include('admin.products.taps.categories')
                @include('admin.products.taps.product_setting')
                @isset($product)
                    @include('admin.products.taps.product_media')
                @endisset
                @include('admin.products.taps.product_size_weight')
                @include('admin.products.taps.product_additional_data')
            </div>

    </form>

    </div>

    </div>


</div>



@endsection
