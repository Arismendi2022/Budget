<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Personal home budget software built, reach your financial goals!">
  <meta name="ynab-version" content="24.69.2-hotfix">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('pageTitle')</title>
  <!-- links -->
  <link rel="shortcut icon" href="{{ asset('images/shared/brand/ynab-tree-logo.svg') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/front/main.css') }}">

  @livewireStyles
  @stack('stylesheets')

</head>

<body>
<div class="layout">
  <div id="ember3" class="content-layout user-logged-in">
    <a href="#start-of-content" class="skip-to-content">Skip to content</a>
    <!---->
    <!---->
    {{-- Main Sidebar Container --}}
    @include('front.layouts.partials.sidebar')

    {{-- main content --}}
    <div id="start-of-content"></div>
    {{-- Content Header (Page header) --}}
    @yield('content')
  </div>
</div>

{{-- footer --}}

@livewireScripts
<!--JQUERY-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.6/Sortable.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('scripts')

</body>
</html>

