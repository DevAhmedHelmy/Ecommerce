<!DOCTYPE html>

@if(app()->getLocale() == 'en')
<html lang="en" direction="ltr" style="direction: ltr;" >
@else
<html lang="en" direction="rtl" style="direction: rtl;" >
@endif
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ (app()->getLocale() == 'ar') ? setting()->sitename_ar : setting()->sitename_en }} | {{ !empty($title) ? $title : trans('admin.adminpanel')}}</title>

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminPanel/css/all.min.css')}}">
    {{-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/skins/skin-blue.min.css')}}">
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/blue.css')}}">
    {{-- Morris chart --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/morris.css')}}">
    {{-- jvectormap --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/jquery-jvectormap-1.2.2.css')}}">
    {{-- Date Picker --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/bootstrap-datepicker.min.css')}}">
    {{-- Daterange picker --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/daterangepicker-bs3.css')}}">
    {{-- bootstrap wysihtml5 - text editor --}}
    <link rel="stylesheet" href="{{asset('adminPanel/css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminPanel/jstree/themes/default/style.css') }}">
    <link rel="stylesheet" href="{{ asset('adminPanel/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminPanel/css/dropify.min.css') }}">


    @if(app()->getLocale() == 'en')

        <link rel="stylesheet" href="{{asset('adminPanel/css/adminlte.min.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('adminPanel/css/rtl/bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminPanel/css/rtl/AdminLTE-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminPanel/css/rtl/_all-skins-rtl.min.css')}}">


        <style>
        *,body,p,h1,h2,h3,h4,h5,h6,span{
            font-family: 'Cairo', sans-serif;
        }
        .bgArabic{
            background-color: #F2F3F8 !important;
        }
        </style>


    @endif
    {{-- fonts --}}
        {{-- <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet"> --}}
        {{-- <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet"> font-family: 'Tajawal', sans-serif; --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto&display=swap" rel="stylesheet"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"> --}}

    <style>
        *,body,p,h1,h2,h3,h4,h5,h6,span{
            font-family: 'Cairo', sans-serif;
        }

    </style>
    <link rel="stylesheet" href="{{asset('adminPanel/css/toastr.min.css')}}">
    <script src="{{asset('adminPanel/js/jquery.min.js')}}"></script>
    <script src="{{asset('adminPanel/js/toastr.min.js')}}"></script>
    <script src="{{asset('adminPanel/js/sweetalert2.min.js')}}"></script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
