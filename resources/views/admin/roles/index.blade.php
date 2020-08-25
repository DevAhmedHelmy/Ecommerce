@extends('admin.layouts.master')

@section('header')

        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('permission.permission')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('admin.dashboard')</a></li>
            <li class="breadcrumb-item active">@lang('permission.permission')</li>
            </ol>
        </div>

@endsection


@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @can('roles-create')
                    <a class="btn btn-info btn-sm" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus fa-sm"></i> @lang('permission.Create_New_Role')</a>
                @endcan
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10%">@lang('admin.No')</th>
                        <th style="width: 45%;">@lang('admin.name')</th>
                        <th style="width: 45%;">@lang('admin.control')</th>
                        </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form class="delete-form" action="{{ route('admin.roles.destroy',$role->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}"><i class="fa fa-eye fa-sm"></i> @lang('admin.show')</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa fa-edit fa-sm"></i> @lang('admin.edit')</a>
                                    @endcan
                                    @can('role-delete')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form')"><i class="fa fa-trash fa-sm"></i> @lang('admin.delete')</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>


    </div>
    {!! $roles->render() !!}
</div>
@endsection
