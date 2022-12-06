<?php

echo view('includes/header',$temple_details, $endo);

?>

<link rel="stylesheet" href="<?php echo base_url('assets/css/seva1.css');?>" />
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">        
                <div class="row mb-2">
                    <!-- <div class="col-sm-6">
                    <h1 class="m-0">Edit Seva</h1>
                    </div>/.col -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                            <li class="breadcrumb-item active">Edit Seva</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="general-booking">

            <h4>Edit Seva</h4><br/>

            <form class="bg-white" id="edit_seva_details" >
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Seva Code </label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control seva_code" value="<?php echo $info['seva_code']; ?>" name="seva_code"  readonly>
                                 <input type="hidden" value="<?php echo $info['id']; ?>" name="id" >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Seva Name </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control seva_name" value="<?php echo $info['seva_name']; ?>" name="seva_name" readonly>
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Regional Name </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control regional_name" value="<?php echo $info['regional_name']; ?>" name="regional_name" >
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Description </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control description" value="<?php echo $info['description']; ?>" name="description" >
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Type</label>
                                </div>
                                <div class="col-sm-8">
                                <select class="form-control type" id="type" name="type"  >
																		        	
                                    <?php
                                        foreach($sevatype as $key=>$val){																		 
                                    ?>
                                        <option ><?php echo $val['master_value']; ?></option>
                                    <?php
                                    } 
                                    ?>
                                </select>
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Booking Open</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control effective_start_date"  value="<?php echo date("d-m-Y",strtotime($info['booking_open'])); ?>" name="effective_start_date" id="start_date" >
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Booking End</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control effective_end_date"  value="<?php echo date("d-m-Y",strtotime($info['booking_end'])); ?>" name="effective_end_date" id="end_date" >
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control status" id="status" name="status" >
                                        <option id="radio11" value = "-1">Draft</option>
                                        <option id="radio12" value = "1" >Open</option>
                                        <option id="radio13" value = "0">Disabled</option>
                                    </select>
                                </div>
                            </div> <!--row-->
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Account Reffer Code</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control account_ref_code" value="<?php echo $info['account_ref_code']; ?>" name="account_ref_code" >
                                </div>
                            </div> <!--row-->                           
                            
                        </div>
                    </div>               

                
                    <div class="col-sm-6 ">
                        <div class="form-group">

                            
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-6">
                                <label >Enable Units</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-radio-a">
                                    <input type="radio" name="enable_units" id="option-3" value = "1" >
                                    <input type="radio" name="enable_units" id="option-4" value = "0">
                                        <label for="option-3" class="option-a option-3">
                                            <div class="dot-a"></div>
                                            <span>Yes</span>
                                        </label>
                                        <label for="option-4" class="option-a option-4">
                                            <div class="dot-a"></div>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-6">
                                <label >Enable Amount</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-radio-b">
                                    <input type="radio" name="enable_amount" id="option-5" value = "1" >
                                    <input type="radio" name="enable_amount" id="option-6" value = "0">
                                        <label for="option-5" class="option-b option-5">
                                            <div class="dot-b"></div>
                                            <span>Yes</span>
                                        </label>
                                        <label for="option-6" class="option-b option-6">
                                            <div class="dot-b"></div>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-6">
                                <label >Enable Online booking</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-radio-c">
                                    <input type="radio" name="enable_online_booking" id="option-7" value = "1" >
                                    <input type="radio" name="enable_online_booking" id="option-8" value = "0">
                                        <label for="option-7" class="option-c option-7">
                                            <div class="dot-c"></div>
                                            <span>Yes</span>
                                        </label>
                                        <label for="option-8" class="option-c option-8">
                                            <div class="dot-c"></div>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-6">
                                <label >SMS Required</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-radio-d">
                                    <input type="radio" name="sms_required" id="option-9" value = "1" >
                                    <input type="radio" name="sms_required" id="option-10" value = "0">
                                        <label for="option-9" class="option-d option-9">
                                            <div class="dot-d"></div>
                                            <span>Yes</span>
                                        </label>
                                        <label for="option-10" class="option-d option-10">
                                            <div class="dot-d"></div>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-6">
                                <label >Reminder Required</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wrapper-radio-e">
                                    <input type="radio" name="reminder_required" id="option-11" value = "1" >
                                    <input type="radio" name="reminder_required" id="option-12" value = "0">
                                        <label for="option-11" class="option-e option-11">
                                            <div class="dot-e"></div>
                                            <span>Yes</span>
                                        </label>
                                        <label for="option-12" class="option-e option-12">
                                            <div class="dot-e"></div>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Per Day Quota</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control per_day_online" name="per_day_online" value="<?php echo $info['per_day_quota']; ?>" >
                                </div>
                            </div> <!--row--> 
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Online Quota</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control online_quota" name="online_quota" value="<?php echo $info['online_quota']; ?>" >
                                </div>
                            </div> <!--row--> 
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Meals Count</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control meals_count" name="meals_count" value="<?php echo $info['meals_count']; ?>" >
                                </div>
                            </div> <!--row--> 
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Devotees Count</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control devotees_count" name="devotees_count" value="<?php echo $info['devotees_count']; ?>">
                                </div>
                            </div> <!--row--> 
                            <!-- <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Value</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control value" name="value" >
                                </div>
                            </div>  -->
                            <!--row--> 

                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered" id = "maintable1">
                            <thead>
                            <tr>
                                <th style="text-align : center;">Price Start</th>
                                <th style="text-align : center;">Price End</th>
                                <th style="text-align : center;" >Amount</th>
                                <th><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                    foreach( $info1 as $key=>$val){
                                    $ac = ($info1[$key]['price_start']);
                                    $ad = strtotime($ac);
                                    $amtopen = date("d-m-Y",$ad);

                                    $bc = ($info1[$key]['price_end']);
                                    $bd = strtotime($bc);
                                    $amtend = date("d-m-Y",$bd);
                                ?> 
                            <tr>
                                       
                                <td><input type="text"  value="<?php echo $amtopen ?>" class="form-control amt_open" name="amt_open[]" /></td>
                                <td><input type="text"  value="<?php echo $amtend ?>" class="form-control amt_end" name="amt_end[]" />
                                
                                <td><input type="text" class="form-control amt" value="<?php echo $info1[$key]['amount']; ?>" name="amt[]" ></td>
                                <td><button  type="button" class="glyphicon glyphicon-plus remove "><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>
                               
                            </tr>
                            <?php
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>   

                </div>


                <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
                   <div class="modal-footer">
                      <button type="submit" class="btn btn-primary center-block update">Update</button>
                      <button type="button" class="btn btn-primary" onclick="goBack()">Cancel</button>
                    </div>
                </div>


            </form>

      

        </div>

     
    </div>
        
        
</div><!---content-wrapper----->



<script>

  var date = new Date();
  $('#start_date').datepicker({dateFormat: "dd-mm-yy"});
  $('#end_date').datepicker({dateFormat: "dd-mm-yy"});

  function goBack() {
    location.href = '<?php echo base_url("Seva")?>';
  }
  var x = "<?php echo $info['enable']; ?>";
  $('.status').val(x);
  var z ="<?php echo $info['type']; ?>";
  $('.type').val(z);

    $(".remove").click(function(){
        $(this).closest('tr').remove();
    }); 
    $('.amt_open').datepicker({dateFormat: "dd-mm-yy"});
    $('.amt_end').datepicker({dateFormat: "dd-mm-yy"});
    
    var a = "<?php echo $info['enable_units']; ?>";
    var b = "<?php echo $info['enable_amount']; ?>";
    var c = "<?php echo $info['enable_online_booking']; ?>";
    var d = "<?php echo $info['sms_required']; ?>";
    var e = "<?php echo $info['reminder_required']; ?>";
    var f = "<?php echo $info['status']; ?>";
                               
    if(a=="1"){
    $('#option-3')[0].checked = true;
    }else{
    $('#option-4')[0].checked = true;
    }
    if(b=="1"){
    $('#option-5')[0].checked = true;
    }else {
    $('#option-6')[0].checked = true;
    }

    if(c=="1"){
    $('#option-7')[0].checked = true;
    } else {
    $('#option-8')[0].checked = true;
    }
    

    if(d=="1"){
    $('#option-9')[0].checked = true;
    }else{
    $('#option-10')[0].checked = true;
    }


    if(e=="1"){
    $('#option-11')[0].checked = true;
    }else {
    $('#option-12')[0].checked = true;
    }

    //  if(f=="1") {
    // $('#radio12').attr("selected",true);
    // }else{
    //     $('#radio13').attr("selected",true);
    // }

    // var price_start =; 
    // var split3 = price_start.split('-');
    // var join2 = [ split3[2], split3[1], split3[0] ].join('-');

    // var price_end = response.msg[i].price_end; 
    // var split4 = price_end.split('-');
    // var join3 = [ split4[2], split4[1], split4[0] ].join('-');


    $(".add_more_button1").click(function(){
        var mode = '';
        
        mode += '<tr>';
        mode += '<td><input type="text"  class="form-control start" name="amt_open[]"  /></td>';

        mode += '<td><input type="text"  class="form-control end" name="amt_end[]"  /></td>';

        mode += '<td><input type="text" class="form-control amt" name="amt[]" ></td>';
        mode += '<td><button  type="button" class="glyphicon glyphicon-plus remove "><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';
        
        
        mode += '</tr>';
        

        $("#maintable1").append(mode).fadeIn('slow');
        $(".remove").click(function(){
        $(this).closest('tr').remove();
        });
        
        $('.start').datepicker({dateFormat: "dd-mm-yy"});
        $('.end').datepicker({dateFormat: "dd-mm-yy"});
    

        
        
    });


    $('#edit_seva_details').submit(function(e){  
        e.preventDefault();
        // alert(11);
         formdata = new FormData($(this)[0]);
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            
            $.ajax({

                type   : 'post',
                url    : '<?php echo site_url("Seva/update_item_details")?>',
                data   : formdata,
                contentType: false,
                processData: false,
                                          
                  success:function(response){
                  response = jQuery.parseJSON(response);
                  console.log(response);

                    
                    if(response.result==1)
                    {  
                        toastr["success"](response.message);

                        // $("#edit_modal").modal("hide");
                        $('.update').removeAttr("disabled");
                        $(".update").text("Update");  
                        window.setTimeout(function() {
    				        window.location.href="<?php echo base_url('Seva') ?>";
                        }, 1000); 
                        // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                    }
                    else 
                    {
                          

                        toastr["error"](response.message);
                        $('.update').removeAttr("disabled");
                        $(".update").text("Update");   
                        // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                                      
                    }
                }
           });
  });
</script>


<?php
  echo view('includes/footer');
?>
