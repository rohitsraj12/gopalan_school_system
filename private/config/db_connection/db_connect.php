<?php


    $db_host = "localhost";
    $db_user = "uiglsjvztkuay";
    $db_pass = "$^g$1849h8sh";
    $db_name = "dbudubglbge2if";

    // $db_host = "localhost";
    // $db_user = "rot";
    // $db_pass = "";
    // $db_name = "gopalan_school";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!$conn){
        die("database connection failed");
    }

