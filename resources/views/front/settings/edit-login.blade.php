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
          <label class="error" id=user_email"></label>
        </p>
        <p class="current_password">
          <label for="change_email_current_password">Current Password:</label>
          <span class="password-toggle"><input id="change_email_current_password" skip_errors="true" autocapitalize="none" autocomplete="off" type="password"
              name="user[current_password]"><label><input type="checkbox" data-password-toggle="">Show</label></span>
          <label class="error" id=email_current_password"></label>
        </p>
        <span id="general-Message" class="notice"></span>
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
              name="current_password" value="{{ old('current_password') }}"><label><input type="checkbox" data-password-toggle="">Show</label></span>
          <label class="error" id="currentPassword-error"></label>
        </p>
        <p class="new_password">
          <label for="user_password">New Password:</label>
          <span class="password-toggle"><input autocapitalize="none" autocomplete="off" type="password" name="new_password" id="user_password"><label><input type="checkbox"
                data-password-toggle="">Show</label></span>
          <label class="error" id="newPassword-error"></label>
        </p>
        <span id="general-Message" class="notice"></span> <!-- Span para errores generales -->
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
      // Función para validar el formulario de cambio de contraseña
      function validatePasswordForm() {
        const currentPassword = $('#change_password_current_password').val().trim();
        const newPassword = $('#user_password').val().trim();
        const $form = $('#change_password_form');

        // Habilitar el botón solo si ambos campos tienen datos
        const isValid = currentPassword !== '' && newPassword !== '';
        $('#submit_password_change').prop('disabled', !isValid);
      }

      // Validar el formulario cada vez que se escriba en los campos de contraseña
      $('#change_password_current_password, #user_password').on('input', function() {
        validatePasswordForm();
      });

      // Borrar los mensajes de error al empezar a escribir
      $('#change_password_current_password, #user_password').on('input', function() {
        // Al escribir, limpiar el mensaje de error asociado con el campo
        const errorField = $(this).attr('id') === 'change_password_current_password' ? '#currentPassword-error' : '#newPassword-error';
        $(errorField).text(''); // Limpiar el texto del error
      });

      // Mostrar/ocultar contraseñas basado en el checkbox
      $('input[data-password-toggle]').on('change', function() {
        const passwordField = $(this).closest('.password-toggle').find('input[type="password"], input[type="text"]');
        const isChecked = $(this).is(':checked');

        // Cambiar el tipo de input entre 'password' y 'text' según el estado del checkbox
        passwordField.attr('type', isChecked ? 'text' : 'password');
      });

      // Envío del formulario
      $form.on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: $form.serialize(),
          dataType: 'json',
          success: function(response) {
            if(response.status === 'success') {
              // Mostrar el mensaje de éxito en el span dentro del formulario de cambio de contraseña
              $('#change_password_form #general-Message')
                .text(response.message)
                .removeClass('error')
                .addClass('success');

              // Limpiar el formulario de cambio de contraseña
              $('#change_password_form').trigger('reset');

              // Deshabilitar el botón de cambio de contraseña nuevamente
              $('#submit_password_change').prop('disabled', true);
            }
          },
          error: function(xhr) {
            if(xhr.status === 422) {
              const errors = xhr.responseJSON.errors;
              let focusSet = false;

              // Manejo de errores específicos para el formulario de cambio de contraseña
              if(errors.current_password) {
                $('#currentPassword-error').text(errors.current_password[0]);
                $('#change_password_current_password').val('').focus();
                focusSet = true;
              }

              if(errors.new_password) {
                $('#newPassword-error').text(errors.new_password[0]);
                if(!focusSet) {
                  $('#user_password').val('').focus();
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

