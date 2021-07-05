<?php

    session_start();

    if(!isset($_SESSION["student_user_id"])){
        header('location: ../../admin_login.php');
    }
    $page_title = "Attendance Details";

    include('../../private/config/db_connection/db_connect.php');
    include('../../private/config/config.php');

    $id = $_SESSION['id'];
    // $id = 2;

    // echo $id;

    $query = "SELECT students.*, class_rooms.*, class_sections.* FROM students
            JOIN class_rooms
                ON class_rooms.class_id = students.class_id
            JOIN class_sections
                ON class_sections.section_id = students.section_id
            WHERE student_id='$id'";
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
          <?php
            include_once 'include/aside_profile.php';
          ?>
        </div>
     </div>

     <div class="col-md-7">
         <div class="row">
           

         <div class="col-md-12">
                
                <div class="panel">
                      <div class="panel-heading"><h3>Absent Dates</h3></div>
                      <div class="panel-body">
                        <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Number of Absent</th>
                            <th>Date of Absent</th>
                            <th>Note</th>
                            <!-- <th>Emp Id</th> -->
                            <th>Update Note</th>
                            <!-- <th>View Details</th> -->
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                            // $query = "SELECT * FROM teachers";

                            // $query = "SELECT teachers.*, schools.*, teacher_positions.* FROM teachers
                            //   JOIN schools
                            //       ON schools.school_id = teachers.school_id
                            //   JOIN teacher_positions
                            //       ON teacher_positions.position_id = teachers.position_id";

                              $query = "SELECT teachers.*, schools.*, teacher_positions.*, class_rooms.*, class_sections.* FROM teachers
                              JOIN schools
                                  ON schools.school_id = teachers.school_id
                              JOIN teacher_positions
                                  ON teacher_positions.position_id = teachers.position_id
                              JOIN class_rooms
                                  ON class_rooms.class_id = teachers.class_id
                              JOIN class_sections
                                  ON class_sections.section_id = teachers.section_id";
                              
                              $result = mysqli_query($conn, $query);

                              // $row_num = mysqli_num_rows($result);

                              while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            
                              <tr>
                              <td><?php echo  1;?></td>

                                <td><?php echo '10/06/2021';?></td>
                                <td><?php echo "student can write the reason";
                                
                                ?></td>
                                <td><a href="update_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">update note</a></td>
                                <!-- <td><a href="view_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">view details</a></td> -->
                              </tr>

                            <?php
                              }
                            ?>
                          </tbody>
                          </table>
                        </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel">
                       <div class="panel-heading-white panel-heading">
                          <h4>Monthly Attendance Record</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                             <canvas id="bar" class="bar-chart"></canvas>
                            </div>
                        </div>
                  </div>
            </div>
             <!-- <div class="col-md-6">
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
             </div> -->
             
             <!-- <div class="col-md-4">
                 <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">Absent Dates</h4>
                        </div>
                        </div>
                        <div class="panel-body text-center">
                            <h1>4</h1>
                            <hr/>
                        <p>Last Month</p>
                    </div>
                </div>
             </div> -->
         </div>
     </div>
   
  </div>
  <!-- end: content -->






  <?php
    include("../../private/required/student/student_footer.php");
?>
