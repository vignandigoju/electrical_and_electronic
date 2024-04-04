
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Equipment Maintenance</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f6f8ff;
        }

        header {
            background-color: #3F3064;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            margin: 0;
        }
        nav {
            background-color: #3F3064;
            color: white;
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #ffffff;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        ul a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            padding: 10px 20px;
            transition: all 0.3s;
            position: relative;
            font-weight: bold;
        }

        ul a:hover {
            background-color: #2D224D; /* Updated hover background color */
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff; /* Updated active link background color */
            z-index: -1;
            border-radius: 8px;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 24px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h4 {
            margin-top: 0;
            color: #3F3064;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container img {
            margin-bottom: 20px;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #3F3064;
            font-size: 16px;
            margin-bottom: 6px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            height: 40px;
            padding: 0 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #3F3064;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2D224D;
        }

        .toggle-password {
            cursor: pointer;
            color: #3F3064;
            font-size: 14px;
            text-decoration: underline;
            display: block;
            margin-top: 6px;
            text-align: left;
        }
    </style>
</head>

<body>
    <header>
        <h2>ElecDhiwise</h2>
        <!-- Add any header content here -->
        <nav>
            <ul>
                <li><a href="homepage.php" class="<?= ($activePage == 'homepage.php') ? 'active' : '' ?>">MAIN PAGE</a></li>
            </ul>
        </nav>
    </header>
        
    </div>
   
</body>

</html>
