<?php

  echo view('includes/header',$temple_details);

?>

<div class="wrapper">


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Puduvattu Seva Booking Details Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                    <li class="breadcrumb-item active">Puduvattu Seva Report</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-header --></br>

        <div class="general-booking ml-4 mr-4">

            <h4>Puduvattu Seva Report</h4><br/>

            <form class="bg-white" id="date" >
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <div class="row book-detail">

                                <div class="col-sm-4">
                                    <label for="number">From Date :</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control from_date " id="from_date" name="from_date">
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
                                    <input type="text" class="form-control to_date " id="to_date" name="to_date">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <div class="seva-submission">
                            <button type="submit" class="btn btn-primary  float-right mr-5">Search</button>
                            <button type="button" class="btn btn-primary print float-right mr-5" onclick="generatePDF()">Print</button>
                        </div>

                    </div>
                        

                </div>
            </form>

            <!-- <table class="table table-hover mt-5 bg-white" id="msg1">
                <thead>
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">id</th>
                        <th scope="col">Seva Date</th>
                        <th scope="col">Seva Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Added By</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table> -->
            
            <div class="mt-5">
                <table id="msg1"></table>
                <div id="pager3"></div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>

    

    
        $('#date').submit(function(e){
            e.preventDefault();

            var formdata = new FormData(this);

            $.ajax({

                type : 'post',
                url  : '<?php echo site_url("PuduvattuSevaReport/date_between_items") ?>',
                data   : formdata,
                contentType: false,
                processData: false,

                success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);

                    
                if(response.result==1)
                {  

                    jQuery("#msg1").jqGrid({
                    data: response.mssg,
                    datatype: "local",
                
                        colNames:['id','Main Seva','Seva Inclues','Amount','Payment Mode','Payment Date','Seva Date','Created By'],
                        
                        colModel:[
                            {name:'id',index:'id',width:100, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'main_seva',index:'main_seva', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_include',index:'seva_include', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_price',index:'seva_price', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'payment_mode',index:'payment_mode', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'payment_date',index:'payment_date', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'seva_date',index:'seva_date', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}},
                            {name:'added_by',index:'added_by', width:150, editable:false, key: true, searchoptions: {sopt: ["eq"]}}       
                        
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
                        caption:"Puduvattu Report"



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
                    
                    // toastr["success"](response.message);

                    console.log(response.message);

                    // $("#add_model").modal("hide");
                    
                    // $('.update').removeAttr("disabled");
                    // $(".update").text("Update");    
                    // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                }
                else 
                {
                    toastr["error"](response.message);
                    // $('.update').removeAttr("disabled");
                    // $(".update").text("Update");   
                    // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                    
                }
                }
            });            

        });
    

</script>

<script>
    var date = new Date();
    $('#from_date').datepicker({dateFormat: "dd-mm-yy"});
    $('#to_date').datepicker({dateFormat: "dd-mm-yy"});
</script>
<script>
    function generatePDF(){
        const PDF = document.getElementById("msg1");
        // newWin.document.write(divToPrint.outerHTML);
        html2pdf()
        .from(PDF)
        .save();
    }
</script>

<?php
  echo view('includes/footer');
?>



                      