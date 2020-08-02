<?php 
define('PAGE', 'courses');
require_once('includes/top.php');
?> 
<style type="text/css">
	p{
		margin-bottom: 5px !important;
	}
	#card:hover{
		cursor: pointer;
		box-shadow: 0.2px 0.2px 15px #000000;
	}

</style>
<div class="container-fluid">
	<h3>All Courses</h3>
	<?php
		$s_id = $_SESSION['id'];
		$run = $conn->query("SELECT c_id FROM course_order WHERE s_id = '$s_id' AND admin_status= '1'");
		while ($row = $run->fetch_assoc()) {
			$c_id = $row['c_id'];
			//echo"$c_id , $s_id";
			$run_c = $conn->query("SELECT * FROM course WHERE c_id = '$c_id'");
		
		while ($row_c = $run_c->fetch_assoc()) {
			echo "<div class='card text-left  mb-sm-2' id='card'>
					<div class='card-body'>
						<h4 class='mb-3'>".$row_c['c_name']."</h4>
						<div class='row'>
						<div class='col-md-3'>
							<img class='img-fluid card-img mb-sm-3' src='../course_img/".$row_c['c_img']."' >
						</div>
						<div class='col-md-9'>
							<p>".$row_c['c_desc']."</p>
							<p>Duration : ".$row_c['c_duration']."</p>
							<p>Instructor :".$row_c['c_author']."</p>
							<p>Price : <i class='fa fa-rupee mr-2'></i>".$row_c['c_sprice']."</p>
							<a href='watch_lessons.php?c_id=".$row_c['c_id']."' class='btn btn-info'>Watch Courses</a>
						</div>
						</div>
					</div>
				</div>";
			}
		}

		
	?>

	

<a href="../courses.php" class="btn btn-info position-sticky font-weight-bold" style="top: 90%; left: 90%;">+</a>
</div>

<?php require_once('includes/bottom.php') ?>