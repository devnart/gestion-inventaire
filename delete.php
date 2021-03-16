<?php
session_start();

if ($_SESSION['loggedIn']) {
} else {

    header('Location: login.php');
}
$user = $_SESSION['username'];
include('db_connect.php');

// delete single product

$id = $_GET['r'];

$sql = "DELETE FROM product WHERE id='$id'";

    if (mysqli_query($connection, $sql)) {
        
        header('Location: index.php');
    } else {
        echo 'Query Error ' . mysqli_error($connection);
    }

?>