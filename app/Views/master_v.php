<?php

  echo view('includes/header',$temple_details, $rel);

?>

	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Create Master</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
	              <li class="breadcrumb-item active">Master List</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->


        <div class="row">
			    		<div class="col-sm-2 mt-3">
			    			<label>Master Type</label>
			    		</div>
			    		<div class="col-sm-5 mt-3">
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
			    		</div>
			    		<div class="col-sm-5 mt-3" style="text-align:end;">
			    		    <button class="btn btn-primary add_item" id = "add_item" style="margin-right:5px;">Add New</button>
			    		     <button class="btn btn-primary" id="export">Export to Excel</button>
			    		</div>
			    	
			    		<!--<div class="col-sm-2 mt-5">
			    			<button class="btn btn-primary add_item" id = "add_item">ADD</button>
			    		</div>
		    			<div class="col-sm-2 mt-5">
		    			    <button class="btn btn-primary">Export to Excel</button>
		    		    </div>
			    		<div class="col-sm-2 mt-5"></div>-->
			  </div>




	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
	        	
	        	 <section class="Master">
			    	<h2 class="master-head">Master List</h2>
			    	
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
    <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
        <h4 class="modal-title">Add Master Item</h4>
        <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form" id="add_item_details">
        
        <input type="hidden" class="form-control master_id" name="master_id1" id="master_id"  required>
        <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
            <label for="id">Master Type</label><br>
            <input type="text" class="form-control master_type_add" name="master_type_add1"  readonly>
          </div>
        </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Master Value</label><br>
              <input type="text" class="form-control" name="master_value_add1"  required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Description</label><br>
              <input type="text" class="form-control" name="description1"  >
            </div>
          </div>
         <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Regional Value</label><br>
              <input type="text" class="form-control" name="r_value1"  >
            </div>
          </div>

          <div class="row mb-2">

            <div class="col-sm-4">
              <label>Enable</label>
            </div>
            
            <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label" for="radio1" id="seva-radio">
                  <input type="radio" class="form-check-input" id="radio1" name="enable1" value = "1"  checked>Yes
                </label>
                <label class="form-check-label" for="radio1" id="seva-radio">
                  <input type="radio" class="form-check-input" id="radio2" name="enable1" value = "0"  >No
                </label>
              </div>
            </div>
                 
          </div>

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
    <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">Edit Master Item</h4>
        <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form edit_item_details" id="edit_item_details">

        <input type="hidden" class="form-control id" name="id" id="id">
        <input type="hidden" class="form-control master_id" name="master_id" id="master_id"  required>
        <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
        		<label for="id">Master Type</label><br>
        		<input type="text" class="form-control " name="master_type_add" id="master_type_add"  readonly>
        	</div>
        </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Master Value</label><br>
              <input type="text" class="form-control " name="master_value_add" id="master_value_add" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Description</label><br>
              <input type="text" class="form-control " id="description" name="description"  >
            </div>
          </div>
         <div class="row">
            <div class="form-group col-sm-offset-1 col-sm-10">
              <label for="id">Regional Value</label><br>
              <input type="text" class="form-control " id="r_value" name="r_value"  >
            </div>
          </div>
          <div class="row">
                  <div class="col-sm-4">
                     <label>Enable Units</label>
                  </div>
                  <div class="col-sm-8">
                 <div class="form-check">
                    <label class="form-check-label" for="radio1" id="seva-radio">
                      <input type="radio" class="form-check-input " id="radio12" name="enable" value = "1"  >Yes
                    </label>
                    <label class="form-check-label" for="radio1" id="seva-radio">
                      <input type="radio" class="form-check-input " id="radio21" name="enable" value = "0"  >No
                    </label>
                </div>
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
  </div> 
  	<script type="text/javascript">
  	
  	
$(".add_item").click(function()
{
	 var master_type = $('#master_type').val();

	 var master_name = $("#master_type option:selected").text();

	 master_name = master_name.replace(/[^A-Z0-9]/ig, "");
	 if(master_type != ''){
	 		 $("#add_model").modal("show");
	 		 $(".master_id1").val(master_type);
	 		 $(".master_type_add").val(master_name);
	 		 
	 }
	 else{
	 		toastr["error"]('YOU MUST SELECT THE MASTER');
	 }

	 //alert(master_type);
});


  $('#add_item_details').submit(function(e){  
        e.preventDefault();
         formdata = new FormData($(this)[0]);
            $(".add").text("Adding...");
            $(".add").attr("disabled", true);
            $.ajax({

                type   : 'post',
                url    : '<?php echo site_url("Dashboard/add_item_details")?>',
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
                        $('.update').removeAttr("disabled");  
                        $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                      
                    }
                }
           });
  });

  $('.edit_item_details').submit(function(e){  
        e.preventDefault();
        // alert("ee");
         formdata = new FormData($(this)[0]);
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            $.ajax({

                type   : 'post',
                url    : '<?php echo site_url("Dashboard/update_item_details")?>',
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

              url:"<?php echo site_url('Dashboard/show_item_details');?>?payment_date="+pickup_date+"&sales_person="+sales_person,

              datatype: "json", 

              colNames:['Sl','Category','Value','regional_value','Description','Enable','Edit','Delete'],

              colModel:[

                {name:'id',index:'id',hidden:true, width:150, editable:false},

                //{name:'temple_id',index:'temple_id', width:150, editable:false},

                {name:'master_name',index:'master_name',width:150, editable:false},

                {name:'master_value',index:'master_value', width:150, editable:false},
                
                {name:'regional_value',index:'regional_value', width:150, editable:false},
                {name:'description',index:'description', width:150, editable:false},
                {name:'enable',index:'enable', width:80, editable:false},
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

              caption:"Master List",

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
$("#export").on("click", function(){
  var columnData = $("#list3").jqGrid("getGridParam", "colNames");
  var colData = columnData.slice(2,6);
  var localGridData = $("#list3").jqGrid("getGridParam", "data");
  
  JSONToCSVConvertor(localGridData, "Master Report",true,colData,"Master Report");
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
    var b = a.slice(0,5);
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
        url:"<?php echo site_url("Dashboard/remove_master_list_item")?>",
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
// function remove(rowId){
//   var id = rowId.closest('tr').attr('id');
// //   alert(id);
//   $.ajax({

//     url:"<?php echo site_url("Dashboard/remove_master_list_item")?>",
//     type:"POST",
//     data:{id:id},
//     success:function(response) {
//       response = jQuery.parseJSON(response);
//       console.log(response);

//       if(response.result == 1){
        
//         toastr["success"](response.message);
//         gridload();   

//       }else{

//         toastr["error"](response.message);
//       }

//     }   
//   });
// }


function fun_edit(rowId)
  {
    
    var id = rowId.closest('tr').attr('id');
      $.ajax({

        url:"<?php echo site_url("Dashboard/edit_item_details")?>",
        type:"POST",
        data:{id:id},
        success:function(response) {
        response = jQuery.parseJSON(response);
        console.log(response);

          if(response.result == 1) 
          {
   

            $("#edit_modal").modal("show");
            // $('.uploaded_brand_image').empty();
             $(".master_id").val(response.message.id);
             $("#master_type_add").val(response.message.master_name);
             $("#master_value_add").val(response.message.master_value);
             $("#description").val(response.message.description);
             $("#r_value").val(response.message.regional_value);

              //  if(response.message.enable == '1'){
              //    $('#radio12').prop('checked', true);
              //  }
              //  else{
              //    $('#radio21').prop('checked', true)
              //  }

              var a = response.message.enable;

              if(a== "1"){
                $("#radio12")[0].checked = true;
              }else{
                $("#radio21")[0].checked = true;
              }
            

          }

            }


      }); 

  }


 </script>
<?php
  echo view('includes/footer');
?>