@extends('front.layouts.pages-settings')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
  <header class="page-header">
    <span class="back-links">
      <a title="Back to your Budget" class="ynab-logo launch_app_button" id="launch_app_button" href="/"><span>YNAB.</span></a>
      <a data-long-name="Back to Settings" data-short-name="Settings" title="Back to Settings" class="back-to-parent back-to-settings"
        href="{{ route('admin.settings') }}"></a>
    </span>
    <h1>Change Email &amp; Password</h1>
    <span id="close-link">
      <span></span><span></span>
        <a title="Back to your Budget" class="close launch_app_button" id="launch_app_button" href="{{ route('admin.settings')}}">×</a>
    </span>
  </header>
  <noscript>
    <div class="no-javascript-container">
      <div>
        <h3>Enable JavaScript to see YNAB's standard view</h3>
        <p>
          The page you are viewing requires JavaScript for the best experience. Enable JavaScript
          by changing your browser settings, and then hit refresh to try again.
        </p>
      </div>
    </div>
  </noscript>
  <main role="main" class="page-main">
    <section class="registration-container">
      <h2>Email &amp; Password</h2>
      <hr>
      <form class="form registration-form" id="change_email_form" action="" accept-charset="UTF-8" data-remote="true" method="POST" novalidate="novalidate">
        @csrf
        <h3>Change Email Address</h3>
        <p>
          To change your email address from <strong>{{ $user->email }}</strong>, enter the new email address and your current password below. (This will naturally
          change the email you use to log in.)
        </p>
        <p class="new_email">
          <label for="user_email">New Email Address:</label>
          <input spellcheck="false" type="email" name="email" id="user_email">
        </p>
        <p class="current_password">
          <label for="change_email_current_password">Current Password:</label>
          <span class="password-toggle"><input id="change_email_current_password" skip_errors="true" autocapitalize="none" autocomplete="off" type="password"
              name="user[current_password]"><label><input type="checkbox" data-password-toggle="">Show</label></span>
        </p>
        <p class="notice" id="email-message"></p>
        <p>
          <button name="submit_email_change" type="submit" class="button button-submit" id="submit_email_change" data-disable-with="Changing..." disabled="">
            Change Email
          </button>
        </p>
      </form>
      <hr>
      <form class="form registration-form" id="change_password_form" action="{{ route('admin.change_password') }}" accept-charset="UTF-8" data-remote="true" method="POST"
        novalidate="novalidate">
        @csrf
        <h3>Change Password</h3>
        <p>To change your password, enter your current password, then your new password.</p>
        <p class="current_password">
          <label for="change_password_current_password">Current Password:</label>
          <span class="password-toggle"><input id="change_password_current_password" skip_errors="true" autocapitalize="none" autocomplete="off" type="password"
              name="current_password"><label><input type="checkbox" data-password-toggle="">Show</label></span>
          <label class="error" id="current_password"></label>
        </p>
        <p class="new_password">
          <label for="user_password">New Password:</label>
          <span class="password-toggle"><input autocapitalize="none" autocomplete="off" type="password" name="new_password" id="user_password"><label><input type="checkbox"
                data-password-toggle="">Show</label></span>
          <label class="error" id="new_password"></label>
        </p>
        <p>
          <button name="submit_password_change" type="submit" class="button button-submit" id="submit_password_change" data-disable-with="Changing..." disabled="">
            Change Password
          </button>
        </p>
      </form>
    </section>
  </main>

@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      // Función genérica para habilitar/deshabilitar botones basado en la validación de inputs
      function validateForm(inputSelectors, buttonSelector) {
        const allFilled = inputSelectors.every(selector => $(selector).val().trim() !== '');
        $(buttonSelector).prop('disabled', !allFilled);
      }

      // Validación del formulario de cambio de email
      const emailInputs = ['#user_email', '#change_email_current_password'];
      const emailButton = '#submit_email_change';
      $(emailInputs.join(',')).on('input', function() {
        validateForm(emailInputs, emailButton);
      });

      // Validación del formulario de cambio de contraseña
      const passwordInputs = ['#change_password_current_password', '#user_password'];
      const passwordButton = '#submit_password_change';
      $(passwordInputs.join(',')).on('input', function() {
        validateForm(passwordInputs, passwordButton);
      });

      // Mostrar/ocultar contraseñas basado en el checkbox
      $('input[data-password-toggle]').on('change', function() {
        const passwordField = $(this).closest('.password-toggle').find('input[type="password"], input[type="text"]');
        const isChecked = $(this).is(':checked');
        passwordField.attr('type', isChecked ? 'text' : 'password');
      });

      // Borrar mensajes de error cuando el usuario comienza a escribir
      $('#change_password_current_password, #user_password').on('input', function() {
        const errorField = $(this).attr('id') === 'change_password_current_password' ? '#current_password' : '#new_password';
        $(errorField).text('');  // Elimina el mensaje de error correspondiente
      });

      $('#user_email, #change_email_current_password').on('input', function() {
        const errorField = $(this).attr('id') === 'user_email' ? '#email_error' : '#password_error';
        $(errorField).text('');  // Elimina el mensaje de error correspondiente
      });
    });

    // Realiza la autenticacion change password.
    $(document).ready(function() {
      $('#change_password_form').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: formData,
          dataType: 'json',
          success: function(response) {
            if(response.status === 'success') {
              // Aquí puedes manejar una respuesta exitosa, como redirigir al usuario o mostrar un mensaje de éxito.

            }
          },

          error: function(xhr) {
            if(xhr.status === 422) {
              // Obtener los errores de validación
              var errors = xhr.responseJSON.errors;

              let focusSet = false;

              // Mostrar los errores en los labels correspondientes
              if(errors.current_password) {
                $('#current_password').text(errors.current_password[0]);
                $('#change_password_current_password').val('');
                if(!focusSet) {
                  $('#change_password_current_password').focus();
                  focusSet = true; // Asegura que el foco se establezca solo en el primer campo con error
                }
              }

              if(errors.new_password) {
                $('#new_password').text(errors.new_password[0]);
                $('#user_password').val('');
                if(!focusSet) {
                  $('#user_password').focus();
                  focusSet = true;
                }
              }
            }
          }
        });
      });
    });

  </script>
@endpush

