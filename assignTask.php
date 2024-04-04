<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Job to Worker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            font-size: 16px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <h1>Assign Job to Worker</h1>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "maintanence");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch workers from login table
        $query = "SELECT username, name FROM login WHERE role='worker'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<label for="worker">Choose Worker:</label>';
            echo '<select name="worker" id="worker">';
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $name = $row['name'];
                echo "<option value='$username'>$name</option>";
            }
            echo '</select>';
        } else {
            echo 'No workers available';
        }
        ?>
        

        <label for="issue">Issue:</label>
        <input type="text" id="issue" name="issue" required>

        <label for="date">Date:</label>
        <input type="date" name="date" required>


        <label for="location">Location:</label>
        <input type="text" name="location" required>

        <button type="submit" name="assign">Assign Job</button>
    </form>

    <?php
    if (isset($_POST['assign'])) {
        $servicetype = mysqli_real_escape_string($conn, $_POST['worker']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);

        $sql = "INSERT INTO job (servicetype, name, date, location) 
                VALUES ('$servicetype','$name', '$date', '$location')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Job assigned successfully!");</script>';
        } else {
            echo 'Error assigning job: ' . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>
