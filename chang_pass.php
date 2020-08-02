<?php 
define('PAGE', 'chang_pass');
require_once('includes/top.php');
?>
		<div class="container-fluid text-left ">
				<b>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Old Password </label>
						<input type="password" name="old_pass" class="form-control" required="">

					</div>
					<div class="form-group">
						<label>New Password </label>
						<input type="password" name="new_pass" class="form-control" required="">

					</div>
					<div class="form-group">
						<label>Confirm Password </label>
						<input type="password" name="con_pass" class="form-control" required="">

					</div>
					<dir class="form-group p-0">
						<input type="submit" name="update" class="btn btn-block btn-success" value="Update Password">
					</dir>
				</form>
			</b>
		</div>
<?php require_once('includes/bottom.php');
	if (isset($_POST['update'])) {
		$id = $_SESSION['id'];
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$con_pass = $_POST['con_pass'];
		$run = $conn->query("SELECT * FROM admin WHERE a_id = '$id'");
		$row = $run->fetch_assoc();
		if ($row['a_pass'] == $old_pass) {
			if ($new_pass == $con_pass) {
				$up = $conn->query("UPDATE admin SET a_pass = '$new_pass' WHERE a_id ='$id'");
				if ($up) {
					echo "<script>window.open('dashboard.php','_self')</script>";
				}
			}else{
				echo "<script>alert('New Password And Cofirm Password Not Same...')</script>";
			}
		}else{
			echo "<script>alert('Old Password is Worg')</script>";
		}
	}
?>
