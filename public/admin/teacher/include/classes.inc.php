<?php

    include('../../../../private/config/db_connection/db_connect.php');
    include('../../../../private/config/config.php');

    if(isset($_POST['create_class'])){
        
        $school_id          = $_POST['school_name'];
        $teachet_user_id    = $_POST['teacher_id'];
        $std                = $_POST['std'];
        $div                = $_POST['div'];
        $subject_id         = $_POST['subject'];
        $status             = 1;

        $query = "INSERT INTO `classes`(`school_id`, `class_room_id`, `class_section_id`, `teacher_user_id`, `subject_id`, `status`) 
                VALUES ('$school_id','$std','$div','$teachet_user_id','$subject_id','$status')";
        $result = mysqli_query($conn, $query);

        header('location:../view_teacher_profile.php?message=success&id='.$teachet_user_id);

    }

    if(isset($_POST['update_class'])){
        
        $a      = $_POST['class'];
        echo "update " . $a;
    }
