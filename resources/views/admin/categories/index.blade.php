@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.categories') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url(adminUrl(''))}}">@lang('admin.categories')</a></li>
            <li class="breadcrumb-item active">{!! $title  !!}</li>
        </ol>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#jstree_demo_div').jstree({ 'core' : {
                'data' : [
                   { "id" : "ajson1", "parent" : "#", "text" : "Simple root node" },
                   { "id" : "ajson2", "parent" : "ajson1", "text" : "Root node 2" },
                   { "id" : "ajson3", "parent" : "ajson2", "text" : "Child 1" },
                   { "id" : "ajson4", "parent" : "ajson3", "text" : "Child 2" },
                ]
            },
            "checkbox" : {
                "keep_selected_style" : true
              },
              "plugins" : [ "wholerow", "checkbox" ]
             });
        });
    </script>
@endpush
@section('content')
<div class="card">



    <div class="card-header">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">@lang('admin.create_category')</a>
        <button type="button" class="btn btn-danger ml-2 delBtn" data-toggle="modal" data-target="#multiDelete">@lang('admin.deleteAll')</button>

    </div>
    <div class="card-body">
        <div id="jstree_demo_div"></div>
        {{--  <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>


                        <th scope="col">#</th>
                        <th scope="col">@lang('admin.name')</th>
                        <th scope="col">@lang('admin.currency')</th>
                        <th scope="col">@lang('admin.iso_code')</th>
                        <th scope="col">@lang('admin.code')</th>
                        <th scope="col">@lang('admin.control')</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($categories as $key => $category)
                      <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->currency }}</td>
                            <td>{{ $category->iso_code }}</td>
                            <td>{{ $category->code }}</td>
                            <td>

                                <a href="{{route('admin.categories.show',$category->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye fa-sm"></i> @lang('admin.view')</a>
                                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit fa-sm"></i> @lang('admin.edit')</a>
                                <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy',$category->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form-{{ $category->id }}')"> <i class="fa fa-trash fa-sm"></i> @lang('admin.delete')</button>
                                </form>
                            </td>
                      </tr>
                      @endforeach


                  </tbody>
            </table>
            {{ $categories->links() }}
          </div>  --}}


    </div>


</div>

@endsection
