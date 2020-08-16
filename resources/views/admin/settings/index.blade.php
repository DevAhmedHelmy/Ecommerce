@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h3 class="m-0 text-dark">{{ trans('admin.settings') }}</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(adminUrl(''))}}">{{ trans('admin.dashboard') }}</a></li>
              <li class="breadcrumb-item active">{{ trans('admin.settings') }}</li>
            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card">
    @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card-header">
        <h3 class="card-title">{!! $title  !!}</h3>
    </div>
    <div class="card-body">
        {!! Form::open(['route'=> 'admin.save_settings','files'=>true]) !!}
            <div class=col-12>
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
                        {!! Form::text('sitename_ar', setting()->sitename_ar, ['class'=>'form-control' ,'placeholder' =>  trans('admin.sitename_ar'),]) !!}

                    </div>
                    <div class="col form-group">
                        {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
                        {!! Form::text('sitename_en', setting()->sitename_en, ['class'=>'form-control' ,'placeholder' =>  trans('admin.sitename_en'),]) !!}

                    </div>
                </div>
            </div>
            <div class=col-12>
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        {!! Form::label('email',trans('admin.email')) !!}
                        {!! Form::email('email', setting()->email, ['class'=>'form-control' ,'placeholder' =>  trans('admin.email'),]) !!}

                    </div>
                    <div class="col form-group">
                        <div class="d-flex justify-content-between">
                            <div class="col-6">
                                {!! Form::label('logo',trans('admin.logo')) !!}
                                {!! Form::file('logo',['class'=>'form-control']) !!}
                                @if(!empty(setting()->logo))
                                    <img src="{{ asset('storage/'.setting()->logo) }}" style="width:50px;height: 50px;" />
                                @endif
                            </div>
                            <div class="col-6">
                                {!! Form::label('icon',trans('admin.icon')) !!}
                                {!! Form::file('icon',['class'=>'form-control']) !!}
                                @if(!empty(setting()->icon))
                                    <img src="{{ asset('storage/'.setting()->icon) }}" style="width:50px;height: 50px;" />
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('description',trans('admin.description')) !!}
                    {!! Form::textarea('description',setting()->description,['class'=>'form-control']) !!}
                </div>

            </div>
            <div class=col-12>
                <div class="mt-4 d-flex justify-content-between">
                    <div class="col form-group">
                        {!! Form::label('main_lang', trans('admin.main_lang')) !!}
                        {!! Form::select('main_lang', ['ar' => trans('admin.Arabic'), 'en' => trans('admin.English')], setting()->main_lang, ['class' => 'form-control']); !!}

                    </div>
                    <div class="col form-group">
                        {!! Form::label('status', trans('admin.status')) !!}
                        {!! Form::select('status', ['open' => trans('admin.open'), 'close' => trans('admin.close')], setting()->status, ['class' => 'form-control']); !!}

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('message_maintenance',trans('admin.message_maintenance')) !!}
                    {!! Form::textarea('message_maintenance',setting()->message_maintenance,['class'=>'form-control']) !!}
                </div>

            </div>
            <div class="col-12 text-center">
                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary mt-3 text-center']); !!}
            </div>
        {!! Form::close() !!}

    </div>






</div>


@endsection
