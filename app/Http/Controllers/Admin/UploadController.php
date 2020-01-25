<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadFile($request, $path, $new_name = null)
    {
        $new_name = $new_name === null ? time() : $new_name;
    }
}
