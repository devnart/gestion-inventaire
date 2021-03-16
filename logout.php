<?php
session_start();
unset($_SESSION["loggedIn"]);
unset($_SESSION["username"]);
header("Location:login.php");
?>