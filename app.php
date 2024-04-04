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
            padding: 20px;
            
        }

        section {
            width: 80%;
            margin-bottom: 10px; /* Decreased margin */
            padding: 5px; /* Decreased padding */
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            text-align: center;
            font-size: 1.2em; /* Decreased font size */
            margin: 5px 0; /* Adjusted margin */
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
            <li><a href="addequipment.php">Add Equipment</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <br><br>
    <center>
        <section id="facade">
            <h2><a href="acloc1.php">AC</a></h2>
        </section>
        
        <section id="blocks">
            <h2><a href="fanloc1.php">FAN</a></h2>
        </section>
        
        <section id="landscaping">
            <h2><a href="lightloc1.php">LIGHT</a></h2>
        </section>
        
        <section id="security">
            <h2><a href="generatorloc1.php">GENERATOR</a></h2>
        </section>
        
        <section id="fire">
            <h2><a href="socketloc1.php">SOCKETS</a></h2>
        </section>
    </center>
</body>
</html>