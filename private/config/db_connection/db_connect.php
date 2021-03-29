<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "gopalan_school";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!$conn){
        die("database connection failed");
    }

