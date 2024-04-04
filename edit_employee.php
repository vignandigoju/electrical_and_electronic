<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "maintanence");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Update profile and login if the form is submitted
if (isset($_POST['update_profile'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    
    $mobnum = $_POST['mobnum'];
  
    $role = $_POST['role'];
    
    // Use prepared statement to prevent SQL injection
    $update_query = "UPDATE login SET name=?, mobnum=?,  role=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "sssi", $name,  $mobnum,  $role, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Employee details updated successfully.";
    } else {
        $error_message = "Error updating employee details: " . mysqli_error($conn);
    }
    // Close prepared statement
    mysqli_stmt_close($stmt);
}


// Check if ID parameter is passed in the URL
if(isset($_GET['id'])) {
    $employeeID = $_GET['id'];

    // Query to retrieve employee data by ID
    $sql = "SELECT * FROM login WHERE id='$employeeID'";
    $result = mysqli_query($conn, $sql);

    // Fetch employee data
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $employeeName = $row['name'];
        $employeeRole = $row['role'];
        $employeeMobNum = $row['mobnum'];
        $employeeTimestamp = $row['timestamp'];
        $employeeAction = $row['action'];
    } else {
        echo "Employee not found.";
        exit;
    }
} 

// Close database connection
mysqli_close($conn);
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
            color: #3F3064;
        }

        header {
            background-color: #3F3064;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h2 {
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px); /* Adjusted */
        }

        .box {
            background-color: #ffffff; /* Updated box background color */
            width: 360px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        select,
        button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #3F3064;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            height: 40px;
            background-color: #3F3064;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #2D224D; /* Updated button hover background color */
        }
    </style>
</head>
<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
            <li><a href="managerhome.php">Home</a></li>
                <li><a href="appdashboard.php" class="<?= ($activePage == 'appdashboard.php') ? 'active' : '' ?>">Category</a></li>
                <li><a href="addcategory.php" class="<?= ($activePage == 'addcategory.php') ? 'active' : '' ?>">Add Category</a></li>
                <li><a href="staff.php" class="<?= ($activePage == 'staff.php') ? 'active' : '' ?>">Add Employee</a></li>
                <li><a href="addequipment.php" class="<?= ($activePage == 'addequipment.php') ? 'active' : '' ?>">Add Equipment</a></li>
                <li><a href="empdetails.php" class="<?= ($activePage == 'empdetails.php') ? 'active' : '' ?>">Employee Details</a></li>
                <li><a href="profile.php" class="<?= ($activePage == 'profile.php') ? 'active' : '' ?>">My Profile</a></li>
                <li><a href="mainlogin.php" class="<?= ($activePage == 'mainlogin.php') ? 'active' : '' ?>">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="box">
            <h2>UPDATE EMPLOYEE</h2>
            <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $employeeID; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $employeeName; ?>"><br><br>
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="<?php echo $employeeRole; ?>"><br><br>
       
        <label for="mobnum">Mobile Number:</label>
        <input type="text" id="mobnum" name="mobnum" value="<?php echo $employeeMobNum; ?>"><br><br>
       
        <label for="action">Action:</label>
        <input type="text" id="action" name="action" value="<?php echo $employeeAction; ?>" disabled><br><br>
        <input type="submit" name="update_profile" value="Update ">
    </form>
        </div>
    </div>

    <?php if (isset($success_message)): ?>
    <div class="success-message" style="margin-top:-35em;"><?php echo $success_message; ?></div>
<?php elseif (isset($error_message)): ?>
    <div class="error-message" style="margin-top:-35em;"><?php echo $error_message; ?></div>
<?php endif; ?>
</body>
</html>
