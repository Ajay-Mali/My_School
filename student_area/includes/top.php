<?php require_once('includes/db.php');
      if (!isset($_SESSION['email'])) {
        header('location:../index.php');
      }
 ?> 
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Panel </title>
 <?php require_once('includes/csslinks.php'); ?>  
 
   <style type="text/css">
      body{
        background-color: #EBEBEB;
      }
   </style>
</head>
<body>
    <!-- sub main header start -->
      <div class="col-12 bg-white py-3 shadow-sm">
         <span class="h1">E-learing </span><span class="h3">Student Area</span>
         <a href="../logout.php" class="btn btn-light float-right"><i class="p-0 m-o mr-1 fa fa-sign-out"></i>Logout</a>
     </div>
    <!-- sub main header end -->

  <!-- main container start -->
  <div class="container-fluid mt-3">

    <!-- All Section here Start -->
    <div class="row mx-auto">
       <?php
          $id = $_SESSION['id'];
          $run = $conn->query("SELECT s_img FROM student WHERE s_id = '$id'");
          $row = $run->fetch_assoc();
       ?>
        <!-- side navbar start -->
        <div class="col-2 d-md-block d-none">
          <img class="img-fluid mb-2 shadow" src="../student_img/<?php echo $row['s_img'] ?>"  width='300px' height='200px' style="border-radius: 5px;">
          <div class="list-group shadow-sm overflow-hidden">
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'profile' ){ echo 'active'; } ?>" href="student_profile.php" ><i class="p-0 m-o mr-1 fa fa-user"></i>Profile</a>
            <a class="border-0 list-group-item list-group-item-action <?php if(PAGE == 'courses'){ echo 'active'; } ?>" href="my_courses.php"> <i class="p-0 m-o mr-1 fa fa-book"></i>My Courses</a>
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
                  <a class="nav-link <?php if(PAGE == 'profile'){ echo 'active'; } ?>" href="student_profile.php"><i class="fa fa-user" ></i></a>
                </li>
                <li class="nav-item" title="Courses">
                  <a class="nav-link <?php if(PAGE == 'courses'){ echo 'active'; } ?>" href="my_courses.php"><i class="fa fa-book" ></i></a>
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