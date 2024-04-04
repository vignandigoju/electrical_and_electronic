<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #1c0d3f;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #311249;
            color: white;
            padding: 10px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul a {
            color: white;
        }

        li {
            display: inline;
            margin-right: 20px;
            color: white;
        }

        a {
            text-decoration: none;
        }

        main {
            padding: 10px;
        }

        section {
            margin-bottom: 30px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            text-align: center;
            font-size: 1.2em;
            margin: 2px 0;
        }

        h2 {
            margin-top: 0;
            color: #1c0d3f;
        }
    </style>
</head>
<body>
    <header>
        <h1>Electrical Maintenance</h1>
    </header>

    <nav>
        <ul>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainstatus.php">Work Status</a></li>
            <li><a href="viewissue.php">View Issue</a></li>
            <li><a href="Rating.php">Rating</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2><a href="acloc1.php">Ac</a></h2>
        </section>

        <section>
            <h2><a href="fanloc1.php">Fan</a></h2>
        </section>

        <section>
            <h2><a href="lightloc1.php">Light</a></h2>
        </section>

        <section>
            <h2><a href="generatorloc1.php">Generator</a></h2>
        </section>

        <section>
            <h2><a href="socketloc1.php">Socket</a></h2>
        </section>
    </main>
</body>
</html>
