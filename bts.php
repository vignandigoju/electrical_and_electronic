<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintenance</title>
    <style>
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
        ul a{
            color: white;
        }

        li {
            display: inline;
            margin-right: 20px;
            color: white;
        }

        a {
            text-decoration: none;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        section h2{
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #1c0d3f;
        }

        .choose-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .details {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <header>
        <h1>Electrical Maintenance</h1>
    </header>

    <nav>
        <ul>
            <ul>
                <li><a href="supervisordashboard.php">Home</a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="mainlogin.php">Logout</a></li>
                <li><a href="status.php">Status</a></li>
            </ul>
        </ul>
    </nav>
    
    <section id="complaint" class="ab">
        <div class="details">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "maintanence");
            $sql = "SELECT name, empid FROM login WHERE id=10";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $empid = $row['empid'];
                echo '<h1>Choose Employee</h1><br></br>';
                echo '<tr><td>Name:</td> <td>'.$name.'</td></tr><br></br>';
                echo '<tr><td>Employee Id:</td> <td>'.$empid.'</td></tr><br></br>';
            }
            ?>
        </div>
        <button class="choose-button" onclick="chooseEmployee(10)">Choose</button>
    </section>
    
    <!-- Repeat the above section for other employees -->

    <button class="choose-button" onclick="goToStatusPage()">Next</button>
    
    <script>
        function chooseEmployee(employeeId) {
            showPopup('Work assigned successfully for Employee ID ' + employeeId + '!');
            
            // Send selected employee details to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Leave the URL empty to make a request to the same page
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            var params = 'employee_id=' + encodeURIComponent(employeeId);
            
            xhr.onload = function() {
                // Handle the response from the server (if needed)
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    console.log(response.message);
                    // Update the choose table with the selected employee details
                    updateChooseTable(response.data);
                } else {
                    console.error(response.message);
                    // Handle the error if needed
                }
            };
            
            xhr.send(params);
        }

        function updateChooseTable(data) {
            var chooseTableBody = document.querySelector('#chooseTable tbody');
            var row = chooseTableBody.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = data.name;
            cell2.innerHTML = data.empid;
        }

        function goToStatusPage() {
            // Redirect to the "status.html" page
            window.location.href = "status.php";
        }

        function showPopup(message) {
            alert(message);
        }
    </script>
</body>
</html>
