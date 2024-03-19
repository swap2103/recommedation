<!DOCTYPE html>
<html lang="en">
  <head>


   <?php
   include("connection.php");
  session_start();
  if(isset($_SESSION["laari_owner_id"]))
  {
    $query="SELECT * FROM laari_info WHERE laari_owner_id=:laari_owner_id";
    $pdo_stament=$con->prepare($query);
    $pdo_stament->execute(array(":laari_owner_id"=>$_SESSION["laari_owner_id"]));
    $result=$pdo_stament->fetch();
    $laari_id=$pdo_stament->fetchColumn();

  

  } 
   ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $result["laari_name"];?></title>
    
        <link rel="icon" type="img/png" href="img/logo.png">
      

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                     <?php echo $result["laari_name"];?>
                                         </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    
                      <a class="dropdown-item"  href="laari_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          
                        </a>
                      </li>
                     
                        <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Laari Profile</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $result["laari_name"];?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php  $image_path="laari_pic/laari_profile/".$result[9]; ?>
                          <img class="img-responsive avatar-view" src="<?php echo $image_path;?>" alt="Avatar" title="Change the avatar" height="400" width="700">
                          
                          <form method="POST" action="update_photo.php" enctype='multipart/form-data'>
                          <h2>Update profile</h2>
                          <input type="file" name="img_name" id="img_name"> 
                          <button type="submit">Submit</button>
                          </form>
                          <br>
                          <br>
                          
                          <?php
                    if($result['status']==0)
                    {
                      ?>
                       <div class="alert alert-info" id="status" style="font-size:14px;font-weight:bold;">Close</div>                      
                   <?php   
                    } 

                     if($result['status']==1)
                    {
                      ?>
                       <div class="alert alert-info" id="status" style="font-size:14px;font-weight:bold;">Open</div>                      
                   <?php   
                    } 
                    ?>
                        </div>
                        <div class="profile_title">
                        <div class="col-md-6">
                          <h2>


                      <?php
                $query="SELECT rating_id FROM laari_rating WHERE laari_no=:laari_no";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_id));
                $total_ppl=$pdo_stament->rowCount();
                if($total_ppl!=0)
                {
               $query="SELECT SUM(rating) AS total FROM laari_rating WHERE laari_no=:laari_no";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_id));
                $rating_sum=$pdo_stament->fetchColumn();
                $avrage=$rating_sum/$total_ppl;
                echo $avrage;
                }
                else
                {
                  echo "Not rated yet";
                }
                      ?>

                          </h2>
                        </div>
                      </div>
                      </div>
                      <h3>Opening Time:<?php echo $result["s_time"];?></h3>
                      <h3>Closing Time:<?php echo $result["e_time"];?></h3>

                      <ul class="list-unstyled user_data">
                      <?php
                  $stmt = $con->prepare("SELECT place,street,area,pincode from laari_info where laari_owner_id=:l_own_id");
                  $stmt->execute(array(":l_own_id"=>$_SESSION["laari_owner_id"]));
                  $address=$stmt->fetch();
                  $str=implode(",",$address);
                  $a='https://maps.google.com/?q='.$str;
                  ?>
                    <a href='<?php echo $a;?>' class="fa fa-map"></a>



                      </ul>
                      
                      <a class="btn btn-success" style="color:#fff;" onclick="laari_open();"><i class="fa fa-edit m-right-xs" style="color:#fff;"></i>Open</a>
                      <a class="btn btn-danger" style="color:#fff;" onclick="laari_close();"><i class="fa fa-edit m-right-xs" style="color:#fff;"></i>Close</a>
                      <a class="btn btn-success" style="color:#fff;" href="laari_edit.php?lid=".<?php echo $_SESSION["laari_owner_id"];?>><i class="fa fa-edit m-right-xs" style="color:#fff;"></i>Edit Profile</a>
                      <a class="btn btn-success" style="color:#fff;" href="laari_menu_test_edit.php?lid=".<?php echo $_SESSION["laari_owner_id"];?>><i class="fa fa-edit m-right-xs" style="color:#fff;"></i>Edit menu</a>
                      <br />

                      <!-- start skills -->
                      <h3>Items</h3>
                      <ul class="list-unstyled user_data">
                        <?php
                    $item_array=unserialize($result["items"]); 
                    ?>
                        <ul>
                          <?php
                          foreach ($item_array as $key ) {
                      echo  "<li><h3>". $key."</h3></li>";
                      }
                      ?>
                
                      </ul>
                      <!-- end of skills -->

                    </div>
                    


                    <div class="col-md-9 col-sm-9 ">

                      
                      <!-- start of user-activity-graph -->
                      
                      <!-- end of user-activity-graph -->
                     

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                       
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <!-- end user projects -->

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
             <a href="https://colorlib.com">Duma</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="vendors/raphael/raphael.min.js"></script>
    <script src="vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script type="text/javascript">
      
      function laari_open()
      {
        var owner_id='<?php echo $_SESSION["laari_owner_id"];?>';

        $.ajax({
          url:"laari_open.php",
          method:"GET",
          data:{"owner_id":owner_id},
          success:function(response)
          {
            if(response==1)
            {
              document.getElementById("status").innerHTML="Open";
            }
          }
        });
      }
       
       function laari_close()
      {
        var owner_id='<?php echo $_SESSION["laari_owner_id"];?>';
        $.ajax({

          url:"laari_close.php",
          method:"GET",
          data:{"owner_id":owner_id},
          success:function(response)
          {
            if(response==1)
            {
              document.getElementById("status").innerHTML="Close";
            }
          }
        });
      }


    </script>
  </body>
</html>