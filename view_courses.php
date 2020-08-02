<?php
define('PAGE', 'courses');
require_once('includes/top.php');
?>
<div class="container">
	<div class="card-body">
		<div class="w-100 text-center bg-dark text-white h2">courses </div>
		<table class="table table-hover text-center table-responsive">
			<thead class="">
				<th width="5%">s no</th>
				<th width="10%">courses Id</th>
				<th width="20%">Name</th>
				<th width="20%">AUthor</th>
				<th width="10%">Action</th>
			</thead>
			<tbody>
				<?php $run = $conn->query("SELECT * FROM course");
					  $i=1;
					while ($row = $run->fetch_assoc()) {
						echo "<tr>
								<td>".$i."</td>
								<td>".$row['c_id']."</td>
								<td>".$row['c_name']."</td>
								<td>".$row['c_author']."</td>
								<td><a href='insert_courses.php?e_id=".$row['c_id']."' class='btn btn-warning mr-2'><i class='fa fa-pencil'></i></a><a href='insert_courses.php?e_id=".$row['c_id']."' class='btn btn-secondary'><i class='fa fa-trash-o'></i></a></td>
							</tr>";
							$i++;
					}
				  ?>
				
			</tbody>
		</table>
	</div>
	
		<a href="insert_courses.php?c_id " class="btn btn-info position-sticky font-weight-bold" style="top: 90%; left: 90%;">+</a>
	
</div>
<?php

require_once('includes/bottom.php');
?>