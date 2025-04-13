<?php
    $server = '127.0.0.1'; 
    $user = 'root';
    $password = '';
    $database = 'rwddassignment';

    $connection = mysqli_connect($server, $user, $password, $database);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } 
?>