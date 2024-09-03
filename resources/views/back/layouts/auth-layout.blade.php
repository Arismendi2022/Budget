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
  <link href="https://fonts.googleapis.com/css2?family=Google+Sans" rel="stylesheet">
  <link rel="shortcut icon" href="/back/brand/ynab-tree-logo.svg">
  <link href="/back/dist/css/auth.css" rel="stylesheet">

  <style>
  </style>
  @stack('stylesheets')

</head>

<body data-page="authentications#new" data-ynab-device="web" class="theme-dark body-background--dark-shapes">
<div class="page-wrapper">
  <header class="authentications-page-header">
    <div class="authentications-page-header__inner">
      <a title="Back to ynab.com" class="authentications-page-header__logo" href="#" onclick="return false;"><img alt=""
          src="/back/brand/ynab-logo-buttermilk.svg"></a>
      <a class="authentications-page-header__back-button" href="#" onclick="return false;">
        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="#FEF9ED" viewBox="0 0 18 18" width="0.75em" height="0.75em">
          <path fill="inherit"
            d="M.8 9c0-.3 0-.5.2-.7l5.8-5.8.3-.2h.3c.2 0 .4 0 .6.2l.2.5a.8.8 0 0 1-.2.6l-2 2-3.5 3.1-.2-.4 2.9-.2h11.1l.6.2.2.6-.2.6-.6.2H5.2l-2.9-.2.2-.4L6 12.3l2 2 .1.2.1.3c0 .2 0 .4-.2.6l-.6.2c-.2 0-.4-.1-.5-.3L1 9.5a.8.8 0 0 1-.3-.6Z"></path>
        </svg>
        Back to ynab.com
      </a>
    </div>
  </header>
  <!---->
  <main class="page-main" role="main">
    @yield('content')
  </main>
</div>

<!---->

{{-- footer --}}
<div class="application__footer">
  <footer class="page-footer">
    <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">Terms of Service</a>
    <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">Privacy Policy</a>
    <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">California Privacy Policy</a>
    <button class="page-footer__privacy-choices js-open-preference-center">Your Privacy Choices</button>
    <div class="copyright">© Copyright {{ date('Y') }}  YNAB LLC. All rights reserved.</div>
  </footer>
</div>

<script src="/front/dist/js/jquery-3.7.1.min.js"></script>

@stack('scripts')

</body>
</html>


