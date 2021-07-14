<?php
 // Take Attendance page
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

    include('../../../private/required/teacher/teacher_header.php');

    // capture from url
    $std = $_GET['class'];
    $div = $_GET['section'];
?>

    <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Take Attendance</h3>
                    <p class="animated fadeInDown">
                        Class Room <span class="fa-angle-right fa"></span> Attendance
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">

                <div class="panel-heading"><h3>Take Attendance of <?php echo $std;?>th Standard</h3></div>
                    <div class="panel-body">
                        <form action="include/attendance.inc.php" method="POST">

                            <input type="hidden" name="teacher_id" value="<?php echo $row['emp_id'];?>">
                            <input type="hidden" name="std" value="<?php echo $std;?>">
                            <input type="hidden" name="div" value="<?php echo $div;?>">

                            <div class="responsive-table">
                            
                                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Take Attendance</th>
                                            <th>Status</th>
                                            <th>Student Note</th>
                                           <!--  <th>Test Anouncement</th>
                                            <th>Homework</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $student_query = "SELECT * FROM students WHERE class_id='$std' AND section_id = '$div'";
                                            $student_result = mysqli_query($conn, $student_query);

                                            while($rows = mysqli_fetch_assoc($student_result)){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $rows['student_id'];?>
                                                <input type="hidden" name="student_id[]" value="<?php echo $rows['student_id'];?>">
                                            </td>
                                            <td>
                                                <?php echo $rows['student_user_id'];?>
                                                <input type="hidden" name="student_user_id[]" value="<?php echo $rows['student_user_id'];?>">
                                                
                                            </td>

                                            <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td>

                                            <td>
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-success attend" data-attendance="present">Present</a>
                                                </div>

                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-danger attend" data-attendance="absent">Absent</a>
                                                </div>

                                                <input type="hidden" name="attendance[]" value="present" checked>
                                            </td>
                                            <td class="status">
                                                Present
                                            </td>
                                            <td><?php echo "Student can leave message"; ?></td>
                                            <!-- <td><a href="view_student_profile.php?id=<?php echo $rows['student_user_id'];?>">view details</a></td> -->
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>

                                

                            </div>
                            <input type="submit" value="save" name="submit">
                        </form>
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