<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <!-- Enlace a Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;700&family=Google+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #19223c; /* Actualizado a #19223c */
      font-family: 'Figtree', 'Google Sans', Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: none;
      width: 100% !important;
    }

    .email-container {
      background-color: #ffffff;
      border: 1px solid #dcdcdc;
      border-radius: 8px;
      margin: 40px auto;
      max-width: 530px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .email-header {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .email-header img {
      height: 120px;
      max-width: 140px;
    }

    .email-title {
      font-family: 'Figtree', Helvetica, Google Sans, sans-serif;
      font-size: 28px;
      color: #1a1a1a;
      margin-top: 20px;
      font-weight: 800;
    }

    .email-body {
      color: #555555;
      font-size: 16px;
      line-height: 1.5;
      margin: 20px 0;
      text-align: left;
    }

    .email-body h3 {
      font-size: 18px;
      color: #1a1a1a;
    }

    .reset-button {
      font-family: 'Figtree', Helvetica, Google Sans, sans-serif;
      display: block;
      text-align: center;
      background-color: #3b5eda;
      color: #ffffff;
      font-size: 16px;
      font-weight: 700;
      line-height: 19px;
      padding: 15px 0;
      border-radius: 8px;
      text-decoration: none;
      width: 100%;
      border: none;
      margin: 20px 0;
      border-collapse: collapse;
      border-style: none;
      cursor: pointer;
    }
    p {
      font-family: 'Figtree', Helvetica, Google Sans, sans-serif;
      font-size: 16px;
      font-weight: 400;
      letter-spacing: 0px;
      line-height: 24px;
      color: #19223c;
    }

    .email-footer {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin-top: 32px;
      font-size: 14px;
      gap: 16px;
      text-align: left;
    }

    .email-footer img {
      width: 64px;
    }
  </style>
</head>

<body>
<div class="email-container">
  <div class="email-header">
    <img style="display:block; outline:none; text-decoration:none; height:180px; max-width:300px; line-height:100%; border-width:0" height="180"
      src="{{ asset('images/back/brand/original.webp') }}" data-imagetype="External">
  </div>
  <div
    style="font-family: Figtree, Helvetica, Google Sans, sans-serif, serif, EmojiFont; font-size: 28px; font-weight: 800; letter-spacing: 0px; line-height: 36px; color: rgb(25, 34, 60) !important;"
    align="center" class="x_heading3">The world of YNAB awaits—right after you confirm your email!
  </div>
  <div class="email-body">
    <h3 style="font-size: 20px; font-weight: 700;">Hi there, {{ $user->name }}</h3>
    <p>Changing your relationship with money starts with a single step—and it's an <strong>easy win</strong>! To unlock all of your potential with YNAB, we just need
      you to confirm your email by clicking the link below:
    </p>
    <hr>
    <a href="{{ $actionlink }}" class="reset-button" target="_blank" align="center" role="presentation" valign="middle">Confirm Your Email</a>
    <hr>
    <p>All set? Perfect. Let's get YNABing!</p>
  </div>
  <div class="email-footer">
    <img style="display:block; outline:none; text-decoration:none; height:auto; width:64px; max-width:64px; line-height:100%; border-width:0" width="64" height="auto"
      src="{{ asset('images/shared/brand/ynab-tree-logo.svg') }}" data-imagetype="External">
    <p style="display:block; margin:13px 0"><strong>The YNAB Team</strong></p>
  </div>
</div>
</body>

</html>

