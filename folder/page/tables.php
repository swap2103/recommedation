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
                <h3>Tables and Charts</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Tables <small>basic table subtitle</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="basic_table">

                    

                  </div>
                  <div></div>

                </div>
              </div>

              <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", 
	title:{
		text: "Data points"
	},
	axisX:{
		title: "x_data",
		suffix: ""
	},
	axisY:{
		title: "y_data",
		suffix: "",
		includeZero: false
	},
	data: [{
		type: "scatter",
		markerType: "square",
		markerSize: 10,
		toolTipContent: "Height: {y} inch<br>Weight: {x} kg",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div class="col-md-8 col-sm-8">
        <div id="chartContainer" style="height: 370px; width: 90%;"></div>
        </div>
              <br>
              <br>
              <br>
              
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table design <small>Custom design</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Index </th>
                            <th class="column-title">File name</th>
                            <th class="column-title">Description</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td class=" ">1</td>
                            <td class=" ">Main Tokens Corpus</td>
                            <td class="a-right a-right ">These contians all the corpus present and related with the site.</td>
                            <td class=" last"><input type="button" onclick="refresh_main()"  value="Refresh">
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  </body>
  <script>
  jQuery(document).ready(function($){
        $.ajax({url: "tables_php.php", success: function(data,status){
            $("#basic_table").html(data);
        }});
        });

  function refresh_main(){
    <?php
    unlink("Test_corpus.json");
    unlink("token_data_x.json");
    unlink("token_data_y.json");


    $con=mysqli_connect("localhost","root","","project");
    if($con){
    //laari_name
    $sel_qry="select laari_name from laari_info";
    $iname_res=mysqli_query($con,$sel_qry);
    $i=0;
    while($iname_temp=mysqli_fetch_array($iname_res)){
        $iname_corups[$i]=$iname_temp[0];
        $i=$i+1;
    }
    //laari_name

    //items
    $sel_qry="select items from laari_info";
    $tags_res=mysqli_query($con,$sel_qry);
    $i=0;
    while($temp=mysqli_fetch_object($tags_res)){
        $tag_corpus[$i]=unserialize($temp->items);
        $i=$i+1;
    }
    //items
     
    //LAARINAMES TO MAIN CORPUS
    $i=0;
     while($i!=count($iname_corups)){
         if($i==0){
             $corpus[$i]=strtolower($iname_corups[$i]);
             $i=$i+1;
         }
         else{
             //checking the main corpus
             $j=0;
             $f=0;
             while($j!=count($corpus)){
                 if($iname_corups[$i]==$corpus[$j]){
                  $f==1;   
                 }
                 $j=$j+1;
             }
             //checking the main corpus

             //inserting inside the corpus
             if($f==1){
                 $i=$i+1;
             }
             else{
                 $corpus[$i]=strtolower($iname_corups[$i]);
                 $i=$i+1;
             }
             //inserting inside the corpus
         }
     }
    //LAARINAME CORPUS TO TEST_CORPUS


    //TAG_CORPUS TO TEST_CORPUS
    $i=0;
     while($i!=count($tag_corpus)){
         $j=0;
         //Accessing each element
         while($j!=count($tag_corpus[$i])){
            $k=0;
            $f=0;
            //checking the corpus
            while($k!=count($corpus)){
                if($tag_corpus[$i][$j]==$corpus[$k]){
                    $f=1;
                }
                $k=$k+1;
            }
            //checking the corpus

            //inserting
            if($f==1){
                $j=$j+1;
            }
            else{
                $index=count($corpus);
                $corpus[$index]=strtolower($tag_corpus[$i][$j]);
                $j=$j+1;
            }
         }
         //Accessing each element
         $i=$i+1;
     }
    //TAG_CORPUS TO  TEST_CORPUS
     
     //$corpus is for database tokens 
     //$defile is for file tokens(already present inside file)

    //writing inside file
    if(!file_exists("Test_corpus.json")){
        $en_file=json_encode($corpus);
        file_put_contents("Test_corpus.json",$en_file);
    }
    else{
        echo "entered else";
        //checking repetida words
        $i=0;
        while($i!=count($corpus)){
                $j=0;
                $f=0;
                while($j!=count($de_file)){
                    if($corpus[$i]==$de_file[$j]){
                        $f=1;
                    }
                    $j=$j+1;
                }
                //flag y insert
                if($f==1){
                    $i=$i+1;   
                }
                else{
                  $de_file[]=strtolower($corpus[$i]);
                  $i=$i+1;
                }
                //flag y insert
        }
        $en_file=json_encode($de_file);
        file_put_contents("Test_corpus.json",$en_file);
        //checking repetida words
    }
    //writing inside a file
      }
      else{
        echo "not connected";
      }


      $out=shell_exec("python C:\\xampp\\htdocs\\laari\\Test_Samples\\page\\set_data_points.py");
    ?>
  } 

  </script>
</html>
