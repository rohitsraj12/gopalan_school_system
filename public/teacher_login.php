
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
                    <a class="btn btn-primary" href="admin_register.php">register</a>
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
                                        Welcome back
                                    </h4>

                                    <h4 class="h2">
                                        teacher Login to your account
                                    </h4>
                                </header>

                                <div class="form__body">
                                    <form action="include\dashboard.inc\login.inc.php" method="POST">
                                        <div class="form-group">
                                            <label for="email">Emp Id</label>
                                            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                        <!-- <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div> -->
                                        <button type="submit" name="login-admin" class="btn btn-primary">Submit</button>
                                       
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

