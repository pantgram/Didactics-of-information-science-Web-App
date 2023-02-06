<?php
    if(!isset($_SESSION)){
        session_start();
    }

    // connect to database
    $conn = mysqli_connect('webpagesdb.it.auth.gr:3306', 'admin100', '6sQ@o3l0', 'student3631partB');

    if (!$conn) {
        die("Error connecting to database: " . mysqli_connect_error());
    }

    // define global constants
    define ('ROOT_PATH', realpath(dirname(__FILE__)));
?>
