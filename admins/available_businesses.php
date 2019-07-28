<?php
	if(!isset($_SESSION['email'])){
		echo "<script>window.open('login.php?not_admin= You are not an Admin','_self')</script>";
	}else{
?>
<section class="row">
	<div class="col">
		<h1 style="text-align:center;">Available Businesses</h1>
		<button type="button" class="btn btn-success" id="view_business_form">Add business</button>
		<a href="pdfs/business_list.php" target="_blank"><button type="button" class="btn btn-info" id="view_business_form" style="margin:10px;">Print business list</button></a><br /><br />
		<div class="table-responsive">
			<table class="table table-stripped table-bordered" id="business_table">
				<thead>
					<th>No</th>
					<th>Business name</th>
					<th>Tax amount</th>
					<th>Owners name</th>
					<th>ID No</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Registration Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
			</table>
		</div>
	</div>
</section>
<div class="modal fade" id="add_business_modal">
	<div class="modal-dialog modal-lg">
		<form method="POST" id="add_business_form">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Add Business</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div id="save_form_response"></div>
					<div class="form-group">
						<label for="business-name">Business name</label>
						<input type="text" placeholder="Enter business name" id="bname" name="bus_name" class="form-control" />
					</div>
					<div class="form-group">
						<label for="tax">Tax amount</label>
						<input type="text" placeholder="Enter tax amount" id="tax" name="tax" class="form-control" />
					</div>
					<div class="form-group">
						<label for="business-name">Business owner's name</label>
						<input type="text" placeholder="Enter business owner's name" id="oname" name="owners_name" class="form-control" />
					</div>
					<div class="form-group">
						<label for="business-name">Business owner's ID number</label>
						<input type="text" placeholder="Enter business owner's ID number" id="oid" name="id_no" class="form-control" />
					</div>
					<div class="form-group">
						<label for="business-name">Business owner's phone number</label>
						<input type="text" placeholder="Enter business owner's phone number" id="ophone" name="owners_phone" class="form-control" />
					</div>
					<div class="form-group">
						<label for="business-name">Business owner's email address</label>
						<input type="text" placeholder="Enter business owner's email address" id="email" name="owners_email" class="form-control" />
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" value="save" id="bs_id" />
					<input type="hidden" value="save" id="action" />
					<button type="button" class="btn btn-success" id="save_business">Add Business</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
	}
?>