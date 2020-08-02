<?php require_once('includes/db.php'); ?> 
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel </title>
 <?php require_once('includes/csslinks.php'); 
      if (!isset($_SESSION['admin'])) {
    header('location:index.php');
  }
 ?>  
 
   <style type="text/css">
      body{
        background-color: #EBEBEB;
      }
   </style>
</head>
<body>
    <!-- sub main header start -->
      <div class="col-12 bg-white py-3 shadow-sm">
         <span class="h1">E-learing </span><span class="h3">Admin Area</span>
         <a href="logout.php" class="btn btn-light float-right"><i class="p-0 m-o mr-1 fa fa-sign-out"></i>Logout</a>
     </div>
    <!-- sub main header end -->

  <!-- main container start -->
  <div class="container-fluid mt-3">

    <!-- All Section here Start -->
    <div class="row mx-auto">
       
        <!-- side navbar start -->
        <div class="col-2 d-md-block d-none">
          
          <div class="list-group shadow-sm overflow-hidden">
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'dashboard' ){ echo 'active'; } ?>" href="dashboard.php" ><i class="p-0 m-o mr-1 fa fa-tachometer"></i>Dashboard</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'courses'){ echo 'active'; } ?>" href="view_courses.php"> <i class="p-0 m-o mr-1 fa fa-book"></i>Courses</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'lesson'){ echo 'active'; } ?>" href="view_lesson.php" ><i class="p-0 m-o mr-1 fa fa-leanpub"></i>Lessons</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'students'){ echo 'active'; } ?>" href="view_students.php" ><i class="p-0 m-o mr-1 fa fa-users"></i>Students</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'sell_report'){ echo 'active'; } ?>" href="sell_report.php" ><i class="p-0 m-o mr-1 fa fa-table"></i>Sell Report</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'orders'){ echo 'active'; } ?>" href="orders.php" ><i class="p-0 m-o mr-1 fa fa-table"></i>Ordes</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'feedback'){ echo 'active'; } ?>" href="feedback.php" ><i class="p-0 m-o mr-1 fa fa-comments-o"></i>Feedback</a>
             <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'chang_pass'){ echo 'active'; } ?>" href="chang_pass.php" ><i class="p-0 m-o mr-1 fa fa-unlock-alt"></i>Change Password</a>
          
          </div>
        </div>
        <!-- side navbar End -->
       
        <!-- Data View Section start -->
        <div class="col-sm-12 col-md-10">
          <!-- Card Start-->
          <div class="card text-center shadow-sm border-0">
            <!-- Card header Start-->
            <div class="card-header d-md-none">
              <ul class="nav nav-tabs card-header-tabs nav-fill">
                <li class="nav-item" title="Dashboard">
                  <a class="nav-link <?php if(PAGE == 'dashboard'){ echo 'active'; } ?>" href="dashboard.php"><i class="fa fa-tachometer" ></i></a>
                </li>
                <li class="nav-item" title="Courses">
                  <a class="nav-link <?php if(PAGE == 'courses'){ echo 'active'; } ?>" href="view_courses.php"><i class="fa fa-book" ></i></a>
                </li>
                 <li class="nav-item" title="lesson">
                  <a class="nav-link <?php if(PAGE == 'lesson'){ echo 'active'; } ?>" href="view_lesson.php"><i class="fa fa-leanpub" ></i></a>
                </li>
                 <li class="nav-item" title="Students">
                  <a class="nav-link <?php if(PAGE == 'students'){ echo 'active'; } ?>" href="view_students.php"><i class="fa fa-users" ></i></a>
                </li>
                 <li class="nav-item" title="sell_report">
                  <a class="nav-link <?php if(PAGE == 'sell_report'){ echo 'active'; } ?>" href="sell_report.php"><i class="fa fa-table" ></i></a>
                </li>
                 <li class="nav-item" title="Payment">
                  <a class="nav-link <?php if(PAGE == 'payment'){ echo 'active'; } ?>" href="payment.php"><i class="fa fa-table" ></i></a>
                </li>
                 <li class="nav-item" title="Feedback">
                  <a class="nav-link <?php if(PAGE == 'feedback'){ echo 'active'; } ?>" href="feedback.php"><i class="fa fa-comments-o" ></i></a>
                </li>
                <li class="nav-item" title="Change Password">
                  <a class="nav-link <?php if(PAGE == 'chang_pass'){ echo 'active'; } ?>" href="chang_pass.php"><i class="fa fa-unlock-alt" ></i></a>
                </li>
              </ul>
            </div>
            <!-- Card header End-->
           
            <!-- Card Body End-->
            <div class="card-body">