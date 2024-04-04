<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: red; /* Changed background color to red */
            color: white; /* Set text color to white */
        }

        .ADVISABLE-FOR-REPLACEMENT-button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");
session_start();
$sql = "SELECT name, type, price, installation, warranty, warrantyend FROM eqdetails WHERE eid=5001";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
     $name = $row['name'];
     $type = $row['type'];
     $price = $row['price'];
     $installation = $row['installation'];
     $warranty = $row['warranty'];
     $warrantyend = $row['warrantyend'];
     //echo $name;
    echo '<h1>Equipment Details</h1><br></br>';
    echo '<tr><td>Name:</td> <td>'.$name.'</td></tr><br></br>';
    echo '<tr><td>Type:</td> <td>'.$type.'</td></tr><br></br>';
    echo '<tr><td>Price:</td> <td>'.$price.'</td></tr><br></br>';
    echo '<tr><td>Installation:</td> <td>'.$installation.'</td></tr><br></br>';
    echo '<tr><td>Warranty:</td> <td>'.$warranty.'</td></tr><br></br>';
    echo '<tr><td>Warranty End:</td> <td>'.$warrantyend.'</td></tr><br></br>';
}

    ?>

    <?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");
$sql = "SELECT servicetype, servicecharge, status FROM job WHERE eid2=5001";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
     $servicetype = $row['servicetype'];
     $servicecharge = $row['servicecharge'];
     $status = $row['status'];
     //echo $name;
    echo '<h2>Job History</h2><br></br>';
    echo '<tr><td>Service Type:</td> <td>'.$servicetype.'</td></tr><br></br>';
    echo '<tr><td>Service Charge:</td> <td>'.$servicecharge.'</td></tr><br></br>';
    echo '<tr><td>Status:</td> <td>'.$status.'</td></tr><br></br>';
}

    ?>

    <center>
    <p><a href="assignwork.php"><button class="ADVISABLE-FOR-REPLACEMENT-button">ADVISABLE FOR REPLACEMENT</button></a></p>
    </center>
</body>
</html>
