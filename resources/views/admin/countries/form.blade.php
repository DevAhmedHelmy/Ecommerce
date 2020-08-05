@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{trans('admin.countries')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.countries.index')}}">{{trans('admin.countries')}}</a></li>

                <li class="breadcrumb-item active">{{trans('admin.create')}}</li>

            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card border-dark mb-3">
    <div class="card-header">
        <h3 class="card-title">  {{  $title }}</h3>
    </div>
    <div class="card-body text-secondary">

        <div class="col-md-12">

            {!! Form::open(['route'=>'admin.countries.store','files'=>true]) !!}

            <div class="d-flex justify-content-between">
                {{--  input name  --}}
                @foreach (config('translatable.locales') as $locale)
                    <div class="col form-group">
                        @if(count(config('translatable.locales'))>1)
                        {!! Form::label('name_'.$locale, trans('admin.name_' . $locale)) !!}
                        @else
                            {!! Form::label('name_en', trans('admin.name_en')) !!}
                        @endif
                        {!! Form::text($locale.'[name]', old('name'.$locale), ['class'=>'form-control ' .($errors->has('name_'.$locale) ? ' is-invalid' : '') , 'required'=> 'required',
                        'placeholder' =>  trans('admin.name'),]) !!}
                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    {!! Form::label('currency', trans('admin.currency')) !!}
                    {!! Form::text('currency', old('currency'), ['class'=>'form-control ' .($errors->has('currency') ? ' is-invalid' : '') , 'required'=> 'required',
                    'placeholder' =>  trans('admin.currency'),]) !!}
                </div>
                <div class="col form-group">
                    {!! Form::label('iso_code', trans('admin.iso_code')) !!}
                    {!! Form::text('iso_code', old('iso_code'), ['class'=>'form-control ' .($errors->has('iso_code') ? ' is-invalid' : '') , 'required'=> 'required',
                    'placeholder' =>  trans('admin.iso_code'),]) !!}
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="col form-group">
                    {!! Form::label('code', trans('admin.code')) !!}
                    {!! Form::text('code', old('code'), ['class'=>'form-control ' .($errors->has('code') ? ' is-invalid' : '') , 'required'=> 'required',
                    'placeholder' =>  trans('admin.code'),]) !!}
                </div>
                <div class="col form-group">
                    {!! Form::label('logo',trans('admin.logo')) !!}
                    {!! Form::file('logo',['class'=>'form-control']) !!}
                    @if(!empty($country->logo))
                        <img src="{{ asset('storage/'.$country->logo) }}" style="width:50px;height: 50px;" />
                    @endif
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


</div>



@endsection
