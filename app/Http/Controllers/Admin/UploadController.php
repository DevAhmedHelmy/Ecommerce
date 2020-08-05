<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
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
        }
    }
}
