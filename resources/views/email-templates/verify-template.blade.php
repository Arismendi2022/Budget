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
    .image-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .image-container img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
<div class="email-container">
  <div class="email-header">
    <img style="display:block; outline:none; text-decoration:none; height:180px; max-width:300px; line-height:100%; border-width:0" height="180"
      src="https://ci3.googleusercontent.com/meips/ADKq_NY_g6GVRuIxu7dv2RZoyW4rpC1-cBw8hEQRx6EqpZWaCf3fpEDvnHapOjFRmP5hvg8OcNb5P8CkHKTlr-h-U5r7q2GntaJBt2nHwKdGyhJWy2VSh9FrL2TtlV_Pz0dkA08Dt-hhh5lcVBZ11YRGJgdvunjb4Miv5xcM7BV-MylrZrsJjY9Tnj4XQ8EcQa2U=s0-d-e1-ft#https://braze-images.com/appboy/communication/assets/image_assets/images/6516f1e4e6b0d7004ba95111/original.png?1696002532"
      data-imagetype="External">
  </div>
  <div
    style="font-family: Figtree, Helvetica, Google Sans, sans-serif, serif, EmojiFont; font-size: 28px; font-weight: 800; letter-spacing: 0px; line-height: 36px; color: rgb(25, 34, 60) !important;"
    align="center" class="x_heading3">The world of YNAB awaits—right after you confirm your email!
  </div>
  <div class="image-container">
    <img class="m_-1373002339588050113mobileImage CToWUd"
      src="https://ci3.googleusercontent.com/meips/ADKq_NZ6_R68uf0vP3zXMMO_popl4u_zwWoCtxUoZChkBac5jdhOCrxTq2Gs8ffh7QCZfpH7hdOser7_lA2ZVpVQxu4WroN9sNS8hIDF_MBIX3VDhAXoZpVAhwCf22dImK8Un5ybBu3jJOLjkkcRfGobkFdUYn6EiyK1j5a2e1emtqyATqmLlUUoZJTDdxBqWMcQ=s0-d-e1-ft#https://braze-images.com/appboy/communication/assets/image_assets/images/64932d40448402016c457663/original.png?1687366976"
      style="max-width:300px;display:block;width:auto;height:auto;line-height:100%;outline:none;text-decoration:none;border-width:0" data-bit="iit">
  </div>
  <div class="email-body">
    <h3 style="font-size: 20px; font-weight: 700;">Hi there, <span style="font-size: 16px; font-weight: 600;">{{ $users_email }}</span></h3>
    <p>Changing your relationship with money starts with a single step—and it's an <strong>easy win</strong>! To unlock all of your potential with YNAB, we just need
      you to confirm your email by clicking the link below:
    </p>
    <a href="{{ $action_link }}" class="reset-button" target="_blank" align="center" role="presentation" valign="middle">Confirm Your Email</a>
    <p>All set? Perfect. Let's get YNABing!</p>
  </div>
  <div class="email-footer">
    <img style="display:block; outline:none; text-decoration:none; height:auto; width:64px; max-width:64px; line-height:100%; border-width:0" width="64" height="auto"
      src="https://ci3.googleusercontent.com/meips/ADKq_NbcUIiu_nYnaEDCJuHuMmJBaDOI6zPJU0yXFFn-FtwQQlZonhGRKU04gbroZ951phOKrbo-mMFc5BASJD0qiwo8yIXOurVyY6NHmtgcBA--vNytfa_HzI-Y5_D0Y4jgq5Vo_RanGA0BKJG2kDJpk_DnkahQ-LRc7eKp5aC1Om1o7JKLNQT2SmHjhK2PPLEi=s0-d-e1-ft#https://braze-images.com/appboy/communication/assets/image_assets/images/647f8cc92c716b37d4638963/original.png?1686080713"
      data-imagetype="External">
    <p style="display:block; margin:13px 0"><strong>The YNAB Team</strong></p>
  </div>
</div>
</body>

</html>

