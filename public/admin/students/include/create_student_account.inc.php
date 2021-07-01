<?php

if(isset($_POST['create_profile'])){

    require_once '../../../../private/config/db_connection/db_connect.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $student_user_id = $_POST['user_id'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $class = $_POST['grade'];
    $section = $_POST['section'];
    $school = $_POST['school'];
    $status = '1';

    // echo $first_name . ", " . $last_name . ", " . $student_user_id . ", " . $phone . ", ". $password . ", " . $re_password . ", " . $status;
    
    //if empty field condition
    if(empty($first_name) || empty($last_name) || empty($student_user_id) || empty($phone) || empty($password) || empty($re_password) || empty($phone)){
        // redirect to register and empty field
        header("location: ../create_new_student.php?error=emptyfields&user_name=".$student_user_id."&mail".$phone);
        //stop scripting
        exit();

    } else if (!filter_var($phone, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $student_user_id)){
        // redirect to register and empty field
        header("location: ../create_new_student.php?error=invalidmailuser_name");
        //stop scripting
        exit();

    // } else if (!filter_var($phone, FILTER_VALIDATE_EMAIL)){
    //     // redirect to register and empty field
    //     header("location: ../create_new_student.php?error=invalidmail&user_name=".$student_user_id);
    //     //stop scripting
    //     exit();

    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $student_user_id)){
        // redirect to register and empty field
        header("location: ../create_new_student.php?error=invalidmail&mail=".$phone);
        //stop scripting
        exit();

    } else if ($password !== $re_password){
        // redirect to register and empty field
        header("location: ../create_new_student.php?error=passwordcheck&user_name=".$student_user_id."&mail".$phone);
        //stop scripting
        exit();

    } else {
        // prepared statement (? placeholder for safty)
        $sql = "SELECT student_user_id FROM students WHERE student_user_id=?";
        // 
        $stmt = mysqli_stmt_init($conn);

        // 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            
            // redirect to register and empty field
            header("location: ../create_new_student.php?error=sqlerror");
            //stop scripting
            exit();
        } else {
            // 
            mysqli_stmt_bind_param($stmt, "s", $student_user_id);
            mysqli_stmt_execute($stmt);
            // is ther any match
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0 ){
                
                // redirect to register and empty field
                header("Location: ../create_new_student.php?error=usertaken$mail=".$phone);
                //stop scripting
                exit();
            } else {
                // $first_name = "";
                $sql = "INSERT INTO students (first_name, last_name, `student_user_id`, phone, student_password, student_status, school_id, class_id, section_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // redirect to register and empty field
                    header("Location: ../create_new_student.php?error=sqlerror");
                    //stop scripting
                    exit();
                } else {
                    // secure password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssiiii", $first_name, $last_name, $student_user_id, $phone, $hashed_password, $status, $school, $class, $section);
                    mysqli_stmt_execute($stmt);
                
                    // if email need to send below add email script 

                    header("Location: ../create_new_student.php?register=success");
                    exit();
                }
            }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

} else {
     // redirect to register and empty field
     header("location: ../create_new_student.php");
     //stop scripting
     exit();
}