<?php
// Determine the current page name
$activePage = basename($_SERVER['PHP_SELF']);

// PHP code for handling form submission
error_reporting(0);
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $image;

    $informations = $_POST['informations'];
	
	$materials = $_POST['materials'];

	$category = $_POST['category'];


	// $name = $_SESSION['name'];
	
	$category1 = $_POST['category1'];
	

	$db = mysqli_connect("localhost", "root", "", "maintanence");


	
	$sql = "INSERT INTO adddetails(image, informations, materials, category, category1) VALUES('$image','$informations','$materials','$category','$category1')";

    // Execute query
    mysqli_query($db, $sql);

    // Move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Register Successfully!";
    } else {
        $msg = "Register Failed!";
    }
}

// Function to determine active page
function isActive($currentPage, $pageName) {
    return ($currentPage == $pageName) ? 'active' : '';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ffffff;
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
    background-color: white;
    z-index: -1;
    border-radius: 8px;
}

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px); /* Adjusted */
        }

        .box {
            background-color: rgba(255, 255, 255, 0.9);
            width: 360px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="file"],
        input[type="text"],
        #btn_s {
            width: calc(100% - 22px);
            border: 1px solid #3F3064;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        #btn_s {
            height: 40px;
            background-color: #3F3064;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        #btn_s:hover {
            background-color: #2D224D;
        }

        .msg {
            text-align: center;
            margin-top: 10px;
            color: #3F3064;
        }
    </style>
</head>
<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
            <li><a href="managerhome.php">Home</a></li>
                <li><a href="appdashboard.php" class="<?= isActive($activePage, 'appdashboard') ?>">Category</a></li>
                <!-- <li><a href="addcategory.php" class="<?= isActive($activePage, 'addcategory') ?>">Add Category</a></li> -->
                <li><a href="addcategory.php" class="<?= isActive($activePage, 'addcategory.php') ?>">Add Category</a></li>
                <li><a href="staff.php" class="<?= isActive($activePage, 'staff') ?>">Add Employee</a></li>
                <li><a href="addequipment.php" class="<?= isActive($activePage, 'addequipment') ?>">Add Equipment</a></li>
                <li><a href="empdetails.php" class="<?= isActive($activePage, 'empdetails') ?>">Employee Details</a></li>
                <li><a href="equipmentdetail.php" class="<?= ($activePage == 'equipmentdetail.php') ? 'active' : '' ?>">Equipment Details</a></li>
                <li><a href="profile.php" class="<?= isActive($activePage, 'profile') ?>">My Profile</a></li>
                <li><a href="mainlogin.php" class="<?= isActive($activePage, 'mainlogin') ?>">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="box">
            <h2>ADD CATEGORY</h2>
            <form action="addcategorybackend.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="uploadfile" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="servicename" placeholder="Service Name" class="form-control" required>
                </div>
                <!-- Add more form fields as needed -->
                <input type="submit" value="Submit" id="btn_s" name="upload">
            </form>
            <div class="msg"><?php echo $msg; ?></div>
        </div>
    </div>
</body>
</html>

