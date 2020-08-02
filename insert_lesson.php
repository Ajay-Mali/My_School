<?php
define('PAGE', 'lesson');
require_once('includes/top.php');
?>
<div class="container text-left" >
	<b>
	<?php if(isset($_GET['c_id']) || isset($_GET['e_id'])){ 
		if (isset($_GET['c_id'])) { ?>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Lesson Name</label>
						<input required="required" type="text" name="l_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Lesson Desctiption</label>
						<input required="required" type="text" name="l_desc" class="form-control">
					</div>
					<div class="form-group">
						<label>Lesson video</label>
						<input required="required" type="file" name="file" class="form-control-file">
						<input type="hidden" name="c_id" value="<?php echo $_GET['c_id'] ?>">
					</div>
					<dir class="form-row m-0 p-0">
						<dir class="col-6"><input type="reset" class="btn btn-block btn-danger"></dir>
						<dir class="col-6"><input type="submit" name="submit" class="btn btn-block btn-success"></dir>
					</dir>
				</form>
		<?php }else{
				$l_id = $_GET['e_id'];
				$run = $conn->query("SELECT * FROM lesson");
				$row = $run->fetch_assoc();
		  ?>
			
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Lesson Name</label>
						<input type="text" name="l_name" class="form-control" required="required" value="<?php echo $row['l_name'] ?>">
					</div>
					<div class="form-group">
						<label>Lesson Desctiption</label>
						<input type="text" name="l_desc" class="form-control" required="required" value="<?php echo $row['l_desc'] ?>">
					</div>
					<div class="form-group">
						<label>Lesson video</label>
						<input type="file" name="file" class="form-control-file">
						<input type="hidden" name="l_id" value="<?php echo $l_id ?>">
					</div>
					<dir class="form-row m-0 p-0">
						<dir class="col-6"><input type="reset" class="btn btn-block btn-danger"></dir>
						<dir class="col-6"><input type="submit" name="update" class="btn btn-block btn-success" value="Update Lesson"></dir>
					</dir>
				</form>
				
		<?php }	?>
	</b></div>
<?php }else{
		header('location:view_lesson.php');
 }
?>

<?php

require_once('includes/bottom.php');
?>
<?php
	if (isset($_POST['submit'])) {
		$c_id = $_POST['c_id'];
		$l_name = $_POST['l_name'];
		$l_desc = $_POST['l_desc'];
		$l_video = $_FILES['file']['name'];
    	$temp_video = $_FILES['file']['tmp_name'];
    	
    	move_uploaded_file($temp_video,"lesson_videos/".$l_video);

	    if ($conn->query("INSERT INTO `lesson`(`c_id`, `l_name`, `l_desc`, `l_video`) VALUES ('$c_id','$l_name','$l_desc','$l_video')")) {
			echo "<script>alert('insert successfully...')</script>";
			echo "<script>window.open('insert_lesson.php?c_id=$c_id','_self')</script>";
		}else{
			echo "check quri";
		}

	}

	//// update
	if (isset($_POST['update'])) {
		$id = $_POST['l_id'];
		$l_name = $_POST['l_name'];
		$l_desc = $_POST['l_desc'];
		$l_video = $_FILES['file']['name'];

		if ($l_video == '') {
			$sql = "UPDATE lesson SET l_name = '$l_name' , l_desc = '$l_desc' WHERE l_id = '$id'";
		}else{
			$temp_video = $_FILES['file']['tmp_name'];
    		move_uploaded_file($temp_video,"lesson_videos/".$l_video);
    		$sql = "UPDATE lesson SET l_name = '$l_name' , l_desc = '$l_desc' , l_video = '$l_video' WHERE l_id = '$id'";
		}

		if ($conn->query($sql)) {
			echo "<script>alert('Updated successfully...')</script>";
			echo "<script>window.open('view_lesson.php?','_self')</script>";
		}else{
			echo "check quri";
		}

	}

?>