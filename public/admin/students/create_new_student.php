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

<div class="container-fluid mimin-wrapper">

  <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
          <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Create Student Profile</h3>
                <p class="animated fadeInDown">
                  Students <span class="fa-angle-right fa"></span> Create Student Profile
                </p>
            </div>
          </div>
        </div>
        <div class="form-element">
            
            <div class="col-md-12 padding-0">
            <div class="col-md-4">
                <div class="col-md-12 panel" style="padding-top:30px;padding-bottom:30px;">
                <div class="col-md-12 panel-body">
                <div class="col-md-8 padding-0">
                    <center><div type="text" id="noui-range" style="height:400px;"></div>
                    </center>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-8">
          <div class="col-md-12 panel">
            <div class="col-md-12 panel-heading">
              <h4>Create New Student Account</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
              <div class="col-md-12">
                <form class="cmxform" id="signupForm" method="POST" action="include/create_student_account.inc.php">
                  <div class="col-md-6">

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_firstname" name="first_name" required>
                      <span class="bar"></span>
                      <label>First Name</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_lastname" name="last_name" required>
                      <span class="bar"></span>
                      <label>Last Name</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" id="validate_emp_id" name="user_id" required>
                      <span class="bar"></span>
                      <label>Admission ID</label>
                    </div>
                    
                    <!-- <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text mask-phone" required>
                        <span class="bar"></span>
                        <label>Telephone</label>
                      </div> -->

                      <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>Class</p>
                        
                        <select class="form-control" id="validate_position" name="grade" required>
                            <option value="no_value">Select Class Room</option>
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

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>School</p>
                        
                        <select class="form-control" id="validate_position" name="school" required>
                            <option value="no_value">Select School</option>
                            <?php

                                    // school_all(teacher_positions);

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
                    
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="password" class="form-text" id="validate_password" name="password" required>
                      <span class="bar"></span>
                      <label>Password</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="password" class="form-text" id="validate_confirm_password" name="re_password" required>
                      <span class="bar"></span>
                      <label>Confirm Password</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="tel" class="form-text" id="validate_email" name="phone" required>
                      <span class="bar"></span>
                      <label>Phone Number</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <p>Class Section</p>
                        
                        <select class="form-control" id="validate_position" name="section" required>
                            <option value="no_value">Select Class Section</option>
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

                  <div class="col-md-12">
                      <!-- <div class="form-group form-animate-checkbox">
                          <input type="checkbox" class="checkbox"  id="validate_agree" name="agree">
                          <label>Please agree to our policy</label>
                      </div> -->
                      <input class="submit btn btn-danger" type="submit" name="create_profile" value="Submit">
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
    include("../../../private/required/teacher/teacher_footer.php");
?>