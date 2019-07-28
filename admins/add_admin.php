<?php
	if(!isset($_SESSION['email'])){
		echo "<script>window.open('login.php?not_admin= You are not an Admin','_self')</script>";
	}else{
?>
			<h1 style="text-align:center;">Add Admin</h1>
			<form action="admin.php?add_admin" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<div class="row">
					<div class="col">
						<label>Admin names</label>
						<input type="text" name="name" class="form-control" Placeholder="Enter admin names"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<label>Admin email</label>
						<input type="text" name="email" class="form-control" Placeholder="Enter admin email"/>
					</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<label>Password</label>
						<input type="password" name="pass" class="form-control" Placeholder="Enter password " /><br />
					</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<input type="submit" class="btn btn-success form-control" name="add_admin" value="Add admin"/>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
	<?php } ?>
	<?php
		if(isset($_POST['add_admin'])){
			$name = mysqli_real_escape_string($con, $_POST['name']);
			$admin_pass = mysqli_real_escape_string($con, $_POST['pass']);
			$ad_pass = md5($admin_pass);
			$ad_email = mysqli_real_escape_string($con, $_POST['email']);
			$add_admin = "INSERT INTO admins (admin_name,admin_email,admin_password) values ('$name','$ad_email','$ad_pass')";
			$ad_adm = mysqli_query($con, $add_admin);
			if($ad_adm){
				echo "<script>alert('You have successfully added an admin')</script>";
				echo "<script>window.open('admin.php?add_admin','_self')</script>";
			}
			
		}
	?>