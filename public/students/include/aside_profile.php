<div class="panel">
            <div class="panel-heading bg-amber border-none text-center">
              <h4>Student details</h4>
            </div>

            <div class="col-md-12 profile-v1-cover-wrap" style="padding-right:0px;">

                <div class="col-md-12 profile-v1 text-center" style="padding-top: 10px">
                    <img style="width: 100px" src="<?php if(empty($row['studdent_img'])) { echo '../img/teacher/avatar.jpg';}else { echo '$teacher_row["student_img"]';}?>"/>
                    <h2><?php echo $full_name; ?></h2>
                </div>
            </div>

            <div class="panel-body">
              <div class="panel-body text-capitalize">
                <dl class="dl-horizontal">
                  <dt>Student Name</dt>
                    <dd><?php echo $row['first_name']. " " . $row['last_name'] ?></dd>
                  </br>

                  <dt>Student Id</dt>
                    <dd><?php echo $row['student_user_id']?></dd>
                  </br>

                  <dt>Email</dt>
                    <dd  class="text-lowercase"><?php echo $row['email']?></dd>
                  </br>

                  <dt>Phone Number</dt>
                    <dd  class="text-lowercase"><?php echo $row['phone']?></dd>
                  </br>

                  <dt>Class and division</dt>
                    <dd><?php echo $row['class_name'] . " [" . $row['section_name'] . " - Section]";?></dd>
                  </br>

                </dl>

                <div class="text-center">

                    <a href="<?php base_url()?>students/" class="btn btn-danger">Home page</a>
                
                </div>

              </div>
            </div>
            <!-- <div class="panel-footer bg-white border-none">
                <center>
                  <input type="button" value="download as pdf" class="btn btn-danger box-shadow-none"/>
                </center>
            </div> -->
          </div>