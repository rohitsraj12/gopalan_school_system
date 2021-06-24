<?php

if(isset($_POST['update_profile'])){
    require_once '../../../../private/config/config.php';
    require_once '../../../../private/config/db_connection/db_connect.php';

    $teacher_id = $_POST['teacher_id'];

    // echo $teacher_id;

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $emp_id = $_POST['emp_id'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    // $re_password = $_POST['re_password'];
    $school = $_POST['school_name'];
    $position = $_POST['position'];
    $class = $_POST['grade'];
    $section = $_POST['section'];
    // $status = '1';

    $teacher_query      = "SELECT * FROM teachers WHERE teacher_id = '$teacher_id'";
    $teacher_result     = mysqli_query($conn, $teacher_query);
    $row                = mysqli_fetch_assoc($teacher_result); 

    if(empty($_POST['first_name'])){ $first_name = $row['first_name'] ;}
    if(empty($_POST['last_name'])){ $last_name = $row['last_name'] ;} 
    if(empty($_POST['emp_id'])){ $emp_id = $row['emp_id'] ;} 
    if(empty($_POST['email'])){ $email = $row['email'] ;} 

    // echo $first_name . ", " . $last_name . ", " . $emp_id . ", " . $email . ", ". $school . ", " . $position . ", " . $class . ", ". $section . ", " . $status;

    $sql = "UPDATE `teachers` SET `first_name`= '$first_name',
                                `last_name`= '$last_name',
                                `emp_id`= '$emp_id',
                                `email`= '$email',
                                `position_id`= '$position',
                                `school_id`= '$school',
                                `class_id`= '$class',
                                `section_id`= '$section' 
                                WHERE `teacher_id` = $teacher_id";
    
    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo "update failed";
    } else {
        // echo "record updated";

        header ("Location: ../view_teacher_profile.php?id=" . $emp_id . "&message=update_seccess");
    }


                
}