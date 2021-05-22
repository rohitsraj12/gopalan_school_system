<?php

/* ========================================

    Teacher Login:
    teacher can log in with emp ID only
    

===========================================*/ 

if(isset($_POST['login-admin'])){
    require_once '../../../private/config/db_connection/db_connect.php';

    $user_name = $_POST['email'];
    $password = $_POST['password'];

    if(empty($user_name) || empty($password)){

        header("Location: ../../teacher_login.php?error=emptyfields");
        exit();

    } else {
        $sql = "SELECT * FROM admins WHERE emp_id=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../../teacher_login.php?error=Please%20enter%20valid%20username%20and%20password.");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $user_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $password_check = password_verify($password, $row['admin_password']);
                // $password_check = $row['admin_password'];

                if($password_check == false) {
                    
                    header("Location: ../../teacher_login.php?error=Login%20failed..%20Wrong%20Password");
                    exit();
                } else if($password_check == true){
                    session_start();
                    $_SESSION["id"] = $row['teacher_id'];
                    $_SESSION["emp_id"] = $row['emp_id'];
                    
                    header("Location: ../../dashboard/index.php");
                    exit();
                } else {
                    
                    header("Location: ../../teacher_login.php?error=Login%20failed..%20Wrong%20Password");
                    exit();
                }

            } else {
                header("Location: ../../teacher_login.php?error=There%20is%20no%20user%20found%20in%20record.");
                exit();
            }
        }
    }

} else {
    header("Location: teacher_login.php");
    exit();
}