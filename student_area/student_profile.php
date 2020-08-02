<?php 
define('PAGE', 'profile');
require_once('includes/top.php');
?> 
<?php
			if (isset($_SESSION['id'])) {
				$id = $_SESSION['id'];
				$run = $conn->query("SELECT * FROM student WHERE s_id ='$id'");
				$row= $run->fetch_assoc();
				
			?>
			<div class="container-fluid text-left offset-md-3 col-md-6 jumbotron">
				<b>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="s_name" class="form-control" value="<?php echo $row['s_name'] ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="s_email" class="form-control" value="<?php echo $row['s_email'] ?>">
					</div>
					
					<div class="form-group">
						<label>Occupation</label>
						<input type="text" name="s_occu" class="form-control" value="<?php echo $row['s_occu'] ?>">
					</div>
					<div class="form-group">
						<label>Student Image</label>
						<input type="file" name="s_img" class="form-control-file">
					</div>
					
					<img class="img-thumbnail" src="../student_img/<?php echo $row['s_img'] ?>"  width='300px' height='200px'>
					<dir class="form-group p-0">
						<input type="submit" name="update" class="btn btn-block btn-success" value="Update">
					</dir>
				</form>
			</b>
			</div>
		<?php
			}else{
				header('location:logout.php');
			}
		?>
	<?php require_once('includes/bottom.php') ?>
	<?php

		if (isset($_POST['update'])) {
			$s_id = $_SESSION['id'];
			$s_name = $_POST['s_name'];
			$s_email= $_POST['s_email'];
			$s_occu = $_POST['s_occu'];
		  	$s_img = $_FILES['s_img']['name'];
		  	if ($s_img == '') {
				$sql ="UPDATE student SET s_name = '$s_name' , s_email = '$s_email' , s_occu = '$s_occu' WHERE s_id = '$s_id'";
				echo "<script>alert('$sql')</script>";
			}else{
				$temp_img = $_FILES['s_img']['tmp_name'];

	    		move_uploaded_file($temp_img,"../student_img/$s_img");
	    		$sql = "UPDATE student SET s_name = '$s_name' , s_email = '$s_email' , s_occu = '$s_occu', s_img = '$s_img' WHERE s_id = '$s_id'";
			}

			if ($conn->query($sql	)) {
				echo "<script>alert('Updated successfully...')</script>";
				echo "<script>window.open('student_profile.php?','_self')</script>";
			}else{
				echo "check quri";
			}

		}

	?>