<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description"
    content="Personal home budget software built with Four Simple Rules to help you quickly gain control of your money, get out of debt, and reach your financial goals!">
  <title>@yield('pageTitle')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('images/shared/brand/ynab-tree-logo.svg' }}">
  <link href="{{ asset('css/back/auth.css') }}" rel="stylesheet">

  <style>
  </style>
  @stack('stylesheets')

</head>

<body class="" data-page="passwords#new" data-ynab-device="web">
<div class="page-wrapper">
  <header class="page-header">
    <a title="YNAB" class="ynab-primary-logo launch_app_button" href="/"><img alt=""
        src="{{ asset('images/back/brand/ynab-primary-logo.svg') }}">
    </a>
  </header>
  <main class="page-main" role="main">
    @yield('content')
  </main>
</div>

<!---->

{{-- footer --}}
<footer>
  <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">Terms of Service</a>
  <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">Privacy Policy</a>
  <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">California Privacy Policy</a>
  <button class="your-privacy-choices js-open-preference-center">Your Privacy Choices</button>
  <div class="copyright">© Copyright {{ date('Y') }} YNAB LLC. All rights reserved.</div>
</footer>

{{-- JQUERY--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

@stack('scripts')

</body>
</html>



