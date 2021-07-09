<?php
 // add new teacher in teacher record
    session_start();
    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }
    $id               = $_SESSION['emp_id'];
    $page_title       = "Update Teacher Details";

    include('../../../private/config/db_connection/db_connect.php');
    include('../../../private/config/config.php');

    $query = "SELECT * FROM admins WHERE emp_id= '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    include('../../../private/required/admin/admin_header.php');
    
    // fetch teacher record query
    $capture_emp_id   = $_GET['id'];
    $teacher_query    = "SELECT teachers.*, schools.*, teacher_positions.*, class_rooms.*, class_sections.* FROM teachers
                        JOIN schools
                          ON schools.school_id = teachers.school_id
                        JOIN teacher_positions
                          ON teacher_positions.position_id = teachers.position_id
                        JOIN class_rooms
                          ON class_rooms.class_id = teachers.class_id
                        JOIN class_sections
                          ON class_sections.section_id = teachers.section_id
                        WHERE emp_id = '$capture_emp_id'";
                      
    $teacher_result   = mysqli_query($conn, $teacher_query);
    $teacher_row      = mysqli_fetch_assoc($teacher_result);

    $teacher_full_name = $teacher_row['first_name'] . " " . $teacher_row['last_name'];
    $tec_id            = $teacher_row['teacher_id'];
?>

<div class="container-fluid mimin-wrapper">

  <!-- start: Content -->
  <div id="content">
      <div class="panel box-shadow-none content-header">
        <div class="panel-body">
          <div class="col-md-12">
              <h3 class="animated fadeInLeft">Update Teacher Profile</h3>
              <p class="animated fadeInDown">
                Teachers <span class="fa-angle-right fa"></span> Update Teacher Profile
              </p>
          </div>
        </div>
      </div>
      <div class="form-element">
          <div class="col-md-12 padding-0">
              <div class="col-md-4">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                          <h4>Teacher Account Details</h4>
                      </div>

                      <div class="col-md-12 panel-body">
                            <div class="profile-v1-pp text-center">
                            <img style="width: 150px; margin: 0 auto" src="../../img/teacher/avatar.jpg"/>
                            <h2 class="text-capitalize"><?php echo $teacher_full_name . " " . $tec_id; ?></h2>
                          </div>
                          <!-- <div class="col-md-8 padding-0">
                              <center>
                                  <div type="text" id="noui-range" style="height:400px;">

                                  </div>
                              </center>
                          </div> -->

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

                              <dt>School Name</dt>
                              <dd><?php echo $teacher_row['school_name']?></dd>
                              </br>

                              <dt>Class Teacher</dt>
                              <dd><?php echo $teacher_row['class_name'] . " [Section - " . $teacher_row['section_name'] . "]";?></dd>

                            </dl>
                          </div>
                          
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                          <h4>Update Teacher Account</h4>
                      </div>
                      <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                          <form class="cmxform" id="signupForm" method="POST" action="include/update_teacher_account.inc.php">
                            <div class="col-md-6">

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_firstname" name="first_name" value="">
                                    <span class="bar"></span>
                                    <label>Firstname</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_lastname" name="last_name">
                                <span class="bar"></span>
                                <label>Lastname</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_emp_id" name="emp_id">
                                <span class="bar"></span>
                                <label>Emp ID</label>
                                </div>
                                
                                <!-- <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text mask-phone" required>
                                    <span class="bar"></span>
                                    <label>Telephone</label>
                                </div> -->

                                <div class="form-group form-animate-text" style="margin-top:40px !important;  margin-bottom: 0">
                                    <p>School Name</p>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                    
                                    <select class="form-control" id="validate_position" name="school_name" required>
                                            <option value="<?php echo $teacher_row['school_id']?>">Select School Name</option>
                                        <?php
                                                $query = "SELECT * FROM schools";
                                                $result = mysqli_query($conn, $query);

                                                while($rows = mysqli_fetch_assoc($result)){
                                        ?>
                                            <option value="<?php echo $rows['school_id'];?>"><?php echo $rows['school_name'];?></option>
                                                
                                        <?php
                                            }
                                        ?>
                                        
                                    </select>
                                </div> 

                                <div class="form-group form-animate-text" style="margin-top:40px !important;  margin-bottom: 0">
                                    <p>Position</p>
                                </div> 
                                <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                    
                                    <select class="form-control" id="validate_position" name="position" required>
                                        <option value="<?php echo $teacher_row['position_id']?>">Select Teacher Position</option>
                                        <?php

                                                // school_all(teacher_positions);

                                                $query = "SELECT * FROM teacher_positions";
                                                $result = mysqli_query($conn, $query);

                                                while($rows = mysqli_fetch_assoc($result)){
                                        ?>
                                            <option value="<?php echo $rows['position_id'];?>"><?php echo $rows['position_name'];?></option>
                                                
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="password" class="form-text" id="validate_password" name="password">
                                <span class="bar"></span>
                                <label>Password</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="password" class="form-text" id="validate_confirm_password" name="re_password">
                                <span class="bar"></span>
                                <label>Confirm Password</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_email" name="email">
                                <span class="bar"></span>
                                <label>Email</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important; margin-bottom: 0">
                                    <p>Teacher Position</p>
                                </div>
                                
                                <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                    
                                    <select class="form-control" id="validate_position" name="grade">
                                        <option value="<?php echo $teacher_row['class_id']?>">Select Class Room</option>
                                        <?php

                                                // school_all(teacher_positions);

                                                $query = "SELECT * FROM class_rooms";
                                                $result = mysqli_query($conn, $query);

                                                while($rows = mysqli_fetch_assoc($result)){
                                        ?>
                                            <option value="<?php echo $rows['class_id'];?>"><?php echo "Grade " . $rows['class_name'];?></option>
                                                
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>   
                                

                                <div class="form-group form-animate-text" style="margin-top:40px !important;  margin-bottom: 0">
                                    <p>Class Section</p>
                                </div>
                                
                                <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                    
                                    <select class="form-control" id="validate_position" name="section" required>
                                        <option value="<?php echo $teacher_row['section_id']?>">Select Class Section</option>
                                        <?php

                                                // school_all(teacher_positions);

                                                $query = "SELECT * FROM class_sections";
                                                $result = mysqli_query($conn, $query);

                                                while($rows = mysqli_fetch_assoc($result)){
                                        ?>
                                            <option value="<?php echo $rows['section_id'];?>"><?php echo "Section " . $rows['section_name'];?></option>
                                                
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>   
                            </div>        
                            
                            <input type="hidden" name="teacher_id" value="<?php echo  $teacher_row['emp_id'];?>">
                            

                          <div class="col-md-12">
                              <!-- <div class="form-group form-animate-checkbox">
                                  <input type="checkbox" class="checkbox"  id="validate_agree" name="agree">
                                  <label>Please agree to our policy</label>
                              </div> -->
                              <input class="submit btn btn-danger" type="submit" name="update_profile" value="Submit">
                          </div>

                      </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </div>
  </div>
  <!-- end: content -->
</div>



<?php
  // include("../../../private/required/admin/side_menu.php");
  include("../../../private/required/admin/mobile_nav.php");
  include("../../../private/required/admin/admin_footer.php");
?>