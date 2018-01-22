<?php
    
    $host = "localhost";
    $user = "ateam";
    $password = "ULp3XT4dPPL2017";
    $database = "ateam";
    
    // Create connection
    $db = new mysqli($host, $user, $password, $database);
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    #echo "Connected successfully (".$db->host_info.")";
    
$con=$db;