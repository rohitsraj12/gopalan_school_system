<?php

if(isset($_POST['submit-register'])){

    require_once '../../../private/config/db_connection/db_connect.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $emp_id = $_POST['emp_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $status = '1';

    // echo $first_name . ", " . $last_name . ", " . $emp_id . ", " . $email . ", ". $password . ", " . $re_password . ", " . $status;
    
    //if empty field condition
    if(empty($first_name) || empty($last_name) || empty($emp_id) || empty($email) || empty($password) || empty($re_password)){
        // redirect to register and empty field
        header("location: ../../admin_register.php?error=emptyfields&user_name=".$emp_id."&mail".$email);
        //stop scripting
        exit();

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $emp_id)){
        // redirect to register and empty field
        header("location: ../../admin_register.php?error=invalidmailuser_name");
        //stop scripting
        exit();

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // redirect to register and empty field
        header("location: ../../admin_register.php?error=invalidmail&user_name=".$emp_id);
        //stop scripting
        exit();

    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $emp_id)){
        // redirect to register and empty field
        header("location: ../../admin_register.php?error=invalidmail&mail=".$email);
        //stop scripting
        exit();

    } else if ($password !== $re_password){
        // redirect to register and empty field
        header("location: ../../admin_register.php?error=passwordcheck&user_name=".$emp_id."&mail".$email);
        //stop scripting
        exit();

    } else {
        // prepared statement (? placeholder for safty)
        $sql = "SELECT emp_id FROM admins WHERE emp_id=?";
        // 
        $stmt = mysqli_stmt_init($conn);

        // 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            
            // redirect to register and empty field
            header("location: ../../admin_register.php?error=sqlerror");
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
                header("Location: ../../admin_register.php?error=usertaken$mail=".$email);
                //stop scripting
                exit();
            } else {
                // $first_name = "";
                $sql = "INSERT INTO admins (first_name, last_name, emp_id, emp_email, admin_password, emp_status) 
                VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // redirect to register and empty field
                    header("Location: ../../admin_register.php?error=sqlerror");
                    //stop scripting
                    exit();
                } else {
                    // secure password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssi", $first_name, $last_name, $emp_id, $email, $hashed_password, $status);
                    mysqli_stmt_execute($stmt);
                
                    // if email need to send below add email script 

                    header("Location: ../../admin_login.php?register=success");
                    exit();
                }
            }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

} else {
     // redirect to register and empty field
     header("location: ../login.php");
     //stop scripting
     exit();
}