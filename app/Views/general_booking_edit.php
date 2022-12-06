<?php

echo view('includes/header',$temple_details, $endo);
$sname = session()->get('name');


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
                            <li class="breadcrumb-item active">Edit General Booking</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="general-booking">

            <h4>Edit General Booking</h4><br/>

            <form class="bg-white edit_item_details" id="edit_item_details" >

                <input type="hidden" class="form-control id" value="<?php echo $price['id'];?>" name="id" id="id">
                <input type="hidden" class="form-control id" value="<?php echo $price['gc_id'];?>" name="b_id">
                <!-- <input type="hidden" class="form-control id" value="<?php echo $gc_id ;?>" name="b_id"> -->
                <input type="hidden" class="form-control id" value="<?php echo $price['gsb_id'];?>" name="p_id">

                
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">

                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Mobile Number </label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control mobile_number_e" value="<?php echo $generalbooking['mobile_number']; ?>" name="mobile_number_e"  >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Name</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control name_e" value="<?php echo $generalbooking['name']; ?>" name="name_e"  >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Address 1</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control address1_e" value="<?php echo $generalbooking['address1']; ?>" name="address1_e"  >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Address 2</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control address2_e" value="<?php echo $generalbooking['address2']; ?>" name="address2_e"  >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>PIN Code</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="number" class="form-control pin_code_e" value="<?php echo $generalbooking['pin_code']; ?>"  name="pin_code_e" id= "pin_code" >
                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>City</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control city_e" value="<?php echo $generalbooking['city']; ?>" name="city_e"  id = "city">
                                </div>
                            </div>
                            
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>State</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control state_e" value="<?php echo $generalbooking['state']; ?>" name="state_e" id = "state">
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>E-Mail</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control email_e" value="<?php echo $generalbooking['email']; ?>" name="email_e"  >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Comments</label>
                                </div>
                                <div class="col-sm-8">                    
                                 <input type="text" class="form-control comments_e" value="<?php echo $seva_details[0]['comment']; ?>" name="comments_e"  >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                 <label>Gothra</label>
                                </div>
                                <div class="col-sm-8">                    
                                 
                                    <input type="text" class="form-control gothra_e" value="<?php echo $generalbooking['gothra']; ?>" name="gothra_e" id="gothra_e" list="gothra2" required>
                                    <datalist  id="gothra2">
                                        <?php
                                        foreach($gothra as $key=>$val){																		 
                                        ?>
                                        <option ><?php echo $val['master_value']; ?></option>
                                        <?php
                                        } 
                                        ?>
                                    </datalist>
                                </div>
                            </div>
                                                   
                            
                        </div>
                    </div>               

                
                    <div class="col-sm-6 ">
                        <div class="form-group">

                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Grand Total</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control grand_total_e" name="grand_total_e" value="<?php echo $price['total_amount']; ?>" readonly >
                                    
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Booking Date</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control booking_date_e" name="booking_date_e" value="<?php echo date("d-m-Y",strtotime($seva_details[0]['booking_date'])); ?>" readonly>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Booking PNR</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control booking_pnr_e" name="booking_pnr_e" value="<?php echo $price['booking_pnr']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Receipt No.</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control receipt_no_e" name="receipt_no_e" value="<?php echo $seva_details[0]['receipt_no']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control status_e" name="status_e" value="<?php echo $generalbooking['status']; ?>" >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>PAN</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control pan_e" name="pan_e" value="<?php echo $generalbooking['pan']; ?>" >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Aadhar</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control adhar_e" name="adhar_e" value="<?php echo $generalbooking['adhar']; ?>" >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Purpose</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <input type="text" class="form-control purpose_e" name="purpose_e" value="<?php echo $generalbooking['purpose']; ?>" >
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Rashi</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <!-- <input type="text" class="form-control rashi_e" name="rashi_e" value="<?php echo $generalbooking['rashi']; ?>" > -->
                                    <input type="text" class="form-control rashi_e" value="<?php echo $generalbooking['rashi']; ?>" name="rashi_e" id="rashi_e" list="rashi_e2" >
                                    <datalist  id="rashi_e2">
                                        <?php
                                        foreach($rashi as $key=>$val){																		 
                                        ?>
                                        <option ><?php echo $val['master_value']; ?></option>
                                        <?php
                                        } 
                                        ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-sm-4">
                                    <label>Nakshathra</label>
                                </div>
                                <div class="col-sm-8">                    
                                    <!-- <input type="text" class="form-control nakshathra_e" name="nakshathra_e" value="<?php echo $generalbooking['nakshathra']; ?>" > -->
                                    <input type="text" class="form-control nakshathra_e" value="<?php echo $generalbooking['nakshathra']; ?>" name="nakshathra_e" id="nakshathra_e" list="nakshathra_e2" >
                                    <datalist  id="nakshathra_e2">
                                        <?php
                                        foreach($nakshathra as $key=>$val){																		 
                                        ?>
                                        <option ><?php echo $val['master_value']; ?></option>
                                        <?php
                                        } 
                                        ?>
                                    </datalist>
                                </div>
                            </div>  

                            <input type="hidden" class="add" id="add" >

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id = "maintable1">
                            <thead>
                            <tr>
                                <th style="text-align : center;">Seva Date</th>
                                <th style="text-align : center;">Seva</th>
                                <th style="text-align : center;" >Price</th>
                                <th style="text-align : center;" >Seva Units</th>
                                <th style="text-align : center;" >Amount</th>
                                <th style="text-align : center;" >Remarks</th>
                                <th><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                               foreach($seva_details as $key=>$val){

                                $ac = ($seva_details[$key]['seva_date']);
                                $ad = strtotime($ac);
                                $seva_date = date("d-m-Y",$ad);

                            ?>
                                <tr>  
                                    
                                    <td><input type="text" value="<?php echo $seva_date; ?>" class="form-control seva_date" id="seva_date<?php echo $key+1; ?>" name="seva_date_e[]" /> </td>
                                    <td>
                                        <input type="text" class="form-control seva_name" value="<?php echo $seva_details[$key]['seva_code']; ?> - <?php echo $seva_details[$key]['seva_name']; ?>" name="seva_name_e[]" id="seva_name<?php echo $key+1; ?>" list="SevaName_e2<?php echo $key+1; ?>" onfocusout="get_amount(<?php echo $key+1; ?>)" readonly><i onclick="clean(<?php echo $key+1; ?>)" class="fa fa-times" aria-hidden="true" style="float:right; margin-top: -22px; color:#ee6304;cursor: pointer;"></i>
                                        <datalist  id="SevaName_e2<?php echo $key+1; ?>">                </datalist>
                                    </td>
                                    <td><input type="text" value="<?php echo $seva_details[$key]['price']; ?>" class="form-control price" id="price<?php echo $key+1; ?>" name="price_e[]" readonly/></td>
                                    <td><input type="text" value="<?php echo $seva_details[$key]['seva_units']; ?>" class="form-control seva_unit" id="seva_unit<?php echo $key+1; ?>" name="seva_unit_e[]" readonly/></td>
                                    <td><input type="text" value="<?php echo $seva_details[$key]['amount']; ?>" class="form-control amount" id="amount<?php echo $key+1; ?>" name="amount_e[]" readonly/></td>
                                    <td><input type="text" value="<?php echo $seva_details[$key]['remark']; ?>" class="form-control remarks" id="remarks<?php echo $key+1; ?>" name="remarks_e[]" ></td>
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
                      <!-- <button type="submit" class="btn btn-primary center-block update" >Update</button> -->
                      
                      <button type="button" class="btn btn-primary calculation_modal">Pay</button>  
                      <button type="button" class="btn btn-primary" onclick="goBack()" >Cancel</button>
                    </div>
                </div>



                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Payment Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-sm-6">

                                <div class="row">
                                <div class="col-sm-6">
                                    <label>Total Amount</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control total_amount_e" id="total_amount_e" name="total_amount_e" readonly>
                                </div>
                                </div><!--row-->

                                <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label>Payment Method</label>
                                </div>
                                <div class="col-sm-6">
                                    <!-- <select class="form-control payment_mode"  name="payment_mode" style="width: 75%;">	
                                                                    
                                    <option >Cheque</option>
                                    <option selected>Cash</option>
                                    <option>NEFT</option>
                                    <option>UPI</option>
                                    
                                    </select> -->
                                    <select class="form-control payment_mode_e"  name="payment_mode_e">
                                    <?php
                                    foreach($paymentmode as $key=>$val){																		 
                                    ?>
                                    <option><?php echo $val['master_value']; ?></option>
                                    <?php
                                    } 
                                    ?>
                                    </select>
                                    
                                </div>
                                </div><!--row-->
                                

                                <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label>Details</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control details_e" value="<?php echo $price['details']; ?>" name="details_e">
                                </div>
                                </div><!--row-->

                            </div>

                            <div class="col-sm-6">

                                <div class="row">
                                <div class="col-sm-6">
                                    <label>Amount Paid</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control amount_paid_e"  id="amount_paid_e" name="amount_paid_e" readonly >
                                </div>
                                </div><!--row-->

                                <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label>Balance Amount</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control balance_amount_e" id="balance_amount_e" name="balance_amount_e" value="<?php echo $price['balance_amount']; ?>" readonly>
                                    <input type="hidden" class="test">
                                </div>
                                </div><!--row-->

                                <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label>Received By</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="<?php echo $sname; ?>" class="form-control received_by_e" name="received_by_e">
                                </div>
                                </div><!--row-->
                                <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label>Balance Amount Paid</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control balance_amount_paid" name="balance_amount_paid">
                                </div>
                                </div><!--row-->
                                
                                
                            </div>
                            </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer" id="printappend" >
                            <button type="submit" class="btn btn-primary center-block update" >Update</button>

                            
                        </div>
                        
                        </div>
                    </div>
                </div>

            </form>

      

        </div>

     
    </div>
        
        
</div><!---content-wrapper----->



<script>


  var paymode ="<?php echo $price['payment_method']; ?>";
  $('.payment_mode_e').val(paymode);

 var today = new Date();
//  var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear(); 

  var random1 = Math.floor(Math.random()*1000*1000);
//   var random = Math.floor(new Date().valueOf() * Math.random());
  var year = today.getFullYear();  
  var value="<?php echo $temple_details[0]['receipt_number_prefix'] ?>";
  var ab = value+"-"+year+"/"+random1;
//   alert(ab);
//   $('.booking_pnr').val(random);
  $('.receipt_no_e').val(ab);

    $(document).ready(function(){

        $(".calculation_modal").click(function(){
            var total_amount = 0;
            // var i = 0;
            sum = 0;
            $('.amount').each(function() {
                if($(this).val()){
                    sum += parseFloat($(this).val()); 
                }
            });
            $(".grand_total_e").val(sum);
            $(".total_amount_e").val(sum);
            // $(".amount_paid_e").val(sum);
            $("#myModal").modal("show");   

           

           

            var total_amount = $('.total_amount_e').val();
            var amount_paid = $('.amount_paid_e').val();
            var balance_amount = ((total_amount) - (amount_paid));
            
            document.getElementById('balance_amount_e').value = balance_amount;    
            document.querySelector('.test').value = balance_amount;  

            
                

            
            
            


        });

    });


    function goBack() {
        location.href = '<?php echo base_url("GeneralBooking")?>';
    }

    $(".remove").click(function(){
        $(this).closest('tr').remove();
    });

    // $('.seva_date').datepicker({dateFormat: "dd-mm-yy"});

    var z = "<?php echo $key+1; ?>";       
    document.getElementById('add').value = z;       

   

    // var parent = document.getElementById("parentId");
    // var nodesSameClass = parent.getElementsByClassName("seva_date");
    // document.getElementById('add1').value = nodesSameClass;  



    $(".add_more_button1").click(function(){

        var q = $("#add").val();
        q = parseFloat(q) +1;
        $("#add").val(q);        
        // alert(q);

        var sevaD = "seva_date"+q;
        var sevaN = "seva_name"+q;
        var price = "price"+q;
        var sevaU = "seva_unit"+q;
        var amount = "amount"+q;
        var remark = "remarks"+q;
        var subdata = "subdata"+q;

        var mode = '';
        
        mode += '<tr>';
        mode += '<td><input type="text" id='+sevaD+' class="form-control seva_date" name="seva_date_e[]"  /></td>';
        mode += '<td><input type="text" id='+sevaN+' class="form-control seva_name" name="seva_name_e[]" onfocusout="get_amount('+q+')"  list='+subdata+'  readonly/><i onclick="clean('+q+')" class="fa fa-times" aria-hidden="true" style="float:right; margin-top: -22px; color:#ee6304;cursor: pointer;"></i>';
        mode += '<datalist  id='+subdata+' >  </datalist>';
        mode += '</td>';
        mode += '<td><input type="text" id='+price+' class="form-control price" name="price_e[]" readonly /></td>';
        mode += '<td><input type="text" id='+sevaU+' class="form-control seva_unit" name="seva_unit_e[]" readonly /></td>';
        mode += '<td><input type="text" id='+amount+' class="form-control amount" name="amount_e[]"  readonly/></td>';
        mode += '<td><input type="text" id='+remark+' class="form-control remarks" name="remarks_e[]"  /></td>';
        mode += '<td><button  type="button" class="glyphicon glyphicon-plus remove "><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';      
        
        mode += '</tr>';
        

        $("#maintable1").append(mode).fadeIn('slow');
        $(".remove").click(function(){
        $(this).closest('tr').remove();
        });

        $('.seva_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            onSelect: function (dateString, txtDate) {
                var id_get = $(this).attr('id');
                var id_string = id_get.slice(-1);
                    myFun1(dateString,id_string);
           
                }
        });

        var seva_date ='';
        var id ='';
        function myFun1(message,ids) {
        seva_date = message;
        id = ids;
        alert(seva_date);

        $.ajax({ 
            type : "POST",
            url : '<?php echo base_url("GeneralBooking/check_codes") ?>',
            data : {seva_date:seva_date},
            success:function(response){
            response=jQuery.parseJSON(response);

            console.log(response);
            if(response.result==1){

                console.log(response.message);
                // if(count==1)
                // {
                //   count++;
                // var mode='';
                var mode1='';
                $('#seva_name'+q).removeAttr('readonly'); 

                //   $('#seva_code_new'+id).empty();
                //   $('#seva_name_new'+id).empty();
                //   $('#seva_code'+id).empty();
                //   $('#SevaName_e2'+id).empty(); 
                //mode += '<datalist  id="main_seva" name="main_seva"  >';
                
                for(var i=0; i<response.message.length; i++){   

                    // mode += '<option>'+response.message[i].seva_code+' / '+response.message[i].seva_name+'</option>';
                    mode1 += '<option>'+response.message[i].seva_code+' - '+response.message[i].seva_name+'</option>'; 
                    // $('#seva_code'+id).append(mode); 
                    $('#subdata'+id).append(mode1);  

                    

                    } 
            }
            else {
                toastr["error"](response.message);
            }
            }
        });

        }
        
        
        
    });

    $('.seva_date').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy",
      onSelect: function (dateString, txtDate) {
        var id_get = $(this).attr('id');
        var id_string = id_get.slice(-1);
            myFun1(dateString,id_string);
           
          }
    });
    var seva_date ='';
    var id ='';
    function myFun1(message,ids) {
      seva_date = message;
      id = ids;
      alert(id);

      $.ajax({ 
        type : "POST",
        url : '<?php echo base_url("GeneralBooking/check_codes") ?>',
        data : {seva_date:seva_date},
        success:function(response){
          response=jQuery.parseJSON(response);

          console.log(response);
          if(response.result==1){

            console.log(response.message);
            // if(count==1)
            // {
            //   count++;
            // var mode='';
            var mode1='';
            $('#seva_name'+id).removeAttr('readonly'); 

            //   $('#seva_code_new'+id).empty();
            //   $('#seva_name_new'+id).empty();
            //   $('#seva_code'+id).empty();
            //   $('#SevaName_e2'+id).empty(); 
              //mode += '<datalist  id="main_seva" name="main_seva"  >';
              
              for(var i=0; i<response.message.length; i++){   

                // mode += '<option>'+response.message[i].seva_code+' / '+response.message[i].seva_name+'</option>';
                mode1 += '<option>'+response.message[i].seva_code+' - '+response.message[i].seva_name+'</option>'; 
                // $('#seva_code'+id).append(mode); 
                $('#SevaName_e2'+id).append(mode1);  

                  

                } 
          }
          else {
            toastr["error"](response.message);
          }
        }
      });

    }

    function clean(key){

        var work = 'seva_name'+key;   
        var seva_name = $('#'+work).val(' '); 
        var price = "price"+key;
        var price1 = $('#'+price).val(' '); 
        var sevaunits = "seva_unit"+key;
        var sevaunits1 = $('#'+sevaunits).val(' '); 
        var amount = "amount"+key;
        var amount1 = $('#'+amount).val(' '); 
        var remarks1 = "remarks"+key;
        var remarks = $('#'+remarks1).val(' '); 



        document.querySelector(".clean") = seva_name ;  
        document.querySelector(".clean") = price1 ; 
        document.querySelector(".clean") = sevaunits1 ;
        document.querySelector(".clean") = amount1 ; 
        document.querySelector(".clean") = remarks ; 


        // document.querySelector(".paymode").style.display = "block";


    }

    function get_amount(key){
    
    // console.log(key);
    var SD = "seva_date"+key;
    var seva_date = $('#'+SD).val();
    var SN = "seva_name"+key;
    var seva_name = $('#'+SN).val();

    alert(seva_name);
    $.ajax({

        type : "POST",
        url : '<?php echo base_url("GeneralBooking/getAmount") ?>',
        data : {seva_name:seva_name,seva_date:seva_date},

	    success:function(response){
		    response=jQuery.parseJSON(response);
		    console.log(response);

			if(response.result== 1){

                console.log(response.work);
                console.log(response.message);
                console.log(response.msg);
                console.log(response.enableamount);
          
                // -------------------function for enable_amount & enable_unites (resive from response)-------------------------------------

                // document.querySelector(".paymode").style.display = "block";
               
					
                $('#price'+key).val(response.msg.amount);
                $('#amount'+key).attr('readonly','readonly');          

                if(response.enableamount == '0' && response.work == '0'){

                    document.getElementById('seva_unit'+key).value = '1';
                    $('#price'+key).attr('readonly','readonly');
                    $('#seva_unit'+key).attr('readonly','readonly');	

                    var seva_unit = $('#seva_unit'+key).val();	
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	

                }

                else if(response.work == '0' ){
                    
                    $('#price'+key).removeAttr('readonly');

                    // $('#price'+key).attr('readonly','readonly');
                    $('#seva_unit'+key).attr('readonly','readonly');		
                    document.getElementById('seva_unit'+key).value = '1';
                    var seva_unit = $('#seva_unit'+key).val();	
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	

                    $('#price'+key).keyup(function(){
                    var seva_unit = $('#seva_unit'+key).val();
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	
                    });
                }
          
                else if(response.work == '1' && response.enableamount == '1'){

                    $('#price'+key).removeAttr('readonly');
                    $('#seva_unit'+key).removeAttr('readonly');
                    

                    document.getElementById('seva_unit'+key).value = '1';
                    var seva_unit = $('#seva_unit'+key).val();	
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	

                    $('#seva_unit'+key).keyup(function(){
                    var seva_unit = $('#seva_unit'+key).val();
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	
                    });  

                    $('#price'+key).keyup(function(){
                    var seva_unit = $('#seva_unit'+key).val();
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	
                    });

                }
                
                else{
                    $('#price'+key).attr('readonly','readonly');
                    $('#seva_unit'+key).removeAttr('readonly');


                    document.getElementById('seva_unit'+key).value = '1';
                                var seva_unit = $('#seva_unit'+key).val();
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);           
                    document.getElementById('amount'+key).value = amount;	
                    // alert(amount);
                    $('#seva_unit'+key).keyup(function(){
                    var seva_unit = $('#seva_unit'+key).val();
                    var price = $('#price'+key).val();
                    var amount = (seva_unit*price);
                    document.getElementById('amount'+key).value = amount;	
                    }); 
				}
			}
            else {
                toastr["error"](response.message);
            }  
			}
		});
}

$(document).ready(function(){

    $('.edit_item_details').submit(function(e){
        e.preventDefault();
        // alert("hiihi");

      var formData= new FormData(this);

      $.ajax({
        
        type : "POST",
        url : '<?php echo site_url("GeneralBooking/edit_general_booking") ?>',
        data : formData,

        contentType: false,
        processData: false,

        success:function(response){

          response = jQuery.parseJSON(response);


          if(response.result==1){ 

            // console.log(response.msg);
            toastr["success"](response.message);   
            location.href = '<?php echo base_url("GeneralBooking")?>';


          }
          else 
          {
                
            toastr["error"](response.message);            
                        
          }

        }
      });

    });

});


</script>

<script>

//   var total_amount = $('.total_amount_e').val();
//   var amount_paid = $('.amount_paid_e').val();
//   var balance_amount = ((total_amount) - (amount_paid));

//   $('.amount_paid_e').mouseover(function(){
//     var total_amount = $('.total_amount_e').val();
//     var amount_paid = $('.amount_paid_e').val();
//     var balance_amount = ((total_amount) - (amount_paid));
    
//     document.getElementById('balance_amount_e').value = balance_amount;   

//   });

//   var balance_amount = $('.balance_amount_e').val();    
//     var balance_amount_paid = $('.balance_amount_paid').val();
//     var total = balance_amount - balance_amount_paid;
    $(document).ready(function(){

        var amt_paid = <?php echo $price['amount_paid']; ?>;
        var bal_paid = <?php echo $price['balance_amount_paid']; ?>;
        var bal_amt = <?php echo $price['balance_amount']; ?>;

        var total = amt_paid + bal_paid;
        $('#amount_paid_e').val(total);
        $('.test').val(bal_amt);

        

    });
    
    
  $('.balance_amount_paid').keyup(function(){
    var balance_amount = $('.test').val();    
    var balance_amount_paid = $('.balance_amount_paid').val();
    var total = balance_amount - balance_amount_paid;

    // alert(total);
    // document.getElementById('balance_amount_e').value = total;   
    $('#balance_amount_e').val(total);

  });

</script>


<?php
  echo view('includes/footer');
?>