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

                  <h3 class="animated fadeInLeft">Student Details</h3>
                  
                  <p class="animated fadeInDown">
                    Table <span class="fa-angle-right fa"></span> Data Tables
                  </p>

                  <ul id="tabs-demo4" class="nav nav-tabs nav-tabs-v3" role="tablist">

                    <?php
                      $std_query = "SELECT * FROM class_rooms";

                      // $std_query = "SELECT class_sections.*, class_rooms.* FROM class_sections
                      //   JOIN class_rooms 
                      //     ON class_rooms.class_id = class_sections.class_id";

                      // $std_query = "SELECT ";
                      $std_result = mysqli_query($conn, $std_query);

                      while($rows = mysqli_fetch_assoc($std_result)){
                        ?>

                        <li  role="presentation" class=""><a  href="#tabs-demo4-area<?php echo $rows['class_name'];?>" id="tabs-demo4-<?php echo $rows['class_name'];?>" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $rows['class_name'];?> STD [A - Section]</a></li>
                        
                        <?php
                      }
                    ?>

                  </ul>

                </div>
              </div>
            </div>

            <div class="col-md-12 top-20 padding-0">
              <div class="col-md-12">
                <div id="tabsDemo4Content" class="tab-content tab-content-v3">
                  <div role="tabpanel" class="tab-pane fade active in" id="tabs-demo4-area1" aria-labelledby="tabs-demo4-area1">
                    <div class="panel">
                      <div class="panel-heading"><h3>Student Details</h3></div>
                        <div class="panel-body">
                          <div class="responsive-table">
                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">

                              <thead>
                                <tr>
                                  <th>Register Number Id</th>
                                  <th>Name</th>
                                  <th>phone number</th>
                                  <th>Class Room</th>
                                  <th>Edit Profile</th>
                                  <th>View Details</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php 
                                  // $query = "SELECT * FROM students ORDER BY first_name ASC";
                                    $query = "SELECT students.*, class_rooms.*, class_sections.* FROM students
                                    JOIN class_rooms
                                        ON class_rooms.class_id = students.class_id
                                    JOIN class_sections
                                        ON class_sections.section_id = students.section_id";
                                    $result = mysqli_query($conn, $query);

                                    // $row_num = mysqli_num_rows($result);

                                    if(!$result){
                                      echo "query failed";
                                    } else {

                                    while($rows = mysqli_fetch_assoc($result)){
                                  ?>
                                    <tr>
                                      <td><?php echo $rows['user_id'];?></td>
                                      <td><?php echo $rows['first_name'] . " " . $rows['last_name'];?></td>
                                      <td><?php echo $rows['phone'];?></td>
                                      <td><?php echo $rows['class_name'];?> Standard [<?php echo $rows['section_name'];?> Section]</td>
                                      <td><a href="update_profile.php?id=<?php echo $rows['student_id'];?>">update profile</a></td>
                                      <td><a href="view_profile.php?id=<?php echo $rows['student_id'];?>">view details</a></td>
                                    </tr>
                                  <?php
                                    }}
                                  ?>
                              </tbody>

                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area2" aria-labelledby="tabs-demo4-area2">
                      <p>2</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area3" aria-labelledby="tabs-demo4-area3">
                      <p>3</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area4" aria-labelledby="tabs-demo4-area4">
                      <p>4</p>
                    </div>
                  </div>
                </div>
            </div>
            <!-- end: content -->
              <!-- start: right menu -->
              <div id="right-menu">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#right-menu-user">
                      <span class="fa fa-comment-o fa-2x"></span>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#right-menu-notif">
                      <span class="fa fa-bell-o fa-2x"></span>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#right-menu-config">
                    <span class="fa fa-cog fa-2x"></span>
                    </a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div id="right-menu-user" class="tab-pane fade in active">
                    <div class="search col-md-12">
                      <input type="text" placeholder="search.."/>
                    </div>
                    <div class="user col-md-12">
                      <ul class="nav nav-list">
                        <li class="online">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="gadget">
                            <span class="fa  fa-mobile-phone fa-2x"></span> 
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="away">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="gadget">
                            <span class="fa  fa-desktop"></span> 
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="offline">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="offline">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="online">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="gadget">
                            <span class="fa  fa-mobile-phone fa-2x"></span> 
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="offline">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="online">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="gadget">
                            <span class="fa  fa-mobile-phone fa-2x"></span> 
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="offline">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="offline">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="online">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="gadget">
                            <span class="fa  fa-mobile-phone fa-2x"></span> 
                          </div>
                          <div class="dot"></div>
                        </li>
                        <li class="online">
                          <img src="asset/img/avatar.jpg" alt="user name">
                          <div class="name">
                            <h5><b>Bill Gates</b></h5>
                            <p>Hi there.?</p>
                          </div>
                          <div class="gadget">
                            <span class="fa  fa-mobile-phone fa-2x"></span> 
                          </div>
                          <div class="dot"></div>
                        </li>

                      </ul>
                    </div>
                    <!-- Chatbox -->
                  <div class="col-md-12 chatbox">
                    <div class="col-md-12">
                      <a href="#" class="close-chat">X</a><h4>Akihiko Avaron</h4>
                    </div>
                    <div class="chat-area">
                      <div class="chat-area-content">
                        <div class="msg_container_base">
                          <div class="row msg_container send">
                            <div class="col-md-9 col-xs-9 bubble">
                              <div class="messages msg_sent">
                                <p>that mongodb thing looks good, huh?
                                  tiny master db, and huge document store</p>
                                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                </div>
                              </div>
                              <div class="col-md-3 col-xs-3 avatar">
                                <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                              </div>
                            </div>

                            <div class="row msg_container receive">
                              <div class="col-md-3 col-xs-3 avatar">
                                <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                              </div>
                              <div class="col-md-9 col-xs-9 bubble">
                                <div class="messages msg_receive">
                                  <p>that mongodb thing looks good, huh?
                                    tiny master db, and huge document store</p>
                                    <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                  </div>
                                </div>
                              </div>

                              <div class="row msg_container send">
                                <div class="col-md-9 col-xs-9 bubble">
                                  <div class="messages msg_sent">
                                    <p>that mongodb thing looks good, huh?
                                      tiny master db, and huge document store</p>
                                      <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-xs-3 avatar">
                                    <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                  </div>
                                </div>

                                <div class="row msg_container receive">
                                  <div class="col-md-3 col-xs-3 avatar">
                                    <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                  </div>
                                  <div class="col-md-9 col-xs-9 bubble">
                                    <div class="messages msg_receive">
                                      <p>that mongodb thing looks good, huh?
                                        tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row msg_container send">
                                    <div class="col-md-9 col-xs-9 bubble">
                                      <div class="messages msg_sent">
                                        <p>that mongodb thing looks good, huh?
                                          tiny master db, and huge document store</p>
                                          <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                      </div>
                                      <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                      </div>
                                    </div>

                                    <div class="row msg_container receive">
                                      <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                      </div>
                                      <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_receive">
                                          <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="chat-input">
                                  <textarea placeholder="type your message here.."></textarea>
                                </div>
                                <div class="user-list">
                                  <ul>
                                    <li class="online">
                                      <a href=""  data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <div class="user-avatar"><img src="asset/img/avatar.jpg" alt="user name"></div>
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="offline">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="away">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="online">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="offline">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="away">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="offline">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="offline">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="away">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="online">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="away">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                    <li class="away">
                                      <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                        <img src="asset/img/avatar.jpg" alt="user name">
                                        <div class="dot"></div>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div id="right-menu-notif" class="tab-pane fade">

                              <ul class="mini-timeline">
                                <li class="mini-timeline-highlight">
                                <div class="mini-timeline-panel">
                                  <h5 class="time">07:00</h5>
                                  <p>Coding!!</p>
                                </div>
                              </li>

                              <li class="mini-timeline-highlight">
                              <div class="mini-timeline-panel">
                                <h5 class="time">09:00</h5>
                                <p>Playing The Games</p>
                              </div>
                            </li>
                            <li class="mini-timeline-highlight">
                            <div class="mini-timeline-panel">
                              <h5 class="time">12:00</h5>
                              <p>Meeting with <a href="#">Clients</a></p>
                            </div>
                          </li>
                          <li class="mini-timeline-highlight mini-timeline-warning">
                          <div class="mini-timeline-panel">
                            <h5 class="time">15:00</h5>
                            <p>Breakdown the Personal PC</p>
                          </div>
                        </li>
                        <li class="mini-timeline-highlight mini-timeline-info">
                        <div class="mini-timeline-panel">
                          <h5 class="time">15:00</h5>
                          <p>Checking Server!</p>
                        </div>
                      </li>
                      <li class="mini-timeline-highlight mini-timeline-success">
                        <div class="mini-timeline-panel">
                          <h5 class="time">16:01</h5>
                          <p>Hacking The public wifi</p>
                        </div>
                      </li>
                      <li class="mini-timeline-highlight mini-timeline-danger">
                        <div class="mini-timeline-panel">
                          <h5 class="time">21:00</h5>
                          <p>Sleep!</p>
                        </div>
                      </li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>

                  </div>
                  <div id="right-menu-config" class="tab-pane fade">
                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Notification</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-info">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch1" checked>
                          <label class="onoffswitch-label" for="myonoffswitch1"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Custom Designer</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-danger">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch2" checked>
                          <label class="onoffswitch-label" for="myonoffswitch2"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Autologin</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-success">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch3" checked>
                          <label class="onoffswitch-label" for="myonoffswitch3"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Auto Hacking</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-warning">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch4" checked>
                          <label class="onoffswitch-label" for="myonoffswitch4"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Auto locking</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch5" checked>
                          <label class="onoffswitch-label" for="myonoffswitch5"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>FireWall</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch6" checked>
                          <label class="onoffswitch-label" for="myonoffswitch6"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>CSRF Max</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-warning">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch7" checked>
                          <label class="onoffswitch-label" for="myonoffswitch7"></label>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Man In The Middle</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-danger">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch8" checked>
                          <label class="onoffswitch-label" for="myonoffswitch8"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6 padding-0">
                        <h5>Auto Repair</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-success">
                          <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch9" checked>
                          <label class="onoffswitch-label" for="myonoffswitch9"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <input type="button" value="More.." class="btnmore">
                    </div>

                  </div>
                </div>
              </div>  
              <!-- end: right menu -->
          
      </div>
      
     




<?php
    include("../../../private/required/teacher/mobile_nav.php");
    include("../../../private/required/teacher/teacher_footer.php");
?>