<?php $this->load->view('layouts/header');?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>Users List</h2>
			<a href="<?php echo base_url();?>index.php/user/edit">Add New User</a>
		</div>
	</div>

	<div class="row">
		<?php 
			if(!empty($user_data)){
				echo "<table class='table'>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>";
						foreach ($user_data as $user) {
							echo "<tr>
								<td>".$user->first_name."</td>
								<td>".$user->last_name."</td>
								<td>".$user->address."</td>
								<td>".$user->email."</td>
								<td>".$user->phone_number."</td>
								<td><a class='glyphicon glyphicon-edit' href='".base_url()."index.php/user/edit/".$user->user_id."'>edit</a></td>
								<td><a class='glyphicon glyphicon-remove-sign' href='".base_url()."index.php/user/delete/".$user->user_id."'>delete</a></td>
							</tr>";
						}

				echo"</table>";
			}
			else{
				echo '<div class="alert alert-warning" role="alert">There are no any users to show</div>';
			}

		?>
			
		

		<?php?>

	</div>
</div>
</body>
</html>
