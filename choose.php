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
        }

        header {
            background-color: #3F3064;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ffffff;
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
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #3F3064;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #3F3064;
        }

        select,
        input {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .row {
            margin-bottom: 20px;
        }

        .row:last-child {
            margin-bottom: 0;
        }

        button {
            background-color: #3F3064;
            color: white;
            border: none;
            padding: 12px 0;
            width: 100%;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: #2D224D;
        }
    </style>
</head>

<body>
    <?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
                <li><a href="supervisorhome.php">Home</a></li>
                <li><a href="supervisordashboard.php">Category</a></li>
                <li><a href="viewissue.php">View Issue</a></li>
                <li><a href="choose.php">Assign Issue</a></li>
                <li><a href="mainstatus.php">Work Status</a></li>
                <li><a href="workerprofile.php">My Profile</a></li>
                <li><a href="mainlogin.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <form method="post" action="">
        <h1>Assign Job to Worker</h1>

        <div class="row">
            <label for="worker">Choose Worker:</label>
            <select name="worker" id="worker">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "maintanence");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query = "SELECT username, name FROM login WHERE role='worker' AND action = 'active'";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $username = $row['username'];
                        $name = $row['name'];
                        echo "<option value='$username'>$name</option>";
                    }
                } else {
                    echo '<option value="" disabled>No workers available</option>';
                }
                ?>
            </select>
        </div>

        <div class="row">
            <label for="location">Location:</label>
            <input type="text" name="location" required>
        </div>

        <div class="row">
            <label for="date">Date:</label>
            <input type="date" name="date" required>
        </div>

        <div class="row">
            <label for="eid">Choose Equipment ID:</label>
            <select name="eid" id="eid">
                <?php
                $eqQuery = "SELECT eid FROM eqdetails";
                $eqResult = mysqli_query($conn, $eqQuery);
                if ($eqResult && mysqli_num_rows($eqResult) > 0) {
                    while ($eqRow = mysqli_fetch_assoc($eqResult)) {
                        $eid = $eqRow['eid'];
                        echo "<option value='$eid'>$eid</option>";
                    }
                } else {
                    echo '<option value="" disabled>No equipment IDs available</option>';
                }
                ?>
            </select>
        </div>

        <div class="row">
            <label for="servicetype">Issue:</label>
            <input type="text" id="servicetype" name="servicetype" required>
        </div>

        <div class="row">
            <button type="submit" name="assign">Assign Job</button>
        </div>
    </form>

    <?php
    if (isset($_POST['assign'])) {
        $servicetype = mysqli_real_escape_string($conn, $_POST['servicetype']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $eid = mysqli_real_escape_string($conn, $_POST['eid']);
        $workerUsername = mysqli_real_escape_string($conn, $_POST['worker']);
        $workerQuery = "SELECT name FROM login WHERE username='$workerUsername'";
        $workerResult = mysqli_query($conn, $workerQuery);
        if ($workerResult && mysqli_num_rows($workerResult) > 0) {
            $workerRow = mysqli_fetch_assoc($workerResult);
            $workerName = $workerRow['name'];
            $sql = "INSERT INTO job (servicetype, date, location, eid2, name, empid) 
                    VALUES ('$servicetype', '$date', '$location', '$eid', '$workerName', '$workerUsername')";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Job assigned successfully!");</script>';
            } else {
                echo 'Error assigning job: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error fetching worker information: ' . mysqli_error($conn);
        }
    }
    ?>
    
</body>

</html>
