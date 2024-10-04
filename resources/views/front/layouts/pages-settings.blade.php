<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Personal home budget software built, reach your financial goals!">
  <meta name="ynab-version" content="24.69.2-hotfix">
  <meta name="robots" content="noindex">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('images/front/brand/ynab-tree-logo.svg') }}">
  <title>@yield('pageTitle')</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/google-sans" rel="stylesheet">

  <link href="{{ asset('css/front/profile.css') }}" rel="stylesheet">
  <!--JQUERY-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style>
    body {
      font-family: "Figtree", Helvetica, Arial, sans-serif;
    }
  </style>
  @stack('stylesheets')

</head>

<body class="" data-page="registrations#edit" data-ynab-device="web">
<div class="page-wrapper">

  @yield('content')

</div>

{{-- footer --}}
<div class="application__footer">
  <footer class="page-footer">
    <a rel="noopener noreferrer" target="_blank" href=#" onclick="return false;">Terms of Service</a>
    <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">Privacy Policy</a>
    <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">California Privacy Policy</a>
    <button class="page-footer__privacy-choices js-open-preference-center">Your Privacy Choices</button>
    <div class="copyright">© Copyright {{ date('Y') }} YNAB LLC. All rights reserved.</div>
  </footer>
</div>

@stack('scripts')

</body>
</html>


