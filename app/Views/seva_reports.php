<?php

  echo view('includes/header',$temple_details);

?>

 <link rel="stylesheet" href="<?php echo base_url('assets/css/reports.css');?>" />
 <link rel="stylesheet" href="<?php echo base_url('assets/css/example-styles.css');?>" />
 <link rel="stylesheet" href="<?php echo base_url('assets/css/demo-styles.css');?>" />
 <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.multi-select.js');?>"></script>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Summary of All General Bookings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                        <li class="breadcrumb-item active">Summary of All General Bookings</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <form id="seva_reports">
            <div class="reports-main">


                <div class="row seva-type">
                <div class="col-sm-2">
                    <label>Seva Type</label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <form class="demo-example">
                        <select id="people" name="people[]" class="test" multiple>
                            <option value="General">General Seva</option>
                            <option value="Endowment">Endowment Seva</option>
                            <option value="All">All</option>
                        </select>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    
                </div>
                </div><!--seva-type---> 


                <div class="row seva-date">
                <div class="col-sm-2">
                    <div class="check-form">
                        <label>Seva Date</label>
                    </div> 
                </div>
                <div class="col-sm-2"><label>From Date</label></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="report_date" name="seva_from">
                    </div>
                </div>
                <div class="col-sm-2"><label>To Date</label></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="report_date1" name="seva_to">
                    </div>
                </div>
                
            </div><!--seva-date-->


            <div class="row booking-date">
                <div class="col-sm-2">
                    <label>Booking Date</label>
                </div>
                <div class="col-sm-2"><label>From Date</label></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="report_date2" name="booking_from">
                    </div>
                </div>
                <div class="col-sm-2"><label>To Date</label></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="report_date3" name="booking_to">
                    </div>
                </div>
                
            </div><!--booking-date-->


            <div class="row status">
            <div class="col-sm-2">
                <label>Status</label>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <select class="form-control" id="sel2" name="status">
                    <option value="">--select--</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
                </div>
            </div>
            <div class="col-sm-6"></div>
            </div><!--status0-->

            <div class="row pmt-status">
            <div class="col-sm-2"><label>Payment Status</label></div>
            <div class="col-sm-6">
                <div class="wrapper-radio">
                    <input type="radio" name="select" id="option-1" checked>
                    <input type="radio" name="select" id="option-2">
                        <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                            <span>Fully Paid</span>
                        </label>
                        <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                            <span>Partially Paid</span>
                        </label>
                    </div>
            </div>
            <div class="col-sm-4"></div>
            </div><!--pmt-status-->

            <div class="row pmt-mode">
            <div class="col-sm-2"><label>Payment Mode</label></div>
            <div class="col-sm-4">
                <div class="form-group">
                <select class="form-control" id="sel3" name="payment_mode">
                    <option value="">--Select--</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="NEFT">NEFT</option>
                    <option value="UPI">UPI</option>
                </select>
                </div>
            </div>
            <div class="col-sm-6"></div>
            </div><!--pmt-mode-->

            <div class="row bk-by">
            <div class="col-sm-2"><label>Booked By&nbsp;&nbsp;<b> :</b> &nbsp;&nbsp;</label></div>
            <div class="col-sm-4">
            <select class="form-control" id="booked" name="booked_by">
              <option value="">--Select--</option>
              <?php
                foreach($details as $key=>$val){																		 
              ?>
              <option><?php echo $val['name']; ?></option>
              <?php
                } 
              ?>
            </select>
            </div>
            <div class="col-sm-6"></div>
            </div><!--bk-by-->

            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary">Reset</button>
                    <button type="submit"  class="btn btn-primary">Search Report</button>
                </div>
            </div>

            </div><!--reports-main onclick="search()"--->

        </form> 

       



        <div class="mt-5 ml-2 a">
            <table id="msg1"></table>
            <div id="pager3"></div>
        </div>
        <div class="mt-5 ml-2 b">
            <table id="msg2"></table>
            <div id="pager4"></div>
        </div>
        <div class="mt-5 ml-2 e">
            <table id="msg5"></table>
            <div id="pager7"></div>
        </div>
        <div class="mt-5 ml-2 c">
            <table id="msg3"></table>
            <div id="pager5"></div>
        </div>
        <div class="mt-5 ml-2 d">
            <table id="msg4"></table>
            <div id="pager6"></div>
        </div>
        <div class="mt-5 ml-2 f">
            <table id="msg6"></table>
            <div id="pager8"></div>
        </div>
        <div class="mt-5 ml-2 g">
            <table id="msg7"></table>
            <div id="pager9"></div>
        </div>
        <div class="mt-5 ml-2 h">
            <table id="msg8"></table>
            <div id="pager10"></div>
        </div>
        <div class="mt-5 ml-2 i" style="display:none">
            <table id="msg9"></table>
            <div id="pager11"></div>
        </div>
        <div class="mt-5 ml-2 j" style="display:none">
            <table id="msg10"></table>
            <div id="pager12"></div>
        </div>
        <div class="mt-5 ml-2 k" style="display:none">
            <table id="msg11"></table>
            <div id="pager13"></div>
        </div>
        <div class="mt-5 ml-2 l" style="display:none">
            <table id="msg12"></table>
            <div id="pager14"></div>
        </div>
        <div class="mt-5 ml-2 m" style="display:none">
            <table id="msg13"></table>
            <div id="pager15"></div>
        </div>
        <div class="mt-5 ml-2 n" style="display:none">
            <table id="msg14"></table>
            <div id="pager16"></div>
        </div>
        

    </div> <!--content-wrapper-->

    


</div>  <!--wrapper---> 

<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    var date = new Date();
    $('#report_date').datepicker({dateFormat: "dd-mm-yy"});
    $('#report_date1').datepicker({dateFormat: "dd-mm-yy"});
    $('#report_date2').datepicker({dateFormat: "dd-mm-yy"});
    $('#report_date3').datepicker({dateFormat: "dd-mm-yy"});
</script>

<script type="text/javascript">
    $(function(){
        $('#people').multiSelect();
    });

    // function test4(){
    //     var test = $('.test').val();
    //     alert(test);
    // }
    $(document).ready(function(){
        
        $('.a').hide();
        $('.b').hide();
        $('.c').hide();
        $('.d').hide();
        $('.e').hide();
        $('.f').hide();
        $('.g').hide();
        $('.h').hide();



        // ------------------------------------------------------------booking_date(grid)-------------------------------------------------
        // -------------------------------------------------------Endowment--------------------------------------------------
        jQuery("#msg1").jqGrid({
            data: '',
            datatype: "local",
    
            colNames:['Sl','Booking Date','Receipt No','Name Of','Seva Date','Main Seva','Mobile Number','Seva Price','Booking PNR','Received By'],
        
            colModel:[
                {name:'id',index:'id',hidden:true, width:50, editable:false},
                {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                {name:'receipt_no',index:'receipt_no', width:100, editable:false },
                {name:'name_of',index:'name_of', width:130, editable:false},                
                {name:'seva_date',index:'seva_date', width:100, editable:false },
                {name:'main_seva',index:'main_seva', width:140, editable:false},                
                {name:'mobile_number',index:'mobile_number', width:90, editable:false},
                {name:'seva_price',index:'seva_price', width:90, editable:false},
                {name:'booking_pnr',index:'booking_pnr', width:90, editable:false},                
                {name:'crb',index:'crb', width:80, editable:false}      
        
            ],
            rowNum:10,
            rowList:[10,30,50,100,200,300],
            rownumbers: true,
            pager: '#pager3', 
            sortname:'id', 
            height: '80%',
            width: '80%',
            viewrecords: true, 
            loadonce:true,
            gridview: true,
            sortorder:"desc", 
            shrinkToFit: true,
            caption:"Endowment Booking Report"
        });


        $("#msg1").jqGrid("setLabel", "rn", "SL");
        $("#msg1").jqGrid('filterToolbar',{searchOperators : true});

        $("#msg1").jqGrid('navGrid','#pager3',
            {edit:false,add:false,del:false,search:false,refresh:true},
            { },
            { },
            { }, 
            {sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],closeOnEscape: true,multipleSearch: true,closeAfterSearch: true }

        );   

        // ---------------------------------------------------------------General--------------------------------------------------

        jQuery("#msg2").jqGrid({
            data: '',
            datatype: "local",
    
            colNames:['Sl','Booking Date','Name','Booking PNR','Mobile','Total Amount','Received By'],
        
            colModel:[
                {name:'id',index:'id',hidden:true, width:50, editable:false},
                {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                {name:'name',index:'name', width:130, editable:false},
                {name:'booking_pnr',index:'booking_pnr', width:150, editable:false},              
                {name:'mobile_number',index:'mobile_number', width:130, editable:false},                
                {name:'total_amount',index:'total_amount', width:90, editable:false},              
                {name:'received_by',index:'received_by', width:100, editable:false}      
        
            ],
            rowNum:10,
            rowList:[10,30,50,100,200,300],
            rownumbers: true,
            pager: '#pager4', 
            sortname:'id', 
            height: '80%',
            width: '80%',
            viewrecords: true, 
            loadonce:true,
            gridview: true,
            sortorder:"desc", 
            shrinkToFit: true,
            caption:"General Booking Report"
        });


        $("#msg2").jqGrid("setLabel", "rn", "SL");
        $("#msg2").jqGrid('filterToolbar',{searchOperators : true});

        $("#msg2").jqGrid('navGrid','#pager4',
            {edit:false,add:false,del:false,search:false,refresh:true},
            { },
            { },
            { }, 
            {sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],closeOnEscape: true,multipleSearch: true,closeAfterSearch: true }

        );




        jQuery("#msg5").jqGrid({
            data: '',
            datatype: "local",
    
            colNames:['Sl','Booking Date','Devotee Name','Receipt No','Seva Name',/*'Booking PNR','Mobile','Total Amount',*/'Created By'],
        
            colModel:[
                {name:'id',index:'id',hidden:true, width:50, editable:false},
                {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                {name:'name',index:'name', width:130, editable:false},
                {name:'receipt_no',index:'receipt_no', width:130, editable:false},
                {name:'seva_name',index:'seva_name', width:150, editable:false},              
                // {name:'mobile_number',index:'mobile_number', width:130, editable:false},                
                // {name:'total_amount',index:'total_amount', width:90, editable:false},              
                {name:'created_by',index:'created_by', width:100, editable:false}      
        
            ],
            rowNum:10,
            rowList:[10,30,50,100,200,300],
            rownumbers: true,
            pager: '#pager7', 
            sortname:'id', 
            height: '80%',
            width: '80%',
            viewrecords: true, 
            loadonce:true,
            gridview: true,
            sortorder:"desc", 
            shrinkToFit: true,
            caption:"Summary of Booking Report"
        });


        $("#msg5").jqGrid("setLabel", "rn", "SL");
        $("#msg5").jqGrid('filterToolbar',{searchOperators : true});

        $("#msg5").jqGrid('navGrid','#pager7',
            {edit:false,add:false,del:false,search:false,refresh:true},
            { },
            { },
            { }, 
            {sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],closeOnEscape: true,multipleSearch: true,closeAfterSearch: true }

        );          

        // -------------------------------------------------------booking_date(grid)END-----------------------------------------------

        // -----------------------------------------------------------seva_date(grid)-------------------------------------------------
        // --------------------------------Endowment-------------------------------------------------
        jQuery("#msg3").jqGrid({
            data: '',
            datatype: "local",
    
            colNames:['Sl','Booking Date','Name','Booking PNR','Mobile','Total Amount','Received By'],
        
            colModel:[
                {name:'id',index:'id',hidden:true, width:50, editable:false},
                {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                {name:'name',index:'name', width:130, editable:false},
                {name:'booking_pnr',index:'booking_pnr', width:150, editable:false},              
                {name:'mobile_number',index:'mobile_number', width:130, editable:false},                
                {name:'total_amount',index:'total_amount', width:90, editable:false},              
                {name:'received_by',index:'received_by', width:100, editable:false}      
        
            ],
            rowNum:10,
            rowList:[10,30,50,100,200,300],
            rownumbers: true,
            pager: '#pager5', 
            sortname:'id', 
            height: '80%',
            width: '80%',
            viewrecords: true, 
            loadonce:true,
            gridview: true,
            sortorder:"desc", 
            shrinkToFit: true,
            caption:"Endowment Seva Report"
        });


        $("#msg3").jqGrid("setLabel", "rn", "SL");
        $("#msg3").jqGrid('filterToolbar',{searchOperators : true});

        $("#msg3").jqGrid('navGrid','#pager5',
            {edit:false,add:false,del:false,search:false,refresh:true},
            { },
            { },
            { }, 
            {sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],closeOnEscape: true,multipleSearch: true,closeAfterSearch: true }

        ); 

        // --------------------------------------------------general-----------------------------------------------------

        jQuery("#msg4").jqGrid({
            data: '',
            datatype: "local",
    
            colNames:['Sl','Devotee Name','Seva Date','Receipt No','Seva Name','Seva Units','Seva Price'/*'Booking PNR','Mobile'*/,'Seva Amount','Created By'],
        
            colModel:[
                {name:'id',index:'id',hidden:true, width:50, editable:false},
                {name:'name',index:'name', width:90, editable:false},
                {name:'seva_date',index:'seva_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                {name:'receipt_no',index:'receipt_no', width:150, editable:false}, 
                {name:'seva_name',index:'seva_name', width:130, editable:false},
                {name:'seva_units',index:'seva_units', width:90, editable:false},
                {name:'price',index:'price', width:100, editable:false},  
                {name:'amount',index:'amount', width:100, editable:false},                
                {name:'received_by',index:'received_by', width:90, editable:false}            
                    
        
            ],
            rowNum:10,
            rowList:[10,30,50,100,200,300],
            rownumbers: true,
            pager: '#pager6', 
            sortname:'id', 
            height: '80%',
            width: '80%',
            viewrecords: true, 
            loadonce:true,
            gridview: true,
            sortorder:"desc", 
            shrinkToFit: true,
            caption:"General Seva Report"
        });


        $("#msg4").jqGrid("setLabel", "rn", "SL");
        $("#msg4").jqGrid('filterToolbar',{searchOperators : true});

        $("#msg4").jqGrid('navGrid','#pager6',
            {edit:false,add:false,del:false,search:false,refresh:true},
            { },
            { },
            { }, 
            {sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],closeOnEscape: true,multipleSearch: true,closeAfterSearch: true }

        ); 
        
        // ---------------------------------------------------------seva_date(grid)END-----------------------------------------------

        // ----------------------------------------------------------status---------------------------------------------------

        jQuery("#msg8").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Name','Mobile number','Pin code','Email','Status'],
            colModel:[
                {name:'name',index:'name', width:150, editable:false},
                {name:'mobile_number',index:'mobile_number', width:150, editable:false},
                {name:'pin_code',index:'pin_code', width:150, editable:false},
                {name:'email',index:'email', width:150, editable:false},
                {name:'status',index:'status', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60],
            pager: '#pager10',
            viewrecords: true,
            width: '80%',
            height: '80%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"Endowment Report",
            rownumbers: true
        });

        $("#msg8").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg8").jqGrid('navGrid','#pager10',{edit:false,add:false,del:false});
        jQuery("#msg8").jqGrid('filterToolbar',{searchOperators : true});

        jQuery("#msg7").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Name','Mobile number','Address1','Address2','Status'],
            colModel:[
                {name:'name',index:'name', width:150, editable:false},
                {name:'mobile_number',index:'mobile_number', width:150, editable:false},
                {name:'address1',index:'address1', width:150, editable:false},
                {name:'address2',index:'address2', width:150, editable:false},
                {name:'status',index:'status', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60],
            pager: '#pager9',
            viewrecords: true,
            width: '80%',
            height: '80%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"General Report",
            rownumbers: true
        });
        
        $("#msg7").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg7").jqGrid('navGrid','#pager9',{edit:false,add:false,del:false});
        jQuery("#msg7").jqGrid('filterToolbar',{searchOperators : true});

        
        // ----

        jQuery("#msg6").jqGrid({
            data: '',
            datatype: "local",
    
            colNames:['Booking Date','Receipt Number','Seva Date','Seva Name','Seva Amount', 'Name','Total Amount','Status'],
        
            colModel:[
                {name:'booking_date',index:'booking_date', width:150, editable:false},
                {name:'receipt_no',index:'receipt_no', width:150, editable:false},
                {name:'seva_date',index:'seva_date', width:150, editable:false},
                {name:'seva_name',index:'seva_name', width:150, editable:false},
                {name:'amount',index:'amount', width:150, editable:false},
                {name:'name',index:'name', width:150, editable:false},
                {name:'total_amount',index:'total_amount', width:150, editable:false},
                {name:'status',index:'status', width:150, editable:false},          
                    
        
            ],
            rowNum:10,
            rowList:[10,30,50,100,200,300],
            rownumbers: true,
            pager: '#pager8', 
            sortname:'id', 
            height: '80%',
            width: '80%',
            viewrecords: true, 
            loadonce:true,
            gridview: true,
            sortorder:"desc", 
            shrinkToFit: true,
            caption:"General Seva Report"
        });


        $("#msg6").jqGrid("setLabel", "rn", "SL");
        $("#msg6").jqGrid('filterToolbar',{searchOperators : true});

        $("#msg6").jqGrid('navGrid','#pager8',
            {edit:false,add:false,del:false,search:false,refresh:true},
            { },
            { },
            { }, 
            {sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],closeOnEscape: true,multipleSearch: true,closeAfterSearch: true }

        ); 

        

        jQuery("#msg9").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Booking Date','Receipt Number','Seva Date','Seva Name','Seva Amount', 'Name','Total Amount','Payment Mode'],
            colModel:[
                {name:'booking_date',index:'booking_date', width:150, editable:false},
                {name:'receipt_no',index:'receipt_no', width:150, editable:false},
                {name:'seva_date',index:'seva_date', width:150, editable:false},
                {name:'seva_name',index:'seva_name', width:150, editable:false},
                {name:'amount',index:'amount', width:150, editable:false},
                {name:'name',index:'name', width:150, editable:false},
                {name:'total_amount',index:'total_amount', width:150, editable:false},
                {name:'payment_mode',index:'payment_mode', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60,90,150,200,400],
            pager: '#pager11',
            viewrecords: true,
            width: '80%',
            height: '80%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"Summary Report",
            rownumbers: true
        });
        $("#msg9").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg9").jqGrid('navGrid','#pager11',{edit:false,add:false,del:false});
        jQuery("#msg9").jqGrid('filterToolbar',{searchOperators : true});

        jQuery("#msg10").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Name','Mobile number','Booking PNR','Total Amount','Payment Method'],
            colModel:[
                {name:'name',index:'name', width:150, editable:false},
                {name:'mobile_number',index:'mobile_number', width:150, editable:false},
                {name:'booking_pnr',index:'booking_pnr', width:150, editable:false},
                {name:'total_amount',index:'total_amount', width:150, editable:false},
                {name:'payment_method',index:'payment_method', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60],
            pager: '#pager12',
            viewrecords: true,
            width: '80%',
            height: '80%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"General Report",
            rownumbers: true
        });
        $("#msg10").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg10").jqGrid('navGrid','#pager12',{edit:false,add:false,del:false});
        jQuery("#msg10").jqGrid('filterToolbar',{searchOperators : true});

        jQuery("#msg11").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Name','Mobile number','Booking Date','Main Seva','Seva Date','Payment Mode'],
            colModel:[
                {name:'name',index:'name', width:150, editable:false},
                {name:'mobile_number',index:'mobile_number', width:150, editable:false},
                {name:'booking_date',index:'booking_date', width:150, editable:false},
                {name:'main_seva',index:'main_seva', width:150, editable:false},
                {name:'seva_date',index:'seva_date', width:150, editable:false},
                {name:'payment_mode',index:'payment_mode', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60],
            pager: '#pager13',
            viewrecords: true,
            width: '80%',
            height: '80%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"Endowment Report",
            rownumbers: true
        });
        $("#msg11").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg11").jqGrid('navGrid','#pager13',{edit:false,add:false,del:false});
        jQuery("#msg11").jqGrid('filterToolbar',{searchOperators : true});


        jQuery("#msg12").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Booking Date','Receipt Number','Seva Date','Seva Name','Seva Amount', 'Name','Total Amount','Booked By'],
            colModel:[
                // {name:'id',index:'id', width:150, editable:false},
                // {name:'contact_id',index:'contact_id', width:150, editable:false},
                {name:'booking_date',index:'booking_date', width:150, editable:false},
                {name:'receipt_no',index:'receipt_no', width:150, editable:false},
                // {name:'name',index:'name', width:150, editable:false},
                {name:'seva_date',index:'seva_date', width:150, editable:false},
                {name:'seva_name',index:'seva_name', width:150, editable:false},
                {name:'amount',index:'amount', width:150, editable:false},
                {name:'name',index:'name', width:150, editable:false},
                {name:'total_amount',index:'total_amount', width:150, editable:false},
                {name:'booked_by',index:'booked_by', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60,90,150,200,400,600,1000],
            pager: '#pager14',
            viewrecords: true,
            width: '100%',
            height: '100%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"Summary Report",
            rownumbers: true
        });
        $("#msg12").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg12").jqGrid('navGrid','#pager14',{edit:false,add:false,del:false});
        jQuery("#msg12").jqGrid('filterToolbar',{searchOperators : true});

        jQuery("#msg13").jqGrid({
            data: "",
            datatype: "local",
            colNames:['Booking Date','Booking PNR','Seva Date','Seva Name','Booked By'],
            colModel:[
                {name:'booking_date',index:'booking_date', width:150, editable:false},
                {name:'booking_pnr',index:'booking_pnr', width:150, editable:false},
                {name:'seva_date',index:'seva_date', width:150, editable:false},
                {name:'seva_name',index:'seva_name', width:150, editable:false},
                {name:'booked_by',index:'booked_by', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60,90,150,200,400,600,1000],
            pager: '#pager15',
            viewrecords: true,
            width: '100%',
            height: '100%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"General Report",
            rownumbers: true
        });
        $("#msg13").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg13").jqGrid('navGrid','#pager15',{edit:false,add:false,del:false});
        jQuery("#msg13").jqGrid('filterToolbar',{searchOperators : true});

        jQuery("#msg14").jqGrid({
            data: "",
            datatype: "local",
            colNames:['In the Name of','Receipt Number','Booking Date','Main Seva','Seva Date','Booked By'],
            colModel:[
                {name:'name_of',index:'name_of', width:150, editable:false},
                {name:'receipt_no',index:'receipt_no', width:150, editable:false},
                {name:'booking_date',index:'booking_date', width:150, editable:false},
                {name:'main_seva',index:'main_seva', width:150, editable:false},
                {name:'seva_date',index:'seva_date', width:150, editable:false},
                {name:'booked_by',index:'booked_by', width:150, editable:false},
            ],
            rowNum:20,
            rowList:[20,40,60,90,150,200,400,600,1000],
            pager: '#pager16',
            viewrecords: true,
            width: '100%',
            height: '100%',
            sortorder: "desc",
            gridview: true,
            loadonce:true,
            caption:"Endowment Report",
            rownumbers: true
        });
        $("#msg14").jqGrid("setLabel", "rn", "SL");
        jQuery("#msg14").jqGrid('navGrid','#pager16',{edit:false,add:false,del:false});
        jQuery("#msg14").jqGrid('filterToolbar',{searchOperators : true});

    });

    $('#seva_reports').submit(function(e){
        e.preventDefault();
        var formdata = new FormData(this);

        $.ajax({
            type : 'POST',
            url : '<?php echo site_url("SevaReports/search_fun") ?>',
            data   : formdata,
            contentType: false,
            processData: false,

            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);

                
                if(response.result==1){  

                    if(response.type == 2){

                        $('.a').show();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();


                        jQuery('#msg1').jqGrid('clearGridData');
                        jQuery('#msg1').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg1').trigger('reloadGrid');              
                    }else if(response.type == 1){

                        $('.a').hide();
                        $('.b').show();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();


                        jQuery('#msg2').jqGrid('clearGridData');
                        jQuery('#msg2').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg2').trigger('reloadGrid'); 
                    }else if(response.type == 3){

                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').show();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();


                        jQuery('#msg4').jqGrid('clearGridData');
                        jQuery('#msg4').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg4').trigger('reloadGrid'); 
                    }else if(response.type == 5){

                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').show();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();


                        jQuery('#msg5').jqGrid('clearGridData');
                        jQuery('#msg5').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg5').trigger('reloadGrid'); 
                    }else if(response.type == 6){

                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').show();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();


                        jQuery('#msg6').jqGrid('clearGridData');
                        jQuery('#msg6').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg6').trigger('reloadGrid');                         

                    }else if(response.type == 7){

                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').show();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();


                        jQuery('#msg7').jqGrid('clearGridData');
                        jQuery('#msg7').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg7').trigger('reloadGrid');  
                        
                    }else if(response.type == 8){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').show();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();

                        jQuery('#msg8').jqGrid('clearGridData');
                        jQuery('#msg8').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg8').trigger('reloadGrid');  
                    }else if(response.type == 9){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').show();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();



                        jQuery('#msg9').jqGrid('clearGridData');
                        jQuery('#msg9').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg9').trigger('reloadGrid');  
                    }else if(response.type == 10){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').show();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();

                        jQuery('#msg10').jqGrid('clearGridData');
                        jQuery('#msg10').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg10').trigger('reloadGrid');  
                    }else if(response.type == 11){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').show();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').hide();

                        jQuery('#msg11').jqGrid('clearGridData');
                        jQuery('#msg11').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg11').trigger('reloadGrid');  
                    }else if(response.type == 12){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').show();
                        $('.m').hide();
                        $('.n').hide();

                        jQuery('#msg12').jqGrid('clearGridData');
                        jQuery('#msg12').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg12').trigger('reloadGrid');  
                    }else if(response.type == 13){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').show();
                        $('.n').hide();

                        jQuery('#msg13').jqGrid('clearGridData');
                        jQuery('#msg13').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg13').trigger('reloadGrid');  
                    }else if(response.type == 14){
                        
                        $('.a').hide();
                        $('.b').hide();
                        $('.c').hide();
                        $('.d').hide();
                        $('.e').hide();
                        $('.f').hide();
                        $('.g').hide();
                        $('.h').hide();
                        $('.i').hide();
                        $('.j').hide();
                        $('.k').hide();
                        $('.l').hide();
                        $('.m').hide();
                        $('.n').show();

                        jQuery('#msg14').jqGrid('clearGridData');
                        jQuery('#msg14').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#msg14').trigger('reloadGrid');  
                    }
                }
            
            }


        });

        

        

        

        

    });


</script>


<?php
  echo view('includes/footer');
?>



                      