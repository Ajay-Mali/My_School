<?php
define('PAGE', 'students');
require_once('includes/top.php');
?>
<div class="container text-left">
	<b>
	<?php if(isset($_GET['a_Students']) || isset($_GET['e_id']) || isset($_GET['e_id']) != '' ){ 
		if (isset($_GET['a_Students'])) { ?>
			
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input required="required" type="text" name="s_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input required="required" type="text" name="s_email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input required="required" type="Password" name="s_pass" class="form-control">
					</div>
					<div class="form-group">
						<label>Occupation</label>
						<input required="required" type="text" name="s_occu" class="form-control">
					</div>
					<dir class="form-row m-0 p-0">
						<dir class="col-6"><input type="reset" class="btn btn-block btn-danger"></dir>
						<dir class="col-6"><input type="submit" name="submit" class="btn btn-block btn-success"></dir>
					</dir>
				</form>
			
		<?php }else{
				$s_id = $_GET['e_id'];
				$run = $conn->query("SELECT * FROM student WHERE s_id = '$s_id'");
				$row = $run->fetch_assoc();
				if (mysqli_num_rows($run) == 0) {
					header('location:view_students.php');
				}
		  ?>
			
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<div class="form-group">
						<label>Name</label>
						<input type="text" name="s_name" class="form-control" required="" value="<?php echo $row['s_name'] ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="s_email" class="form-control" required="" value="<?php echo $row['s_email'] ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="s_pass" class="form-control" required="" value="<?php echo $row['s_pass'] ?>">
					</div>
					<div class="form-group">
						<label>Occupation</label>
						<input type="text" name="s_occu" class="form-control" required="" value="<?php echo $row['s_occu'] ?>">
					</div>
					<dir class="form-row m-0 p-0">
						<dir class="col-6"><input type="reset" class="btn btn-block btn-danger"></dir>
						<dir class="col-6"><input type="submit" name="update" class="btn btn-block btn-success" value="Update Lesson"></dir>
					</dir>
				</form>
			
		<?php }	?>
	</b>
	</div>
<?php }else{
		header('location:view_students.php');
 }
?>

<?php require_once('includes/bottom.php') ?>
<?php
	if (isset($_POST['submit'])) {
		$s_name = $_POST['s_name'];
		$s_email= $_POST['s_email'];
		$s_desc = $_POST['s_desc'];
		$s_pass = $_POST['s_pass'];
	  	$s_occu = $_POST['s_occu'];
    	$s_img = 'demo.svg';
    	if ($conn->query("INSERT INTO student(s_name,s_email,s_pass,s_occu,s_img) VALUES ('$s_name','$s_desc','$s_pass','$s_occu','$s_img')")) {
			echo "<script>alert('insert successfully...')</script>";
			echo "<script>window.open('insert_student.php?c_id=$c_id','_self')</script>";
		}else{
			echo "check quri";
		}

	}

	//// update
	if (isset($_POST['update'])) {
		$s_id = $_GET['e_id'];
		$s_name = $_POST['s_name'];
		$s_email= $_POST['s_email'];
		$s_desc = $_POST['s_desc'];
		$s_pass = $_POST['s_pass'];
	  	$s_occu = $_POST['s_occu'];

		if ($conn->query("UPDATE student SET s_name = '$s_name' , s_email = '$s_email' ,  s_pass = '$s_pass' , s_occu = '$s_occu' WHERE s_id = '$s_id'")) {
			echo "<script>alert('Updated successfully...')</script>";
			echo "<script>window.open('view_students.php?','_self')</script>";
		}else{
			echo "check quri";
		}

	}

?>