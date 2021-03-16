<?php
session_start();

include('db_connect.php');
if (isset($_POST['submit'])) {
  $username = $_POST["user"];
  $password = $_POST["password"];

  $_SESSION['username'] = $username;
  
  $sql = "SELECT * FROM login where username = '$username' and password = '$password'";

  $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $_SESSION['loggedIn'] = true;

    header('Location: index.php');
 
    
  } else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Login</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">  

</head>

<body>
  <main class="container">
    <div class="login">
      <div class="logo">
        <img src="images/logo_dark.svg" alt="Dashboard Logo" />
      </div>
      <h3>login to dashboard</h3>
      <form action="" method="POST">
        <input type="text" placeholder="Your Email" name="user" />
        <input type="password" placeholder="Your Password" name="password" />
        <input type="submit" value="Login" name="submit" />
      </form>
    </div>
    <div class="image-container">
      <img src="images/people.png" alt="people standing" />
    </div>
  </main>
</body>

</html>