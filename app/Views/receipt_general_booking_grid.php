<?php

 // echo view('includes/header',$temple_details);
//   $sname = session()->get('name');
//print_r($count);
//die();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Receipt</title>
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/jquery-ui.css');?>" >
	
	<script  src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
</head>
<body>
		<div class="recipt" id="hi">
			<div class="row receipt" style="padding-top: 12px;">
				<div class="col-sm-6"><p style="margin-bottom: 0px;font-weight: 600;">|| Hari Sarvothamma ||</p></div>
				<div class="col-sm-6"><p style="margin-bottom: 0px;float: right;font-weight: 600;">|| Vaayu Jeevothamma ||</p></div>
			</div>
			<div class="main" style="border:2px solid #000;padding: 2%;">
				<div class="row">
					<div class="col-sm-2">
						<img src="../assets/receipt_logo/logo.png" class="img-fluid d-block mx-auto" style="width:128px;height: 128px;">
					</div>
					<div class="col-sm-10" style="text-align: center;">
						<h5 style="margin-bottom: 0px;">Sri Raghvendra Swamy Seva Samithi (R)</h5>
						<h5>Jayalakshmipuram,Mysore 570012 - Phone:2511355</h5>
						<h5>SEVA  RECEIPT</h5>
					</div>
				</div>
				<!------------------------------------------------------>
				<div class="row">
					<div class="col-sm-6">
						<p style="font-weight: 600;margin-bottom: 0px;"><label>Receipt #:</label><input type="text" name="" value="JLPRM-2022/33026" style="border:none;"></p>
						<p style="font-weight: 600;margin-bottom: 0px;"><label>PNR Number:</label><input type="text" value="<?php echo $info['booking_pnr']; ?>" name=""  style="border:none;"></p>
					</div>
					<div class="col-sm-6" style="text-align:end;margin-bottom: 0px;">
						<p style="font-weight: 600;"><label>Date:</label><input type="text"  id="receipt_date" name="" style="border:none;"></p>
					</div>
				</div>
				<!-------------------------------------------------------->
				<div class="row" style="border-top: 2px dotted;border-bottom: 2px dotted;padding: 8px 0;">
					<div class="col-sm-8">
						<p style="font-weight: 600;margin-bottom: 0px;"><label style="margin-bottom: 0px;font-weight: 600;">Name: &nbsp;&nbsp;</label><input type="text" value="<?php echo $gc['name']; ?>" name="" style="border:none;"></p>
						<!-------------------------------------------------------->
						<p style="margin-bottom: 0px;"><label style="margin-bottom: 0px;font-weight: 600;">Address: &nbsp;&nbsp;</label><input type="text" value="<?php echo $gc['address2']; ?>" name="" style="border:none;width: 82%;"></p>
						<!-------------------------------------------------------->
						<div class="row">
							<div class="col-sm-6"><p style="margin-bottom: 0px;"><label style="font-weight:600;margin-bottom: 0px;">Gothra: &nbsp;&nbsp;</label><input type="text" value="<?php echo $gc['gothra']; ?>" name="" style="border:none;">||</p></div>
							<div class="col-sm-6"><p style="margin-bottom: 0px;"><label style="font-weight:600;">Nakshathra: &nbsp;&nbsp;</label><input type="text" value="<?php echo $gc['nakshathra']; ?>" name="" style="border:none;"></p></div>
						</div>
					</div>
					<div class="col-sm-4" style="text-align: end;">
						<p style="font-weight: 600;margin-bottom: 0px;"><label>Phone:</label><input type="number" value="<?php echo $gc['mobile_number']; ?>" name="" style="border:none;"></p>
					</div>
				</div>
				<!------------------------------------------------------->
				<div class="row">				

					<div class="col-sm-8" style="border-bottom: 2px dotted;">

                        <?php
							foreach($pnr as $key=>$val){																		 
						?>

						<p style="font-weight: 600;margin-bottom: 0px;margin-top: 8px;"><label style="margin-bottom: 0px;">Seva:&nbsp;&nbsp;</label><input type="text" value="<?php echo $val['seva_name']; ?>" name="" style="border:none;width: 92%;"></p>
						<p style="font-weight: 600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Seva Date:&nbsp;&nbsp;</label><input type="text" id="receipt_date1" value="<?php echo $val['seva_date']; ?>" name="" style="border:none;"></p>
						<div class="row">
							<div class="col-sm-3">
								<p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Quantity:</label><input type="number" value="<?php echo $val['seva_units']; ?>" name="" style="border:none;width: 34%;"></p>
							</div>
							<div class="col-sm-4"><p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Rate:</label><input type="number" value="<?php echo $val['price']; ?>" name="" style="border:none;width: 50%;"></p></div>
							<div class="col-sm-4">
								<p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Amount:</label><input type="number" value="<?php echo $val['amount']; ?>" name="" style="border:none;width: 50%;"></p>
							</div>
						</div>
						<p style="margin-bottom: 8px;font-weight:600;"><label style="margin-bottom:0px;">Remarks:</label><input type="text" value="<?php echo $val['remark']; ?>" name="" style="border:none;"></p>
                        <?php
					 } 
					?>
					</div>		
					
					<div class="col-sm-4" style="border-bottom: 2px dotted;"></div>

					
				</div>
				<!---------------------------------------------------------->
				<div class="row">
					<div class="col-sm-5">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;">Seva 1 of <?php  echo $key+1; ?>** <label style="margin-bottom:0px;">TOTAL AMOUNT:</label><input type="number" value="<?php echo $info['total_amount']; ?>"  name="" style="border:none;width: 35%;">**</p>
					</div>
					<div class="col-sm-4">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;"><label>AMOUNT PAID:</label><input type="number" name="" value="<?php echo $info['amount_paid']; ?>" style="border:none;width: 40%;"></p>
					</div>
					<div class="col-sm-3">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;"><label>BALANCE</label><input type="number" value="<?php echo $info['balance_amount']; ?>" name="" style="border:none;width: 40%;"></p>
					</div>
				</div>
				<p style="font-weight:600;margin-bottom:0px;"><label>Cash</label><input type="text" value="<?php echo $info['payment_method']; ?>" name="" style="border:none;"></p>
				<div class="row" style="border-top: 2px dotted;border-bottom: 2px dotted;margin: 25px 0;">
					<div class="col-sm-4">
						<p style="font-weight:600;margin-top: 8px;">Persons Allowed:&nbsp;&nbsp; <label>For Pooja:</label><input type="number" name="" value="0" style="border: none;width: 20%;">||</p>
					</div>
					<div class="col-sm-3">
						<p style="font-weight:600;margin-top: 8px;"><label>For Hasthodka:</label><input type="number" value="1" name="" style="border:none;width: 25%;"></p>
					</div>
					<div class="col-sm-5">
						<p style="font-weight:600;margin-top: 8px;"><label>Special Instructions:</label><input type="text" name="" style="border: none;"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3"><p style="margin-bottom:0px;font-weight: 600;">E.& O.E</p></div>
					<div class="col-sm-6" style="text-align:center;font-weight: 600"><p style="margin-bottom:0px;">PLEASE BRING THIS RECEIPT AT THE TIME OF SEVA</p></div>
					<div class="col-sm-3" style="text-align:end;"><p style="margin-bottom:0px;font-weight: 600">P.T.O</p></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<a href="" style="color:#000;text-decoration: none;font-weight: 600;">info.ismartonline@gmail.com</a>
				</div>
				<div class="col-sm-6">
					<p style="text-align: center;font-weight: 600;">-iSmart Technologies-</p>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>

</body>
</html>

<script type="text/javascript">
	 $('#receipt_date').datepicker({dateFormat: "dd-mm-yy"});
	  $('#receipt_date1').datepicker({dateFormat: "dd-mm-yy"});
// 	window.onload = function() {
//         printDiv();
//     }
</script>
<script type = "text/javascript">
    //var divToPrint=document.getElementById('recipt');
 $(document).ready(function(){
        
		$('#booking_print').toggle();
		$('#back_button').toggle();
		 var count = "<?php  echo $count;  ?>";
		 var i = 0;
		for(i= 0; i< count; i++){
		    var divToPrint=document.getElementById("recipt");
            window.print();
            // window.close();
			
		}
		
    
	});
</script>
<script type="text/javascript">

	$('#receipt_date').datepicker({dateFormat: "dd-mm-yy"});
	$('#receipt_date1').datepicker({dateFormat: "dd-mm-yy"});

	var date = "<?php  echo $gc['booking_date'];  ?>";	  
	var split3 = date.split('-');
	var booking_date = [ split3[2], split3[1], split3[0] ].join('-');	

	document.getElementById('receipt_date').value = booking_date;

    console.log(<?php  print_r($info);  ?>);  
    console.log(<?php  print_r($pnr);  ?>); 
    console.log(<?php  print_r($gc);  ?>); 
   

</script>
