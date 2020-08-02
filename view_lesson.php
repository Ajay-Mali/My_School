<<?php
define('PAGE', 'lesson');
require_once('includes/top.php');
?>
	<div class="container">
		<div class="jumbotron">
			<form method="post">
				
				<div class="input-group mb-3">
					<select class="form-control" name="c_id">
						<option>Select Couser</option>
						<?php
							$run = $conn->query("SELECT c_id,c_name FROM course");
							while ($row = $run->fetch_assoc()) {
								echo "<option value='".$row['c_id']."'>".$row['c_name']."</option>";
							}
						?>
					</select>
				  <div class="input-group-append">
				    <input type="submit" name="search" class="btn btn-outline-success" value="Add Lessons">
				  </div>
				</div>
			</form>
			<?php
				if (isset($_POST['search'])) {
					$_SESSION['c_id'] = $_POST['c_id'];
				}
			?>
		</div>
		<div class="jumbotron-fluid">
			<?php if(isset($_SESSION['c_id'])) { 	
					$id = $_SESSION['c_id'];
					$run_less = $conn->query("SELECT * FROM lesson WHERE c_id = '$id'");
					if (mysqli_num_rows($run_less) == '0') {
						echo "<div class='alert alert-danger'>
							<h2>No Lesson Here Plz Add Lessons....</h2>
						</div>"	;
					} 
			?>
				<table class="table table-responsive">
					<thead>
						<th width="5%">s no</th>
						<th width="20%">Lesson Name</th>
						<th width="30%">Lesson Description</th>
						<th width="20%">lesson Video</th>
						<th></th>
					</thead>
				<?php
				
						$i = 1;
						while ($row_less = $run_less->fetch_assoc()) {
							echo "<tr><td>".$i."</td><td>".$row_less['l_name']."</td><td>".$row_less['l_desc']."</td><td>..lesson_videos/".$row_less['l_video']."</td><td><a href='insert_lesson.php?e_id=".$row_less['l_id']."' class='btn btn-warning mr-2'><i class='fa fa-pencil'></i></a><a href='del_lesson.php?".$row_less['l_id']."' class='btn btn-danger'><i class='fa fa-trash-o'></i></a></td></tr>";
							$i++;
						}
					
					
				?>
				</table>
				
				  <a href="insert_lesson.php?c_id=<?php echo $_SESSION['c_id'] ?>" class="btn btn-info position-sticky font-weight-bold" style="top: 90%; left: 90%;">+</a>
				
			<?php }else{ ?>
				<div class="alert alert-primary" role="alert">
				  Please Seach courses..2
				</div>
			<?php } ?>
		</div>
	</div>
<?php

require_once('includes/bottom.php');
?>