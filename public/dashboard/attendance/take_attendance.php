<?php
 // add new teacher in teacher record
    session_start();
    if(!isset($_SESSION["emp_id"])){
        header('location: ../../teacher_login.php');
    }

    $page_title = "Take Attendance";

    include('../../../private/config/db_connection/db_connect.php');
    // include('include/school_name.php');
    include('../../../private/config/config.php');

    $id = $_SESSION['emp_id'];

    $query = "SELECT * FROM teachers WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];

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
            <form action="">
                <div class="responsive-table">
                
                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Take Attendance</th>
                        <th>Student Note</th>
                        <!-- <th>Notice Board</th>
                        <th>Test Anouncement</th>
                        <th>Homework</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $student_query = "SELECT * FROM students";
                    $student_result = mysqli_query($conn, $student_query);

                    while($rows = mysqli_fetch_assoc($student_result)){
                    ?>
                        <tr>
                        <td><?php echo $rows['student_id'];?></td>
                        <td><?php echo $rows['student_user_id'];?></td>

                        <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td>

                        <td>
                            <div class="col-md-6">
                                <button class="btn btn-success">Present</button>
                            </div>
                            <div class="col-md-6">
                                <button class=" btn btn-danger">Absent</button>
                            </div>

                        </td>
                        <td><?php echo "Student can leave message"; ?></td>
                        <!-- <td><a href="update_students_profile.php?id=<?php echo $rows['student_user_id'];?>">update profile</a></td>
                        <td><a href="view_student_profile.php?id=<?php echo $rows['student_user_id'];?>">view details</a></td> -->
                        </tr>

                        <?php
                        }
                    ?>
                    </tbody>
                </table>
                </div>

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