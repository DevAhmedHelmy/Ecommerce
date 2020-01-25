<a href="{{ route('user.edit', $id) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.edit') }}"><i class="fa fa-edit fa-sm"></i></a>

<a href="{{ route('user.show', $id) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.show') }}"><i class="fa fa-eye fa-sm"></i></a>

<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ trans('admin.delete') }}" data-target="#del_admin{{ $id }}"><i class="fa fa-trash fa-sm"></i></button>

<!-- Modal -->
<div id="del_admin{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
        </div>
        {!! Form::open(['route'=>['user.destroy',$id],'method'=>'delete']) !!}
        <div class="modal-body">
          <h4>{{ trans('admin.delete_this',['name'=>$name]) }}</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.cancel') }}</button>
          {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
