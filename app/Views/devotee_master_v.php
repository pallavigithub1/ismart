<?php

  echo view('includes/header',$temple_details, $rel);

?>

	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Devotee Master</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
	              <li class="breadcrumb-item active">Devotee Master</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	        	<div class="row">
			    		<div class="col-sm-6">
			    			<!-- <button><i class="fa fa-plus" aria-hidden="true"></i></button> -->
			    		</div>
			    		<div class="col-sm-6" style="text-align:end;">
			    		    <button class="btn btn-primary add_item" id = "add_item">Add New</button>
			    			<button class="btn btn-primary" id="export">Export to Excel</button>
			    		</div>
			    	
			    	</div>
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
	        	
	        	 <section class="Master">
			    	<!--<h2 class="master-head">Devotee List</h2>-->
			    
						<!--<div class="col-sm-1"></div>-->

                 <!-- <div class="col-sm-10">-->

                    <div id="jaytab3" style="margin-top:3%;" >

                      <div class="grid_div"></div>

                      <table id="list3">

                      </table>

                      <div id="pager3"></div>

                      <div id="dialogSelectRow3" title="Warning" style="display:none">

                      <p>Please select row</p>

                      </div>

                    </div>

                  </div>

			    </section>	

					

			</div><!-- /.container-fluid -->
   	 	</section> <!-- /.content -->
  	</div> <!-- /.content-wrapper -->
<div class="modal fade" id="add_model" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
        <h4 class="modal-title">Add Devotee Details</h4>
        <button type="button" class="close cancel" id="pin" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form" id="add_item_details">
        
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                    <label for="id">Name</label><br>
                      <input type="text" class="form-control" name="name" onkeyup="vald()" id="names" required>
                      <small class="vald" style="color:red; display:none;">Please enter Valid name</small>
                  </div>
                </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Mobile Number</label><br>
                      <input type="number" class="form-control mobile_number" id="mobile" name="mobile_number" onkeyup="validation()" required>
                      <small class="validation" style="color:red; display:none;">Please enter 10 digits</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Gender</label><br>
                        <select class="form-control" id="genders" name="gender" required>
                          <option>Select</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option> 
                        </select>
                    </div>                 
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Address Line 1</label><br>
                      <input type="text" class="form-control" name="address1"  required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Address Line 2</label><br>
                      <input type="text" class="form-control" name="address2"  required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Email</label><br>
                      <input type="text" class="form-control" id="emails" onkeyup="vals()" name="email" required>
                      <small class="vals" style="color:red; display:none;">Please enter Valid e-mail</small>
                    </div>
                  </div>
            </div><!--col-6-->
            
                <div class="col-sm-6">
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                    <label for="id">Pin Code</label><br>
                    <input type="text" class="form-control" id="pin_codes" onfocusout="get_details()" name="pin_code" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">City</label><br>
                      <input type="text" class="form-control" id = "citys" name="city"  placeholder="City" disabled >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">State</label><br>
                      <input type="text" class="form-control" id="states" name="state" placeholder="State" disabled >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Pan</label><br>
                      <input type="text" class="form-control" id="pans" name="pan" onkeyup="check()" required>
                      <small class="check" style="color:red; display:none;">Please enter Valid PAN</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Adhar</label><br>
                      <input type="text" class="form-control" id="adhars" name="adhar" onkeyup="checks()" required>
                      <small class="checks" style="color:red; display:none;">Please enter Valid Aadhar number (only digits)</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                          <label for="id">Levels</label><br>
                              <select class="form-control" id="levels" name="level" required>
                                <option>Select</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option> 
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                              </select>
                      </div>                 
                  </div>
                 <div class="row">
                          <div class="">
                             <label>Enable Units</label>
                          </div>
                          <div class="">
                             <div class="form-check">
                                <label class="form-check-label" for="radio1" id="seva-radio">
                                  <input type="radio" class="form-check-input" id="radio3" name="enable" value = "1"  checked>Yes
                                </label>
                                <label class="form-check-label" for="radio1" id="seva-radio">
                                  <input type="radio" class="form-check-input" id="radio4" name="enable" value = "0"  >No
                                </label>
                            </div>
                      </div>
                         
                  </div>
                
            </div><!--col-6-->
        </div><!--main-row-->
        
        
         

          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary center-block add" style="float:left;color:black;margin-top:10px;">Add</button>
             
                </div>
          </div>
        </form>
      </div>
    </div>
      </div>
  </div> 

  	 <div class="modal fade" id="edit_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">Edit Devotee Details</h4>
        <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
         <form class="add_form edit_item_details" id="edit_item_details">
         <input type="hidden" class="form-control" name="id" id="id">
         
         <div class="row">
             <div class="col-sm-6">
                 
                 <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                    <label for="id">Name</label><br>
                    <input type="text" class="form-control" name="name" id="name" onkeyup="valde()" >
                    <small class="valde" style="color:red; display:none;">Please enter Valid name</small>
                  </div>
                </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Mobile Number</label><br>
                      <input type="number" class="form-control mobile" name="mobile_number" id="mobile_number" onkeyup="validate()">
                      <small class="validate" style="color:red; display:none;">Please enter 10 digits</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Gender</label><br>
                              <select class="form-control" id="gender" name="gender">
                                <option>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option> 
                              </select>
                      </div>                 
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Address Line 1</label><br>
                      <input type="text" class="form-control" name="address1" id="address1" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Address Line 2</label><br>
                      <input type="text" class="form-control" name="address2" id="address2" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Email</label><br>
                      <input type="text" class="form-control" id="email" name="email" onkeyup="valse()">
                      <small class="valse" style="color:red; display:none;">Please enter Valid email</small>
                    </div>
                  </div>
                 
             </div><!--col-6-->
             <div class="col-sm-6">
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Pin Code</label><br>
                      <input type="number" class="form-control" id="pin_code" name="pin_code">
                    </div>
                  </div>
                 <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">City</label><br>
                      <input type="text" class="form-control" name="city" id="city" disabled >
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">State</label><br>
                      <input type="text" class="form-control" id="state" name="state" disabled>
                    </div>
                  </div>
                   
        
                   
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Pan</label><br>
                      <input type="text" class="form-control" id="pan" name="pan" onkeyup="checke()">
                      <small class="checke" style="color:red; display:none;">Please enter Valid PAN</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                      <label for="id">Adhar</label><br>
                      <input type="text" class="form-control" id="adhar" name="adhar" onkeyup="checkse()">
                      <small class="checkse" style="color:red; display:none;">Please enter Valid Aadhar number (only digits)</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-offset-1 col-sm-10">
                          <label for="id">Levels</label><br>
                              <select class="form-control" id="level" name="level">
                                <option>Select</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option> 
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                              </select>
                      </div>                 
                  </div>
                  <div class="row">
                          <div class="">
                             <label>Enable Units</label>
                          </div>
                          <div class="">
                         <div class="form-check">
                            <label class="form-check-label" for="radio1" id="seva-radio">
                              <input type="radio" class="form-check-input" id="radio1" name="enable" value = "1"  checked>Yes
                            </label>
                            <label class="form-check-label" for="radio1" id="seva-radio">
                              <input type="radio" class="form-check-input" id="radio2" name="enable" value = "0"  >No
                            </label>
                        </div>
                      </div>
                         
                  </div>
                 
            </div><!--col-6-->
          </div>
         
        
         

          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
      </div>
  </div> 
  	<script type="text/javascript">
$(".add_item").click(function()
{
	 var master_type = $('#master_type').val();

	 var master_name = $("#master_type option:selected").text();

	 master_name = master_name.replace(/[^A-Z0-9]/ig, "");
	 if(master_type != ''){
	 		 $("#add_model").modal("show");
	 		 $(".master_id").val(master_type);
	 		 $(".master_type_add").val(master_name);
	 		 
	 }
	 else{
	 		toastr["error"]('YOU MUST SELECT THE MASTER');
	 }

	 //alert(master_type);
});
$("#pin").click(function(){
  $('#pin_codes').val(' ');
  $('#citys').val(' ');
	$('#states').val(' ');
});
$('#edit_modal').on('hidden.bs.modal', function (e) {
  $('.valde').hide();
  $('.valse').hide();
  $(".validate").hide();
  $('.checke').hide();
  $('.checkse').hide();
});
$('#add_model').on('hidden.bs.modal', function (e) {
  $('.vald').hide();
  $('.vals').hide();
  $(".validation").hide();
  $('.check').hide();
  $('.checks').hide();
  $('#add_item_details')[0].reset();
});
function validation() {
  // var phone = document.querySelector('.mobile_number').value;var c=$('#names').val();
  var phone = $('#mobile').val();
  // console.log(phone);
  // alert(phone.length);
  if(phone.length==10) {
    $(".validation").hide();
  }
  else {
    $(".validation").show();
  }
}
function vals(){
  var d=$('#emails').val();
  var valmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(d.match(valmail)){
    $('.vals').hide();
  }else{
    $('.vals').show();
  }
}
function vald(){
  var c=$('#names').val();
  var letters=/^[a-zA-z]+([\s][a-zA-Z]+)*$/;
  if(c.match(letters)){
    $('.vald').hide();
  }else{
    $('.vald').show();
  }
}
function validate() {
  var phone = document.querySelector('.mobile').value;
  // var phone = document.querySelector('.mobile').value;
  if(phone.length==10) {
    $(".validate").hide();
  }
  else {
    $(".validate").show();
  }
}
function valse(){
  var d=$('#email').val();
  var valmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(d.match(valmail)){
    $('.valse').hide();
  }else{
    $('.valse').show();
  }
}
function valde(){
  var c=$('#name').val();
  var letters=/^[a-zA-z]+([\s][a-zA-Z]+)*$/;
  if(c.match(letters)){
    $('.valde').hide();
  }else{
    $('.valde').show();
  }
}
function check(){
  var g=$('#pans').val();
  var valpan=/[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
  if(g.match(valpan)){
    $('.check').hide();
  }else{
    $('.check').show();
  }
}
function checks(){
  var k=$('#adhars').val();
  var valdhar=/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
  if(k.match(valdhar)){
    $('.checks').hide();
  }else{
    $('.checks').show();
  }
}
function checke(){
  var h=$('#pan').val();
  var valpan=/[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
  if(h.match(valpan)){
    $('.checke').hide();
  }else{
    $('.checke').show();
  }
}
function checkse(){
  var i=$('#adhar').val();
  var valdhar=/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
  if(i.match(valdhar)){
    $('.checkse').hide();
  }else{
    $('.checkse').show();
  }
}
function get_details(){
	var pincode = $('#pin_codes').val();
	if(pincode == ''){
		$('#citys').val(' ');
		$('#states').val(' ');
	}else{
		$.ajax({
			type : "POST",
			url : '<?php echo base_url("Devotee/city_state") ?>',
			data : {pincode:pincode},
			success:function(response){
				if(response=='no'){
					toastr.error('Wrong pincode! please enter correct pin');
					$('#citys').val(' ');
					$('#states').val(' ');
				}else{
					var getData = $.parseJSON(response);
					console.log(response);
					$('#citys').val(getData.city);
					$('#states').val(getData.state);
				}
			}
		});
	}
}
// function getDetails(){
// 	var pincode = $('#pin_code').val();
// 	if(pincode == ''){
// 		$('#city').val(' ');
// 		$('#state').val(' ');
// 	}else{
// 		$.ajax({
// 			type : "POST",
// 			url : ,
// 			data : {pincode:pincode},
// 			success:function(response){
// 				if(response=='no'){
// 					alert('Wrong Pincode');
// 					$('#city').val(' ');
// 					$('#state').val(' ');
// 				}else{
// 					var getData = $.parseJSON(response);
// 					console.log(response);
// 					$('#city').val(getData.city);
// 					$('#state').val(getData.state);
// 				}
// 			}
// 		});
// 	}
// }

  $('#add_item_details').submit(function(e){  
        e.preventDefault();
         var city = $('#citys').val();
		     var state = $('#states').val();
         formdata = new FormData($(this)[0]);
         formdata.append('city',city);
         formdata.append('state',state);
            $(".add").text("Adding...");
            $(".add").attr("disabled", true);
            var s = $(".vald").is(":hidden");
            var q = $(".vals").is(":hidden");
            var n = $(".validation").is(":hidden");
            var r = $(".check").is(":hidden");
            var t = $(".checks").is(":hidden");
            if((s) && (q) && (n) && (r) && (t)){
              $.ajax({

                  type   : 'post',
                  url    : '<?php echo site_url("Devotee/add_devotee_details")?>',
                  data   : formdata,
                  contentType: false,
                  processData: false,
                                            
                    success:function(response){
                    response = jQuery.parseJSON(response);
                    console.log(response);

                      
                      if(response.result==1)
                      {  
                          toastr["success"](response.message);

                          $("#add_model").modal("hide");
                        
                          $('.add').removeAttr("disabled");
                          $(".add").text("Add");    
                          $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                          $('#add_item_details')[0].reset();
                      }
                      else 
                      {
                          toastr["error"](response.message);
                          $('.add').removeAttr("disabled");   
                          $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                        
                      }
                  }
            });
          }
          else{
            $('.add').removeAttr("disabled");
            $(".add").text("Add");  
            toastr.error('please enter correct data');
          }
  });

  $('.edit_item_details').submit(function(e){  
        e.preventDefault();
        // alert("hii");
         var city = $('#city').val();
		 var state = $('#state').val();
         formdata = new FormData($(this)[0]);
         formdata.append('city',city);
         formdata.append('state',state);
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            var t = $(".valde").is(":hidden");
            var r = $(".valse").is(":hidden");
            var s = $(".validate").is(":hidden");
            var u = $(".checke").is(":hidden");
            var v = $(".checkse").is(":hidden");
            if((t) && (r) && (s) && (u) && (v)){
              $.ajax({

                  type   : 'post',
                url    : '<?php echo site_url("Devotee/update_devotee_details")?>',
                  data   : formdata,
                  contentType: false,
                  processData: false,
                                            
                    success:function(response){
                    response = jQuery.parseJSON(response);
                    console.log(response);

                      
                      if(response.result==1)
                      {  
                          toastr["success"](response.message);

                          $("#edit_modal").modal("hide");
                        
                          $('.update').removeAttr("disabled");
                          $(".update").text("Update");    
                          $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                      }
                      else 
                      {
                          toastr["error"](response.message);
                          $('.update').removeAttr("disabled");
                          $(".update").text("Update");   
                          $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                        
                      }
                  }
              });
            }
            else{
              $('.update').removeAttr("disabled");
              $(".update").text("Update"); 
              toastr.error('please enter correct data');
            }
  });



</script>

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>

<!-- This is the localization file of the grid controlling messages, labels, etc.-->

<!-- We support more than 40 localizations -->

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>

<!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" /> 
<link rel="stylesheet" href="<?php echo base_url('assets/sweet_alert/sweet-alert.css');?>">
<!-- The link to the CSS that the grid needs -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />

<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/sweet_alert/sweet-alert.js');?>"></script>
<script type="text/javascript">

  $(document).ready(function () 

{  

    var pickup_date   = '1';
    var sales_person  = '1';


    var lastSelection = "";



    jQuery("#list3").jqGrid({

              url:"<?php echo site_url('Devotee/show_devotee_details');?>?payment_date="+pickup_date+"&sales_person="+sales_person,

              datatype: "json", 

              colNames:['Sl','Name','Mobile','Address1','Address2','email','Edit','Delete'],

              colModel:[

                {name:'id',index:'id',hidden:true, width:150, editable:false},

                {name:'name',index:'name', width:150, editable:false},

                {name:'mobile_number',index:'mobile_number',width:150, editable:false},

                {name:'address1',index:'address1', width:150, editable:false},

                {name:'address2',index:'address2', width:150, editable:false},

                {name:'email',index:'email', width:150, editable:false},
      
               // formatter:function (cellvalue, options, rowObject) {    
          // if(rowObject.publish_status != 'PUBLISHED'){
          // return "<input type='button' value='PUBLISH'\>"; }
          // else{
          //   return "<input type='button' value='PUBLISHED' disabled\>";
          // }
          // }}, 
                {name:'',index:'',search:false, 
                  width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
                      var retVal = "";
                        var retVal = ' <a data-toggle="tooltip" title="Edit" class="" href="javascript:void(0);"><span class="fa fa-pencil" onclick="fun_edit($(this))"  style="color:blue;"></span></a';
                        return retVal;
                      

                }},
                {name:'',index:'',search:false, 
                  width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
                      var retVal = "";
                        var retVal = ' <a data-toggle="tooltip" title="Delete" class="" href="javascript:void(0);"><span class="fa fa-trash" onclick="remove($(this))"  style="color:red;"></span></a';
                        return retVal;
                      

                }},

            

              ],

              rowNum:20,

              rowList:[20,30,50,100,200,300],

              rownumbers: true,

              pager: '#pager3', 

              sortname:'id', 

              height: '100%',

              width: '100%',

              viewrecords: true, 

              loadonce:true,

              gridview: true,

              sortorder:"desc", 

              shrinkToFit: true,

              caption:"Devotee List",

              subGrid: false,

                subGridRowExpanded: function(subgrid_id, row_id) {

                var subgrid_table_id;

                swan_id=row_id;

               

                subgrid_table_id = subgrid_id+"_t";

                jQuery("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table>");

                    jQuery("#"+subgrid_table_id).jqGrid({



                        url:"<?php echo site_url('Dashboard/show_item_details');?>?payment_date="+pickup_date+"&id="+swan_id,



                        type : "GET", 

                        datatype: "json", 

                        colNames:['Sl','Temple','Category','Value','regional_value','Enable'],

                        colModel:[

                         {name:'id',index:'id',hidden:true, width:75, editable:false},

				                {name:'temple_id',index:'temple_id', width:75, editable:false},

				                // {name:'master_name',index:'master_name',hidden:true,key:true, width:75, editable:false},
                        {name:'master_name',index:'master_name',width:75, editable:false},

				                {name:'master_value',index:'master_value', width:75, editable:false},
				                
				                {name:'regional_value',index:'regional_value', width:85, editable:false},
				                {name:'enable',index:'enable', width:85, editable:false}              



                        ],



                        height: 'auto',

                        //autowidth: true,

                        shrinkToFit: true,

                        rowNum:20,

                        sortname: 'num',

                        sortorder: "asc",

                        pager:subgrid_table_id,

                        loadonce: true,

                        footerrow: true,

                        userDataOnFooter: true,  

                        // loadComplete: function () 

                        // {

          

                        //      var sumOfproduct_quantity = jQuery("#list3_"+swan_id+"_t").jqGrid('getCol','product_quantity',false,'sum');  

                            

                        //      var sumOfpro_quantity = jQuery("#list3_"+swan_id+"_t").jqGrid('getCol','pro_quantity',false,'sum');

                            

                        //      var sumOftotal_amount = jQuery("#list3_"+swan_id+"_t").jqGrid('getCol','total_amount',false,'sum');

                            



                        //     jQuery("#list3_"+swan_id+"_t").jqGrid('footerData', 'set', { p_id: 'Total:', product_quantity: sumOfproduct_quantity, pro_quantity: sumOfpro_quantity, total_amount: sumOftotal_amount.toFixed(2)}); 

                          

                                 

                        //   },

                    });

                    }

               

                

              }); 



            

             

              

              $("#list3").jqGrid("setLabel", "rn", "SL");



              $("#list3").jqGrid('filterToolbar',{searchOperators : true}); //for multisearch code,remove if not required



              $("#list3").jqGrid('navGrid','#pager3',

              {edit:false,add:false,del:false,search:true,refresh:true},

              { },

              { },

              { }, 

              {

              sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],

              closeOnEscape: true, 

              multipleSearch: true, 

              closeAfterSearch: true }

              );
}); 
$("#export").on("click", function(){
  var columnData = $("#list3").jqGrid("getGridParam", "colNames");
  var colData = columnData.slice(2,7);
  var localGridData = $("#list3").jqGrid("getGridParam", "data");
  
  JSONToCSVConvertor(localGridData, "Devotee Report",true,colData,"Devotee Report");
});

function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel,headers,fileName){
  var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
  var CSV = '';
  // CSV = ReportTitle + '\n\n';
  var head = headers;
  head.unshift("         SL");
  if (ShowLabel) {
    var row = "";

    if(headers)
    {
        row = head.join(',');
    }
    else
    {
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {         
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }
    }
    row = row.slice(0);
    CSV += row + '\n\n';
  }
  for (var i = 0; i < arrData.length; i++) {
    var row = "";
    row += '"' + (i+1) + '",';
    //2nd loop will extract each column and convert it in string comma-seprated
    for(var colName in arrData[i]) {
      if(colName == 'id')
          continue;
      row += '"' + arrData[i][colName] + '",';
    }
    // console.log(row);
    // break;
    var rows = row;
    var a = rows.split(",");
    var b = a.slice(0,6);
    var c = b.join(',');
    // console.log(c);
    // break;
    // row.slice(0, row.length - 1);

    //add a line break after each row
    CSV += c + '\r\n';
  }
  if (CSV == '') {        
    alert("Invalid data");
    return;
  }
  if(!fileName)
  {
    //Generate a file name
     fileName = "MyReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
  }
  var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
  var link = document.createElement("a");    
  link.href = uri;
  link.style = "visibility:hidden";
  link.download = fileName + ".csv";
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}


// function gridload(){    

//   $.ajax({

//     url:"<?php //echo site_url("Devotee/show_devotee_details")?>",
//     type:"POST",
  
//     success:function(response) {    
        
//       jQuery('#list3').jqGrid('clearGridData');
//       jQuery('#list3').jqGrid('setGridParam', {data: response});
//       jQuery('#list3').trigger('reloadGrid');

//     }  

//   });

// }
function remove(rowId){
  var id = rowId.closest('tr').attr('id');
    // alert(id);
  swal({   
    title: "Are you sure?",
    text: "You want to delete this?",
    type: "warning",   showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    closeOnConfirm: false,
    closeOnCancel: false 
  },
  function(isConfirm){   
    if(isConfirm){ 
      $(".sweet-alert").hide();
      $(".sweet-overlay").hide();
      $.ajax({
        url:"<?php echo site_url("Devotee/remove_devotee")?>",
        type:"POST",
        data:{id:id},
        success:function(response) {
          response = jQuery.parseJSON(response);
          console.log(response);
          if(response.result == 1){
            toastr["success"](response.message);
            window.setTimeout(function() {
    				  history.go(0);
            }, 1000);
          }else{
            toastr["error"](response.message);
          }
        }   
      });
    }
    else 
    {
      $(".sweet-alert").hide();
      $(".sweet-overlay").hide();
    }
  });
}




function fun_edit(rowId)
  {
    
      var id = rowId.closest('tr').attr('id');
      $.ajax({

        url:"<?php echo site_url("Devotee/get_devotee_details")?>",
        type:"POST",
        data:{id:id},
        success:function(response) {
        response = jQuery.parseJSON(response);
        console.log(response);

          if(response.result == 1) 
          {

             $("#edit_modal").modal("show");
            // $('.uploaded_brand_image').empty();
             $("#id").val(response.message.id);
             $("#name").val(response.message.name);
             $("#mobile_number").val(response.message.mobile_number);
             var aa = response.message.gender;
             $('#gender').val(aa);
             var kk = response.message.level;
             $('#level').val(kk);
            //  if(response.message.gender == 'Male'){
            //     $('select[name="gender"]').find('option[value="Male"]').attr("selected",true);
            //  }
            //  else{
            //     $('select[name="gender"]').find('option[value="Female"]').attr("selected",true);
            //  }
            //  if(response.message.level == '5'){
            //     $('select[name="level"]').find('option[value="5"]').attr("selected",true);
            //  }
            //  else if(response.message.level == '4'){
            //     $('select[name="level"]').find('option[value="4"]').attr("selected",true);
            //  }
            //  else if(response.message.level == '3'){
            //     $('select[name="level"]').find('option[value="3"]').attr("selected",true);
            //  }
            //  else if(response.message.level == '2'){
            //     $('select[name="level"]').find('option[value="2"]').attr("selected",true);
            //  }
            //  else{
            //     $('select[name="level"]').find('option[value="1"]').attr("selected",true);
            //  }

             if(response.message.enable == '1'){
                //$('#radio1')[0].checked = true;
                $('#radio1').prop('checked', true);
             }
             else{
                 //$('#radio2')[0].checked = true;
                  $('#radio2').prop('checked', true)
             }
             $("#address1").val(response.message.address1);
             $("#address2").val(response.message.address2);
             $("#city").val(response.message.city);
             $("#pin_code").val(response.message.pin_code);
             $("#state").val(response.message.state);
             $("#email").val(response.message.email);
             $("#pan").val(response.message.pan);
             $("#city").val(response.message.city);
             $("#adhar").val(response.message.adhar);
             
            // //$('.brand_image_uploaded').val(response.message.brand_image);
            // var img = jQuery.parseJSON(response.message.brand_image);
            // if(img != "")
            // {
            //    // $('.uploaded_brand_image').empty();
            //   var content ="";
            //   content = '<label>Uploaded Image: </label><a target="_blank" href="<?php echo base_url('/brand_images');?>/'+img+'"> <img width="50px" src="<?php echo base_url('/brand_images');?>/'+img+'"  target="_blank" ></a>'
            //   $('.uploaded_brand_image').append(content);
            // }
            // else
            // {
            //   $('.uploaded_brand_image').empty();
            // }
            
            // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');

          }

            }


      }); 

  }


 </script>
<?php
  echo view('includes/footer');
?>