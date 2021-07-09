<?php
 // admin Profile details

  session_start();
  if(!isset($_SESSION["emp_id"])){
      header('location: ../../admin_login.php');
  }
  $id = $_SESSION['emp_id'];
  $page_title = "Admin Profile Details";

  include('../../private/config/db_connection/db_connect.php');
  include('../../private/config/config.php');


  $query = "SELECT * FROM admins WHERE emp_id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $full_name  = $row['first_name'] . " " . $row['last_name'];

  include('../../private/required/admin/admin_header.php');
?>

  <!-- start: Content -->
  <div id="content" class="profile-v1">
    <div class="col-md-12 col-sm-12 profile-v1-wrapper top">
      <div class="col-md-10 profile-v1-cover-wrap" style="padding-right:0px;">

        <div class="profile-v1-pp">
          <img src="<?php if(empty($teacher_row['profile_image'])) { echo base_url() .'img/teacher/avatar.jpg';}else { echo base_url() .'$teacher_row["profile_image"]';}?>"/>
          <h2><?php echo $full_name; ?></h2>
          <a href="update_teacher_profile.php?id=<?php echo $row['emp_id'];?>" class="btn btn-danger">Update Profile</a>
        </div>

        <div class="col-md-12 profile-v1-cover">
          <img src="<?php base_url();?>img/bg1.jpg" class="img-responsive">
        </div>
      </div>
      <!-- <div class="col-md-2 col-sm-12 padding-0 profile-v1-right">
          <div class="col-md-6 col-sm-4 profile-v1-right-wrap padding-0">
            <div class="col-md-12 padding-0 sub-profile-v1-right text-center sub-profile-v1-right1">
                <h1>51K</h1>
                <p>Followers</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-4 profile-v1-right-wrap padding-0">
              <div class="col-md-12 sub-profile-v1-right text-center sub-profile-v1-right2">
                  <h1>609</h1>
                  <p>Following</p>
              </div>
          </div>
          <div class="col-md-12 col-sm-4 profile-v1-right-wrap padding-0">
              <div class="col-md-12 sub-profile-v1-right text-center sub-profile-v1-right3">
                <h1>82001</h1>
                <p>Post</p>
              </div>
          </div>
      </div> -->
    </div>
    <!-- <div class="col-md-12 col-sm-12 profile-v1-body">
        
    </div> -->
    <div class="col-md-8">
      <div class="panel">
        <div class="panel-heading bg-secondary border-none">
          <h4>Admin Profile details</h4>
        </div>
        <div class="panel-body">
          <div class="panel-body text-capitalize">
            <dl class="dl-horizontal">
              <dt>Full Name</dt>
              <dd><?php echo $full_name ?></dd>
              </br>

              <dt>Employee Id</dt>
              <dd><?php echo $row['emp_id']?></dd>
              </br>

              <dt>Email ID</dt>
              <dd  class="text-lowercase"><?php echo $row['emp_email']?></dd>
              </br>

              <dt>Phone Number</dt>
              <dd  class="text-lowercase"><?php echo $row['phone']?></dd>
              
              </br>

              <dt>Admin Status</dt>
              <dd><?php if($row['emp_status'] == 1){ echo "Active";} ?></dd>
              </br>

            </dl>
          </div>
        </div>
        <!-- <div class="panel-footer bg-white border-none">
            <center>
              <input type="button" value="download as pdf" class="btn btn-danger box-shadow-none"/>
            </center>
        </div> -->
      </div>
    </div>
  </div>
  <!-- end: content -->

<?php

  // include("../../private/required/admin/side_menu.php");
  include("../../private/required/admin/mobile_nav.php");
  include("../../private/required/admin/admin_footer.php");
?>