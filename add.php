<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["staff_type"])) {
        $staff_type = $_POST["staff_type"];
        if ($staff_type == "supervisor") {
            // Redirect to the "add supervisor" page
            header("Location: addsupervisor.php");
            exit;
        } elseif ($staff_type == "employee") {
            // Redirect to the "add employee" page
            header("Location: addemployee.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
        <h1>Electrical Maintenance</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="empdetails.php">Employee details</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
            <li><a href="status.php">Status</a></li>
            <li><a href="Rating.php">Rating</a></li>
        </ul>
    </nav>
    
    <main>
        <section id="staff-type">
            <h2>Select Staff Type</h2>
            <form method="POST">
                <select name="staff_type">
                    <option value="supervisor">Add Supervisor</option>
                    <option value="employee">Add Employee</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
        <a href="mainlogin.php">Logout</a>
    </footer>
</body>
</html>
