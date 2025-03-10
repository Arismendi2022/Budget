@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Users Login')
@section('content')
	<section id="login-screen" class="authentications-section" data-controller="login" data-login-otp-form-outlet="#otp-form">
		<div class="authentications-section__inner">
			<aside class="authentications-aside">
				<div class="authentications-aside__image authentications-aside__image--default"><img
						src="{{ asset('images/back/brand/doodle-logo.svg') }}"></div>
				<h2>Do money differently.</h2>
				<p>
					YNAB has helped millions learn to spend, save, and live joyfully with a simple set of life-changing habits.
				</p>
			</aside>
			
			<div class="authentications-panel">
				<div class="authentications-panel__content">
					<div data-login-target="loginHeader">
						<h2>Log In</h2>
					</div>
					<div data-login-target="backupCodeHeader" hidden="">
						<h2>Log In With An Emergency Backup Code</h2>
						<p>As a last resort, log in to YNAB with an emergency backup code. This code was given to you when you first enabled two-step verification.</p>
					</div>
					<div data-login-target="loginSubheader">
						<p>
							New to YNAB?
							<a data-action="login#trackClickedSignUp" href="{{ route('users.register') }}">Sign up today.</a>
						</p>
					</div>
				</div>
				@livewire('auth.login')
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script>
		
	
	</script>
@endpush

