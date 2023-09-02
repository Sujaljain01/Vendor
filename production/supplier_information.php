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
  
?>

<?php 
    if(isset($_GET['delete'])){

      print_r($_GET['delete']);
      die("fsd");

    
      //$del = "DELETE * from users where u_id=".$_GET['delete'];

          if(mysqli_query($conn,$del))
          {

              ?>
              <script>alert('successfully Deleted ');</script>
              <?php header("Location: supplier_information.php"); ?>
              <?php 
            }
            else
            {
              ?>
              <script>alert('error while Deleting! ...');</script>
              <?php header("Location: supplier_information.php"); ?>
              <?php
            } 
          }

 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vendor Mangement System </title>

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard_admin.php" class="site_title"><span>Vendor</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $userRow['u_path']   ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard_admin.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="add_Supplier.php"><i class="fa fa-edit"></i> Add Vendor  <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="Supplier_information.php"><i class="fa fa-desktop"></i> Vendor Details <span class="fa fa-chevron-down"></span></a>
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
                  <ul class="">
                     <!--dropdown-menu dropdown-usermenu pull-right-->
                   
                    <li><a href="logout.php?logout" class="manasa"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
        
          <!-- top tiles -->
          

            
            
          <!-- /top tiles -->

            <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vendor or Admin Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Email</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Mobile no</th>
                          <th>User Type</th>
                          <th>User Role</th>
                          <th>Picture</th>
                          <th>Action</th>
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $projects = array();
                          $res=mysqli_query($conn,"SELECT * FROM users");
                          while ($userRow=mysqli_fetch_array($res,MYSQLI_ASSOC))
                          {
                              $projects[] = $userRow;
                          }
                          foreach ($projects as $userRow)
                          {
                        ?>
                        <form method = "get" action="supplier_admin_edit.php">

                        <tr>
                          <td><?php echo $userRow['u_id']; ?></th>
                          <td><?php echo $userRow['u_email']; ?></td>
                          <td><?php echo $userRow['u_first']; ?></td>
                          <td><?php echo $userRow['u_last']; ?></td>
                          <td><?php echo $userRow['u_mobile']; ?></td>
                          <td><?php echo $userRow['u_type']; ?></td>
                          <td><?php echo $userRow['u_role']; ?></td>
                          <td><img src="<?php echo $userRow['u_path']   ?>" width="55" height="50"></td>
                          <td><input type="submit" class="btn btn-danger" name="action" value="Edit" /></td>
                          <td><input type="submit" class="btn btn-dark"   name="action" value="Delete"/></td>
                          <td><input type="hidden" name="id" value="<?php echo $userRow['u_id']; ?>"/></td>
              
                        </tr>
                        </form>
                          <?php
                          }
                        ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              <!-- end of table -->
               


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
