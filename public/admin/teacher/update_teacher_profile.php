<?php
 // add new teacher in teacher record
    session_start();

    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }

    $page_title = "Create New Teacher";

    include('../../../private/config/db_connection/db_connect.php');
    // include('include/school_name.php');
    include('../../../private/config/config.php');

    
    $id = $_SESSION['emp_id'];

    $query = "SELECT * FROM admins WHERE emp_id= '$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];

    include('../../../private/required/admin/admin_header.php');

    
    // fetch teacher record query
    $capture_emp_id         = $_GET['id'];

    $teacher_query = "SELECT teachers.*, schools.*, teacher_positions.*, class_rooms.*, class_sections.* FROM teachers
                      JOIN schools
                          ON schools.school_id = teachers.school_id
                      JOIN teacher_positions
                          ON teacher_positions.position_id = teachers.position_id
                      JOIN class_rooms
                          ON class_rooms.class_id = teachers.class_id
                      JOIN class_sections
                          ON class_sections.section_id = teachers.section_id
                      WHERE emp_id = '$capture_emp_id'";
                      
    $teacher_result = mysqli_query($conn, $teacher_query);

    $teacher_row    = mysqli_fetch_assoc($teacher_result);

    $teacher_full_name = $teacher_row['first_name'] . " " . $teacher_row['last_name'];

    $tec_id = $teacher_row['teacher_id'];

?>

<div class="container-fluid mimin-wrapper">

  <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
          <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Update Teacher Profile</h3>
                <p class="animated fadeInDown">
                  Teachers <span class="fa-angle-right fa"></span> Update Teacher Profile
                </p>
            </div>
          </div>
        </div>
        <div class="form-element">
            <div class="col-md-12 padding-0">
                <div class="col-md-4">
                    <div class="col-md-12 panel">
                        <div class="col-md-12 panel-heading">
                            <h4>Teacher Account Details</h4>
                        </div>

                        <div class="col-md-12 panel-body">
                             <div class="profile-v1-pp text-center">
                              <img style="width: 150px; margin: 0 auto" src="../../img/teacher/avatar.jpg"/>
                              <h2 class="text-capitalize"><?php echo $teacher_full_name . " " . $tec_id; ?></h2>
                            </div>
                            <!-- <div class="col-md-8 padding-0">
                                <center>
                                    <div type="text" id="noui-range" style="height:400px;">

                                    </div>
                                </center>
                            </div> -->

                            <div class="panel-body text-capitalize"">
                              <dl class="dl-horizontal">
                                <dt>Teachr Name</dt>
                                <dd><?php echo $teacher_full_name ?></dd>
                                </br>

                                <dt>Employee Id</dt>
                                <dd><?php echo $teacher_row['emp_id']?></dd>
                                </br>

                                <dt>Email</dt>
                                <dd  class="text-lowercase"><?php echo $teacher_row['email']?></dd>
                                </br>

                                <dt>School Name</dt>
                                <dd><?php echo $teacher_row['school_name']?></dd>
                                </br>

                                <dt>Class Teacher</dt>
                                <dd><?php echo $teacher_row['class_name'] . " [Section - " . $teacher_row['section_name'] . "]";?></dd>

                              </dl>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12 panel">
                        <div class="col-md-12 panel-heading">
                            <h4>Update Teacher Account</h4>
                        </div>
                        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                        <div class="col-md-12">
                            <form class="cmxform" id="signupForm" method="POST" action="include/update_teacher_account.inc.php">
                              <div class="col-md-6">

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                      <input type="text" class="form-text" id="validate_firstname" name="first_name" value="">
                                      <span class="bar"></span>
                                      <label>Firstname</label>
                                  </div>

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                  <input type="text" class="form-text" id="validate_lastname" name="last_name">
                                  <span class="bar"></span>
                                  <label>Lastname</label>
                                  </div>

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                  <input type="text" class="form-text" id="validate_emp_id" name="emp_id">
                                  <span class="bar"></span>
                                  <label>Emp ID</label>
                                  </div>
                                  
                                  <!-- <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                      <input type="text" class="form-text mask-phone" required>
                                      <span class="bar"></span>
                                      <label>Telephone</label>
                                  </div> -->

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;  margin-bottom: 0">
                                      <p>School Name</p>
                                  </div>

                                  <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                      
                                      <select class="form-control" id="validate_position" name="school_name" required>
                                              <option value="<?php echo $teacher_row['school_id']?>">Select School Name</option>
                                          <?php
                                                  $query = "SELECT * FROM schools";
                                                  $result = mysqli_query($conn, $query);

                                                  while($rows = mysqli_fetch_assoc($result)){
                                          ?>
                                              <option value="<?php echo $rows['school_id'];?>"><?php echo $rows['school_name'];?></option>
                                                  
                                          <?php
                                              }
                                          ?>
                                          
                                      </select>
                                  </div> 

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;  margin-bottom: 0">
                                      <p>Position</p>
                                  </div> 
                                  <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                      
                                      <select class="form-control" id="validate_position" name="position" required>
                                          <option value="<?php echo $teacher_row['position_id']?>">Select Teacher Position</option>
                                          <?php

                                                  // school_all(teacher_positions);

                                                  $query = "SELECT * FROM teacher_positions";
                                                  $result = mysqli_query($conn, $query);

                                                  while($rows = mysqli_fetch_assoc($result)){
                                          ?>
                                              <option value="<?php echo $rows['position_id'];?>"><?php echo $rows['position_name'];?></option>
                                                  
                                          <?php
                                              }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="col-md-6">
                                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                  <input type="password" class="form-text" id="validate_password" name="password">
                                  <span class="bar"></span>
                                  <label>Password</label>
                                  </div>

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                  <input type="password" class="form-text" id="validate_confirm_password" name="re_password">
                                  <span class="bar"></span>
                                  <label>Confirm Password</label>
                                  </div>

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                  <input type="text" class="form-text" id="validate_email" name="email">
                                  <span class="bar"></span>
                                  <label>Email</label>
                                  </div>

                                  <div class="form-group form-animate-text" style="margin-top:40px !important; margin-bottom: 0">
                                      <p>Teacher Position</p>
                                  </div>
                                  
                                  <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                      
                                      <select class="form-control" id="validate_position" name="grade">
                                          <option value="<?php echo $teacher_row['class_id']?>">Select Class Room</option>
                                          <?php

                                                  // school_all(teacher_positions);

                                                  $query = "SELECT * FROM class_rooms";
                                                  $result = mysqli_query($conn, $query);

                                                  while($rows = mysqli_fetch_assoc($result)){
                                          ?>
                                              <option value="<?php echo $rows['class_id'];?>"><?php echo "Grade " . $rows['class_name'];?></option>
                                                  
                                          <?php
                                              }
                                          ?>
                                      </select>
                                  </div>   
                                  

                                  <div class="form-group form-animate-text" style="margin-top:40px !important;  margin-bottom: 0">
                                      <p>Class Section</p>
                                  </div>
                                  
                                  <div class="form-group form-animate-text" style="margin-top:0px !important;">
                                      
                                      <select class="form-control" id="validate_position" name="section" required>
                                          <option value="<?php echo $teacher_row['section_id']?>">Select Class Section</option>
                                          <?php

                                                  // school_all(teacher_positions);

                                                  $query = "SELECT * FROM class_sections";
                                                  $result = mysqli_query($conn, $query);

                                                  while($rows = mysqli_fetch_assoc($result)){
                                          ?>
                                              <option value="<?php echo $rows['section_id'];?>"><?php echo "Section " . $rows['section_name'];?></option>
                                                  
                                          <?php
                                              }
                                          ?>
                                      </select>
                                  </div>   
                              </div>        
                              
                              <input type="hidden" name="teacher_id" value="<?php echo  $teacher_row['emp_id'];?>">
                             

                            <div class="col-md-12">
                                <!-- <div class="form-group form-animate-checkbox">
                                    <input type="checkbox" class="checkbox"  id="validate_agree" name="agree">
                                    <label>Please agree to our policy</label>
                                </div> -->
                                <input class="submit btn btn-danger" type="submit" name="update_profile" value="Submit">
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
    include("../../../private/required/admin/admin_footer.php");
?>