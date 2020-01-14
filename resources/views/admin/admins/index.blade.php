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
        {!! $dataTable->table(['class'=>'table table-bordered table-hover dataTable']) !!}
    </div>
</div>
@push('js')
{!! $dataTable->scripts() !!}
@endpush
@endsection