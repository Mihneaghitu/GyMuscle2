<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymuscle";


// Create connection\
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['registerbtn'])){
   // $username = mysqli_real_escape_string($conn, $_POST['username']);
   // $email = mysqli_real_escape_string($conn, $_POST['email']);

    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $email= mysqli_real_escape_string($conn, $_GET['email']);
    $password = mysqli_real_escape_string($conn,$_GET['password']);
    $password2=mysqli_real_escape_string($conn,$_GET['password2']);


    if($password2===$password) {
        $password = md5($password);
        $sql = "INSERT INTO users(username,email,password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn,$sql);
        $_SESSION['message']="You are now logged in";
        $_SESSION['username']=$username;
        header("location:index.php");
    }
    else{
        echo "The two password do not match!";
    }



}

?>

    <html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="register.css">
    </head>
    <body>
        <ul>
            <li><a class="active" href="index.php">Return home</a></li>
            <div class="logo"> <img src="GyMuscle.png" height="60" width="170"></div>
        </ul>
        <div class="recomend">
            <h1>WHY JOIN GYMUSCLE?</h1>
            <h2>It's <strong>FREE</strong>!</h2>
            <h2>Our pieces of advice<br> are scientifically proven to work</h2>
            <h2>You can costumize your routine</h2>
            <h2>Track your progress</h2>
            <h2>Compare with your friends</h2>
            <img src="dumbelf.png" height="200" width="300">
        </div>
    <form method="get" action="register.php">
        <div class="container">

            <h1 style="color: white">Register</h1>
            <p style="color: white">Please fill in this form to create an account.</p>
            <input type="text" style="color: black" placeholder="Enter Username" name="username" required>
            <br>
            <input type="email" style="color: black" placeholder="Enter Email" name="email" required>
            <br>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br>
            <input type="password" placeholder="Repeat Password"  name="password2" required>
            <p style="color: white">By creating an account you agree to our <a href="https://www.pornhub.com/">Terms & Privacy</a>.</p>
            <button class="registerbtn" name="registerbtn" type="submit" value="Register">Register</button>
            <p style="color: white">Already have an account? <a href="#">Sign in</a>.</p>
        </div>

    </form>
    </body>
    </html>





