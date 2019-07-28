<?php
    require_once("header.php");
?>
<section class="container-fluid">
	<article class="row">
		<div class="col-8">
			<div id="demo" class="carousel slide" data-ride="carousel">
			  	<!-- Indicators -->
			 	<ul class="carousel-indicators">
			   	 	<li data-target="#demo" data-slide-to="0" class="active"></li>
			    	<li data-target="#demo" data-slide-to="1"></li>
			    	<li data-target="#demo" data-slide-to="2"></li>
			    	<li data-target="#demo" data-slide-to="3"></li>
			    	<li data-target="#demo" data-slide-to="4"></li>
			    	<li data-target="#demo" data-slide-to="5"></li>
			  	</ul>
			  <!-- The slideshow -->
			  	<div class="carousel-inner">
			    	<div class="carousel-item active">
			      		<img class="image-fluid" src="images/muthurwa1.jpg" alt="Los Angeles" style="width:100%;">
			      		<div class="carousel-caption">
			      			<h4>Muthurua Market Center</h4>
			      			<p>Activities around Muthurua market center</p>
			      		</div>
			    	</div>
			    	<div class="carousel-item">
			      		<img class="image-fluid" src="images/muthurwa2.jpg" alt="Chicago" style="width:100%;">
			      		<div class="carousel-caption">
			      			<h4>Muthurua Market Center</h4>
			      			<p>Activities around Muthurua market center</p>
			      		</div>
			    	</div>
			    	<div class="carousel-item">
			      		<img class="image-fluid" src="images/muthurwa3.jpg" alt="New York" style="width:100%;">
			      		<div class="carousel-caption">
			      			<h4>Muthurua Market Center</h4>
			      			<p>Activities around Muthurua market center</p>
			      		</div>
			    	</div>
			    	<div class="carousel-item">
			      		<img class="image-fluid" src="images/muthurwa4.jpg" alt="Chicago" style="width:100%;">
			      		<div class="carousel-caption">
			      			<h4>Muthurua Market Center</h4>
			      			<p>Activities around Muthurua market center</p>
			      		</div>
			    	</div>
			    	<div class="carousel-item">
			      		<img class="image-fluid" src="images/muthurwa5.png" alt="New York" style="width:100%;">
			      		<div class="carousel-caption">
			      			<h4>Muthurua Market Center</h4>
			      			<p>Activities around Muthurua market center</p>
			      		</div>
			    	</div>
			    	<div class="carousel-item">
			      		<img class="image-fluid" src="images/muthurwa7.jpg" alt="New York" style="width:100%; ">
			      		<div class="carousel-caption">
			      			<h4>Muthurua Market Center</h4>
			      			<p>Activities around Muthurua market center</p>
			      		</div>
			    	</div>
			  	</div>

			  <!-- Left and right controls -->
			  	<a class="carousel-control-prev" href="#demo" data-slide="prev">
			    	<span class="carousel-control-prev-icon"></span>
			  	</a>
			  	<a class="carousel-control-next" href="#demo" data-slide="next">
			    	<span class="carousel-control-next-icon"></span>
			  	</a>
			</div>
		</div>
		<div class="col-4">
			<h3>REGISTER BUSINESS</h3>
			<form method="POST">
				<div class="form-group">
					<label for="business-name">Business name</label>
					<input type="text" placeholder="Enter business name" name="bus_name" class="form-control" />
				</div>
				<div class="form-group">
					<label for="business-name">Business owner's name</label>
					<input type="text" placeholder="Enter business owner's name" name="owners_name" class="form-control" />
				</div>
				<div class="form-group">
					<label for="business-name">Business owner's ID number</label>
					<input type="text" placeholder="Enter business owner's ID number" name="id_no" class="form-control" />
				</div>
				<div class="form-group">
					<label for="business-name">Business owner's phone number</label>
					<input type="text" placeholder="Enter business owner's phone number" name="owners_phone" class="form-control" />
				</div>
				<div class="form-group">
					<label for="business-name">Business owner's email address</label>
					<input type="text" placeholder="Enter business owner's email address" name="owners_email" class="form-control" />
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success form-control" name="save_business" value="Submit business" />
				</div>
			</form>
			<?php
				if(isset($_POST['save_business'])){
					$bname = mysqli_real_escape_string($con, $_POST['bus_name']);
					$owners_name = mysqli_real_escape_string($con, $_POST['owners_name']);
					$id_no = mysqli_real_escape_string($con, $_POST['id_no']);
					$owners_phone = mysqli_real_escape_string($con, $_POST['owners_phone']);
					$owners_email = mysqli_real_escape_string($con, $_POST['owners_email']);
					$q = "INSERT INTO businesses (bs_name,own_name,own_id,own_phone,own_email,reg_date) VALUES ('$bname','$owners_name','$id_no','$owners_phone','$owners_email',now())";
					$rQ = mysqli_query($con, $q);
					if($rQ){
						echo '<script>alert("You have successfully registered your business!")</script>';
						echo "<script>window.open('index.php','_self')</script>";
					}
				}
			?>
		</div>
	</article>
	<article class="row">
		<div class="col-4">
			<h3>Location</h3>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4002.2125280113373!2d36.83058950268518!3d-1.2859024354433988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f112e44e175c9%3A0x1f937c7163539fff!2sMuthurwa+Market!5e1!3m2!1ssw!2ske!4v1534051332819" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="col-4">
			<h3>Vision</h3>
			The City of Choice to invest, work and live in.
			<h3>Mission</h3>
			To provide affordable, accessible and sustainable quality services, enhancing community participation and creating a secure climate for political, social and economic development through the commitment of a motivated and dedicated team.
			<h3>Core Values</h3>
			Accountability,  transparency, excellence,  accessibility, integrity, responsiveness, equity and teamwork.
		</div>
		<div class="col-4">
			<div style="width:100%;text-align:center;background-color:#34495E;padding:5px; "><h3 style="color:#FFD700;">Payment section</h3></div>
		<form method="POST" id="client_pay_form">
			<div id="payments_response"></div>
			<div class="form-group">
				<label>Enter your ID number</label>
				<input type="text" class="form-control" id="cl_id" placeholder="Enter your ID No" />
			</div>
			<div class="form-group">
				<label>Select payment mode</label>
				<select class="form-control" id="pay_mode_client">
					<option val="">Select payment mode</option>
					<option value="mpesa">M-PESA</option>
					<option value="airtell">Aitell Money</option>
					<option value="equitel">Equitel</option>
				</select>
				<div class="form-group">
					<label>Select year</label>
					<select class="form-control" id="yr">
						<option value="">Select year</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
					</select>
				</div>
				<div class="form-group">
					<label for="month">Select month</label>
					<select class="form-control" id="month">
						<option value="">Select month</option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>
				<input type="hidden" id="bs_val" />
				<div class="id_response" style="color:#FF0000; font-weight:bolder;"></div>
				<div id="payments_content"></div>
			</div>
		</form>
		</div>
	</article>
</section>
<?php
    require_once("footer.php");
?>