<?php

  echo view('includes/header',$temple_details);

?>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seva Wise Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                    <li class="breadcrumb-item active">Seva Wise Report</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <div class="general-booking ml-4 mr-4">

            <h4>Seva Wise Report</h4><br/>

            <form class="bg-white" id="date" >
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">

                                <div class="col-sm-4">
                                    <label for="number">Type :</label>
                                </div>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control type datepicker" id="type" name="type"> -->
                                    <select name="type" class="form-control type " id="type">
                                        <option>Select<option>
                                        <option>General<option>
                                        <option>Endowment<option>
                                    </select>
                                    <input type="hidden" id="res_type" readonly/>
                                </div>

                            </div>
                        </div>
                    </div>               

                
                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">
                                
                                <div class="col-sm-4">
                                    <label for="number">Seva :</label>
                                </div>
                                <div class="col-sm-8">
                                    <select  class="form-control seva datepicker" id="seva"  name="seva"><select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <div class="seva-submission">
                            <button type="submit" class="btn btn-primary  float-right mr-5">Search</button>
                            <button type="button" class="btn btn-primary print float-right mr-5" onclick="endowment_export()">Print</button>
                        </div>

                    </div>
                        

                </div>
            </form>
            
            <div class="mt-5">
                <table id="list2"></table>
                <div id="pager3"></div>
            </div>
            <div class="mt-6">
                <table id="list3"></table>
                <div id="pager4"></div>
            </div>

        </div>
        
        <div style="display:none;">
        <table  border="1" style="border-spacing: 0px !important;" id="endowment_export" class="endowment_export"></table>
        <!-- <table  border="1" style="border-spacing: 0px !important;" id="general_export" class="general_export"></table> -->
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
            var type = $('#type').val();
            if(type == 'Endowment'){
                $('.mt-6').hide();
                $('.mt-5').show();

            }else{
                $('.mt-5').hide();
                $('.mt-6').show();
            }

            $.ajax({

                type : 'post',
                url  : '<?php echo site_url("SevaWiseReport/fetch_seva_wise") ?>',
                data   : formdata,
                contentType: false,
                processData: false,

                success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);

                    
                if(response.result==1)
                {  if(response.type == 'Endowment'){

                        jQuery('#list2').jqGrid('clearGridData');
                        jQuery('#list2').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#list2').trigger('reloadGrid');
                        $("#res_type").val(response.type);

                        $('.endowment_export').empty();

                        var con1 = '';
                        con1 +='<thead><tr><th><b>Devotee</b></th><th><b>Gothra</b></th><th><b>Nakshatra</b></th><th><b>Receipt</b></th><th><b>PNR #</b></th><th><b>Contact No</b></th><th><b>Sub Sevas</b></th></tr></thead>';
                        
                        $.each( response.mssg, function( key, value ) {   
                            console.log(value.booking_pnr);
                            con1 += '<tr>';
                        con1 += '<td style="text-align:center;">'+value.name_of+'</td>';
                        con1 += '<td style="text-align:center;">'+value.gothra+'</td>';
                        con1 += '<td style="text-align:center;">'+value.nakshathra+'</td>';    
                        con1 += '<td style="text-align:center;">'+value.booking_pnr+'</td>';
                        con1 += '<td style="text-align:center;">'+value.receipt_no+'</td>';
                        con1 += '<td style="text-align:center;">'+value.mobile_number+'</td>';
                        con1 += '<td style="text-align:center;">'+value.seva_include+'</td>';          
                        con1 += '</tr>';
                        });

                        $('.endowment_export').empty();

                        $('.endowment_export').append(con1);

                    }else{
                        jQuery('#list3').jqGrid('clearGridData');
                        jQuery('#list3').jqGrid('setGridParam', {data: response.mssg});
                        jQuery('#list3').trigger('reloadGrid');
                        $("#res_type").val(response.type);

                        $('.endowment_export').empty();

                            var con2 = '';

                            con2 +='<thead><tr><th><b>Devotee</b></th><th><b>Gothra</b></th><th><b>Nakshatra</b></th><th><b>Receipt</b></th><th><b>PNR #</b></th><th><b>Contact No</b></th></tr></thead>';

                            $.each( response.mssg, function( key, value ) {   

                                console.log('<td style="text-align:center;">'+value.booking_pnr+'</td>');
                            con2 += '<tr>';
                            con2 += '<td style="text-align:center;">'+value.name_of+'</td>';
                            con2 += '<td style="text-align:center;">'+value.gothra+'</td>';
                            con2 += '<td style="text-align:center;">'+value.nakshathra+'</td>';    
                            con2 += '<td style="text-align:center;">'+value.booking_pnr+'</td>';
                            con2 += '<td style="text-align:center;">'+value.receipt_no+'</td>';
                            con2 += '<td style="text-align:center;">'+value.mobile_number+'</td>';          
                            con2 += '</tr>';
                            });

                            $('.endowment_export').empty();

                            $('.endowment_export').append(con2);
                    }   
                }
                else 
                {
                    toastr["error"](response.message);
                    $('.mt-5').hide();
                    $('.mt-6').hide();
                                    
                }
                }
            });   
            
            

            jQuery("#list2").jqGrid({
                    data: '',
                    datatype: "local",
                
                        colNames:['id','Devotee','Gothra','Nakshatra','Receipt','PNR #','Contact No','Sub Sevas'],
                        colModel:[
                            {name:'id',index:'id',width:100,hidden:true, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'name_of',index:'name_of', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'gothra',index:'gothra', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'nakshathra',index:'nakshathra', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'receipt_no',index:'receipt_no', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'booking_pnr',index:'booking_pnr', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'mobile_number',index:'mobile_number', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_include',index:'seva_include', width:200, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
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

                        caption:"Seva Wise Report"
                    });
                    $("#list2").jqGrid("setLabel", "rn", "SL");
                    $("#list2").jqGrid('filterToolbar',{searchOperators : false});
                    $("#list2").jqGrid('navGrid','#pager3',

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

              jQuery("#list3").jqGrid({
                    data: '',
                    datatype: "local",
                
                        colNames:['id','Devotee','Gothra','Nakshatra','Receipt','PNR #','Contact No'],
                        colModel:[
                            {name:'id',index:'id',width:100,hidden:true, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'name_of',index:'name_of', width:80, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'gothra',index:'gothra', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'nakshathra',index:'nakshathra', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'receipt_no',index:'receipt_no', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'booking_pnr',index:'booking_pnr', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'mobile_number',index:'mobile_number', width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                        ],
                        rowNum:20,
                        rowList:[10,30,50,100,200,300],
                        rownumbers: true,
                        pager: '#pager4', 
                        sortname:'id', 
                        height: '100%',
                        width: '100%',
                        viewrecords: true, 
                        loadonce:true,
                        gridview: true,
                        sortorder:"desc", 

                        caption:"Seva Wise Report"
                    });
                    $("#list3").jqGrid("setLabel", "rn", "SL");
                    $("#list3").jqGrid('filterToolbar',{searchOperators : false});
                    $("#list3").jqGrid('navGrid','#pager4',

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

    $("#type").focusout(function(){
        // alert("hiii");
        var type = $(this).val();


        $.ajax({
        type : 'post',
        url  : '<?php echo site_url("SevaWiseReport/fetch_sevas") ?>',
        data   : {type : type},


        success:function(response){
        response = jQuery.parseJSON(response);
        console.log(response);

            
        if(response.result==1)
        {  
            $("#seva").empty();
            for (var i = 0; i < response.message.length; i++) {
            var mode = "";
            mode += "<option value='"+response.message[i].id+"'>" + response.message[i].seva_name + "</option>";
            $("#seva").append(mode);
          }
        }else{
            toastr["error"](response.message);
        }
    }
    
    
    });
    })
</script>


<script>
   function endowment_export(){

    // if($("#res_type").val()  == 'Endowment'){
        $(".endowment_export").table2excel({

        exclude: ".noExl",

        name: "Excel Document Name",

        filename: "Seva Wise Report",

        fileext: ".xls",

        exclude_img: true,

        exclude_links: true,

        exclude_inputs: true

        });        
    // } else if($("#res_type").val()  == 'General'){
    //     $(".general_export").table2excel({

    //     exclude: ".noExl",

    //     name: "Excel Document Name",

    //     filename: "Seva Wise Report",

    //     fileext: ".xls",

    //     exclude_img: true,

    //     exclude_links: true,

    //     exclude_inputs: true

    //     });        
    // }

                

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



                      