<?php

echo view('includes/header',$temple_details);

?>

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 id="receiptHeading" class="m-0">Endowment Seva</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                <li class="breadcrumb-item active">Endowment Seva</li>
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
                <a href="<?php echo base_url('Puduvattu/add_new');?>" class=" btn btn-primary add-seva">E Add New</a>
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
                                    <input type="text"  class="form-control  datepicker" id="from_date" name="from_date" style="width:100%;" required>
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
                                    <input type="text" class="form-control  datepicker" id="to_date" name="to_date" style="width:100%;" required>
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

                    

                  </div>

                </div>

              </section>	

                  

          </div><!-- /.container-fluid -->
          </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->

    <div class="modal fade" id="edits_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">Endowment Booking View</h4>
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

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">In The Name Of</label><br>
                    <input type="text" class="form-control in_the_name_of_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Main Seva</label><br>
                    <input type="text" class="form-control main_seva_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Seva Included</label><br>
                    <input type="text" class="form-control seva_included_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Received By</label><br>
                    <input type="text" class="form-control received_by_m" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Details</label><br>
                    <input type="text" class="form-control details_m" readonly>
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

                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="id">Seva Date</label><br>
                  <input type="text" class="form-control seva_date_m" readonly>
                </div>
                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="id">Seva Amount</label><br>
                  <input type="number" class="form-control seva_amount_m" readonly>
                </div> 
                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="id">Payment Mode</label><br>
                  <input type="text" class="form-control payment_mode_m" readonly>
                </div> 
                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="id">Payment Date</label><br>
                  <input type="text" class="form-control payment_date_m" readonly>
                </div> 

              </div>

            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id = "maintable3">
              <thead>
                <tr>
                  <th style="text-align:center;">Relation</th>
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">BirthDay</th>            
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>

          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
              <!-- <button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Back</button> -->
              <button type="button" class="btn btn-primary center-block" data-dismiss="modal" id="img3" style="float:left;color:black;margin-top:10px;">Back</button>
              
            </div>
          </div>

        </form>
      </div>
    </div>
      </div>
</div> 
<div style="display:none; " id="endowment_table">

<table  border="1" style="border-spacing: 0px !important;" id="endowment_detail_export" class="endowment_detail_export"></table>

</div>





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

$("#img3").click(function(){
  $('#edits_modal').hide();
});
$('#edits_modal').on('hidden.bs.modal', function (e) {
  history.go(0);
});


$("#fdate").submit(function(e){
  e.preventDefault();
   
  formdata = new FormData($(this)[0]);

  var pickup_date   = '1';
  var sales_person  = '1';

  var lastSelection = "";

  $.ajax({
    type : 'POST',
    url :"<?php echo site_url('Puduvattu/show_details');?>?payment_date="+pickup_date+"&sales_person="+sales_person,
    data : formdata,
    contentType: false,
    processData: false,

    success:function(response){
      response = jQuery.parseJSON(response);
      // console.log(response);
if(response.length==0){
      toastr["error"]('no data found');
     
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

  subgridData();

  function subgridData(){

            var pickup_date   = '1';
          var sales_person  = '1';

          var lastSelection = "";
            $.ajax({
            type : 'POST',
            url :"<?php echo site_url('Puduvattu/show_details');?>?payment_date="+pickup_date+"&sales_person="+sales_person,
            data : '',
            success:function(response){
              response = jQuery.parseJSON(response);
              // console.log(response);
              if(response.length==0){
              toastr["error"]('no data found');
            
              }
              else{
                jQuery('#list3').jqGrid('clearGridData');
                jQuery('#list3').jqGrid('setGridParam', {data: response});
                jQuery('#list3').trigger('reloadGrid'); 
                
              
              }

            }
          });
  }



  // var pickup_date   = '1';
  // var sales_person  = '1';

  // var lastSelection = "";

  jQuery("#list3").jqGrid({

   
    data: '',
    datatype: "local", 
     

    colNames:['Sl','Booking Date','Receipt No','Name Of','Seva Date','Main Seva','Mobile Number','Seva Price','Booking PNR','Received By','Print','Edit','View'],

    colModel:[

      {name:'id',index:'id', width:50, editable:false},
      {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
      {name:'receipt_no',index:'receipt_no', width:100, editable:false },
      {name:'name_of',index:'name_of', width:130, editable:false},
      // {name:'gothra',index:'gothra', width:100, editable:false},
      // {name:'nakshathra',index:'nakshathra', width:130, editable:false},
      {name:'seva_date',index:'seva_date', width:90, editable:false },
      {name:'main_seva',index:'main_seva', width:140, editable:false},
      {name:'mobile_number',index:'mobile_number', width:90, editable:false},
      {name:'seva_price',index:'seva_price', width:70, editable:false},
      {name:'booking_pnr',index:'booking_pnr', width:90, editable:false},
      // {name:'payment_mode',index:'payment_mode', width:100, editable:false},
      {name:'crb',index:'crb', width:80, editable:false},           
      {name:'',index:'',search:false, 
        width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
          
        var retVal = "";
        var retVal = ' <a data-toggle="tooltip" title="Print" class="" href="javascript:void(0);"><span class="fa fa-print" onclick="generate('+rowObject.id+')"  style="color:blue;"></span></a>';
        return retVal;           

      }},
      {name:'',index:'',search:false, 
        width:50, editable:false, align:'center',formatter: function (cellvalue, options, rowObject) {
          
        var retVal = "";
        var retVal = '<a href="Puduvattu/edit_endowment/'+rowObject.id+'"><span class="fa fa-pencil" style="color:blue;"></span></a>';
        return retVal;           

      }},
      {name:'',index:'',search:false, 
                  width:30, editable:false,formatter: function (cellvalue, options, rowObject) {
                      var retVal = "";
                      var retVal = ' <a data-toggle="tooltip" title="View"><span class="fa fa-eye" onclick="view('+rowObject.id+')" style="color:#ee6304;"></span></a>';
                        return retVal;
                      

      }},
  

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
    caption:"Endowment Booking List",
    subGrid: true,

    subGridRowExpanded: function(subgrid_id, row_id) {

      var subgrid_table_id;

      swan_id=row_id;

      

      subgrid_table_id = subgrid_id+"_t";

      jQuery("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table>");

      jQuery("#"+subgrid_table_id).jqGrid({



        url:"<?php echo site_url('Puduvattu/details');?>?id="+swan_id,



        type : "GET", 

        datatype: "json", 

        colNames:['Sl','Name','Mobile','Email','PAN','Aadhar','Purpose'],

        colModel:[

          {name:'id',index:'id',hidden:true, width:50, editable:false},
          {name:'name',index:'name', width:100, editable:false},
          {name:'mobile_number',index:'mobile_number', width:120, editable:false},                              
          {name:'email',index:'email',width:150, editable:false},
          {name:'pan',index:'pan', width:150, editable:false},                              
          {name:'adhar',index:'adhar', width:150, editable:false},
          {name:'purpose',index:'purpose', width:150, editable:false}    

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
// $("#export").on("click", function(){
//   var columnData = $("#list3").jqGrid("getGridParam", "colNames");
//   var colData = columnData.slice(3,12);
//   // console.log(colData);
//   // exit();
//   var localGridData = $("#list3").jqGrid("getGridParam", "data");
  
//   JSONToCSVConvertor(localGridData, "Endowment Booking Report",true,colData,"Endowment Booking Report");
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
    var b = a.slice(0,10);
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

  // $('#receiptHeading').text('Receipt');
  var id = key;
  alert(id);

  window.open('<?php echo site_url("Puduvattu/print")?>?id='+id+'');
 

}

function view(key){
  // var id = rowId.closest('tr').attr('id');
  var id = key;
  alert(id);
  $.ajax({
    url: "<?php echo site_url('Puduvattu/view_page')?>",
    type : "POST",
    data : {id:id},

    success:function(response){
      response = jQuery.parseJSON(response);

      if(response.result == 1){
        $('#edits_modal').modal("show");
        $('.mobile_number_m').val(response.msg1.mobile_number);
        $('.name_m').val(response.msg1.name);
        $('.address1_m').val(response.msg1.address1);
        $('.address2_m').val(response.msg1.address2);
        $('.city_m').val(response.msg1.city);
        $('.pin_code_m').val(response.msg1.pin_code);
        $('.state_m').val(response.msg1.state);
        $('.email_m').val(response.msg1.email);
        $('.comments_m').val(response.message.comments);
        $('.gothra_m').val(response.message.gothra);
        $('.grand_total_m').val(response.message.grand_total);
        // $('.booking_date_m').val(response.message.booking_date);
        $('.booking_pnr_m').val(response.message.booking_pnr);
        $('.receipt_no_m').val(response.message.receipt_no);
        $('.status_m').val(response.message.status);
        $('.pan_m').val(response.msg1.pan);
        $('.adhar_m').val(response.msg1.adhar);
        $('.purpose_m').val(response.msg1.purpose);
        $('.rashi_m').val(response.message.rashi);
        $('.nakshathra_m').val(response.message.nakshathra);

        $('.in_the_name_of_m').val(response.message.name_of);
        $('.seva_date_m').val(response.message.seva_date);
        $('.main_seva_m').val(response.message.main_seva);
        $('.seva_amount_m').val(response.message.seva_price);
        $('.seva_included_m').val(response.message.seva_include);
        $('.payment_mode_m').val(response.message.payment_mode);
        // $('.payment_date_m').val(response.message.payment_date);
        $('.details_m').val(response.message.details);
        $('.received_by_m').val(response.message.crb);
       

        var date = response.message.booking_date;
        var split1 = date.split('-');
        var join = [ split1[2], split1[1], split1[0] ].join('-');
        $(".booking_date_m").val(join);

        var date1 = response.message.payment_date;
        var split = date1.split('-');
        var join1 = [ split[2], split[1], split[0] ].join('-');
        $(".payment_date_m").val(join1);

        for(var i=0; i< response.msg2.length; i++){

          var birthday = response.msg2[i].birthday; 
          var split1 = birthday.split('-');
          var join5 = [ split1[2], split1[1], split1[0] ].join('-');

          var mode = '';
          mode += '<tr >';
          mode += '<td><input type="text"   value="'+response.msg2[i].relation+'"  class="form-control" readonly /></td>';
          mode += '<td><input type="text" class="form-control" value="'+response.msg2[i].name+'"  readonly /></td>'; 
          mode += '<td><input type="text"  value="'+join5+'" class="form-control " readonly/></td>';                         
          mode += '</tr>';
         $("#maintable3").append(mode);

        }



      }
    }
  });

}


</script>

<script>
     $('#export').click(function(){
  
        $.ajax({

        type:'get',

        url:'<?php echo site_url('Puduvattu/export_endowment_details');?>',

        data:'',

        success:function(response){

          response=jQuery.parseJSON(response);
          // console.log(response);
          if(response.result == 1){

            $('.endowment_detail_export').empty();

            var con = '';

            con +='<thead><tr><th><b>Booking Date</b></th><th><b>Receipt No</b></th><th><b>Name of</b></th><th><b>Seva Date</b></th><th><b>Main Seva</b></th><th><b>Mobile Number</b></th><th><b>Seva Price</b></th><th><b>Booking PNR</b></th><th><b>Received By</b></th><th><b>Name</b></th><th><b>Mobile</b></th><th><b>Email</b></th><th><b>PAN</b></th><th><b>Aadhar</b></th><th><b>Purpose</b></th></tr></thead>';

            $.each( response.message, function( key, value ) {   
              con += '<tr><td style="text-align:center;">'+value.booking_date+'</td><td style="text-align:center;">'+value.receipt_no+'</td><td style="text-align:center;">'+value.name_of+'</td><td style="text-align:center;">'+value.seva_date+'</td><td style="text-align:center;">'+value.main_seva+'</td><td style="text-align:center;">'+value.mobile_number+'</td><td style="text-align:center;">'+value.seva_price+'</td><td style="text-align:center;">'+value.booking_pnr+'</td><td style="text-align:center;">'+value.crb+'</td><td style="text-align:center;">'+value.name+'</td><td style="text-align:center;">'+value.email+'</td><td style="text-align:center;">'+value.pan+'</td><td style="text-align:center;">'+value.adhar+'</td><td style="text-align:center;">'+value.purpose+'</td></tr>';
            });

            $('.endowment_detail_export').append(con);
            endowment_detail_export();
          }

          

        }

        })

})

function endowment_detail_export(){

$(".endowment_detail_export").table2excel({

exclude: ".noExl",

name: "Excel Document Name",

filename: "Endowment Seva Details",

fileext: ".xls",

exclude_img: true,

exclude_links: true,

exclude_inputs: true

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
  width : 825px !important; 
}

</style> -->

<style>
  .datepicker {
  z-index:999 !important;
  position:absolute;
}
/*.ui-pager-control{*/
/*    display : none !important;*/
/*  }*/
  .ui-jqgrid-sdiv{
    display : none !important;
  }

</style>


<?php
echo view('includes/footer');
?>



