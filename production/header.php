<?php 

  // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
  }
  // select loggedin users detail
  $id = $_SESSION['user'];
  $res=mysqli_query($conn,"SELECT * FROM users WHERE u_id= $id ");
  $userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

 

 ?>