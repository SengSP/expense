<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <meta name="csrf-token" content="{{ csrf-token() }}"> --}}
  <title>{{ $title }}</title>
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  {{-- Bootstrap core css --}}
  <link rel="stylesheet" href="{{ url('mdbtheme/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('mdbtheme/css/mdb.min.css') }}">
  <link rel="stylesheet" href="{{ url('mdbtheme/css/addons/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ url('mdbtheme/css/addons/datatables-select.min.css') }}">
  <link rel="shortcut icon" href="{{ url('images/person.png') }}" type="image/x-icon">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="fixed-sn white-skin">