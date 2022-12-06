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

		<!-- <div class="container" id="hi" style="margin-right:70px;"> -->
			<div class="row receipt" id="receipt" style="padding-top: 12px;">
				<div class="col-sm-6"><p style="margin-bottom: 0px;font-weight: 600;">|| <?php echo $temple_details[0]['receipt_header']; ?> ||</p></div>
				<div class="col-sm-6"><p style="margin-bottom: 0px;float: right;font-weight: 600;">|| <?php echo $temple_details[0]['receipt_header']; ?> ||</p></div>
			</div>
			<div class="main" style="border:2px solid #000;padding: 2%;">
				<div class="row">
					<div class="col-sm-2">
						<img src="../uploads/<?php echo $temple_details[0]['image']; ?>" class="img-fluid d-block mx-auto" style="width:128px;height: 128px;">
					</div>
					<div class="col-sm-10" style="text-align: center;">
						<h5 style="margin-bottom: 0px;">Sri Raghvendra Swamy Seva Samithi (R)</h5>
						<h5>Jayalakshmipuram,Mysore 570012 - Phone:2511355</h5>
						<h5>SEVA  RECEIPT</h5>
					</div>
				</div>
				<!------------------------------------------------------>
				<div class="row" style="padding-top:20px;">
					<div class="col-sm-6">
						<p style="font-weight: 600;margin-bottom: 0px;"><label>Receipt #:</label><input type="text" name="" value="JLPRM-2022/33026" style="border:none;"></p>
						<p style="font-weight: 600;margin-bottom: 0px;"><label>PNR Number:</label><input type="text" name=""  value="<?php echo $info['booking_pnr']; ?>"  style="border:none;"></p>
					</div>
					<div class="col-sm-6" style="text-align:end;margin-bottom: 0px;">
						<p style="font-weight: 600;"><label>Date:</label><input type="text" value="<?php echo $info['booking_date']; ?>" id="receipt_date" name="" style="border:none;"></p>
					</div>
				</div>
				<!-------------------------------------------------------->
				<div class="row" style="border-top: 2px dotted;border-bottom: 2px dotted;padding: 8px 0;">
					<div class="col-sm-8">
						<p style="font-weight: 600;margin-bottom: 0px;"><label style="margin-bottom: 0px;font-weight: 600;">Name: &nbsp;&nbsp;</label><input type="text" value="<?php echo $info['name_of']; ?>" name="" style="border:none;"></p>
						<!-------------------------------------------------------->
						<p style="margin-bottom: 0px;"><label style="margin-bottom: 0px;font-weight: 600;">Address: &nbsp;&nbsp;</label><input type="text" name="" value="<?php echo $phone['address1']; ?>" style="border:none;width: 82%;"></p>
						<!-------------------------------------------------------->
						<div class="row">
							<div class="col-sm-6"><p style="margin-bottom: 0px;"><label style="font-weight:600;margin-bottom: 0px;">Gothra: &nbsp;&nbsp;</label><input type="text"  value="<?php echo $info['gothra']; ?>" name="" style="border:none;">||</p></div>
							<div class="col-sm-6"><p style="margin-bottom: 0px;"><label style="font-weight:600;">Nakshathra: &nbsp;&nbsp;</label><input type="text"  value="<?php echo $info['nakshathra']; ?>" name="" style="border:none;"></p></div>
						</div>
					</div>
					<div class="col-sm-4" style="text-align: end;">
						<p style="font-weight: 600;margin-bottom: 0px;"><label>Phone:</label><input type="number" value="<?php echo $phone['mobile_number']; ?>" name="" style="border:none;"></p>
					</div>
				</div>
				<!------------------------------------------------------->
				<div class="row">
					<div class="col-sm-8" style="border-bottom: 2px dotted;">
						<p style="font-weight: 600;margin-bottom: 0px;margin-top: 8px;"><label style="margin-bottom: 0px;">Seva:&nbsp;&nbsp;</label><input type="text" value="<?php echo $info['main_seva']; ?>" name="" style="border:none;width: 92%;"></p>
						<p style="font-weight: 600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Seva Date:&nbsp;&nbsp;</label><input type="text" id="receipt_date1" value="<?php echo $info['seva_date']; ?>" name="" style="border:none;"></p>
						<div class="row">
							<div class="col-sm-3">
								<p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Quantity:</label><input type="number" value="1" name="" style="border:none;width: 34%;"></p>
							</div>
							<div class="col-sm-4"><p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Rate:</label><input type="number" value="<?php echo $info['seva_price']; ?>" name="" style="border:none;width: 50%;"></p></div>
							<div class="col-sm-4">
								<p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Amount:</label><input type="number" value="<?php echo $info['seva_price']; ?>" name="" style="border:none;width: 50%;"></p>
							</div>
						</div>
						<p style="margin-bottom: 8px;font-weight:600;"><label style="margin-bottom:0px;">Remarks:</label><input type="text" name="" style="border:none;"></p>
					</div>
					<div class="col-sm-4" style="border-bottom: 2px dotted;"></div>
				</div>
				<!---------------------------------------------------------->
				<div class="row">
					<div class="col-sm-5">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;">Seva 1 of 1 ** <label style="margin-bottom:0px;">TOTAL AMOUNT:</label><input type="number" value="<?php echo $info['seva_price']; ?>" name="" style="border:none;width: 35%;">**</p>
					</div>
					<div class="col-sm-4">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;"><label>AMOUNT PAID:</label><input type="number" name="" value="150.00" style="border:none;width: 40%;"></p>
					</div>
					<div class="col-sm-3">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;"><label>BALANCE</label><input type="number" value="0.00" name="" style="border:none;width: 40%;"></p>
					</div>
				</div>
				<p style="font-weight:600;margin-bottom:0px;"><label>Cash</label><input type="text" name="" style="border:none;"></p>
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
					<div class="col-sm-6" style="text-align:center;font-weight: 600"><p style="margin-bottom:0px;"><?php echo $temple_details[0]['receipt_instructions']; ?></p></div>
					<div class="col-sm-3" style="text-align:end;"><p style="margin-bottom:0px;font-weight: 600">P.T.O</p></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<a href="" style="color:#000;text-decoration: none;font-weight: 600;"><?php echo $temple_details[0]['receipt_footer']; ?></a>
				</div>
				<div class="col-sm-6">
					<p style="text-align: center;font-weight: 600;">-iSmart Technologies-</p>
				</div>
				<div class="col-sm-3"></div>
			</div>
		<!-- </div> -->
		</body>
</html>


<script type="text/javascript">
	 $('#receipt_date').datepicker({dateFormat: "dd-mm-yy"});
	  $('#receipt_date1').datepicker({dateFormat: "dd-mm-yy"});


	

	$(document).ready(function(){
        
		// $('#booking_print').toggle();
		// $('#back_button').toggle();
		//  var count = "<?php  echo $count;  ?>";
		//  var i = 0;
		// for(i= 0; i< count; i++){
		    var divToPrint=document.getElementById("recipt");
			// window.document.write(divToPrint);
            window.print();
            // window.close();
			
		// }
		
    
	});
</script>


