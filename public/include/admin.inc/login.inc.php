<?php

if(isset($_POST['login-admin'])){
    require_once '../../../private/config/db_connection/db_connect.php';

    $mail_user_name = $_POST['email'];
    $password = $_POST['password'];

    if(empty($mail_user_name) || empty($password)){

        header("Location: ../../admin_admin_login.php?error=emptyfields");
        exit();

    } else {
        $sql = "SELECT * FROM admin WHERE admin_name=? OR admin_email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../../admin_login.php?error=Please%20enter%20valid%20username%20and%20password.");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $mail_user_name, $mail_user_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                // $password_check = password_verify($password, $row['student_password']);
                $password_check = $row['password'];

                if($password_check == false) {
                    
                    header("Location: ../../admin_login.php?error=Login%20failed..%20Wrong%20Password");
                    exit();
                } else if($password_check == true){
                    session_start();
                    $_SESSION["user_id"] = $row['student_id'];
                    $_SESSION["user_name"] = $row['student_user_name'];

                    
                    header("Location: ../../admin/index.php");
                    exit();
                } else {
                    
                    header("Location: ../../admin_login.php?error=Login%20failed..%20Wrong%20Password");
                    exit();
                }

            } else {
                header("Location: ../../admin_login.php?error=There%20is%20no%20user%20found%20in%20record.");
                exit();
            }
        }
    }

} else {
    header("Location: admin_login.php");
    exit();
}