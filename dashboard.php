<?php
    $conn=new mysqli("localhost","root","","loginpage");
    if($conn->connect_error)
    {
        die("connection failed");
    }
    if(isset($_POST['submit']))
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $sql = "select * from userlogin where username = '$username' and password= '$password'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            echo '<script>alert("Login sucess")</script>';
            header("Location: dashboard.php");
            exit();
        }
        else{
            echo '<script>alert("Invalid details")</script>';
        
        }
    }
?>
<html>
    <title>Login</title>
    <body>
        <form name="form" action="" method="post">
        <label>Username:</label>
		<input type="text" name="user"><br><br>
		<label>Password:</label>
		<input type="Password" name="pass"><br><br>
        <input type="submit" value="submit" name="submit"><br><br>
        <a href="signup.html">Sign-Up</a>
        </form>
    
    </body>
</html>
