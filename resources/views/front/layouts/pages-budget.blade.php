<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Personal home budget software built, reach your financial goals!">
  <meta name="ynab-version" content="24.69.2-hotfix">
  <meta name="robots" content="noindex">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('images/shared/brand/ynab-tree-logo.svg') }}">
  <title>@yield('pageTitle')</title>
  
  <style id="ynab-css-overrides"></style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/front/main.css') }}">

  @livewireStyles
  @stack('stylesheets')

  <style>
  </style>

</head>
<body class="ember-application">

<!--LAYOUT-->
<div class="layout">

  @yield('content')

</div>

@livewireScripts
<!--JQUERY-->
<script src="/js/shared/jquery-3.7.1.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('scripts')

</body>
</html>
