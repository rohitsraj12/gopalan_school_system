<?php
 // add new teacher in teacher record
    session_start();

    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }

    $page_title = "Create New Student";

    include('../../../private/config/db_connection/db_connect.php');
    // include('include/school_name.php');
    include('../../../private/config/config.php');

    $id = $_SESSION['emp_id'];

    $query = "SELECT * FROM admins WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];

    include('../../../private/required/admin/admin_header.php');

?>

<div class="container-fluid mimin-wrapper">

  <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
          <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Create Notice</h3>
                <p class="animated fadeInDown">
                  School <span class="fa-angle-right fa"></span> Create Notice Board
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
              <h4>Create New Notice Board</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
              <div class="col-md-12">
                <form class="cmxform" id="signupForm" method="POST" action="include/create_notice.inc.php"  enctype="multipart/form-data" >
                  <div class="col-md-6">

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_firstname" name="title" required>
                      <span class="bar"></span>
                      <label>Title</label>
                    </div>

                      <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>School Name</p>
                        
                        <select class="form-control" id="validate_position" name="school" required>
                            <option value="no_value">Select School</option>
                            <?php

                                    // school_all(teacher_positions);

                                    $query = "SELECT * FROM schools";
                                    $result = mysqli_query($conn, $query);

                                    while($rows = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $rows['school_id'];?>"><?php echo "Grade" . $rows['school_name'];?></option>
                                    
                            <?php
                                }
                            ?>
                        </select>
                    </div>  
                    
                    

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <div class="input-group fileupload-v1">
                            <input type="file" name="file" class="fileupload-v1-file hidden"/>
                            <input type="text" class="form-control fileupload-v1-path" placeholder="File Path..." disabled>
                            <span class="input-group-btn">
                              <button class="btn fileupload-v1-btn" type="button"><i class="fa fa-folder"></i> Choose File</button>
                            </span>
                        </div><!-- /input-group -->
                            <p>Only png, jpeg, jpg, docx, dotx, pdf, ppt, pptx files</p>
                    </div>
                    

                    
                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="date" class="form-text" id="validate_lastname" name="date" required>
                      <span class="bar"></span>
                      <!-- <label>Last Name</label> -->
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>Notice Board Category</p>
                        
                        <select class="form-control" id="validate_position" name="category" required>
                            <option value="no_value">Select Categoty</option>
                            <?php

                                    // school_all(teacher_positions);

                                    $query = "SELECT * FROM notice_categories";
                                    $result = mysqli_query($conn, $query);

                                    while($rows = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $rows['category_id'];?>"><?php echo $rows['category_name'];?></option>
                                    
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
                      <input class="submit btn btn-danger" type="submit" name="create_notice" value="Submit">
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