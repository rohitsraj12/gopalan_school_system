
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="css/plugins/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/simple-line-icons.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/icheck/skins/flat/aero.css"/>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- end: Css -->
</head>
<body id="mimin" class="dashboard form-signin-wrapper">

    <div class="container">
        
    <form action="include\dashboard.inc\login.inc.php" method="POST" class="form-signin">
          <div class="panel periodic-login">
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol">GIS</h1>
                  <p class="element-name">Gopalan Foundation</p>
                  <p class="atomic-mass">Teacher Login</p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="email" class="form-text" id="email" aria-describedby="emailHelp" required>

                    <span class="bar"></span>
                    <label>Teacher ID</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    
                    <input type="password" name="password"  class="form-text" id="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label>
                  <input type="submit" name="login-teacher" class="btn col-md-12" value="SignIn"/>
              </div>
                <div class="text-center" style="padding:5px;">
                    <a href="forgotpass.html">Forgot Password </a>
                    <!-- <a href="admin_register.php">| Signup</a> -->
                </div>
          </div>
        </form>
    </div>

    <!-- end: Content -->
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

