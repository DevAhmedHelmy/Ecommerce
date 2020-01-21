@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{!! $title  !!}</h3>
    </div>
    <div class="card-body">
        {!! Form::open(['id'=>'form_data','url'=>adminUrl('admin/destroy/all'),'method'=>'delete']) !!}
            {{ $dataTable->table([ 'class' => 'table table-bordered table-hover dataTable'], true) }}
        {!! Form::close() !!}

    </div>






@include('admin.admins.confirmModal')
</div>

@push('js')

<script>deleteAll();</script>
{!! $dataTable->scripts() !!}

@endpush
@endsection
