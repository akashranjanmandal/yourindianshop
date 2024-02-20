<!-- resources/views/emails/verify.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body style="font-family: 'Arial', sans-serif;">

    <div style="max-width: 600px; margin: auto; padding: 20px; text-align: center; border: 1px solid #ddd;">
        <h2>Email Verification</h2>
        <p>Dear {{ $user->name }},</p>
        <p>Thank you for signing up. Please verify your email address by clicking the link below:</p>

        <a href="{{ url('/api/verify-email/' . $user->verification_token) }}" style="display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Verify Email</a>

        <p>If you did not sign up for an account, you can ignore this email.</p>
    </div>

</body>
</html>
