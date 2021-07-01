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

            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Tables</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Data Tables
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Tables</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>student Id</th>
                          <th>Name</th>
                          <th>School Name</th>
                          <!-- <th>teacher Position</th> -->
                          <th>Edit Profile</th>
                          <th>View Details</th>
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

                            $query = "SELECT students.*, class_rooms.*, class_sections.*, schools.* FROM students
                            JOIN class_rooms
                                ON class_rooms.class_id = students.class_id
                            JOIN class_sections
                                ON class_sections.section_id = students.section_id
                            JOIN schools
                                ON schools.school_id = students.school_id";
                            
                            $result = mysqli_query($conn, $query);

                            // $row_num = mysqli_num_rows($result);

                            while($rows = mysqli_fetch_assoc($result)){
                          ?>
                          
                            <tr>
                              <td><?php echo $rows['student_user_id'];?></td>
                              <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td></td>
                              <td><?php echo $rows['school_name'];?></td>
                              <td><a href="update_student_profile.php?id=<?php echo $rows['student_user_id'];?>">update profile</a></td>
                              <td><a href="view_student_profile.php?id=<?php echo $rows['student_user_id'];?>">view details</a></td>
                            </tr>

                          <?php
                            }
                          ?>
                        </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          <!-- end: content -->



<?php
    include("../../../private/required/teacher/mobile_nav.php");
    include("../../../private/required/teacher/teacher_footer.php");
?>