@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.admins') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url(adminUrl(''))}}">@lang('admin.admins')</a></li>
            <li class="breadcrumb-item active">{!! $title  !!}</li>
        </ol>
    </div>
@endsection
@section('content')
<div class="card">
    {!! Form::open(['id'=>'form_data','route'=>'admin.admins.deleteAll','method'=>'delete']) !!}
    <div class="card-header">
        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">@lang('admin.create_admin')</a>
        <button type="button" class="btn btn-danger ml-2 delBtn" data-toggle="modal" data-target="#multiDelete">@lang('admin.deleteAll')</button>

    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="checkbox" class="check_all" onclick="check_all();"/></th>
                        <th scope="col">#</th>
                        <th scope="col">@lang('admin.name')</th>
                        <th scope="col">@lang('admin.email')</th>
                        <th scope="col">@lang('admin.control')</th>

                    </tr>
                  </thead>
                  <tbody>
                      @foreach($admins as $key => $admin)
                      <tr>
                            <th><input type="checkbox" name="item[]" class="item_check" value="{{ $admin->id }}"></th>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>


                            <td>
                                <form class="delete-form" action="{{ route('admin.admins.destroy',$admin->id) }}" method="post">
                                    <a href="{{route('admin.admins.show',$admin->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye fa-sm"></i> @lang('admin.view')</a>
                                    <a href="{{route('admin.admins.edit',$admin->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit fa-sm"></i> @lang('admin.edit')</a>

                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form')"> <i class="fa fa-trash fa-sm"></i> @lang('admin.delete')</button>
                                </form>
                            </td>
                      </tr>
                      @endforeach


                  </tbody>
            </table>
            {{ $admins->links() }}
          </div>


    </div>
    {!! Form::close() !!}
@include('admin.layouts.confirmModal')
</div>

@push('js')

<script>deleteAll();</script>


@endpush
@endsection
