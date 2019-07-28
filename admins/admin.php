<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	if(!isset($_SESSION['email'])){
		echo "<script>window.open('../login.php','_self')</script>";
	}else{
		require_once("db.php");
		//require_once ("functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<meta name="viewport" content="user-scalable=no, width=device-width" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.css" />
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="styles/admin.css" />
		<style>
		label{
			font-weight:bolder;
		}
		.warning_msg{
			color:#FF0000;
		}
		.warning_bd{
			border:1px solid #FF0000;
		}
		.error{color:#FF0000;}
		h1{text-align:center;color:#A52A2A; font-weight:bolder;}
	</style>
	</head>
	<body id="adminBody" style="width:100%;">
		<header class="row" style="border-bottom:10px groove #00008B;">
			<img src="images/logo.png" width="100%" height="150px" />
			<div class="menu"><span class="menu-text">MENU</span><i class="fa fa-bars"></i></div>
		</header>
		<section id="row">
			<aside class="admin" id="adminMenu" style="background-color:#ff4500;">
			<!--////////////////////////////////////HOSTEL ID//////////////////////////////////////////////////////////////-->
				<input type="hidden" id="hostel_id" value="<?php echo $_SESSION['hostel']?>" />
				<i class="fa fa-times"></i>
				<center>
				<div class="AdminUser" i>
					<?php
						if(isset($_SESSION['email'])){
							echo "Hello " . $_SESSION['email'] . "! Welcome!";
						}
					?>
				</div>
				</center>
				<nav id="adminNav">
					<h5>Manage Content</h5>
					<ul id="adminNav-ul">
						<li><a href="admin.php?add_admin"> Add Admin</a></li>
						<li class="has-sub"><a href="admin.php?available_business">Availabel Businesses</a></li>
						<li class="has-sub"><a href="admin.php?collect_tax">Tax collection</a></li>
						<li class="has-sub"><a href="admin.php?unpaid_tax">Unpaid taxes</a></li>
						<li><a href="logout.php" class="AsideLinks">Log out</a></li>
					</ul>
				</nav>
			</aside>
			<article class="container-fluid admin" id="adminContent">
				<?php 
							if(!isset($_GET['add_admin'])){
								if(!isset($_GET['available_business'])){

								}}
				?>
				<?php
						if(isset($_GET['add_admin'])){
							include ("add_admin.php");
						}
						if(isset($_GET['available_business'])){
							include ("available_businesses.php");
						}
						if(isset($_GET['collect_tax'])){
							include ("collect_tax.php");
						}
						if(isset($_GET['unpaid_tax'])){
							include ("unpaidtaxes.php");
						}
				?>
			</article>
			
		</section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			window.jQuery || document.write("<script src='../js/jquery-3.3.1.min.js'></\script>");
		</script>
		<script src="../js/formvalidation.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
		<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="../js/dataTables.bootstrap4.js"></script>
		<script src="../js/main.js"></script>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</body>
</html>
	<?php } ?>