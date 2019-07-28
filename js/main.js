$(document).ready(function(){
	//////////////////////////////////////ADMINS SECTION SCRIPTS/////////////////////////////////////////
		//PRINTING UNPAYED TAXES
			$("#print_unpayed").click(function(){
				var tax_period = $("#month").val();
				var yr = $("#yr").val();
				window.open('pdfs/unpaidtaxes_pdf.php?month='+tax_period+'&yr='+yr+'','_self');
			});
		//SUBMITTING CLIENTS PAYMENTS TO THE DATABASE
			$(document).on('click','#submit_cl_payment',function(e){
				e.preventDefault();
				var pay_mode = $("#pay_mode_client").val();
				var tax_period = $("#month").val();
				var bs_id = $("#bs_val").val();
				var yr = $("#yr").val();
				var save_tax = '';
				$.ajax({
					url:'ajax.php',
					method:'POST',
					data:{bs_id:bs_id,tax_period:tax_period,save_tax:save_tax,pay_mode:pay_mode,yr:yr},
					success:function(data){
						alert("Records have been successfully updated!Visit your email to address to get your receipt!");
						$("#payments_response").html(data).fadeOut(10000);
						$("#client_pay_form")[0].reset();
						$("#payments_content").html('');
					}
				});
			})
		//CUSTOMER PAYMENT SECTION
			$("#pay_mode_client").change(function(){
				var id_no = $("#cl_id").val();
				var mode = $(this).val();
				var get_id = '';
				if(id_no == ''){
					$("#cl_id").css({"border-color":"red","background-color":"red"});
					$(".id_response").text("Please enter your ID number before selecting the payment mode!")
				}else{
					$.ajax({
						url:'ajax.php',
						method:"POST",
						data:{id_no:id_no,get_id:get_id},
						dataType:'json',
						success:function(data){
							if(data.result == 'exists'){
								if(mode == 'mpesa'){
									$("#payments_content").html('<div style="margin-left:10px;"><h5>Follow the following steps to pay</h5><ol><li>Gi ti MPESA menu on your mobile phone</li><li>Press Lipa na M-PESA</li><li>Select Pay Bill</li><li>Enter business number <b>558945</b></li><li>Enter account number <b>'+id_no+'</></li><p><b><i>Please wait for the confirmation message before submitting</i></b></p></ol></div><div class="form-group"><button id="submit_cl_payment" class="btn btn-success form-control">Submit payment</button></div>');
								}
								$("#bs_val").val(data.bs_id);
							}else{
								$(".id_response").text("The value of the ID No entered does not exist. Please check to ensure you have entered a correct value!")
								$("#cl_id").css({"border-color":"red","background-color":"red"});
							}
						}
					});
				}
			})
		//VIEWING THE UNPAID TAXES
			$("#view_unpaidtaxes").click(function(){
				var yr = $("#yr").val();
				var month = $("#month").val();
				var get_unpaidtaxes = '';
				var unpaid_taxes = $("#unpaidtaxes_table").DataTable({
					"processing":true,
					"serverSide":true,
					"order":[],
					"ajax":{
						url:"../ajax.php",
						method:"POST",
						data:{get_unpaidtaxes:get_unpaidtaxes,month:month,yr:yr},
					},
					"columnDefs":[{
						"target":[3],
						"orderable":false,
					}],
					"pageLength":25
				});
			})
		//SUBMITTING TAX DETAILS TO THE DATABASE
			$(document).on('click','#submit_payment',function(e){
				e.preventDefault();
				var bs_id = $("#bs_id").val();
				var tax_amount = $("#tax_amount").val();
				var tax_period = $("#month").val();
				var pay_mode = $("#payment_mode").val();
				var yr = $("#yr").val();
				var save_tax = '';
				$.ajax({
					url:'../ajax.php',
					method:'POST',
					data:{bs_id:bs_id,tax_period:tax_period,save_tax:save_tax,pay_mode:pay_mode,yr:yr},
					success:function(data){
						$("#payments_response").html(data).fadeOut(10000);
						$("#payments_form")[0].reset();
					}
				});
			});
		//SELECTING ID NUMBER
			$("#id_no").change(function(){
				$("#pay_mode_section").html('<label for="mode">Select payment mode</label><select class="form-control" id="payment_mode"><option value="">Select Payment mode</option>							<option value="cash">Cash</option><option value="mpesa">M-Pesa</option><option value="airtell">Airtell Money</option><option value="paypal">Equitell</option></select>');
				var bs_id = $(this).val();
				var get_bs_content = '';
				$.ajax({
					url:'../ajax.php',
					method:'POST',
					data:{bs_id:bs_id,get_bs_content:get_bs_content},
					dataType:'json',
					success:function(data){
						$("#bs_id").val(data.bs_id);
						$("#bs_name").val(data.bs_name);
						$("#own_name").val(data.own_name);
						$("#own_id").val(data.own_id);
						$("#tax_amount").val(data.tax_amount);
					}
				})
			});
		//SELECTING THE PAYMENT MODE
			$(document).on('change','#payment_mode',function(){
				var mode = $(this).val();
				var bs_name = $('#bs_name').val();
				var owner = $('#own_name').val();
				var owner_id = $('#own_id').val();
				var tax = $('#tax_amount').val();
				var bs_id = $('#bs_id').val();
				if(mode == 'cash'){
					$("#pay_info").html('<div class="form-group">Receive <b>Kshs.'+tax+'</b> from <b>'+owner+'</b> of '+bs_name+'</div><div class="form-group"><button id="submit_payment" class="btn btn-success form-control">Submit payment</button></div>');
				}else if(mode == 'mpesa'){
					$("#pay_info").html('<div style="margin-left:10px;"><h5>Follow the following steps to pay</h5><ol><li>Gi ti MPESA menu on your mobile phone</li><li>Press Lipa na M-PESA</li><li>Select Pay Bill</li><li>Enter business number <b>558945</b></li><li>Enter account number <b>'+owner_id+'</></li><p><b><i>Please wait for the confirmation message before submitting</i></b></p></ol></div><div class="form-group"><button id="submit_payment" class="btn btn-success form-control">Submit payment</button></div>');
				}
			});
		//VIEW BUSINESS FORM TO ADD DATA
			$("#view_business_form").click(function(){
				$("#add_business_form")[0].reset();
				$("#add_business_modal").modal('show');
			})
		//DELETE BUSINESS
			$(document).on('click','.delete_business',function(){
				var bs_id = $(this).attr('id');
				var delete_business = '';
				if(confirm('Are you sure you want to delete this business!')){
					$.ajax({
						url:'../ajax.php',
						method:'POST',
						data:{bs_id:bs_id,delete_business:delete_business},
						success:function(data){
							alert(data);
							businesses_table.ajax.reload(true);
						}
					});
				}
			})
		//POPULATING THE ADD BUSINESS FORM WITH DATABASE VALUES
			$(document).on('click','.edit_business',function(){
				var bs_id = $(this).attr("id");
				var bs_form_data = '';
				$.ajax({
					url:'../ajax.php',
					method:'POST',
					data:{bs_id:bs_id,bs_form_data:bs_form_data},
					dataType:'json',
					success:function(data){
						$("#bname").val(data.bname);
					 	$("#oname").val(data.oname);
					 	$("#tax").val(data.tax);
						$("#oid").val(data.oid);
						$("#ophone").val(data.ophone);
						$("#email").val(data.email);
						$("#action").val('edit');
						$("#bs_id").val(data.bs_id);
						$(".modal-title").text('Edit business');
						$("#save_business").text('Update business');
						$("#add_business_modal").modal('show');
					}
				})
			});
		//DISPLAYING ADMIN DATA IN A TABLE
			var view_business = '';
			var businesses_table = $("#business_table").DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
					url:"../ajax.php",
					method:"POST",
					data:{view_business:view_business},
				},
				"columnDefs":[{
					"target":[3],
					"orderable":false,
				}],
				"pageLength":25
			});
		//DISPLAYING TAX DETAILS
			var view_tax_table = '';
			var tax_table = $("#tax_table").DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
					url:"../ajax.php",
					method:"POST",
					data:{view_tax_table:view_tax_table},
				},
				"columnDefs":[{
					"target":[3],
					"orderable":false,
				}],
				"pageLength":25
			});
		//SAVING BUSINESSES IN THE DATABASE
			$("#save_business").click(function(){
				var bname = $("#bname").val();
				var oname = $("#oname").val();
				var tax = $("#tax").val();
				var oid = $("#oid").val();
				var ophone = $("#ophone").val();
				var email = $("#email").val();
				var action = $("#action").val();
				var bs_id = $("#bs_id").val();
				var save_business = '';
				$.ajax({
					url:'../ajax.php',
					method:'POST',
					data:{bname:bname,oname:oname,oid:oid,ophone:ophone,email:email,save_business:save_business,action:action,bs_id:bs_id,tax:tax},
					success:function(data){
						$("#save_form_response").html(data).fadeOut(10000);
						$("#add_business_form")[0].reset();
						businesses_table.ajax.reload(true);
					}
				});
			});
});