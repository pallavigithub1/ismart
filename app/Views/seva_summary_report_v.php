<?php

  echo view('includes/header',$temple_details);

?>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seva Summary Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                    <li class="breadcrumb-item active">Seva Summary Report</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <div class="general-booking ml-4 mr-4">

            <h4>Seva Summary Report</h4><br/>

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
                            <button type="button" class="btn btn-primary print float-right mr-5" onclick="sevasummary_export()">Print</button>
                        </div>

                    </div>
                        

                </div>
            </form>
            
            <div class="mt-5">
                <table id="msg1"></table>
                <div id="pager3"></div>
            </div>
            <div style="display:none;">

<table  border="1" style="border-spacing: 0px !important;" id="sevasummary_export" class="sevasummary_export"></table>

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
                url  : '<?php echo site_url("SevaSummaryReport/date_between_items") ?>',
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

                    $('.sevasummary_export').empty();

                        var con = '';

                        con +='<thead><tr><th><b>Seva Name</b></th><th><b>Regional Name</b></th><th><b>Amount</b></th><th><b>Cash Count</b></th><th><b>Cash Amount</b></th><th><b>UPI Count</b></th><th><b>UPI Amount</b></th><th><b>NEFT Count</b></th><th><b>NEFT Amount</b></th><th><b>Cheque Count</b></th><th><b>Cheque Amount</b></th></tr></thead>';

                        $.each( response.mssg, function( key, value ) {   
                        con += '<tr>';
                        con += '<td style="text-align:center;">'+value.seva_name+'</td>';
                        con += '<td style="text-align:center;">'+value.regional_name+'</td>';
                        con += '<td style="text-align:center;">'+value.amount+'</td>';    
                        con += '<td style="text-align:center;">'+value.cash_count+'</td>';
                        con += '<td style="text-align:center;">'+value.cash_amount+'</td>';
                        con += '<td style="text-align:center;">'+value.upi_count+'</td>';            
                        con += '<td style="text-align:center;">'+value.upi_amount+'</td>';            
                        con += '<td style="text-align:center;">'+value.neft_count+'</td>';            
                        con += '<td style="text-align:center;">'+value.neft_amount+'</td>';            
                        con += '<td style="text-align:center;">'+value.cheque_count+'</td>';            
                        con += '<td style="text-align:center;">'+value.cheque_amount+'</td>';            
                        con += '</tr>';
                        });

                        $('.sevasummary_export').empty();

                        $('.sevasummary_export').append(con);
                }
                else 
                {
                    toastr["error"](response.message);
                    $("#msg1").jqGrid("clearGridData");              
                }
                }
            });   
            
            jQuery("#msg1").jqGrid({
                    data: '',
                    datatype: "local",
                
                        colNames:['id','Seva Name','Regional Name','Amount','Cash Count','Cash Amount','UPI Count','UPI Amount','NEFT Count','NEFT Amount','Cheque Count','Cheque Amount'],
                        
                        colModel:[
                            {name:'id',index:'id',width:100,hidden:true, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_name',index:'seva_name', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'regional_name',index:'regional_name', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'amount',index:'amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},


                            {name:'cash_count',index:'cash_count', width:60, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'cash_amount',index:'cash_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'upi_count',index:'upi_count', width:60, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'upi_amount',index:'upi_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'neft_count',index:'neft_count', width:60, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'neft_amount',index:'neft_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},

                            {name:'cheque_count',index:'cheque_count', width:60, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'cheque_amount',index:'cheque_amount', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                        
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
                        caption:"Seva Summary Report"



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
    function sevasummary_export(){

$(".sevasummary_export").table2excel({

exclude: ".noExl",

name: "Excel Document Name",

filename: "Seva Summary Report",

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



                      