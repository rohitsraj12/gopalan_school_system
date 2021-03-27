<?php
    $page_title = "admin dashboard";

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "gopalan_school";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!$conn){
        die("database connection failed");
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    include('../../private/required/admin/admin_header.php');

?>


    <h1>
       <?php echo $row['admin_email']?>;
    </h1>



<?php
    include("../../private/required/admin/admin_footer.php");
?>