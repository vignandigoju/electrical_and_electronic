<!DOCTYPE html>
<html lang="en">
<head>
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
        <!-- Your navigation menu -->
    </nav>
    <section id="complaint" class="ab">
        <div class="details">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "maintanence");
            session_start();
            $sql = "SELECT name, empid FROM login WHERE id=10";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $empid = $row['empid'];
                $_SESSION['selected_employee'] = ['name' => $name, 'empid' => $empid]; // Store selected employee data in a session
                echo '<h1>Choose Employee</h1><br></br>';
                echo '<tr><td>Name:</td> <td>'.$name.'</td></tr><br></br>';
                echo '<tr><td>Employee Id:</td> <td>'.$empid.'</td></tr><br></br>';
            }
            ?>
        </div>
        <form method="post" action="status.php"> <!-- Use a form to submit selected employees to status.php -->
            <button class="choose-button" name="choose_employee">Choose</button>
        </form>
    </section>
    <button class="choose-button" onclick="goToStatusPage()">Next</button>
    <script>
       function showPopup(message) {
            alert(message);
        }

        function goToStatusPage() {
            // Redirect to the "status.html" page
            window.location.href = "456.php";
        }
    </script>
</body>
</html>
