<?php
 // add new teacher in teacher record
    session_start();
    if(!isset($_SESSION["emp_id"])){
        header('location: ../../teacher_login.php');
    }
    $id = $_SESSION['emp_id'];
    $page_title = "Take Attendance";

    include('../../../private/config/db_connection/db_connect.php');
    include('../../../private/config/config.php');

    $query = "SELECT * FROM teachers WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    // echo $row['first_name'];
    $teacher_id = $row['teacher_id'];
    $teacher_user_id = $row['emp_id'];
    $school_id = $row['school_id'];

    include('../../../private/required/teacher/teacher_header.php');
?>




            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Class Room</h3>
                        <p class="animated fadeInDown">
                          Class Room <span class="fa-angle-right fa"></span> Attendance
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Class Rooms</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Class Rooms</th>
                              <th>Subject</th>
                              <th>Take Attendance</th>
                              <!-- <th></th> -->
                              <th>Notice Board</th>
                              <th>Test Anouncement</th>
                              <th>Homework</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 

// $query  = "SELECT * FROM classes";


                              $query  = "SELECT classes.*, class_rooms.*, class_sections.*, subjects.* FROM classes

                              JOIN class_rooms
                                ON 
                                  class_rooms.class_id = classes.class_room_id
                                  
                              JOIN class_sections
                                ON 
                                  class_sections.section_id = classes.class_section_id
                                  
                              JOIN subjects
                                ON 
                                  subjects.subject_id = classes.subject_id
                                  
                              WHERE teacher_user_id = '$teacher_user_id' AND school_id = $school_id";
                              
                              $result = mysqli_query($conn, $query);

                              // $row_num = mysqli_num_rows($result);

                              while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            
                              <tr>
                                <td><?php echo $rows['class_name'] . " - " . $rows['section_name'];?></td>
                                <td><?php echo $rows['subject_name'];?></td>
                                <td><a class="btn btn-round btn-primary" href="<?php base_url();?>dashboard/attendance/take_attendance.php?class=<?php echo $rows['class_room_id'];?>&section=<?php echo $rows['section_id'];?>">take attendance</a></td>
                                <!-- <td><?php echo $rows['student_user_id'];?></td> -->
                                <td><a href="update_students_profile.php?id=<?php // echo $rows['student_user_id'];?>">update profile</a></td>
                                <td><a href="view_student_profile.php?id=<?php // echo $rows['student_user_id'];?>">view details</a></td>
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