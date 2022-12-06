<?php
    echo view('includes/header',$temple_details);

?>

<div class="content-wrapper">
       <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Edit English Calendar</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
	              <li class="breadcrumb-item active">Edit English Calendar</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>

        <section class="content" >
        <div class="row" style="background-color:#fff;">
            <form class="form-inline fetchDetails  my-5 mx-auto">
                <div class="form-group mx-sm-2 mb-2">
                  <label for="selectEvent" >Anything</label>
                    <select class="selectEvent custom-select" id="selectEvent"name="selectEvent">
                       <option>select</option>
                        <option >Events</option>
                        <option >Panchanga</option>
                        <option >English Calender</option>
                    </select>
                </div>
                <div class="form-group mx-sm-2 mb-2">
                    <label for="setYear" >Set Year</label>
                    <select class="setYear custom-select " id="setYear"name="year">
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                        <option>2029</option>
                        <option>2030</option>
                        <option>2031</option>
                        <option>2032</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
          </div>  

            <div class="row p-5" style="background-color:#fff;">
                <div class="event-grid">
                    <table id="list2"></table>
                    <div id="pager2"></div>
                    <button type="button" id="event-submit"  class="btn btn-primary my-5" >E Submit</button>
                </div>
                <div class="panchanga-grid">
                    <table id="list3"></table>
                    <div id="pager3"></div>
                    <button type="button" id="panchanga-submit"  class="btn btn-primary my-5" >P Submit</button>
                </div>
                <div class="englishCalander-grid">
                    <table id="list4"></table>
                    <div id="pager4"></div>
                    <button type="button" id="englishCalander-submit"  class="btn btn-primary my-5" >EC Submit</button>
                </div>
            </div>
        </section>     
</div>


<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
<script type="text/ecmascript" src="<?php echo base_url('jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>" type="text/javascript"></script> 

<script type="text/javascript">

    

  $(".fetchDetails").submit(function(e){
         e.preventDefault();
         formdata = new FormData($(this)[0]);
        //  var a = $(".selectEvent").val();
        //  alert(a);  
         if($(".selectEvent").val() == "Events"){

                $.ajax({
                type   : 'post',
                url    : '<?php echo base_url("EditEndowment/event_fetch")?>',
                data   : formdata,
                contentType: false,
                processData: false,

                success:function(response){
                  response = jQuery.parseJSON(response);
                  console.log(response);

                  $(".event-grid").show(); 
                  $(".panchanga-grid").hide(); 
                  $(".englishCalander-grid").hide(); 

                  $("#event-submit").show(); 
                  $("#panchanga-submit").hide(); 
                  $("#englishCalander-submit").hide(); 

                  jQuery('#list2').jqGrid('clearGridData');
                  jQuery('#list2').jqGrid('setGridParam', {data: response});
                  jQuery('#list2').trigger('reloadGrid'); 

                  }                 
                 
                       });
                          jQuery("#list2").jqGrid({
                              data: "",
                              datatype: "local",
                              colNames:['Events', 'Date'],
                              colModel:[
                                
                                {name:'event',index:'event', width:200},

                                {name:'english_date',index:'english_date', width:200,formatter: 'date', formatoptions: { newformat: 'd-m-Y' },editable:true,editoptions:{size:20, 
                                    dataInit:function(el){ 
                                        $(el).datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat:'dd-mm-yy'
                                        }); 
                                    },
                                    defaultValue: function(){ 
                                        var currentTime = new Date(); 
                                        var month = parseInt(currentTime.getMonth() + 1); 
                                        month = month <= 9 ? "0"+month : month; 
                                        var day = currentTime.getDate(); 
                                        day = day <= 9 ? "0"+day : day; 
                                        var year = currentTime.getFullYear(); 
                                        return year+"-"+month + "-"+day; 
                                    }}, },
                                    // {index:'event', width:200},    
                                  
                              ],
                              rowNum:20,
                              rowList:[20,40,60],
                              pager: '#pager2',
                              viewrecords: true,
                              cellEdit: true,
                              cellsubmit : 'clientArray',
                              width: '100%',
                              height: '100%',
                              sortorder: "desc",
                              caption:"Events",
                              rownumbers: true
                          });
                          $("#list2").jqGrid("setLabel", "rn", "SL");
                          jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
                          jQuery("#list2").jqGrid('filterToolbar',{searchOperators : true});


         }else if ($(".selectEvent").val() == "Panchanga"){

                    $.ajax({
                    type   : 'post',
                    url    : '<?php echo base_url("EditEndowment/panchanga_fetch")?>',
                    data   : formdata,
                    contentType: false,
                    processData: false,

                    success:function(response){
                      response = jQuery.parseJSON(response);
                      console.log(response); 

                      $(".event-grid").hide(); 
                      $(".panchanga-grid").show(); 
                      $(".englishCalander-grid").hide(); 

                      $("#event-submit").hide(); 
                      $("#panchanga-submit").show(); 
                      $("#englishCalander-submit").hide(); 

                      jQuery('#list3').jqGrid('clearGridData');
                      jQuery('#list3').jqGrid('setGridParam', {data: response});
                      jQuery('#list3').trigger('reloadGrid'); 

                      }                 
                    
                          });
                              jQuery("#list3").jqGrid({
                                  data: "",
                                  datatype: "local",
                                  colNames:['Events', 'Date'],
                                  colModel:[
                                    
                                    {name:'event',index:'event', width:500},
                                    {name:'english_date',index:'english_date', width:200,formatter: 'date', formatoptions: { newformat: 'd-m-Y' },editable:true,editoptions:{size:20, 
                                    dataInit:function(el){ 
                                        $(el).datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat:'dd-mm-yy'
                                        }); 
                                    },
                                    defaultValue: function(){ 
                                        var currentTime = new Date(); 
                                        var month = parseInt(currentTime.getMonth() + 1); 
                                        month = month <= 9 ? "0"+month : month; 
                                        var day = currentTime.getDate(); 
                                        day = day <= 9 ? "0"+day : day; 
                                        var year = currentTime.getFullYear(); 
                                        return year+"-"+month + "-"+day; 
                                    }}, },
                                      
                                  ],
                                  rowNum:20,
                                  rowList:[20,40,60],
                                  pager: '#pager3',
                                  viewrecords: true,
                                  cellEdit: true,
                                  cellsubmit : 'clientArray',
                                  width: '100%',
                                  height: '100%',
                                  sortorder: "desc",
                                  caption: "Panchanga",
                                  rownumbers: true
                              });
                              $("#list3").jqGrid("setLabel", "rn", "SL");
                              jQuery("#list3").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
                              jQuery("#list3").jqGrid('filterToolbar',{searchOperators : true});

         
                    }else if ($(".selectEvent").val() == "English Calender"){

                      $.ajax({
                      type   : 'post',
                      url    : '<?php echo base_url("EditEndowment/english_date_fetch")?>',
                      data   : formdata,
                      contentType: false,
                      processData: false,

                      success:function(response){
                        response = jQuery.parseJSON(response);
                        console.log(response); 

                        $(".event-grid").hide(); 
                        $(".panchanga-grid").hide(); 
                        $(".englishCalander-grid").show(); 

                        $("#event-submit").hide(); 
                        $("#panchanga-submit").hide(); 
                        $("#englishCalander-submit").show(); 

                        jQuery('#list4').jqGrid('clearGridData');
                        jQuery('#list4').jqGrid('setGridParam', {data: response});
                        jQuery('#list4').trigger('reloadGrid'); 

                        }                 

                            });
                                jQuery("#list4").jqGrid({
                                    data: "",
                                    datatype: "local",
                                    colNames:['Events', 'Date'],
                                    colModel:[
                                      
                                      {name:'event',index:'event', width:500,searchoptions:{sopt:['eq','bw','bn','cn','nc','ew','en']}},
                                      {name:'english_date',index:'english_date', width:200,formatter: 'date', searchoptions:{sopt:['eq','bw','bn','cn','nc','ew','en']}, formatoptions: { newformat: 'd-m-Y' },editable:true,editoptions:{size:20, 
                                    dataInit:function(el){ 
                                        $(el).datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat:'dd-mm-yy',
                                            // onSelect: function (dateString, txtDate) {
                                            //   // console.log($(this));
                                            //   // console.log('given'+dateString);
                                            //   // console.log($(this).parent());

                                            //   // $(this).parent().attr("class","");
                                            //   // $(this).parent().attr("tabindex","");
                                            //   // $(this).parent().attr("title",dateString);
                                            //   // $(this).parent().html(dateString);


           
                                            //     }
                                            

                                        }); 
                                    },
                                    defaultValue: function(){ 
                                        var currentTime = new Date(); 
                                        var month = parseInt(currentTime.getMonth() + 1); 
                                        month = month <= 9 ? "0"+month : month; 
                                        var day = currentTime.getDate(); 
                                        day = day <= 9 ? "0"+day : day; 
                                        var year = currentTime.getFullYear(); 
                                        return year+"-"+month + "-"+day; 
                                    }}, },
                                        
                                    ],
                                    rowNum:20,
                                    rowList:[20,40,60],
                                    pager: '#pager4',
                                    viewrecords: true,
                                    cellEdit: true,
                                    cellsubmit : 'clientArray',
                                    width: '100%',
                                    height: '100%',
                                    sortorder: "desc",
                                    caption: "English Calander",
                                    rownumbers: true,
                                    // onSelectRow : editRow,
                                    
                                });
                                $("#list4").jqGrid("setLabel", "rn", "SL");
                                jQuery("#list4").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
                                jQuery("#list4").jqGrid('filterToolbar',{searchOperators : true});
                                var lastSelection;

                                // function editRow(id) {
                                //     if (id && id !== lastSelection) {
                                //         var grid = $("#list4");
                                //         grid.jqGrid('restoreRow',lastSelection);
                                //         grid.jqGrid('editRow',id, {keys: true} );
                                //         lastSelection = id;
                                //     }
                                // }

                      }
         


    });  

    $("#event-submit").click(function(){

      var localGridData = $("#list2").jqGrid("getGridParam", "data");
      var n = jQuery("#list2").jqGrid('getGridParam', 'records');

      addEditEvent(localGridData,n);
    })

    $("#panchanga-submit").click(function(){

    var localGridData = $("#list3").jqGrid("getGridParam", "data");
    var n = jQuery("#list3").jqGrid('getGridParam', 'records');

    addEditEvent(localGridData,n);
    })

    $("#englishCalander-submit").click(function(){

    var localGridData = $("#list4").jqGrid("getGridParam", "data");
    var n = jQuery("#list4").jqGrid('getGridParam', 'records');

    addEditEvent(localGridData,n);
    })


    function addEditEvent(localGridData,n){

    console.log(localGridData);

    var year=$('#setYear').val();
    $.ajax({
        url: '<?php echo site_url("EditEndowment/store_events")?>?year='+year+'&n='+n,
        type: "POST",
        data: { Data:localGridData },
        success:function(response){
            response = jQuery.parseJSON(response);
            console.log(response);
            if(response.result == 1){

                toastr["success"](response.message);


            }
            else 
			{
			    toastr["error"](response.message);
            }
        }
    });
}



    $("#event-submit").hide(); 
    $("#panchanga-submit").hide(); 
    $("#englishCalander-submit").hide();



</script>    

<?php
  echo view('includes/footer');
?>