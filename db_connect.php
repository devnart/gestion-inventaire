<?php 
    //connect to database LOCAL
// $connection = mysqli_connect('localhost', 'root', '', 'stock');

// Remote Connect
$connection = mysqli_connect('remotemysql.com', 'O4hkw6m8zM', 'JoXTxPjP0f', 'O4hkw6m8zM');


//check connection
if (!$connection) {
    echo 'Connection error: ' . mysqli_connect_error();
}

?>