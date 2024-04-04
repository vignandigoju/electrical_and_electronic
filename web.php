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

        .container1 {
            display: flex;
            margin: 25px;
            justify-content: space-around;
            align-items: center;
            gap: 20px;
        }

        .equipment {
            width: 200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }

        .equipment:hover {
            transform: scale(1.05);
        }

        .equipment img {
            background-size: cover;
            background-position: center;
            height: 150px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .equipment h5 {
            margin-top: 0;
            color: #1c0d3f;
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <header>
        <h2>Electrical Maintenance</h2>
    </header>

    <nav>
        <ul>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="addequipment.php">Add Equipment</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <br><br>
    <div class="container1">
        <div class="equipment">
            <div style="background-image: url('ac.png')"></div>
            <center>
                <section id="facade">
                    <h5><a href="equipment.php?equipment=ac">Air Conditioner</a></h5>
                </section>
            </center>
        </div>
        <div class="equipment">
            <div style="background-image: url('fanimage.png')"></div>
            <center>
                <section id="blocks">
                    <h5><a href="equipment.php?equipment=fan">Fan</a></h5>
                </section>
            </center>
        </div>
        <div class="equipment">
            <div style="background-image: url('img/bulb.jpg')"></div>
            <center>
                <section id="landscaping">
                    <h5><a href="equipment.php?equipment=light">Light</a></h5>
                </section>
            </center>
        </div>
        <div class="equipment">
            <div style="background-image: url('gen.png')"></div>
            <center>
                <section id="security">
                    <h5><a href="equipment.php?equipment=generator">Generator</a></h5>
                </section>
            </center>
        </div>
        <div class="equipment">
            <div style="background-image: url('img/sockets.jpg')"></div>
            <center>
                <section id="fire">
                    <h5><a href="equipment.php?equipment=sockets">Sockets</a></h5>
                </section>
            </center>
        </div>
    </div>
</body>

</html>
