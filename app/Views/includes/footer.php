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
</style>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/adminlte.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>"> 
    <script src="<?php echo base_url('assets/toastr/toastr.min.js');?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/toastr/toastr.min.css');?>">
<!-- <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script> -->
<script type="text/javascript">
//   $( "select" ).change(function() {
//   //vent.preventDefault();
//     var temple_id = "";
//     $( "select option:selected" ).each(function() {
     
//       temple_id += $(this).val();
//       temple_id = temple_id.replace(/[^A-Z0-9]/ig, "");
//       if(temple_id != ''){
//          $.ajax({

//                 type   : 'post',
//                 url    : '<?php echo site_url("Dashboard/change_temple")?>',
//                 data   :  {'temple_id':temple_id},
//                 contentType: false,
//                 processData: false,
                                          
//                   success:function(response){
//                   response = jQuery.parseJSON(response);
//                   console.log(response);

                    
//                     if(response.result==1)
//                     {  
//                         //toastr["success"](response.message);

//                       // //("#add_model").modal("hide");
                       
//                       //  $('.update').removeAttr("disabled");
//                       //  $(".update").text("Update");    
//                       //  $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
//                     }
//                     else 
//                     {
//                       //toastr["error"](response.message);
//                         $('.update').removeAttr("disabled");
//                         $(".update").text("Update");   
//                         $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                      
//                     }
//                 }
//           });
//       }
      
//     });
//     //$( "div" ).text( str );
//   })
//   .trigger( "change" );
</script>

<script>

	$(document).ready(function() {
		if($("#templeSelect").val() == 0){
		$('.nav-link').hide();
		$(".main-sidebar").css("width","0px");
		$(".sidebar").css("padding","0px");
		$(".main-header").css("margin-left","0px");
		$(".content-wrapper").css("margin-left","0px");
		
		
		}
	});

		$("#templeSelect").change(function(){
		if(this.value == 0){
		$('.nav-link').hide();
		$(".main-sidebar").css("width","0px");
		$(".sidebar").css("padding","0px");
		$(".main-header").css("margin-left","0px");
		$(".content-wrapper").css("margin-left","0px");
// 		window.location.href="<?php echo site_url('Dashboard') ?>"; 
		}else{
		$('.nav-link').show();
		$(".main-sidebar").css("width","250px");
		$(".sidebar").css("padding","7px");
		$(".main-header").css("margin-left","250px");
		$(".content-wrapper").css("margin-left","250px");
			var temple_id =  $('#templeSelect').val();

		$.ajax({

		type   : 'post',
		url    : '<?php echo site_url("Dashboard/change_temple")?>',
		data   : {temple_id : temple_id}, 
		
		success:function(response)
		{
			console.log(response);
		   response = jQuery.parseJSON(response);
		    window.location.href="<?php echo site_url('Dashboard') ?>"; 
		
		}

		});


		}
	});


</script>