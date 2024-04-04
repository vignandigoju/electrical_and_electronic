<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Home</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }

        header {
            background-color: #3F3064;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h2 {
            margin: 0;
        }

        nav {
            background-color: #3F3064;
            color: white;
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #ffffff;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        ul a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            padding: 10px 20px;
            transition: all 0.3s;
            font-weight: bold;
        }

        ul a:hover {
            background-color: #2D224D;
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: -1;
            border-radius: 8px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .home-buttons {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 50px;
            width: 100%;
        }

        .button-container {
            width: calc(50% - 20px);
            margin-bottom: 20px;
        }

        .button {
            width: 100%;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            background-color: #3F3064;
            color: white;
        }

        .button:hover {
            background-color: #2D224D;
            transform: translateY(-5px);
        }

        .button-description {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .button-description p {
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }

        .motivation {
            background-color: #3F3064;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
                <li><a href="managerhome.php">Home</a></li>
                <li class="<?= ($activePage == 'appdashboard') ? 'active': ''; ?>"><a href="appdashboard.php">Category</a></li>
                <li class="<?= ($activePage == 'addcategory') ? 'active': ''; ?>"><a href="addcategory.php">Add Category</a></li>
                <li class="<?= ($activePage == 'staff') ? 'active': ''; ?>"><a href="staff.php">Add Employee</a></li>
                <li class="<?= ($activePage == 'addequipment') ? 'active': ''; ?>"><a href="addequipment.php">Add Equipment</a></li>
                <!-- <li class="<?= ($activePage == 'viewissue') ? 'active': ''; ?>"><a href="viewissue.php">View Issue</a></li> -->
                <!-- <li class="<?= ($activePage == 'mainstatus') ? 'active': ''; ?>"><a href="mainstatus.php">Work Status</a></li> -->
                <li class="<?= ($activePage == 'empdetails') ? 'active': ''; ?>"><a href="empdetails.php">Employee Details</a></li>
                <li class="<?= ($activePage == 'equipmentdetail') ? 'active': ''; ?>"><a href="equipmentdetail.php">Equipment Details</a></li>

                <!-- <li class="<?= ($activePage == 'choose') ? 'active': ''; ?>"><a href="choose.php">Assign Issue</a></li> -->
                <!-- <li class="<?= ($activePage == 'Rating') ? 'active': ''; ?>"><a href="Rating.php">Rating</a></li> -->
                <li class="<?= ($activePage == 'profile') ? 'active': ''; ?>"><a href="profile.php">My Profile</a></li>
                <li class="<?= ($activePage == 'mainlogin') ? 'active': ''; ?>"><a href="mainlogin.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        
        <div class="home-buttons">
            <div class="button-container">
                <button class="button">Add Category & Equipment</button>
                <div class="button-description">
                    <p>Initiate the addition of new equipment categories and individual equipment items to the system.</p>
                </div>
            </div>
            <div class="button-container">
                <button class="button">Add Employee</button>
                <div class="button-description">
                    <p>Hire new technicians, workers, or users to join the system's workforce.</p>
                </div>
            </div>
            <div class="button-container">
                <button class="button">Employee Details</button>
                <div class="button-description">
                    <p>Access and manage detailed information about all employees authorized to use the system.</p>
                </div>
            </div>
            <div class="button-container">
                <button class="button">My Profile</button>
                <div class="button-description">
                    <p>Review and update personal profile settings, including contact details and preferences.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
