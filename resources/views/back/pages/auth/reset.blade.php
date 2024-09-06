@extends('back.layouts.reset-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset password')
@section('content')
  <div data-controller="edit-passwords" data-edit-passwords-otp-form-outlet="#otp-form">
    <div class="passwords-container" data-edit-passwords-target="resetPasswordContainer">
      <div class="js-main_screen_or_otp_app_or_otp_backup_code">
        <h2>Reset your password</h2>
        <form id="password-reset-form" class="form js-form" action="{{ route('admin.reset_password_handler', ['token'=>$token]) }}" accept-charset="UTF-8" data-remote="true"
          method="POST" novalidate="novalidate">
          @csrf
          <input value="{{ request()->token }}" autocomplete="off" type="hidden" name="token">
          <p>
            <em>Password tip</em>: Create a password using four random words. It's easy to remember, but hard to crack.
          </p>
          <p class="js-form-password">
            <label for="request_data_password">Enter a New Password:</label>
            <span class="password-toggle">
							<input class="required" autofocus="autofocus" autocapitalize="none" autocomplete="off" type="password" name="new_password"
                value="{{ old('new_password') }}" id="request_data_password">
							<label>
								<input type="checkbox" id="togglePassword" data-password-toggle="">Show</label>
						</span>
            <label class="error" id="password-error" for="request_data_password"></label>
          </p>
          <p data-edit-passwords-target="resetSubmitButton">
            <button name="button" type="submit" class="button button-primary" data-disable-with="Saving New Password...">Save New Password</button>
          </p>
        </form>
        <p>
          <a href="{{ route('admin.login') }}">Return to log in</a>
        </p>
      </div>
    </div>
    <div data-edit-passwords-target="resetSuccessContainer" style="display:none;">
      <div data-edit-passwords-target="nonOTPSuccessContainer">
        <h2>Your password has been reset.</h2>
        <p>
          You can now log in and make further edits in account settings.
        </p>
        <p>
          <a class="button button-launch-app launch_app_button" id="launch_app_button" href="/">Open Budget</a>
        </p>
      </div>
      <br>
      <p>
        Need help? Chat with us in the app or email us at <a href="#" onclick="return false;">help@ynab.com</a>.
      </p>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    //Mostrar seccion de exito al cambiar password.
    $(document).ready(function () {
      $('#password-reset-form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize();

        $.ajax({
          type: 'POST',
          url: actionUrl,
          data: formData,
          dataType: 'json',
          success: function (response) {
            // Restablecer los mensajes de error
            $('#password-error').hide().text('');

            if (response.success) {
              // Ocultar la sección del formulario
              $('[data-edit-passwords-target="resetPasswordContainer"]').hide();

              // Mostrar la sección de éxito
              $('[data-edit-passwords-target="resetSuccessContainer"]').show();

              // Actualizar el email en el mensaje de éxito si es necesario
              // $('.js-email').text(response.email);
            } else {
              // Mostrar mensajes de error en el DOM
              if (response.errors.new_password) {
                $('#password-error').text(response.errors.new_password[0]).show();
              }
            }
          },
          error: function (xhr) {
            var response = xhr.responseJSON;
            if (response && response.errors && response.errors.new_password) {
              $('#password-error').text(response.errors.new_password[0]).show();
            }
          }
        });
      });
    });

    // Este enfoque asegura que el mensaje de error se elimine
    document.addEventListener('DOMContentLoaded', function () {
      const passwordField = document.getElementById('request_data_password');
      const errorLabel = document.querySelector('.error[for="request_data_password"]');

      if (passwordField && errorLabel) {
        passwordField.addEventListener('input', function () {
          errorLabel.style.display = 'none';
        });
      }
    });

    //Muetra la contraseña
    const passwordField = document.getElementById('request_data_password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('change', function () {
      // Toggle the type attribute
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
    });

  </script>
@endpush

