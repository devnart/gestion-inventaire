<?php 
    //connect to database
$connection = mysqli_connect('localhost', 'root', '', 'stock');

//check connection
if (!$connection) {
    echo 'Connection error: ' . mysqli_connect_error();
}

?>