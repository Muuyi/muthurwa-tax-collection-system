<?php
	require_once("admins/db.php");
	////////////////////////////////////ADMIN SECTION //////////////////////////////////
		//CONFIRMING IF THE ID EXISTS
			if(isset($_POST['get_id'])){
				$q = "SELECT * FROM businesses WHERE own_id='".$_POST['id_no']."'";
				$rQ = mysqli_query($con, $q);
				$count = mysqli_num_rows($rQ);
				if($count > 0){
					$result = 'exists';
				}else{
					$result = 'unavailable';
				}
				$data = array();
				$data['result'] = $result;
				while($row = mysqli_fetch_array($rQ)){
					$data['bs_id'] = $row['bs_id'];
				}
				echo json_encode($data);
			}
		//VIEWING UNPAID TAXES
			if(isset($_POST['get_unpaidtaxes'])){
					$query = "";
					$output = array();
					$query .= "SELECT * FROM businesses where bs_id NOT IN (SELECT bs_id FROM tax_payments WHERE  tax_yr='".$_POST['yr']."' AND tax_period='".$_POST['month']."' GROUP BY bs_id)";
					if(isset($_POST["search"]['value'])){
						$query .= ' AND (bs_name LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_name LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_id LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_phone LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_email LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR tax_amount LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR reg_date LIKE "%'.$_POST["search"]['value'].'%")';
					}
					if(isset($_POST["order"])){
						$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
					}else{
						$query .= 'ORDER BY businesses.bs_id DESC ';
					}
					if($_POST["length"] != -1){
						$query .='LIMIT '.$_POST['start'].', '.$_POST['length'];
					}
					$runQuery = mysqli_query($con, $query);
					if($runQuery){
						$data = array();
						$noOfRows = mysqli_num_rows($runQuery);
						$i = 0;
						while($row = mysqli_fetch_array($runQuery)){
							$i++;
							$sub_array = array();
							$sub_array[] = $i;
							$sub_array[] = $row['bs_name'];
							$sub_array[] = $row['own_name'];
							$sub_array[] = $row['own_id'];
							$sub_array[] = $row['own_phone'];
							$sub_array[] = $row['own_email'];
							$data[] = $sub_array;
						}
						$output = array(
							"draw"			=>	intval($_POST["draw"]),
							"recordsTotal"	=>	$noOfRows,
							"recordsFiltered" =>get_unpaidtaxes($con),
							"data"			=>	$data	

						);
						echo json_encode($output);
					}else{
						echo mysqli_error($con);
					}
				
			}
				function get_unpaidtaxes($con){
					$q = "SELECT * FROM tax_payments INNER JOIN businesses ON tax_payments.bs_id=businesses.bs_id WHERE NOT tax_yr='".$_POST['yr']."' AND tax_period='".$_POST['month']."'";
					$rQ = mysqli_query($con, $q);
					return mysqli_num_rows($rQ);
				}
		//SAVE TAX
			if(isset($_POST['save_tax'])){
				$q = "INSERT INTO tax_payments (tax_period,tax_yr,bs_id,pay_mode,pay_date) VALUES('".$_POST['tax_period']."','".$_POST['yr']."','".$_POST['bs_id']."','".$_POST['pay_mode']."',now())";
				$rQ = mysqli_query($con, $q);
				if($rQ){
					echo '<div class="alert alert-success">You have successfully updated tax payments records!A copy of the receipt has been sent to your email!</div>';
				}
			}
		//VIEWING TAX TABLE
			if(isset($_POST['view_tax_table'])){
					$query = "";
					$output = array();
					$query .= "SELECT * FROM tax_payments INNER JOIN businesses ON tax_payments.bs_id=businesses.bs_id WHERE ";
					if(isset($_POST["search"]['value'])){
						$query .= '(bs_name LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_name LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_id LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_phone LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_email LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR tax_amount LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR pay_mode LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR reg_date LIKE "%'.$_POST["search"]['value'].'%")';
					}
					if(isset($_POST["order"])){
						$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
					}else{
						$query .= 'ORDER BY pay_date DESC ';
					}
					if($_POST["length"] != -1){
						$query .='LIMIT '.$_POST['start'].', '.$_POST['length'];
					}
					$runQuery = mysqli_query($con, $query);
					if($runQuery){
						$data = array();
						$noOfRows = mysqli_num_rows($runQuery);
						$i = 0;
						while($row = mysqli_fetch_array($runQuery)){
							$i++;
							$sub_array = array();
							$sub_array[] = $i;
							$sub_array[] = $row['bs_name'];
							$sub_array[] = $row['own_name'];
							$sub_array[] = $row['own_id'];
							$sub_array[] = $row['own_phone'];
							$sub_array[] = $row['own_email'];
							$sub_array[] = $row['pay_mode'];
							$sub_array[] = '<a href="pdfs/receipts.php?tax_id='.$row['tax_id'].'" target="_blank"><input type="button" class="btn btn-warning btn-xs edit_business" value="Print receipt" id='.$row['tax_id'].'/></a>';
							$sub_array[] = $row['pay_date'];
							$data[] = $sub_array;
						}
						$output = array(
							"draw"			=>	intval($_POST["draw"]),
							"recordsTotal"	=>	$noOfRows,
							"recordsFiltered" =>get_taxes($con),
							"data"			=>	$data	

						);
						echo json_encode($output);
					}else{
						echo mysqli_error($con);
					}
				
				}
				function get_taxes($con){
					$q = "SELECT * FROM tax_payments INNER JOIN businesses ON tax_payments.bs_id=businesses.bs_id";
					$rQ = mysqli_query($con, $q);
					return mysqli_num_rows($rQ);
				}
		//GETTING BUSINESS DATA AND APPLYING IT TO PAYMENT SECTION
			if(isset($_POST['get_bs_content'])){
				$q = "SELECT * FROM businesses WHERE bs_id='".$_POST['bs_id']."'";
				$rQ = mysqli_query($con, $q);
				$data = array();
				while($row = mysqli_fetch_array($rQ)){
					$data['bs_id'] = $row['bs_id'];
					$data['bs_name'] = $row['bs_name'];
					$data['own_name'] = $row['own_name'];
					$data['tax_amount'] = $row['tax_amount'];
					$data['own_id'] = $row['own_id'];
				}
				echo json_encode($data);
			}
		//DELETING BUSINESS DATA FROM THE DATABASE
			if(isset($_POST['delete_business'])){
				$q = "DELETE FROM businesses WHERE bs_id='".$_POST['bs_id']."'";
				$rQ = mysqli_query($con, $q);
				if($rQ){
					echo 'Data has been successfully deleted!';
				}
			}
		//VIEW BUSINESS TABLE
			if(isset($_POST['view_business'])){
					$query = "";
					$output = array();
					$query .= "SELECT * FROM businesses WHERE ";
					if(isset($_POST["search"]['value'])){
						$query .= '(bs_name LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_name LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_id LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_phone LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR own_email LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR tax_amount LIKE "%'.$_POST["search"]['value'].'%"';
						$query .= 'OR reg_date LIKE "%'.$_POST["search"]['value'].'%")';
					}
					if(isset($_POST["order"])){
						$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
					}else{
						$query .= 'ORDER BY bs_id ASC ';
					}
					if($_POST["length"] != -1){
						$query .='LIMIT '.$_POST['start'].', '.$_POST['length'];
					}
					$runQuery = mysqli_query($con, $query);
					if($runQuery){
						$data = array();
						$noOfRows = mysqli_num_rows($runQuery);
						$i = 0;
						while($row = mysqli_fetch_array($runQuery)){
							$i++;
							$sub_array = array();
							$sub_array[] = $i;
							$sub_array[] = $row['bs_name'];
							$sub_array[] = $row['tax_amount'];
							$sub_array[] = $row['own_name'];
							$sub_array[] = $row['own_id'];
							$sub_array[] = $row['own_phone'];
							$sub_array[] = $row['own_email'];
							$sub_array[] = $row['reg_date'];
							$sub_array[] = '<input type="button" class="btn btn-primary btn-xs edit_business" value="Edit" id='.$row['bs_id'].'/>';
							$sub_array[] = '<input type="button" class="btn btn-danger btn-xs delete_business" value="Delete" id='.$row['bs_id'].'/>';
							$data[] = $sub_array;
						}
						$output = array(
							"draw"			=>	intval($_POST["draw"]),
							"recordsTotal"	=>	$noOfRows,
							"recordsFiltered" =>get_all_businesses($con),
							"data"			=>	$data	

						);
						echo json_encode($output);
					}else{
						echo mysqli_error($con);
					}
				
				}
				function get_all_businesses($con){
					$q = "SELECT * FROM businesses";
					$rQ = mysqli_query($con, $q);
					return mysqli_num_rows($rQ);
				}
		//SAVING THE BUSINESS DATA TO THE DATABASE
			if(isset($_POST['save_business'])){
				if($_POST['action'] == 'save'){
					$q = "INSERT INTO businesses (bs_name,own_name,own_id,own_phone,own_email,tax_amount,reg_date) VALUES('".$_POST['bname']."','".$_POST['oname']."','".$_POST['oid']."','".$_POST['ophone']."','".$_POST['email']."','".$_POST['tax']."',now())";
					$rQ = mysqli_query($con, $q);
					if($rQ){
						echo '<div class="alert alert-success">The business has been successful saved!</div>';
					}
				}
				if($_POST['action'] == 'edit'){
					$q = "UPDATE businesses SET bs_name='".$_POST['bname']."',own_name='".$_POST['oname']."',own_id='".$_POST['oid']."',own_phone='".$_POST['ophone']."',own_email='".$_POST['email']."',tax_amount='".$_POST['tax']."' WHERE bs_id='".$_POST['bs_id']."'";
					$rQ = mysqli_query($con, $q);
					if($rQ){
						echo "<div class='alert alert-success'>Data has been successfully updated!</div>";
					}
				}
			}
		//POPULATING BUSINESS FORM WITH DATABASE VALUES
			if(isset($_POST['bs_form_data'])){
				$q = "SELECT * FROM businesses WHERE bs_id='".$_POST['bs_id']."'";
				$rQ = mysqli_query($con, $q);
				$data = array();
				while($row = mysqli_fetch_array($rQ)){
					$data['bs_id'] = $row['bs_id'];
					$data['bname'] = $row['bs_name'];
					$data['tax'] = $row['tax_amount'];
					$data['oname']=$row['own_name'];
					$data['oid']=$row['own_id'];
					$data['ophone']=$row['own_phone'];
					$data['email']=$row['own_email'];
				}
				echo json_encode($data);
			}

?>