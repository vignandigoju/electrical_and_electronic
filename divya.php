<?php
// Include the database connection file
include 'db_conn.php';
// Assuming you have a database connection established
session_start();
// Fetch blood group and contact number based on the user_id
$userId = $_SESSION['user_id']; // Assuming you have stored the user_id in a session variable

$query = "SELECT Name,user_Id,blood_group,contact_no,Address FROM transporter_signup WHERE user_Id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userId);
$stmt->execute();
$stmt->bind_result($name,$userid,$bloodGroup, $contactNumber,$address);
$stmt->fetch();
$stmt->close();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportzz Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #FFC805;
            color: black;
            padding: 10px 20px;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-links li {
            cursor: pointer;
        }
        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }
            

  .profile-card {
    
    background-color: white;
    border-radius: 10px;
    margin-left: 400px;
    margin-top: 30px;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
   width:43%;
   
  }

  .profile-header {
    display: flex;
    align-items: center;
  }

  .profile-photo {
    width: 170px;
    height: 170px;
    margin-right: 40px;
  }

  .profile-name {
    font-size: 18px;
    font-weight: bold;
  }

  .profile-details {
    margin-top: 20px;
    font-size: 15px;
    text-align: flex;
  }
  .centered-box {
            width: 150px;
            height: 200px;
            background-color: lightgray;
            text-align: center;
            padding: 20px;
        }

    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="buslogo.png" alt="Transportzz Logo">
            <h1>Transportzz</h1>
        </div>
        <ul class="nav-links">
            <li><a href="adminHomePage.php" style="text-decoration: none">Home</a></li>
            <li><a href="profile.html" style="text-decoration: none">Profile</a></li>
            <li><a href="addbus.php" style="text-decoration: none">Add Bus</a></li>
            <li><a href="notification.php" style="text-decoration: none">Notification</a></li>
            <li><a href="login.php" style="text-decoration: none">Logout</a></li>
        </ul>
    </div>
         
    <div class="profile-card" class="centered-box">
        <div class="profile-header">
          <img class="profile-photo" src="student.png" alt="Profile Photo">
          <div class="profile-name"><?php echo htmlspecialchars($name); ?></div>
        </div>
        <div class="profile-details">
          <div class="profile-name">Profile</div>
          <p><strong>User ID:</strong><?php echo htmlspecialchars($userid); ?></p>
          <p><strong>Blood Group:</strong><?php echo htmlspecialchars($bloodGroup); ?></p>
          <p><strong>Contact Number:</strong><?php echo htmlspecialchars($contactNumber); ?></p>
          <p><strong>Address:</strong><?php echo htmlspecialchars($address); ?></p>
        </div>
      </div>
</body>
</html>