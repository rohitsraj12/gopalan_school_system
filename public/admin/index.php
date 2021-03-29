<?php


    session_start();

    if(!isset($_SESSION["emp_id"])){
        header('location: ../admin_login.php');
    }

    $page_title = "admin dashboard";

    // $db_host = "localhost";
    // $db_user = "root";
    // $db_pass = "";
    // $db_name = "gopalan_school";

    // $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // if(!$conn){
    //     die("database connection failed");
    // }
    
    
    include('../../private/config/db_connection/db_connect.php');
    // include('../../private/config/config.php');



    $id = $_SESSION['emp_id'];

    $query = "SELECT * FROM admins WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];





    include('../../private/required/admin/admin_header.php');

?>


    <h1>
       <?php echo $row['first_name'];?>
    </h1>



<?php
    include("../../private/required/admin/admin_footer.php");
?>