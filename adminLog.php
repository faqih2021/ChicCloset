<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            background: url('src/img/wpa.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 4rem; 
            width: 100%;
            max-width: 900px; 
        }

        .form {
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form h3 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #333;
            text-align: center;
        }

        .form input[type="text"],
        .form input[type="password"],
        .form .btnLogin {
            width: 100%; 
            padding: 1rem; 
            margin-bottom: 1rem;
            border-radius: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form .btnLogin {
            background: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .form .btnLogin:hover {
            background: #45a049;
        }

        .logo {
            width: 35%;
            text-align: center;
        }

        .logo img {
            width: 210px; 
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
                padding: 3rem; 
            }

            .form, .logo {
                width: 100%;
            }

            .logo img {
                width: 150px;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <h3>LOGIN ADMIN</h3>
            <form method="POST" action="adminValidate.php">
                <input type="text" placeholder="Admin Name" name="uname" required>
                <input type="password" placeholder="Password" name="pw" required>
                <input class="btnLogin" type="submit" value="Login" name="submit">
            </form>
        </div>
        <div class="logo">
            <img src="src/img/wearmee.jpg" alt="Logo">
        </div>
    </div>
</body>
</html>


