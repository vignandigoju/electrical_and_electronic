<?php
// Determine the current page name
$activePage = basename($_SERVER['PHP_SELF']);

// PHP code for handling form submission
$conn = mysqli_connect("localhost", "root", "", "Maintanence");
if(isset($_POST['submit'])){
  $role=$_POST['role'];
  $name=$_POST['name'];
  $mobnum=$_POST['mobnum'];
  $dob=$_POST['dob'];
  $password=$_POST['password'];
  $username=$_POST['username'];

  $sql="INSERT INTO login(role, name, mobnum,dob,password,username) VALUES ('$role','$name','$mobnum','$dob','$password','$username')";
  $data = mysqli_query($conn,$sql);

//   if($data)
//   {
//     echo "Data inserted successfully";
//   }
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
                <li><a href="equipmentdetail.php" class="<?= ($activePage == 'equipmentdetail.php') ? 'active' : '' ?>">Equipment Details</a></li>
                <li><a href="profile.php" class="<?= ($activePage == 'profile.php') ? 'active' : '' ?>">My Profile</a></li>
                <li><a href="mainlogin.php" class="<?= ($activePage == 'mainlogin.php') ? 'active' : '' ?>">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="box">
            <h2>ADD EMPLOYEE</h2>
            <form id="add-employee-form" action="" method="post" onsubmit="showPopup()">
            <label for="name">User  ID:</label>
                <input type="text" id="name" name="username" required><br>
                <label for="name">Employee Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="password">Password:</label><br>
                <input type="password" name="password" required><br>
                <label for="mobnum">Mobile:</label>
                <input type="text" name="mobnum" required>
                <label for="dob">Dateofbirth:</label><br>
                <input type="date" name="dob" required><br><br>
                <label for="role">Designation:</label>
                <select id="role" name="role">
                    <option value="select">Select</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="worker">Worker</option>
                    <option value="user">User</option>
                </select>
                <button type="submit" name="submit">Add</button>
            </form>
        </div>
    </div>

    <script>
        function showPopup() {
            alert("Data inserted successfully");
        }
    </script>
</body>
</html>
