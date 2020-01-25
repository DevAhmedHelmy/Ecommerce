@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.admins')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{trans('admin.admins')}}</a></li>
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
        <h3 class="card-title text-center">  {{ (isset($admin) ? $titleEdit .' - '. $admin->name : $title) }}</h3>
    </div>
    <div class="card-body text-secondary">

        <div class="col-md-8 offset-md-2">
            @if(isset($admin->id))
                {!! Form::model($admin,['route' => ['admin.update', $admin],'method'=>'put' ]) !!}
            @else
                {!! Form::open(['route'=>'admin.store']) !!}
            @endif
                    {{--  input name  --}}
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control ' .($errors->has('name') ? ' is-invalid' : '') , 'required'=> 'required',
                    'placeholder' =>  trans('admin.name'),]) !!}
                    {{--  email input  --}}
                    {!! Form::label('email', trans('admin.email')) !!}
                    {!! Form::email('email', old('email'), ['class'=>'form-control ' .($errors->has('email') ? ' is-invalid' : '') ,'required'=> 'required', 'placeholder' => trans('admin.email'),]) !!}
                    {{--  password input  --}}
                    {!! Form::label('password', trans('admin.password')) !!}
                    {!! Form::password('password', ['class' => 'form-control ' .($errors->has('password') ? ' is-invalid' : ''),
                            'placeholder' => trans('admin.password'),]) !!}

                    @if(isset($admin->id))
                        {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary mt-3 text-center']); !!}
                    @else
                        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary mt-3 text-center']); !!}
                    @endif
                {!! Form::close() !!}

        </div>

    </div>


</div>



@endsection
