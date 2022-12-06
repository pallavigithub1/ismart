 <?php

  echo view('includes/header',$temple_details);

?>

	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Seva Master</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
	              <li class="breadcrumb-item active">Seva List</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">


      <div class="row">
              <div class="col-sm-8"></div>
			    	  <div class="col-sm-4">
			    			<div class="submission">

                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add New  </button> -->
                  <a href="<?php echo base_url('Seva/add_seva');?>" class=" btn btn-primary add-seva">Add New</a>
                  <button class="btn btn-primary" onclick='generatePDF()'>PDF</button>
                  <button class="btn btn-primary" id="export">Export to Excel</button>

                </div>
	  						

			    		</div>
			    		<!-- <div class="col-sm-2">
			    			
			    		</div> -->
			    		<!-- <div class="col-sm-2"></div> -->
			    	</div>


	      	<div class="container-fluid">
	        	 <section class="Master">
			    	<!-- <h2 class="master-head">Add Seva</h2> -->

			    	

						<div class="col-sm-1"></div>

                  <div class="col-sm-10">

                    <div id="jaytab3" style="margin-top:6%;" >

                      <div class="grid_div"></div>
                      <div id="list2">
                        <table id="list3">

                        </table>
                      </div>
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

<!-- <div class="modal fade" id="add_model" role="dialog">
    <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
        <h4 class="modal-title">Add Master Item</h4>
        <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body" >
        <form class="add_form" id="add_item_details">
        
        <input type="hidden" class="form-control master_id" name="master_id" id="master_id"  required>
        <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Master Type</label><br>
            <input type="text" class="form-control master_type_add" name="master_type_add" id="master_type_add"  readonly>
          </div>
        </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Master Value</label><br>
              <input type="text" class="form-control master_value_add" name="master_value_add"  required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Description</label><br>
              <input type="text" class="form-control description" name="description"  >
            </div>
          </div>
         <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Regional Value</label><br>
              <input type="text" class="form-control r_value" name="r_value"  >
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Enable</label><br>
              <input type="text" class="form-control enable" id="enable" name="enable" value="1">
            </div>
          </div>
          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Add</button>
             
                </div>
          </div>
        </form>
      </div>
    </div>
      </div>
  </div>  -->

  	 <div class="modal fade" id="edit_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">Edit Seva Item</h4>
        <button type="button" class="close cancel" id="hi" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form" id="edit_item_details">

        <input type="hidden" class="form-control id" name="id" id="id">
        <input type="hidden" class="form-control master_id" name="master_id" id="master_id"  required>
        
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Seva Code</label><br>
              <input type="text" class="form-control seva_code" name="seva_code" readonly>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Seva Name</label><br>
              <input type="text" class="form-control seva_name" name="seva_name"  required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Regional Name</label><br>
              <input type="text" class="form-control regional_name" name="regional_name"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Description</label><br>
              <input type="text" class="form-control description" name="description"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Type</label><br>
              
              <select class="form-control type" id="type" name="type">
                <option value = 'General'>General</option>
                <option value = 'Endowment'>Endowment</option>
              </select>
            </div>           
          </div>

         <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Booking Open</label><br>
              <input type="text" class="form-control effective_start_date" name="effective_start_date" id="start_date" >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Booking End</label><br>
              <input type="text" class="form-control effective_end_date" name="effective_end_date" id="end_date"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Status</label><br>
              <select class="form-control status" id="status" name="status">
                <option value = "-1">Draft</option>
                <option value = "1" selected>Open</option>
                <option value = "0">Disabled</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Account Reffer Code</label><br>
              <input type="text" class="form-control account_ref_code" name="account_ref_code"  >
            </div>
          </div>

          <!-- <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Attribute</label><br>
              <input type="text" class="form-control attribute" name="attribute"  >
            </div>
          </div> -->
          </div>
        </div>


        <div class="col-sm-6">
        <div class="form-group">


        <!--<div class="row">-->
        <!--    <div class="form-group col-sm-offset-1 col-sm-12">-->
        <!--      <label class="mr-5 mt-3" for="id">Seva Enable</label>-->
              
        <!--      <label class="form-check-label ml-3" for="radio1" id="seva-radio">-->
        <!--        <input type="radio" class="form-check-input" id="radio11" name="seva_enable" value = "1"  >Yes-->
        <!--      </label>-->
        <!--      <label class="form-check-label" for="radio1" id="seva-radio">-->
        <!--        <input type="radio" class="form-check-input" id="radio12" name="seva_enable" value = "0"  >No-->
        <!--      </label>-->
              
        <!--    </div>-->
        <!--  </div>-->
          
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label class="mr-5 mt-3" for="id">Enable Units</label>
              
              <label class="form-check-label ml-3" for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio1" name="enable_units" value = "1"  >Yes
              </label>
              <label class="form-check-label" for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio2" name="enable_units" value = "0"  >No
              </label>
              
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label class="mr-5 mt-3" for="id">Enable Amount</label>
              
              <label class="form-check-label " for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio3" name="enable_amount" value = "1" >Yes
              </label>
              <label class="form-check-label" for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio4" name="enable_amount" value = "0"  >No
              </label>
              
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label class="mr-5 mt-3" for="id">Enable Online booking</label>
              
              <label class="form-check-label " for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio5" name="enable_online_booking" value = "1" >Yes
              </label>
              <label class="form-check-label" for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio6" name="enable_online_booking" value = "0"  >No
              </label>
              
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label class="mr-5 mt-3" for="id">SMS Required</label>
              
              <label class="form-check-label " for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio7" name="sms_required" value = "1"  >Yes
              </label>
              <label class="form-check-label" for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio8" name="sms_required" value = "0"  >No
              </label>
              
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label class="mr-5 mt-3" for="id">Reminder Required</label>
              
              <label class="form-check-label " for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio9" name="reminder_required" value = "1"  >Yes
              </label>
              <label class="form-check-label" for="radio1" id="seva-radio">
                <input type="radio" class="form-check-input" id="radio10" name="reminder_required" value = "0"  >No
              </label>
              
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12 mt-2">
              <label for="id">Per Day Quota</label><br>
              <input type="number" class="form-control per_day_online" name="per_day_online"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Online Quota</label><br>
              <input type="number" class="form-control online_quota" name="online_quota"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Meals Count</label><br>
              <input type="number" class="form-control meals_count" name="meals_count"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Devotees Count</label><br>
              <input type="number" class="form-control devotees_count" name="devotees_count"  >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-12">
              <label for="id">Value</label><br>
              <input type="text" class="form-control value" name="value" >
            </div>
          </div>
          </div>
        </div>
        
        
        <div class="table-responsive">
          <table class="table table-bordered" id = "maintable1">
            <thead>
              <tr>
                <th style="text-align : center;">Price Start</th>
                <th style="text-align : center;">Price End</th>
                <th style="text-align : center;" >Amount</th>
                <th><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td><input type="text" id="amt_open0" class="form-control amt_open" name="amt_open[]" /></td>
                <td><input type="text" id="amt_end0" class="form-control amt_end" name="amt_end[]" />
                
                <td><input type="text" class="form-control amt" name="amt[]" ></td>
                <td></td>
              </tr> -->
            </tbody>
          </table>
        </div>


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
      <div style="display:none; " id="seva_table">

<table  border="1" style="border-spacing: 0px !important;" id="seva_detail_export" class="seva_detail_export"></table>

</div>
  </div> 

  <script>
    $("#hi").click(function(){
      // alert('www');
      // $(this).trigger("reset");
      // location.reload("#list3");
      history.go(0);
      // $("#list3").reload();
      
    });

//     $("#export").on("click", function(){
//       $("#list2").table2excel({
//         filename: "sevareport",
//         fileext:".xls"
//       });
//   });

  </script>

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




</script>

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>

<!-- This is the localization file of the grid controlling messages, labels, etc.-->

<!-- We support more than 40 localizations -->

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>

<!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" /> 

<!-- The link to the CSS that the grid needs -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/sweet_alert/sweet-alert.css');?>">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />

<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/sweet_alert/sweet-alert.js');?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.table2excel.js'); ?>"></script>

<script type="text/javascript">

  var date = new Date();
  $('#start_date').datepicker({dateFormat: "dd-mm-yy"});
  $('#end_date').datepicker({dateFormat: "dd-mm-yy"});

  $(document).ready(function () 

{  
  

    //var pickup_date   = '1';
    //var sales_person  = '1';


    var lastSelection = "";



    jQuery("#list3").jqGrid({

              url:"<?php echo site_url('Seva/show_seva_details');?>",

              datatype: "json", 

              colNames:['Sl','Seva Code','Seva Name','Type','Effective Start Date','Effective End Date','Per Day Quota','Enable','Edit','Delete'],

              colModel:[

                {name:'id',index:'id',hidden:true, width:100, editable:false},

                {name:'seva_code',index:'seva_code',width:100, editable:false},

                {name:'seva_name',index:'seva_name', width:100, editable:false},

                {name:'type',index:'type', width:100, editable:false},
                {name:'booking_open',index:'booking_open',editable:false, width:100,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                // {name:'booking_open',index:'booking_open', width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' },searchoptions: {
                //                     dataInit: function (element) {
                //                                 $(element).datepicker({                                                    
                //                                     dateFormat: 'dd-mm-yy',                                                    
                //                                     showOn: 'focus'
                //                                 });
                //                             },
                                            
                //                     }
                //                 },
                {name:'booking_end',index:'booking_end', width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                {name:'per_day_quota',index:'per_day_quota', width:100, editable:false},
               // {name:'amount',index:'amount', width:100, editable:false},

                {name:'enable',index:'enable', width:100, editable:false},

                
                {name:'',index:'',search:false, 
                  width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
                      var retVal = "";
                        var retVal = ' <a href="Seva/edit_seva/'+rowObject.id+'"><span class="fa fa-pencil"  style="color:blue;"></span></a>';
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

              caption:"Seva List",
              
              loadComplete: function () {
                  
                              var rows = $("#list3").getDataIDs(); 
                             
                                for (var i = 0; i < rows.length; i++)
                                {
                                    
                                     var rowData = $('#list3').jqGrid('getRowData', rows[i]);
                                     
                                    var enable = $("#list3").getCell(rows[i],"enable");
                                   
                                    if(enable == "1")
                                        rowData.enable = 'Open';
                                    else if(enable == "0")
                                        rowData.enable = 'Disabled';
                                    else if(enable == "-1")
                                        rowData.enable = 'Draft';
                                    $('#list3').jqGrid('setRowData', rows[i], rowData);
                                    
                                    var booking_open = $("#list3").getCell(rows[i],"booking_open");
                                    //  console.log(booking_open);
                                }
                               
                        },
                        

              subGrid: true,

                subGridRowExpanded: function(subgrid_id, row_id) {

                var subgrid_table_id;

                swan_id=row_id;

               

                subgrid_table_id = subgrid_id+"_t";

                jQuery("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table>");

                    jQuery("#"+subgrid_table_id).jqGrid({



                        url:"<?php echo site_url('Seva/show_seva_details_subgrid');?>?id="+swan_id,



                        type : "GET", 

                        datatype: "json", 

                        colNames:['Regional Name','Description','Enable units','Online Quota','Meals Count','Devotees count'],

                        colModel:[

                         {name:'regional_name',index:'regional_name',hidden:true, width:75, editable:false},

				                {name:'description',index:'description', width:75, editable:false},

				                // {name:'master_name',index:'master_name',hidden:true,key:true, width:75, editable:false},
                        {name:'enable_units',index:'enable_units',width:75, editable:false},

				                {name:'online_quota',index:'online_quota', width:75, editable:false},
				                
				                {name:'meals_count',index:'meals_count', width:85, editable:false},
				                {name:'devotees_count',index:'devotees_count', width:85, editable:false}              



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
                        
            


                    });

                    }
                    

               

                

              }); 



            

             

              

              $("#list3").jqGrid("setLabel", "rn", "SL");



              $("#list3").jqGrid('filterToolbar',{stringResult: true,searchOperators : true}); //for multisearch code,remove if not required



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

function gridload(){

    

  $.ajax({

    url:"<?php echo site_url("Seva/show_seva_details")?>",
    type:"POST",
  
    success:function(response) {
    
        
        jQuery('#list3').jqGrid('clearGridData');
        jQuery('#list3').jqGrid('setGridParam', {data: response});
        jQuery('#list3').trigger('reloadGrid');

    }  

  });

}

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
        url:"<?php echo site_url("seva/remove_seva")?>",
        type:"POST",
        data:{id:id},
        success:function(response) {
          response = jQuery.parseJSON(response);
          // console.log(response);
          if(response.result == 1){
            toastr["success"](response.message);
            gridload();
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

$('#export').click(function(){

      $.ajax({

      type:'get',

      url:'<?php echo site_url('Seva/export_seva_details');?>',

      data:'',

      success:function(response){

        response=jQuery.parseJSON(response);
        // console.log(response);
        if(response.result == 1){

          $('.seva_detail_export').empty();

          var con = '';

          con +='<thead><tr><th><b>Seva Code</b></th><th><b>Seva Name</b></th><th><b>Type</b></th><th><b>Effective Start Date</b></th><th><b>Effective End Date</b></th><th><b>Per Day Quota</b></th><th><b>Description</b></th><th><b>Enable Units</b></th><th><b>Online Quota</b></th><th><b>Meals Count</b></th><th><b>Devotees Count</b></th><th><b>Enable</b></th></tr></thead>';

          $.each( response.message, function( key, value ) {   
            con += '<tr><td style="text-align:center;">'+value.seva_code+'</td><td style="text-align:center;">'+value.seva_name+'</td><td style="text-align:center;">'+value.type+'</td><td style="text-align:center;">'+value.booking_open+'</td><td style="text-align:center;">'+value.booking_end+'</td><td style="text-align:center;">'+value.per_day_quota+'</td><td style="text-align:center;">'+value.description+'</td><td style="text-align:center;">'+value.enable_units+'</td><td style="text-align:center;">'+value.online_quota+'</td><td style="text-align:center;">'+value.meals_count+'</td><td style="text-align:center;">'+value.devotees_count+'</td><td style="text-align:center;">'+value.enable+'</td></tr>';
          });

          $('.seva_detail_export').append(con);
          seva_detail_export();
        }

        

      }

    })

})

function seva_detail_export(){

$(".seva_detail_export").table2excel({

exclude: ".noExl",

name: "Excel Document Name",

filename: "Seva Details",

fileext: ".xls",

exclude_img: true,

exclude_links: true,

exclude_inputs: true

});                        

}

// $("#export").on("click", function(){
//   var columnData = $("#list3").jqGrid("getGridParam", "colNames");
//   var colData = columnData.slice(3,10);
//   var localGridData = $("#list3").jqGrid("getGridParam", "data");
  
//   JSONToCSVConvertor(localGridData, "Seva Report",true,colData,"Seva Report");
// });

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
    var b = a.slice(0,8);
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


 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
    function generatePDF(){
        const PDF = document.getElementById("seva_table");
        var opt = {
            margin:       1,
            filename:     'e-feedbackview.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 3 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'por' }
        };
        html2pdf().from(PDF).set(opt).save();
    }
</script>

<style>
    
    .ui-jqgrid-sdiv{
    display : none;
  }
</style>
  


<?php
  echo view('includes/footer');
?>



