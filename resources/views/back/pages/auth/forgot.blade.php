@extends('back.layouts.reset-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
  <div id="passwords-screen" data-controller="new-passwords">
    <section data-new-passwords-target="passwordsContainer">
      <h2>Forgot your password?</h2>
      <p>
        No sweat. Enter the email address you signed up with and we'll send you instructions to reset your password.
      </p>
      <hr>
      <form class="form js-form" id="password-reset-form" action="{{ route('users.send_password_reset_link') }}" method="POST" accept-charset="UTF-8" novalidate>
        @csrf
        <p class="js-form-email">
          <label for="request_data_email">Email:</label>
          <input class="required" autofocus="autofocus" spellcheck="false" type="email" name="email" value="{{ old('email') }}" id="request_data_email"/>
          <label class="error" id="email-error" for="request_data_email"></label>
        </p>
        <p>
          <button name="button" type="submit" class="button button-primary" data-disable-with="Sending Reset Instructions...">Send Reset Instructions</button>
        </p>
        <p>
          <a href="{{ route('users.login') }}">Return to log in</a>
        </p>
      </form>
    </section>
    <section data-new-passwords-target="passwordsSuccessContainer" style="display: none;">
      <h2>Reset password instructions sent!</h2>
      <p>
        Instructions to reset your password have been sent to <strong class="js-email"></strong>.
      </p>
      <p>
        <a class="button" href="{{ route('users.login') }}">Return to log in</a>
      </p>
    </section>
  </div>
@endsection
@push('scripts')
  <script>
    // Este enfoque asegura que el mensaje de error se elimine

    $(document).ready(function() {
      const $emailField = $('#request_data_email');
      const $form = $('#password-reset-form');

      // Clear specific errors on input
      const fieldsWithErrors = {
        email: $emailField,
      };

      Object.entries(fieldsWithErrors).forEach(([key, $field]) => {
        $field.on('input', () => $(`#${key}-error`).text(''));
      });

      //Mostrar seccion de exito al enviar el email cambiar password.
      $form.on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: $form.serialize(),
          dataType: 'json',
          success: function(response) {
            // Restablecer los mensajes de error
            $('#email-error').hide().text('');

            if(response.success) {
              // Ocultar la sección del formulario
              $('[data-new-passwords-target="passwordsContainer"]').hide();

              // Mostrar la sección de éxito
              $('[data-new-passwords-target="passwordsSuccessContainer"]').show();

              // Actualizar el email en el mensaje de éxito
              $('.js-email').text(response.email);
            } else {
              // Mostrar mensajes de error en el DOM
              if(response.errors.email) {
                $('#email-error').text(response.errors.email[0]).show();
              }
            }
          },
          error: function(xhr) {
            if(xhr.status === 422) { // 422 Errores de validación
              const errors = xhr.responseJSON.errors;
              let focusSet = false;

              // Mostrar errores de validación en los campos correspondientes
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
            }
          }
        });
      });
    });

  </script>
@endpush

