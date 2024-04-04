<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintanence</title>
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
            background-color: #311249;
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
            padding: 5px;
        }
        
        section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #3333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        section h5{
            text-align: center;
        }
        h5 {
            margin-top: 0;
        }
        .hi{
            text-align: right;
        }
        .ab{
            display: flex;
            ;
        }
    </style>
</head>
<body>
    <header>
        <h1>Electrical Maintanance</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="appdashboard.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <section id="complaint" class="ab">
        <div class="details">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "maintanence");
    session_start();
    $sql = "SELECT login.name,location.building,location.floor,location.room,date,status FROM login,location,history WHERE login.id=history.id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while(
        $row = mysqli_fetch_assoc($result)){
         $name = $row['name'];
         $building = $row['building'];
         $floor = $row['floor'];
         $room = $row['room'];
         $date = $row['date'];
         $status = $row['status'];
         //echo $name;
        echo '<h1>Job History</h1><br></br>';
        echo '<tr><td>Name:</td> <td>'.$name.'</td></tr><br></br>';
        echo '<tr><td>Building:</td> <td>'.$building.'</td></tr><br></br>';
        echo '<tr><td>Floor:</td> <td>'.$floor.'</td></tr><br></br>';
        echo '<tr><td>Room:</td> <td>'.$room.'</td></tr><br></br>';
        echo '<tr><td>Date:</td> <td>'.$date.'</td></tr><br></br>';
        echo '<tr><td>Status:</td> <td>'.$status.'</td></tr><br></br>';
    
        }
    }
    
        
        ?>
        </div>
    </section>
    
    
    <footer>
        <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
        <a href="login.php">Logout</a>
    
    </footer>
</body>
</html>