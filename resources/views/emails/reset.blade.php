<!DOCTYPE html>
<html>
<head>
    <title>Test Mail</title>
</head>
<body>
    <h2>Hello {{ $token }}</h2>
    <p>This is a test mail from Laravel using Gmail SMTP.</p>
    <a href="{{ route('reset.password',$token) }}"></a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        .header {
            background: #0d6efd;
            padding: 20px;
            text-align: center;
            color: white;
        }

        .content {
            padding: 30px;
            text-align: center;
        }

        .content h2 {
            color: #333;
        }

        .content p {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #0d6efd;
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn:hover {
            background: #084298;
        }

        .footer {
            background: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="header">
            <h1>Password Reset Request</h1>
        </div>

        <div class="content">
            <h2>Hello!</h2>

            <p>
                You are receiving this email because we received a password reset request for your account.
            </p>

            <a href="{{ route('reset.password', $token) }}" class="btn">
                Reset Password
            </a>

            <p style="margin-top: 20px;">
                If you did not request a password reset, no further action is required.
            </p>

            <p style="margin-top: 15px; font-size: 14px; color: #999;">
                Token: <b>{{ $token }}</b>
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Application. All Rights Reserved.</p>
        </div>

    </div>

</body>
</html>
