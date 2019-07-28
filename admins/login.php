<?php
	session_start();
	require_once("db.php");
	if(isset($_POST['login'])){
		$error = '';
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		//$pass = md5($password);
		$q = "SELECT * FROM admins WHERE admin_email='".$email."' AND admin_password='".$password."'";
		$rQ = mysqli_query($con, $q);
		$row = mysqli_fetch_array($rQ);
		if(mysqli_num_rows($rQ) > 0){
				$_SESSION['user_type'] = $row['user_type'];
				$_SESSION['hostel'] = $row['host_id'];
				$_SESSION['email'] = $row['admin_email'];
				header("location:admin.php");
		}else{
			$error = '<label class="alert alert-danger">The password or email you have entered is incorrect!Please try again!</label>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ESGRAY WESTLANDS MIXED HOSTEL</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="styles/lightbox.min.css" />
		<style>
			@media only screen and (max-width:599.99px){
				.card{
					width:100%;
					margin:auto;
					margin-top:50px;
				}
			}
			@media only screen and (min-width:600px){
				.card{
					width:50%;
					margin:auto;
					margin-top:50px;
				}
			}
			
			.input{
				border:none;
				border-bottom:1px solid #008000;
				width:100%;
			}
			.labels{
				color:#006400;
				font-weight:bolder;
			}
			h3{
				font-weight:bolder;
			}
			/*{
				margin:0px;
				background-color:#D3D3D3;
			}
			#admins{
				background-color:#FFFFFF;
			}
			.card{
				width:50%;
				background-color:#FFFFFF;
				z-index:1000;
			}*/
		</style>
	</head>
	<body>
			<div class="card">
				<div class="card-body">
			<form method="POST" action="login.php">
					<h3> Admin login</h3>
					<div><?php echo @$error; ?></div>
					<div class="form-group">
						<label class="labels">Enter email</label><br />
						<input type="text" class="input" name="email" placeholder="Enter email address" />
					</div>
					<div class="form-group">
						<label class="labels">Enter password</label><br />
						<input type="password" name="password" class="input" placeholder="Enter password" />
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Log in" class="btn btn-success" />
					</div>
					<a href="../index.php"><i>Back to home page</i></a> &nbsp; &nbsp; &nbsp; &nbsp;
			</form>
				</div>
			</div>
	</body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
			window.jQuery || document.write("<script src='../js/jquery-3.1.0.min.js'></\script>");
		</script>
		<script src="../../js/formvalidation.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		<script src="../../js/jquery.cycle.all.js"></script>
		<script src="../../js/jquery-ui.min.js"></script>
		<script src="js/lightbox.min.js"></script>
		<script src="js/main.js"></script>
</html>