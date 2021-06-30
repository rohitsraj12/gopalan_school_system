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
                        <h3 class="animated fadeInLeft">Class Test</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Class test
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-8">
                  <div class="panel">
                    <div class="panel-heading">
                        <h3>Upcoming Class Test</h3>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table">
                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Date</th>
                                    <th>Class Room</th>
                                    <th>Subject</th>
                                    <!-- <th>Emp Id</th> -->
                                    <th>Edit Profile</th>
                                    <th>View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>22/07/2021</td>
                                        <td>4th std - B</td>
                                        <td>Maths</td>
                                        <!-- <td></td> -->
                                        <td><a href="update_teacher_profile.php?id=">update test</a></td>
                                        <td><a href="view_teacher_profile.php?id=">view details</a></td>
                                    </tr>
                                    <tr>
                                        <td>27/07/2021</td>
                                        <td>8th std - B</td>
                                        <td>Maths</td>
                                        <!-- <td></td> -->
                                        <td><a href="update_teacher_profile.php?id=">update test</a></td>
                                        <td><a href="view_teacher_profile.php?id=">view details</a></td>
                                    </tr>
                                    <tr>
                                        <td>29/07/2021</td>
                                        <td>6th std - B</td>
                                        <td>Maths</td>
                                        <!-- <td></td> -->
                                        <td><a href="update_teacher_profile.php?id=">update test</a></td>
                                        <td><a href="view_teacher_profile.php?id=">view details</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
              </div>

                <div class="col-md-4">
                    <div class="panel box-v1">
                       
                    <div class="panel-heading">
                        <h3>Create New</h3>
                    </div>
                        <div class="panel-body text-center">
                        
                            <h1>
                                Create New class test
                            </h1>
                            <hr/>

                            

                            <p>
                                <button class="btn btn-danger box-shadow-none" href="take_attendance.php"  data-toggle="modal" data-target="#myModal">ceate new test</button>
                            </p>
                        </div>
                    </div>
                </div>
                
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Past Class Test</h3>
                        </div>
                        <div class="panel-body">
                            <div class="responsive-table">
                                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Date</th>
                                        <th>Class Room</th>
                                        <th>Subject</th>
                                        <!-- <th>Emp Id</th> -->
                                        <th>Edit Profile</th>
                                        <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>22/06/2021</td>
                                            <td>4th std - B</td>
                                            <td>Maths</td>
                                            <!-- <td></td> -->
                                            <td><a href="update_teacher_profile.php?id=">update exam result</a></td>
                                            <td><a href="view_teacher_profile.php?id=">view details</a></td>
                                        </tr>
                                        <tr>
                                            <td>27/06/2021</td>
                                            <td>8th std - B</td>
                                            <td>Maths</td>
                                            <!-- <td></td> -->
                                            <td><a href="update_teacher_profile.php?id=">update exam result</a></td>
                                            <td><a href="view_teacher_profile.php?id=">view details</a></td>
                                        </tr>
                                        <tr>
                                            <td>29/06/2021</td>
                                            <td>6th std - B</td>
                                            <td>Maths</td>
                                            <!-- <td></td> -->
                                            <td><a href="update_teacher_profile.php?id=">update exam result</a></td>
                                            <td><a href="view_teacher_profile.php?id=">view details</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
          <!-- end: content -->




        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Class Test</h4>
                    </div>
                    <form class="cmxform" id="signupForm" method="get" action="">
                        <div class="modal-body">
                            <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_firstname" name="validate_firstname" required>
                                    <span class="bar"></span>
                                    <label>Subject</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" required>
                                    <span class="bar"></span>
                                    <label>Class</label>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="date" class="form-text" id="validate_username" name="validate_username" required>
                                    <span class="bar"></span>
                                    <!-- <label>Date</label> -->
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_email" name="validate_email" required>
                                    <span class="bar"></span>
                                    <label>Section</label>
                                </div>
                            </div>                   
                            <!-- <div class="col-md-12">
                                <div class="form-group form-animate-checkbox">
                                    <input type="checkbox" class="checkbox"  id="validate_agree" name="validate_agree">
                                    <label>Please agree to our policy</label>
                                </div>
                            </div> -->
                        </div>

                        <div class="modal-footer">
                            
                            <!-- <input class="submit btn btn-danger"> -->
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                        </div>
                    
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<?php
    include("../../../private/required/teacher/mobile_nav.php");
    include("../../../private/required/teacher/teacher_footer.php");
?>