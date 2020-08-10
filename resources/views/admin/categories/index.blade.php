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
            $('#jstree').jstree({ 'core' : {
                'data' : {!! categories() !!}
            },
            "checkbox" : {
                "keep_selected_style" : true
              },
              "plugins" : [ "wholerow" ]
             });

        });
        $('#jstree').on('changed.jstree',function(e, data){
            var i , j,r  =[];
            var name = [];
            for(i=0,j=data.selected.length; i < j; i++)
            {
                r.push(data.instance.get_node(data.selected[i]).id);
                name.push(data.instance.get_node(data.selected[i]).text);
            }

            $('#delete_category').attr('href',"{{ adminUrl('categories') }}/"+r.join(', '));
            $('.cat_name').text(name,r.join(', '));


            if(r.join(', ') != '')
            {
                $('.showbtn_control').removeClass('d-none');

                $('.edit_category').attr('href',"{{ adminUrl('categories') }}/"+r.join(', ')+'/edit');
            }else{
                $('.showbtn_control').addClass('d-none');
            }
         });
    </script>
@endpush
@section('content')
<div class="card">



    <div class="card-header">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">@lang('admin.create_category')</a>
    </div>
    <div class="card-body">
        <a href="" class="btn btn-primary btn-sm edit_category showbtn_control d-none"> <i class="fa fa-edit fa-sm"></i> @lang('admin.edit')</a>
        <a href="" class="btn btn-danger btn-sm delete_category showbtn_control d-none" data-toggle="modal" data-target="#delete_bootstrap_modal"> <i class="fa fa-trash fa-sm"></i> @lang('admin.delete')</a>
        <div id="jstree"></div>



    </div>


</div>
<div class="modal fade" id="delete_bootstrap_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('admin.delete')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete_category" action="" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    @lang('admin.ask_delete')  <span class="cat_name"></span>
                </div>
                <div class="modal-footer">

                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancel')</button>
                        <button type="submit" class="btn btn-danger">@lang("admin.delete")</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection
