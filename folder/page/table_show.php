<?php
 
 $dataPoints = array(
	array("x"=> 0.36836287342, "y"=> 0.32746263421),
);

$filex=file_get_contents("token_data_x.json");
$arrx=json_decode($filex,true);
$filey=file_get_contents("token_data_y.json");
$arry=json_decode($filey,true);

$i=0;
while($i!=count($arrx)){
$temp_arr=array();
$temp_arr["x"]=$arrx[$i];
$temp_arr["y"]=$arry[$i];

array_push($dataPoints,$temp_arr);
$i=$i+1;
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/laari/Test_Samples/page/" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

        <link rel="icon" type="img/png" href="img/logo.png">
      
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
   <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!--Canvas JS-->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Duma infotech</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt="">Admin
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
              </div>


            <div class="clearfix"></div>

            <div class="row" style="display: block;width:auto!important;">
              <div>
                <div class="x_panel" style="width:auto!important;">
                  <div class="x_title">
                    <h2>Basic Tables <small>basic table subtitle</small></h2>
                  </div>
                  <div class="x_content" id="basic_table">
                    <?php
                    $table=$_GET['table']; 
                    include("connection.php");
                    $col_query="SHOW COLUMNS FROM ".$table;
                    $col_stmt=$con->query($col_query);
                    $total_col=$col_stmt->rowCount();
                    ?>
                    <table class="table">
                      <thead>
                        <tr>
                          <?php
                          foreach($col_stmt as $row)
                          {
                            echo "<th>".$row[0]."</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                       $query="SELECT * FROM ".$table;
                       $stmt=$con->query($query);
                       foreach ($stmt as $row) {
                        echo "<tr>";
                            
                        for($i=0;$i<$total_col;$i++)
                         {
                            
                              echo "<td>".$row[$i]."</td>";
                            
                          }
                        echo "</tr>";

                       }
                       
                       ?>
                      </tbody>
                    </table>                    

                  </div>

                  <div>
                    
                  </div>

                </div>
              </div>

        <!-- /page content -->

        <!-- footer content -->
        <!-- /footer content -->
      </div>
    </div>

  </body>
  <script>


  </script>
</html>
