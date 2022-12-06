<?php

  echo view('includes/header',$temple_details);

?>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consolidated Day Wise Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                    <li class="breadcrumb-item active">Consolidated Day Wise Report</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <div class="general-booking ml-4 mr-4">

            <h4>Consolidated Day Wise Report</h4><br/>

            <form class="bg-white" id="date" >
                <div class="row">
                    <div class="col-sm-3 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">

                                <div class="col-sm-5">
                                    <label for="number">From Date :</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control from_date datepicker" id="from_date" name="from_date">
                                </div>

                            </div>
                        </div>
                    </div>               

                
                    <div class="col-sm-3 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">
                                
                                <div class="col-sm-5">
                                    <label for="number">To Date :</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control to_date datepicker" id="to_date" name="to_date">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">
                                
                                <div class="col-sm-4">
                                    <label for="number">Type :</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="type" class="form-control type " id="type">
                                        <option>Select<option>
                                        <option>General<option>
                                        <option>Endowment<option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mt-4">
                        <div class="seva-submission">
                            <button type="submit" class="btn btn-primary  float-right mr-5">Search</button>
                            <button type="button" class="btn btn-primary print float-right mr-5" onclick="consolidated_export()">Print</button>
                        </div>

                    </div>
                        

                </div>
            </form>
            
            <div class="mt-5">
                <table id="msg1"></table>
                <div id="pager3"></div>
            </div>

            <div style="display:none;">

                <table  border="1" style="border-spacing: 0px !important;" id="consolidated_export" class="consolidated_export"></table>

                </div>
        </div>

    </div> <!--content-wrapper-->




</div>  <!--wrapper---> 



<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.table2excel.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>

    

    
        $('#date').submit(function(e){
            e.preventDefault();

            var formdata = new FormData(this);

            $.ajax({

                type : 'post',
                url  : '<?php echo site_url("ConsolidatedDayReport/date_between_items") ?>',
                data   : formdata,
                contentType: false,
                processData: false,

                success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);

                    
                if(response.result==1)
                {  

                    jQuery('#msg1').jqGrid('clearGridData');
                    jQuery('#msg1').jqGrid('setGridParam', {data: response.mssg});
                    jQuery('#msg1').trigger('reloadGrid');
                    
                    console.log(response.message);

                    $('.consolidated_exportdaywise_export').empty();

                var con = '';

                con +='<thead><tr><th><b>Date</b></th><th><b>Type</b></th><th><b>Cash Amount</b></th><th><b>UPI Amount</b></th><th><b>NEFT Amount</b></th><th><b>Cheque Amount</b></th><th><b>Total</b></th></tr></thead>';

                $.each( response.mssg, function( key, value ) {   
                con += '<tr>';
                con += '<td style="text-align:center;">'+value.date+'</td>';
                con += '<td style="text-align:center;">'+value.type+'</td>';
                con += '<td style="text-align:center;">'+value.cash_amount+'</td>';            
                con += '<td style="text-align:center;">'+value.upi_amount+'</td>';    
                con += '<td style="text-align:center;">'+value.neft_amount+'</td>';
                con += '<td style="text-align:center;">'+value.cheque_amount+'</td>';
                con += '<td style="text-align:center;">'+value.total+'</td>';
                con += '</tr>';
                });

                $('.consolidated_export').empty();

                $('.consolidated_export').append(con);
                }
                else 
                {
                    toastr["error"](response.message);
                                    
                }
                }
            });   
            
            jQuery("#msg1").jqGrid({
                    data: '',
                    datatype: "local",
                
                        colNames:['id','Date','Type','Cash Amount','UPI Amount','NEFT Amount','Cheque Amount','Total'],
                        
                        colModel:[
                            {name:'id',index:'id',width:100,hidden:true, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'date',index:'date', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                            {name:'type',index:'type', width:120, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'cash_amount',index:'cash_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'upi_amount',index:'upi_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'neft_amount',index:'neft_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'cheque_amount',index:'cheque_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'total',index:'total', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                        
                        ],
                        rowNum:20,
                        rowList:[10,30,50,100,200,300],
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
                        caption:"Consolidated Day Wise Report"



                    });


                    $("#msg1").jqGrid("setLabel", "rn", "SL");
                    $("#msg1").jqGrid('filterToolbar',{searchOperators : false});

                    $("#msg1").jqGrid('navGrid','#pager3',

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
    

</script>

<script>
    var date = new Date();
    $('#from_date').datepicker({dateFormat: "dd-mm-yy"});
    $('#to_date').datepicker({dateFormat: "dd-mm-yy"});
</script>
<script>
    function consolidated_export(){

$(".consolidated_export").table2excel({

exclude: ".noExl",

name: "Excel Document Name",

filename: "Consolidated Day Report",

fileext: ".xls",

exclude_img: true,

exclude_links: true,

exclude_inputs: true

});                        

}
</script>

<style>
    .datepicker {
  z-index:999 !important;
  position:absolute;
  /* overflow:hidden; */  
  }
    </style>

<?php
  echo view('includes/footer');
?>



                      