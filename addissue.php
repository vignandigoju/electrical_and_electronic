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

        nav {
            background-color: #311249;
            color: white;
            padding: 10px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        
        }

        ul a {
            color: white;
            text-decoration: none;
        }

        li {
            display: inline;
            margin-right: 20px;
            font-size: 13px;
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
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1 {
            color: white;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .details {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 13px;
        }

        .choose-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 4px;
            font-size: 13px;
        }

        .issue-input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 10px;
            align-items: center;
        }

        .input-group label {
            width: 30%;
            text-align: right;
            margin-right: 10px;
        }

        .input-group input {
            width: 65%;
        }
    </style>
</head>

<body>
    <header>
        <h2>Add Issue</h2>
    </header>

    <nav>
        <ul>
            <li><a href="supervisordashboard.php">Home</a></li>
            <li><a href="closeissue.php">Close Issue</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "maintanence");
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $issue = $_POST['issue'];
            $id = $_POST['worker_id'];
            $user_id = $_POST['user_id'];

            $sql = "UPDATE login SET issue='$issue', user_id='$user_id' WHERE id= $id ";
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Work assigned successfully!");</script>';
            } else {
                echo 'Error updating appointment: ' . $conn->error;
            }
        }

        $sql = "SELECT id, name, mobnum FROM login WHERE role='worker'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $mobnum = $row['mobnum'];
                $id = $row['id'];
        ?>
                <section class="details">
                    <h2>Assign Work to <?php echo $name; ?></h2>
                    <div>
                        <p>Name: <?php echo $name; ?></p>
                        <p>Mobile Number: <?php echo $mobnum; ?></p>
                        <form method="post" action="">
                            <div class="input-group">
                                <label for="issue">Issue:</label>
                                <input type="text" id="issue" name="issue" class="issue-input" placeholder="Issue">
                            </div>
                            <div class="input-group">
                                <label for="user_id">User ID:</label>
                                <input type="text" id="user_id" name="user_id" class="issue-input" placeholder="User ID">
                            </div>
                            <input type="hidden" name="worker_id" value="<?php echo $id; ?>">
                            <button type="submit" class="choose-button">Choose</button>
                        </form>
                    </div>
                </section>
        <?php
            }
        }
        ?>
    </main>
</body>

</html>