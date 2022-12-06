<?php

echo view('includes/header',$temple_details);

?>

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 id="receiptHeading" class="m-0">General Seva</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                <li class="breadcrumb-item active">General Seva</li>
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
                <a href="<?php echo base_url('GeneralBooking/add_new');?>" class=" btn btn-primary add-seva">G Add New</a>
                <button class="btn btn-primary" id="export">Export to Excel</button>

              </div>
                            

                      </div>
                      <!-- <div class="col-sm-2">
                          
                      </div> -->
                      <!-- <div class="col-sm-2"></div> -->
                  </div>


            <div class="container-fluid">
               <section class="Master">


               <form class="bg-white" id="fdate" >
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">

                                <div class="col-sm-4">
                                    <label for="number">From Date :</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text"  class="form-control  datepicker" id="from_date" name="from_date" style="width:100%!important;" required>
                                </div>

                            </div>
                        </div>
                    </div>               

                
                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">
                                
                                <div class="col-sm-4">
                                    <label for="number">To Date :</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  datepicker" id="to_date" name="to_date" style="width:100%!important;" required >
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <div class="seva-submission">
                            <button type="submit"  class="btn btn-primary  float-left ">Search</button>
                            <!-- <button type="button" class="btn btn-primary print float-right mr-5" onclick="generatePDF()">Print</button> -->
                        </div>

                    </div>
                        

                </div>
                </form>


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
<!-- -------------------------------model for edit-------------------------------------------------------- -->

<div class="modal fade" id="edit_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">General Booking View</h4>
        <button type="button" class="close cancel" id="hi" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="add_form" id="edit_item_details">

          <!-- <input type="text" class="form-control id" name="id" id="id"> -->
          <!-- <input type="hidden" class="form-control master_id" name="master_id" id="master_id"  required> -->
          
          <div class="row">
            <div class="col-sm-6">

              <div class="form-group">
                
                <div class="row">

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Mobile Number</label>
                    <input type="number" class="form-control mobile_number_m" readonly >
                    <!-- <p id="mobile_number_m" > </p> -->
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Name</label><br>
                    <input type="text" class="form-control name_m" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Address 1</label><br>
                    <input type="text" class="form-control address1_m" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Address 2</label><br>
                    <input type="text" class="form-control address2_m" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">City</label><br>
                    <input type="text" class="form-control city_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">PIN Code</label><br>
                    <input type="number" class="form-control pin_code_m"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">State</label><br>
                    <input type="text" class="form-control state_m"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">E-mail</label><br>
                    <input type="email" class="form-control email_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Comments</label><br>
                    <input type="text" class="form-control comments_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Gothra</label><br>
                    <!-- <input type="number" class="form-control gothra" name="gothra" > -->
                    <input type="text" class="form-control gothra_m"  readonly>
                    

                  </div>

                </div>            
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">

               <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Grand Total</label><br>
                    <input type="number" class="form-control grand_total_m" readonly>
                  </div>
                </div>  
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Booking Date</label><br>
                    <input type="text" class="form-control booking_date_m" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Booking PNR</label><br>
                    <input type="text" class="form-control booking_pnr_m"  readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Receipt No</label><br>
                    <input type="text" class="form-control receipt_no_m" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">status</label><br>
                    <input type="text" class="form-control status_m" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">PAN</label><br>
                    <input type="text" class="form-control pan_m" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Aadhar</label><br>
                    <input type="text" class="form-control adhar_m" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Purpose</label><br>
                    <input type="text" class="form-control purpose_m" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Rashi</label><br>
                    <!-- <input type="text" class="form-control rashi" name="rashi" > -->
                    <input type="text" class="form-control rashi_m" readonly>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Nakshathra</label><br>
                    <!-- <input type="text" class="form-control nakshathra" name="nakshathra" > -->
                    <input type="text" class="form-control nakshathra_m"  readonly>
                    
                  </div>
                </div>

              </div>
            </div>
          
          
            <div class="table-responsive">
              <table class="table table-bordered" id = "maintable1">
                <thead>
                  <tr>
                  <th style="text-align:center;">Seva Date</th>
                    <!--<th style="text-align:center;">Seva Code</th>-->
                    <th style="text-align:center;">Seva</th>
                    <th style="text-align:center;">Price</th>
                    <th style="text-align:center;">Seva Units</th>
                    <th style="text-align:center;">Amount</th>
                    <th style="text-align:center;">Remarks</th>
                    <!-- <th><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></th> -->
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>


          </div>

          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
              <!--<button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Back</button>-->
                <button type="button" class="btn btn-primary center-block" data-dismiss="modal" id="img1" style="float:left;color:black;margin-top:10px;">Back</button>

              
            </div>
          </div>

        </form>
      </div>
    </div>
      </div>
</div>  

<script>

$("#img1").click(function(){
  $('#edit_modal').hide();
});

$("#hi").click(function(){
  $('#maintable1').empty();
});
$('#edit_modal').on('hidden.bs.modal', function (e) {
  history.go(0);
});
// $('#edit_item_details').submit(function(e){  
//         e.preventDefault();
//          formdata = new FormData($(this)[0]);
//             $(".update").text("Updating...");
//             $(".update").attr("disabled", true);
//             $.ajax({

//                 type   : 'post',
//                 url    : '<?php echo site_url("GeneralBooking/update_item_details")?>',
//                 data   : formdata,
//                 contentType: false,
//                 processData: false,
                                          
//                   success:function(response){
//                   response = jQuery.parseJSON(response);
//                   console.log(response);

                    
//                     if(response.result==1)
//                     {  
//                         toastr["success"](response.message);

//                         $("#edit_modal").modal("hide");
                       
//                         window.location.href="<?php echo base_url('seva') ?>"; 
//                         $('.update').removeAttr("disabled");
//                         $(".update").text("Update");    
//                         $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
//                     }
//                     else 
//                     {
//                       // window.location.href="<?php echo base_url('seva') ?>";    

//                         toastr["error"](response.message);
//                         $('.update').removeAttr("disabled");
//                         $(".update").text("Update");   
//                         $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                      
//                     }
//                 }
//            });
//   });
</script>






<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>

<!-- This is the localization file of the grid controlling messages, labels, etc.-->

<!-- We support more than 40 localizations -->

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>

<!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" /> 

<!-- The link to the CSS that the grid needs -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />

<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.table2excel.js'); ?>"></script>

<script type="text/javascript">


$("#fdate").submit(function(e){
  e.preventDefault();
  formdata = new FormData($(this)[0]);

  var pickup_date   = '1';
  var sales_person  = '1';

  var lastSelection = "";

  $.ajax({
    type : 'POST',
    url :"<?php echo site_url('GeneralBooking/show_details');?>?payment_date="+pickup_date+"&sales_person="+sales_person,
    data : formdata,
    contentType: false,
    processData: false,

    success:function(response){
      // response = jQuery.parseJSON(response);
      // console.log(response);

    if(response.length==0){
     toastr["error"]('no data found');
     jQuery('#list3').jqGrid('clearGridData');
      jQuery('#list3').jqGrid('setGridParam', {data: response});
      jQuery('#list3').trigger('reloadGrid'); 
     
      }
      else{
           jQuery('#list3').jqGrid('clearGridData');
      jQuery('#list3').jqGrid('setGridParam', {data: response});
      jQuery('#list3').trigger('reloadGrid'); 
       
      }

    }
  });
  
});  



$(document).ready(function () {  

  $('#from_date').datepicker({dateFormat: "dd-mm-yy"});
  $('#to_date').datepicker({dateFormat: "dd-mm-yy"});

  var pickup_date   = '1';
  var sales_person  = '1';


  var lastSelection = "";



  jQuery("#list3").jqGrid({

            url:"<?php echo site_url('GeneralBooking/show_details');?>",

            datatype: "json", 

            colNames:['Sl','Booking Date','Name','Booking PNR','Mobile','Total Amount','Received By','Print','Edit','View'],

            colModel:[

              {name:'id',index:'id',hidden:true, width:50, editable:false},
              {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
              {name:'name',index:'name', width:130, editable:false},
              {name:'booking_pnr',index:'booking_pnr', width:150, editable:false},
              // {name:'gothra',index:'gothra', width:100, editable:false},
              // {name:'nakshathra',index:'nakshathra', width:130, editable:false},
              {name:'mobile_number',index:'mobile_number', width:130, editable:false},
              // {name:'email',index:'email', width:150, editable:false},
              // {name:'payment_method',index:'payment_method', width:100, editable:false},
              {name:'total_amount',index:'total_amount', width:90, editable:false},
              // {name:'amount_paid',index:'amount_paid', width:80, editable:false},
              // {name:'balance_amount',index:'balance_amount', width:80, editable:false},
              {name:'received_by',index:'received_by', width:100, editable:false},
           
              {name:'',index:'',search:false, 
                width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
                    var retVal = "";
                      var retVal = ' <a data-toggle="tooltip" title="Print" class="" href="javascript:void(0);"><span class="fa fa-print" onclick="generate('+rowObject.id+')"  style="color:blue;"></span></a>';
                      return retVal;
                    

              }},
              {name:'',index:'',search:false, 
                  width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
                      var retVal = "";
                      var retVal = ' <a href="GeneralBooking/general_edit/'+rowObject.id+'"><span class="fa fa-pencil"  style="color:blue;"></span></a>';
                        return retVal;
                      

              }},
              {name:'',index:'',search:false, 
                  width:30, editable:false,formatter: function (cellvalue, options, rowObject) {
                      var retVal = "";
                      var retVal = ' <a data-toggle="tooltip" title="View"><span class="fa fa-eye" onclick="view('+rowObject.id+')" style="color:#ee6304;"></span></a>';
                        return retVal;
                      

              }},
              

              // var retVal = ' <a data-toggle="tooltip" title="Edit" class="" href="javascript:void(0);"><span class="fa fa-pencil" onclick="edit_booking($(this))"  style="color:blue;"></span></a>'

            ],

            rowNum:10,

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

            caption:"General Booking List",

            subGrid: true,

              subGridRowExpanded: function(subgrid_id, row_id) {

                // var z = rowObject.id;
                // alert(z);
              var subgrid_table_id;

              swan_id=row_id;

             

              subgrid_table_id = subgrid_id+"_t";

              jQuery("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table>");

                  jQuery("#"+subgrid_table_id).jqGrid({



                      url:"<?php echo site_url('GeneralBooking/details');?>?id="+swan_id,



                      type : "GET", 

                      datatype: "json", 

                      colNames:['Sl','Seva Date','Seva','Seva Price','Seva Units'],

                      colModel:[

                        {name:'id',index:'id',hidden:true, width:50, editable:false},
                        // {name:'name',index:'name',hidden:true,key:true, width:150, editable:false},
                        // {name:'mobile_number',index:'mobile_number', width:120, editable:false},                              
                        // {name:'email',index:'email',width:150, editable:false},                        
                        {name:'seva_date',index:'seva_date', width:150, editable:false,formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                        {name:'seva_name',index:'seva_name', width:150, editable:false},                              
                        {name:'price',index:'price', width:150, editable:false},    
                        {name:'seva_units',index:'seva_units', width:150, editable:false}  

                      ],

                      rownumbers: true,

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
                  $("#list3").jqGrid("setLabel", "rn", "SL");
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
$("#export").on("click", function(){
  var columnData = $("#list3").jqGrid("getGridParam", "colNames");
  var colData = columnData.slice(3,9);
  var localGridData = $("#list3").jqGrid("getGridParam", "data");
  
  JSONToCSVConvertor(localGridData, "General Booking Report",true,colData,"General Booking Report");
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
    var b = a.slice(0,7);
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


function generate(key){

    // var id = rowId.closest('tr').attr('id');
    // alert("working");
    var id = key;
    $.ajax({
    type : 'post',
    url :'<?php echo site_url("GeneralBooking/print_grid_data")?>?id='+id,
    contentType: false,
    processData: false,
    
    success:function(response){
      
      
      for(i= 0; i< response['count']; i++){
          console.log(response['pnr'][i]['id']);
          myWindow = window.open('<?php echo site_url("GeneralBooking/print_grids")?>?id='+id+'&seva_id='+response['pnr'][i]['id']);
      }
      
    }
  });
}

function view(key){
  // var id = rowId.closest('tr').attr('id');
  var id = key;
  // alert(id);
  $.ajax({
    url: "<?php echo site_url('GeneralBooking/view_page')?>",
    type : "POST",
    data : {id:id},
    success:function(response){
      response = jQuery.parseJSON(response);

      if(response.result == 1){
        // console.log(response.msg);

        $('#edit_modal').modal("show");
        $(".mobile_number_m").val(response.msg1.mobile_number);
        $(".name_m").val(response.msg1.name);
        $(".address1_m").val(response.msg1.address1);
        $(".address2_m").val(response.msg1.address2);
        $(".city_m").val(response.msg1.city);
        $(".pin_code_m").val(response.msg1.pin_code);
        $(".state_m").val(response.msg1.state);
        $(".email_m").val(response.msg1.email);
        $(".comments_m").val(response.msg[0].comment);
        $(".receipt_no_m").val(response.msg[0].receipt_no);
        $(".gothra_m").val(response.msg1.gothra);
        $(".grand_total_m").val(response.message.total_amount);
        $(".nakshathra_m").val(response.msg1.nakshathra);
        $(".booking_pnr_m").val(response.message.booking_pnr);
        $(".rashi_m").val(response.msg1.rashi);
        $(".purpose_m").val(response.msg1.purpose);
        $(".adhar_m").val(response.msg1.adhar);
        $(".pan_m").val(response.msg1.pan);
        $(".status_m").val(response.msg[0].status);
       


      

        var date = response.msg[0].booking_date;
        var split1 = date.split('-');
        var join = [ split1[2], split1[1], split1[0] ].join('-');

        $(".booking_date_m").val(join);

        for (var i=0; i< response.msg.length; i++){

          var seva_date1 = response.msg[i].seva_date; 
          var split4 = seva_date1.split('-');
          var join3 = [ split4[2], split4[1], split4[0] ].join('-');

          var mode = '';
          mode += '<tr >';
          mode += '<td><input type="text" style="width:120px;"  value="'+join3+'" class="form-control " readonly/></td>';
          mode += '<td><input type="text"   value="'+response.msg[i].seva_name+'"  class="form-control" readonly /></td>';
          mode += '<td><input type="text" class="form-control" value="'+response.msg[i].price+'"  readonly /></td>';
          mode += '<td><input type="text"  value="'+response.msg[i].seva_units+'" class="form-control " readonly/></td>';
          mode += '<td><input type="text"   value="'+response.msg[i].amount+'"  class="form-control" readonly /></td>';
          mode += '<td><input type="text" class="form-control" value="'+response.msg[i].remark+'"  readonly /></td>';         
          mode += '</tr>';

          $("#maintable1").append(mode);
        }



      }
     
    }
  });

}




</script>

<!-- <style>

.ui-jqgrid-hdiv{

 width : 1110px !important; 

} 

.ui-jqgrid{
  width : 1110px !important; 
}
.ui-jqgrid-view {
  width : 1110px !important; 
}
.ui-jqgrid-bdiv{
  width : 1110px !important; 
}
.ui-jqgrid-pager{
  width : 1110px !important; 
}
.scroll {
  width : 350px !important; 
}
.tablediv .ui-jqgrid-hdiv{
  width : 635px !important; 
}

</style> -->

<style>
  .datepicker {
  z-index:999 !important;
  position:absolute;
  /* overflow:hidden; */  
  }
  /*.ui-pager-control{*/
  /*  display : none !important;*/
  /*}*/
  .ui-jqgrid-sdiv{
    display : none !important;
  }

</style>

<?php
echo view('includes/footer');
?>



