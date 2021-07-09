<?php
 // teacher profile details page

    session_start();
    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }
    $id           = $_SESSION['emp_id'];
    $page_title   = "View Teachers";

    include('../../../private/config/db_connection/db_connect.php');
    include('../../../private/config/config.php');

    $query        = "SELECT * FROM admins WHERE emp_id='$id'";
    $result       = mysqli_query($conn, $query);
    $row          = mysqli_fetch_assoc($result);

    include('../../../private/required/admin/admin_header.php');

    // fetch teacher record query
    $capture_emp_id     = $_GET['id'];
    $teacher_query      = "SELECT teachers.*, schools.*, teacher_positions.*, class_rooms.*, class_sections.* FROM teachers
                            JOIN schools
                              ON schools.school_id = teachers.school_id
                            JOIN teacher_positions
                              ON teacher_positions.position_id = teachers.position_id
                            JOIN class_rooms
                              ON class_rooms.class_id = teachers.class_id
                            JOIN class_sections
                              ON class_sections.section_id = teachers.section_id
                            WHERE emp_id = '$capture_emp_id'";
    $teacher_result     = mysqli_query($conn, $teacher_query);
    $teacher_row        = mysqli_fetch_assoc($teacher_result);
    $teacher_full_name  = $teacher_row['first_name'] . " " . $teacher_row['last_name'];
?>
  <!-- start: Content -->
  <div id="content" class="profile-v1">

    <?php
      /*
        After updating teacher profile show success message
        capturing from get method
      */ 

      if(!empty($_GET['message'])){
        ?>

          <div class="col-md-12">
            <div class="alert alert-success col-md-12 col-sm-12  alert-icon alert-dismissible fade in" role="alert">
              <div class="col-md-2 col-sm-2 icon-wrapper text-center">
                <span class="fa fa-check fa-2x"></span>
              </div>
              <div class="col-md-10 col-sm-10">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p><strong>Successfully updated Teacher profile!</strong></p>
              </div>
            </div>
          </div>

        <?php
      }
    ?>
    
     <div class="col-md-12 col-sm-12 profile-v1-wrapper top">
        <div class="col-md-12 profile-v1-cover-wrap" style="padding-right:0px;">

            <div class="profile-v1-pp">
              <img src="<?php if(empty($teacher_row['profile_image'])) { echo '../../img/teacher/avatar.jpg';}else { echo '$teacher_row["profile_image"]';}?>"/>
              <h2><?php echo $teacher_full_name; ?></h2>
              <a href="update_teacher_profile.php?id=<?php echo $teacher_row['emp_id'];?>" class="btn btn-danger">Update Profile</a>
            </div>

            <div class="col-md-12 profile-v1-cover">
              <img src="../../img/bg1.jpg" class="img-responsive">
            </div>
        </div>
        <!-- <div class="col-md-3 col-sm-12 padding-0 profile-v1-right">
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
     <div class="col-md-12 col-sm-12 profile-v1-body">
        
      </div>
      <div class="col-md-8">
          <div class="panel">
            <div class="panel-heading bg-secondary border-none">
              <h4>Teacher Profile details</h4>
            </div>
            <div class="panel-body">
              <div class="panel-body text-capitalize"">
                <dl class="dl-horizontal">
                  <dt>Teachr Name</dt>
                  <dd><?php echo $teacher_full_name ?></dd>
                  </br>

                  <dt>Employee Id</dt>
                  <dd><?php echo $teacher_row['emp_id']?></dd>
                  </br>

                  <dt>Email</dt>
                  <dd  class="text-lowercase"><?php echo $teacher_row['email']?></dd>
                  </br>

                  <dt>Phone Number</dt>
                  <dd  class="text-lowercase"><?php echo $teacher_row['phone']?></dd>
                  </br>

                  <dt>School Name</dt>
                  <dd><?php echo $teacher_row['school_name']?></dd>
                  </br>

                  <dt>Class Teacher</dt>
                  <dd><?php echo $teacher_row['class_name'] . " [Section - " . $teacher_row['section_name'] . "]";?></dd>
                  </br>

                  <dt>Teacher Status</dt>
                  <dd><?php if($teacher_row['teacher_status'] == 1){ echo "Active";} ?></dd>
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
   
  </div>
  <!-- end: content -->
  

<?php

  // include("../../../private/required/admin/side_menu.php");
  include("../../../private/required/admin/mobile_nav.php");
  include("../../../private/required/admin/admin_footer.php");
?>