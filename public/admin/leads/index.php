<?php
 // teacher list or all teacher record

  session_start();
  if(!isset($_SESSION["emp_id"])){
      header('location: ../../admin_login.php');
  }
  $id = $_SESSION['emp_id'];
  $page_title = "Leads";

  include('../../../private/config/db_connection/db_connect.php');
  include('../../../private/config/config.php');

  // admin query for fetch admin details
  $query      = "SELECT * FROM admins WHERE emp_id='$id'";
  $result     = mysqli_query($conn, $query);
  $row        = mysqli_fetch_assoc($result);

  include('../../../private/required/admin/admin_header.php');
?>
  
  <!-- start: Content -->
  <div id="content">
    <div class="panel box-shadow-none content-header">
      <div class="panel-body">
        <div class="col-md-12">
          <h3 class="animated fadeInLeft">School Leads</h3>
          <p class="animated fadeInDown">
            Admin <span class="fa-angle-right fa"></span> Leads
          </p>

          <ul id="tabs-demo7" class="nav nav-tabs nav-tabs-v1" role="tablist" class="nav navbar-nav">
            <li><a href="#all" id="tabs-demo7-1" role="tab" data-toggle="tab" aria-expanded="true" class="active">All School Enquiry</a></li>
            <li><a href="#gis" role="tab" id="tabs-demo7-2" data-toggle="tab" aria-expanded="false">GIS Enqiry</a></li>
            <li><a href="#gns" role="tab" id="tabs-demo7-3" data-toggle="tab" aria-expanded="false">GNS Enquiry</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="tabsDemo7Content" class="tab-content tab-content-v7 col-md-12">
      
      <div role="tabpanel" class="tab-pane fade active in" id="all" aria-labelledby="tabs-demo7-area1">
        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Gopalan Foundation Leads</h3></div>
              <div class="panel-body">
                  <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Source Name</th>
                          <th>Details</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                          // fetch all teachers record from database and show on table
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

                        //   while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        
                          <tr>
                            <td>10/07/2021</td>
                            <td>Shreya</td>
                            <td>sreya@gmai.com</td>
                            <td>923423348</td>
                            <td>GIS Contact form</td>
                            <td><a href="">view details</a></td>
                          </tr>
                        
                        <tr>
                          <td>11/07/2021</td>
                          <td>harleen Singh</td>
                          <td>harleen@gmai.com</td>
                          <td>123234228</td>
                          <td>GNS Landing Page</td>
                          <td><a href="">view details</a></td>
                        </tr>
                        
                        <tr>
                          <td>9/07/2021</td>
                          <td>Karan</td>
                          <td>karan@gmai.com</td>
                          <td>212232348</td>
                          <td>GIS Landinga Page</td>
                          <td><a href="">view details</a></td>
                        </tr>

                        <?php
                        //   }
                        ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>  
      </div>

      <div  role="tabpanel" class="tab-pane fade in" id="gis" aria-labelledby="tabs-demo7-area2">
        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Gopalan International School Teachers List</h3></div>
              <div class="panel-body">
                <div class="responsive-table">
                  <table id="datatables-example" class="other-table table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>School Name</th>
                        <th>Class Teacher</th>
                        <th>Emp Id</th>
                        <th>Edit Profile</th>
                        <th>View Details</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                        // fetch all teachers record from database and show on table
                        $query = "SELECT teachers.*, schools.*, teacher_positions.*, class_rooms.*, class_sections.* FROM teachers
                        JOIN schools
                            ON schools.school_id = teachers.school_id
                        JOIN teacher_positions
                            ON teacher_positions.position_id = teachers.position_id
                        JOIN class_rooms
                            ON class_rooms.class_id = teachers.class_id
                        JOIN class_sections
                            ON class_sections.section_id = teachers.section_id
                        WHERE teachers.school_id = 1
                        ";
                        
                        $result = mysqli_query($conn, $query);

                       //   while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        
                          <tr>
                            <td>10/07/2021</td>
                            <td>Shreya</td>
                            <td>sreya@gmai.com</td>
                            <td>923423348</td>
                            <td>GIS Contact form</td>
                            <td><a href="">view details</a></td>
                          </tr>
                        
                            <tr>
                            <td>9/07/2021</td>
                            <td>Karan</td>
                            <td>karan@gmai.com</td>
                            <td>212232348</td>
                            <td>GIS Landinga Page</td>
                            <td><a href="">view details</a></td>
                            </tr>

                        <?php
                        //   }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane fade in" id="gns" aria-labelledby="tabs-demo7-area3">
        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Gopalan National School Teachers List</h3></div>
              <div class="panel-body">
                  <div class="responsive-table">
                    <table id="datatables-example" class="other-table table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>School Name</th>
                          <th>Class Teacher</th>
                          <th>Emp Id</th>
                          <th>Edit Profile</th>
                          <th>View Details</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                          // fetch all teachers record from database and show on table
                          $query = "SELECT teachers.*, schools.*, teacher_positions.*, class_rooms.*, class_sections.* FROM teachers
                          JOIN schools
                              ON schools.school_id = teachers.school_id
                          JOIN teacher_positions
                              ON teacher_positions.position_id = teachers.position_id
                          JOIN class_rooms
                              ON class_rooms.class_id = teachers.class_id
                          JOIN class_sections
                              ON class_sections.section_id = teachers.section_id 
                          WHERE teachers.school_id = 2
                          ";
                          
                          $result = mysqli_query($conn, $query);

                        //   while($rows = mysqli_fetch_assoc($result)){
                         ?>
                        
                        
                        <tr>
                          <td>11/07/2021</td>
                          <td>harleen Singh</td>
                          <td>harleen@gmai.com</td>
                          <td>123234228</td>
                          <td>GNS Landing Page</td>
                          <td><a href="">view details</a></td>
                        </tr>
                        
                       


                        <?php
                        //   }
                        ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>     
    </div>

    
  </div>
  <!-- end: content -->
<?php
  // include("../../../private/required/admin/side_menu.php");
  include("../../../private/required/admin/mobile_nav.php");
  include("../../../private/required/admin/admin_footer.php");
?>