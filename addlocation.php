<?php
$conn = mysqli_connect("localhost", "root", "", "Maintanence");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $building = mysqli_real_escape_string($conn, $_POST['building']);
    $floor = mysqli_real_escape_string($conn, $_POST['floor']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
    $eidd = mysqli_real_escape_string($conn, $_POST['eidd']);

    $sql = "INSERT INTO location (building, floor, room, equipment, eidd) VALUES ('$building','$floor','$room','$equipment','$eidd')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            background-color: #1c0d3f;
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

        section h2 {
            text-align: center;
        }

        h2 {
            margin-top: 0;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            background-color: #1c0d3f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #001f3f;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #1c0d3f;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="appdashboard.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <form id="add-location-form" action="" method="post">
            <label for="building">Building:</label>
            <input type="text" id="building" name="building" required>

            <label for="floor">Floor:</label>
            <input type="text" id="floor" name="floor" required>

            <label for="room">Room:</label>
            <input type="text" id="room" name="room" required>

            <label for="equipment">Electronic Item:</label>
            <input type="text" id="equipment" name="equipment" required>

            <label for="eidd">Electronic Item Id:</label>
            <input type="text" id="eidd" name="eidd" required>

            <button type="submit" name="submit">Add Location</button>
        </form>
    </main>
</body>
</html>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        function showPopup(message) {
            alert(message);
        }
    </script>
</body>
</html>