<?php $this->load->view('includes/header.php')?>



<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/grid_style.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/jqgrid/css/ui.jqgrid-bootstrap-ui.css'); ?>" />
<script type="text/ecmascript" src="<?php echo base_url('assets/jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('assets/jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/timepicker/jquery.timepicker.css'); ?>" />
<script src="<?php echo base_url('assets/timepicker/jquery.timepicker.js'); ?>" type="text/javascript"></script>


<div class="content-wrapper">
    
  
    
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
             <button type='button' class="btn btn-primary go_back">Back</button>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Customer</a></li>
          <li class="breadcrumb-item"> Social Media Customers </li>
        </ol>
        </div> 
      </div> 
      </div>
    </div>

   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays" onclick="planningtypes('add-custom')">Add Customer
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays" onclick="planningtypes('today_list')">Website
            </label>
          </div> 
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays" onclick="planningtypes('todays_entry')" >Facebook/Instagram 
              </label>
            </div>

            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays" onclick="planningtypes('expired_entry')" >Google  
              </label>
            </div>

            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays" onclick="planningtypes('call_back')" >LinkedIn  
              </label>
            </div>

            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays"  onclick="planningtypes('expired_callback')" >99 Acres 
              </label>
            </div>

            <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio"  class="form-check-input" id="" name="optradio" value="" onclick="planningtypes('duplicate_customer')">MagicBricks     
            </label>
          </div>
          
          <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio"  class="form-check-input" id="todays" name="optradio" value="todays"  onclick="planningtypes('housing')" >Housing.com
              </label>
            </div>

            <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio"  class="form-check-input" id="" name="optradio" value="" onclick="planningtypes('brokerage')">No Brokerage     
            </label>
          </div>

            <div id="today_list">
          <div id ="jaytab1" style="margin-top:3%" class="grid table-responsive">
          <table id="list2"></table>
          <div id="pager2"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
          </div>
           <div id="add-custom">
          <div id ="jaytab1" style="margin-top:3%" class="grid table-responsive">
            <div class="row duplicate_for_hide">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          <form class="filter_choice_submit">
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" checked="checked" class="form-check-input" id="todays" name="optradio" value="todays" onclick="planningtypes('today_list')">Today's Customer List
            </label>
          </div>
         
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="date" name="optradio" value="date" onclick="planningtypes('dates_list')">Date
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="month" name="optradio" value="month" onclick="planningtypes('months_list')">Month
            </label>
          </div>
          <div class="form-check-inline disabled">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="year" name="optradio" value="year" onclick="planningtypes('years_list')">Year
            </label>
          </div>
           <div class="form-check-inline disabled">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="all" name="optradio" value="all" onclick="planningtypes('alls_list')">All
            </label>
          </div>
          
          <div class="from_to_date">
          </div>
         
          <div class="months">
          </div>

           <div class="years">
          </div>

          <div class="row " style="padding-top: 30px;">
            <div class="center filter_submit">

            </div>
          </div>

        </form>
         
          <div id="todays_list">
          <div id ="todaysjaytab" style="margin-top:3%" class="grid ">
          <table id="list2"></table>
          <div id="pager2"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
          </div>
        </div>

          <div id="all_list">
            <div id ="alljaytab" style="margin-top:3%;" class="grid table-responsive">
            <table id="list0"></table>
            <div id="pager0"></div>
            <div id="dialogSelectRow" title="Warning" style="display:none">
              <p>Please select row</p>
            </div>
         </div>
       </div>
         
         <div id="date_list">
          <div id ="datejaytab" style="margin-top:3%" class="grid table-responsive">
          <table id="datelist1"></table>
          <div id="datepager1"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
        </div>
      </div>

        <div id="month_list">
        <div id ="monthjaytab" style="margin-top:3%" class="grid table-responsive">
          <table id="monthlist2"></table>
          <div id="monthpager2"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
        </div>
      </div>
      
      <div id="year_list">
          <div id ="yearjaytab" style="margin-top:3%" class="grid table-responsive">
          <table id="yearlist3"></table>
          <div id="yearpager3"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
        </div>

        </div>
        <div id="duplicate_list" style="display:none">
          <div id ="duplicatejaytab" style="margin-top:3%" class="grid table-responsive">
          <table id="duplicatelist3"></table>
          <div id="duplicatepager3"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
          </div>
        </div>
      <div id="phone_search_grid" >
          <div id ="phone_search_list" style="margin-top:3%" class="grid table-responsive">
          <table id="list20"></table>
          <div id="pager20"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

         
         
       
        <div id="search_duplicate_list" >
          <div id ="search_duplicate" style="margin-top:3%" class="grid table-responsive">
          <table id="list8"></table>
          <div id="pager3"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
          </div>
        </div>

        

      </div>
      </div>
    </div>
  </div>


    
    <div class="modal fade" id="impcustomer" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Upload Customer Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form class="forms-sample import_data" enctype="multipart/form-data">
              
              <div class="modal-body">
                <div class="form-group">
                  <input type="file" name="customer_data" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary submit1">Upload</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>

            </form>

          </div>
      </div>
    </div>

    <div class="modal fade" id="edit_modal1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Edit Customer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

             <form class="forms-sample update_form">
              <input type="hidden" class="form-control customer_idss" name="customer_idss"/>
              <input type="hidden" class="form-control site_idss" name=""/>
              <input type="hidden" class="form-control ref_person" name=""/>
              <div class="modal-body">

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group" >
                        <label for="exampleInputUsername1">Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control customer_name" name="customer_name" pattern="[A-Za-z\s]{1,40}" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group" >
                          <label for="exampleInputUsername1">Phone<span style="color:red">*</span></label>
                        <input type="text" class="form-control customer_phone" name="customer_phone" pattern="[0-9]{10}" >
                      </div> 
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group" >
                    <label for="exampleInputUsername1">Email<span style="color:red">*</span></label>
                  <input type="email" class="form-control customer_email" name="customer_email" >
                </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group" >
                      <label for="exampleInputUsername1">Remarks</label>
                      <input type="text" class="form-control remarks" name="remarks" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group" >
                      <label for="exampleInputUsername1">NRI NO<span style="color:red">*</span></label>
                      <input type="text" class="form-control nri_no" name="nri_no" >
                    </div> 
                  </div> 
                   <div class="col-sm-4">
                  <div class="form-group" >
                    <label>Enquired Layout</label>
                      <select type="text" name="enquiry_layout_id" class="form-control enquiry_layout_id" required>
                        <option value="">Select</option>
                          <?php foreach($result_layout as $key => $value) { ?> 
                        <option value="<?php echo $value->id; ?>"><?php echo $value->layout_name;?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
              </div>
              
               
              <div class="row">
               
                  <div class="col-sm-4">
                    <div class="form-group" >
                      <label for="exampleInputUsername1">Reference Type</label>
                      <select name="ref_type" class="form-control edit_ref_type edit_ref_type" onchange="edit_change_reference();" required>
                          <option value="">Select</option>
                          <?php foreach($reference_type as $key => $value) { ?> 
                            <option value="<?php echo $value->id; ?>"><?php echo $value->reference_type;?></option>
                          <?php } ?>
                        </select> 
                    </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group" id="edit_layout_id">
                    
                  </div>
                </div>
                 <div class="col-sm-4">
                  <div class="form-group" id="edit_site_id">
                    
                  </div>
                </div>
                </div>
                 <div class="row employee_div" style="display: none;">
                  <div class="col-sm-4">
                  <div class="form-group" >
                   <label for="exampleInputUsername1">Employee Name</label>
                    <select name="employee_name" class="form-control employee_name" id="employee_name">
                      <option value="">Select</option>
                      <?php foreach($result_employee as $key => $value) { ?> 
                        <option value="<?php echo $value->emp_id; ?>"><?php echo $value->first_name;?><?php echo $value->last_name;?></option>
                      <?php } ?>
                    </select>  
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" >
                     <label for="exampleInputUsername1">Department</label>
                    <input type="text" class="form-control department_name" name="department_name" id="" readonly="">
                    <input type="hidden" name="department_id" id="" class="department_id">
                  </div>
                </div>
              </div>
               <div class="row">
                
               
               
               
                <div class="col-sm-4">
                  <div class="form-group" id="edit_ref_person">
                    
                  </div>
                </div>
               </div>
              

            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary submit">Submit</button><button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              
            </div>

              </form>

          </div>
        </div>
    </div>
</div>
</div>

          <div id="call_back" style="display:none">
          <div id ="jaytab2" style="margin-top:3%" class="grid table-responsive">
          <table id="list5"></table>
          <div id="pager5"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
          <div id="reject" style="display:none">
          <div id ="jaytab3" style="margin-top:3%" class="grid table-responsive">
          <table id="list4"></table>
          <div id="pager4"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
        <div id="expired_callback" style="display:none">
          <div id ="jaytab4" style="margin-top:3%" class="grid table-responsive">
          <table id="list6"></table>
          <div id="pager6"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
        <div id="site_visinting" style="display:none">
          <div id ="jaytab5" style="margin-top:3%" class="grid table-responsive">
          <table id="list7"></table>
          <div id="pager7"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
        <div id="phone_det" style="display:none">
          <div id ="jaytab6" style="margin-top:3%" class="grid table-responsive">
          <table id="list8"></table>
          <div id="pager8"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
        <div id="expired_entry" style="display:none">
          <div id ="jaytab7" style="margin-top:3%" class="grid table-responsive">
          <table id="list9"></table>
          <div id="pager9"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
        <div id="todays_entry" style="display:none">
          <div id ="jaytab7" style="margin-top:3%" class="grid table-responsive">
          <table id="list10"></table>
          <div id="pager10"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
          <p>Please select row</p>
          </div>
          </div>
        </div>
        <div id="duplicate_list" style="display:none">
          <div id ="duplicatejaytab" style="margin-top:3%" class="grid table-responsive">
          <table id="duplicatelist3"></table>
          <div id="duplicatepager3"></div>
          <div id="dialogSelectRow" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
        </div>

        </div>
    </div>

      </div>

    </div>

  </div>



</div>

<!-- Follow up Modal -->
<div class="myModal modal fade"  tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" id="MymodalPreventScript">
  <div class="modal-dialog model-md">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
         <h3 class="modal-title pull-right">Follow up</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <form method="post" class="add_forms">
      <div class="modal-body">
        <p><b>Customer : </b><b id="customer_name"></b>
          <span style="padding-left: 70px;">
            <b>Contact No : </b>
            <b id="contact_no"></b>
          </span>
          <span style="float: right;">
            <b>Email ID : </b>
            <b id="email"></b>
          </span>
        </p>
        <br/>
        <p class="facebook_div">
           
        </p>
     
        <!---grid-->

        <!--<div id ="jaytab" style="margin-top:3%" class="grid table-responsive">
          <table id="list3"></table>
          <div id="pager3"></div>
          <div id="dialogSelectRow3" title="Warning" style="display:none">
            <p>Please select row</p>
          </div>
        </div>-->
        <!--end grid--->
      
        <hr>

         <h5>Add followup</h5>
        <div class="row">
          <div class="col-sm-6">
            
            <div class="form-group">
              <label for="name">Progress</label>
                <select type="text" name="progress" class="form-control progress_type" required="">  
                  <option value="">Select</option>
                  <option value="Call Back">Call Back</option>
                  <option value="Reject">Reject</option>
                  <option value="Site Visit">Site Visit</option>
                </select>
              </div>
          </div>
          <div class="col-sm-6 layout_div" >
           
            <div class="form-group">
               <label for="name">Layout Name</label>
                <select type="text" name="layout_id" class="form-control layout_id" required id="layout_id">  
                  <option value="">Select</option>
                    <?php foreach($result_layout as $key => $value) { ?> 
                  <option value="<?php echo $value->id; ?>"><?php echo $value->layout_name;?></option>
                    <?php } ?>
                </select>
              </div>
          </div>
          
          <div class="col-sm-6 followup_date">
            <div class="form-group">
              <label for="name">Follow Date :</label>
              <input type="text" name="follow_date" class="date form-control date-picker  readonly"  autocomplete="off"  required>
              
              <input type="hidden" name="followuser_id" class="followuser_id form-control" >
              <input type="hidden" name="" class="customer_ids form-control" >
              <input type="hidden" name="" class="site_idss form-control" >
              <input type="hidden" name="website" class="form-control website">
            </div>
          </div>
          <div class="col-sm-6" >
              
              <div class="form-group" id="leaves1">
                
            </div>
          </div>
          </div>
          <div class="row">
           <div class="col-sm-6">
              
              <div class="form-group">
                <label for="name">Assign Employee</label>
                <select name="employee" class="form-control employee_name"  required>
                  <option value="">Select</option>
                  <?php foreach($employee_type as $key => $value) { ?> 
                  <option value="<?php echo $value->emp_id; ?>"><?php echo $value->full_name;?></option>
                  <?php } ?> 
                </select> 
              </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
               <label for="name">Department</label>
               <input type="text" class="form-control" name="department" id="department_name" readonly="" required="">
                <input type="hidden" name="department_id" id="department_id">
            </div>
          </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Description :</label>
                  <textarea name="description" name="description" class="date form-control" id="modal_input" required="required"></textarea>
              </div>
            </div>
            
            <div class="row">
           <div class="col-sm-6">
              
              <div class="form-group">
                <label for="name">File Attachment Name</label>
                <select name="file_name" class="form-control file_name" >
                  <option value="">Select</option>
                  <?php foreach($file_names as $key => $value) { ?> 
                  <option value="<?php echo $value->id; ?>"><?php echo $value->name;?></option>
                  <?php } ?> 
                </select> 
              </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
               <label for="name">File Attachment</label>
               <input type="file" class="form-control file" name="file" id="file" >
               
            </div>
          </div>
          

         

        </div>  


                      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>
<!----end follow up model-------->


<style type="text/css">

pre {

    background-color: transparent;

    border: 1px solid transparent;

    line-height: 1.6;

    text-align: justify;

}

		

.form-control:focus, input[type="Submit"]:focus, input[type="button"]:focus {

  border-color: #FF0000;



  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);

}
.modal-content{
  width: 150%;
  background: aliceblue;
}
</style>



<script type="text/javascript">

 $(function() {
            $('.date-picker').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'd-m-yy',
           
            });
        });

$('.progress_type').change(function()
{
  var type = $(this).val();
  if(type=="Call Back")
  {
    $('.followup_date').show();
    $('.layout_id').removeAttr('required');
    $('.site_list').removeAttr('required');
  }
  else if(type == "Reject")
  {
    
    $('.layout_id').removeAttr('required');
    $('.date-picker').removeAttr('required');
    $('.followup_date').hide();

    
  }
  else
  {
    $('.layout_id').prop('required',true);
    $('.followup_date').show();
  }
});  

$('.layout_id').change(function()
{
   
    var id = $(this).val();
    
    $.ajax({
                        
      type:'post',
      url:"<?php echo site_url('get-site-based-on-layout-enquiry');?>",
      data:{'layout_id':id},
      success:function(response){
      response=jQuery.parseJSON(response) 

        if(response.result==1)
          {
            
              var con1 = '';
              con1 += '<label for="name">Site No</label>';
              con1 += '<select type="text" class="form-control site_list" name="site_id">';
              con1 += '<option value="">Select</option>';
              $.each( response.sites, function( key, value2 ) {

                con1+='<option value="'+value2.id+'" >'+value2.site_no+'</option>';
              });
              con1 += '</select> ';  
             

              $('#leaves1').empty();
              $('#leaves1').append(con1);
          }
          else
          {
             $('#leaves1').empty();
            toastr["error"](response.message);      
          }
    }
    });

});

$('.employee_name').change(function()
{
  var employee_name = $(this).val();
  $.ajax({
      type:'post',
      url:'<?php echo site_url('get-department-based-on-employee');?>',
      data:{'employee_name':employee_name},
      success:function(response){
      response=jQuery.parseJSON(response);

      if(response.result==1)
      {  

        $('#department_name').empty();
        $('#department_id').empty();
        $('#department_name').val(response.message.dept_name);
        $('#department_id').val(response.message.id);
            
       }
       else
       {
          $('#department_id').empty();
          toastr["error"](response.message);  
       }
      }
    });
});

  $.ajax({
    type : 'post',
    url  : "<?php echo site_url('get-duplicate-customer-count');?>", 
    success:function(response) {
      response=jQuery.parseJSON(response);
      console.log(response);
      if(response.result==1)
      {
      
        $('.duplicate_entry').html(response.message);
      }  
      else
      {
        $('.duplicate_entry').html('0');
      }        

    }
  });

  function duplicate_customer(id)
    {

        $.ajax({
        type : 'post',
        url  : "<?php echo site_url('insert-duplicate-customer');?>",
        data : {'customer_id':id},
        success:function(response) {
          response=jQuery.parseJSON(response);
          console.log(response);
        if(response.result==1)
          {
            toastr["success"](response.message);      
            location.reload();
           }
           else{
             toastr["error"](response.message);       
           }
        }
      });   
    }

  $(document).ready(function() {
  $("#phone_no_search" ).autocomplete({   
  source: '<?php echo site_url("auto-complete-phone-based-customer"); ?>',
  });
});
function planningtypes(str)
{    
  if(str=="add-custom")
    {  
        loadgrid1();
      $('#add-custom').show(); 
      $('#today_list').hide(); 
      $('#call_back').hide();
      $('#reject').hide();
      $('#expired_callback').hide();
      $('#phone_det').hide();
      $('#site_visinting').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
      $('#duplicate_list').hide();
    }   
   else if(str=="today_list")
    {  
        loadgrid1();
      $('#add-custom').hide();
      $('#today_list').show(); 
      $('#call_back').hide();
      $('#reject').hide();
      $('#expired_callback').hide();
      $('#phone_det').hide();
      $('#site_visinting').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
      $('#duplicate_list').hide();
    }
    else if(str=="call_back")
    {
        loadgrid2();
      $("#list5").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#today_list').hide(); 
      $('#call_back').show();
      $('#reject').hide();
      $('#expired_callback').hide();
      $('#site_visinting').hide();
      $('#phone_det').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
       $('#duplicate_list').hide();
        $('#add-custom').hide();
    }
    else if(str=="reject")
    {
        loadgrid3();
      $("#list4").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').show();
      $('#today_list').hide();
      $('#expired_callback').hide();
      $('#site_visinting').hide();
      $('#phone_det').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
       $('#duplicate_list').hide();
        $('#add-custom').hide();
    }
    else if(str=="expired_callback")
    {
        loadgrid4();
      $("#list6").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').hide();
      $('#today_list').hide();
      $('#expired_callback').show();
      $('#site_visinting').hide();
      $('#phone_det').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
       $('#duplicate_list').hide();
        $('#add-custom').hide();
    }
    else if(str=="site_visinting")
    {
        loadgrid5();
      $("#list7").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').hide();
      $('#today_list').hide();
      $('#expired_callback').hide();
      $('#site_visinting').show();
      $('#phone_det').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
       $('#duplicate_list').hide();
        $('#add-custom').hide();
    }
    else if(str=="expired_entry")
    {
        loadgrid6();
      $("#list9").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').hide();
      $('#today_list').hide();
      $('#expired_callback').hide();
      $('#site_visinting').hide();
      $('#phone_det').hide();
      $('#expired_entry').show();
      $('#todays_entry').hide();
       $('#duplicate_list').hide();
        $('#add-custom').hide();
    }
    else if(str=="todays_entry")
    {
        loadgrid7();
      $("#list10").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').hide();
      $('#today_list').hide();
      $('#expired_callback').hide();
      $('#site_visinting').hide();
      $('#phone_det').hide();
      $('#expired_entry').hide();
      $('#todays_entry').show();
       $('#duplicate_list').hide();
        $('#add-custom').hide();
    }
    else if(str=="duplicate_customer")
    {
        loadgrid8();
      $("#duplicatelist3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').hide();
      $('#today_list').hide();
      $('#expired_callback').hide();
      $('#site_visinting').hide();
      $('#phone_det').hide();
      $('#expired_entry').hide();
      $('#todays_entry').hide();
      $('#duplicate_list').show();
      $('#add-custom').hide();
    }
  }
  
  
$('.progress_type').change(function()
{
  var type = $(this).val();
  if(type=="Call Back")
  {
    $('.followup_date').show();
    $('.layout_id').removeAttr('required');
    $('.site_list').removeAttr('required');
  }
  else if(type == "Reject")
  {
    
    $('.layout_id').removeAttr('required');
    $('.date-picker').removeAttr('required');
    $('.followup_date').hide();

    
  }
  else
  {
    $('.layout_id').prop('required',true);
    $('.followup_date').show();
  }
});  



 

  /////////////////////////////////////////////////////////
$(document).ready(function()
{
    $(".assign_department").hide();
    $(".assign_employee").hide();
});



$('#phone_no_search').change(function()
{
      //$("#list8").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
      $('#call_back').hide(); 
      $('#reject').hide();
      $('#today_list').hide();
      $('#expired_callback').hide();
      $('#site_visinting').hide();
      $('#phone_det').show();
      $('#expired_entry').hide();
      

      load_date_grid();
      
      function load_date_grid()
      {
         var phone_no_search = $('#phone_no_search').val();
          $("#list8").setGridParam(
          {
             url:"<?php echo site_url('get-customer-followup-list-basedon-phone')?>/"+phone_no_search,  
            page:1
          }).trigger("reloadGrid");//Reload grid trigger
          $("#list8").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
          return false
      }
      
      var phone_no_search = $('#phone_no_search').val();
      $("#list8").jqGrid({
      url:"<?php //echo site_url('get-customer-followup-list-basedon-phone')?>/"+phone_no_search,  
      mtype : "get",
      datatype: "json",
      colNames:['id','Name','Enquiry Layout','Reference Type','Refered By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Followup Date','Status','Description','Created At','Created By','Created Time','Followup','Duplicate Customer'],
      colModel:[
             {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
              {name:'name',index:'name', width:120, hidden:false,editable:false},
              {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
              //{name:'nri_no',index:'nri_no',editable:false, width:120},
              {name:'reference_type',index:'reference_type',editable:false, width:120},
              {name:'ref_from',index:'ref_from',editable:false, width:120},
              {name:'ref_layout',index:'ref_layout',editable:false, width:120},
              {name:'ref_site_number',index:'ref_site_number',editable:false, width:120},
              {name:'remarks',index:'remarks',editable:false, width:120},
               {name:'follow_date',index:'follow_date',editable:false, width:120,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }}, 
              {name:'enquiry_status',index:'enquiry_status',editable:false, width:120},
              {name:'description',index:'description',editable:false, width:120},
              {name:'follow_created_at',index:'follow_created_at',editable:false, width:100,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},         
              {name:'created_by',index:'created_by',editable:false, width:120},
              {name:'created_time',index:'created_time',editable:false, width:120},
              {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
                var retVal = "";
                var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
                return retVal;
              }},
              {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
                var retVal = "";
                var retVal = ' <button><a href="javascript:void(0);" onclick="duplicate_customer('+rowObject.id+');" class="" id="">Duplicate</button></a>';
                return retVal;
              }},
               ],
      rowNum:20,
      rowTotal: 2000,
      rowList : [20,30],
      rownumbers: true,
      //rownumWidth: 60,
      pager:"#pager8", 
      sortname:'id', 
      viewrecords: true,
      gridview: true,
      autowidth: true,
      sortorder:"asc",
      shrinkToFit: true,
      loadonce:true,
      autoencode: true,
      caption:"99Acres",
      //Subgrid1...
      subGrid: false,
    });
      $("#list8").jqGrid("setLabel", "rn", "SL");
      $("#list8").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
      $("#list8").jqGrid('navGrid','#pager8',
        {edit:false,add:false,del:false,search:true,refreshstate:"current"},
        { },
        { },
        { }, 
        {
        sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
        closeOnEscape: true, 
        multipleSearch: true, 
        closeAfterSearch: true,
        closeAfterDelete:true,
        closeAfterEdit:true
        },
      );
      
});

    
function loadgrid1()
{
  $("#list2").jqGrid({
    url:"<?php echo site_url('get-customer-website')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name'/*,'Phone','Email'*/,'Created at','Created Time','Action'],
    colModel:[
          {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
          {name:'name',index:'name', width:250, hidden:false,editable:false},
          {name:'created_on',index:'created_on', width:250, hidden:false,editable:false},
          {name:'created_time',index:'created_time', width:250, hidden:false,editable:false},
          /*{name:'phone',index:'phone', width:150, hidden:false,editable:false}, 
          {name:'email',index:'email',editable:false, width:200},*/
           {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
                var retVal = "";
                var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
                return retVal;
              }},
        
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager2", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
   // shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    searchOperators: true,
    caption:"Website Customers",
    //Subgrid1...
    subGrid: false,
  });

    $("#list2").jqGrid("setLabel", "rn", "SL");
    $("#list2").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list2").jqGrid('navGrid','#pager2',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );

}

  
function loadgrid2()
{

  $("#list5").jqGrid({
    url:"<?php //echo site_url('get-customer-followup-callback-list')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name','Enquiry Layout','Reference Type','Refered By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Followup Date','Status','Description','Call Back At','Call Back By','Call Back Time','Followup'],
    colModel:[
          {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
          {name:'name',index:'name', width:120, hidden:false,editable:false},
          {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
          //{name:'nri_no',index:'nri_no',editable:false, width:120},
          {name:'reference_type',index:'reference_type',editable:false, width:120},
          {name:'ref_from',index:'ref_from',editable:false, width:120},
          {name:'ref_layout',index:'ref_layout',editable:false, width:120},
          {name:'ref_site_number',index:'ref_site_number',editable:false, width:120},
          {name:'remarks',index:'remarks',editable:false, width:120},
           {name:'follow_date',index:'follow_date',editable:false, width:120, formatoptions: { newformat: 'd-m-Y' }}, 
          {name:'enquiry_status',index:'enquiry_status',editable:false, width:120},
          {name:'description',index:'description',editable:false, width:120},
          {name:'follow_created_at',index:'follow_created_at',editable:false, width:100,formatoptions: { newformat: 'd-m-Y' }},         
          {name:'created_by',index:'created_by',editable:false, width:120},
          {name:'created_time',index:'created_time',editable:false, width:120},
          {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
            var retVal = "";
            var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
            return retVal;
          }},
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager5", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"LinkedIn Customers",
    //Subgrid1...
    subGrid: false,
  });
    $("#list5").jqGrid("setLabel", "rn", "SL");
    $("#list5").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list5").jqGrid('navGrid','#pager5',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
   
}

function loadgrid3()
{
    $("#list4").jqGrid({
    url:"<?php //echo site_url('get-customer-followup-reject-list')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name','Enquiry Layout','Reference Type','Refered By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Followup Date','Status','Description','Rejected At','Rejected By','Rejected Time'],
    colModel:[
          {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
          {name:'name',index:'name', width:120, hidden:false,editable:false},
          {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
          //{name:'nri_no',index:'nri_no',editable:false, width:120},
          {name:'reference_type',index:'reference_type',editable:false, width:120},
          {name:'ref_from',index:'ref_from',editable:false, width:120},
          {name:'ref_layout',index:'ref_layout',editable:false, width:120},
          {name:'ref_site_number',index:'ref_site_number',editable:false, width:120},
          {name:'remarks',index:'remarks',editable:false, width:120},
           {name:'follow_date',index:'follow_date',editable:false, width:120, formatoptions: { newformat: 'd-m-Y' }}, 
          {name:'enquiry_status',index:'enquiry_status',editable:false, width:120},
          {name:'description',index:'description',editable:false, width:120},
          {name:'follow_created_at',index:'follow_created_at',editable:false, width:100, formatoptions: { newformat: 'd-m-Y' }},         
          {name:'created_by',index:'created_by',editable:false, width:120},
          {name:'created_time',index:'created_time',editable:false, width:120},
         /* {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
            var retVal = "";
            var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
            return retVal;
          }},*/
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager4", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"",
    //Subgrid1...
    subGrid: false,
  });
    $("#list4").jqGrid("setLabel", "rn", "SL");
    $("#list4").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list4").jqGrid('navGrid','#pager4',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
}

function loadgrid4()
{
     $("#list6").jqGrid({
    url:"<?php echo site_url('get-customer-99acres')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name','Enquiry Layout','Reference Type','Refered By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Followup Date','Status','Description','Created At','Created By','Created Time','Followup'],
    colModel:[
          {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
          {name:'name',index:'name', width:120, hidden:false,editable:false},
          {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
          // {name:'nri_no',index:'nri_no',editable:false, width:120},
          {name:'reference_type',index:'reference_type',editable:false, width:120},
          {name:'ref_from',index:'ref_from',editable:false, width:120},
          {name:'ref_layout',index:'ref_layout',editable:false, width:120},
          {name:'ref_site_number',index:'ref_site_number',editable:false, width:120},
          {name:'remarks',index:'remarks',editable:false, width:120},
           {name:'follow_date',index:'follow_date',editable:false, width:120, formatoptions: { newformat: 'd-m-Y' }}, 
          {name:'enquiry_status',index:'enquiry_status',editable:false, width:120},
          {name:'description',index:'description',editable:false, width:120},
          {name:'follow_created_at',index:'follow_created_at',editable:false, width:100, formatoptions: { newformat: 'd-m-Y' }},
          {name:'created_by',index:'created_by',editable:false, width:120},
          {name:'created_time',index:'created_time',editable:false, width:120},
          {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
            var retVal = "";
            var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
            return retVal;
          }},
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager6", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"99 ACres Customers",
    //Subgrid1...
    subGrid: false,
  });
    $("#list6").jqGrid("setLabel", "rn", "SL");
    $("#list6").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list6").jqGrid('navGrid','#pager6',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
    
}    
function loadgrid5()
{
    $("#list7").jqGrid({
    url:"<?php //echo site_url('get-customer-site-visit-followup')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name','Enquiry Layout','Reference Type','Refered By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Status','Description','Created By','Created At','Created Time','Followup Date','Follow Up'],
    colModel:[
            {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
            {name:'name',index:'name', width:120, hidden:false,editable:false},
            {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
            //{name:'nri_no',index:'nri_no',editable:false, width:120},
            {name:'reference_type',index:'reference_type',editable:false, width:120},
            {name:'ref_from',index:'ref_from',editable:false, width:120},
            {name:'ref_layout',index:'ref_layout',editable:false, width:100},
            {name:'ref_site_number',index:'ref_site_number',editable:false, width:80},
            {name:'remarks',index:'remarks',editable:false, width:120},
            {name:'enquiry_status',index:'enquiry_status',editable:false, width:80},
            {name:'description',index:'description',editable:false, width:100},
            {name:'created_by',index:'created_by',editable:false, width:90},
            {name:'follow_created_at',index:'follow_created_at',editable:false, width:90, formatoptions: { newformat: 'd-m-Y' }},
            {name:'created_time',index:'created_time',editable:false, width:70},
            {name:'follow_date',index:'follow_date',editable:false, width:90, formatoptions: { newformat: 'd-m-Y' }}, 
            {name:'',index:'',width:80, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
            var retVal = "";
            var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
            return retVal;
            }},
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager7", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"Customer Follow-Up List",
    //Subgrid1...
    subGrid: false,
  });
    $("#list7").jqGrid("setLabel", "rn", "SL");
    $("#list7").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list7").jqGrid('navGrid','#pager7',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
    
}   
  
function loadgrid6()
{
  $("#list9").jqGrid({
    url:"<?php //echo site_url('get-customer-expired-entry-list')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name','Enquiry Layout','Reference Type','Refered By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Status','Created At','Created By','Created Time','Followup'],
    colModel:[
          {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
          {name:'name',index:'name', width:200, hidden:false,editable:false},
          {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
          //{name:'nri_no',index:'nri_no',editable:false, width:200},
          {name:'reference_type',index:'reference_type',editable:false, width:100},
          {name:'ref_from',index:'ref_from',editable:false, width:100},
          {name:'ref_layout',index:'ref_layout',editable:false, width:100},
          {name:'ref_site_number',index:'ref_site_number',editable:false, width:100},
          {name:'remarks',index:'remarks',editable:false, width:100},
          {name:'enquiry_status',index:'enquiry_status',editable:false, width:100},
          {name:'created',index:'created',editable:false, width:100, formatoptions: { newformat: 'd-m-Y' }},
          {name:'created_by',index:'created_by',editable:false, width:100},
          {name:'created_time',index:'created_time',editable:false, width:100},
          {name:'',index:'',width:100, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
            var retVal = "";
            var retVal = ' <a href="javascript:void(0);" onclick="follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
            return retVal;
          }},
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager9", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"Google Customers",
    //Subgrid1...
    subGrid: false,
  });
    $("#list9").jqGrid("setLabel", "rn", "SL");
    $("#list9").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list9").jqGrid('navGrid','#pager9',
      {edit:false,add:false,del:false,search:true,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
}

function loadgrid7()
{
    $("#list10").jqGrid({
    url:"<?php echo site_url('get-customer-facebook')?>",  
    mtype : "get",
    datatype: "json",
    colNames:['id','Name','Location and Layout','Site Dimension','Bedroom','Created At','Created Time','Action'],
    colModel:[
          {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},       
          {name:'name',index:'name', width:200, hidden:false,editable:false},
          /*{name:'phone',index:'phone', width:120, hidden:false,editable:false}, 
          {name:'email',index:'email',editable:false, width:200},*/
          {name:'ads_id',index:'ads_id',editable:false, width:200},
          {name:'site_dimension',index:'site_dimension',editable:false, width:100},
          {name:'bedroom',index:'bedroom',editable:false, width:150},
          /*{name:'alt_phone',index:'alt_phone',editable:false, width:120},*/
          {name:'created_on',index:'created_on', width:200, hidden:false,editable:false},
          {name:'created_time',index:'created_time', width:200, hidden:false,editable:false},
          {name:'',index:'',width:120, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
                var retVal = "";
                var retVal = ' <a href="javascript:void(0);" onclick="facebook_follow_up('+rowObject.id+');" class="btn btn-default" id="btn"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>';
                return retVal;
              }},
             ],
    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager10", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
   // shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    searchOperators: true,
    caption:"Facebook/Instagram Customers",
    //Subgrid1...
    subGrid: false,
  });

    $("#list10").jqGrid("setLabel", "rn", "SL");
    $("#list10").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required
    $("#list10").jqGrid('navGrid','#pager10',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
    
}    


function loadgrid8()
{
 <?php $role_id   =$this->session->userdata('role_id'); if($role_id == 1){?>

     $("#duplicatelist3").jqGrid({
    url:"<?php //echo site_url('get-duplicate-customer-list')?>",   
    mtype : "get",   
    datatype: "json", 
    colNames:['id','Name','Enquiry Layout','Reference Type','Referred By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Employee Name','Department Name','Created At','Created By','Created Time','Action'],
    colModel:[
        {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},
        {name:'name',index:'name', width:100, hidden:false,editable:false},
        {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
        {name:'reference_type',index:'reference_type',editable:false, width:100},
        {name:'ref_person',index:'ref_person',editable:false, width:100},
        {name:'ref_layout',index:'ref_layout',editable:false, width:75},
        {name:'ref_site_number',index:'ref_site_number',editable:false, width:100},
        {name:'remarks',index:'remarks',editable:false, width:100},
        {name:'first_name',index:'first_name',editable:false, width:100},
        {name:'dept_name',index:'dept_name',editable:false, width:100},
        {name:'created',index:'created',editable:false, width:100,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
        {name:'created_by',index:'created_by',editable:false, width:100},
        {name:'created_time',index:'created_time',editable:false, width:100},
          {name:'',index:'',width:80, search:false,editable:false,formatter: function (cellvalue, options, rowObject) {
            var retVal = "";
            var retVal = '<a onclick="delete_customer('+rowObject.id+')"; href="javascript:void(0);"><i class="fa fa-trash" style="color:red;" aria-hidden="true"></i></a>';
            return retVal;
          }},
       ],
    rowNum:50,
    rowTotal: 2000,
    rowList : [20,30,100,200,500,1000],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#duplicatepager3", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"MagicBricks Customer",
    //Subgrid1...
    subGrid: false,
  });


    $("#duplicatelist3").jqGrid("setLabel", "rn", "SL");
    $("#duplicatelist3").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required

    $("#duplicatelist3").jqGrid('navGrid','#duplicatepager3',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
  <?php } else { ?>

      $("#duplicatelist3").jqGrid({
    url:"<?php //echo site_url('get-duplicate-customer-list')?>",   
    mtype : "get",   
    datatype: "json", 
    colNames:['id','Name','Enquiry Layout','Reference Type','Referred By','Ref Person\'s Layout','Ref Person\'s Site','Remarks','Employee Name','Department Name','Created At','Created By','Created Time'],
    colModel:[
        {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},
        {name:'name',index:'name', width:100, hidden:false,editable:false},
        {name:'enquiry_layout',index:'enquiry_layout', width:120, hidden:false,editable:false},
        {name:'reference_type',index:'reference_type',editable:false, width:100},
        {name:'ref_person',index:'ref_person',editable:false, width:100},
        {name:'ref_layout',index:'ref_layout',editable:false, width:75},
        {name:'ref_site_number',index:'ref_site_number',editable:false, width:100},
        {name:'remarks',index:'remarks',editable:false, width:100},
        {name:'first_name',index:'first_name',editable:false, width:100},
        {name:'dept_name',index:'dept_name',editable:false, width:100},
        {name:'created',index:'created',editable:false, width:100,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
        {name:'created_by',index:'created_by',editable:false, width:100},
        {name:'created_time',index:'created_time',editable:false, width:100},
         
       ],
    rowNum:50,
    rowTotal: 2000,
    rowList : [20,30,100,200,500,1000],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#duplicatepager3", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"Duplicate Customer List",
    //Subgrid1...
    subGrid: false,
  });


    $("#duplicatelist3").jqGrid("setLabel", "rn", "SL");
    $("#duplicatelist3").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required

    $("#duplicatelist3").jqGrid('navGrid','#duplicatepager3',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );
  <?php } ?>
  
}

function delete_customer(id)
{
    swal({   

    title: "Are you sure?",
    text: "You will not be able to recover this customer data !",
    type: "warning",   showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plz!",
    closeOnConfirm: false,
    closeOnCancel: false 
    },
    function(isConfirm){   

        if (isConfirm) 
        { 
            $(".sweet-alert").hide();
            $(".sweet-overlay").hide();
            $.ajax({
        type : 'post',
        url  : "<?php echo site_url('delete-customer-details');?>",
        data : {'customer_id':id},
        success:function(response) {
          response=jQuery.parseJSON(response);
          console.log(response);
          if(response.result==1)
          {

            toastr["success"](response.message);
            $("#list2").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
            location.reload();
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
function edit_details(id)
{

  	$.ajax({
		type : 'post',
		url  : "<?php echo site_url('edit-customer-details');?>",
		data : {'customer_id':id},
		success:function(response) {
			response=jQuery.parseJSON(response);
			console.log(response);
			if(response.result==1)
			{
          $('#edit_modal').modal('show');
          $('.customer_id').val(response.message.id);
          $('.customer_name').val(response.message.name);
          $('.customer_phone').val(response.message.phone);
          $('.customer_email').val(response.message.email);
          $('.address').val(response.message.address);
          $('.remarks').val(response.message.remarks);
          $('.site_number').val(response.message.ref_site_number);
          $('.ref_type').val(response.message.ref_type);
          $('.ref_from_id').val(response.ref_from.id);
          $('.ref_from_name').val(response.ref_from.name);
          $('.progress_type').val(response.message.enquiry_status);
          $('.description').val(response.message.description);
			}  
		}
	});

}



 	$('.update_form').submit(function(e)
 	{  
 	    e.preventDefault();
        $("#loading").show();
        formdata = new FormData($(this)[0]);
        $(".update").attr('disabled', 'disabled');
        $(".update").text("Updating...");


        $.ajax({

            type   : 'post',
            url    : '<?php echo site_url("update-customer-followups")?>',
            data   : formdata,
            contentType: false,
            processData: false,
              success:function(response){
              response=jQuery.parseJSON(response);
              console.log(response);
              if(response.result==1)
                {
                  $("#edit_modal").modal("hide");
                  toastr["success"](response.message);
                  $('.update_form')[0].reset();
                  $(".update").text("Submit");    
                  $(".update").removeAttr('disabled');  
                  location.reload();    
                }
                else if(response.result == 2)
                {
                  toastr["error"](response.message);                 
                  $(".update").text("Submit"); 
                  $(".update").removeAttr('disabled');                     
                }
                else 
                {
                  toastr["error"](response.message);                       
                  $(".update").text("Submit"); 
                  $(".update").removeAttr('disabled');                      
                }
            }
     	});
    });





$(".readonly").keydown(function(e){
        e.preventDefault();
    });

        $(function() {
            $('.date-picker').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'd-m-yy',
           
            });
        });











    




  

//////////////////////////////////////////////////////////////////////////////////////////



$('.timepicker').timepicker({ 'timeFormat': 'h:i A', minuteStepping: 15});




$('.go_back').click(function()
{
    window.location.href="<?php echo site_url('bookings-list')?>";
});


function follow_up(id)
{
 
  $('.followuser_id').val(id);
  $('.website').val('website');
  //$("#myModal").modal('show');
  $('.myModal').modal({
        backdrop: 'static',
        keyboard: false
    });
  var followuser_id = $('.followuser_id').val();
  $.ajax({
      type:'post',
      url:'<?php echo site_url('get-website-customer-name');?>',
      data:{'followuser_id':id},
      success:function(response){
      response=jQuery.parseJSON(response);

      if(response.result==1)
      {  
        $('#customer_name').empty();
        $('#customer_name').text(response.customer.name);
        $('.customer_ids').val(response.customer.id);
        $('#contact_no').text(response.customer.phone);
        $('#email').text(response.customer.email);
         $('.facebook_div').empty();
       }
       else
       {
            $('.facebook_div').empty();
          $('#customer_name').empty();
          toastr["error"](response.message);  
       }
      }
    });

}

function facebook_follow_up(id)
{
  
  $('.followuser_id').val(id);
  $('.website').val('facebook');
  //$("#myModal").modal('show');
  $('.myModal').modal({
        backdrop: 'static',
        keyboard: false
    });
  var followuser_id = $('.followuser_id').val();
  $.ajax({
      type:'post',
      url:'<?php echo site_url('get-facebook-customer-name');?>',
      data:{'followuser_id':id},
      success:function(response){
      response=jQuery.parseJSON(response);

      if(response.result==1)
      {  
        $('#customer_name').empty();
        $('#customer_name').text(response.customer.name);
        $('.customer_ids').val(response.customer.id);
        $('#contact_no').text(response.customer.phone);
        $('#email').text(response.customer.email);
        
        var con='';
        
         con+='<b>Location $ Layout : </b><b>'+response.customer.ads_id+'</b>';
            con+='<span style="padding-left: 70px;">';
            con+='<b>Site Dimension : </b>';
            con+='<b>'+response.customer.site_dimension+'</b>';
          con+='</span>';
          con+='<span style="float: right;">';
            con+='<b>Bedroom : </b>';
            con+='<b >'+response.customer.bedroom+'</b>';
          con+='</span>';
          $('.facebook_div').empty();
          $('.facebook_div').append(con);
       
       }
       else
       {
            $('.facebook_div').empty();
          $('#customer_name').empty();
          toastr["error"](response.message);  
       }
      }
    });

}

/*function load_grid(id)
{
  
    $("#list3").setGridParam(
        {

              url:"<?php echo site_url('customers-followup-list/')?>"+id,   
            page:1
        }
        ).trigger("reloadGrid");//Reload grid trigger
        $("#list3").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
    return false
}

$("#list3").jqGrid({
    url:"<?php echo site_url('customers-followup-list/0')?>",   
    mtype : "get",   
    datatype: "json", 
    colNames:['id','Description','Follow Date','Progress','Employee','Department','Layout Name','Site No','Created By','Created At','Created Time'],
    colModel:[
              {name:'id',index:'id', width:100, hidden:true,editable:false,key:true},
              {name:'description',index:'description', width:300, hidden:false,editable:false},
              {name:'follow_date',index:'follow_date', width:100, hidden:false,editable:false,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
              {name:'progress',index:'progress', width:100, hidden:false,editable:false},
              {name:'employee_assigned',index:'employee_assigned', width:100, hidden:false,editable:false},
              {name:'depart_assigned',index:'depart_assigned', width:100, hidden:false,editable:false},
              {name:'layout_name',index:'layout_name', width:100, hidden:false,editable:false},
              {name:'site_no',index:'site_no', width:100, hidden:false,editable:false},
              {name:'name',index:'name', width:100, hidden:false,editable:false},
              {name:'created_at',index:'created_at', width:100, hidden:false,editable:false,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
              {name:'created_time',index:'created_time', width:100, hidden:false,editable:false},
             ],

    rowNum:20,
    rowTotal: 2000,
    rowList : [20,30],
    rownumbers: true,
    //rownumWidth: 60,
    pager:"#pager3", 
    sortname:'id', 
    viewrecords: true,
    gridview: true,
    // autowidth: true,
    sortorder:"asc",
    shrinkToFit: true,
    loadonce:true,
    autoencode: true,
    caption:"Customer Enquiry List",
  });


    $("#list3").jqGrid("setLabel", "rn", "SL");
    $("#list3").jqGrid('filterToolbar',{searchOperators : false}); //for multisearch code,remove if not required

    $("#list3").jqGrid('navGrid','#pager3',
      {edit:false,add:false,del:false,search:false,refreshstate:"current"},
      { },
      { },
      { }, 
      {
      sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
      closeOnEscape: true, 
      multipleSearch: true, 
      closeAfterSearch: true,
      closeAfterDelete:true,
      closeAfterEdit:true
      },
    );*/
    
    
     $('.add_forms').submit(function(e)
  {    
        e.preventDefault();

        $("#loading").show();

        formdata = new FormData($(this)[0]);

        $(".submit").attr('disabled', 'disabled');
        $(".submit").text("Submtting...");

        $.ajax({

            type   : 'post',
            url    : '<?php echo site_url("add-customer-followups")?>',
            data   : formdata,
            contentType: false,
            processData: false,
                                      
              success:function(response){
              response=jQuery.parseJSON(response);
              console.log(response);

              if(response.result==1)
                {
                  $(".myModal").modal("hide");
                  toastr["success"](response.message);
                  $('.add_forms')[0].reset();
                  $(".submit").text("Submit");    
                  $(".submit").removeAttr('disabled');   
                  $("#list3").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');

                  $("#list2").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
                  $("#list4").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
                  $("#list5").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
                  $("#list6").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
                  $("#list7").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');
                 
                }
                else 
                {
                  toastr["error"](response.message);                       
                  $(".submit").text("Submit"); 
                  $(".submit").removeAttr('disabled');  
                  $("#list3").setGridParam({datatype:'json', page:1}).trigger('reloadGrid');           
                }
               
            }
            
      });
             
    });

</script>





<?php $this->load->view('includes/footer.php')?>

<style>
   #modal_input{
       height: 48px;
      }
      #btn{
        color:#D9554B;
      }
      .modal-header{
  padding: 10px 26px !important;
}
.modal-body {
    padding: 0px 26px  !important;
}
.modal-footer {
    padding: 10px 31px !important;
    justify-content: center !important;
}
#ui-id-1{
  margin-left: 1128px;
  width: 190.859px;
  margin-top: 218px;

 }
 #search{
  margin-right: 30px;
 }
 #ui-id-1{
  height: 250px;
  overflow-y: scroll;
 }
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>