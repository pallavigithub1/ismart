<?php

  //echo view('includes/header',$temple_details, $rcpt);
//   $sname = session()->get('name');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title>Letter</title>
	<link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/jquery-ui.css');?>" >
	
	<script  src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<script type="text/javascript" src="js/bootstrap.min.js"></script> -->
</head>
<body>
	<div class="letter">
		<section class="main" style="padding: 2%;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<p style="text-align: center;font-weight: 600;"><?php echo $info['name']; ?></p>
						<p style="text-align: center;font-weight: 600;"><?php echo $info['address']; ?></p>
						<p style="text-align: center;font-weight: 600;">< <?php echo $info['phonenumber']; ?></p>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-6" style="font-weight: 600;">
						<p>ಗೆ</p>
						<p>ಶ್ರೀ/ಶ್ರೀಮತಿ : <?php echo $info1['name']; ?></p>
						<p>ಕೇರ್/ಆಫ್ &nbsp;&nbsp; ವೈದೇಹಿ</p>
						<p><?php echo $info1['address1']; ?></p>
						<span><?php echo $info1['city']; ?></span><span>&nbsp&nbsp<input type="text" value="<?php echo $info1['pin_code']; ?>" /></span>
						<!-- <p>ಮೈಸೂರು 570009</p> -->
					</div>
					<div class="col-sm-6"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<p><b><span style="margin-right: 35%;">L.F.No.&nbsp;&nbsp;&nbsp;529</b></span> ಪುದುವಟ್ಟು</p>
						<p><span style="margin-right: 20%;">ತಮ್ಮ ಮೇಲ್ಕಂಡ ಪುದುವಟ್ಟು ಸೇವೆ</span> <b>Saturday,January 01,2022</b></p>
						<p>ನಡೆಸಾಲು ಏರ್ಪಡಸಿಧೆ . ಸಕಾಲಕ್ಕೆ ತಾವುಗಳು ದಯಾಮಡಿಸಿ ತೀರ್ಥಪ್ರಸಾದ ಸ್ವೀಕರಿಸುವುದು</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<p class="seve">ಸೇವಾ ವಿವರ</p>
						<p style="margin-bottom: 10%;"><b>ಶ್ರೀ/ಶ್ರೀಮತಿ : <span>ವಾಸಂತಿ ಭಗವಾನ್</span></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4"><p><b>ಕೌಂಡಿನ್ಯ</b> ಗೋತ್ರ</p></div>
					<div class="col-sm-4"><p><b>ರೇವತಿ</b> ನಕ್ಷತ್ರ</p></div>
				</div>
				<p style="text-align:center;">ಸ್ವಾಮಿ , ಅಮ್ಮ ಅಭಿಷೇಕ</p>
				<div class="row" style="margin-bottom: 10%;">
					<div class="col-sm-4"><p>ಪ್ರಸಾದದ ವಿವರ:</p></div>
					<div class="col-sm-4"><p>ಸ್ವಾಮಿ ಅಮ್ಮ ಅಭಿಷೇಕ , </p><p>1 ಕೆ.ಜಿ ಎಳ್ಳೋಗರೆ , </p></div>
					<div class="col-sm-4"></div>
				</div>
				<div class="row" style="border-bottom: 2px solid #000;">
					<div class="col-sm-6">
						<p style="font-weight:600;">ಸೇವಾ ಬೆಳಗ್ಗೆ <b>10-00</b> ಘಂಟೆಗೆ (ಅಭಿಷೇಕ)</p>
						<p style="font-weight:600;">12-30 ಘಂಟೆಗೆ (ಪ್ರಸಾದಕ್ಕೆ) ಬರುವುದು.</p>
					</div>
					<div class="col-sm-6" style="text-align: right;"><p><b>ಪೇಶಕರ್</b></p></div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<p style="font-weight:600;margin-top: 15px;">ವಿ ಸು:---ವಿಳಾಸ ಮತ್ತೂ ಸೇವೆಯಲ್ಲಿ ವ್ಯತ್ಯಾಸ ಕಂಡುಬಂದಲಿ ಕಛೇರಿಗೆ ಮುಂಚಿತಾವಾಗಿ ತಿಳಿಸುವುದು</p>
					</div>
				</div>
			</div>	
		</section>
	</div>
</body>
</html>
<script type = "text/javascript">
    $(document).ready(function(){
        var divToPrint=document.getElementById("letter");
		window.print();
		// window.close();
	});
</script>
<style type="text/css">
	.seve{
		position:relative;
		text-align: center;
		font-weight: 600;
	}
	.seve::after{
		position: absolute;
		content: '';
		border-bottom: 2px solid #000;
		width: 100px;
		left: 0;
		right: 0;
		top: 25px;
		margin: 0 auto;
	}
</style>
<?php
  //echo view('includes/footer');
?>