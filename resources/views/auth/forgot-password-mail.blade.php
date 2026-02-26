<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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

        .card {
            background: white;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
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
            margin-top: 10px;
        }

        .btn-send {
            background: #0d6efd;
            color: white;
        }

        .btn-send:hover {
            background: #084298;
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

        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Forgot Password</h2>

    @if(session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('forgot.password.post') }}" method="POST">
        @csrf

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">

        @error('email')
            <span class="error-text">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-send">Send Reset Link</button>
    </form>
</div>

</body>
</html>
