<?php
session_start(); // Start the session
$conn = mysqli_connect("localhost", "root", "", "maintanence"); // Connect to the database

if (isset($_POST['Submit'])) { // Check if the form is submitted
    // Retrieve form data
    $eid = $_POST['eid'];
    // Check if the record with the same Item Id already exists
    $checkSql = "SELECT * FROM eqdetails WHERE eid='$eid'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) { // If duplicate record found
        echo "Error: Item Id already exists. Please provide a different Item Id.";
    } else { // If no duplicate record found
        // Retrieve other form data
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $installation = $_POST['installation'];
        $warranty = $_POST['warranty'];
        $warrantyend = $_POST['warrantyend'];
        $building = $_POST['building'];
        $room = $_POST['room'];

        // Insert location details into the "location" table
        $locationSql = "INSERT INTO location (eidd, building, room, equipment) 
                        VALUES ('$eid', '$building', '$room', '$name')";
        $locationData = mysqli_query($conn, $locationSql);

        // Insert equipment details into the "eqdetails" table
        $eqDetailsSql = "INSERT INTO eqdetails (eid, name, brand, price, installation, warranty, warrantyend ) 
                         VALUES ('$eid', '$name', '$brand', '$price', '$installation', '$warranty', '$warrantyend')";
        $eqDetailsData = mysqli_query($conn, $eqDetailsSql);

        if ($locationData && $eqDetailsData) { // If data insertion successful
            // Insert the equipment ID into the job table as eid2
            $jobSql = "INSERT INTO job (eid2) VALUES ('$eid')";
            $jobData = mysqli_query($conn, $jobSql);

            if ($jobData) { // If job insertion successful
                $_SESSION['success_message'] = "Details Added successfully"; // Set success message in session
                header("Location: addequipment.php"); // Redirect to a new page to prevent form resubmission
                exit(); // Stop script execution
            } else {
                echo "Error: " . mysqli_error($conn); // Display error message
            }
        } else {
            echo "Error: " . mysqli_error($conn); // Display error message
        }
    }  
}

// Fetch category data
$categorySql = "SELECT * FROM category";
$categoryResult = mysqli_query($conn, $categorySql);
?>
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
    <h2>ElecDhiwise</h2>
    <nav>
        <ul>
        <li><a href="managerhome.php">Home</a></li>
            <li><a href="appdashboard.php">Category</a></li>
            <li><a href="addcategory.php">Add Category</a></li>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="addequipment.php">Add Equipment</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="equipmentdetail.php">Equipment Details</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <h2>Add Equipment Details</h2>
        <form method="post" action="">
            <div class="form-group full-width">
                <label for="eid">Item Id</label>
                <input type="text" id="eid" name="eid" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="name" required>
                    <option value="">Select Category</option>
                    <?php while ($category = mysqli_fetch_assoc($categoryResult)): ?>
                        <option value="<?php echo $category['servicename']; ?>"><?php echo $category['servicename']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="installation">Purchase Date</label>
                <input type="date" id="installation" name="installation" required>
            </div>

            <div class="form-group">
                <label for="warranty">Warranty Period</label>
                <input type="text" id="warranty" name="warranty" required>
            </div>

            <div class="form-group">
                <label for="warrantyend">Warranty Endby</label>
                <input type="date" id="warrantyend" name="warrantyend" required>
            </div>

            <div class="form-group">
                <label for="building">Building</label>
                <input type="text" id="building" name="building" required>
            </div>

            <div class="form-group">
                <label for="room">Room</label>
                <input type="text" id="room" name="room" required>
            </div>

            <div class="form-group full-width">
                <button type="submit" name="Submit">Submit</button>
            </div>
        </form>
    </section>
</main>
<script>
    // Check if the session variable is set
    var successMessage = "<?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : ''; ?>";

    // If the success message is set, display it in an alert
    if (successMessage !== '') {
        // Show the alert
        alert(successMessage);
        
        // Unset the session variable to prevent infinite alerts
        <?php unset($_SESSION['success_message']); ?>

        // After the alert is closed, redirect to the desired page
        window.location.href = "addequipment.php";
    }
</script>
</body>
</html>