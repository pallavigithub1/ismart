<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title>Home</title>

	

</head>
<body>
	<section class="main" id='main' style="padding: 2%;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					  <p style="text-align: center;font-weight: 600;"><?php echo $info['name']; ?></p>
					  <p style="text-align: center;font-weight: 600;"><?php echo $info['address']; ?></p>
					  <p style="text-align: center;font-weight: 600;"><?php echo $info['phonenumber']; ?></p>
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
					<p><?php echo $info1['address1']; ?>,</p>
					<span><?php echo $info1['city']; ?></span><span>&nbsp&nbsp<?php echo $info1['pin_code']; ?></span>
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
					<p>ನಡೆಸುಲು ಏರ್ಪಡಿಸೆದೆ . ಸಕಾಲಕ್ಕೆ ತಾವುಗಳು ದಯಾಮಾಡಿಸಿ ತೀರ್ಥಪ್ರಸಾದ ಸ್ವೀಕರಿಸುವುದು.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<p class="seve" style="margin-top:30px;">ಸೇವಾ ವಿವರ</p>
					<p style="margin-bottom: 10%;"><b>ಶ್ರೀ/ಶ್ರೀಮತಿ : <span>ವಾಸಂತಿ ಭಗವಾನ್</span></b></p>
				</div>
				<div class="row" >
					<div class="col-sm-12"><p id="subject"></p></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><p><b>ಕೌಂಡಿನ್ಯ</b>&nbsp;&nbsp;&nbsp; ಗೋತ್ರ</p></div>
				<div class="col-sm-4"><p><b>ರೇವತಿ</b> &nbsp;&nbsp;&nbsp; ನಕ್ಷತ್ರ</p></div>
			</div>
			<p style="text-align:center;">ಸ್ವಾಮಿ , ಅಮ್ಮ ಅಭಿಷೇಕ</p>
			<div class="row" style="margin-bottom: 0%;">
				<div class="col-sm-4"><p style="margin-top:15px;">ಪ್ರಸಾದದ ವಿವರ:</p></div>
				<div class="col-sm-4"><p style="margin-top:15px;">ಸ್ವಾಮಿ ಅಮ್ಮ ಅಭಿಷೇಕ , </p><p>1 ಕೆ.ಜಿ ಎಳ್ಳೋಗರೆ , </p></div>
				<div class="col-sm-4"></div>
			</div>

			<div  class="row" style="margin-bottom: 30%;">
			<div class="col-sm-12">
				<p id="content"></p>

			</div>
			</div>

			
			<div class="row" style="border-bottom: 2px solid #000;">
				<div class="col-sm-6">
					<p style="font-weight:600;">ಸೇವಾ : ಬೆಳಗ್ಗೆ <b>10-00</b> ಘಂಟೆಗೆ (ಅಭಿಷೇಕ)</p>
					<p style="font-weight:600;padding-left: 60px;">12-30 ಘಂಟೆಗೆ (ಪ್ರಸಾದಕ್ಕೆ) ಬರುವುದು.</p>
				</div>
				<div class="col-sm-6" style="text-align: right;"><p><b>ಪೇಷ್ಕಾರ್</b></p></div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p style="font-weight:600;margin-top: 15px;">ವಿ ಸು:---ವಿಳಾಸ ಮತ್ತೂ ಸೇವೆಯಲ್ಲಿ ವ್ಯತ್ಯಾಸ ಕಂಡುಬಂದಲ್ಲಿ ಕಛೇರಿಗೆ ಮುಂಚಿತವಾಗಿ ತಿಳಿಸುವುದು.</p>
				</div>
			</div>
		</div>	

	</section>


<input  type="text" id='subject_text' />
<textarea name="content" id="content_text" cols="30" rows="10"></textarea>
	<button type="button" class="btn btn-primary" id="edit" >Edit</button>
<button type="button" class="btn btn-primary" id="print">Print</button>
</body>
</html>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
		// $(document).ready(function(){

		// 	$("#subject").show();

		// 	// alert("hii");
		// })


		$('#edit').click(function(){
            var subject = $("#subject_text").val();
            var content = $("#content_text").val();
            console.log(content);
			$('#subject').text(subject);
			$('#content').text(content);
		})


		$("#print").click(function(){
			var divToPrint=document.getElementById("main");
			// window.document.write(divToPrint);
            window.print();
		})
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