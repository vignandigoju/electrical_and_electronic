<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO rating(name, status, rating, comments) VALUES ('$name','$status', '$rating', '$comments')";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo "Data inserted successfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Rating</title>
    <style>
        
        nav {
            background-color: white;
            color: black;
            padding: 10px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul a {
            color: black;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .rating-form {
            max-width: 40%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 5px;
        }

        input[type="text"],
        select,
        textarea {
            width: 97%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 13px;
        }

        select {
            height: 40px;
        }

        .rating {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 24px;
            cursor: pointer;
            color: #e4e4e4;
            margin-right: 5px;
            font-size: 13px;
        }

        .rating label:before {
            content: "";
        }

        .rating input[type="radio"]:checked ~ label {
            color: #ff9800;
        }

        .comment {
            margin-top: 10px;
        }

        .comment textarea {
            height: 100px;
        }

        .submit-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 13px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


     
        .add-button,
        .remove-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-button {
            background-color: #f44336;
        }

       
    </style>
  
</head>



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
        header h2{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        nav {
            background-color: white;
            color: white;
            padding: 1px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }
        
        ul a {
            color: black;
        }

        li {
            display: inline;
            margin-right: 20px;
            color: white;
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: #1c0d3f
        }

        main {
            padding: 20px;
        }

        section {
            width: 80%;
            margin-top: 30px;
            padding: 1px; /* Decreased padding */
            
            background-color: white;
        }

        section h2 {
            text-align: center;
            font-size: 1.2em; /* Decreased font size */
            margin: 10px 0; /* Adjusted margin */
        }

        .container1 {
            display: flex;
            margin-top: 25px;
            justify-content: space-around;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            
        }

        h4 {
            margin-top: 0;
            color: #1c0d3f;
        }

        .imagecon1 {
            background-image: url('ac.png');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .imagefan {
            background-image: url('fanimage.png');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .ac {
            width: 200px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .fan {
            width: 200px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .imagelight {
            background-image: url('img/bulb.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .light {
            width: 200px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .imagegenerator {
            background-image: url('gen.png');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .generator {
            width: 200px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .imagesocket {
            background-image: url('img/sockets.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
        }
        
        .socket {
            width: 200px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }
        nav ul li:hover {
    background-color: #e0ba5c; /* Background color on hover */
    color: #1c0d3f; /* Text color on hover */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for both background and text color */
}
/* Add this CSS for the box effect on the list items */
nav ul li {
    display: inline-block;
    margin-right: 20px;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease; /* Smooth transition for the box effect */
}
nav ul li.active {
    background-color: #e0ba5c; /* Background color on hover */
    color: #1c0d3f; /* Text color on hover */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for both background and text color */
}


nav ul li:hover {
    transform: scale(1.1);
}
    </style>
</head>
<body style="background-image: url('images/aa.jpg');     background-size: cover; ">
<?php $activePage= basename($_SERVER['PHP_SELF'],".php");?>
<header style="background: rgb(18,14,96);
    background: linear-gradient(90deg, rgb(183 94 14) 0%, rgb(214 174 90) 50%, rgb(231 194 93) 100%);">
        <h2>Electrical Equipment</h2>
    </header>
    
    <nav>
        <ul>
        <li><a href="supervisordashboard.php">Home</a></li>
            <li><a href="viewissue.php">View Issue</a></li>
            <li><a href="choose.php">Assign Issue</a></li>
            <li><a href="mainstatus.php">Work Status</a></li>
            <li ><a href="empdetails.php">Employee Details</a></li>
            <li><a href="Rating.php">Rating</a></li>
            <li><a href="workerprofile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <br><br>

  

   

    <form action="" method="post" onsubmit="return submitRating()">
    <div class="rating-form">
            <h2>Rate Employee</h2>
            <div class="form-group">
                <label for="name">Employee Name:</label>
                <select id="name" name="name" required>
                    <?php
                    // Fetch worker names from the login table
                    $sql = "SELECT name FROM login WHERE role='worker'";
                    $result = mysqli_query($conn, $sql);

                    // Populate dropdown options dynamically
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="text" id="rating" name="rating" min="1" max="5" placeholder="Enter rating (1-5)" required>
            </div>
            <div class="form-group comment">
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" placeholder="Enter your comments"></textarea>
            </div>
            <input type="submit" value="Add" name="submit" class="submit-button" style="background-color: #1c0d3f;">
    </div>
    </form>
<div id="successMessage" style="display: none; text-align: center; padding: 10px; background-color: #4CAF50; color: white; margin-top: 10px;">
    Rating submitted successfully!
</div>
<script>
    function submitRating() {
        const employeeName = document.getElementById('name').value;
        const rating = document.getElementById('rating').value;
        const comment = document.getElementById('comments').value;
        if (!employeeName || !rating || !comment) {
            alert('Please fill in all fields.');
            return false; // Prevent form submission
        } else {
            // Show success message
            document.getElementById('successMessage').style.display = 'block';
            
            // You can submit the data to your server or perform other actions here.
            // In this example, I'm redirecting to the dashboard after a short delay.
            setTimeout(function () {
                window.location.href = 'supervisordashboard.php';
            }, 2000); // 2000 milliseconds (2 seconds) delay before redirecting

            return false; // Prevent form submission
        }
    }
</script>
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
