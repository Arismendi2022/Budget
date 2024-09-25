@extends('back.layouts.reset-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Email Comfirmation | Ynab')
@section('content')
  <section>
    <h2>Hola, {{ $email }}!</h2>
    <p>Su correo electrónico ya está confirmado..</p>
    <p>Puede realizar más modificaciones en cualquier momento en <a href="/settings">account settings</a>.</p>
    <p>
      <a class="button button-launch-app launch_app_button" id="launch_app_button" href="/">Open Budget</a>
    </p>

    <br/>
    <p>
      ¿Necesitas ayuda? Chatea con nosotros en la aplicación o envíanos un correo electrónico a <a href="mailto:help@ynab.com">help@ynab.com</a>.
    </p>
  </section>
@endsection

