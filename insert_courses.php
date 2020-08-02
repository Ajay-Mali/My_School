<?php
define('PAGE', 'courses');
require_once('includes/top.php');
?>
<div class="container text-left">
<b>

	<?php if(isset($_GET['c_id']) || isset($_GET['e_id']) || isset($_GET['e_id']) != '' ){ 
		if (isset($_GET['c_id'])) { ?>
			
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Course Name</label>
						<input required="required" type="text" name="c_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Course Desctiption</label>
						<input required="required" type="text" name="c_desc" class="form-control">
					</div>
					<div class="form-group">
						<label>Course Author Name</label>
						<input required="required" type="text" name="c_author" class="form-control">
					</div>
					<div class="form-group">
						<label>Course Duretion</label>
						<input required="required" type="text" name="c_duration" class="form-control">
					</div>
					<div class="form-group">
						<label>Course Original Price</label>
						<input required="required" type="text" name="c_oprice" class="form-control">
					</div>
					<div class="form-group">
						<label>Course Selling Price</label>
						<input required="required" type="text" name="c_sprice" class="form-control">
					</div>
					<div class="form-group">
						<label>Course Image</label>
						<input required="required" type="file" name="c_img" class="form-control-file">
					</div>
					<div class="form-row m-0 p-0">
						<div class="col-6"><input type="reset" class="btn btn-block btn-danger"></div>
						<div class="col-6"><input type="submit" name="submit" class="btn btn-block btn-success"></div>
					</div>
				</form>
			
		<?php }else{
				$c_id = $_GET['e_id'];
				$run = $conn->query("SELECT * FROM course WHERE c_id = '$c_id'");
				$row = $run->fetch_assoc();
				if (mysqli_num_rows($run) == 0) {
					header('location:view_students.php');
				}
		  ?>
			
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Course Name</label>
						<input type="text" name="c_name" class="form-control" required="required" value="<?php echo $row['c_name'] ?>">
					</div>
					<div class="form-group">
						<label>Course Desctiption</label>
						<input type="text" name="c_desc" class="form-control" required="required" value="<?php echo $row['c_desc'] ?>">
					</div>
					<div class="form-group">
						<label>Course Author Name</label>
						<input type="text" name="c_author" class="form-control" required="required" value="<?php echo $row['c_author'] ?>">
					</div>
					<div class="form-group">
						<label>Course Duretion</label>
						<input type="text" name="c_duration" class="form-control" required="required" value="<?php echo $row['c_duration'] ?>">
					</div>
					<div class="form-group">
						<label>Course Original Price</label>
						<input type="text" name="c_oprice" class="form-control" required="required" value="<?php echo $row['c_oprice'] ?>">
					</div>
					<div class="form-group">
						<label>Course Selling Price</label>
						<input type="text" name="c_sprice" class="form-control" required="required" value="<?php echo $row['c_sprice'] ?>">
					</div>
					<div class="form-group">
						<label>Course Image</label>
						<input type="file" name="c_img" class="form-control-file">
					</div>
					<div class="form-row m-0 p-0">
						<div class="col-6"><input type="reset" class="btn btn-block btn-danger"></div>
						<div class="col-6"><input type="submit" name="update" class="btn btn-block btn-success" value="Update courses"></div>
					</div>
				</form>
		
		<?php }	?>

<?php }else{
		header('location:view_courses.php');
 }
?>
<?php

require_once('includes/bottom.php');
?>
<?php
	if (isset($_POST['submit'])) {
		$c_name = $_POST['c_name'];
		$c_desc = $_POST['c_desc'];
		$c_author = $_POST['c_author'];
		$c_duration = $_POST['c_duration'];
		$c_oprice = $_POST['c_oprice'];
		$c_sprice = $_POST['c_sprice'];
		$c_img = $_FILES['c_img']['name'];
    	$temp_img = $_FILES['c_img']['tmp_name'];

    	move_uploaded_file($temp_img,"course_img/$c_img");

		//echo "$c_name , $c_desc , $c_author , $c_duration , $c_oprice , $c_sprice , $c_img , $temp_img";
		if ($conn->query("INSERT INTO `course`(`c_name`, `c_author`, `c_desc`, `c_duration`, `c_oprice`, `c_sprice`, `c_img`) VALUES('$c_name','$c_author','$c_desc','$c_duration','$c_oprice','$c_sprice','$c_img' )")) {
			echo "<script>alert('insert successfully...')</script>";
		}

	}

	//// update
	if (isset($_POST['update'])) {
		$c_id = $_GET['e_id'];
		$c_name = $_POST['c_name'];
		$c_desc = $_POST['c_desc'];
		$c_author = $_POST['c_author'];
		$c_duration = $_POST['c_duration'];
		$c_oprice = $_POST['c_oprice'];
		$c_sprice = $_POST['c_sprice'];
		$c_img = $_FILES['c_img']['name'];
// // UPDATE `course` SET `c_id`=[value-1],`c_name`=[value-2],`c_author`=[value-3],`c_desc`=[value-4],`c_duration`=[value-5],`c_oprice`=[value-6],`c_sprice`=[value-7],`c_img`=[value-8] WHERE 1
// 		echo "$c_name $c_desc $c_author $c_duration $c_oprice $c_sprice $c_img";
		if ($c_img == '') {
			$sql = "UPDATE course SET c_name = '$c_name', c_author = '$c_author', c_desc = '$c_desc', c_duration = '$c_duration', c_oprice = '$c_oprice', c_sprice = '$c_sprice' WHERE c_id = '$c_id'";
			echo "<script>alert('$sql')</script>";
		}else{
			$temp_img = $_FILES['c_img']['tmp_name'];

    		move_uploaded_file($temp_img,"course_img/$c_img");
    		$sql = "UPDATE course SET c_name = '$c_name', c_desc = '$c_desc', c_author = '$c_author', c_duration = '$c_duration', c_oprice = '$c_oprice', c_sprice = '$c_sprice', c_img = '$c_img' WHERE c_id = '$c_id'";
		}

		if ($conn->query($sql)) {
			echo "<script>alert('Updated successfully...')</script>";
			echo "<script>window.open('view_courses.php?','_self')</script>";
		}else{
			echo "check quri";
		}

	}

?>