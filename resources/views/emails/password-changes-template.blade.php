<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Change Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .header {
      background-color: #3B5EDA;
      color: white;
      padding: 10px;
      text-align: center;
      font-size: 24px;
      font-weight: 800;
      margin-bottom: 20px;
    }
    .content {
      margin-bottom: 20px;
    }
    .footer {
      text-align: center;
      font-size: 12px;
      color: #666;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="header">
    Password Change Confirmation
  </div>
  <div class="content">
    <p>Hello <strong>{{ $user->name }}</strong>,</p>
    <p>Your password has been successfully changed. Here are your updated login details:</p>
    <p><strong>Email/Username:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $new_password }}</p>
    <p>If you did not request this change, please contact our support team immediately.</p>
  </div>
  <div class="footer">
    <p>Thank you for using our service!</p>
    <p>© {{ date('Y') }} Ynab Budget. All rights reserved.</p>
  </div>
</div>
</body>
</html>


