@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.users') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">@lang('admin.users')</a></li>
            <li class="breadcrumb-item active">{!! $title  !!}</li>
        </ol>
    </div>
@endsection
@section('content')

<div class="col-6 offset-md-3 mt-4">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            @if($user->image)
                <img class="profile-user-img img-fluid img-circle" src="{{url(\Storage::url($user->image))}}">
            @else
                <img class="profile-user-img img-fluid img-circle" src="{{asset('/adminPanel/uploads/users/user.png')}}">
            @endif
          </div>

          <h3 class="profile-username text-center">{{ $user->name }}</h3>



          <ul class="list-group list-group-unbordered mt-3">
            <li class="list-group-item">
              <b>@lang('admin.email')</b> <a class="float-right">{{ $user->email }}</a>
            </li>
            <li class="list-group-item">
              <b>@lang('admin.level')</b> <a class="float-right"> {{ $user->level }}</a>
            </li>
            <li class="list-group-item">
              <b>@lang('admin.created_at')</b> <a class="float-right">{{ $user->created_at->format('Y/m/d') }}</a>
            </li>
          </ul>


        </div>

      </div>
</div>



@endsection
