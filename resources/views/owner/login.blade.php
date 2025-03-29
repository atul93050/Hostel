
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f2f5;
        }

        .auth-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            transition: all 0.3s ease;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #404040;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #1877f2;
            box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.1);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .remember-me input {
            width: auto;
            margin-right: 0.5rem;
        }

        button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .primary-btn {
            background: #1877f2;
            color: white;
        }

        .primary-btn:hover {
            background: #166fe5;
        }

        .sso-buttons {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .sso-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: #fff;
            border: 1px solid #ddd;
            color: #404040;
        }

        .sso-btn:hover {
            background: #f8f9fa;
        }

        .toggle-form {
            text-align: center;
            margin-top: 1.5rem;
            color: #606770;
        }

        .toggle-form a {
            color: #1877f2;
            text-decoration: none;
            font-weight: 500;
        }

        .toggle-form a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            margin: 0.5rem 0;
            font-size: 0.9rem;
            display: none;
        }

        .password-strength {
            font-size: 0.8rem;
            color: #606770;
            margin-top: 0.25rem;
        }

        .sso-icon {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="auth-container" id="authContainer">
        <!-- Login Form -->
        <form id="loginForm" class="active-form" method="post" action="{{ route('owner.submit.login') }}">
            @csrf
            <h2>Login</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
             +
                <input type="password" id="password" name="password">
            </div>
            <div class="remember-me">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Remember me</label>
            </div>
            <div class="error-message" id="loginError"></div>
            <button type="submit" class="primary-btn">Login</button>

            <div class="sso-buttons">
                <button type="button" class="sso-btn">
                    <svg class="sso-icon" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z" />
                    </svg>
                    Continue with Google
                </button>
                <button type="button" class="sso-btn">
                    <svg class="sso-icon" viewBox="0 0 24 24">
                        <path fill="#1877F2"
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                    Continue with Facebook
                </button>
                <button type="button" class="sso-btn">
                    <svg class="sso-icon" viewBox="0 0 24 24">
                        <path fill="#333"
                            d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.113.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                    </svg>
                    Continue with GitHub
                </button>
            </div>

            <div class="toggle-form">
                New user? <a href="{{ route('showRegister') }}" id="showSignup">Create account</a>
            </div>
        </form>

    </div>
</body>
</html>