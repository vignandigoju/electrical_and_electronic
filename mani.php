<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintanence</title>
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
        ul a{
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
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        section h2{
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #1c0d3f;
        }
    </style>
</head>
<body>
    <header>
        <h1>Electrical Maintanence</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
            <li><a href="Rating.php">Rating</a></li>
        </ul>
    </nav>
    
    <main>
        <section id="facade">
            <h2><a href="staff.php">Add Employee</a></h2>

        </section>
        
        <section id="blocks">
            <h2><a href="empdetails.php">Employee Details</a></h2>
            
        </section>
</body>
</html>