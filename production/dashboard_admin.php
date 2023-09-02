<?php
  session_start();

  require_once 'dbconnect.php';

  require_once 'header.php';

    if($_SESSION['type'] != "Admin"){

    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}


  $ut=mysqli_query($conn,"SELECT * FROM users ;");
  $ucount=mysqli_num_rows($ut);


  $vt=mysqli_query($conn,"SELECT * FROM users WHERE u_type = 'Admin';");
  $vcount=mysqli_num_rows($vt);

  $st=mysqli_query($conn,"SELECT * FROM users WHERE u_type = 'Supplier';");
  $scount=mysqli_num_rows($st);

  $ct=mysqli_query($conn,"SELECT * FROM customer ;");
  $ccount=mysqli_num_rows($ct);

  
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supplier Mangement System </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
    <link href="../build/css/sami.css" rel="stylesheet">

<style>
  .manasa{
  font-size: 10px;
  font-weight: bold;
  border-radius: 30px;
  border-width: 0;
  padding: 10px 20px;
  color: white;
  background-color : green;
  }
</style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Vendor</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
  
              </div>
              <div class="profile_info">
                <span>       Welcome</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="add_supplier.php"><i class="fa fa-edit"></i> Add Vendor/Admin   <span class="fa fa-chevron-down"></span></a>
</li>

                  <li><a href="supplier_information.php"><i class="fa fa-desktop"></i> Vendor/Admin details <span class="fa fa-chevron-down"></span></a>
                  </li>
                  
                  
              </div>

            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
        
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class=" ">
                    <li><a  class="fa fa-sign-out pull-right manasa" href="logout.php?logout"> <i ></i>Log Out</a> </li>
                  </ul>
                </li>

                
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
          <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Admin and Vendor</span>
              <div class="count"><?php echo $ucount; ?></div>
            </div>

        <!-- page content --> 
          <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Admin</span>
              <div class="count"><?php echo $vcount; ?></div>
            </div>

        <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Vendor</span>
              <div class="count"><?php echo $scount; ?></div>
            </div>

            <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Total Customer</span>
              <div class="count"><?php echo $ccount; ?></div>
            </div>

            
            
          

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

<?php mysqli_close($conn); ?>
