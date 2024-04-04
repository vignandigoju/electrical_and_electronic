<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

if(isset($_POST['Submit'])){
    $buidling = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $eidd = $_POST['eidd'];

    $sql = "INSERT INTO location (building, floor, room, eidd ) 
            VALUES ('$building', '$floor', '$room', '$eidd')";
    $data = mysqli_query($conn, $sql);

    if($data) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
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
        }
        
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        
        nav {
            background-color: #444;
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
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #555;
}
    </style>
</head>
<body>
    
    
    <nav>
        <ul>
            <li><a href="supervisordashboard.php">Home</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    
<form id="add-compalint" method="post">
    <labelfor="building">Building</labelfor>
    <select id="text" name="building">
    <option value="Building 1">A block</option>
    <option value="Building 2">B block</option>
    <option value="Building 3">C block</option>
    <option value="Building 4">D block</option>
    <option value="Building 5">E block</option></select>
    <labelfor="floor">Floor</labelfor>
    <select id="int" name="floor">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option></select>
    <labelfor="room">Room:</labelfor>
    <select id="room" name="room">
    <option value="A 101">A 101</option>
    <option value="A 102">A 102</option>
    <option value="A 103">A 103</option>
    <option value="A 104">A 104</option>
    <option value="A 105">A 105</option></select>
    <label for="eidd">Equipment Id</label>
    <select id="eidd" name="eidd">
    <option value="5001">5001</option>
    <option value="6001">6001</option>
    <option value="7001">7001</option>
    <option value="8001">8001</option>
    <option value="9001">9001</option></select>
    
    <p><a href="acdetails.php"><button>submit</button></a></p>
   
  </form>
  
    
    <footer>
        <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
        <a href="mainlogin.php">Logout</a>
    
    </footer>
</body>
</html>