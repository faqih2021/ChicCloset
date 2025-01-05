<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="src/img/wearmee.jpg">

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            background: url('src/img/wpp.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container img {
            width: 100px;
            margin-bottom: 1.5rem;
        }

        .login-container h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="submit"],
        .login-container .sign-up-btn {
            width: calc(100% - 20px); 
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box; 
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            border: 1px solid #ccc;
        }

        .login-container input[type="submit"] {
            background: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .login-container .sign-up-btn {
            background: #2196f3;
            color: #fff;
            border: none;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover,
        .login-container .sign-up-btn:hover {
            opacity: 0.9;
        }

        .login-container .forgot-password {
            display: block;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #555;
            text-decoration: none;
        }

        .login-container .forgot-password:hover {
            color: #2196f3;
        }

        #sign_msg {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="src/img/wearmee.jpg" alt="Logo">
        <h1>Welcome to Wearme!</h1>
        <form method="post" action="validateLog.php" onsubmit="signInVal(event);">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" name="signIn" value="Sign In">
            <button type="button" class="sign-up-btn" onclick="window.location.href='register.php'">Sign Up</button>
        </form>
        <a href="#" class="forgot-password">Forgot Password?</a>
        <div id="sign_msg"></div>
    </div>
    <script type="text/javascript" src="src/js/regCheck.js"></script>
</body>
</html>




