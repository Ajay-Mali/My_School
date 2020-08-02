<?php 
define('PAGE', 'feedback');
require_once('includes/top.php');
?>
		<div class="container-fluid text-left jumbotron">
				<b>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Write Feedback</label>
						<textarea class="form-control" name="feedback" cols="100" rows="10" placeholder="Enter Your Feedback........."></textarea>
					</div>
					<dir class="form-group p-0">
						<input type="submit" name="update" class="btn btn-block btn-success" value="Send Feedback">
					</dir>
				</form>
			</b>
		</div>
<?php require_once('includes/bottom.php');
	if (isset($_POST['update'])) {
		$id = $_SESSION['id'];
		$feedback = $_POST['feedback'];
		if ($conn->query("INSERT feedback(s_id,f_mass) VALUES ('$id','$feedback')")) {
			header('location:my_courses.php');
		}
	}
 ?>
