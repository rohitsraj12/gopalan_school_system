<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admins Register</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    
  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="css/plugins/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/simple-line-icons.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/icheck/skins/flat/aero.css"/>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="mimin" class="dashboard form-signin-wrapper">
    <div class="wrap__body">
        <!-- <div class="body__header">
            <div class="container">
                <div class="text-right">
                    <a class="btn btn-primary" href="admin_login.php">login</a>
                </div>
            </div>
        </div> -->
        <!-- end body header -->

        <div class="body__container">
            <main>

                <div class="container">

                    <form action="include\admin.inc\register.inc.php" method="POST" class="form-signin">
                        <div class="panel periodic-login">
                            <div class="panel-body text-center">
                                <!-- <h1 class="atomic-symbol">GIS</h1> -->
                                <p class="element-name">Gopalan Foundation</p>
                                <p class="atomic-mass">Admin Registration</p>

                                <i class="icons icon-arrow-down"></i>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">

                                    <input type="text" class="form-text" name="first_name" id="first_name" aria-describedby="emailHelp" required>
                                    <span class="bar"></span>
                                    <label for="first_name">First Name</label>

                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">

                                    <input type="text" class="form-text"  name="last_name" id="last_name"  aria-describedby="emailHelp" required>
                                    <span class="bar"></span>
                                    <label for="first_name">Last Name</label>

                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">

                                    <input type="text" class="form-text"  name="emp_id" id="id"  aria-describedby="emailHelp" required>
                                    <span class="bar"></span>
                                    <label for="first_name">Gopalan ID Number</label>

                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">

                                    <input type="email" class="form-text" name="email" id="email" aria-describedby="emailHelp" required>
                                    <span class="bar"></span>
                                    <label for="first_name">Email address</label>

                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    
                                    <input type="password" name="password"  class="form-text" id="password" required>
                                    <span class="bar"></span>
                                    <label>Password</label>
                                </div>
                                
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    
                                    <input type="password" name="re_password"  class="form-text" id="re_password" required>
                                    <span class="bar"></span>
                                    <label>Re Enter Password</label>
                                </div>

                                <input type="submit" name="submit-register" class="btn col-md-12" value="Register Admin"/>
                            </div>
                                <div class="text-center" style="padding:5px;">
                                    <a href="admin_login.php">Admin Login </a>
                                    <a href="teacher_login.php">| Teacher Login</a>
                                    <!-- <a href="admin_register.php">| Signup</a> -->
                                </div>
                        </div>
                    </form>

                </div>

            </main>
        </div>
    </div>

    <!-- start: Javascript -->
    <script src="js/jquery.min.js"></script>
      <script src="js/jquery.ui.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <script src="js/plugins/moment.min.js"></script>
      <script src="js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
</body>
</html>