
<div class="modal fade" id="multiDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('admin.delete')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="empty_record d-none">
                    <div class="alert alert-danger"> @lang('admin.please_check_some_record') </div>
                </div>
                <div class="not_empty d-none">
                    <div class="alert alert-danger"> @lang('admin.ask_delete_items')  <span class="record_count"></span> ?</div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="empty_record d-none">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancel')</button>
                </div>
                <div class="not_empty d-none">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancel')</button>
                    <button type="submit" class="btn btn-danger del_all">@lang("admin.delete")</button>
                </div>
            </div>
        </div>
    </div>
</div>

