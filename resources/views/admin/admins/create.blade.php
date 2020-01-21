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
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title text-center"> <i class="fa fa-plus fa-sm"></i> {!! $title  !!}</h3>
    </div>
    <div class="card-body text-secondary">

        <div class="col-md-8 offset-md-2">

            {!! Form::open(['route'=>'admin.store']) !!}
                {{--  input name  --}}
                {!! Form::label('name', trans('admin.name')) !!}
                {!! Form::text('name', old('name'), ['class'=>'form-control ' .($errors->has('name') ? ' is-invalid' : '') , 'required'=> 'required',
                'placeholder' =>  trans('admin.name'),]) !!}
                {{--  email input  --}}
                {!! Form::label('email', trans('admin.email')) !!}
                {!! Form::email('email', old('email'), ['class'=>'form-control ' .($errors->has('email') ? ' is-invalid' : '') ,'required'=> 'required', 'placeholder' => trans('admin.email'),]) !!}
                {{--  password input  --}}
                {!! Form::label('password', trans('admin.password')) !!}
                {!! Form::password('password', ['class' => 'form-control ' .($errors->has('password') ? ' is-invalid' : ''), 'required'=> 'required',
                        'placeholder' => trans('admin.password'),]) !!}


                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary mt-3 text-center']); !!}
            {!! Form::close() !!}

        </div>

    </div>


</div>



@endsection
