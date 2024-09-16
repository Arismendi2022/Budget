@extends('front.layouts.pages-profile')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
  <header class="page-header">
    <span class="back-links">
      <a title="Back to your Budget" class="ynab-logo launch_app_button" id="launch_app_button" href="/"><span>YNAB.</span></a>
      <a data-long-name="Back to Budget" data-short-name="Budget" title="Back to your Budget" class="back-to-parent back-to-budget launch_app_button" href="/"></a>
    </span>
    <h1>Account Settings</h1>
    <span id="close-link">
      <span></span><span></span>
        <a title="Back to your Budget" class="close launch_app_button" id="launch_app_button" href="/">×</a>
    </span>
  </header>
  <!---->
  <main role="main" class="page-main">
    <section data-controller="user-settings">
      <h2>Account Settings</h2>
      <p>
        arismendi.guiza@gmail.com<a class="logout-link" data-disable-with="Logging Out..." data-logout-url="/api/v1/catalog?operation_name=logoutUser"
          data-redirect-url="/users/sign_in" href="/logout">Log Out</a>
      </p>
      <hr>
      <h3 id="login-methods">Login Methods</h3>
      <div class="secondary-container">
        <div class="left">
          <p>
            <strong>Email &amp; Password</strong>
            <br>
            arismendi.guiza@gmail.com
          </p>
        </div>
        <div class="right">
          <p><a class="button" href="/settings/edit_login">Change Email &amp; Password</a></p>
        </div>
      </div>
      <div class="sso-container sso-container-apple secondary-container">
        <div class="left">
          <span class="sso-label">Apple</span>
          <a class="sso-button sso-button--apple" data-label="Continue with Apple" data-trigger-action="false" href="#"><span
              class="sso-button__logo"><img class="sso-provider-logo"
                src="/back/brand/apple-logo.svg"></span><span
              class="sso-button__label">Continue with Apple</span></a>
        </div>
      </div>
      <div class="sso-container sso-container-google secondary-container">
        <div class="left">
          <span class="sso-label">Google</span>
          <div class="sso-button sso-button--google" data-width="240">
            <div class="sso-button__inner js-disabled"><span class="sso-button__logo"><img class="sso-provider-logo"
                  src="/back/brand/google-logo.svg"/></span><span
                class="sso-button__label">Continuar con Google</span></div>
          </div>
        </div>
      </div>
      <hr>
      <h3>Trial</h3>
      <div class="secondary-container">
        <div class="left">
          <p>You have <strong>8 days</strong> left on your trial.</p>

        </div>
        <div class="right">
          <p><a class="button" href="/subscription/new">Subscribe Now</a></p>
        </div>
      </div>
      <hr>
      <h3 id="support-access">Support Access</h3>
      <div class="secondary-container">
        <div class="left">
          <p>
            YNAB is unable to access your budget account information when you reach out for help.
          </p>
        </div>
        <div class="right">
          <p><a class="button" href="/support_access">Change Permissions</a></p>
        </div>
      </div>
      <hr>
      <h3>Developer Settings</h3>
      <div class="secondary-container">
        <div class="left">
          <p>To use the YNAB API to access your account, you must first configure authentication settings.</p>
          <p>(No idea what an API is? Don't worry, it's just a super nerdy way for software developers to connect other apps to YNAB. You can <a href="https://api.ynab.com/">check
              out more details</a> if you're interested—or just go on about your budgeting.)</p>
        </div>
        <div class="right">
          <p>
            <a class="button" href="/settings/developer">Developer Settings</a>
          </p>
        </div>
      </div>
      <hr>
      <h3>Delete Account</h3>
      <div class="secondary-container">
        <div class="left">
          <p>
            Delete your account if you no longer wish to use YNAB (and want all of your account and budget data <strong>permanently deleted</strong>).
          </p>

        </div>
        <div class="right">
          <p>
            <a class="button button-destructive " href="#">Delete Account</a>
          </p>
        </div>
      </div>
      <!---->
    </section>
  </main>
@endsection
