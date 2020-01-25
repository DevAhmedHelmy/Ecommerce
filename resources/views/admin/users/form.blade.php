@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.users')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{trans('admin.users')}}</a></li>
              @if(isset($user->id))
                <li class="breadcrumb-item active">{{trans('admin.update')}}</li>
              @else
                <li class="breadcrumb-item active">{{trans('admin.create')}}</li>
              @endif
            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title text-center">  {{ (isset($user) ? $titleEdit .' - '. $user->name : $title) }}</h3>
    </div>
    <div class="card-body text-secondary">

        <div class="col-md-8 offset-md-2">
            @if(isset($user->id))
                {!! Form::model($user,['route' => ['user.update', $user],'method'=>'put' ]) !!}
            @else
                {!! Form::open(['route'=>'user.store']) !!}
            @endif
                {{--  input name  --}}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control ' .($errors->has('name') ? ' is-invalid' : '') , 'required'=> 'required',
                    'placeholder' =>  trans('admin.name'),]) !!}
                </div>
                {{--  email input  --}}
                <div class="form-group">
                    {!! Form::label('email', trans('admin.email')) !!}
                    {!! Form::email('email', old('email'), ['class'=>'form-control ' .($errors->has('email') ? ' is-invalid' : '') ,'required'=> 'required', 'placeholder' => trans('admin.email'),]) !!}
                </div>
                {{--  password input  --}}
                <div class="form-group">
                    {!! Form::label('password', trans('admin.password')) !!}
                    {!! Form::password('password', ['class' => 'form-control ' .($errors->has('password') ? ' is-invalid' : ''),
                    'placeholder' => trans('admin.password'),]) !!}
                </div>
                {{--  level input  --}}
                <div class="form-group">
                    {!! Form::label('level', trans('admin.level')) !!}
                    {!! Form::select('level', ['user' => trans('admin.user'), 'company' => trans('admin.company') , 'vendor' => trans('admin.vendor')], null, ['class' => 'form-control ' .($errors->has('level') ? ' is-invalid' : ''),'placeholder' => trans('admin.choose')]); !!}
                </div>
                @if(isset($user->id))
                    {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary mt-3 text-center']); !!}
                @else
                    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary mt-3 text-center']); !!}
                @endif
            {!! Form::close() !!}

        </div>

    </div>


</div>



@endsection
