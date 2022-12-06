<?php

  echo view('includes/header',$temple_details);

?>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Day Wise Login Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                    <li class="breadcrumb-item active">Day Wise Login Report</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <div class="general-booking ml-4 mr-4">

            <h4>Day Wise Login Report</h4><br/>

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
                            <button type="button" class="btn btn-primary print float-right mr-5" onclick="daywise_export()">Print</button>
                        </div>

                    </div>
                        

                </div>
            </form>
            
            <div class="mt-5">
                <table id="msg1"></table>
                <div id="pager3"></div>
            </div>

            <div style="display:none;">

       <table  border="1" style="border-spacing: 0px !important;" id="daywise_export" class="daywise_export"></table>

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
                url  : '<?php echo site_url("DayLoginWise/fetch_daywise") ?>',
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
                    $('.daywise_export').empty();

                var con = '';

                con +='<thead><tr><th><b>Login Date</b></th><th><b>Login Start</b></th><th><b>Login End</b></th><th><b>User ID</b></th><th><b>Username</b></th><th><b>Cash Count</b></th><th><b>Cash Amount</b></th></tr></thead>';

                $.each( response.mssg, function( key, value ) {   
                con += '<tr>';
                con += '<td style="text-align:center;">'+value.login_date+'</td>';
                con += '<td style="text-align:center;">'+value.login_at+'</td>';
                con += '<td style="text-align:center;">'+value.logout_at+'</td>';    
                con += '<td style="text-align:center;">'+value.user_id+'</td>';
                con += '<td style="text-align:center;">'+value.username+'</td>';
                con += '<td style="text-align:center;">'+value.cash_count+'</td>';
                con += '<td style="text-align:center;">'+value.cash_amount+'</td>';            
                con += '</tr>';
                });

                $('.daywise_export').empty();

                $('.daywise_export').append(con);
                }
                else 
                {
                    toastr["error"](response.message);
                    $("#msg1").jqGrid("clearGridData");
                    $('.daywise_export').empty();
                                    
                }
                }
            });
            
            
            jQuery("#msg1").jqGrid({
                    data: '',
                    datatype: "local",
                
                        colNames:['id','Login Date','Login Start','Login End','User ID','User Name','Cash Count','Cash Amount'],
                        
                        colModel:[
                            {name:'id',index:'id',width:100,hidden:true, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'login_date',index:'login_date', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'login_at',index:'login_at', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'logout_at',index:'logout_at', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'user_id',index:'user_id', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'username',index:'username', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'cash_count',index:'cash_count', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'cash_amount',index:'cash_amount', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                                   
                        
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
   function daywise_export(){

$(".daywise_export").table2excel({

exclude: ".noExl",

name: "Excel Document Name",

filename: "Day Wise Login Report",

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



                      