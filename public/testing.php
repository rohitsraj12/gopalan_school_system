<?php


    if(isset($_POST['submit'])){

        $name = $_POST['name'];

       if(empty($name)){ $name = "rohit";} 

       echo $name ;

    }

























    // #space replace with _
    /*
        $string = "Hello every one. this is rohit.";
        $newString = str_replace(' ', '_', $string);

        echo $newString; 
    */



?>


<form action="" method="POST">

    <input type="text" name="name">

    <input type="submit" name="submit">

</form>
