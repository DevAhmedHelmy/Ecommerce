<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{!empty($title) ? $title : trans('admin.adminpanel')}}</title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script src="{{asset('js/sweetalert2.min.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
