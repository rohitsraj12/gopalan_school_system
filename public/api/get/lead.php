<?php


header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

// fetch teachers on api

include('../../../private/config/db_connection/db_connect.php');

$query    = "SELECT * FROM admins";
$result   = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0){
    
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);

} else {
    echo json_encode(array('message' => 'No record found', 'status' => false));
}