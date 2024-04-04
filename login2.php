<!DOCTYPE html>
<html lang="en">
<head>
    <title>Electrical Equipment Maintenance</title>
    <style>
        body {
            max-width: max-content;
            margin: auto;
            margin-top: 80px;
            background-color: #3F3064;
            font-size: 1.3em;
            color: white;
            font-family: Arial, sans-serif;
        }

        #login-container {
            max-width: 500px;
            margin: auto;
            background-color: #f6f8ff;
            padding: 30px;
            border: 1px solid white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        #login-container img {
            width: 100%;
            max-width: 250px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        #btn_s {
            width: 100%;
            height: 35px;
            background-color: #BDEEC5;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        #btn_i {
            width: 100%;
            background-color: transparent;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body style="background-color: white;">
    <div id="login-container">
        <center>
            <img src="Creative_Color_Brushstroke_Lettering_Logo-removebg-preview.png" alt="Logo">
            <h4>Login</h4>
            <form method="post">
                <div id="page">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>

                    <label for="password">Password:</label>
                    <input type="password" id="pass" name="password" required>

                    <input type="submit" name="submit" value="Login" id="btn_s">
                </div>
            </form>
        </center>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("pass");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        // Add JavaScript code to reload the page after the pop-up is dismissed
        var popUpMessage = document.querySelector('script');
        if (popUpMessage) {
            popUpMessage.addEventListener('click', function() {
                window.location.reload();
            });
        }
    </script>
</body>
</html>
