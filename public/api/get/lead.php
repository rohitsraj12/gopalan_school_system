<?php

// fetch teachers on api

include('../../../private/config/db_connection/db_connect.php');

$query    = "SELECT * FROM admins";
$result   = mysqli_query($conn, $query);

while($rows = mysqli_fetch_assoc($result)){
    echo $rows['admin_id'];
}