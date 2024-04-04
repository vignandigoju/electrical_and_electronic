

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

        form {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: calc(100% - 20px);
            background-color: #3F3064;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
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
    <?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "maintanence");

    // Check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $eqname = $_POST['eqname'];
    $issue = $_POST['issue'];
    $location = $_POST['location'];
    $user_id = $_SESSION["username"];

    // Prepare SQL statement to insert data into the issue table
    $sql = "INSERT INTO issue (eqname, issue, location, user_id) VALUES ('$eqname', '$issue', '$location', '$user_id')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully, redirect to userissue.php
        echo "<script>alert('Data inserted successfully into the issue table');window.location.href='userissue.php';</script>";
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>

    <form method="post" action="" style="margin-top: 50px;">
        <label for="eqname">Item</label>
        <input type="text" id="eqname" name="eqname" required>

        <label for="issue">Issue Type</label>
        <input type="text" id="issue" name="issue" required>

        <label for="location">Location</label>
        <input type="text" id="location" name="location" required>

        <button type="submit" name="Submit">Submit</button>
    </form>
</body>
</html>
