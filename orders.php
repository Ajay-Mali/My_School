<?php
define('PAGE', 'orders');
require_once('includes/top.php');
?>
<div class="container overflow-hidden">
	<div class="w-100 text-center bg-dark text-white h2 m-0">courses Orders</div>
		<table class="table table-hover text-center table-responsive">
			<thead class="">
				<th width="5%">s no</th>
				<th width="20%">Transection Number</th>
				<th width="10%">Course Name</th>
				<th width="20%">Student Email</th>
				<th width="20%">Order Date</th>
				<th width="10%">Amount</th>
				<th width="10%">Action</th>
			</thead>
			<tbody>
				<?php 
					$run = $conn->query("SELECT * FROM course_order ORDER BY o_id DESC");
					$i = 1;
					while ($row = $run->fetch_assoc()) {
						$id = $row['s_id'];
						$run_s = $conn->query("SELECT s_email FROM student WHERE s_id='$id'");
						while ($row_s = $run_s->fetch_assoc()) {
							echo "<tr>
										<td>".$i."</td>
										<td>".$row['t_number']."</td>
										<td>".$row['c_name']."</td>
										<td>".$row_s['s_email']."</td>
										<td>".$row['t_date']."</td>
										<td>".$row['c_amount']."</td>";
							if($row['admin_status'] == '0'){
										echo "<td><form method='POST' class='d-inline'>
											<input type='hidden' name='o_id' value='".$row['o_id']."'>
											<button type='submit' name='active' class='btn btn-sm btn-info mr-2 d-inline' title='Active'><i class='fa fa-eye'></i></button>
											</form>
											<form method='POST' class='d-inline'>
											<input type='hidden' name='o_id' value='".$row['o_id']."'>
											<button type='submit' name='del' class='btn btn-secondary btn-sm d-inline'><i class='fa fa-trash-o'></i></button>
											</form>
											</td>
									</tr>";
								}
							$i++;
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