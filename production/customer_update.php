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
  
 

  if ($_GET['action'] && $_GET['id']) {
  if ($_GET['action'] == 'Edit') {

  $up=mysqli_query($conn,"SELECT  customer.c_name, customer.c_mobile,product.p_name,product.p_price,product.p_quantity,invoice.total_bill FROM customer INNER JOIN product ON product.c_id=customer.c_id INNER JOIN invoice on invoice.c_id= customer.c_id WHERE customer.c_id=".$_GET['id']);
  $customerRow=mysqli_fetch_array($up,MYSQLI_ASSOC);
  }
}

      if ($_GET['action'] && $_GET['id']) {
         if ($_GET['action'] == 'Delete') {


             // $del = "DELETE  FROM users WHERE u_id=".$_GET['id'];
              $del = "DELETE   FROM customer  WHERE customer.c_id=".$_GET['id'];
              // print_r($del);
              // die("dfsf");


                      if(mysqli_query($conn,$del))
                      {

                          ?>
                          <script>alert('successfully Deleted ');</script>
                          <?php 
                        }
                        else
                        {
                          ?>
                          <script>alert('error while Deleting! ...');</script>
                          <?php //header("Location: supplier_information.php"); ?>
                          <?php
                        }
                      ?> 
                        <?php header("Location: customer_information.php"); 
                      }
            }

?>


<?php

if(isset($_POST['update_product']))
{ 


  $c_name = mysqli_real_escape_string($conn,$_POST['c_name']);
  $c_mobile  = mysqli_real_escape_string($conn,$_POST['c_mobile']);
  $p_name = mysqli_real_escape_string($conn,$_POST['p_name']);
  $p_quantity = mysqli_real_escape_string($conn,$_POST['p_quantity']);
  $p_price = mysqli_real_escape_string($conn,$_POST['p_price']);

  $total_bill = $p_quantity * $p_price ;


  
  $sql= "UPDATE customer cu INNER JOIN product pr ON cu.c_id = pr.c_id INNER JOIN invoice inv ON cu.c_id = inv.c_id SET cu.c_name = '$c_name',cu.c_mobile='$c_mobile',pr.p_name= '$p_name',
        pr.p_price='$p_price',pr.p_quantity = '$p_quantity',inv.total_bill= '$total_bill' where cu.c_id=".$_GET['id'];;


  if(mysqli_query($conn,$sql))
  {

      ?>
      <script>alert('successfully UPDATED ');</script>
      <?php 
    }
    else
    {
      ?>
      <script>alert('error while Adding! Check email/Server...');</script>
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
              <a href="dashboard_supplier.php" class="site_title"><i class="fa fa-paw"></i> <span>Supplier</span></a>
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

                  <li><a href="add_product.php"><i class="fa fa-edit"></i> Add Product   <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="customer_information.php"><i class="fa fa-desktop"></i> Customer Details <span class="fa fa-chevron-down"></span></a>
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

                      <div class="right_col" role="main" >

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">


                        <form method="post">
                          <fieldset>
                            <div class="form-group">
                              <h2>Update Customer and product </h2><br>
                            </div> 
                            <div class="form-group">
                              Customer Name : <input class="form-control" placeholder="USER NAME" name="c_name" value="<?php echo $customerRow["c_name"]; ?>" type="text" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                
                            <div class="form-group">
                              Mobile No: <input class="form-control" placeholder="Mobile" name="c_mobile" value="<?php echo $customerRow["c_mobile"]; ?>"  type="number"  required>
                            </div>
              
                            <div class="form-group">
                              List Of Product Name : 
                                <select class="form-control"  name="p_name">
                
                                    <option value="Oil" <?php if(($customerRow['p_name']) == "Oil") { echo "selected";}?>>Oil</option>
                                    <option value="Fish" <?php if(($customerRow['p_name']) == "Fish") { echo  "selected";}?>>Fish</option>
                                    <option value="Meat" <?php if(($customerRow['p_name']) == "Meat") { echo  "selected";}?>>Meat</option>
                                    <option value="Egg" <?php if(($customerRow['p_name']) == "Egg") { echo  "selected";}?>>Egg</option>
                                </select>
                            </div>
                            <div class="form-group">
                              Product Quantity: <input class="form-control" placeholder="Quantity" name="p_quantity" value="<?php echo $customerRow["p_quantity"]; ?>"  type="number" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                            <div class="form-group">
                              Product Price: <input class="form-control" placeholder="Price" name="p_price"  type="number" value="<?php echo $customerRow["p_price"]; ?>" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>

    
                            <button type="submit" name="update_product">Submit</button>
                          </fieldset>
                        </form>
                      </div>
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
<?php mysqli_close($conn); ?>
