<!-- resources/views/emails/password-reset.blade.php -->
<html>
<head>
    <!-- Add your styles or inline styles here -->
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2>Password Reset Request</h2>

        <p>
            You are receiving this email because we received a password reset request for your account.
        </p>

        <p>
            <strong>Click the button below to reset your password:</strong>
        </p>

        <a href="{{ $actionUrl }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none;">
            Reset Password
        </a>

        <p>
            If you did not request a password reset, no further action is required.
        </p>

        <p>
            Thanks,<br>
            {{ config('app.name') }}
        </p>

        <!-- Add any additional content or styling as needed -->
    </div>
</body>
</html>
