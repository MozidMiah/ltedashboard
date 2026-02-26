<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

        .register-card {
            background: #fff;
            width: 450px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
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
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #0d6efd;
            box-shadow: 0px 0px 5px rgba(13, 110, 253, 0.5);
        }

        .error-text {
            color: red;
            font-size: 13px;
            margin-bottom: 12px;
            display: block;
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

        .btn-register {
            background: #0d6efd;
            color: white;
        }

        .btn-register:hover {
            background: #084298;
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .login-link a {
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <h2>Create Account</h2>

        {{-- Success Message --}}
        @if(session('message'))
            <div class="alert-success">
                {{ session('message') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <label>Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name">

            @error('name')
                <span class="error-text">{{ $message }}</span>
            @enderror

            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">

            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
            
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">

            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm password">

            <button type="submit" class="btn btn-register">Register</button>
        </form>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

</body>
</html>
