@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.admins')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}">{{trans('admin.admins')}}</a></li>
              @if(isset($admin->id))
                <li class="breadcrumb-item active">{{trans('admin.update')}}</li>
              @else
                <li class="breadcrumb-item active">{{trans('admin.add')}}</li>
              @endif
            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title">  {{ (isset($admin) ? $titleEdit .' - '. $admin->name : $title) }}</h3>
    </div>
    <div class="card-body text-secondary">


            @if(isset($admin->id))
                {!! Form::model($admin,['route' => ['admin.admins.update', $admin],'method'=>'put' ]) !!}
            @else
                {!! Form::open(['route'=>'admin.admins.store']) !!}
            @endif
                <div class="col-12">
                    <div class="mt-4 d-flex justify-content-between">
                        {{--  input name  --}}
                        <div class="col form-group">

                            {!! Form::label('name', trans('admin.name')) !!}
                            {!! Form::text('name', old('name'), ['class'=>'form-control ' .($errors->has('name') ? ' is-invalid' : '') , 'required'=> 'required',
                            'placeholder' =>  trans('admin.name'),]) !!}
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        {{--  email input  --}}
                        <div class="col form-group">
                            {!! Form::label('email', trans('admin.email')) !!}
                            {!! Form::email('email', old('email'), ['class'=>'form-control ' .($errors->has('email') ? ' is-invalid' : '') ,'required'=> 'required', 'placeholder' => trans('admin.email'),]) !!}
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-4 d-flex justify-content-between">
                        {{--  password input  --}}
                        <div class="col form-group">
                            {!! Form::label('password', trans('admin.password')) !!}
                            {!! Form::password('password', ['class' => 'form-control ' .($errors->has('password') ? ' is-invalid' : ''),
                            'placeholder' => trans('admin.password'),]) !!}
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        {{--  password_confirmation input  --}}
                        <div class="col form-group">
                            {!! Form::label('password_confirmation', trans('admin.password_confirmation')) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control',
                            'placeholder' => trans('admin.password_confirmation'),]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="mt-4 d-flex justify-content-between">
                        <div class="col form-group">
                            {!! Form::button('<i class="fa fa-check"></i>'. ' ' .trans('admin.save'), ['class'=>'btn btn-success mt-3 text-center', 'type'=>'submit']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



    </div>


</div>



@endsection
