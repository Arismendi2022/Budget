<div>
	<form wire:submit.prevent="login" id="login-form" class="authentications-panel__form" data-login-target="form" action="" accept-charset="UTF-8" method="POST"
		novalidate="novalidate">
		@csrf
		<div data-login-target="identityContainer">
			<p class="authentications-panel__input-group js-form-email">
				<label class="u-sr-only" for="request_data_email">Email:</label>
				<input class="authentications-panel__email-field required" autofocus="autofocus" spellcheck="false" placeholder="Email address"
					data-login-target="emailInput"
					type="text" name="email" id="email" wire:model="email" wire:input="clearError('email')">
				@error('email') <label class="error">{{ $message }}</label> @enderror
			</p>
			<p class="authentications-panel__input-group js-form-password">
				<label class="u-sr-only" for="request_data_password">Password:</label>
				<span class="password-toggle"><input class="authentications-panel__password-field required" placeholder="Password" data-login-target="passwordInput"
						autocapitalize="none" autocomplete="off" type="password" name="password" id="password" wire:model="password" wire:input="clearError('password')">
								<label><input type="checkbox" id="togglePassword" data-password-toggle="" data-gtm-form-interact-field-id="0">Show</label>
							</span>
				@error('password') <label class="error">{{ $message }}</label> @enderror
			</p>
			<p class="authentications-panel__form-options">
				<label for="request_data_remember_me">
					<input data-login-target="rememberMeInput" type="checkbox" value="1" name="request_data[remember_me]" id="remember" wire:model="remember">
					Keep me logged in
				</label> <a href="{{ route('users.forgot') }}">Forgot password?</a>
			</p>
			<p>
				<button name="login" type="submit" id="login-button" class="authentications-panel__form-button button button-primary" data-disable-with="Logging In...">Log In
				</button>
			</p>
		</div>
		<div class="authentications-panel__otp-form">
			<div id="otp-form" data-controller="otp-form" data-otp-form-target="otpContainer" data-otp-form-using-backup-code-value="false" hidden="">
				<div>
					<p class="js-form-otp">
						<label data-otp-form-target="label" for="request_data_otp">Enter the 6-digit code from your authenticator app:</label>
						<input placeholder="6-digit code" maxlength="6" class="required" autocomplete="off" autofocus="autofocus" data-otp-form-target="input" size="6" type="text"
							name="request_data[otp]" id="request_data_otp">
						<label class="error" for="request_data_otp"></label>
					</p>
				</div>
				<br>
				<button name="button" type="submit" class="button button-primary" data-disable-with="Verifying...">Verify</button>
				<div>
					<p data-otp-form-target="showBackupLink">
						<a href="#" data-action="click->otp-form#showBackup">I'm having trouble</a>
					</p>
					<p data-otp-form-target="troubleshootLink" hidden="">
						<a rel="noopener noreferrer" target="_blank"
							href="#">I don't have my backup code</a>
					</p>
				</div>
			</div>
		</div>
		<div data-login-target="ssoButtons">
			<div class="authentications-sso-buttons">
				<hr class="u-hr-text authentications-sso-buttons__separator" data-content="or"/>
				<div class="u-sr-only">Or sign up with your Apple or Google account</div>
				<div class="authentications-sso-buttons__button">
					<a class="sso-button sso-button--apple" data-label="Continue with Apple" data-trigger-action="false"
						data-login-target="appleButton" href="#"><span
							class="sso-button__logo"><img class="sso-provider-logo"
								src="/images/shared/brand/apple-logo.svg"></span><span
							class="sso-button__label">Continue with Apple</span></a>
					<p class="authentications-sso-button__error authentications-sso-button__error--apple"></p>
				</div>
				<div class="authentications-sso-buttons__button">
					<div class="sso-button sso-button--google" data-login-target="googleButton">
						<div class="sso-button__inner "><span class="sso-button__logo"><img class="sso-provider-logo"
									src="/images/shared/brand/google-logo.svg"/></span><span
								class="sso-button__label">Continuar con Google</span></div>
					</div>
					<p class="authentications-sso-button__error authentications-sso-button__error--google"></p>
				</div>
			</div>
		</div>
	</form>
</div>

@push('scripts')
	<script>
		// Escuchar eventos de Livewire para detectar errores de validación
		document.getElementById('togglePassword').addEventListener('change', function () {
			const passwordField = document.getElementById('password');
			if (this.checked) {
				passwordField.type = 'text';
			} else {
				passwordField.type = 'password';
			}
		});

		// Escuchar el evento emitido por Livewire
	
	
	</script>

@endpush


