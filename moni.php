<?php
$conn = mysqli_connect("localhost", "root","","Maintanence");
if(isset($_POST['submit'])){
    $jid=$_POST['jid'];
  $servicetype=$_POST['servicetype'];
  $servicecharge=$_POST['servicecharge'];
  $empid=$_POST['empid'];
  $date=$_POST['date'];
  $status=$_POST['status'];
  $eid2=$_POST['eid2'];


  $sql="INSERT INTO job(jid, servicetype, servicecharge, empid, date, status, eid2) VALUES ('$jid','$servicetype','$servicecharge','$empid','$date','$status','$eid2')";
  $data = mysqli_query($conn,$sql);
  if($data)
  {
    echo "Data inserted sucessfully";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            background-color: #1c0d3f;
            color: white;
            padding: 10px;
            text-align: center;
        }
        
        ul {
            list-style: none;
            padding: 0;
        }
        
        li {
            display: inline;
            margin-right: 20px;
        }
        
        a {
            text-decoration: none;
            color: white;
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
        }
        section h2{
            text-align: center;
        }
        h2 {
            margin-top: 0;
        }
        form {
  border: 1px solid #ccc;
  padding: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input, select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #1c0d3f; /* Change the background color to navy blue */
  color: #fff; /* Text color (white in this case) */
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #001f3f; /* Darker shade of blue on hover */
}
    </style>
</head>
<body>
    
    
    <nav>
        <ul>
            <li><a href="appdashboard.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    
<form id="add-employee-form" action="" method="post">
    <label for="servicetype">Service Type:</label>
    <input type="text" id="servicetype" name="servicetype" required>
    <label for="servicecharge">Service Charge:</label>
    <input type="big int" name="servicecharge" required>
    <label for="empid">Employee Id:</label>
    <input type="empid" name="empid" required>
    <label for="eid2">Equipment Id:</label>
    <select id="eid2" name="eid2">
    <option value="select">select</option>
      <option value="5001">5001</option>
      <option value="6001">6001</option>
      <option value="7001">7001</option>
      <option value="8001">8001</option>
    </select>
    <label for="">Date:</label>
    <input type="date" id="date" name="date" required>
    <label for="status">Status:</label>
    <select id="status" name="status">
    <option value="select">select</option>
      <option value="completed">Completed</option>
      <option value="pending">Pending</option>
    </select>
    <button type="submit" name="submit">Add</button>
  </form>
    
    <footer>
        <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
        <a href="mainlogin.php">Logout</a>
    
    </footer>
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