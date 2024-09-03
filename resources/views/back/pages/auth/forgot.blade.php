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
      <form class="form js-form" id="password-reset-form" action="{{ route('admin.send_password_reset_link') }}" method="POST" accept-charset="UTF-8" novalidate>
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
          <a href="{{ route('admin.login') }}">Return to log in</a>
        </p>
      </form>
    </section>
    <section data-new-passwords-target="passwordsSuccessContainer" style="display: none;">
      <h2>Reset password instructions sent!</h2>
      <p>
        Instructions to reset your password have been sent to <strong class="js-email"></strong>.
      </p>
      <p>
        <a class="button" href="{{ route('admin.login') }}">Return to log in</a>
      </p>
    </section>
  </div>
@endsection
@push('scripts')
  <script>
    // Este enfoque asegura que el mensaje de error se elimine
    document.addEventListener('DOMContentLoaded', function () {
      const passwordField = document.getElementById('request_data_email');
      const errorLabel = document.querySelector('.error[for="request_data_email"]');

      if (passwordField && errorLabel) {
        passwordField.addEventListener('input', function () {
          errorLabel.style.display = 'none';
        });
      }
    });

    //Mostrar seccion de exito al enviar el email cambiar password.
    /*document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('password-reset-form');
      const emailError = document.getElementById('email-error');
      const passwordsContainer = document.querySelector('[data-new-passwords-target="passwordsContainer"]');
      const passwordsSuccessContainer = document.querySelector('[data-new-passwords-target="passwordsSuccessContainer"]');
      const successEmailText = document.querySelector('.js-email');

      form.addEventListener('submit', function (event) {
        event.preventDefault(); // Previene el envío del formulario para manejarlo con JavaScript

        // Limpiar los mensajes de error existentes

        fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Si la respuesta es true, muestra la sección de éxito
              passwordsContainer.style.display = 'none';
              passwordsSuccessContainer.style.display = 'block';
              successEmailText.textContent = data.email; // Muestra el email en la sección de éxito
            } else {
              // Si la respuesta es false, muestra los errores
              if (data.errors && data.errors.email) {
                emailError.textContent = data.errors.email[0];
                emailError.style.display = 'block'; // Muestra el mensaje de error
              }
            }
          })
          .catch(error => {
            console.error('Error:', error);
            emailError.textContent = 'Se produjo un error inesperado. Inténtalo nuevamente.';
            emailError.style.display = 'block'; // Muestra el mensaje de error
          });
      });
    });*/
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
            $('#email-error').hide().text('');

            if (response.success) {
              // Ocultar la sección del formulario
              $('[data-new-passwords-target="passwordsContainer"]').hide();

              // Mostrar la sección de éxito
              $('[data-new-passwords-target="passwordsSuccessContainer"]').show();

              // Actualizar el email en el mensaje de éxito
              $('.js-email').text(response.email);
            } else {
              // Mostrar mensajes de error en el DOM
              if (response.errors.email) {
                $('#email-error').text(response.errors.email[0]).show();
              }
            }
          },
          error: function (xhr) {
            var response = xhr.responseJSON;
            if (response && response.errors && response.errors.email) {
              $('#email-error').text(response.errors.email[0]).show();
            } else {
              // Mensaje de error genérico para otros errores
              $('#email-error').text('Hubo un error enviando el correo. Por favor, intenta de nuevo.').show();
            }
          }
        });
      });
    });

  </script>
@endpush
