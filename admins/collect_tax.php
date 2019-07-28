<?php
	if(!isset($_SESSION['email'])){
		echo "<script>window.open('login.php?not_admin= You are not an Admin','_self')</script>";
	}else{
?>
<section class="row">
	<article class="col">
		<h1>Paid taxes</h1>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#payment_modal">Tax payment</button>
		<div class="table-responsive">
			<table class="table table-bordered table-stripped" id="tax_table">
				<thead>
					<th>No</th>
					<th>Business Name</th>
					<th>Business owner</th>
					<th>ID No</th>
					<th>Phone number</th>
					<th>Email</th>
					<th>Payment mode</th>
					<th>Print</th>
					<th>Payment date</th>
				</thead>
			</table>
		</div>
	</article>
</section>
<div class="modal fade" id="payment_modal">
	<div class="modal-dialog modal-lg">
		<form method="POST" id="payments_form">
			<div class="modal-content">
				<div class="modal-header">
					<h3 >Tax payment section</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div id="payments_response"></div>
					<div class="form-group">
						<label for="mode">Select ID Number</label>
						<select class="form-control" id="id_no">
							<option value="">Select ID Number</option>
							<?php
								$q = "SELECT * FROM businesses";
								$rQ = mysqli_query($con, $q);
								while($row = mysqli_fetch_array($rQ)){
									echo'
										<option value="'.$row['bs_id'].'">'.$row['own_id'].'('.$row['bs_name'].')</option>
									';
								}
							?>
						</select>
					</div>
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
					<div class="form-group" id="pay_mode_section">
					</div>
					<div id="pay_info">
					</div>
					<input type="hidden" id="bs_id" />
					<input type="hidden" id="bs_name" />
					<input type="hidden" id="own_name" />
					<input type="hidden" id="own_id" />
					<input type="hidden" id="tax_amount" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
	}
?>