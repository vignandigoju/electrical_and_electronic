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
            font-size: 13px;
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

        section h2 {
            text-align: center;
        }

        h2 {
            margin-top: 0;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 13px;
        }

        button {
            background-color: #1c0d3f;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
        }

        button:hover {
            background-color: #001f3f;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #1c0d3f;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
    </head>
<body>

<nav>
    <ul>
        <li><a href="appdashboard.php">Home</a></li>
        <li><a href="empdetails.php">Employee Details</a></li>
        <li><a href="staff.php">Add Employee</a></li>
        <li><a href="mainlogin.php">Logout</a></li>
    </ul>
</nav>



<main>

    <form id="add-complaint" action = "fande1.php" method="POST">

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

        <label for="eidd">Electronic Item Id</label>
        <select id="eidd" name="eidd">
            <!-- Options will be dynamically populated by JavaScript -->
        </select>

        <a href="fande1.php"><button type="submit" name="next">Next</button></a>
    </form>

</main>


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

    // JavaScript function to update equipment ID options based on the selected room
    function updateEquipmentIDs() {
        const roomSelect = document.getElementById('room');
        const eiddSelect = document.getElementById('eidd');

        // Define equipment ID options for each room
        const equipmentOptions = {
            '101': ['6001', '6002', '6003', '6004', '6005'],
            '102': ['6001', '6002', '6003', '6004', '6005'],
            '103': ['6001', '6002', '6003', '6004', '6005'],
            '104': ['6001', '6002', '6003', '6004', '6005'],
            '105': ['6001', '6002', '6003', '6004', '6005'],
            '201': ['6001', '6002', '6003', '6004', '6005'],
            '202': ['6001', '6002', '6003', '6004', '6005'],
            '203': ['6001', '6002', '6003', '6004', '6005'],
            '204': ['6001', '6002', '6003', '6004', '6005'],
            '205': ['6001', '6002', '6003', '6004', '6005'],
            '301': ['6001', '6002', '6003', '6004', '6005'],
            '302': ['6001', '6002', '6003', '6004', '6005'],
            '303': ['6001', '6002', '6003', '6004', '6005'],
            '304': ['6001', '6002', '6003', '6004', '6005'],
            '305': ['6001', '6002', '6003', '6004', '6005'],
            '401': ['6001', '6002', '6003', '6004', '6005'],
            '402': ['6001', '6002', '6003', '6004', '6005'],
            '403': ['6001', '6002', '6003', '6004', '6005'],
            '404': ['6001', '6002', '6003', '6004', '6005'],
            '405': ['6001', '6002', '6003', '6004', '6005'],
            '501': ['6001', '6002', '6003', '6004', '6005'],
            '502': ['6001', '6002', '6003', '6004', '6005'],
            '503': ['6001', '6002', '6003', '6004', '6005'],
            '504': ['6001', '6002', '6003', '6004', '6005'],
            '505': ['6001', '6002', '6003', '6004', '6005']
            // Add more equipment options for other rooms as needed
        };

        const selectedRoom = roomSelect.value;
        const availableEquipment = equipmentOptions[selectedRoom] || [];

        // Clear previous options
        eiddSelect.innerHTML = '';

        
        availableEquipment.forEach(equipmentID => {
            const option = document.createElement('option');
            option.value = equipmentID;
            option.textContent = equipmentID;
            eiddSelect.appendChild(option);
        });
    }

    // Initialize event listeners
    document.getElementById('building').addEventListener('change', updateFloors);
    document.getElementById('floor').addEventListener('change', updateRooms);
    document.getElementById('room').addEventListener('change', updateEquipmentIDs);

    // Initial update of options
    updateFloors();
    updateRooms();
    updateEquipmentIDs();
</script>


</body>
</html>
