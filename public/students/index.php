<?php

    session_start();

    if(!isset($_SESSION["student_user_id"])){
        header('location: ../../student_login.php');
    }
    $page_title = "Student Home";

    include('../../private/config/db_connection/db_connect.php');
    include('../../private/config/config.php');

    $id = $_SESSION['id'];
    // $id = 2;

    // echo $id;
    // $query = "SELECT * FROM students WHERE student_id='$id'";
    $query = "SELECT students.*, class_rooms.*, class_sections.* FROM students
            JOIN class_rooms
                ON class_rooms.class_id = students.class_id
            JOIN class_sections
                ON class_sections.section_id = students.section_id
             WHERE student_id='$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "failed";
    } 

    $row = mysqli_fetch_assoc($result);
    $full_name  = $row['first_name'];

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
                    <dd><?php echo $row['class_name'] . " [" . $row['section_name'] . " - Section]";?></dd>
                  </br>

                </dl>

                <div class="text-center">

                    <a href="update_teacher_profile.php?id=<?php echo $row['student_user_id'];?>" class="btn btn-danger">Update Details</a>
                
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
             <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <a href="<?php echo base_url() . 'students/attendance.php'; ?>" class="text-dakr-gray">
                            <div class="col-md-8 col-sm-8 col-xs-8 text-left padding-0">
                                <h4 class="text-left text-dakr-gray">Attendance Record</h4>
                            </div>

                            <!-- <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                </h4>
                            </div> -->

                            </div>
                            <div class="panel-body text-center">
                            <h1>95%</h1>
                            <hr/>
                            <p>Present</p>
                       
                    </div> </a>
                </div>
             </div>
             <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center padding-0">
                            <h4 class="text-left">Exam Reports</h4>
                        </div>
                        <!-- <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <h4>
                            <span class="icon-basket-loaded icons icon text-right"></span>
                            </h4>
                        </div> -->
                    </div>
                    <div class="panel-body text-center">
                        <h1>2</h1>
                        <hr/>
                            <p>Semister</p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">Notice Board</h4>
                        </div>
                        <!-- <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <h4>
                            <span class="icon-basket-loaded icons icon text-right"></span>
                            </h4>
                        </div> -->
                        </div>
                        <div class="panel-body text-center">
                        <h1>21</h1>
                        <hr/>
                        <p>Notices</p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                 <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                    <h4 class="text-left">Home work</h4>
                                </div>
                                <!-- <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                    <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                    </h4>
                                </div> -->
                                </div>
                                <div class="panel-body text-center">
                                <h1>40</h1>
                                <hr/>
                                <p>New Orders</p>
                                </div>
                            </div>
             </div>
             <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">School Callender</h4>
                        </div>
                        <!-- <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <h4>
                            <span class="icon-basket-loaded icons icon text-right"></span>
                            </h4>
                        </div> -->
                    </div>
                    <div class="panel-body text-center">
                        <h1>2</h1>
                        <hr/>
                        <p>Holidays</p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">Fee Details</h4>
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
