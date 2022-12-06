<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | I-SMART</title> 
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css');?>">   
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>" />
     <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>"> 
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/adminlte.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>"> 
	
</head>
<body style="background: url(<?php echo base_url('assets/images/Login_Page_bg.jpg') ;?> ) no-repeat fixed center center /cover;" >
	<section class="Login"> 
		<div class="container">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5 i-smart" style="background: url(<?php echo base_url('/assets/images/I-Smart-Technologies_03.png');?>)no-repeat top right  /cover;">
					<h2>I-Smart <br> Technologies</h2>
				</div>
				<div class="col-sm-5 signin-form">
					<h3>Login to Dashboard</h3>
					<form id="loginform">
						<div class="log-block">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" id="username" class="form-control" required="">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control" required="">
								<!--<i class="far fa-eye-slash" id="togglePassword" style=" margin-left: 280px; position: absolute; cursor: pointer;" title="Show Password"></i>-->
								<!--<i class="fa fa-eye" id="togglePassword" aria-hidden="true" title="Show Password" style=" margin-left: 280px; position: absolute; cursor: pointer;"></i>-->
								<div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                       <i class="fas fa-eye d-none" id="hide_eye"></i>
                                      <i class="fas fa-eye-slash" id="show_eye"></i>
                                    </span>
                                </div>
							</div>
							
							<div class="log-button">
								<button type="submit" class="form-control btn btn-primary submit">Submit</button> 
							</div><br>
							<div>
								<a href="#">Forgot Password ?</a>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>
	</section>
</body>
<script>
	$(document).ready(function(){
		$(document).on('click','.signup-tab',function(e){
			e.preventDefault();
			$('#signup-taba').tab('show');
		});	
		
		$(document).on('click','.signin-tab',function(e){
			e.preventDefault();
			$('#signin-taba').tab('show');
		});
				
		$(document).on('click','.forgetpass-tab',function(e){
			e.preventDefault();
			$('#forgetpass-taba').tab('show');
		});
	});	
	/*--const togglePassword = document.querySelector('#togglePassword');
  	const password = document.querySelector('#password');
	togglePassword.addEventListener('click', function (e) {
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    	password.setAttribute('type', type);
		var className = $("#togglePassword").attr('class');
    	className = className.indexOf('slash') !== -1 ? 'fa fa-eye' : 'far fa-eye-slash';

    	$("#togglePassword").attr('class', className);
		if(type == 'text'){
			this.setAttribute('title', 'Hide Password');
			$('#togglePassword').css('margin-top', '-22px');
		}
		else{
			this.setAttribute('title', 'Show Password');
			$('#togglePassword').css('margin-top', '-22px');
		}
	});--*/
</script>

<script type="text/javascript">
$(document).ready(function(){	

    $('#loginform').submit(function(e){  
        e.preventDefault();
        formdata = new FormData($(this)[0]);


        $(".submit").text("Loading...");
        $(".submit").attr('disabled','disabled');


        $.ajax({

          type   : 'post',
          url    : '<?php echo base_url("Login")?>',
          data   : formdata, 
          contentType: false,
          processData: false,

          success:function(response)
          {
          	console.log(response);
            response = jQuery.parseJSON(response);
            
            //console.log(response);

            if(response.result==1)
            {	 
            	toastr.success('Welcome to Ismart','Log in Successfully', {timeOut: 1000});
				// positionClass: 'toast-top-center',
				// onHidden: function() {
				window.setTimeout(function() {
    				window.location = '<?php echo base_url("Dashboard")?>'+'/details/?role='+response.role_id;
				}, 2000);
			 
              //redirect()->to(base_url().'/account');
            }
			else if(response.result==2){
				$(".submit").removeAttr('disabled');
				$(".submit").text("Login");
				toastr["error"](response.message);
			}
			else if(response.result==3){
				$(".submit").removeAttr('disabled');
				$(".submit").text("Login");
				toastr["error"](response.message);
			}
            else if(response.result==0)
            {
              $(".submit").removeAttr('disabled');
              $(".submit").text("Login");
              toastr["error"](response.message);
            }
          }

        });
    	   
    });   

}); 
</script>

<script type="text/javascript">
	function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script><!--show/hide password-->

</body>
</html>

<style type="text/css">
	.form-control{
    	width: 75%;
	}
	.signin{
		background-color: #142395;
		color: #fff!important;
	    padding: 5px 25px;
	    border-radius: 5px;
	    font-size: 15px;
	}
	.input-group-append{
		margin-top: -30px;
        margin-left: 260px;
    }
</style>
<?php
  echo view('includes/footer');
?>
