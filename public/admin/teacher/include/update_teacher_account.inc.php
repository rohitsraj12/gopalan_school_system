<?php

if(isset($_POST['update_profile'])){

require_once '../../../../private/config/db_connection/db_connect.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$emp_id = $_POST['emp_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$school = $_POST['school_name'];
$position = $_POST['position'];
$class = $_POST['grade'];
$section = $_POST['section'];
$status = '1';

// echo $first_name . ", " . $last_name . ", " . $emp_id . ", " . $email . ", ". $password . ", " . $re_password . ", " . $status;

//if empty field condition
if(empty($first_name) || empty($last_name) || empty($emp_id) || empty($email) || empty($password) || empty($re_password)){
    // redirect to register and empty field
    header("location: ../create_new_teacher.php?error=emptyfields&user_name=".$emp_id."&mail".$email);
    //stop scripting
    exit();

} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $emp_id)){
    // redirect to register and empty field
    header("location: ../create_new_teacher.php?error=invalidmailuser_name");
    //stop scripting
    exit();

} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // redirect to register and empty field
    header("location: ../create_new_teacher.php?error=invalidmail&user_name=".$emp_id);
    //stop scripting
    exit();

} else if (!preg_match("/^[a-zA-Z0-9]*$/", $emp_id)){
    // redirect to register and empty field
    header("location: ../create_new_teacher.php?error=invalidmail&mail=".$email);
    //stop scripting
    exit();

} else if ($password !== $re_password){
    // redirect to register and empty field
    header("location: ../create_new_teacher.php?error=passwordcheck&user_name=".$emp_id."&mail".$email);
    //stop scripting
    exit();

} else {
    // prepared statement (? placeholder for safty)
    $sql = "SELECT emp_id FROM teachers WHERE emp_id=?";
    // 
    $stmt = mysqli_stmt_init($conn);

    // 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        
        // redirect to register and empty field
        header("location: ../create_new_teacher.php?error=sqlerror");
        //stop scripting
        exit();
    } else {
        // 
        mysqli_stmt_bind_param($stmt, "s", $emp_id);
        mysqli_stmt_execute($stmt);
        // is ther any match
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);

        if($resultcheck > 0 ){
            
            // redirect to register and empty field
            header("Location: ../create_new_teacher.php?error=usertaken$mail=".$email);
            //stop scripting
            exit();
        } else {
            // $first_name = "";
            $sql = "INSERT INTO teachers (first_name, last_name, emp_id, email, teacher_password, teacher_status, school_id, position_id, class_id, section_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                // redirect to register and empty field
                header("Location: ../create_new_teacher.php?error=sqlerror");
                //stop scripting
                exit();
            } else {
                // secure password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sssssiiiii", $first_name, $last_name, $emp_id, $email, $hashed_password, $status, $school, $position, $class, $section);
                mysqli_stmt_execute($stmt);
            
                // if email need to send below add email script 

                header("Location: ../create_new_teacher.php?register=success");
                exit();
            }
        }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
 // redirect to register and empty field
 header("location: ../create_new_teacher.php");
 //stop scripting
 exit();
}