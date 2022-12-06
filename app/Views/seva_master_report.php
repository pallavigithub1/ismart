<?php

  echo view('includes/header',$temple_details);

?>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seva Master Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                    <li class="breadcrumb-item active">Seva Master Report</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <div class="general-booking ml-4 mr-4">

            <h4>Seva Master Report</h4><br/>

            <form class="bg-white" id="date" >
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">

                                <div class="col-sm-4">
                                    <label for="number">From Date :</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control from_date datepicker" id="from_date" name="from_date">
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
                                    <input type="text" class="form-control to_date datepicker" id="to_date" name="to_date">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <div class="seva-submission">
                            <button type="submit" class="btn btn-primary  float-right mr-5">Search</button>
                            <button type="button" class="btn btn-primary print float-right mr-5" onclick="sevamaster_export()">Print</button>
                        </div>

                    </div>
                        

                </div>
            </form>

           
            <div class="mt-5">
                <table id="msg1"></table>
                <div id="pager3"></div>
            </div>

            <div style="display:none;">

<table  border="1" style="border-spacing: 0px !important;" id="sevamaster_export" class="sevamaster_export"></table>

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
                url  : '<?php echo site_url("sevaMasterReport/date_between_items") ?>',
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

                    $('.sevamaster_export').empty();

                var con = '';

                con +='<thead><tr><th><b>Seva Name</b></th><th><b>Seva Name</b></th><th><b>Regional Name</b></th><th><b>Amount</b></th><th><b>Price Start</b></th><th><b>Price End</b></th><th><b>Meals Count</b></th><th><b>Devotees Count</b></th><th><b>Enable Amount</b></th><th><b>Enable Units</b></th><th><b>Valid From</b></th><th><b>Valid Till</b></th></tr></thead>';

                $.each( response.mssg, function( key, value ) {   
                con += '<tr>';
                con += '<td style="text-align:center;">'+value.seva_code+'</td>';
                con += '<td style="text-align:center;">'+value.seva_name+'</td>';
                con += '<td style="text-align:center;">'+value.regional_name+'</td>';    
                con += '<td style="text-align:center;">'+value.amount+'</td>';
                con += '<td style="text-align:center;">'+value.price_start+'</td>';
                con += '<td style="text-align:center;">'+value.price_end+'</td>';
                con += '<td style="text-align:center;">'+value.meals_count+'</td>';            
                con += '<td style="text-align:center;">'+value.devotees_count+'</td>';            
                con += '<td style="text-align:center;">'+value.enable_amount+'</td>';            
                con += '<td style="text-align:center;">'+value.enable_units+'</td>';            
                con += '<td style="text-align:center;">'+value.booking_open+'</td>';            
                con += '<td style="text-align:center;">'+value.booking_end+'</td>';            
                con += '</tr>';
                });

                $('.sevamaster_export').empty();

                $('.sevamaster_export').append(con);
                }
                else 
                {
                    toastr["error"](response.message);
                    $("#msg1").jqGrid("clearGridData");
                    $('.sevamaster_export').empty();
                                    
                }
                }
            }); 
            
            jQuery("#msg1").jqGrid({
                    data: '',
                    datatype: "local",
                
                        colNames:['id','Seva Code','Seva Name','Regional Name','Amount','Price Start','Price End','Meals Count','Devotees Count','Enable Amount', 'Enable Units','Valid From','Valid Till'],
                        
                        colModel:[
                            {name:'id',index:'id',width:100,hidden:true, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_code',index:'seva_code', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_name',index:'seva_name', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'regional_name',index:'regional_name', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'amount',index:'amount', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'price_start',index:'price_start', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'price_end',index:'price_end', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'meals_count',index:'meals_count', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'devotees_count',index:'devotees_count', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'enable_amount',index:'enable_amount', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},    
                            {name:'enable_units',index:'enable_units', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},       
                            {name:'booking_open',index:'booking_open', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},       
                            {name:'booking_end',index:'booking_end', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}}       
                        
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
                        caption:"Sva Master Report"



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
   function sevamaster_export(){

$(".sevamaster_export").table2excel({

exclude: ".noExl",

name: "Excel Document Name",

filename: "Seva Master Report",

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



                      