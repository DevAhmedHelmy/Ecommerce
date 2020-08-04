<?php
// url function
if(!function_exists('adminUrl'))
{
    function adminUrl($url=null)
    {
        return url('admin/'.$url);
    }
}
// upload function
if(!function_exists('up'))
{
    function up()
    {
        return new \App\Http\Controllers\Admin\UploadController;
    }
}

if(!function_exists('admin'))
{
    function admin()
    {
        return auth()->guard('admin');
    }
}

// datatable_lang function
if(!function_exists('datatable_lang'))
{
    function datatable_lang()
    {
        return [
            "sProcessing"=> trans('admin.sProcessing'),
            "sLengthMenu"=> trans('admin.sLengthMenu'),
            "sZeroRecords"=> trans('admin.sZeroRecords'),
            "sEmptyTable"=> trans('admin.sEmptyTable'),
            "sInfo"=> trans('admin.sInfo'),
            "sInfoEmpty"=> trans('admin.sInfoEmpty'),
            "sInfoFiltered"=> trans('admin.sInfoFiltered'),
            "sInfoPostFix"=> "",
            "sSearch"=> trans('admin.sSearch'),
            "sUrl"=> "",
            "sInfoThousands"=> ",",
            "sLoadingRecords"=> trans('admin.sLoadingRecords'),
            "oPaginate"=> [
                "sFirst"=> trans('admin.sFirst'),
                "sLast"=> trans('admin.sLast'),
                "sNext"=> trans('admin.sNext'),
                "sPrevious"=> trans('admin.sPrevious')
            ],
            "oAria"=> [
                "sSortAscending"=>trans('admin.sSortAscending') ,
                "sSortDescending"=> trans('admin.sSortDescending')
            ]
        ];

    }
}

// lang function

if(!function_exists('lang'))
{
    function lang()
    {
       if(session()->has('lang')) {
           return session('lang');
        }else{
            return setting()->main_lang;
        }
    }
}

// direction function
if(!function_exists('direction'))
{
    function direction()
    {
       if(session()->has('lang')) {
           if(session('lang') == 'ar')
           {
               return 'rtl';
           }else{
               return 'ltr';
           }
       }else{ return 'ltr';}
    }
}

// active menu
if(!function_exists('active_menu'))
{
    function active_menu($link)
    {
        if(preg_match('/'.$link.'/i', Request::segment(2)))
        {
            return ['menu-open', 'display:block', 'active'];
        }else{
            return ['', '', ''];

        }
    }
}

// settings function
if(!function_exists('setting'))
{
    function setting()
    {
        return App\Models\Setting::orderBy('id', 'desc')->first();
    }
}
////////////////////// validate functions ////////////////////////////
if(!function_exists('validate_image'))
{
    function validate_image($ext=null)
    {
        if($ext === null)
        {
            return 'image|mimes:jpg,png,jpeg,gif';
        }else{
            return 'image|mimes:'.$ext;

        }
    }
}
////////////////////// validate functions ////////////////////////////
