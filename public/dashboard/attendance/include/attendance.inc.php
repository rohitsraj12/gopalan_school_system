<?php

    session_start();
    if(!isset($_SESSION["emp_id"])){
        header('location: ../../../teacher_login.php');
    }
    $id = $_SESSION['emp_id'];

    include('../../../../private/config/db_connection/db_connect.php');

    if(isset($_POST['submit'])){
        include('../../../../private/config/config.php');
        
        $attendance = $_POST['attendance'];
        $student_id = $_POST['student_id'];
        $student_user_id = $_POST['student_user_id'];
        $teacher_id = $_POST['teacher_id'];
        $div = $_POST['div'];
        $std = $_POST['std'];
        $date = date("Y-m-d");

        // echo $attendance[0];
        // echo $attendance[1];

        foreach($attendance as $name => $value){

            if($value == 'absent'){ $att =  0;}else { $att =  1;}
            // echo "</br>";
            // echo $student_user_id[$name];
            // echo "</br>";
            // echo $student_id[$name];
            // echo "</br>";
            // echo "teacher id :- " . $teacher_id;
            // echo "</br>";
            // echo "std :- " . $std . " " . $div;
            // echo "</br>";
            // echo $date;
            // echo "<hr>";

            $query = "INSERT INTO `class_attendances`(`teacher_user_id`, `class_id`, `section_id`, `date`, `student_user_id`, `student_id`, `attendance_status`) 
                    VALUES ('$teacher_id', '$std', '$div', '$date', '$student_user_id[$name]', '$student_id[$name]', '$att')";
            
            $result = mysqli_query($conn, $query);

            if($result){
                header("location:../../index.php?attendance=success");
            }
        } 
        
    }