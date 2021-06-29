<?php

    // session_start();

    // if(!isset($_SESSION["emp_id"])){
    //     header('location: ../../admin_login.php');
    // }
    $page_title = "Student Home";

    include('../../private/config/db_connection/db_connect.php');
    include('../../private/config/config.php');

    // $id = $_SESSION['student_id'];
    $id = 2;

    // echo $id;

    $query = "SELECT * FROM students WHERE student_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $full_name = $row['first_name'];

    include('../../private/required/student/student_header.php');

    // include('../../private/required/student/student_profile.php');

?>



  <!-- start: Content -->
  <div id="content" class="profile-v1" style="padding-left: 0;">
     <div class="col-md-10 col-sm-10 profile-v1-wrapper top">
        <!-- <div class="col-md-12 profile-v1-cover-wrap" style="padding-right:0px;">

            <div class="profile-v1-pp">
              <img src="<?php if(empty($teacher_row['profile_image'])) { echo base_url() .'img/teacher/avatar.jpg';}else { echo base_url() .'$teacher_row["profile_image"]';}?>"/>
              <h2><?php echo $full_name; ?></h2>
              <a href="update_teacher_profile.php?id=<?php echo $row['emp_id'];?>" class="btn btn-danger">Update Profile</a>
            </div>

            <div class="col-md-12 profile-v1-cover">
              <img src="<?php base_url();?>img/bg1.jpg" class="img-responsive">
            </div>
        </div> -->
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
      <div class="col-md-offset-1 col-md-3" style="padding-top: 10px">
          <div class="panel">
            <div class="panel-heading bg-amber border-none text-center">
              <h4>Student details</h4>
            </div>

            <div class="col-md-12 profile-v1-cover-wrap" style="padding-right:0px;">

                <div class="col-md-12 profile-v1 text-center" style="padding-top: 10px">
                    <img style="width: 100px" src="<?php if(empty($row['studdent_img'])) { echo '../img/teacher/avatar.jpg';}else { echo '$teacher_row["student_img"]';}?>"/>
                    <h2><?php echo $full_name; ?></h2>
                </div>
            </div>

            <div class="panel-body">
              <div class="panel-body text-capitalize">
                <dl class="dl-horizontal">
                  <dt>Student Name</dt>
                    <dd><?php echo $row['first_name']. " " . $row['last_name'] ?></dd>
                  </br>

                  <dt>Student Id</dt>
                    <dd><?php echo $row['student_user_id']?></dd>
                  </br>

                  <dt>Email</dt>
                    <dd  class="text-lowercase"><?php echo $row['email']?></dd>
                  </br>

                  <dt>Phone Number</dt>
                    <dd  class="text-lowercase"><?php echo $row['phone']?></dd>
                  </br>

                  <dt>Class and division</dt>
                    <dd><?php if($row['class_id'] == 1){ echo "Active";} ?></dd>
                  </br>

                </dl>

                <div class="text-center">

                    <a href="<?php base_url()?>students/" class="btn btn-danger">Home page</a>
                
                </div>

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

     <div class="col-md-7">
         <div class="row">
             <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading-white panel-heading text-center">
                        <h4>Attendance</h4>
                    </div>
                    <div class="panel-body">
                        <div class="text-center" style="padding-bottom: 20px">
                            <span class="attend present">present</span>
                            <span class="attend absent">absent</span>
                        </div>
                        <center>
                        <canvas id="attendance" class="pie-chart"></canvas>
                        </center>
                    </div>
                </div>
             </div>
             
             <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">Marksheet</h4>
                        </div>
                        <!-- <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <h4>
                            <span class="icon-basket-loaded icons icon text-right"></span>
                            </h4>
                        </div> -->
                        </div>
                        <div class="panel-body text-center">
                            <h1>4</h1>
                            <hr/>
                        <p>Last Month</p>
                    </div>
                </div>
             </div>
         </div>
     </div>
   
  </div>
  <!-- end: content -->






  <?php
    include("../../private/required/student/student_footer.php");
?>
