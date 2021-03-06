<?php
 // teacher list or all teacher record

  session_start();
  if(!isset($_SESSION["emp_id"])){
      header('location: ../../admin_login.php');
  }
  $id = $_SESSION['emp_id'];
  $page_title = "View All School Teachers";

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
          <h3 class="animated fadeInLeft">All School Teacher</h3>
          <p class="animated fadeInDown">
            Admin <span class="fa-angle-right fa"></span> Teachers
          </p>

          <ul id="tabs-demo7" class="nav nav-tabs nav-tabs-v1" role="tablist" class="nav navbar-nav">
            <li><a href="#all" id="tabs-demo7-1" role="tab" data-toggle="tab" aria-expanded="true" class="active">All School Teachers</a></li>
            <li><a href="#gis" role="tab" id="tabs-demo7-2" data-toggle="tab" aria-expanded="false">GIS Teachers</a></li>
            <li><a href="#gns" role="tab" id="tabs-demo7-3" data-toggle="tab" aria-expanded="false">GNS Teachers</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="tabsDemo7Content" class="tab-content tab-content-v7 col-md-12">
      
      <div role="tabpanel" class="tab-pane fade active in" id="all" aria-labelledby="tabs-demo7-area1">
        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>All Teachers of Gopalan Foundation</h3></div>
              <div class="panel-body">
                  <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                              ON class_sections.section_id = teachers.section_id";
                          
                          $result = mysqli_query($conn, $query);

                          while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        
                          <tr>
                            <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td>
                            <td><?php echo $rows['school_name'];?></td>
                            <td>
                            <?php 
                              if($rows['position_name'] == "class teacher"){
                                  echo $rows['class_name']. " [section - " . $rows['section_name'] . "]";
                              }
                            ?></td>
                            <td><?php echo $rows['emp_id'];?></td>
                            <td><a href="update_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">update profile</a></td>
                            <td><a href="view_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">view details</a></td>
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

                        while($rows = mysqli_fetch_assoc($result)){
                      ?>
                      
                        <tr>
                          <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td>
                          <td><?php echo $rows['school_name'];?></td>
                          <td>
                          <?php 
                            if($rows['position_name'] == "class teacher"){
                                echo $rows['class_name']. " [section - " . $rows['section_name'] . "]";
                            }
                          ?></td>
                          <td><?php echo $rows['emp_id'];?></td>
                          <td><a href="update_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">update profile</a></td>
                          <td><a href="view_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">view details</a></td>
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

                          while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        
                          <tr>
                            <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td>
                            <td><?php echo $rows['school_name'];?></td>
                            <td>
                            <?php 
                              if($rows['position_name'] == "class teacher"){
                                  echo $rows['class_name']. " [section - " . $rows['section_name'] . "]";
                              }
                            ?></td>
                            <td><?php echo $rows['emp_id'];?></td>
                            <td><a href="update_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">update profile</a></td>
                            <td><a href="view_teacher_profile.php?id=<?php echo $rows['emp_id'];?>">view details</a></td>
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
    </div>

    
  </div>
  <!-- end: content -->
<?php
  // include("../../../private/required/admin/side_menu.php");
  include("../../../private/required/admin/mobile_nav.php");
  include("../../../private/required/admin/admin_footer.php");
?>