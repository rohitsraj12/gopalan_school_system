<?php

if(isset($_POST['create_notice'])){

    require_once '../../../../private/config/db_connection/db_connect.php';


    $title      = $_POST['title'];
    $school     = $_POST['school'];
    // $file       = $_FILES['file'];
    $date       = $_POST['date'];
    $category   = $_POST['category'];
    $status     = '1';

    //uploading imgage
    $files = $_FILES['file'];
    
    //testing 
    //    echo  $product_name;
    //    echo "</br>";
    //    print_r($files);
    //    echo "</br>";

    // //  accesing file details
        $file_name = $files['name'];
        $file_error = $files['error'];
        $filetemp = $files['tmp_name'];

        //remove space and replace with _
        $file_name = str_replace(" ","_",$file_name);

        // echo $file_name;

    // breakdown file name and extention
        // after . will store in var
        $file_ext = explode('.', $file_name);
        // make it lowercase
        $file_check = strtolower(end($file_ext));
    
        //file ext store in array which are png, jpeg n jpg
        $file_ext_store = array('png', 'jpeg', 'jpg', 'docx', 'dotx', 'pdf', 'ppt', 'pptx');

        if(in_array($file_check,$file_ext_store)){
            //destination folder
                $destination_file = '../../../img/notice_board/' . $file_name;
                $url = 'img/notice_board/' . $file_name;
                //moving from tem to destination
                move_uploaded_file($filetemp, $destination_file);
        
            // echo $title . '<br/>' . $school . '<br/>' . $date . '<br/>' . $category . '<br/>' . $status;

            $query      = "INSERT INTO `notice_board`(`notice_title`, `category_id`, `school_id`, `date`, `notice_file`, `status`) 
                                VALUES ('$title','$category','$school','$date', '$url', '$status')";

            $result     = mysqli_query($conn, $query);

            if(!$result){
                echo "failed";
        }

        header('Location:../index.php?id=success');

    }
}