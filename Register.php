<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="src/img/wearmee.jpg">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            background: url('src/img/wpr.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .register-container img {
            width: 100px;
            margin-bottom: 0.5rem;
        }

        .register-container h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .register-container input[type="text"],
        .register-container input[type="date"],
        .register-container input[type="password"],
        .register-container input[type="submit"] {
            width: calc(100% - 20px);
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .register-container input[type="submit"] {
            background: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .register-container input[type="submit"]:hover {
            background: #45a049;
        }

        .register-container input[type="checkbox"] {
            margin-right: 5px;
        }

        .register-container label {
            font-size: 0.9rem;
            color: #555;
            display: inline-block;
            margin-bottom: 1rem; 
        }

        .register-container #error_msg {
            color: red;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
    </style>
    <script>
        function checkPw() {
            var pwField = document.getElementById('password');
            pwField.type = pwField.type === "password" ? "text" : "password";
        }
    </script>
</head>
<body>
    <div class="register-container">
        <img src="src/img/wearmee.jpg" alt="Logo">
        <h1>Create Your Account!</h1>
        <form name="regform" id="regform" method="post" action="enterReg.php" onsubmit="regValidate(event);">
            <input type="text" name="fname" id="fname" placeholder="fullname" required>
            <input type="date" name="dob" id="dob" required>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label>
                <input type="checkbox" onclick="checkPw()"> Show Password
            </label>
            <input type="submit" name="submit" value="Sign Up">
            <div id="error_msg"></div>
        </form>
    </div>
    <script src="src/js/regCheck.js"></script>
</body>
</html>

