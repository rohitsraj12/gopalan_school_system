<?php
 // teacher list or all teacher record

    session_start();

    if(!isset($_SESSION["emp_id"])){
        header('location: ../../admin_login.php');
    }
    $page_title = "Dashboard";

    include('../../private/config/db_connection/db_connect.php');
    include('../../private/config/config.php');

    $id = $_SESSION['emp_id'];

    // echo $id;

    $query = "SELECT * FROM teachers WHERE emp_id='$id'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    echo $row['first_name'];

    include('../../private/required/teacher/teacher_header.php');

?>
   <!-- start: content -->
   <div id="content">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-6 col-sm-12">
                <h3 class="animated fadeInLeft">Gopalan International School - Teachers</h3>
                <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Whitefield,Bangalore</p>

                <ul class="nav navbar-nav">
                    <li><a href="" >Impedit</a></li>
                    <li><a href="" class="active">Virtute</a></li>
                    <li><a href="">Euismod</a></li>
                    <li><a href="">Explicar</a></li>
                    <li><a href="">Rebum</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
                    <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Bangalore</h3>
                    <h1 style="margin-top: -10px;color: #ddd;">30<sup>o</sup></h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="wheather">
                    <div class="stormy rainy animated pulse infinite">
                        <div class="shadow">
                        
                        </div>
                    </div>
                    <div class="sub-wheather">
                        <div class="thunder">
                        
                        </div>
                        <div class="rain">
                            <div class="droplet droplet1"></div>
                            <div class="droplet droplet2"></div>
                            <div class="droplet droplet3"></div>
                            <div class="droplet droplet4"></div>
                            <div class="droplet droplet5"></div>
                            <div class="droplet droplet6"></div>
                        </div>
                    </div>
                    </div>
                </div>                   
            </div>
            </div>                    
        </div>

        <div class="col-md-12" style="padding:20px;">
            <div class="col-md-12 padding-0">
                <div class="col-md-8 padding-0">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-6">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                    <h4 class="text-left">Teachers</h4>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                    <h4>
                                    <span class="icon-user icons icon text-right"></span>
                                    </h4>
                                </div>
                                </div>
                                <div class="panel-body text-center">
                                <?php 
                                    $query = "SELECT teacher_id FROM teachers";
                                    $result = mysqli_query($conn, $query);

                                    $row_num = mysqli_num_rows($result);
                                ?>
                                <h1><?php echo $row_num?></h1>
                                <p>Total Registered Teachers</p>
                                <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                    <h4 class="text-left">Students</h4>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                    <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                    </h4>
                                </div>
                                </div>
                                <div class="panel-body text-center">
                                <h1>51181,320</h1>
                                <p>New Orders</p>
                                <hr/>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                    <h4 class="text-left">Gopalan International School - Teachers</h4>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                    <h4>
                                    <span class="icon-user icons icon text-right"></span>
                                    </h4>
                                </div>
                                </div>
                                <div class="panel-body text-center">
                                <?php 
                                    $query = "SELECT teacher_id FROM teachers WHERE school_id = 1";
                                    $result = mysqli_query($conn, $query);

                                    $row_num = mysqli_num_rows($result);
                                ?>
                                <h1><?php echo $row_num?></h1>
                                <p>Total Registered Teachers</p>
                                <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                    <h4 class="text-left">Gopalan National School - Teachers</h4>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                    <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                    </h4>
                                </div>
                                </div>
                                <div class="panel-body text-center">
                                <?php 
                                    $query = "SELECT teacher_id FROM teachers WHERE school_id = 2";
                                    $result = mysqli_query($conn, $query);

                                    $row_num = mysqli_num_rows($result);
                                ?>
                                <h1><?php echo $row_num?></h1>
                                <p>New Orders</p>
                                <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 padding-0">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Akihiko Avaron</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 padding-0">
                        <div class="panel box-v3">
                        <div class="panel-heading bg-white border-none">
                            <h4>Report</h4>
                        </div>
                        <div class="panel-body">
                            
                            <div class="media">
                            <div class="media-left">
                                <span class="icon-folder icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Document Handling</h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                    <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="media">
                            <div class="media-left">
                                <span class="icon-pie-chart icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">UI/UX Development</h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="19" aria-valuemin="0" aria-valuemax="100" style="width: 19%;">
                                    <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="media">
                            <div class="media-left">
                                <span class="icon-energy icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Server Optimation</h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;">
                                    <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="media">
                            <div class="media-left">
                                <span class="icon-user icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">User Status</h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;">
                                    <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="media">
                            <div class="media-left">
                                <span class="icon-fire icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Firewall Status</h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                    <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="panel-footer bg-white border-none">
                            <center>
                                <input type="button" value="download as pdf" class="btn btn-danger box-shadow-none"/>
                            </center>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-12 padding-0">
                        <div class="panel bg-light-blue">
                        <div class="panel-body text-white">
                            <p class="animated fadeInUp quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit Ut wisi..."</p>
                            <div class="col-md-12 padding-0">
                                <div class="text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                <span class="fa fa-twitter fa-2x"></span>
                                <span>22 May, 2015 via mobile</span>
                                </div>
                                <div style="padding-top:8px;" class="text-right col-md-5 col-xs-12 col-sm-5 padding-0">
                                <span class="fa fa-retweet"></span> 2000
                                <span class="fa fa-star"></span> 3000
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 card-wrap padding-0">
                <div class="col-md-3">
                    <div class="panel box-v2">
                        <div class="panel-heading padding-0">
                        <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                        <div class="box-v2-detail">
                            <img src="asset/img/avatar.jpg" class="img-responsive"/>
                            <h4>Student 01</h4>
                        </div>
                        </div>
                        <div class="panel-body">
                        <div class="col-md-12 padding-0 text-center">
                            <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                <h3>2.000</h3>
                                <p>Post</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                <h3>2.232</h3>
                                <p>share</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                <h3>4.320</h3>
                                <p>photos</p>
                            </div>
                        </div>
                    </div>
                </div>
                        
            </div><!--End-->
            

            <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 02</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

                <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 03</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

                <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 04</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

                <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 05</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

                <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 06</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

                <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 07</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

                <div class="col-md-3">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                            <img src="images/bg2.jpg" class="box-v2-cover img-responsive"/>
                            <div class="box-v2-detail">
                                <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                <h4>Student 08</h4>
                            </div>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12 padding-0 text-center">
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.000</h3>
                                    <p>Post</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                    <h3>2.232</h3>
                                    <p>share</p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                    <h3>4.320</h3>
                                    <p>photos</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        
            </div><!--End-->

        </div><!--end-->
                   
    
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
                      <img src="images/avatar.jpg" alt="user name">
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
                      <img src="images/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="images/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="images/avatar.jpg" alt="user name">
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
                      <img src="images/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="images/avatar.jpg" alt="user name">
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
                      <img src="images/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="images/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="images/avatar.jpg" alt="user name">
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
                      <img src="images/avatar.jpg" alt="user name">
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
                              <img src="images/avatar.jpg" class=" img-responsive " alt="user name">
                            </div>
                          </div>

                          <div class="row msg_container receive">
                            <div class="col-md-3 col-xs-3 avatar">
                              <img src="images/avatar.jpg" class=" img-responsive " alt="user name">
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
                                  <img src="images/avatar.jpg" class=" img-responsive " alt="user name">
                                </div>
                              </div>

                              <div class="row msg_container receive">
                                <div class="col-md-3 col-xs-3 avatar">
                                  <img src="images/avatar.jpg" class=" img-responsive " alt="user name">
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
                                      <img src="images/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                  </div>

                                  <div class="row msg_container receive">
                                    <div class="col-md-3 col-xs-3 avatar">
                                      <img src="images/avatar.jpg" class=" img-responsive " alt="user name">
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
                                      <div class="user-avatar"><img src="images/avatar.jpg" alt="user name"></div>
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="online">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="online">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="images/avatar.jpg" alt="user name">
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

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="topnav.html">Top Navigation</a></li>
                        <li><a href="boxed.html">Boxed</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="chartjs.html">ChartJs</a></li>
                        <li><a href="morris.html">Morris</a></li>
                        <li><a href="flot.html">Flot</a></li>
                        <li><a href="sparkline.html">SparkLine</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span>Ui Elements
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="color.html">Color</a></li>
                        <li><a href="weather.html">Weather</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="media.html">Media</a></li>
                        <li><a href="panels.html">Panels & Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltip</a></li>
                        <li><a href="badges.html">Badges & Label</a></li>
                        <li><a href="progress.html">Progress</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="modal.html">Modals</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                       <span class="fa fa-check-square-o"></span>Forms
                       <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.html">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-table"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.html">Data Tables</a></li>
                        <li><a href="handsontable.html">handsontable</a></li>
                        <li><a href="tablestatic.html">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="calendar.html">
                         <span class="fa fa-calendar-o"></span>Calendar
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-envelope-o"></span>Mail
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-file-code-o"></span>Pages
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="forgotpass.html">Forgot Password</a></li>
                        <li><a href="login.html">SignIn</a></li>
                        <li><a href="reg.html">SignUp</a></li>
                        <li><a href="article-v1.html">Article v1</a></li>
                        <li><a href="search-v1.html">Search Result v1</a></li>
                        <li><a href="productgrid.html">Product Grid</a></li>
                        <li><a href="profile-v1.html">Profile v1</a></li>
                        <li><a href="invoice-v1.html">Invoice v1</a></li>
                      </ul>
                    </li>
                     <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span> Level 1
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="mail-box.html">Level 2</a></li>
                            <li><a href="compose-mail.html">Level 2</a></li>
                            <li><a href="view-mail.html">Level 2</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="credits.html">Credits</a></li>
                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->









<?php
    include("../../private/required/teacher/teacher_footer.php");
?>