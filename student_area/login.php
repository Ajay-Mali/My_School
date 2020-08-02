</!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	include 'includes/db.php'; 
	include 'includes/csslinks.php'; 
	include 'includes/jslinks.php';
	?>
</head>
<body>
<div class="container-fluid">
	<div class="card shadow px-0 offset-md-4 col-md-4 offset-sm-3 col-sm-6 ">
		<div class="card-header p-2 text-center">
			<h3>Student Login	</h3>
		</div>
		<div class="card-body">
			<b>
			<form method="POST">
				<div class="form-group">
					<label><i class="fa fa-envelope mr-2"></i>Email :</label>
					<input type="email" name="s_email" class="form-control" placeholder="example@gmail.com">
				</div>
				<div class="form-group">
					<label><i class="fa fa-key mr-2"></i>Password :</label>
					<input type="password" name="s_pass" class="form-control">
				</div>
				<div class="form-group text-right">
					
					<input type="submit" name="submit" class="btn btn-outline-success" value="login">
					<a href="../index.php" class="btn btn-outline-secondary">Close</a>
				</div>

			</form>
			</b>

		</div>
		<a href="signup.php" class="text-center my-2">SignUp</a>
	</div>
	<a href="../index.php" class="btn btn-block btn-outline-info offset-md-4 col-md-4 offset-sm-3 col-sm-6 my-5 shadow-lg">Back To Home</a>
</div>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
		$s_email = $_POST['s_email'];
		$s_pass = $_POST['s_pass'];

		if ($run =$conn->query("SELECT s_id,s_email FROM student WHERE s_email='$s_email' AND s_pass='$s_pass'")) {
			$row = $run->fetch_assoc();
			$_SESSION['id'] = $row['s_id'];
			$_SESSION['email'] = $row['s_email'];
			header('location:my_courses.php');
		}
	}
?>