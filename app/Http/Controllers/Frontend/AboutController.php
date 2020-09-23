<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        dd(get_categories()->first()->childs()->get());
        return view('frontend.about_us/index');
    }
}
