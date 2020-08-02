<?php
define('PAGE', 'dashboard');
require_once('includes/top.php');
?>
<div class="container overflow-hidden">
	<div class="row">
		<div class="col-md-3 col-sm-10 m-auto">
			<div class="card text-white bg-primary mb-3 text-center">
			   <div class="card-header">Students</div>
			  <div class="card-body">
			    <h5 class="card-title"><?php $run_student = $conn->query("SELECT * FROM student");
			    echo mysqli_num_rows($run_student); ?></h5>
			    <a href="view_students.php" class="card-text text-white">View</a>
			  </div>
			</div>
		</div>

		<div class="col-md-3 col-sm-10 m-auto">
			<div class="card text-white bg-secondary mb-3 text-center">
			  <div class="card-header">Courses</div>
			  <div class="card-body">
			    <h5 class="card-title"><?php $run_course = $conn->query("SELECT * FROM course");
			    echo mysqli_num_rows($run_course); ?></h5>
			    <a href="view_courses.php" class="card-text text-white">View</a>
			  </div>
			</div>
		</div>

		<div class="col-md-3 col-sm-10 m-auto">
			<div class="card text-white bg-success mb-3 text-center">
			  <div class="card-header">Total Orders</div>
			  <div class="card-body">
			    <h5 class="card-title"><?php $run_order = $conn->query("SELECT * FROM course_order");
			    echo mysqli_num_rows($run_order); ?></h5>
			    <a href="" class="card-text text-white">View</a>
			  </div>
			</div>
		</div>
	</div>
	
	
		<div class="w-100 text-center bg-dark text-white h2 m-0">courses Order</div>
		<table class="table table-hover text-center table-responsive">
			<thead class="">
				<th width="5%">s no</th>
				<th width="20%">Transection Number</th>
				<th width="10%">Course Id</th>
				<th width="30%">Student Email</th>
				<th width="10%">Order Date</th>
				<th width="10%">Amount</th>
				<th width="10%">Action</th>
			</thead>
			<tbody>
				<?php 
					$run = $conn->query("SELECT * FROM course_order");
					$i = 1;
					while ($row = $run->fetch_assoc()) {
						$id = $row['s_id'];
						$run_s = $conn->query("SELECT s_email FROM student WHERE s_id='$id'");
						while ($row_s = $run_s->fetch_assoc()) {
							
							if($row['admin_status'] == '0'){
								echo "<tr>
										<td>".$i."</td>
										<td>".$row['t_number']."</td>
										<td>".$row['c_name']."</td>
										<td>".$row_s['s_email']."</td>
										<td>".$row['t_date']."</td>
										<td>".$row['c_amount']."</td>
										<td><form method='POST' class='d-inline'>
											<input type='hidden' name='o_id' value='".$row['o_id']."'>
											<button type='submit' name='active' class='btn btn-sm btn-info mr-2 d-inline' title='Active'><i class='fa fa-eye'></i></button>
											</form>
											<form method='POST' class='d-inline'>
											<input type='hidden' name='o_id' value='".$row['o_id']."'>
											<button type='submit' name='del' class='btn btn-secondary btn-sm d-inline'><i class='fa fa-trash-o'></i></button>
											</form>
										</td>
									</tr>";
									$i++;
							}
							
						}
					}
				?>
				
			</tbody>
		</table>
	</div>
	
</div>
<?php require_once('includes/bottom.php');
	if (isset($_POST['active'])) {
		$id = $_POST['o_id'];
		if ($conn->query("UPDATE course_order SET admin_status = '1' WHERE o_id = '$id'")) {
			echo "<script>window.open('dashboard.php','_self')</script>";
		}
	}
	if (isset($_POST['del'])) {
		$id = $_POST['o_id'];
		if ($conn->query("DELETE FROM course_order WHERE o_id = '$id'")) {
			echo "<script>window.open('dashboard.php','_self')</script>";
		}
	}
?>