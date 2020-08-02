<?php 
define('PAGE', 'courses');
require_once('includes/top.php');
if(isset($_GET['c_id'])){ 
    $id = $_GET['c_id'];
    $run = $conn->query("SELECT * FROM lesson WHERE c_id = '$id' ");
?>
    <!-- main container start -->
  <div class="container-fluid mt-5">
    
    <!-- main couses view -->
   
              <div class="accordion" id="ppp">
                  <?php
                    if (mysqli_num_rows($run) == '0') {
                      echo "<div class='alert alert-info' >No lesson This Courses....</div>";
                    }
                    $i = 1;
                    while($row= $run->fetch_assoc()){ ?>
                   
                    <div class='card shadow-lg my-2'>
                    <div class='card-header p-0'>
                      <h2><button type='button' class='btn h-100 w-100' data-toggle='collapse' data-target='#l<?php echo $i ?>' style='box-shadow: none;'><?php echo $row['l_name']; ?></button></h2>
                    </div>
                     
                   <div class='card-body collapse' id='l<?php echo $i ?>' data-parent='#ppp'>
                           <video controls='' src="../lesson_videos/<?php echo $row['l_video']; ?>" type='mp4' class='img-fluid img-thumbnail ' ></video>
                    <div class="card-footer mt-4 text-left">
                      <h3><?php echo $row['l_desc']; ?></h3>
                    </div>
                    </div>
                    
                  </div>
                 <?php $i++; } ?>

                                  
    <!-- end couses view -->
  </div>
   <!-- main container End -->
<?php    
 } else {
  header('location:my_courses.php');
 }
 require_once('includes/bottom.php') ?>