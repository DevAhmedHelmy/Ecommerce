<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $title = trans('admin.about');
        return view('admin.about.index',compact('about','title'));
    }

    public function store(AboutRequest $request)
    {

        $data = $request->validated();

        if (request()->hasFile('image')) {
			$data['image'] = up()->uploadFile([
                'file'        => 'image',
                'path'        => 'about',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
        }
        if(request()->id !== null)
        {
            $about = About::findOrFail(request()->id);
            $about->update($data);
        }else{
            About::create($data);
        }

        session()->flash('success', trans('admin.added_successfully'));
        return redirect(route('admin.get.about'));
    }
}
