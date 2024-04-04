<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintenance</title>
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
            background-color: #311249;
            color: white;
            padding: 10px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }
        ul a {
            color: white;
        }

        li {
            display: inline;
            margin-right: 20px;
            color: white;
        }

        a {
            text-decoration: none;
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
            display: flex;
            flex-direction: column; /* Display vertically */
            align-items: center;
            text-align: center;
        }

        h1 {
            color: #1c0d3f;
            margin-top: 0;
            margin-bottom: 20px; /* Add margin to separate from the sections */
        }

        .details {
            margin-bottom: 10px; /* Add margin to separate each worker */
        }

        .choose-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px; /* Add margin for spacing */
        }
    </style>
</head>
<body>
    <header>
        <h1>Choose Employee</h1>
    </header>

    <nav>
        <ul>
            <li><a href="supervisordashboard.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
            <li><a href="status.php">Status</a></li>
        </ul>
    </nav>

    <section id="complaint" class="ab">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "maintanence");
        session_start();
        $sql = "SELECT name, mobnum FROM login WHERE role='worker'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Loop through all rows
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $mobnum = $row['mobnum'];
                echo '<section class="details">';
                echo '<div>';
                echo '<p>Name: '.$name.'</p>';
                echo '<p>Employee Id: '.$mobnum.'</p>';
                echo '</div>';
                echo '<button class="choose-button" onclick="showPopup(\'Work assigned successfully for '.$name.'\')">Choose</button>';
                echo '</section>';
            }
        }
        ?>
    </section>

    <script>
    function showPopup(message) {
        alert(message);
        goToStatusPage(); // Redirect to status.php after displaying the alert
    }

    function goToStatusPage() {
        // Redirect to the "status.php" page
        window.location.href = "status.php";
    }
</script>
</body>
</html>
