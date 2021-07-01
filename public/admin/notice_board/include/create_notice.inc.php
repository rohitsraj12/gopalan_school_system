<?php

if(isset($_POST['create_notice'])){

    require_once '../../../../private/config/db_connection/db_connect.php';


    $title      = $_POST['title'];
    $school     = $_POST['school'];
    $file       = '';
    $date       = $_POST['date'];
    $category   = $_POST['category'];
    $status     = '1';
    
    echo $title . '<br/>' . $school . '<br/>' . $date . '<br/>' . $category . '<br/>' . $status;

    $query      = "INSERT INTO `notice_board`(`notice_title`, `category_id`, `school_id`, `date`, `notice_file`, `status`) 
                        VALUES ('$title','$category','$school','$date','$file','$status')";

    $result     = mysqli_query($conn, $query);

    if(!$result){
        echo "failed";
    }

    header('Location:../index.php?id=success');

}