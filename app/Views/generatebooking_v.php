
<?php
    echo view('includes/header',$temple_details);
?>
<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/mystyle.css'); ?>" />-->

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Generate Booking Calendar Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                            <li class="breadcrumb-item active">Upload English Dates</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <section class="english-dates" style="background-color:#fff;padding: 3% 3%;">

            

            <form id="english">
                <div class="row" style="padding-top:20px;">
                    <div class="col-sm-3" > 
                        
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="dropdown">Dropdown</label>
                            <select class="form-control" id="dropdown" onchange="findSeva()" name="festival" style="width:150px;">
                                <option value="0">Select</option>
                                <option value="Events">Events</option>
                                <option value="Panchanga">Panchanga</option>
                                <option value="English Calendar">English Calendar</option>
                                <option value="All">All</option>
                            </select>
                        </div>
                    </div>
                 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="year">Set Year</label>
                            <select class="form-control" id="year" name="year">
                            <?php
                                foreach($year as $key=>$val){
                                    ?>
                                    <option><?php echo $val['year']; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div id="f2" style="display:none;" >

                            <label>Festival</label>
                            <select class="form-control" id="f1" name="f1">
                            <?php
                            foreach($festival as $key=>$val){																		 
                            ?>
                            <option><?php echo $val['master_value']; ?></option>
                            <?php
                            } 
                            ?>
                            </select>

                        </div>
                        <div id="f3" style="display:none;" >

                            <label>Panchanga</label>
                            <select class="form-control" id="f3" name="f3">
                            <?php
                            foreach($panchanga as $key=>$val){																		 
                            ?>
                            <option><?php echo $val['master_value']; ?></option>
                            <?php
                            } 
                            ?>
                            </select>

                        </div>
                    </div>
                 
                </div>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 ">
                        <button type="submit" id="eventbtn" class="btn btn-primary" style="margin-left:75px;">Submit</button>
                    </div>
                    <div class="col-sm-4"></div>
                </div>

            </form> 
            <div class="col-sm-10">
                <div id="jaytab3" class='events_div' style="margin-top:6%;">
                    <div class="grid_div"></div>
                    <div id="list1">
                        <table id="events"></table>
                        
                    
                    </div>
                    <div id="pager3"></div>
                    <input type="button" value="Generate" onclick="getSelectedRows('events')" />  
                    
                    <div id="dialogSelectRow3" title="Warning" style="display:none">
                        <p>Please select row</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-10">
                <div id="jaytab3" class='fests_div' style="margin-top:6%;">
                    <div class="grid_div"></div>
                    <div id="list2">
                        <table id="fests"></table>
                    </div>
                    <div id="pager2"></div>
                    <input type="button" value="Generate" onclick="getSelectedRows('fests')" />  
                    <div id="dialogSelectRow3" title="Warning" style="display:none">
                        <p>Please select row</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div id="jaytab3" class='times_div' style="margin-top:6%;">
                    <div class="grid_div"></div>
                    <div id="list3">
                        <table id="times"></table>
                    </div>
                    <div id="pager1"></div>
                    <input type="button" value="Generate" onclick="getSelectedRows('times')" />  
                    <div id="dialogSelectRow3" title="Warning" style="display:none">
                        <p>Please select row</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div id="jaytab3" class='list4_div' style="margin-top:6%;">
                    <div class="grid_div"></div>
                    <div id="list4">
                        <table id="all"></table>
                       
                        <!-- <input type="text" class="a" name="a" > -->
                    </div>
                    <div id="pager4"></div>
                    <input type="button" value="Generate" onclick="getSelectedRows('all')" />  
                    <div id="dialogSelectRow3" title="Warning" style="display:none">
                        <p>Please select row</p>
                    </div>
                </div>
            </div>
        </section>
     

      
       

  
    </div><!---content-wrapper----->
   
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script> 

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script type="text/ecmascript" src="../../../js/jquery.min.js"></script>  -->
   

<script type="text/javascript">

$(document).ready(function(){

    $(".events_div").hide();
    $(".fests_div").hide();
    $(".times_div").hide();
    $(".list4_div").hide();

});

function findSeva(){
   
    var event = $('#dropdown').val();

    if(event == 'Events'){
        $('#f2').show();
        $('#f3').hide();

    }else if (event == 'Panchanga') {
        $('#f3').show();
        $('#f2').hide();
    }else{
        $('#f2').hide();
        $('#f3').hide();
    }
}

$(document).ready(function(){
    $('#dropdown').click(function () {
        if($(this).val() === 'Events'){
            $('#english').submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type : "POST",
                    url : '<?php  echo site_url("GenerateBooking/fetch_events")  ?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response=jQuery.parseJSON(response);
                        console.log(response);
                        if(response.result== 1){
                            $(".events_div").show();
                            $(".fests_div").hide();
                            $(".times_div").hide();
                            $(".list4_div").hide();
                            var currids =[];
                            jQuery("#events").jqGrid({
                                data: response.message,
                                datatype: "local", 
                                colNames:['Sl','name of','booking date','main seva','seva price','seva date','English Date','status'],
                                colModel:[
                                    {name:'id',index:'id',hidden:true, key: true, width:50, editable:false},
                                {name:'name_of',index:'name_of', width:150, editable:false,  searchoptions: {sopt: ["eq"]}},
                                {name:'booking_date',index:'booking_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    id: 'booking_date_datePicker',
                                                    dateFormat: 'dd-mm-yy',
                                                    maxDate: new Date(2099, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'main_seva',index:'main_seva', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'seva_price',index:'seva_price', width:150, editable:false, searchoptions: {sopt: ["ge","le","eq"]}},
                                {name:'seva_date',index:'seva_date', width:300, editable:false,  searchoptions: {sopt: ["eq"]}},
                                {name:'english_date',index:'english_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                            $(element).datepicker({
                                                id: 'english_date_datePicker',
                                                dateFormat: 'yy-mm-dd',
                                                maxDate: new Date(2022, 0, 1),
                                                showOn: 'focus'
                                            });
                                        },
                                        sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'status',index:'status', width:150, hidden:false,editable:false},
                                ],
                                rowNum:20,
                                rowList:[10,30,50,100,200,300],
                                rownumbers: true,
                                pager: '#pager3',  
                                height: '100%',
                                width: '100%',
                                viewrecords: true, 
                                loadonce:true,
                                gridview: true,
                                sortorder:"desc", 
                                shrinkToFit: true,
                                multiselect: true,
                                caption:"Festival Report",
                                rownumWidth: 25,    
                                loadComplete: function () {
                                        var rows = $("#events").getDataIDs(); 
                                        for (var i = 0; i < rows.length; i++){

                                            if(response.message[i].status === 'INCOMPLETED'){

                                            $("#events").jqGrid('setRowData',rows[i],false, { background:'white'});    

                                            }else{
                                                $("#events").jqGrid('setRowData',rows[i],false, { background:'#b3ffb3'}); 
                                            };



                                        };
                                    },
                
                
                                onSelectRow : function() {
                                    if( this.p.selarrrow.length ===  currids.length) {
                                        $('#cb_'+$.jgrid.jqID(this.p.id),this.grid.hDiv)[this.p.useProp ? 'prop': 'attr']("checked", true);
                                    }
                                },
                                gridComplete : function() {
                                    currids =  $(this).jqGrid('getDataIDs');
                                }
                            });


                           $("#events").jqGrid('filterToolbar', { stringResult: true, searchOnEnter: false, defaultSearch: "cn" });
                            $("#events").jqGrid("setLabel", "rn", "SL");
                            $("#events").jqGrid('filterToolbar',{searchOperators : false});
                            $("#events").jqGrid('navGrid','#pager3',
                                {edit:false,add:false,del:false,search:false,refresh:false},
                                { },
                                { },
                                { }, 
                                {
                                    sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
                                    closeOnEscape: true, 
                                    multipleSearch: true, 
                                    closeAfterSearch: true 
                                }
                            );
                            $('#dropdown').click(function () {
                                if($(this).val() === 'Events'){
                                    $('#list1').empty();
                                }
                            });
                        }
                        else 
                            toastr["error"](response.message);
                    }
                });
            });
        }

       

        if($(this).val() === 'Panchanga'){
            $('#english').submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type : "POST",
                    url : '<?php  echo site_url("GenerateBooking/fetch_events")  ?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response=jQuery.parseJSON(response);
                        console.log(response);
                        $(".events_div").hide();
                        $(".fests_div").show();
                        $(".times_div").hide();
                        $(".list4_div").hide();

                        var currids =[];
                        if(response.result== 1){
                            jQuery("#fests").jqGrid({
                                data: response.message,
                                datatype: "local", 
                                colNames:['Sl','name_of','booking date','main seva','seva price','seva date','English Date','status'],
                                colModel:[
                                    {name:'id',index:'id',hidden:true, key: true, width:50, editable:false},
                                    {name:'name_of',index:'name_of', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'booking_date',index:'booking_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    id: 'booking_date_datePicker',
                                                    dateFormat: 'dd-mm-yy',
                                                    maxDate: new Date(2099, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'main_seva',index:'main_seva', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'seva_price',index:'seva_price', width:150, editable:false, searchoptions: {sopt: ["ge","le","eq"]}},
                                {name:'seva_date',index:'seva_date', width:300, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'english_date',index:'english_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    id: 'english_date_datePicker',
                                                    dateFormat: 'yy-mm-dd',
                                                    maxDate: new Date(2022, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'status',index:'status', width:150, hidden:false,editable:false},
                                ],
                                rowNum:20,
                                rowList:[10,30,50,100,200,300],
                                rownumbers: true,
                                pager: '#pager2',  
                                height: '100%',
                                width: '100%',
                                viewrecords: true, 
                                loadonce:true,
                                gridview: true,
                                sortorder:"desc", 
                                multiselect: true,
                                shrinkToFit: true,
                                caption:"Festival Report",
                                loadComplete: function () {
                                        var rows = $("#fests").getDataIDs(); 
                                        for (var i = 0; i < rows.length; i++){

                                            if(response.message[i].status === 'INCOMPLETED'){

                                            $("#fests").jqGrid('setRowData',rows[i],false, { background:'white'});    

                                            }else{
                                                $("#fests").jqGrid('setRowData',rows[i],false, { background:'#b3ffb3'}); 
                                            };



                                        };
                                    },
                                    onSelectRow : function() {
                                    if( this.p.selarrrow.length ===  currids.length) {
                                        $('#cb_'+$.jgrid.jqID(this.p.id),this.grid.hDiv)[this.p.useProp ? 'prop': 'attr']("checked", true);
                                    }
                                },
                                gridComplete : function() {
                                    currids =  $(this).jqGrid('getDataIDs');
                                }
                            });
                            $("#fests").jqGrid('filterToolbar', { stringResult: true, searchOnEnter: false, defaultSearch: "cn" });
                            $("#fests").jqGrid("setLabel", "rn", "SL");
                            $("#fests").jqGrid('filterToolbar',{searchOperators : false});
                            $("#fests").jqGrid('navGrid','#pager2',
                                {edit:false,add:false,del:false,search:false,refresh:false},
                                { },
                                { },
                                { }, 
                                {
                                    sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
                                    closeOnEscape: true, 
                                    multipleSearch: true, 
                                    closeAfterSearch: true 
                                }
                            );
                            $('#dropdown').click(function () {
                                if($(this).val() === 'Panchanga'){
                                    $('#list2').empty();
                                }
                            });
                        }
                        else 
                            toastr["error"](response.message);
                    }
                });
            });
        }
        if($(this).val() === 'English Calendar'){
            $('#english').submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type : "POST",
                    url : '<?php  echo site_url("GenerateBooking/fetch_events")  ?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response=jQuery.parseJSON(response);
                        console.log(response);
                        if(response.result== 1){
                            $(".events_div").hide();
                        $(".fests_div").hide();
                        $(".times_div").show();
                        $(".list4_div").hide();
                            var currids =[];
                            jQuery("#times").jqGrid({
                                data: response.message,
                                datatype: "local", 
                                colNames:['sl','name of','booking date','main seva','seva price','seva date','English Date','Status'],
                                colModel:[
                                    {name:'id',index:'id',hidden:true, key: true, width:50, editable:false},
                                {name:'name_of',index:'name_of', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'booking_date',index:'booking_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    id: 'booking_date_datePicker',
                                                    dateFormat: 'dd-mm-yy',
                                                    maxDate: new Date(2099, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'main_seva',index:'main_seva', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'seva_price',index:'seva_price', width:150, editable:false, searchoptions: {sopt: ["ge","le","eq"]}},
                                {name:'seva_date',index:'seva_date', width:300, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'english_date',index:'english_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    id: 'english_date_datePicker',
                                                    dateFormat: 'yy-mm-dd',
                                                    maxDate: new Date(2022, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'status',index:'status', width:150, hidden:false,editable:false},
                                ],
                                rowNum:20,
                                rowList:[10,30,50,100,200,300],
                                rownumbers: true,
                                pager: '#pager1',  
                                height: '100%',
                                width: '100%',
                                viewrecords: true, 
                                loadonce:true,
                                gridview: true,
                                multiselect: true,
                                sortorder:"desc", 
                                shrinkToFit: true,
                                caption:"Festival Report",
                                loadComplete: function () {
                                        var rows = $("#times").getDataIDs(); 
                                        for (var i = 0; i < rows.length; i++){

                                            if(response.message[i].status === 'INCOMPLETED'){

                                            $("#times").jqGrid('setRowData',rows[i],false, { background:'white'});    

                                            }else{
                                                $("#times").jqGrid('setRowData',rows[i],false, { background:'#b3ffb3'}); 
                                            };



                                        };
                                    },
                                    onSelectRow : function() {
                                    if( this.p.selarrrow.length ===  currids.length) {
                                        $('#cb_'+$.jgrid.jqID(this.p.id),this.grid.hDiv)[this.p.useProp ? 'prop': 'attr']("checked", true);
                                    }
                                },
                                gridComplete : function() {
                                    currids =  $(this).jqGrid('getDataIDs');
                                }
                            });
                            $("#times").jqGrid('filterToolbar', { stringResult: true, searchOnEnter: false, defaultSearch: "cn" });
                            $("#times").jqGrid("setLabel", "rn", "SL");
                            $("#times").jqGrid('filterToolbar',{searchOperators : false});
                            $("#times").jqGrid('navGrid','#pager1',
                                {edit:false,add:false,del:false,search:false,refresh:false},
                                { },
                                { },
                                { }, 
                                {
                                    sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
                                    closeOnEscape: true, 
                                    multipleSearch: true, 
                                    closeAfterSearch: true 
                                }
                            );
                            $('#dropdown').click(function () {
                                if($(this).val() === 'English Calendar'){
                                    $('#list3').empty();
                                }
                            });
                        }
                        else 
                            toastr["error"](response.message);
                    }
                });
            });
        }
        if($(this).val() === 'All'){
            $('#english').submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type : "POST",
                    url : '<?php  echo site_url("GenerateBooking/fetch_events")  ?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response=jQuery.parseJSON(response);
                        console.log(response);
                        if(response.result== 1){
                            $(".events_div").hide();
                        $(".fest_div").hide();
                        $(".times_div").hide();
                        $(".list4_div").show();
                            var currids =[];
                            jQuery("#all").jqGrid({
                                data: response.message,
                                datatype: "local", 
                                colNames:['sl','name of','booking date','main seva','seva price','seva date','English Date','Status'],
                                colModel:[
                                    {name:'id',index:'id',hidden:true, key: true, width:50, editable:false},
                                {name:'name_of',index:'name_of', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'booking_date',index:'booking_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    id: 'booking_date_datePicker',
                                                    dateFormat: 'dd-mm-yy',
                                                    maxDate: new Date(2099, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'main_seva',index:'main_seva', width:150, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'seva_price',index:'seva_price', width:150, editable:false, searchoptions: {sopt: ["ge","le","eq"]}},
                                {name:'seva_date',index:'seva_date', width:300, editable:false, searchoptions: {sopt: ["eq"]}},
                                {name:'english_date',index:'english_date', width:150, editable:false,
                                sorttype:'date',
                                searchoptions: {
                                    dataInit: function (element) {
                                                $(element).datepicker({
                                                    id: 'english_date_datePicker',
                                                    dateFormat: 'yy-mm-dd',
                                                    maxDate: new Date(2022, 0, 1),
                                                    showOn: 'focus'
                                                });
                                            },
                                            sopt: ["ge","le","eq"]
                                    }
                                },
                                {name:'status',index:'status', width:150, hidden:false,editable:false},
                                ],
                                rowNum:20,
                                rowList:[10,30,50,100,200,300],
                                rownumbers: true,
                                pager: '#pager4',  
                                height: '100%',
                                width: '100%',
                                viewrecords: true, 
                                loadonce:true,
                                gridview: true,
                                sortorder:"desc", 
                                shrinkToFit: true,
                                multiselect: true,
                                caption:"Festival Report",
                                loadComplete: function () {
                                        var rows = $("#all").getDataIDs(); 
                                        for (var i = 0; i < rows.length; i++){

                                            if(response.message[i].status === 'INCOMPLETED'){

                                            $("#all").jqGrid('setRowData',rows[i],false, { background:'white'});    

                                            }else{
                                                $("#all").jqGrid('setRowData',rows[i],false, { background:'#b3ffb3'}); 
                                            };



                                        };
                                    },
                                

                                onSelectRow : function() {
                                    if( this.p.selarrrow.length ===  currids.length) {
                                        $('#cb_'+$.jgrid.jqID(this.p.id),this.grid.hDiv)[this.p.useProp ? 'prop': 'attr']("checked", true);
                                    }
                                },
                                gridComplete : function() {
                                    currids =  $(this).jqGrid('getDataIDs');
                                }
                            });
                            $("#all").jqGrid('filterToolbar', { stringResult: true, searchOnEnter: false, defaultSearch: "cn" });
                            $("#all").jqGrid("setLabel", "rn", "SL");
                            $("#all").jqGrid('filterToolbar',{searchOperators : false});
                            $("#all").jqGrid('navGrid','#pager4',
                                {edit:false,add:false,del:false,search:false,refresh:false},
                                { },
                                { },
                                { }, 
                                {
                                    sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
                                    closeOnEscape: true, 
                                    multipleSearch: true, 
                                    closeAfterSearch: true 
                                }
                            );
                            $('#dropdown').click(function () {
                                if($(this).val() === 'All'){    
                                    $('#list4').empty();
                                }
                            });
                        }
                        else 
                            toastr["error"](response.message);
                    }
                });
            });
        }
    });
});
// if($(this).val() === '0'){
//     history.go(0);
// }
// var w = document.getElementById("all");
// var x = document.getElementById("events");
// var y = document.getElementById("fests");
// var z = document.getElementById("times");
// y.style.display = "none";
// z.style.display = "none";
// w.style.display = "none";
// if(x.style.display === "none") {
// if($(this).val() === '0'){
//     x.style.display = "none";
//     y.style.display = "none";
//     z.style.display = "none";
//     w.style.display = "none";
// }
</script>

<script>

    function getSelectedRows(div_id) {
        var grid = $("#"+div_id);
        var rowKey = grid.getGridParam("selrow");

        if (!rowKey)
            alert("No rows are selected");
        else {
            var selectedIDs = grid.getGridParam("selarrrow");

            var z = [];
            z.push(selectedIDs);

            var result = "";
            for (var i = 0; i < selectedIDs.length; i++) {
                result += selectedIDs[i] + ",";
            }
          var year = $('#year').val();
         

            $.ajax({
               type : "POST",
               url : '<?php echo base_url("GenerateBooking/select_fun") ?>',
               data : {z:z,year:year},

                //     success:function(response){

                // 	response=jQuery.parseJSON(response);
                // 	console.log(response);

                //     if(response.result== 1){


                //     }
                //    }
            });


        }                
    }
</script>

<?php
  echo view('includes/footer');
?>


