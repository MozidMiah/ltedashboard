<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .reset-card {
            background: #fff;
            width: 450px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        }

        .reset-card h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }

        .reset-card p {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        label {
            font-weight: bold;
            font-size: 14px;
            color: #444;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #0d6efd;
            box-shadow: 0px 0px 5px rgba(13, 110, 253, 0.5);
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-reset {
            background: #0d6efd;
            color: white;
        }

        .btn-reset:hover {
            background: #084298;
        }

        .back-login {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .back-login a {
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
        }

        .back-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="reset-card">
        <h2>Reset Password</h2>

        <p>Enter your email and set a new password.</p>

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>New Password</label>
            <input type="password" name="password" placeholder="Enter new password" required>

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm password" required>

            <button type="submit" class="btn btn-reset">Reset Password</button>
        </form>

        <div class="back-login">
            Back to <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

</body>
</html>
