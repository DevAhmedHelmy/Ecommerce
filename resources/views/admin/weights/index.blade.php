@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.weights') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url(adminUrl(''))}}">@lang('admin.weights')</a></li>
            <li class="breadcrumb-item active">{!! $title  !!}</li>
        </ol>
    </div>
@endsection
@section('content')
<div class="card">



    <div class="card-header">
        <a href="{{ route('admin.weights.create') }}" class="btn btn-primary">@lang('admin.create_weight')</a>
        <button type="button" class="btn btn-danger ml-2 delBtn" data-toggle="modal" data-target="#multiDelete">@lang('admin.deleteAll')</button>

    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <form id="form_data" action="{{ route('admin.weights.deleteAll') }}" method="post">
                            @method('delete')
                            @csrf
                        <th scope="col"><input type="checkbox" name="checkbox" class="check_all" onclick="check_all();"/></th>
                        <th scope="col">#</th>
                        <th scope="col">@lang('admin.name')</th>
                        <th scope="col">@lang('admin.created_at')</th>

                        <th scope="col">@lang('admin.control')</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($weights as $key => $weight)
                      <tr>
                            <th><input type="checkbox" name="item[]" class="item_check" value="{{ $weight->id }}"></th>
                        </form>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $weight->name }}</td>
                            <td>{{ $weight->created_at }}</td>

                            <td>

                                <a href="{{route('admin.weights.show',$weight->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye fa-sm"></i> @lang('admin.view')</a>
                                <a href="{{route('admin.weights.edit',$weight->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit fa-sm"></i> @lang('admin.edit')</a>
                                <form id="delete-form-{{ $weight->id }}" action="{{ route('admin.weights.destroy',$weight->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form-{{ $weight->id }}')"> <i class="fa fa-trash fa-sm"></i> @lang('admin.delete')</button>
                                </form>
                            </td>
                      </tr>
                      @endforeach


                  </tbody>
            </table>
            {{ $weights->links() }}
          </div>


    </div>

@include('admin.layouts.confirmModal')
</div>

@push('js')

<script>deleteAll();</script>


@endpush
@endsection
