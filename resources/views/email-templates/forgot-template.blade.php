<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <!-- Enlace a Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;700&family=Google+Sans:wght@400;700&display=swap" rel="stylesheet">
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
      max-width: 600px;
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
      font-family: 'Figtree',Helvetica,Google Sans,sans-serif;
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
      font-family: 'Figtree',Helvetica,Google Sans,sans-serif;
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
    <img
      src="https://ci3.googleusercontent.com/meips/ADKq_NbkAJsH5xOUJD5lC2awnNojdM2cOiRVfe3fMvbEsJODS69P7c5dIOX1QIBLwOM1kOkjnuAToVNRN351XShIxsxYxbHZf9Jvgyhw5-w4EUxh8j67iVdkWsFP0NHUK0gU7WxqIUQJyWM7r8EcrbeGUDI8rHOFdJPfWIxjzXqLCYHeNqVdkNfLdDsgHSDWIOd7=s0-d-e1-ft#https://braze-images.com/appboy/communication/assets/image_assets/images/66cd19f15565dc006390af6a/original.png?1724717553"
      alt="Logo" style="display:block;outline:none;text-decoration:none;height:120px;max-width:140px;line-height:100%;border-width:0">
  </div>
  <div class="email-title">Password reset</div>
  <div class="email-body">
    <h3 style="font-size: 20px; font-weight: 700;">Hi there, {{ $user->name }}</h3>
    <p>We have received a request to change the password associated with your YNAB account. You can do this through the link in the button below, which is valid for 6
      hours.</p>
    <a href="{{ $actionlink }}" class="reset-button" target="_blank" align="center" role="presentation" valign="middle">Reset password</a>
    <p>If you didn't request this, you can safely ignore this email.<br>Your password won't change until you access the link above and create a new one.</p>
  </div>
  <div class="email-footer">
    <img
      src="https://ci3.googleusercontent.com/meips/ADKq_NbcUIiu_nYnaEDCJuHuMmJBaDOI6zPJU0yXFFn-FtwQQlZonhGRKU04gbroZ951phOKrbo-mMFc5BASJD0qiwo8yIXOurVyY6NHmtgcBA--vNytfa_HzI-Y5_D0Y4jgq5Vo_RanGA0BKJG2kDJpk_DnkahQ-LRc7eKp5aC1Om1o7JKLNQT2SmHjhK2PPLEi=s0-d-e1-ft#https://braze-images.com/appboy/communication/assets/image_assets/images/647f8cc92c716b37d4638963/original.png?1686080713"
      alt="YNAB Team Logo">
    <p style="display:block;margin:13px 0"><strong>The YNAB Team</strong></p>
  </div>
</div>
</body>

</html>
