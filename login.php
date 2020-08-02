</!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	include 'includes/db.php'; 
	include 'includes/csslinks.php'; 
	include 'includes/jslinks.php';
	 if (isset($_SESSION['admin'])) {
		    header('location:dashboard.php');
		  }
	?>
</head>
<body>
<div class="container-fluid">
	<div class="card shadow px-0 offset-md-4 col-md-4 offset-sm-3 col-sm-6 ">
		<div class="card-header p-2 text-center">
			<h3>Admin Login	</h3>
		</div>
		<div class="card-body">
			<b>
			<form method="POST">
				<div class="form-group">
					<label><i class="fa fa-user mr-2"></i>Admin Name :</label>
					<input type="text" name="a_name" class="form-control">
				</div>
				<div class="form-group">
					<label><i class="fa fa-key mr-2"></i>Password :</label>
					<input type="password" name="a_pass" class="form-control">
				</div>
				<div class="form-group text-right">
					
					<input type="submit" name="submit" class="btn btn-outline-success" value="login">
					
				</div>

			</form>
			</b>

		</div>
		
	</div>
</div>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
		$a_name = $_POST['a_name'];
		$a_pass = $_POST['a_pass'];
		$run = $conn->query("SELECT a_id FROM admin WHERE a_name='$a_name' AND a_pass='$a_pass'");
		if (mysqli_num_rows($run) > 0) {
			$row = $run->fetch_assoc();
			$_SESSION['id'] = $row['a_id'];
			$_SESSION['admin'] = '1';
			header('location:dashboard.php');
		}else{
			header('location:login.php');
		}
	}
?>