<!DOCTYPE html>
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
            background-color: #f2f2f2;
        }

        .job-history {
            list-style: none;
            padding-left: 0;
        }

        .job-history li {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .job-history li strong {
            font-weight: bold;
        }

        .assign-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "maintanence");
        session_start();
        $sql = "SELECT name, type, price, installation, warranty, warrantyend FROM eqdetails WHERE eid=7001";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $type = $row['type'];
            $price = $row['price'];
            $installation = $row['installation'];
            $warranty = $row['warranty'];
            $warrantyend = $row['warrantyend'];

            echo '<h1>Equipment Details</h1>';
            echo '<div><strong>Name:</strong> ' . $name . '</div>';
            echo '<div><strong>Type:</strong> ' . $type . '</div>';
            echo '<div><strong>Price:</strong> ' . $price . '</div>';
            echo '<div><strong>Installation:</strong> ' . $installation . '</div>';
            echo '<div><strong>Warranty:</strong> ' . $warranty . '</div>';
            echo '<div><strong>Warranty End:</strong> ' . $warrantyend . '</div>';
        }
        ?>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "maintanence");
        $sql = "SELECT servicetype, servicecharge, date, status FROM job WHERE eid2=7001";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<h2>Job History</h2>';
            while ($row = mysqli_fetch_assoc($result)) {
                $servicetype = $row['servicetype'];
                $servicecharge = $row['servicecharge'];
                $date = $row['date'];
                $status = $row['status'];

                echo '<div class="job-history">';
                echo '<li>';
                echo '<strong>Service Type:</strong> ' . $servicetype;
                echo '<br>';
                echo '<strong>Service Charge:</strong> ' . $servicecharge;
                echo '<br>';
                echo '<strong>Date:</strong> ' . $date;
                echo '<br>';
                echo '<strong>Status:</strong> ' . $status;
                echo '</li>';
                echo '</div>';
            }
        }
        ?>

    </div>
</body>
</html>
