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
                <h2>Email Verification</h2>
                <p>Thank you for registering. Please click the button below to verify your email address:</p>
                <a href="{{ $mail_data['verification_url'] }}" class="btn btn-primary">Verify Email</a>
                <p>If you did not register, you can safely ignore this email.</p>
            </div>
        </div>
    </div>
</body>
</html>
