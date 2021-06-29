<?php

/* ========================================

    Student Login:
    Student can log in with student ID only
    
===========================================*/ 

if(isset($_POST['login-student'])){
    require_once '../../../private/config/db_connection/db_connect.php';

    $user_name = $_POST['student_id'];
    $password = $_POST['password'];

    if(empty($user_name) || empty($password)){

        header("Location: ../../student_login.php?error=emptyfields");
        exit();

    } else {
        $sql = "SELECT * FROM students WHERE student_user_id=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../../student_login.php?error=Please%20enter%20valid%20username%20and%20password.");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $user_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $password_check = password_verify($password, $row['student_password']);
                // $password_check = $row['admin_password'];

                if($password_check == false) {
                    
                    header("Location: ../../student_login.php?error=Login%20failed..%20Wrong%20Password");
                    exit();
                } else if($password_check == true){
                    session_start();
                    $_SESSION["id"] = $row['student_id'];
                    $_SESSION["student_user_id"] = $row['student_user_id'];
                    
                    header("Location: ../../students/index.php");
                    exit();
                } else {
                    
                    header("Location: ../../student_login.php?error=Login%20failed..%20Wrong%20Password");
                    exit();
                }

            } else {
                header("Location: ../../student_login.php?error=There%20is%20no%20user%20found%20in%20record.");
                exit();
            }
        }
    }

} else {
    header("Location: student_login.php");
    exit();
}