<?php
session_start();
$user = $_SESSION["username"];

$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the 'job' table
$sql2 = "SELECT empid, name, location, eid2 AS equipment, servicetype FROM job WHERE empid = '$user' AND status!='completed' ";
$result1 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Issue</title>
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

        .employee-table {
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .employee-table h3 {
            background-color: #3F3064;
            color: white;
            padding: 15px;
            margin: 0;
            text-align: center;
            font-size: 1.2em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #2D224D;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        td {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            font-size: 0.9em;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-40 {
            background-color: #111827;
            border: 1px solid transparent;
            border-radius: .75rem;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            font-family: "Inter var", ui-sans-serif, system-ui, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
            padding: .4rem 1rem;
            text-align: center;
            text-decoration: none #6B7280 solid;
            text-decoration-thickness: auto;
            transition-duration: .2s;
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(.4, 0, 0.2, 1);
            user-select: none;
            width: auto;
        }

        .button-40:hover {
            background-color: #374151;
        }

        .button-40:focus {
            box-shadow: none;
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
    </style>
</head>

<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
                <li><a href="workerissue.php">Home</a></li>
                <li><a href="workerprofile2.php">Profile</a></li>
                <li><a href="homepage.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="employee-table" style="max-width: 800px;">
        <h3>Supervisor Issue</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Equipment</th>
                    <th>Issue</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['equipment'] . "</td>";
                        echo "<td>" . $row['servicetype'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No pending jobs</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "150px";
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
