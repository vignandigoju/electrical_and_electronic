<?php
session_start(); // Start the session
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null; // Check if username is set in session
$conn = mysqli_connect("localhost", "root", "", "maintanence");

if ($user) {
    $sql = "SELECT role, name, dob, mobnum FROM login WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        $name = $row['name'];
        $dob = $row['dob'];
        $mobnum = $row['mobnum'];
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
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
            background-color: white;
            z-index: -1;
            border-radius: 8px;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        main {
            text-align: center;
            background: rgba(255,255,255,0.8);
            padding: 30px 10px;
            width: 500px;
            margin: 0 auto;
            margin-top: 30px;
        }

        img.profile-pic {
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h1 {
            margin-top: 0;
            color: #333;
            margin-bottom: 0;
        }

        section {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #4a148c;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
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

        .dialog-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .dialog-box {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            max-width: 300px;
            width: 100%;
        }

        .dialog-box input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        .dialog-box button {
            padding: 10px 20px;
            border: none;
            /* background-color: #3F3064; */
            color: white;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        /* .dialog-box button:hover {
            background-color: #2D224D;
        } */

        /* Close button styles */
        .close-btn {
    position: absolute;
    top: 10px; /* Adjust the top position as needed */
    right: 10px; /* Adjust the right position as needed */
    background: none;
    border: none;
    cursor: pointer;
    font-size: 20px;
    color: red;
    width: 30px; /* Set width and height to create a square button */
    height: 30px;
    display: flex; /* Center the close icon */
    justify-content: center;
    align-items: center;
    border-radius: 50%; /* Create a circular button */
    transition: background-color 0.3s ease;
}


/* Update button styles */
.update-btn {
    padding: 10px 20px;
    border: none;
    background-color: #3F3064;
    color: white;
    cursor: pointer;
    width: 100%;
    border-radius: 5px;
    margin-top: 10px; /* Add margin to separate from other elements */
}

.update-btn:hover {
    background-color: #2D224D;
}
    </style>
</head>

<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
            <li><a href="issue.php">Raise Issue</a></li>
                <li><a href="userissue.php">View Issue</a></li>
                <li><a href="userprofile.php">Profile</a></li>
                <li><a href="homepage.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <center>
        <img src="https://thumbs.dreamstime.com/b/anonimos-icon-profie-social-network-over-color-background-differnt-uses-icon-social-profile-148257454.jpg"
            alt="Anonimos Icon" class="profile-img">
        <h1>My Profile</h1>
        <div class="profile-info">
            <div class="profile-info-item"><b>Name:</b> <?= $name ?></div>
            <div class="profile-info-item"><b>Role:</b> <?= $role ?></div>
            <div class="profile-info-item"><b>DOB:</b> <?= $dob ?></div>
            <div class="profile-info-item"><b>Mobile.No:</b> <?= $mobnum ?></div>
        </div>
        <button id="updatePasswordBtn" style="    width: 132px; height: 36px;">Update Password</button>
        <!-- <a href="mainlogin.php" class="logout-btn">Logout</a> -->
    </center>

    <!-- Dialog box for updating password -->
    <div class="dialog-overlay" id="updatePasswordDialog" style="display: none;">
        <div class="dialog-box">
        <button class="close-btn" style="padding-left: 337px;  margin-top: 148px;" onclick="closeDialog()">×</button>
            <label for="oldPassword">Old Password:</label>
            <input type="password" id="oldPassword">
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword">
            <label for="confirmPassword">Confirm New Password:</label>
            <input type="password" id="confirmPassword">
            <button  style=" background-color: #3F3064;"onclick="updatePassword()">Update</button>
        </div>
    </div>

    <script>
        // JavaScript function to open the dialog box
        document.getElementById("updatePasswordBtn").addEventListener("click", function () {
            document.getElementById("updatePasswordDialog").style.display = "flex";
        });

        // JavaScript function to close the dialog box
        function closeDialog() {
            document.getElementById("updatePasswordDialog").style.display = "none";
        }

        function updatePassword() {
            var oldPassword = document.getElementById("oldPassword").value;
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (oldPassword === "" || newPassword === "" || confirmPassword === "") {
                alert("Please fill in all fields.");
                return;
            }

            if (newPassword !== confirmPassword) {
                alert("New passwords do not match.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updatePassword.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                        closeDialog();
                    } else {
                        alert("Error: " + xhr.responseText);
                    }
                }
            };
            xhr.send("oldPassword=" + oldPassword + "&newPassword=" + newPassword);
        }
    </script>
</body>

</html>

<?php
    } else {
        echo 'No user found.';
    }
} else {
    echo 'Username not set in session.';
}
?>
