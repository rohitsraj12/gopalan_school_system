<?php
 // add new student record
  session_start();
  if(!isset($_SESSION["emp_id"])){
      header('location: ../../admin_login.php');
  }
  $id           = $_SESSION['emp_id'];
  $page_title   = "Create New Student";

  include('../../../private/config/db_connection/db_connect.php');
  include('../../../private/config/config.php');

  $query        = "SELECT * FROM admins WHERE emp_id='$id'";
  $result       = mysqli_query($conn, $query);
  $row          = mysqli_fetch_assoc($result);

  include('../../../private/required/admin/admin_header.php');

?>

<div class="container-fluid mimin-wrapper">

  <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
          <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Create Student Profile</h3>
                <p class="animated fadeInDown">
                  Students <span class="fa-angle-right fa"></span> Create Student Profile
                </p>
            </div>
          </div>
        </div>
        <div class="form-element">
            
            <div class="col-md-12 padding-0">
            <div class="col-md-4">
                <div class="col-md-12 panel" style="padding-top:30px;padding-bottom:30px;">
                <div class="col-md-12 panel-body">
                <div class="col-md-8 padding-0">
                    <center><div type="text" id="noui-range" style="height:400px;"></div>
                    </center>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-8">
          <div class="col-md-12 panel">
            <div class="col-md-12 panel-heading">
              <h4>Create New Student Account</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
              <div class="col-md-12">
                <form class="cmxform" id="signupForm" method="POST" action="include/create_student_account.inc.php">
                  <div class="col-md-6">

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_firstname" name="first_name" required>
                      <span class="bar"></span>
                      <label>First Name</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_lastname" name="last_name" required>
                      <span class="bar"></span>
                      <label>Last Name</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_emp_id" name="user_id" required>
                      <span class="bar"></span>
                      <label>Admission ID</label>
                    </div>
                    
                    <!-- <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text mask-phone" required>
                        <span class="bar"></span>
                        <label>Telephone</label>
                      </div> -->

                      <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>Class</p>
                        
                        <select class="form-control" id="validate_position" name="grade" required>
                            <option value="no_value">Select Class Room</option>
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

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>School</p>
                        
                        <select class="form-control" id="validate_position" name="school" required>
                            <option value="no_value">Select School</option>
                            <?php

                                    // school_all(teacher_positions);

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
                    
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="password" class="form-text" id="validate_password" name="password" required>
                      <span class="bar"></span>
                      <label>Password</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="password" class="form-text" id="validate_confirm_password" name="re_password" required>
                      <span class="bar"></span>
                      <label>Confirm Password</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="tel" class="form-text" id="validate_email" name="phone" required>
                      <span class="bar"></span>
                      <label>Phone Number</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>Class Section</p>
                        
                        <select class="form-control" id="validate_position" name="section" required>
                            <option value="no_value">Select Class Section</option>
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

                  <div class="col-md-12">
                      <!-- <div class="form-group form-animate-checkbox">
                          <input type="checkbox" class="checkbox"  id="validate_agree" name="agree">
                          <label>Please agree to our policy</label>
                      </div> -->
                      <input class="submit btn btn-danger" type="submit" name="create_profile" value="Submit">
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
  include("../../../private/required/teacher/teacher_footer.php");
?>