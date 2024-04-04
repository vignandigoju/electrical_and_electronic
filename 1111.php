<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Rating</title>
    <style>
        /* Add some basic CSS for styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .rating-form {
            max-width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            height: 40px;
        }
        .rating {
            margin-top: 10px;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center stars vertically */
        }
        .rating input[type="radio"] {
            display: none;
        }
        .rating label {
            font-size: 24px;
            cursor: pointer;
            color: #e4e4e4; /* Default color for stars */
            margin-right: 5px;
        }
        .rating label:before {
            content: "";
        }
        .rating input[type="radio"]:checked ~ label {
            color: #ff9800; /* Color for selected stars */
        }
        .comment {
            margin-top: 10px;
        }
        .comment textarea {
            height: 100px;
        }
        .submit-button {
            background-color: #1c0d3f;
            color: #1c0d3f;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color:#1c0d3f;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav { padding-top: 15px; }
            .sidenav a { font-size: 18px; }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hamburger = document.querySelector(".hamburger");
            const menuItems = document.querySelector(".menu-items");

            hamburger.addEventListener("click", function() {
                menuItems.classList.toggle("show-menu");
            });
        });
    </script>
</head>
<body>
    <!-- Sidenav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="appdashboard.php">Home</a> 
        <a href="profile.php">My Profile</a>
        <a href="mainlogin.php">Logout</a>
    </div>

    <header>
        <div class="menu-bar">
            <span class="hamburger" onclick="openNav()">&#8801;</span>
        </div>
    </style>
</head>
<body>
    
<?php
$conn = mysqli_connect("localhost", "root","","maintanence");
if(isset($_POST['submit'])){
  $empid=$_POST['empid']; 
  $name=$_POST['name'];
  $jobid=$_POST['jobid'];
  $status=$_POST['status'];
  $rating=$_POST['rating'];
  $comments=$_POST['comments'];


  $sql="INSERT INTO rating(empid, name, jobid, status, rating, comments) VALUES ('$empid', '$name', '$jobid', '$status', '$rating', '$comments')";
  $data = mysqli_query($conn,$sql);

  if($data)
  {
    echo "Data inserted sucessfully";
  }
}
?>
<form action="" method="post">
    <div class="rating-form">
        <h1>Rate Employee</h1>
        <div class="form-group">
            <label for="empid">Employee ID:</label>
            <input type="text" id="empid" name="empid" placeholder="Enter Employee ID" required>
        </div>
        <div class="form-group">
            <label for="name">Employee Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter employee's name" required>
        </div>
        <div class="form-group">
            <label for="jobid">Job ID:</label>
            <input type="text" id="jobid" name="jobid" placeholder="Enter job ID" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" placeholder="Enter status" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="text" id="rating" name="rating" min="1" max="5" placeholder="Enter rating (1-5)" required>
        </div>
        <div class="form-group comment">
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" placeholder="Enter your comments"></textarea>
            
        </div>

        <input type="submit" value="Add" name="submit">
    </div>
</form>

    <script>
        function submitRating() {
            const employeeid = document.getElementById('empid').value;
            const employeeName = document.getElementById('name').value;
            const jobId = document.getElementById('jobid').value;
            const rating = document.getElementById('rating').value;
            const comment = document.getElementById('comments').value;

            if (!employeeid || !employeeName || !jobId || !rating || !comment) {
                alert('Please fill in all fields.');
            } else {
                alert(`Rating submitted for ${empname} (Job ID: ${jobid}): ${rating} stars\nComments: ${comments}`);
                // You can submit the data to your server or perform other actions here.
                window.location.href = 'appdashboard.php';
            }
        }
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
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

       
</body>
</html>
