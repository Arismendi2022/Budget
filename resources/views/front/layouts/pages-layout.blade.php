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
	
	<style id="ynab-css-overrides"></style>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.cdnfonts.com/css/helvetica-neue-5" rel="stylesheet">
		<!--CSS-->
	<link rel="stylesheet" href="{{ asset('css/front/main.css') }}">
	<!-- Incluir el archivo SVG de sprites -->
	<object type="image/svg+xml" data="{{ asset('images/shared/icons.svg') }}" style="display: none;"></object>
	
	@livewireStyles
	@stack('stylesheets')
 </head>

<body class="ember-application">
<div class="layout">
	<div id="ember3" class="content-layout user-logged-in">
		<a href="#start-of-content" class="skip-to-content">Skip to content</a>
		<!---->
		{{-- Main Sidebar Container --}}
		@include('front.layouts.partials.sidebar')
		
		{{-- main content --}}
		<div id="start-of-content"></div>
		<div class="ynab-u content">
			{{-- Content Header (Page header) --}}
			@yield('content')
		</div>
	</div>
</div>

{{-- Modal Calendar --}}
<livewire:admin.modal-calendar/>
{{-- Modal Budget --}}
<livewire:admin.budget-modals/>
<!---->
{{-- footer --}}

@livewireScripts
<!--JQUERY-->
<script src="/js/shared/jquery-3.7.1.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/front/global.js') }}"></script>

@stack('scripts')

</body>
</html>

