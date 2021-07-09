

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>

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

  <link rel="shortcut icon" href="img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

        <form action="include\admin.inc\login.inc.php" method="POST" class="form-signin">
          <div class="panel periodic-login">
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol">GIS</h1>
                  <p class="element-name">Gopalan Foundation</p>
                  <p class="atomic-mass">Admin Login</p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="email" name="email" class="form-text" id="email" aria-describedby="emailHelp" required>

                    <span class="bar"></span>
                    <label>Email address</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    
                    <input type="password" name="password"  class="form-text" id="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label>
                  <input type="submit" name="login-admin" class="btn col-md-12" value="SignIn"/>
              </div>
                <div class="text-center" style="padding:5px;">
                    <a href="forgotpass.html">Forgot Password </a>
                    <a href="admin_register.php">| Signup</a>
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