<?php
define('PAGE', 'students');
require_once('includes/top.php');
?>
<div class="container">
	<div class="card-body">
		<div class="w-100 text-center bg-dark text-white h2">Students </div>
		<table class="table table-hover text-center table-responsive">
			<thead>
				<th width="5%">s no</th>
				<th width="10%">Student Id</th>
				<th width="20%">Student Name</th>
				<th width="20%">Student Email</th>
				<th width="10%">Action</th>
			</thead>
			<tbody>
				<?php $run = $conn->query("SELECT * FROM student");
					  $i=1;
					while ($row = $run->fetch_assoc()) {
						echo "<tr>
								<td>".$i."</td>
								<td>".$row['s_id']."</td>
								<td>".$row['s_name']."</td>
								<td>".$row['s_email']."</td>
								<td><a href='insert_student.php?e_id=".$row['s_id']."' class='btn btn-warning mr-2'><i class='fa fa-pencil'></i></a><a href='insert_student.php?e_id=".$row['s_id']."' class='btn btn-secondary'><i class='fa fa-trash-o'></i></a></td>
							</tr>";
					}
				  ?>
				
			</tbody>
		</table>
	</div>
	
		<a href="insert_student.php?a_Students" class="btn btn-info position-sticky font-weight-bold" style="top: 90%; left: 90%;">+</a>
	
</div>
<?php require_once('includes/bottom.php') ?>