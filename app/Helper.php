<?php

if(!function_exists('adminUrl'))
{
    function adminUrl($url=null)
    {
        return url('admin/'.$url);
    }
}
if(!function_exists('admin'))
{
    function admin()
    {
        return auth()->guard('admin');
    }
}

if(!function_exists('datatable_lang'))
{
    function datatable_lang()
    {
        $langJson = [
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
        return response($langJson);
    }
}
