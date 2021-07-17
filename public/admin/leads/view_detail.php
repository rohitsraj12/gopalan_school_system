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

  //get id from url
  $lead_id          = $_GET['id']; 
  $lead_query       = "SELECT leads.*, schools.*, enquiry_sources.*, enquiry_status.* FROM leads
                    JOIN schools
                        ON schools.school_id = leads.school_id
                    JOIN enquiry_sources
                        ON enquiry_sources.source_id = leads.source_id
                    JOIN enquiry_status
                        ON enquiry_status.status_id = leads.status_id
                    WHERE lead_id = $lead_id";

  $lead_result = mysqli_query($conn, $lead_query);
  $lead_row    = mysqli_fetch_assoc($lead_result);
?>

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Subject: <?php echo $lead_row['subject']; ?></h3>
                    <p class="animated fadeInDown">
                        Admin <span class="fa-angle-right fa"></span> <?php echo $lead_row['school_name']; ?>
                    </p>

                    <ul id="tabs-demo7" class="nav nav-tabs nav-tabs-v1" role="tablist" class="nav navbar-nav">
                        <li><a href="#enquiry" id="tabs-demo7-1" role="tab" data-toggle="tab" aria-expanded="true" class="active">Enquiry Details</a></li>
                        <li><a href="#notes" role="tab" id="tabs-demo7-2" data-toggle="tab" aria-expanded="false">Notes</a></li>
                        <li><a href="#other" role="tab" id="tabs-demo7-3" data-toggle="tab" aria-expanded="false">Other Details</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tabsDemo7Content" class="tab-content tab-content-v7 col-md-12">
            <div role="tabpanel" class="tab-pane fade in active" id="enquiry" aria-labelledby="tabs-demo7-area1">
                <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    <div class="panel-heading"><h3>Subject: <?php echo $lead_row['subject']; ?></h3></div>
                    <div class="panel-body">
                        <div class="responsive-table">
                        <table id="" class="other-table table  table-bordered" width="100%" cellspacing="0">

                            <tbody>
                                <tr>
                                    <td>School Fee</td>
                                    <td class="update__data"><span>Rs 20000</span></td>
                                    <td>Expected Closure Date</td>
                                    <td class="update__data"><span>17/08/2021</span></td>
                                    <td>Admission class</td>
                                    <td class="update__data"><span>11th Standard</span></td>

                                </tr>
                                
                                    <tr>
                                    <td>10th Marks</td>
                                    <td class="update__data"><span>546</span></td>
                                    <td>12th Marks</td>
                                    <td class="update__data"><span>Empty</span></td>
                                    <td>Last School Name</td>
                                    <td class="update__data"><span>Kendriya vidhyalaya, Delhi</span></td>
                                    </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade in" id="notes" aria-labelledby="tabs-demo7-area2">
                <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"><h3>Notes</h3></div>
                            <div class="panel-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade in" id="other" aria-labelledby="tabs-demo7-area3">
                <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"><h3>Other Details</h3></div>
                            <div class="panel-body">
                                <div class="responsive-table">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php
                include 'lead_details/personal_detail.php';
            ?>
        </div>
        <div class="col-md-6">
            <?php
                include 'lead_details/quick_update.php';
            ?>
        </div>
    </div>

<?php
  // include("../../../private/required/admin/side_menu.php");
  include("../../../private/required/admin/mobile_nav.php");
  include("../../../private/required/admin/admin_footer.php");
?>