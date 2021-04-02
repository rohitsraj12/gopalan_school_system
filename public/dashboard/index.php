<?php
 // teacher list or all teacher record

    session_start();

    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }

    // $page_title = "Dashboard";

    include('../../private/config/db_connection/db_connect.php');
    include('../../private/config/config.php');



    $id = $_SESSION['emp_id'];

    echo $id;

    $query = "SELECT * FROM teachers WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];

    include('../../private/required/teacher/teacher_header.php');

?>









<?php
    include("../../private/required/teacher/teacher_footer.php");
?>