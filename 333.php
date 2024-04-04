<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raise Issue</title>
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
  background-color: #1c0d3f;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #1c0d3f;
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

<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

if(isset($_POST['Submit'])){
    $Name = $_POST['name']; 
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $issue = $_POST['issue'];

    $sql = "INSERT INTO issue (name, building, floor, room, issue) 
            VALUES ('$Name', '$building', '$floor', '$room', '$issue')";
    $data = mysqli_query($conn, $sql);

    if($data) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<main>
    <header>
        <h1>Raise Issue</h1>
    </header>

    <form id="add-complaint" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="building">Building</label>
        <select id="building" name="building">
            <option value="Building 1">A block</option>
            <option value="Building 2">B block</option>
            <option value="Building 3">C block</option>
            <option value="Building 4">D block</option>
            <option value="Building 5">E block</option>
        </select>

        <label for="floor">Floor</label>
        <select id="floor" name="floor">
            <!-- Options will be dynamically populated by JavaScript -->
        </select>

        <label for="room">Room</label>
        <select id="room" name="room">
            <!-- Options will be dynamically populated by JavaScript -->
        </select>

        <label for="issue">Issue</label>
        <select id="issue" name="issue">
            <option value="Electrician">pcb problem</option>
        </select>

        <button type="submit" name="Submit">Submit</button>
    </form>
</main>

<footer>
    <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
    <a href="mainlogin.php">Logout</a>
</footer>

<script>
    // JavaScript function to update floor options based on building selection
    function updateFloors() {
        const buildingSelect = document.getElementById('building');
        const floorSelect = document.getElementById('floor');

        // Define floor options for each building
        const floorOptions = {
            'Building 1': ['1', '2', '3', '4', '5'],
            'Building 2': ['1', '2', '3', '4', '5'],
            'Building 3': ['1', '2', '3', '4', '5'],
            'Building 4': ['1', '2', '3', '4', '5'],
            'Building 5': ['1', '2', '3', '4', '5']
        };

        const selectedBuilding = buildingSelect.value;
        const availableFloors = floorOptions[selectedBuilding] || [];

        // Clear previous options
        floorSelect.innerHTML = '';

        // Add new floor options
        availableFloors.forEach(floor => {
            const option = document.createElement('option');
            option.value = floor;
            option.textContent = floor;
            floorSelect.appendChild(option);
        });
    }

    // JavaScript function to update room options based on floor selection
    function updateRooms() {
        const floorSelect = document.getElementById('floor');
        const roomSelect = document.getElementById('room');

        // Define room options for each floor
        const roomOptions = {
            '1': ['101', '102', '103', '104', '105'],
            '2': ['201', '202', '203', '204', '205'],
            '3': ['301', '302', '303', '304', '305'],
            '4': ['401', '402', '403', '404', '405'],
            '5': ['501', '502', '503', '504', '505']
        };

        const selectedFloor = floorSelect.value;
        const availableRooms = roomOptions[selectedFloor] || [];

        // Clear previous options
        roomSelect.innerHTML = '';

        // Add new room options
        availableRooms.forEach(room => {
            const option = document.createElement('option');
            option.value = room;
            option.textContent = room;
            roomSelect.appendChild(option);
        });
    }

    // Initialize event listeners
    document.getElementById('building').addEventListener('change', updateFloors);
    document.getElementById('floor').addEventListener('change', updateRooms);

    // Initial update of options
    updateFloors();
    updateRooms();
</script>

</body>
</html>
