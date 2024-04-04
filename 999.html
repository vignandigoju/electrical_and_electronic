<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
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
        <li><a href="supervisordashboard.php">Home</a></li>
        <li><a href="mainlogin.php">Logout</a></li>
    </ul>
</nav>

<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['Submit'])){
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $eidd = $_POST['eidd'];

    $sql = "INSERT INTO location (building, floor, room, eidd) 
            VALUES ('$building', '$floor', '$room', '$eidd')";
    $data = mysqli_query($conn, $sql);

    if($data) {
        echo "Data inserted successfully";
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

<main>
    <form id="add-complaint" method="post">
        <label for="building">Building</label>
        <select id="building" name="building">
            <option value="Building 1">A block</option>
            <option value="Building 2">B block</option>
            <option value="Building 3">C block</option>
            <option value="Building 4">D block</option>
            <option value="Building 5">E block</option>
        </select>

        <label for="floor">Floor</label>
        <select id="floor" name="floor">
            <!-- Options will be dynamically populated by JavaScript -->
        </select>

        <label for="room">Room</label>
        <select id="room" name="room">
            <!-- Options will be dynamically populated by JavaScript -->
        </select>

        <label for="eidd">Electronic Item Id</label>
        <select id="eidd" name="eidd">
            <!-- Options will be dynamically populated by JavaScript -->
        </select>

        <button type="button" name="Submit" onclick="submitForm()">Next</button>
    </form>
</main>

<script>
    function submitForm() {
        var xhr = new XMLHttpRequest();
        var form = document.getElementById("add-complaint");
        var formData = new FormData(form);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                window.location.href = 'acde1.php';
            }
        };

        xhr.open("POST", window.location.href, true);
        xhr.send(formData);
    }
</script>

<footer>
    <!-- Your footer content remains unchanged -->
</footer>

</body>
</html>
