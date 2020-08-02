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
			<h3>Student Registration</h3>
		</div>
		<div class="card-body">
			<b>
			<form method="POST">
				<div class="form-group">
					<label><i class="fa fa-user mr-2"></i>Name :</label>
					<input type="text" name="s_name" class="form-control" placeholder="Enter Name...">
				</div>
				<div class="form-group">
					<label><i class="fa fa-envelope mr-2"></i>Email :</label>
					<input type="email" name="s_email" class="form-control" placeholder="example@gmail.com">
				</b>
					<span>we`ll never share your email with anyone else..</span>
				</div>
				<b>
				<div class="form-group">
					<label><i class="fa fa-key mr-2"></i>New Password :</label>
					<input type="password" name="s_pass" class="form-control">
				</div>
				<div class="form-group text-right">
					
					<input type="submit" name="submit" class="btn btn-outline-success" value="SingUp">
					<a href="../index.php" class="btn btn-outline-secondary">Close</a>
				</div>
			</form>
			</b>
		</div>
		<a href="login.php" class="text-center my-2">login</a>
	</div>
	<a href="../index.php" class="btn btn-block btn-outline-info offset-md-4 col-md-4 offset-sm-3 col-sm-6 my-5 shadow-lg">Back To Home</a>
</div>
</body>
</html>
<?php
	if (isset($_POST['submit'])) {
		$s_name = $_POST['s_name'];
		$s_email = $_POST['s_email'];
		$s_pass = $_POST['s_pass'];
		$s_img = 'all.jpg';
		if ($run =$conn->query("INSERT INTO student(s_name,s_email,s_pass,s_img) VALUES ('$s_name','$s_email','$s_pass','$s_img')")) {
			header('location:login.php');
		}
	}
?>