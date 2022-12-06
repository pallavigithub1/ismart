<?php $this->load->view('includes/admin_header');?>
 <link rel="stylesheet" href="<?php echo base_url('admin_assets/toastr/toastr.min.css');?>">
 <script src="<?php echo base_url('admin_assets/toastr/toastr.min.js');?>"></script>
					<div class="page-content">
					<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Add Master</h4>
					        </div>
						      <form class="add_quot" method="post">
							    <div class="modal-body">
							      
								<div class="row row-form">
									<div class="col-sm-12">
										<label class="col-sm-3">Master Type</label>
										<input type="text" name="master_type"  class="master_type" style="width: 230px; border-bottom: 1px solid #000;border-top:initial;border-right:initial; border-left:initial;"> 
									</div>
								</div>

								<div class="row" style="text-align:center;padding-top:50px;">
									<button type="submit" style="background:blue;color:#fff;" id="submit">Submit</button>
								</div>
							</div>  
						      </form>   
						    </div>
						  </div>
						</div>


					
					<form class="form-inline master_submit">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<div class="row" style="background-color:#f8f8f8;padding-top: 10px;padding-bottom: 10px;">
										<div class="col-sm-12 col-md-2">
											<span style="font-size:25px;">Create Masters</span>
										</div>
										<div class="col-sm-7"></div>										
									</div>
									<div class="row">
										<div class=" col-sm-12  col-md-6">
											<label class="col-sm-4">Master Type<span style="color:red"	>*</span></label>
											<div class="col-sm-8 yes_form">
												<select name="master_type_id" class="form-control master_type" required="required">
													<option value="">Select</option>
													<option value="0">Quotation/Invoice Mail From</option>
													<?php 
													foreach($master_type as $value)
													{
														?>
														<option value="<?php echo $value->master_type_id;?>"><?php echo $value->master_type;?></option>
														<?php
													}
													?>

												</select>
											</div>	
										</div>

										
									</div>

									
									<div class="row">
									<div class="col-sm-12 table-responsive">
										<table class="table table-bordered" border="1" style="">

										</table>
									</div>
									</div>

									
									<div class="row">
										
									</div>
									<div class="row">
										
									</div>						
									
									<table class="table" id="maintable1">

										<thead>

											<tr id="column_id">

												<th>Sl No</th>

												<th>Field Label</th>

												<th>Value</th>

												<th>Action</th>

											</tr>

										</thead>

										<tbody id="tbody_new1">

											
										</tbody>
									</table>

									
									<div class="row" style="background-color:#f8f8f8;padding-top: 10px;padding-bottom: 10px;">
										
										<div class="col-sm-10"></div>
										<div class="col-sm-2">
											<button type="submit" class="btn btn-sm lead_submit">Save</button>
											<a href="<?php echo site_url('master'); ?>"><button type="button" class="btn btn-sm">Cancel</button></a>
										</div>
									</div>

									</form>




								<button class="accordion">Master List</button>

								
								<div class="panel">
								<button type="button" class="btn btn-primary btn-sm access_add_btn" data-toggle="modal" data-target="#addModal">
								  Add Master
								</button>
								 	<table class="table" id="maintable">

										<thead>

											<tr id="column_id">

												<th>Sl No</th>

												<th>Master Name</th>

												<th>Action</th>

											</tr>

										</thead>

										<tbody id="tbody_new">

										<?php foreach($master_type as $key=>$value){ ?>
										<tr>

										<td><?php echo $key=$key+1; ?></td>

										<td><?php echo $value->master_type; ?></td>
										<td> 
								<span class="glyphicon glyphicon-trash" onclick="delete_quotation('<?php echo $value->master_type_id; ?>');"></span>&nbsp&nbsp<span class="glyphicon glyphicon-edit"  onclick="edit_master('<?php echo $value->master_type_id; ?>','<?php echo $key; ?>');"></span>
								<input type="hidden" value="<?php echo $value->master_type; ?>" class="master_new<?php echo $key; ?>">

								</td>

										</tr>
														
										<?php }	?>
											
										</tbody>

									</table>
								</div>

								


									

							</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->

						

						</div><!-- /.row -->


					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit Master</h4>
			        </div>
				      <form class="quote_msg" method="post">
					    <div class="modal-body">
					      
						<input type="hidden" class="master_type_id" name="master_type_id">
						
						<div class="row row-form">
							<div class="col-sm-12">
								<label class="col-sm-3">Master Type</label>
								<input type="text" name="master_type"  class="master_type" style="width: 230px; border-bottom: 1px solid #000;border-top:initial;border-right:initial; border-left:initial;"> 
							</div>
						</div>

						<div class="row" style="text-align:center;padding-top:50px;">
							<button type="submit" style="background:blue;color:#fff;" id="submit">Update</button>
						</div>
					</div>  
				      </form>   
				    </div>
				  </div>
				</div>

			</body>
		</html>
<style type="text/css">	.yes_form input{		width:100% !important;		border:none !important;		border-bottom:1px solid gray !important;		margin-bottom:5%;		}	.yes_form select{		width:100% !important;		border:none !important;		border-bottom:1px solid gray !important;			margin-bottom:5%;		}	.yes_form textarea{		width:100% !important;		border:none !important;		border-bottom:1px solid gray !important;			margin-bottom:5%;			}</style>
<script src="<?php echo base_url('admin_assets/assets/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('admin_assets/assets/datatables/dataTables.bootstrap.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('admin_assets/assets/datatables/dataTables.bootstrap.css');?>">

<script type="text/javascript">


	$('.master_type').change(function(e){
		e.preventDefault();
		var id=$(this).val();
		
		if(id==0)
		{
		   quotation_data();
		}else{
		   
		test();
		}
	});
	
		function quotation_data(){
		    

		var id=$('.master_type :selected').val();
		var text=$('.master_type :selected').text();

		$.ajax({	
			url:"<?php echo site_url("yaskawa/get_mastar_value_invoice_quotation")?>",
			type:"GET",
			success:function(response) {
			response=jQuery.parseJSON(response);
            if(response.result==1){
				var content='';
				var key=1;
				content+='<thead>';
				    content+='<tr>';
					content+='<th>SL</th>';	
					content+='<th>Name</th>';	
					content+='<th>Designation</th>';	
					content+='<th>Phone</th>';	
					content+='<th>Address</th>';
					content+='<th>Action</th>';
					content+='</tr>';
					content+='</thead>';
					content+='<tbody class="tbody_new_new">';
					
				$.each(response.message,function(index,val){
			
					content+='<tr>';
						content+='<td>'+key+'</td>';
						content+='<td>'+val.name+'</td>';
						content+='<td>'+val.designation+'</td>';
						content+='<td>'+val.phone+'</td>';
						content+='<td>'+val.address+'</td>';
						content+='<td>Mail from:&nbsp;&nbsp;<input Type="checkbox" class="checked_check" onclick="select_member_mail('+val.id+');"';
						if(val.checked_status==1){
						    content+='checked';
						}
						    
						content+='>&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"  onclick="delet_i_q('+val.id+');"></span>';
						if(index==0){
						content+='&nbsp<button type="button" class="glyphicon glyphicon-plus add_more_button" onclick="add_more_button_new();"></button>';
						}					
						content+='</td>';
						
					content+='</tr>';
					
					key++;

				});

	        
					}
				else{
					var len1=0;
					content+='<thead>';
					content+='<tr>';
                    content+='<th>SL</th>';	
					content+='<th>Name</th>';	
					content+='<th>Designation</th>';	
					content+='<th>Phone</th>';	
					content+='<th>Address</th>';
					content+='<th>Action</th>';
					content+='</thead>';
					content+='</tr>';
					content+='<tr>';
						content+='<td>Data Not Found</td>';
						content+='<td></td>';
						content+='<td></td>';
						content+='<td></td>';
						content+='<td></td>';
					content+='<td><button type="button" class="glyphicon glyphicon-plus " onclick="add_more_button_new();"></button>';
					content+='</tr>';

				}
				content+='</tbody>';

                
				$('#maintable1').empty();

				$('#maintable1').append(content);


				var len = len+1;
	

			var len1 = len1+1;



		}

		});

	}
	function add_more_button_new(){
		
			var mode = '';

			mode += '<tr>';
			mode += '<td>'+1+'</td>';
			mode += '<td style=""><input type="hidden" value="MAIL" name="from_data"><input type="text" style="width: 100%; color: #393939;" class="form-control" name="name"  placeholder="Name" required="required"></td>';
			mode += '<td style=""><input type="text" style="width: 100%;" class="form-control" name="designation" placeholder="Designation"  required="required"></td>';
			mode += '<td style=""><input type="text" style="width: 100%;" class="form-control" name="phone" placeholder="Phone "  maxlength="10" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" required="required"></td>';
			mode += '<td style=""><input type="text" style="width: 100%;" class="form-control" name="address" placeholder="Address"  required="required"></td>';
			
			mode += '<td style=""><a class="remove" href="javascript:void(0);"><span class="glyphicon glyphicon-trash"></span></a></td>';	
			mode += '</tr>';

			$("#maintable1").append(mode).fadeIn('slow');
			$(".remove").click(function(){
				$(this).closest('tr').remove();
			});
			$(".required_checkbox").click(function(){

				$(".required_checkbox").each(function () {
		        if (this.checked) {
		            $(this).val('YES');
		            $(this).prev('input').val('YES');
		        }
		        else
		        {
		        	$(this).val('NO');
		        	$(this).prev('input').val('NO');
		        }
		    });

			});

	}

	function test(){

		var id=$('.master_type :selected').val();
		var text=$('.master_type :selected').text();

		$.ajax({	
			url:"<?php echo site_url("yaskawa/get_mastar_value")?>",
			type:"POST",
			data:{id:id},
			success:function(response) {
				response=jQuery.parseJSON(response);
            if(response!='null' && response.field_value!='[]' && response.field_value !='null'){
				var res=jQuery.parseJSON(response.field_value);
				
				var n=0;
				$.each(res,function(index,val){
				    
				    n+=1;
				});
				
				var len=n;
				var m_id=response.master_id;
				var content='';
				var key=1;
				
				content+='<thead>';
				content+='<tr id="column_id">';
				content+='<th>Sl No</th>';
				content+='<th>Field Label</th>';
                content+='<th>Value</th>';
				content+='<th>Action</th>';
				content+='</tr>';
			    content+='</thead>';
			    content+='<tbody id="tbody_new1">';
				$.each(res,function(index,val){
					
					content+='<tr>';
						content+='<td>'+key+'</td>';
						content+='<td>'+response.field_label+'</td>';
						content+='<td>'+val+'</td>';
						content+='<td><span class="glyphicon glyphicon-trash"  onclick="delet('+key+','+m_id+');"><input type="hidden" value="'+val+'" class="del'+key+'" ></span>';
						if(len==key){
						content+='&nbsp<button type="button" class="glyphicon glyphicon-plus add_more_button"></button>';
						}					
						content+='</td>';
						
					content+='</tr>';
					
					key++;

				});


					}
				else{
					var len1=0;

					content+='<tr>';
						content+='<td>Data Not Found</td>';
						content+='<td></td>';
						content+='<td></td>';
					content+='<td><button type="button" class="glyphicon glyphicon-plus add_more_button1"></button>';
					content+='</tr>';

				}

                content+='</tbody>';
				$('#maintable1').empty();

				$('#maintable1').append(content);


				var len = len+1;
		$(".add_more_button").click(function(){
		
			var mode = '';

			mode += '<tr>';
			mode += '<td>'+len+'</td>';
			mode += '<td style=""><input type="hidden" style="width: 100%; color: #393939;" class="form-control" name="master_type_id"  value="'+response.master_type_id+'" required="required"><input type="text" style="width: 100%; color: #393939;" class="form-control" name="field_label"  value="'+response.field_label+'" readonly></td>';
			mode += '<td style=""><input type="text" style="width: 100%;" class="form-control" name="field_value[]" placeholder="Value"  required="required"></td>';
			
			mode += '<td style=""><a class="remove" href="javascript:void(0);"><span class="glyphicon glyphicon-trash"></span></a></td>';	
			mode += '</tr>';

			$("#maintable1").append(mode).fadeIn('slow');
			$(".remove").click(function(){
				$(this).closest('tr').remove();
			});
			len++;

			$(".required_checkbox").click(function(){

				$(".required_checkbox").each(function () {
		        if (this.checked) {
		            $(this).val('YES');
		            $(this).prev('input').val('YES');
		        }
		        else
		        {
		        	$(this).val('NO');
		        	$(this).prev('input').val('NO');
		        }
		    });

			});

	});

			var len1 = len1+1;
		$(".add_more_button1").click(function(){
		
			var mode = '';

			mode += '<tr>';
			mode += '<td>'+len1+'</td>';
			mode += '<td style=""><input type="hidden" style="width: 100%; color: #393939;" class="form-control" name="master_type_id"  value="'+id+'" required="required"><input type="text" style="width: 100%; color: #393939;" class="form-control" name="field_label"  value="'+text+'" required="required"></td>';
			mode += '<td style=""><input type="text" style="width: 100%;" class="form-control" name="field_value[]" placeholder="Value"  required="required"></td>';
			
			mode += '<td style=""><a class="remove" href="javascript:void(0);"><span class="glyphicon glyphicon-trash"></span></a></td>';	
			mode += '</tr>';

			$("#maintable1").append(mode).fadeIn('slow');
			$(".remove").click(function(){
				$(this).closest('tr').remove();
			});
			len1++;

			$(".required_checkbox").click(function(){

				$(".required_checkbox").each(function () {
		        if (this.checked) {
		            $(this).val('YES');
		            $(this).prev('input').val('YES');
		        }
		        else
		        {
		        	$(this).val('NO');
		        	$(this).prev('input').val('NO');
		        }
		    });

			});

	});


		}

		});

	}




	function edit_field(id,key){

		$('.master_id').val(id);

		var val=$('.del'+key).val();

		$('.field_value').val(val);

		$('#editfieldModal').modal('show');


	}


	function delet(key,m_id){
		var v=$('.del'+key).val();
		 swal({   

	  title: "Are you sure?",
	  text: "You will not be able to recover this data!",
	  type: "warning",   showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plz!",
	  closeOnConfirm: false,
	  closeOnCancel: false 
	  },
	function(isConfirm){   
	  if (isConfirm) { 
	      $(".sweet-alert").hide();
	      $(".sweet-overlay").hide();
		$.ajax({		
			url:"<?php echo site_url("yaskawa/delete_master_data")?>",
			type:"POST",
			data:{'value':v,'m_id':m_id},
			success:function(response) {
				response=jQuery.parseJSON(response);
				if(response == 1) 
					{
						toastr["success"]("Deleted successfully");

						test();
						
					}else{

						toastr["error"]("Not Deleted");
					}

			}

		});	
		 } 
		          else {
		          $(".sweet-alert").hide();
		          $(".sweet-overlay").hide();
		      	}
	  	});
		
	}



	
	function delet_i_q(id){
	    
		 swal({   

	  title: "Are you sure?",
	  text: "You will not be able to recover this data!",
	  type: "warning",   showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plz!",
	  closeOnConfirm: false,
	  closeOnCancel: false 
	  },
	function(isConfirm){   
	  if (isConfirm) { 
	      $(".sweet-alert").hide();
	      $(".sweet-overlay").hide();
		$.ajax({		
			url:"<?php echo site_url("yaskawa/delete_mail_signature")?>",
			type:"POST",
			data:{'id':id},
			success:function(response) {
				response=jQuery.parseJSON(response);
				if(response.result == 1) 
					{
						toastr["success"]("Deleted successfully");

						quotation_data();
						
					}else{

						toastr["error"](response.message);
					}

			}

		});	
		 } 
		          else {
		          $(".sweet-alert").hide();
		          $(".sweet-overlay").hide();
		      	}
	  	});
		
	}

function delete_quotation(id){
	var id = id;
	 swal({   

	  title: "Are you sure?",
	  text: "You will not be able to recover this data!",
	  type: "warning",   showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plz!",
	  closeOnConfirm: false,
	  closeOnCancel: false 
	  },
	function(isConfirm){   
	  if (isConfirm) { 
	      $(".sweet-alert").hide();
	      $(".sweet-overlay").hide();
				$.ajax({
					
					url:"<?php echo site_url("yaskawa/delete_master_new")?>",
					type:"POST",
					data:{id:id},
					success:function(response) {
						response=jQuery.parseJSON(response);
								console.log(response);
							if(response.result == 1) 
							{
								toastr["success"]("Deleted successfully");
								
							}
						}

					});  
				
				 } 
		          else {
		          $(".sweet-alert").hide();
		          $(".sweet-overlay").hide();
		      	}
	  	});
	}

	function edit_master(id,n){
		var master_type=$('.master_new'+n).val();

		$('.master_type_id').val(id);

		$('.master_type').val(master_type);
		
		$("#msgModal").modal('show');


	}

$(document).ready(function(){

	$('#maintable').dataTable();
	



	$('.master_submit').submit(function(e){    
        e.preventDefault();

         formdata = new FormData($(this)[0]);

         	$(".lead_submit").attr('disabled', 'disabled');
            $(".lead_submit").text("Submitting...");

            $.ajax({

                type   : 'post',
                url    : '<?php echo site_url("add_masters")?>',
                data   : formdata,
                contentType: false,
                processData: false,
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);

                  if(response.result==1)
                    {
	                    toastr["success"](response.message);
	                     $('.master_submit')[0].reset();
	                    // $(".more_fields_div").empty();
	                    $(".lead_submit").text("Save");   
	                    $(".lead_submit").removeAttr('disabled'); 

	                    test();
                    }
                    else 
                    {
	                    toastr["error"](response.message);                       
		                $(".lead_submit").text("Save");
		                $(".lead_submit").removeAttr('disabled');                        
                    }
                   
                }
                
         });
             
    });


    $('.quote_msg').submit(function(e){    
        e.preventDefault();
         formdata = new FormData($(this)[0]);
            $.ajax({
                type   : 'post',
                url    : '<?php echo site_url("yaskawa/update_master_new")?>',
                data   : formdata,
                contentType: false,
                processData: false,                        
                  success:function(response){
                  response=jQuery.parseJSON(response);              
                  if(response.result==1)
                    {
	                    toastr["success"](response.message);	                    
	                   
                    }
                    else 
                    {
	                    toastr["error"](response.message);                       
		                                     
                    }
                   
                }
                
         });
             
    });


    $('.add_quot').submit(function(e){    
        e.preventDefault();
         formdata = new FormData($(this)[0]);
            $.ajax({
                type   : 'post',
                url    : '<?php echo site_url("yaskawa/add_master_new")?>',
                data   : formdata,
                contentType: false,
                processData: false,                        
                  success:function(response){
                  response=jQuery.parseJSON(response);              
                  if(response.result==1)
                    {
	                    toastr["success"](response.message);	
	                    location.reload();                    
	                   
                    }
                    else 
                    {
	                    toastr["error"](response.message);                       
		                                     
                    }
                   
                }
                
         });
             
    });


    $('.edit_field_val').submit(function(e){    
        e.preventDefault();
         formdata = new FormData($(this)[0]);
            $.ajax({
                type   : 'post',
                url    : '<?php echo site_url("yaskawa/edit_field_value")?>',
                data   : formdata,
                contentType: false,
                processData: false,                        
                  success:function(response){
                  response=jQuery.parseJSON(response);              
                  if(response.result==1)
                    {
	                    toastr["success"](response.message);	
	                    location.reload();                    
	                   
                    }
                    else 
                    {
	                    toastr["error"](response.message);                       
		                                     
                    }
                   
                }
                
         });
             
    });

    

});
 
function select_member_mail(id)
{
    
        $.ajax({
          url:"<?php echo site_url('yaskawa/mail_from_selected')?>",
          type:"POST",
          data:{'id':id,'status':'1'},
           success:function(response){
                      response=jQuery.parseJSON(response);
                      console.log(response);

                        if(response.result==1)
                        {    

                            toastr["success"](response.message);
                            quotation_data();
                        }
                        else 
                        {
                             toastr["error"](response.message);
                                          
                        }
                    }

        });
    
   
}
</script>


<style type="text/css">
	.NameHighlights {
   
}
.NameHighlights div {
    display: none;
}
.NameHighlightsHover {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}
.NameHighlightsHover div {
	margin-top:15%;
    display:block;
    position:absolute;
    width: 25em;
    top:1.3em;
    *top:20px;
    left:70px;
    z-index:1000;
    background-color:white ;
    padding: 5px;
    border-radius: 4px;
	font-size:15px;
	border:2px solid rgba(0,0,0,0.03);
	box-shadow: 8px 8px 5px gray;
}
.dropmid {
	padding-left:0 ! important;
}
</style>


<style type="text/css">
	.accordion {
    background-color: #ccc;
    color: #444;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    margin-top: 10px;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}

</style>

<script type="text/javascript">
	var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>


<?php $this->load->view('includes/admin_footer');?>