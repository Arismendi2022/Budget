<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Personal home budget software built, reach your financial goals!">
  <meta name="ynab-version" content="24.69.2-hotfix">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('images/shared/brand/ynab-tree-logo.svg') }}">
  <title>@yield('pageTitle')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/front/main.css') }}">
  <!--JQUERY-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style>
  </style>
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
<!---->
<!---->
@include('front.modals.modal-settings')
<!---->
@include('front.modals.modal-new-budget')
<!---->
@include('front.modals.modal-edit-budget')
<!---->
@include('front.modals.modal-calendar')
<!---->
@include('front.modals.modal-add-account')
<!---->
{{--@include('components.modals.modal-edit-account')--}}

<div class="tooltip-global">
    <span role="tooltip" id="ember18" class="tooltip-content" style="top: calc(108px + 0.5rem); left: 687.817px; opacity: 0; transition: opacity 0.2s;">
      Views Menu
    </span>
  <span role="tooltip" id="ember20" class="tooltip-content" style="top: calc(94.5px - 0.5rem); left: 269.458px; opacity: 0; transition: opacity 0.2s;">
      Add Category Group
    </span>
  <span role="tooltip" id="ember23" class="tooltip-content" style="top: calc(80.5px - 0.5rem); left: 430.833px; opacity: 0; transition: opacity 0.2s;">
      Previous 34 days of assigning and moving money (Rule Three is a thing!)
    </span>
  <span role="tooltip" id="ember24" class="tooltip-content" style="top: calc(96.5px - 0.5rem); left: 1253.1px; opacity: 0; transition: opacity 0.2s;">
      Progress Bars On
    </span>
  <span role="tooltip" id="ember25" class="tooltip-content" style="top: calc(96.5px - 0.5rem); left: 1280.82px; opacity: 0; transition: opacity 0.2s;">
      Progress Bars Off
    </span>
</div>

{{-- footer --}}


@stack('scripts')

</body>
</html>

