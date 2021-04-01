<?php
    session_start();

    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }

    $page_title = "Create New Teacher";

    include('../../../private/config/db_connection/db_connect.php');
    include('../../../private/config/config.php');



    $id = $_SESSION['emp_id'];

    $query = "SELECT * FROM admins WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];

    include('../../../private/required/admin/admin_header.php');

?>






<?php
    include("../../../private/required/admin/admin_footer.php");
?>