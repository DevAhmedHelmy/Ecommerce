@extends('admin.layouts.master')
@section('header')
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{ trans('admin.countries') }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.countries.index')}}">@lang('admin.countries')</a></li>
            <li class="breadcrumb-item active">{!! $title  !!}</li>
        </ol>
    </div>
@endsection
@section('content')
<div class="card">

    <div class="card-header">


    </div>
    <div class="card-body">

        <div class="row mb-5">


            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.name')</h5>
                <span class="description-text"> {{ $country->name }} </span>
                </div>
            </div>


            <div class="col-sm-4 border-right">
                <div class="description-block">
                <h5 class="description-header">@lang('admin.created_at')</h5>
                <span class="description-text"> {{ $country->created_at->format('Y/m/d') }} </span>
                </div>
            </div>



        </div>



    </div>







</div>
@if(count($country->cities) > 0)
<div class="card">



    <div class="card-header">
        <h3>@lang('admin.cities')</h3>

    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>



                        <th scope="col">#</th>
                        <th scope="col">@lang('admin.name')</th>
                        <th scope="col">@lang('admin.city')</th>
                        <th scope="col">@lang('admin.control')</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($country->cities as $key => $city)
                      <tr>

                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->country->name }}</td>
                            <td>

                                <a href="{{route('admin.cities.show',$city->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye fa-sm"></i> @lang('admin.view')</a>
                                <a href="{{route('admin.cities.edit',$city->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit fa-sm"></i> @lang('admin.edit')</a>
                                <form id="delete-form-{{ $city->id }}" action="{{ route('admin.cities.destroy',$city->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form-{{ $city->id }}')"> <i class="fa fa-trash fa-sm"></i> @lang('admin.delete')</button>
                                </form>
                            </td>
                      </tr>
                      @endforeach


                  </tbody>
            </table>

          </div>


    </div>


</div>
@endif
@endsection
