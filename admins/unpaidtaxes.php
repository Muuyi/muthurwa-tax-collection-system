<?php
	if(!isset($_SESSION['email'])){
		echo "<script>window.open('login.php?not_admin= You are not an Admin','_self')</script>";
	}else{
?>
<section class="row">
	<article class="col">
		<h1>Unpaid taxes</h1>
		<div class="row">
			<div class="col-4">
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
			</div>
			<div class="col-4">
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
			</div>
			<div class="col-2">
				<br />
				<input type="button" class="btn btn-success form-control" value="View data" id="view_unpaidtaxes"/>
			</div>
			<div class="col-2">
				<br />
				<input type="button" class="btn btn-warning form-control" id="print_unpayed" value="Print list" />
			</div>
		<div class="table-responsive">
			<table class="table table-bordered table-stripped" id="unpaidtaxes_table">
				<thead>
					<th>No</th>
					<th>Business Name</th>
					<th>Business owner</th>
					<th>ID No</th>
					<th>Phone number</th>
					<th>Email</th>
				</thead>
			</table>
		</div>
	</article>
</section>
<?php
	}
?>