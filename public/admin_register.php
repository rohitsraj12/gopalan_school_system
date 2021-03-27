
<?php

include('../private/config/db_connection/bd_connect.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $status = '1';

        // echo $email . " ". $pass . " " . $status;

        $query = "INSERT INTO `admin`(`admin_email`, `password`, `status`) VALUES ('$email', '$pass', '$status')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die('query failed');
        } else {
            echo "success";
        }

    }


    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="wrap__body">
        <div class="body__header">
            <div class="container">
                <div class="text-right">
                    <a class="btn btn-primary" href="admin_login.php">login</a>
                </div>
            </div>
        </div>
        <!-- end body header -->

        <div class="body__container">
            <main>

                <div class="container">
                
                    <div class="row">

                        <div class="col-md-5">

                            <div class="section__form">
                                <header class="form__header">
                                    <h4 class="h4">
                                        Welcome..
                                    </h4>

                                    <h4 class="h2">
                                        Register new account
                                    </h4>
                                </header>

                                <div class="form__body">
                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="password"  id="exampleInputPassword1" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Re Enter Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    
                                    </form>
                                </div>
                                <!-- wrap form -->

                            </div>

                        </div>

                        <div class="col-md-7">

                        </div>

                    </div>

                </div>

            </main>
        </div>
    </div>
</body>
</html>