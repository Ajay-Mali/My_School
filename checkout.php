</!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	include 'includes/db.php'; 
	include 'includes/csslinks.php'; 
	include 'includes/jslinks.php';
	if (!isset($_SESSION['id'])) {
		header('location:student_area/login.php');
	}
	?>
</head>
<body>
<div class="container-fluid">
	<div class="card shadow px-0 offset-md-4 col-md-4 offset-sm-3 col-sm-6 ">
		<div class="card-header p-2 text-center">
			<h3>Send Money This Number</h3>
			<h5>+910250225855</h5>
		</div>
		<div class="card-body">
			<?php $id = $_GET['c_id'];
				$show = $conn->query("SELECT * FROM course WHERE c_id = '$id'");
				$row = $show->fetch_assoc();
			  ?>
			<b>
			<form method="POST">
				<div class="form-group">
					<label><i class="fa fa-book mr-2"></i>Courses Name :</label>
					<input type="text" name="c_name" value="<?php echo $row['c_name'] ?>" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label><i class="fa fa-money mr-2"></i>Amount :</label>
					<input type="text" name="c_amount" value="<?php echo $row['c_sprice'] ?>" class="form-control" readonly="">
				</div>
				<div class="form-group">
					<label><i class="fa fa-bank mr-2"></i>Select Payment Mode :</label>
					<select name="pay_mode" class="form-control">
						<option value="google_pay">Google Pay</option>
						<option value="phone_pay">Phone Pay</option>
					</select>
				</div>
				<div class="form-group">
					<label><i class="fa fa-vcard-o mr-2"></i>Transection Number:</label>
					<input type="text" name="t_number" class="form-control">
				</div>
				<div class="form-group">
					<label><i class="fa fa-safari mr-2"></i>Transection Date:</label>
					<input type="date" name="t_date" class="form-control">
				</div>
				<div class="form-group text-right">
					
					<input type="submit" name="submit" class="btn btn-outline-success" value="Confirm Payment">
				</div>
			</form>
			</b>
		</div>
			
	</div>
	<a href="../index.php" class="btn btn-block btn-outline-info offset-md-4 col-md-4 offset-sm-3 col-sm-6 my-5 shadow-lg">Back To Home</a>
</div>
</body>
</html>
<?php
	if (isset($_POST['submit'])) {
		$c_id = $_GET['c_id'];
		$s_id = $_SESSION['id'];
		$c_name = $_POST['c_name'];
		$c_amount = $_POST['c_amount'];
		$pay_mode = $_POST['pay_mode'];
		$t_number = $_POST['t_number'];
		$t_date = $_POST['t_date'];
		$admin = '0';
	echo"<script>alert('$c_id , $s_id , $c_name , $c_amount , $pay_mode , $t_number , $t_date , $admin')</script>";
		// echo"<script>alert('$c_id $s_id $c_name $c_amount $pay_mode $t_number $t_date 
		// $admin')</script>";
		if ($conn->query("INSERT INTO course_order(s_id,c_id,c_name,c_amount,t_mode,t_number,t_date,admin_status) VALUES ('$s_id','$c_id','$c_name','$c_amount','$pay_mode','$t_number','$t_date','$admin')")) {
			header('location:student_area/my_courses.php');
		}else{
			echo"<script>alert('Check Query')</script>";
		}
	}

?>
