@push('js')

<script src="{{asset('adminPanal/js/dropzone.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('adminPanal/css/dropzone.min.css') }}">
 
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function(){
            //  product media
             
            $('#myDropzoneFile').dropzone({
                url:"{{route('admin.uploadFiles',$product->id)}}",
                paramName : 'files[]',
                uploadMultiple:true,
                maxFiles:15,
                maxFilesize:10,
                acceptedFiles:'image/*',
                dictDefaultMessage:"{{trans('admin.uploadFiles')}}",
                dictRemoveFile:"{{trans('admin.delete')}}",
                params:{
                    _token:"{{csrf_token()}}",
                },
                addRemoveLinks:true,
                removedfile:function(file){
                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:"{{route('admin.deleteFiles')}}",
                        data:{
                            _token:"{{csrf_token()}}",
                            product_id:file.fid
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function() {

                    @foreach($product->files()->get() as $file)
                        var mock={
                            name : "{{$file->name}}",
                            fid : "{{$file->id}}",
                            size : "{{$file->size}}",
                            type : "{{$file->mime_type}}",
                        };
                        this.emit("addedfile", mock);
                        this.emit('thumbnail',mock,"{{url(\Storage::url($file->full_path) )}}");
                         
                    @endforeach
                    this.on('sending', function(file,xhr,formData){
                         
                        formData.append('fid','');
                        file.id=''
                    });
                    this.on('success', function(file,response){
                        file.id = response.id
                    });
                },
            });


            // main product photo
            $('#mainPhoto').dropzone({
                
                url:"{{route('admin.productUploadImage',$product->id)}}",
                method: 'POST',
                paramName : 'file', 
                uploadMultiple:false,
                autoDiscover:false,
                maxFiles:1,
                maxFilesize:10,
                acceptedFiles:'image/*',
                dictDefaultMessage:"{{trans('admin.uploadFiles')}}",
                dictRemoveFile:"{{trans('admin.delete')}}",
                params:{
                    _token:"{{csrf_token()}}"
                },
                addRemoveLinks:true,
                removedfile:function(file){
                   
                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:"{{route('admin.productDeleteImage',$product->id)}}",
                        data:{
                            _token:"{{csrf_token()}}",
                        }
                    });
                     
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function() {

                    @if(!empty($product->photo ))

                        var mock={
                            name : "{{$product->title}}",
                            size : "",
                            type : "",
                        };
                        this.emit("addedfile", mock);
                        this.emit('thumbnail',mock,"{{url(\Storage::url($product->photo) )}}");
                    @endif
                    this.on('sending', function(file,xhr,formData){
                        formData.append('fid','');
                        file.id=''
                    });
                    this.on('success', function(file,response){
                        file.id = response.id
                    });
                },
            });
        });
    </script>
@endpush
<div class="tab-pane container fade" id="product_media">
    <div class="dropzone mb-2" id="mainPhoto"></div>
    <div class="dropzone" id="myDropzoneFile"></div>
</div>
