<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "maintanence");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Update profile if the form is submitted
if (isset($_POST['update_profile'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $mobnum = $_POST['mobnum'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $update_query = "UPDATE login SET name=?, dob=?, mobnum=?, password=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $dob, $mobnum, $password, $id);

    
    // Close prepared statement
    mysqli_stmt_close($stmt);
}

// Fetch user's profile information
$sql = "SELECT id, role, name, dob, mobnum, password FROM login WHERE id=1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $role = $row['role'];
    $name = $row['name'];
    $dob = $row['dob'];
    $mobnum = $row['mobnum'];
    $password = $row['password'];
} else {
    echo 'No user found.';
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintenance - My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
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
            background-color: #2D224D;
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            z-index: -1;
            border-radius: 8px;
        }

        .logout-btn {
            background-color: #ffffff; /* White */
            color: #3F3064; /* Theme color */
            transition: background-color 0.3s ease, color 0.3s ease;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #e0ba5c; /* Theme color */
            color: #3F3064; /* Theme color */
        }

        center {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #3F3064; /* Theme color */
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #ffffff; /* Text color */
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
            color: #ffffff; /* Text color */
        }

        .profile-info-item {
            margin-bottom: 10px;
        }

        .edit-input {
            background-color: #ffffff; /* White */
            border: 2px solid #3F3064; /* Theme color */
            border-radius: 5px;
            padding: 5px;
            color: #333; /* Text color */
            font-size: 16px;
            margin-bottom: 5px;
            width: 100%;
            display: none; /* Initially hidden */
        }

        .edit-buttons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }

        .edit-button,
        .update-button {
            background-color: #3F3064; /* Theme color */
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 48%;
        }

        .edit-button:hover,
        .update-button:hover {
            background-color: #2D224D;
        }

        #update_button {
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>
<header>
    <h2>ElecDhiwise</h2>
    <nav>
        <ul>
            <li><a href="managerhome.php">Home</a></li>
            <li><a href="appdashboard.php">Category</a></li>
            <li><a href="addcategory.php">Add Category</a></li>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="addequipment.php">Add Equipment</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="equipmentdetail.php">Equipment Details</a></li>
            <li><a href="profile.php" class="active">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
</header>

<center>
    <img src="https://thumbs.dreamstime.com/b/anonimos-icon-profie-social-network-over-color-background-differnt-uses-icon-social-profile-148257454.jpg" alt="Anonimos Icon" class="profile-img">
    <h1>My Profile</h1>
    <div class="profile-info">
        <form id="profile_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="profile-info-item"><b>Name:</b> <span><?php echo $name; ?></span> <input type="text" name="name" class="edit-input" value="<?php echo $name; ?>"></div>
            <div class="profile-info-item"><b>Role:</b> <?php echo $role; ?></div>
            <div class="profile-info-item"><b>DOB:</b> <span><?php echo $dob; ?></span> <input type="text" name="dob" class="edit-input" value="<?php echo $dob; ?>"></div>
            <div class="profile-info-item"><b>Mobile.No:</b> <span><?php echo $mobnum; ?></span> <input type="text" name="mobnum" class="edit-input" value="<?php echo $mobnum; ?>"></div>
            <div class="profile-info-item"><b>Password:</b> <span>******</span> <input type="password" name="password" class="edit-input" value="<?php echo $password; ?>"></div>
            <div class="edit-buttons">
                <button type="button" id="edit_button" class="edit-button">Edit</button>
                <button type="submit" name="update_profile" id="update_button" class="update-button">Update</button>
            </div>
        </form>
    </div>
</center>

<footer>
    <!-- Footer content here -->
</footer>

<script>
    document.getElementById('edit_button').addEventListener('click', function() {
        var inputs = document.querySelectorAll('.edit-input');
        var spans = document.querySelectorAll('.profile-info-item span');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].style.display = 'block'; // Display the edit fields
            spans[i].style.display = 'none'; // Hide the spans
        }
        document.getElementById('update_button').style.display = 'inline'; // Show the update button
        this.style.display = 'none'; // Hide the edit button
    });

    document.getElementById('profile_form').addEventListener('submit', function() {
        alert('Profile updated successfully');
    });
</script>
</body>
</html>
