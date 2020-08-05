@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">@lang('admin.users_acounts')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">@lang('admin.users_acounts')</a></li>
            @if(isset($user->id))
            <li class="breadcrumb-item active">@lang('admin.update')</li>
            @else
            <li class="breadcrumb-item active">@lang('admin.create')</li>
            @endif
        </ol>
    </div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">  {{ (isset($user) ? $titleEdit .' - '. $user->name : $title) }}</h3>
    </div>
    <div class="card-body">

        @if(isset($user))
            {!! Form::model($user,['route' => ['admin.users.update', $user],'method'=>'put' ]) !!}
        @else
            {!! Form::open(['route'=>'admin.users.store']) !!}
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
                    {{--  level input  --}}
                    <div class="col form-group">
                        {!! Form::label('level', trans('admin.level')) !!}
                        {!! Form::select('level', ['user' => trans('admin.user'), 'company' => trans('admin.company') , 'vendor' => trans('admin.vendor')], null, ['class' => 'form-control ' .($errors->has('level') ? ' is-invalid' : ''),'placeholder' => trans('admin.choose')]); !!}
                        @error('level')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
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
