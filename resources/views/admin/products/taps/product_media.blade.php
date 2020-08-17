@push('js')

<script src="{{asset('adminPanal/js/dropzone.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('adminPanal/css/dropzone.min.css') }}">
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function(){
            $('#myDropzoneFile').dropzone({
                url:"{{adminUrl('product/upload_images/'.$product->id)}}",
                paramName : 'files[]',
                uploadMultiple:true,
                maxFiles:15,
                maxFilesize:10,
                acceptedFiles:'image/*',
                dictDefaultMessage:"{{trans('admin.uploadFiles')}}",
                dictRemoveFile:"{{trans('admin.delete')}}",
                params:{
                    _token:"{{csrf_token()}}"
                },
                addRemoveLinks:true,
                removefile:function(file){
                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:"{{adminUrl('product/delete_image')}}",
                        data:{
                            _token:"{{csrf_token()}}",
                            id:file.fid
                        }
                    });
                    var fmock;
                    return (fmock = file.previweElement) != null ? fmock.parentMode.removeChild(file.previweElement) : void 0;
                },
                init: function() {

                    @foreach($product->files()->get() as $file)
                        var mock={
                            name : "{{$file->name}}",
                            fid : "{{$file->id}}",
                            size : "{{$file->size}}",
                            type : "{{$file->mime_type}}",
                        };
                        this.emit("addedfile", this.mock);
                        this.options.thumbnail.call(this.mock,"{{url('storage/'.$file->full_path)}}");
                    @endforeach

                    
                },
            });
        });
    </script>
@endpush
<div class="tab-pane container fade" id="product_media">
    <div class="dropzone" id="myDropzoneFile">
         
      </div>
</div>