<?php

	// session_start();
	// $name = $_SESSION['name'];
	
	
	
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {


	$image = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./images/" . $image;
	
    $servicename = $_POST['servicename'];

	// $informations = $_POST['informations'];
	
	// $materials = $_POST['materials'];

	// $service_type = $_POST['service_type'];


	// $name = $_SESSION['name'];
	
	// $category1 = $_POST['category1'];
	

	$db = mysqli_connect("localhost", "root", "", "maintanence");


	
	$sql = "INSERT INTO category(image, servicename) VALUES('$image','$servicename')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
	
		echo "<script type='text/javascript'>alert('Register Successfully!');window.location.href='addcategory.php';</script>";

	} else {
		echo "<h4> Register Failed!</h4>";
	}
}
?>