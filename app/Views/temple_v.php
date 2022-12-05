<?php

 echo view('includes/header',$temple_details, $rel);

?>

	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Register Temple</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
	              <li class="breadcrumb-item active">Temple List</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	        <div class="row">
	            <div class="col-sm-10"></div>
	            <div class="col-sm-2">
                <?php if(session()->get('role_id') == 4){ ?> 
                  <button class="btn btn-primary add_item" id="add_item" style="float:right;">Add New</button>

               <?php }	 ?> 
              
              </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
	        	
	        	 <section class="Master">
			    	<h2 class="master-head"></h2>
			    	<div class="row" style="margin-top:20px;">
			    		<!-- <div class="col-sm-1">
			    			<label>Master Type</label>
			    		</div>
			    		<div class="col-sm-5">
			    			<select class="form-control" id="master_type" name="master_type">
						        <?php
						        	foreach($master_type as $key=>$master){
						        		 ?>
						        		 <option value= "<?php echo $master['master_type_id']; ?>">
                         	<?php echo $master['master_type']; ?></option>
                         	
                         	<?php
                         }
						        ?>
						    </select>
			    		</div> -->
				    	<div class="col-sm-8">
				    	</div>
			    		<div class="col-sm-2">
			    			<!-- <button><i class="fa fa-plus" aria-hidden="true"></i></button> -->
			    		
			    		</div>
			    	
			    		<div class="col-sm-2"></div>
			    	</div>
						<div class="col-sm-1"></div>

                  <div class="col-sm-10">

                    <div id="jaytab3" style="margin-top:6%;" >

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
        <h4 class="modal-title">Add Temple</h4>
        <button type="button" class="close cancel" id="into" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form" id="add_temple_details" enctype="multipart/form-data">
        
        <input type="hidden" class="form-control" name="id" id="ids"  required>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Temple Name</label><br>
            <textarea type="text" class="form-control" name="temple_name" id="temples_name" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Email</label><br>
            <input type="text" class="form-control" name="email" style="width:165px;" id="mail" onkeyup="vals()" required>
            <small class="vals" style="color:red; display:none;">Please enter Valid e-mail</small>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Address</label><br>
            <textarea type="text" class="form-control" name="address"  required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Phone number</label><br>
            <input type="number" class="form-control phone_no" name="phone" onkeyup="validation()" required>
            <small class="validation" style="color:red; display:none;">Please enter 10 digits</small>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Contact Person</label><br>
            <input type="text" class="form-control" id="contacts_person" name="contact_person" onkeyup="vald()" required>
            <small class="vald" style="color:red; display:none;">Please enter Valid name</small>
          </div>
        </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_header">Receipt header</label><br>
            <input type="text" class="form-control" name="receipt_header" id="receipts_header"  required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_footer">Receipt footer</label><br>
            <input type="text" class="form-control" name="receipt_footer" id="receipts_footer"  required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_prefix">Receipt no. prefix</label><br>
            <input type="text" class="form-control" name="receipt_prefix" id="receipts_prefix"  required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_instructions">Receipt instructions</label><br>
            <input type="text" class="form-control" name="receipt_instructions" id="receipts_instructions"  required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="image_logo">Upload image logo</label><i onclick="clean()" class="fa fa-times" aria-hidden="true" style=" color:#ee6304;cursor: pointer;"></i><br>
            <input type="file" id="image_logo" name="image_logo" onchange="readURL2(this);" accept="image/*">
            <img src="" class="img-fluid" width="80" height="80" alt="preview image" id="blah" />
          </div>
        </div>
        </div>
        </div>
        </div>
        <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary center-block add" style="float:left;color:black;margin-top:10px;">Add</button>
            <button type="button" class="btn btn-primary center-block" data-dismiss="modal" id="into1" style="float:left;color:black;margin-top:10px;">Cancel</button>
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
      	<h4 class="modal-title">Edit Temple Details</h4>
        <button type="button" class="close cancel" id="img" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form" id="edit_temple_details" enctype="multipart/form-data">

        <input type="hidden" class="form-control" name="id" id="id"  required>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Temple Name</label><br>
            <textarea type="text" class="form-control" name="temple_name" id="temple_name" readonly></textarea>
          </div>
        </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Email</label><br>
              <input type="text" class="form-control" id="email" name="email" style="width:165px;" onkeyup="valse()">
              <small class="valse" style="color:red; display:none;">Please enter Valid email</small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Address</label><br>
              <textarea type="text" class="form-control" name="address" id="address"></textarea>
            </div>
          </div>
         <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Phone number</label><br>
              <input type="number" class="form-control phone" name="phone" onkeyup="validate()" id="phone">
              <small class="validate" style="color:red; display:none;">Please enter 10 digits</small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Contact Person</label><br>
              <input type="text" class="form-control" id="contact_person" name="contact_person" onkeyup="valde()" >
              <small class="valde" style="color:red; display:none;">Please enter Valid name</small>
            </div>
          </div>
          </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_header">Receipt header</label><br>
            <input type="text" class="form-control" name="receipt_header" id="receipt_header" >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_footer">Receipt footer</label><br>
            <input type="text" class="form-control" name="receipt_footer" id="receipt_footer"  >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_prefix">Receipt no. prefix</label><br>
            <input type="text" class="form-control" name="receipt_prefix" id="receipt_prefix"  >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="receipt_instructions">Receipt instructions</label><br>
            <input type="text" class="form-control" name="receipt_instructions" id="receipt_instructions"  >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="img_logos">Image logo</label><i onclick="wash()" class="fa fa-times" aria-hidden="true" style=" color:#ee6304;cursor: pointer;"></i><br>
            <input type="file" id="img_logos" name="image_logo" onchange="readURL1(this);" accept="image/*">
          </div>
        </div>
        <div id="preview"></div>
        </div>
        </div>
        </div>
          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Update</button>
                <button type="button" class="btn btn-primary center-block" data-dismiss="modal" id="img1" style="float:left;color:black;margin-top:10px;">Cancel</button>


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
	//  var master_type = $('#master_type').val();

	//  var master_name = $("#master_type option:selected").text();

	//  master_name = master_name.replace(/[^A-Z0-9]/ig, "");
	//  if(master_type != ''){
	 		 $("#add_model").modal("show");
	 		//  $(".master_id").val(master_type);
	 		//  $(".master_type_add").val(master_name);
	 		 
	//  }
	//  else{
	//  		toastr["error"]('YOU MUST SELECT THE MASTER');
	//  }

	 //alert(master_type);
});
function vald(){
  var c=$('#contacts_person').val();
  var letters=/^[a-zA-z]+([\s][a-zA-Z]+)*$/;
  if(c.match(letters)){
    $('.vald').hide();
  }else{
    $('.vald').show();
  }
}
function valde(){
  var c=$('#contact_person').val();
  var letters=/^[a-zA-z]+([\s][a-zA-Z]+)*$/;
  if(c.match(letters)){
    $('.valde').hide();
  }else{
    $('.valde').show();
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
function valse(){
  var d=$('#email').val();
  var valmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(d.match(valmail)){
    $('.valse').hide();
  }else{
    $('.valse').show();
  }
}
function validation() {
  var phone = document.querySelector('.phone_no').value;
  if(phone.length==10) {
    $(".validation").hide();
  }
  else {
    $(".validation").show();
  }
}
function validate() {
  var phone = document.querySelector('.phone').value;
  if(phone.length==10) {
    $(".validate").hide();
  }
  else {
    $(".validate").show();
  }
}
function readURL1(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blahs').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#img_logos').hide();
  }
}
function readURL2(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#image_logo').hide();
  }
}
// $("#into").click(function(){
//   $('#blah').attr('src', '');
//   $('#image_logo').val(null);
// });

// $("#into1").click(function(){
//   $('#blah').attr('src', '');
//   $('#image_logo').val(null);
// });

function clean(){
  $('#blah').attr('src', '');
  $('#image_logo').val(null);
  $('#image_logo').show();
}

function wash(){
  $('#blahs').attr('src', '');
  $('#img_logos').val(null);
  $('#img_logos').show();
}

$("#img1").click(function(){
  $('#preview').empty();
});

$('#edit_modal').on('hidden.bs.modal', function (e) {
  $('#preview').empty();
  $('.valde').hide();
  $('.valse').hide();
  $(".validate").hide();
});

$('#add_model').on('hidden.bs.modal', function (e) {
  $('#blah').attr('src', '');
  $('#image_logo').val(null);
  $('.vald').hide();
  $('.vals').hide();
  $(".validation").hide();
  $('#add_temple_details')[0].reset();
});

$("#into1").click(function(){
  $('#blah').attr('src', '');
  $('#image_logo').val(null);
  $('#add_temple_details')[0].reset();
});

$("#into").click(function(){
  $('#blah').attr('src', '');
  $('#image_logo').val(null);
  $('#add_temple_details')[0].reset();
});



  $('#add_temple_details').submit(function(e){  
        e.preventDefault();
        var j = $('#blah').attr('src');
        if(j){
          formdata = new FormData($(this)[0]);
            $(".add").text("Adding...");
            $(".add").attr("disabled", true);
            var s = $(".vald").is(":hidden");
            var q = $(".vals").is(":hidden");
            var n = $(".validation").is(":hidden");
            if((s) && (q) && (n)){
              $.ajax({

                  type   : 'post',
                  url    : '<?php echo site_url("Dashboard/add_temple_details")?>',
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
                          $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                          $(".add").text("Add");
                          $('#blah').attr('src', '');
                          $('#image_logo').val(null);
                          $('#image_logo').show();
                          $('#add_temple_details')[0].reset();
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
        }
        else{
              toastr.error('Please Select an image');
          }
  });






  

  $('#edit_temple_details').submit(function(e){  
        e.preventDefault();
        var o = $('#blahs').attr('src');
          if(o){
            formdata = new FormData($(this)[0]);
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            var t = $(".valde").is(":hidden");
            var r = $(".valse").is(":hidden");
            var s = $(".validate").is(":hidden");
            if((t) && (r) && (s)){
              $.ajax({

                  type   : 'post',
                  url    : '<?php echo site_url("Dashboard/update_temple_details")?>',
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
                          $('#preview').empty();
                          
                      }
                      else 
                      {
                          toastr["error"](response.message);
                          $('.update').removeAttr("disabled");
                          $(".update").text("Save");   
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
          }
          else{
              toastr.error('Please Select an image');
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

<!-- <script type="text/javascript" src="<?php //echo base_url('bootbox-master/dist/bootbox.min.js'); ?>"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script type="text/javascript">

  $(document).ready(function () 

{  

    var pickup_date   = '1';
    var sales_person  = '1';


    var lastSelection = "";

    jQuery("#list3").jqGrid({

              url:"<?php echo site_url('Dashboard/show_temple_details');?>",

              datatype: "json", 

              colNames:['Sl','Temple','Email','Address','Phone number','Contact person','Edit','Delete'],

              colModel:[

                {name:'id',index:'id',hidden:true, width:150, editable:false},

                {name:'name',index:'name', width:150, editable:false},

                {name:'email',index:'email',width:150, editable:false},

                {name:'address',index:'address', width:150, editable:false},
                
                {name:'phonenumber',index:'phonenumber', width:150, editable:false},
                {name:'contactperson',index:'contactperson', width:150, editable:false},
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
                        var retVal = ' <a data-toggle="tooltip" title="Delete" class="" href="javascript:void(0);"><span class="fa fa-trash" onclick="remove($(this))"  style="color:red;"></span></a>';
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

              caption:"Temple List"



               

                

              }); 



            

             

              

              $("#list3").jqGrid("setLabel", "rn", "SL");



              $("#list3").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required



              $("#list3").jqGrid('navGrid','#pager3',

              {edit:false,add:false,del:false,search:false,refresh:false},

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

function fun_edit(rowId)
  {
    var id = rowId.closest('tr').attr('id');
    // alert(id);
      $.ajax({

        url:"<?php echo site_url("Dashboard/edit_temple_details")?>",
        type:"POST",
        data:{id:id},
        success:function(response) {
        response = jQuery.parseJSON(response);
        console.log(response);

          if(response.result == 1) 
          {

            $("#edit_modal").modal("show");
             $("#id").val(response.message.id);
             $("#temple_name").val(response.message.name);
             $("#email").val(response.message.email);
             $("#address").val(response.message.address);
             $("#phone").val(response.message.phonenumber);
             $("#contact_person").val(response.message.contactperson);
             $("#receipt_header").val(response.message.receipt_header);
             $("#receipt_footer").val(response.message.receipt_footer);
             $("#receipt_prefix").val(response.message.receipt_number_prefix);
             $("#receipt_instructions").val(response.message.receipt_instructions);
             $('#img_logos').hide();
             $("#preview").append("<img src='../uploads/"+response.message.image+"' class='img-fluid' width='80' height='80' alt='preview image' id='blahs'>");
             $("#img").click(function(){
                $('#preview').empty();
              });
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

  // function gridload(){

    

    // $.ajax({

    //   url:"<?php //echo site_url("Dashboard/show_temple_details")?>",
    //   type:"POST",
    //   datatype: "json",
    //   success:function(response) {
       
          
          // jQuery('#list3').jqGrid('clearGridData');
          // jQuery('#list3').jqGrid('setGridParam', {data: response});
          // jQuery('#list3').trigger('GridUnload');
          // jQuery('#list3').trigger('reloadGrid');
          // history.go(0);
    //   }  

    // });
    
  // }

function remove(rowId){
  var id = rowId.closest('tr').attr('id');
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
        url:"<?php echo site_url("Dashboard/remove_temple_details")?>",
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
