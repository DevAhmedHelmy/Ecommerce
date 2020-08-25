<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
class UploadController extends Controller
{

    public function delete($id)
    {
        $file = File::findOrfail($id);
        (!empty($file)) ? \Storage::delete($file->full_file) : '';
        $file->delete();

    }
    // $file, $path,$upload_type='single', $delete_file=null,$curd_type=[] , $new_name = null
    public function uploadFile($data=[])
    {

        if(in_array('new_name',$data))
        {
            $new_name = $data['new_name'] === null ? time() : $data['new_name'];

        }
        if(request()->hasFile($data['file']) && $data['upload_type']=='single')
        {
            \Storage::has($data['delete_file']) && !empty($data['delete_file']) ? \Storage::delete($data['delete_file']) : '';
            return request()->file($data['file'])->store($data['path']);


        }elseif(request()->hasFile($data['file']) && $data['upload_type']=='files'){

            $file = request()->file($data['file']);
            $size = $file[0]->getSize();
            $mime_type = $file[0]->getMimeType();
            $name = $file[0]->getClientOriginalName();
            $hashName = $file[0]->hashName();
            $file[0]->store($data['path']);
            File::create(
                [
                    'name'          => $name ,
                    'size'          => $size ,
                    'file'          => $hashName,
                    'path'          => $data['path'],
                    'full_file'     => $data['path'] . '/' . $hashName,
                    'mime_type'     =>  $mime_type ,
                    'file_type'     => $data['file_type'],
                    'relation_id'   => $data['relation_id']
                ]);
            return true;
        }
    }
}
