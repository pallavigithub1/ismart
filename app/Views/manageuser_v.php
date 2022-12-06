<?php

  echo view('includes/header',$temple_details);

?>
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Manage Users</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
	              <li class="breadcrumb-item active">Manage Users</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
			<div class="row">
	            <div class="col-sm-10"></div>
	            <div class="col-sm-2">	<button class="btn btn-primary add_item" id="add_item" style="float:right;">Add New</button></div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
	      		
	        	 <section class="manage-user">
				 	<!-- <div class="text-right">	
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_model">Add User</button>
					</div> -->
				  		
						  	<div class="user-grid" style="margin-left:120px;">
								<table id="list"></table>
								<div id="pager"></div>
                    		</div>
				  		
				  			<!-- The Modal -->
							  <div class="modal" id="add_model">
								   <div class="modal-dialog modal-lg">
								      <div class="modal-content">
								      
								        <!-- Modal Header -->
								        <div class="modal-header" style="background-color:#F39309;">
								          <h4 class="modal-title">Add User</h4>
								          <button type="button" class="close" id="into" data-dismiss="modal">&times;</button>
								        </div>
										<div class="modal-body">
								        
								        <!-- Modal body -->
											<form id = "add_user_submit">
								         	<div class="row">
								         		<div class="col-sm-8">
								         			<div class="form-group" style="display: flex;">
										         		<label>Role</label>
										         		<select class="form-control role" name="role" required>
													        <option value = "1">Admin</option>
													        <option value = "2">Manager</option>
													        <option value = "3">User</option>
												      	</select>
										         	</div>
								         		</div>
								         		<div class="col-sm-4"></div>
								         	</div> <!--row-->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Name</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control" id="names" name="name" onkeyup="vald()" required>
																<small class="vald" style="color:red; display:none;">Please enter Valid name</small>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Login Name</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control login_name" name="login_name" required>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row-->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Password</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="Password" class="form-control password" name="password" required>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Email Address</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control" name="email" id="mail" onkeyup="vals()" required>
																<small class="vals" style="color:red; display:none;">Please enter Valid e-mail</small>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row -->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Phone No</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="number" class="form-control mobile_number" id="mobile_number" name="mobile_number" onkeyup="validation()" required>
																 <small class="validation" style="color:red; display:none;">Please enter 10 digits</small>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Language</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<select class="form-control language" name="language" required>
															        <option></option>
															        <option>Kannada</option>
															        <option>English</option>
															        <option>Hindi</option>
															        <option>Telugu</option>  
														      	</select>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row -->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Active From</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control active_from" name="active_from" id = "active_from" required>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Active End</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control active_end" id = "active_end" name="active_end" required>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row -->

								         	<div class="row">
								         		<div class="col-sm-4"></div>
								         		<div class="col-sm-4" style="text-align: center;">
								         	  <button type="submit" style="background:blue;color:#fff;" id="submit">Submit</button></div>
								         		<div class="col-sm-4"></div>
								         	</div>
										</form>
								    </div> <!--moday body -->
								</div>
								</div>
							</div>

							  <div class="modal" id="editModal">
								   <div class="modal-dialog modal-lg">
								      <div class="modal-content">
								      
								        <!-- Modal Header -->
								        <div class="modal-header" style="background-color:#F39309;">
								          <h4 class="modal-title">Update User</h4>
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								        </div>
								        
										
								        <!-- Modal body -->
								        <div class="modal-body">
										<form id = "edit_user_submit">
											<input type="hidden" class="form-control id" name="id" id="id"  required>
								         	<div class="row">
								         		<div class="col-sm-8">
								         			<div class="form-group" style="display: flex;">
										         		<label>Role</label>
										         		<select class="form-control role" id="role" name="role">
													        <option value = "1">Admin</option>
													        <option value = "2">Manager</option>
													        <option value = "3">User</option>
												      	</select>
										         	</div>
								         		</div>
								         		<div class="col-sm-4"></div>
								         	</div> <!--row-->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Name</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control" id="name" name="name" onkeyup="valde()">
																<small class="valde" style="color:red; display:none;">Please enter Valid name</small>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Login Name</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control login_name" id="login_name" name="login_name" readonly>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row-->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Password</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="Password" class="form-control password" id="password" name="password">
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Email Address</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control" id="email" name="email" onkeyup="valse()">
																<small class="valse" style="color:red; display:none;">Please enter Valid email</small>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row -->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Phone No</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="number" class="form-control mobile" id="mobile_number" name="mobile_number" onkeyup="validate()">
																 <small class="validate" style="color:red; display:none;">Please enter 10 digits</small>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Language</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<select class="form-control language" id="language" name="language">
															        <option></option>
															        <option>Kannada</option>
															        <option>English</option>
															        <option>Hindi</option>
															        <option>Telugu</option>  
														      	</select>
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row -->

								         	<div class="row">
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Active From</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control active_from" name="active_from" id = "actives_from">
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         		<div class="col-sm-6">
								         			<div class="form-group">
								         				<div class="row">
								         					<div class="col-sm-4">
								         						<label>Active End</label>
								         					</div>
								         					<div class="col-sm-8">
								         						<input type="text" class="form-control active_end" id = "actives_end" name="active_end">
								         					</div>
								         				</div>
								         			</div>
								         		</div>
								         	</div> <!--row -->

								         	<div class="row">
								         		<div class="col-sm-4"></div>
								         		<div class="col-sm-4" style="text-align: center;">
								         	  <button type="submit" style="background:blue;color:#fff;" id="update">Update</button></div>
								         		<div class="col-sm-4"></div>
								         	</div>
										</form>
								        </div> <!--moday body -->
								        
								     </div>
								   </div>
							  </div>
				  		

				  </section>
					

			</div><!-- /.container-fluid -->
   	 	</section> <!-- /.content -->
  	</div> <!-- /.content-wrapper -->
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/sweet_alert/sweet-alert.css');?>">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script> 
<script src="<?php echo base_url('assets/sweet_alert/sweet-alert.js');?>"></script>

<script type="text/javascript">
$(document).ready(function (){
	jQuery("#list").jqGrid({
		url:"<?php echo site_url('Manageuser/show_user_details');?>",
		datatype: "json", 
		colNames:['Sl','temple name','temple address','mobile number','User name','Password','Edit','delete'],
		colModel:[
			{name:'id',index:'id',hidden:true, width:150, editable:false},
			{name:'name',index:'name', width:150, editable:false},
			{name:'address',index:'address', width:150, editable:false},
			{name:'phonenumber',index:'phonenumber', width:150, editable:false},
			{name:'username',index:'username', width:150, editable:false},
			{name:'password',index:'password',width:150, editable:false},
			{name:'',index:'',search:false, width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
				var retVal = "";
				var retVal = ' <a data-toggle="tooltip" title="Edit" class="" href="javascript:void(0);"><span class="fa fa-pencil" onclick="fun_edit($(this))"  style="color:blue;"></span></a';
				return retVal;
			}},
			{name:'',index:'',search:false, width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
				var retVal = "";
				var retVal = ' <a data-toggle="tooltip" title="Delete" class="" href="javascript:void(0);"><span class="fa fa-trash" onclick="remove($(this))"  style="color:red;"></span></a>';
				return retVal;
			}},
		],
		rowNum:20,
		rowList:[20,40,60,100,200],
		pager: '#pager',
		viewrecords: true,
		width: '100%',
		height: '100%',
		sortorder: "desc",
		caption:"Events",
		rownumbers: true,
		loadonce:true,
		gridview: true,
		shrinkToFit: true,
		caption:"Users List"
	});
	$("#list").jqGrid("setLabel", "rn", "SL");
	jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false});
	jQuery("#list").jqGrid('filterToolbar',{searchOperators : true});
});
</script>

<script type="text/javascript">
$(".add_item").click(function(){
	$("#add_model").modal("show");
});
$("#into").click(function(){
  $('#add_user_submit')[0].reset();
});
$('#editModal').on('hidden.bs.modal', function (e) {
  $('.valde').hide();
  $('.valse').hide();
  $(".validate").hide();
});
$('#add_model').on('hidden.bs.modal', function (e) {
  $('.vald').hide();
  $('.vals').hide();
  $(".validation").hide();
  $('#add_user_submit')[0].reset();
});
function validation() {
	// alert("hii");
//   var phone = document.querySelector('.mobile_number').value;
  var phone = $('#mobile_number').val();
//   console.log(phone);
  if(phone.length==10) {
    $(".validation").hide();
  }
  else {
    $(".validation").show();
  }
}
function vals(){
  var d=$('#mail').val();
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
	$('#active_from').datepicker({dateFormat: "dd-mm-yy"});
  	$('#active_end').datepicker({dateFormat: "dd-mm-yy"});
	$('#actives_from').datepicker({dateFormat: "dd-mm-yy"});
  	$('#actives_end').datepicker({dateFormat: "dd-mm-yy"});

  	$('#add_user_submit').submit(function(e){  
    // alert('submit');
        e.preventDefault();
         formdata = new FormData($(this)[0]);
            $("#submit").text("Adding...");
            $("#submit").attr("disabled", true);
			var s = $(".vald").is(":hidden");
            var q = $(".vals").is(":hidden");
            var n = $(".validation").is(":hidden");
			if((s) && (q) && (n)){
				$.ajax({

					type   : 'post',
					url    : '<?php echo site_url("Manageuser/add_user_details")?>',
					data   : formdata,
					contentType: false,
					processData: false,
											
					success:function(response){
					response = jQuery.parseJSON(response);
					console.log(response);
						if(response.result==1)
						{  
							toastr["success"](response.message);
							$("#submit").removeAttr("disabled");
							$("#list").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
							$("#submit").text("Add");   
							$('#add_user_submit')[0].reset();
							$("#add_model").modal("hide");
						}
						else 
						{
							toastr["error"](response.message);
							$('#submit').removeAttr("disabled");
							$("#list").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');   
										
						}
					}
				});
			}
			else{
				$('#submit').removeAttr("disabled");
				$("#submit").text("Add");
				toastr.error('please enter correct data');
          	}
  	});
  function fun_edit(rowId){
    var id = rowId.closest('tr').attr('id');
    $.ajax({

        url:"<?php echo site_url("Manageuser/edit_user_details")?>",
        type:"POST",
        data:{id:id},
        success:function(response) {
			response = jQuery.parseJSON(response);
			console.log(response);
			if(response.result == 1) 
          	{
				var ss = response.message.role;
				var tt = response.message.language;
				var ll = response.message.active_from;
				var split1 = ll.split('-');
				var join = [ split1[2], split1[1], split1[0] ].join('-');
				var kk = response.message.active_end;
				var split = kk.split('-');
				var joins = [ split[2], split[1], split[0] ].join('-');
				$("#editModal").modal("show");
				$("#id").val(response.message.id);
				$("#role").val(ss);
				$("#name").val(response.message.name);
				$("#login_name").val(response.message.username);
				$("#password").val(response.message.password);
				$("#email").val(response.message.email);
				$("#mobile_number").val(response.message.phone);
				$("#language").val(tt);
				$("#actives_from").val(join);
				$("#actives_end").val(joins);
			}
		}
	});
  }	
  $('#edit_user_submit').submit(function(e){  
        e.preventDefault();
         formdata = new FormData($(this)[0]);
            $("#update").text("Updating...");
            $("#update").attr("disabled", true);
			var t = $(".valde").is(":hidden");
            var r = $(".valse").is(":hidden");
            var s = $(".validate").is(":hidden");
			if((t) && (r) && (s)){
				$.ajax({
					type   : 'post',
					url    : '<?php echo site_url("Manageuser/update_user_details")?>',
					data   : formdata,
					contentType: false,
					processData: false,
					success:function(response){
					response = jQuery.parseJSON(response);
					console.log(response);
						if(response.result==1)
						{  
							toastr["success"](response.message);
							$("#editModal").modal("hide");
							$('#update').removeAttr("disabled");
							$("#update").text("Save");    
							$("#list").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
						}
						else 
						{
							toastr["error"](response.message);
							$('#update').removeAttr("disabled");
							$("#update").text("Save");   
							$("#list").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
										
						}
					}
				});
			}
			else{
				$('#update').removeAttr("disabled");
				$("#update").text("Save");
				toastr.error('please enter correct data');
        	}
  });
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
        url:"<?php echo site_url("Manageuser/remove_user")?>",
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


</script>
<?php
  echo view('includes/footer');
?>