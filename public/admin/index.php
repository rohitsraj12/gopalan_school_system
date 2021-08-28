<?php
  // admin dashboard

  session_start();
  if(!isset($_SESSION["emp_id"])){
      header('location: ../admin_login.php');
  }
  $id = $_SESSION['emp_id'];
  $page_title = "admin dashboard";

  include('../../private/config/db_connection/db_connect.php');
  include('../../private/config/config.php');

  $query    = "SELECT * FROM admins WHERE emp_id='$id'";
  $result   = mysqli_query($conn, $query);
  $row      = mysqli_fetch_assoc($result);

  include('../../private/required/admin/admin_header.php');

?>

  		
  <!-- start: content -->
  <div id="content">
    <div class="panel">
      <div class="panel-body">
        <div class="col-md-6 col-sm-12">
          <h3 class="animated fadeInLeft">Gopalan Schools Dashboard</h3>
          <p class="animated fadeInDown">
            <!-- <span class="fa  fa-map-marker"></span>  -->
            <!-- Whitefield,Bangalore -->
            Admin
          </p>

          <!-- <ul class="nav navbar-nav">
              <li><a href="" >Impedit</a></li>
              <li><a href="" class="active">Virtute</a></li>
              <li><a href="">Euismod</a></li>
              <li><a href="">Explicar</a></li>
              <li><a href="">Rebum</a></li>
          </ul> -->
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
            <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Bangalore</h3>
            <h1 style="margin-top: -10px;color: #ddd;">30<sup>o</sup></h1>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="wheather">
              <div class="stormy rainy animated pulse infinite">
                <div class="shadow">
                  
                </div>
              </div>
              <div class="sub-wheather">
                <div class="thunder">
                  
                </div>
                <div class="rain">
                  <div class="droplet droplet1"></div>
                  <div class="droplet droplet2"></div>
                  <div class="droplet droplet3"></div>
                  <div class="droplet droplet4"></div>
                  <div class="droplet droplet5"></div>
                  <div class="droplet droplet6"></div>
                </div>
              </div>
            </div>
          </div>                   
        </div>
      </div>                    
    </div>

    <div class="col-md-12" style="padding:20px;">
      <div class="col-md-12 padding-0">
        <div class="col-md-8 padding-0">
          <div class="col-md-12 padding-0">

            <div class="col-md-6">
                <div class="panel box-v1">
                  <div class="panel-heading bg-white border-none">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center padding-0">
                      <h4 class="text-center">Number of Teachers</h4>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <!-- <h4>
                        <span class="icon-user icons icon text-right"></span>
                        </h4> -->
                    </div>
                  </div>
                  <div class="panel-body text-center">
                    <?php 
                      $query = "SELECT teacher_id FROM teachers";
                      $result = mysqli_query($conn, $query);

                      $row_num = mysqli_num_rows($result);
                    ?>
                    <h1><?php echo $row_num?></h1>
                    <hr/>
                    <p>Total Registered Teachers</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel box-v1">
                  <div class="panel-heading bg-white border-none">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center padding-0">
                      <h4 class="text-center">Number of Students</h4>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <!-- <h4>
                        <span class="icon-basket-loaded icons icon text-right"></span>
                        </h4> -->
                    </div>
                  </div>
                  <div class="panel-body text-center">
                  <?php 
                      $query = "SELECT student_id FROM students";
                      $result = mysqli_query($conn, $query);

                      $row_num = mysqli_num_rows($result);
                    ?>
                    <h1><?php echo $row_num?></h1>
                    <hr/>
                    <p>Total Registered Students</p>
                  </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel box-v1">
                  <div class="panel-heading bg-white border-none">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-left padding-0">
                      <h4 class="text-center">Gopalan International School - Teachers</h4>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                        <!-- <h4>
                        <span class="icon-user icons icon text-right"></span>
                        </h4> -->
                    </div>
                  </div>
                  <div class="panel-body text-center">
                    <?php 
                      $query = "SELECT teacher_id FROM teachers WHERE school_id = 1";
                      $result = mysqli_query($conn, $query);

                      $row_num = mysqli_num_rows($result);
                    ?>
                    <h1><?php echo $row_num?></h1>
                    <hr/>
                    <p>Total Registered Teachers</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel box-v1">
                  <div class="panel-heading bg-white border-none">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center padding-0">
                      <h4 class="text-center">Gopalan National School - Teachers</h4>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <!-- <h4>
                        <span class="icon-basket-loaded icons icon text-right"></span>
                        </h4> -->
                    </div>
                  </div>
                  <div class="panel-body text-center">
                  <?php 
                      $query = "SELECT teacher_id FROM teachers WHERE school_id = 2";
                      $result = mysqli_query($conn, $query);

                      $row_num = mysqli_num_rows($result);
                    ?>
                    <h1><?php echo $row_num?></h1>
                    <hr/>
                    <p>New Orders</p>
                  </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel box-v1">
                  <div class="panel-heading bg-white border-none">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center padding-0">
                      <h4 class="text-center">Gopalan International School - Students</h4>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <!-- <h4>
                        <span class="icon-basket-loaded icons icon text-right"></span>
                        </h4> -->
                    </div>
                  </div>
                  <div class="panel-body text-center">
                  <?php 
                      $query = "SELECT student_id FROM students WHERE school_id = 1";
                      $result = mysqli_query($conn, $query);

                      $row_num = mysqli_num_rows($result);
                    ?>
                    <h1><?php echo $row_num?></h1>
                    <hr/>
                    <p>Current GIS Students</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel box-v1">
                  <div class="panel-heading bg-white border-none">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center padding-0">
                      <h4 class="text-center">Gopalan National School - Students</h4>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <!-- <h4>
                        <span class="icon-basket-loaded icons icon text-right"></span>
                        </h4> -->
                    </div>
                  </div>
                  <div class="panel-body text-center">
                  <?php 
                      $query = "SELECT student_id FROM students WHERE school_id = 2";
                      $result = mysqli_query($conn, $query);

                      $row_num = mysqli_num_rows($result);
                    ?>
                    <h1><?php echo $row_num?></h1>
                    <hr/>
                    <p>New Orders</p>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-12 card-wrap padding-0">
      
      </div><!--end-->
        
    </div>
  </div>

<?php

    // include("../../private/required/admin/side_menu.php");
    include("../../private/required/admin/mobile_nav.php");
    include("../../private/required/admin/admin_footer.php");
?>