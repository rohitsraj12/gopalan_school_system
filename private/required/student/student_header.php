<?php
    $school     = $row['school_id']; 



?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">s
	<meta name="description" content="Miminium dashboard Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/fullcalendar.min.css"/>
      
      <!-- start table plugin (teacher view)-->    
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/datatables.bootstrap.min.css"/>
      <!-- end table plug in (teacher view) -->

      <!-- start form page -->
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/nouislider.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/select2.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/ionrangeslider/ion.rangeSlider.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
      <link rel="stylesheet" type="text/css" href="<?php base_url()?>css/plugins/bootstrap-material-datetimepicker.css"/>
      <!-- end from page -->


      <link href="<?php base_url()?>css/style.css" rel="stylesheet">
      <link href="<?php base_url()?>css/updated_style.css" rel="stylesheet">
      <!-- end: Css -->

      <link rel="shortcut icon" href="<?php base_url()?>img/logomi.png">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  </head>

   
 <body id="mimin" class="dashboard">


      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              
              <a href="<?php base_url();?>students/" class="navbar-brand">
              <?php
                if($school == 1){
                  ?>
                    <img src="<?php base_url();?>img/gis-logo.svg" alt="user name" />
                  <?php
                } else if($school == 2){
                  ?>
                    <img src="<?php base_url();?>img/brand/gns.svg" alt="user name" />
                  <?php
                }
              ?>
              </a>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $row['first_name'];?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="<?php base_url();?>img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="<?php base_url();?>"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="<?php base_url();?>"><span class="fa fa-calendar"></span> My Calendar</a></li>
                     <li><a href="<?php base_url();?>logout.php">logout</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href=""><span class="fa fa-cogs"></span></a></li>
                        <li><a href=""><span class="fa fa-lock"></span></a></li>
                        <li><a href=""><span class="fa fa-power-off "></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->
