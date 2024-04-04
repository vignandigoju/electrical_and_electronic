<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $employeeName = $_POST["employee-name"];
    $dob = $_POST["dob"];
    $mobNo = $_POST["mob_no"];
    $email = $_POST["Email"];
    $designation = $_POST["employee-role"];

    // Format the data
    $formattedData = "Name: $employeeName\nDate of Birth: $dob\nMobile no: $mobNo\nEmail: $email\nDesignation: $designation\n\n";

    // Save the data to a text file
    $filename = "employee_data.txt";
    if (file_put_contents($filename, $formattedData, FILE_APPEND | LOCK_EX)) {
        echo "Employee data added successfully!";
    } else {
        echo "Failed to add employee data.";
    }
}
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
        
        li {
            display: inline;
            margin-right: 20px;
        }
        
        a {
            text-decoration: none;
            color: white;
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
        }
        form {
  border: 1px solid #ccc;
  padding: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input, select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #555;
}
    </style>
</head>
<body>
    <header>
    <h1>My Profile</h1>
    </header>
    
    <nav>
    <ul>
            <li><a href="appdashboard.php">Home</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <img src="C:\Users\91990\Downloads\Employee_Management_System\Employee_Management_System\assets\admin.png" ,height="30px",width=40px>

    
    <form id="add-employee-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <form id="add-employee-form">
    
    <label for="employee-name"> Name:</label>
    <input type="text" id="employee-name" name="employee-name" required>
    <label for="dob">Date of Birth:</label>
    <input type="Date" name="dob" required>
    <label for="mob_no">Mobile no:</label>
    <input type="big int" name="mob_no" required>
    <label for="email">Email</label>
    <input type="varchar" name="Email" required> 
    <label for="employee-role">Designation:</label>
    <select id="employee-role" name="employee-role">
      <option value="supervisor">supervisor</option>
      <option value="manager">Manager</option>
      <option value="worker">worker</option>
    </select>
        <button type="submit" class="add-button">Add</button>
    </form>
    
    <footer>
    <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
        <a href="mainlogin.php">Logout</a>
    
    </footer>
</body>
</html>
