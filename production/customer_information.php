<?php
  session_start();
  require_once 'dbconnect.php';
  require_once 'header.php';

    if($_SESSION['type'] != "Supplier"){

    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

  $res=mysqli_query($conn,"SELECT * FROM users WHERE u_id=".$_SESSION['user']);
  $userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

  //$res=mysqli_query($conn,"SELECT * FROM users");
  //$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
  
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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard_supplier.php" class="site_title"> <span>Vendor</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $userRow['u_path']   ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $userRow['u_first']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a href="dashboard_supplier.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="add_product.php"><i class="fa fa-edit"></i> Add Cust & Prod<span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="customer_information.php"><i class="fa fa-desktop"></i> Cust & Prod details <span class="fa fa-chevron-down"></span></a>
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
                    <img src="<?php echo $userRow['u_path']   ?>" alt=""><?php echo $userRow['u_first']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                    <h2>Customer and Product Information</h2>
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
                          <th>Customer Name</th>
                          <th>Mobile No</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Total Bill</th>
                          <th>Action</th>
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $customers = array();
                          $ress=mysqli_query($conn,"SELECT customer.c_id, customer.c_name, customer.c_mobile,product.p_name,product.p_price,product.p_quantity,invoice.total_bill FROM customer
                           INNER JOIN product ON product.c_id=customer.c_id 
                           INNER JOIN invoice on invoice.c_id= customer.c_id
                           where customer.u_id= $id");
                          while ($customerRow=mysqli_fetch_array($ress,MYSQLI_ASSOC))
                          {
                              $customers[] = $customerRow;
                          }
                          foreach ($customers as $customerRow)
                          {
                        ?>
                        <form method = "get" action="customer_update.php">

                        <tr>
                          <td><?php echo $customerRow['c_id']; ?></th>
                          <td><?php echo $customerRow['c_name']; ?></td>
                          <td><?php echo $customerRow['c_mobile']; ?></td>
                          <td><?php echo $customerRow['p_name']; ?></td>
                          <td><?php echo $customerRow['p_quantity']; ?></td>
                          <td><?php echo $customerRow['p_price']; ?></td>
                          <td><?php echo $customerRow['total_bill']; ?></td>
                          <td><input type="submit" class="btn btn-danger" name="action" value="Edit" /></td>
                          <td><input type="submit" class="btn btn-dark"   name="action" value="Delete"/></td>
                          <td><input type="hidden" name="id" value="<?php echo $customerRow['c_id']; ?>"/></td>
              
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
