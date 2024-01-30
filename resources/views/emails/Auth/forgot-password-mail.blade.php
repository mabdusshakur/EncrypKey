<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Reset Password</h2>
                <p>You are receiving this email because we received a password reset request for your account.</p>
                <p>Please click the button below to reset your password:</p>
                <a href="{{ $mail_data['reset_password_url'] }}" class="btn btn-primary">Reset Password</a>
                <p>If you did not request a password reset, no further action is required.</p>
            </div>
        </div>
    </div>
</body>
</html>
