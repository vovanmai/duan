<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Smartphone Shop Admin</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{url('resources/assets/templates/shopsmp/images/favicon.png')}}">
  {{-- VUE --}}
  <link href="{{ url('resources/assets/templates/admin/assets/css/app.css')}}" rel="stylesheet">
  <!-- BOOTSTRAP STYLES-->
 <link href="{{ url('resources/assets/templates/admin/assets/css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ url('resources/assets/templates/admin/assets/css/bootstrap.css') }}" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="{{ url('resources/assets/templates/admin/assets/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="{{ url('resources/assets/templates/admin/assets/css/custom.css') }}" rel="stylesheet" />
  <link href="{{ url('resources/assets/templates/admin/assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ url('resources/assets/templates/admin/assets/css/bootstrap-tokenfield.min.css') }}" rel="stylesheet" />
  <link href="{{ url('resources/assets/templates/admin/assets/css/tokenfield-typeahead.min.css') }}" rel="stylesheet" />
  <link href="{{ url('resources/assets/templates/admin/assets/css/chartist.min.css') }}" rel="stylesheet" />
  <link href="{{ url('resources/assets/templates/admin/assets/css/datatable.css') }}" rel="stylesheet" />

  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <script src="{{ url('resources/assets/templates/admin/assets/js/jquery-3.2.0.min.js') }}"></script>
  <script src="{{ url('resources/assets/templates/admin/assets/js/chartist.min.js') }}"></script>



</head>
<body>
 
 
  
  <div id="wrapper">
   <div class="navbar navbar-inverse navbar-fixed-top">
   <a href="{{ route('shopsmp.index.index') }}" target="no_blank" class="btn visitfrontend">Visit Frontend <span class="glyphicon glyphicon-log-out"></span></a>
    <div class="adjust-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">
          <img src="{{ url('resources/assets/templates/admin/assets/img/logo.png')}}" />
        </a>
      </div>
      <span class="logout-spn" >
        <a href="{{ route('auth.logout') }}" style="color:#fff;padding-bottom:5px">LOGOUT <span class="glyphicon glyphicon-log-out" style="font-size:14px"></span></a>  
      </span>
   <span class="logout-spn" >
        <a href="" style="color:#fff;text-transform: uppercase;"><img src="{{url('storage/app/avatar/'.Auth::user()->avatar)}}" class="useravatar" alt="">{{Auth::user()->username}}</a>  
      </span>
    </div>
  </div>
  