@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Register')
@section('content')
  <section id="login-screen" class="authentications-section" data-controller="login" data-login-otp-form-outlet="#otp-form">
    <div class="authentications-section__inner">
      <aside class="authentications-aside">
        <div class="authentications-aside__image authentications-aside__image--default"><img
            src="{{ asset('images/back/brand/doodle-logo.svg') }}"></div>
        <h2>Transforma el dinero.</h2>
        <p>
          El YNABer promedio ahorra $600 en sus primeros dos meses (y, sinceramente, parece estar por encima del promedio).
        </p>
      </aside>

      <div class="authentications-panel">
        <div class="authentications-panel__content">
          <div data-login-target="loginHeader">
            <h2>Sign Up</h2>
          </div>
          <div data-login-target="backupCodeHeader" hidden="">
            <h2>Log In With An Emergency Backup Code</h2>
            <p>As a last resort, log in to YNAB with an emergency backup code. This code was given to you when you first enabled two-step verification.</p>
          </div>
          <div data-login-target="loginSubheader">
            <p>
              Have an account?
              <a data-action="login#trackClickedSignUp" href="{{ route('admin.login') }}">Log in.</a>
            </p>
          </div>
        </div>
        <form id="register-form" class="authentications-panel__form" data-login-target="form" action="{{ route('admin.create') }}" accept-charset="UTF-8" method="POST"
          novalidate="novalidate">
          @csrf
          <div data-login-target="identityContainer">
            <p class="authentications-panel__input-group js-form-email">
              <label class="u-sr-only" for="request_data_email">Email:</label>
              <input class="authentications-panel__email-field required" id="request_data_email_signup" autofocus="autofocus" spellcheck="false" placeholder="Email address"
                type="email" name="email" value="{{ old('email') }}">
              <label class="error" id="email-error" for="request_data_email"></label>
            </p>
            <p class="authentications-panel__input-group js-form-password">
              <label class="u-sr-only" for="request_data_password">Password:</label>
              <span class="password-toggle">
               <input class="authentications-panel__password-field required" id="request_data_password_signup" placeholder="Password" autocapitalize="none" autocomplete="off"
                 type="password" name="password">
                <label><input type="checkbox" id="togglePassword" data-password-toggle="">Show</label>
							</span>
              <label class="error" id="password-error" for="request_data_password"></label>
            </p>
            <span id="general-Message" class="notice"></span> <!-- Span para errores generales -->
            <p>
              <button type="submit" class="authentications-panel__form-button button button-primary" data-disable-with="Signing Up...">Sign Up</button>
            </p>
          </div>
          <p class="authentications-panel__terms">
            By creating an account, you agree to the YNAB <a rel="noopener noreferrer" target="_blank" href="#" onclick="return false;">Privacy Policy</a> and <a
              rel="noopener noreferrer"
              target="_blank" href="#" onclick="return false;">Terms of Service</a>.
          </p>
          <div data-login-target="ssoButtons">
            <div class="authentications-sso-buttons">
              <hr class="u-hr-text authentications-sso-buttons__separator" data-content="or"/>
              <div class="u-sr-only">Or sign up with your Apple or Google account</div>
              <div class="authentications-sso-buttons__button">
                <a class="sso-button sso-button--apple js-disabled" data-label="Continue with Apple" data-trigger-action="false" data-login-target="appleButton"
                  href="#"><span class="sso-button__logo"><img class="sso-provider-logo"
                      src="{{ asset('images/shared/brand/apple-logo.svg') }}"/></span><span class="sso-button__label">Continue with Apple</span></a>
                <p class="authentications-sso-button__error authentications-sso-button__error--apple"></p>
              </div>
              <div class="authentications-sso-buttons__button">
                <div class="sso-button sso-button--google" data-login-target="googleButton">
                  <div class="sso-button__inner js-disabled" aria-labelledby="button-label"><span class="sso-button__logo"><img class="sso-provider-logo"
                        src="{{ asset('images/shared/brand/google-logo.svg') }}"/></span><span
                      class="sso-button__label1">Continuar con Google</span></div>
                </div>
                <p class="authentications-sso-button__error authentications-sso-button__error--google"></p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      const $passwordField = $('#request_data_password_signup');
      const $togglePassword = $('#togglePassword');
      const $emailField = $('#request_data_email_signup');
      const $form = $('#register-form');

      // Toggle password visibility
      $togglePassword.on('change', function() {
        $passwordField.attr('type', this.checked ? 'text' : 'password');
      });

      // Clear specific errors on input
      const fieldsWithErrors = {
        email: $emailField,
        password: $passwordField
      };

      Object.entries(fieldsWithErrors).forEach(([key, $field]) => {
        $field.on('input', () => $(`#${key}-error`).text(''));
      });

      // Handle form submission
      $form.on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          url: $form.attr('action'),
          method: $form.attr('method'),
          data: $form.serialize(),
          dataType: 'json',
          success: function(response) {
            if(response.status === 'success') {
              $('#general-Message').text(response.success);
              $form[0].reset();
            }
          },
          //Errores de validacion.
          error: function(xhr) {
            if(xhr.status === 422) {
              const errors = xhr.responseJSON.errors;
              let focusSet = false;

              Object.entries(fieldsWithErrors).forEach(([field, $field]) => {
                const errorMessage = errors[field]?.[0] || '';
                $(`#${field}-error`).text(errorMessage);
                if(errorMessage) {
                  $field.val('');
                  if(!focusSet) {
                    $field.focus();
                    focusSet = true;
                  }
                }
              });
            } else if(xhr.status === 500) {
              // Manejar error 500
              const errorMessage = xhr.responseJSON.message || ''; // Accede al mensaje directamente
              $('#general-Message').text(errorMessage);

              // Limpiar todos los inputs si hay un error
              if(errorMessage) {
                Object.values(fieldsWithErrors).forEach($field => $field.val(''));
              }
            }
          }
        });
      });
    });

  </script>
@endpush
