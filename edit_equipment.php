<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "maintanence");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Update profile and login if the form is submitted
if (isset($_POST['update'])) {
    $eid = $_POST['eid'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $installation = $_POST['installation'];
    $warranty = $_POST['warranty'];
    $warrantyend = $_POST['warrantyend'];

    // Use prepared statement to prevent SQL injection
    $update_query = "UPDATE eqdetails SET name=?, brand=?, price=?, installation=?, warranty=?, warrantyend=? WHERE eid=?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $name, $brand, $price, $installation, $warranty, $warrantyend, $eid);

    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Equipment details updated successfully.";
    } else {
        $error_message = "Error updating equipment details: " . mysqli_error($conn);
    }

    // Close prepared statement
    mysqli_stmt_close($stmt);
}

// Check if ID parameter is passed in the URL
if(isset($_GET['id'])) {
    $equipmentname = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM eqdetails WHERE eid=?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Error in preparing SQL statement: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $equipmentname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch equipment data
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $eid = $row['eid'];
        $name = $row['name'];
        $brand = $row['brand'];
        $price = $row['price'];
        $installation = $row['installation'];
        $warranty = $row['warranty'];
        $warrantyend = $row['warrantyend'];
    } else {
        $error_message = "Equipment not found.";
    }

    // Close prepared statement
    mysqli_stmt_close($stmt);
} else {
    $error_message = "Equipment ID not provided.";
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Detail Update</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #3F3064;
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
            position: relative;
            font-weight: bold;
        }

        ul a:hover {
            background-color: #2D224D; /* Updated hover background color */
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff; /* Updated active link background color */
            z-index: -1;
            border-radius: 8px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        main {
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        section {
            width: 700px;
            padding: 40px;
            background-color: #f0f0f0;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #3F3064;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-right: -40px;
    width: calc(50% - 10px);
    margin-bottom: 20px;
        }

        .form-group.full-width {
            width: 120%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #3F3064;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 103%;
            background-color: #3F3064;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2D224D;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #3F3064;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
<header>
    <!-- Your header content -->
    <h2>ElecDhiwise</h2>
    <nav>
        <ul>
        <li><a href="managerhome.php">Home</a></li>
            <li><a href="appdashboard.php">Category</a></li>
            <li><a href="addcategory.php">Add Category</a></li>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="addequipment.php">Add Equipment</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <h2>Update Equipment Details</h2>
        <form action="" method="post">
            <input type="hidden" name="eid" value="<?php echo $eid; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $name;?>" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" value="<?php echo $brand;?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="<?php echo $price;?>" required>
            </div>
            <div class="form-group">
                <label for="installation">Installation Date</label>
                <input type="date" id="installation" name="installation" value="<?php echo $installation;?>" required>
            </div>
            <div class="form-group">
                <label for="warranty">Warranty Period</label>
                <input type="text" id="warranty" name="warranty" value="<?php echo $warranty;?>" required>
            </div>
            <div class="form-group">
                <label for="warrantyend">Warranty End Date</label>
                <input type="date" id="warrantyend" name="warrantyend" value="<?php echo $warrantyend;?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update">Update</button>
            </div>
        </form>
    </section>
</main>
<footer>
    <!-- Your footer content -->
</footer>

<!-- Display success or error messages -->
<?php if (isset($success_message)): ?>
    <div class="success-message" style="margin-top:-31em;"><?php echo $success_message; ?></div>
<?php elseif (isset($error_message)): ?>
    <div class="error-message" style="margin-top:-31em;"><?php echo $error_message; ?></div>
<?php endif; ?>
</body>
</html>
