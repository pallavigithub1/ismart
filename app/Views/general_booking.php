<?php

  echo view('includes/header',$temple_details, $rel);
  $sname = session()->get('name');
  $prefix = session()->get('prefix');
?>
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">        
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">General Booking</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
              <li class="breadcrumb-item active">General Booking</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="general-booking" >

      <h4 class="ml-4">Contact Details</h4><br/>

     <form id="general"  class="bg-white ml-4 mr-4" > 
      <input type="hidden" class="form-control insert_id" id="insert_id" name="insert_id" value = '0'>
               
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="number">Mobile Number <span style="color : red; ">*</span></label>
                  </div>
                  <div class="col-sm-8">
                    <input type="number" class="form-control " id="mobile_number" name="mobile_number" onchange="checkmobile()" onfocusout="validation()" required>
                    <small class="validation" style="color:red;">Please enter 10 digits</small>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="name"> Name </label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" list="names" class="form-control" id="name" name="name" onfocusout="checkname()"  onkeyup="vald()">
                    <small class="vald" style="color:red; display:none;">Please enter Valid name</small>
                    <datalist id="names">

                    </datalist>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="address">Address 1 </label>
                  </div>
                  <div class="col-sm-8">
                    <textarea name="address1" class="form-control address1" form="usrform" rows="1" cols="5" > </textarea>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="address">Address 2 </label>
                  </div>
                  <div class="col-sm-8">
                    <textarea name="address2" class="form-control address2" form="usrform" rows="1" cols="5" > </textarea>
                  </div>
                </div>
                
                
                <!--<div class="row book-detail">-->
                <!--  <div class="col-sm-4">-->
                <!--    <label for="pin_code">PIN Code</label>-->
                <!--  </div>-->
                <!--  <div class="col-sm-8">-->
                <!--    <input type="number" class="form-control pin_code" name="pin_code" onfocusout="get_details()" id="pin_code">-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="row book-detail">-->
                <!--  <div class="col-sm-4">-->
                <!--    <label for="city">City</label>-->
                <!--  </div>-->
                <!--  <div class="col-sm-8">-->
                <!--    <input type="text" id="city" class="form-control city" name="city" placeholder="City" disabled>-->
                <!--  </div>-->
                <!--</div>-->
                
                <!--<div class="row book-detail">-->
                <!--  <div class="col-sm-4">-->
                <!--    <label for="state">State</label>-->
                <!--  </div>-->
                <!--  <div class="col-sm-8">-->
                <!--    <input type="text" class="form-control state" name="state" id="state" placeholder="State" disabled>-->
                <!--  </div>-->
                <!--</div>-->
                
                
                
                <div class="others" >
                  <div class="row book-detail">
                    <div class="col-sm-4">
                      <label for="pin_code">PIN Code</label>
                    </div>
                    <div class="col-sm-8">
                      

                      <div class="wrapper-radio">
                        <input type="radio" name="select9" value="others" id="option-1"  onclick="show1()" >
                        <input type="radio" name="select9" value="others" id="option-2" onclick="show()">
                              <label for="option-1" class="option option-1">
                                  <div class="dot"></div>
                                  <span>India</span>
                              </label>
                              <label for="option-2" class="option option-2">
                                  <div class="dot"></div>
                                  <span>Others</span>
                              </label>


                        </div><!--wrapper-radio-->

                    </div>
                  </div><!--pin code-->
                  
                  <div class="row book-detail">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-8">
                        <input type="number" class="form-control pin_code" name="pin_code1">
                      </div>
                  </div>

                  <div class="row book-detail">
                    <div class="col-sm-4">
                      <label for="city">City</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control city" name="city1">
                    </div>
                  </div>

                  <div class="row book-detail">
                    <div class="col-sm-4">
                      <label for="state">State</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control state" name="state1">
                    </div>
                  </div>

                  <div class="row book-detail">
                    <div class="col-sm-4">
                    <label for="country">Country</label>
                    </div>
                    <div class="col-sm-8">
                    <input type="text" class="form-control country" name="country">
                    </div>
                  </div>
                </div><!--others-->
                
                <div class="indian">
                  <div class="row book-detail">
                    <div class="col-sm-4">
                      <label for="pin_code">PIN Code</label>
                    </div>
                    <div class="col-sm-8">
                      

                      <div class="wrapper-radio">
                        <input type="radio" name="select" value="india" id="option-1"  onclick="show1()" checked>
                        <input type="radio" name="select" value="india" id="option-2" onclick="show()">
                              <label for="option-1" class="option option-1">
                                  <div class="dot"></div>
                                  <span>India</span>
                              </label>
                              <label for="option-2" class="option option-2">
                                  <div class="dot"></div>
                                  <span>Others</span>
                              </label>


                        </div><!--wrapper-radio-->

                    </div>
                  </div><!--pin code-->
                  
                  <div class="row book-detail">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-8">
                        <input type="number" class="form-control pin_code" onfocusout="get_details()" name="pin_code" id="pin_code">
                      </div>
                  </div>

                  <div class="row book-detail">
                    <div class="col-sm-4">
                      <label for="city">City</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" id="city" class="form-control city" name="city" placeholder="City" >
                    </div>
                  </div>

                  <div class="row book-detail">
                    <div class="col-sm-4">
                      <label for="state">State</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control state" name="state" id="state" placeholder="State" >
                    </div>
                  </div>
                </div> <!----indian--->
                
                
                
                
                
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="email">E-mail </label>
                  </div>
                  <div class="col-sm-8">
                    <input type="email" class="form-control email" name="email" id="email" >
                  </div>
                </div>
                
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="gothra">Gothra </label>
                  </div>
                  <div class="col-sm-8">
                    
                    <input type="text" class="form-control" name="gothra" id="gothra" list="gothra2" >
                      <datalist  id="gothra2"   >
                      <?php
                        foreach($gothra as $key=>$val){																		 
                        ?>
                        <option ><?php echo $val['master_value']; ?> - <?php echo $val['regional_value'];?></option>
                        <?php
                        } 
                        ?>
                      </datalist>
                    
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="comment">Comments</label>
                  </div>
                  <div class="col-sm-8">
                    <textarea name="comment" class="form-control comment" form="usrform" rows="1" cols="5"> </textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="total">Grand Total</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="number" class="form-control gr_total" id="gr_total" name="gr_total" readonly>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="booking_date">Booking Date</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" name="booking_date" class="form-control booking_date" id="booking_date" style="width:75%;" readonly>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="pnr">Booking PNR</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control booking_pnr" id="pnr" name="booking_pnr"  readonly>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="receipt_no">Receipt No</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control receipt_no" id="receipt_no_e" name="receipt_no" readonly>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="status">Status</label>
                  </div>
                  <div class="col-sm-8">
                    <select class="form-control status" id="sel1" name="status" >
                      <option></option>
                      <option value="Confirmed" selected>Confirmed</option>
                      <option>Cancelled</option>
                    </select>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="pan">PAN</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control pan" id="pan" onkeyup="check()" name="pan">
                    <small class="check" style="color:red; display:none;">Please enter Valid PAN</small>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                    <label for="adhar">Aadhar </label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control adhar" id="adhar" onkeyup="checks()" name="adhar" >
                    <small class="checks" style="color:red; display:none;">Please enter Valid Aadhar number (only digits)</small>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                      <label for="sel1">Purpose</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control purpose" id="purpose" name="purpose">
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                      <label for="rashi">Rashi </label>
                  </div>
                  <div class="col-sm-8">
                      <!--<input type="text" class="form-control rashi" id="rashi" name="rashi">-->
                      <input type="text" class="form-control" name="rashi" id="rashi" list="rashi2" >
                  <datalist  id="rashi2"   >
                  <?php
                    foreach($rashi as $key=>$val){																		 
                    ?>
                    <option ><?php echo $val['master_value']; ?> - <?php echo $val['regional_value'];?></option>
                    <?php
                    } 
                    ?>
                  </datalist>
                  </div>
                </div>
                <div class="row book-detail">
                  <div class="col-sm-4">
                      <label for="naksh">Nakshathra </label>
                  </div>
                  <div class="col-sm-8">
                      <!--<input type="text" class="form-control nakshathra" name="nakshathra" id="nakshathra">-->
                      <input type="text" class="form-control" name="nakshathra" id="nakshathra" list="nakshathra2" >
                  <datalist  id="nakshathra2"   >
                  <?php
                    foreach($nakshathra as $key=>$val){																		 
                    ?>
                    <option ><?php echo $val['master_value']; ?> - <?php echo $val['regional_value'];?></option>
                    <?php
                    } 
                    ?>
                  </datalist>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <h4>Seva Details</h4>
          <div class="general-seva-detail">
            <div class="table-responsive" style="border-radius:6px;">
              <table class="table table-bordered" id = "maintable1">
                <thead>
                  <tr>
                    <th style="text-align:center;">Seva Date</th>
                    <!--<th style="text-align:center;">Seva Code</th>-->
                    <th style="text-align:center;">Seva</th>
                    <th style="text-align:center;">Price</th>
                    <th style="text-align:center;">Seva Units</th>
                    <th style="text-align:center;">Amount</th>
                    <th style="text-align:center;">Remarks</th>
                    <th><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></th>
                  </tr>
                </thead>
                <!-- <tbody>
                  <tr>
                    <td><input type="text" class="form-control seva_date" id="seva_date" name="seva_date[]" style="width:100px;"></td>
                    <td><select type="text" autocomplete="on" class="form-control seva_code" name="seva_code[]"  id="seva_code" style="width:100px;" onfocusout="checkcode()" ><option></option></select></td>
                    <td><select type="text" autocomplete="on" class="form-control seva_name" name="seva_name[]"  id="seva_name" style="width:100px;" onfocusout="checksevaname()" ><option></option></select></td>
                    <td><input type="number" class="form-control price" name="price[]" style="width:80px;"></td>
                    <td><input type="text" class="form-control seva_units" id="seva_units" name="seva_units[]"  style="width:80px;" ></td>
                    <td><input type="number" class="form-control amount" id="amount" name="amount[]" style="width:80px;" readonly></td>
                    <td><input type="text" class="form-control remark" name="remark[]" style="width:80px;" ></td>
                    <td><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></td>
                  </tr>
                </tbody> -->
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-10">
              
            </div>
            <div class="col-sm-1" style="padding:0;">
                 <div class="seva-submission paymode" style="display:none;float:right;">
                    <button type="button" class="btn btn-primary calculation_modal">Pay</button>               
                </div>
            </div>
            <div class="col-sm-1">
                <button type="button" onclick="goBack()" class="btn btn-primary float-right">Cancel</button>
            </div>
          </div>


          <div class="modal" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header" style="background-color:#F39309!important;color:#fff!important;">
                    <h3 class="modal-title1">Payment Details</h3>
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
                            <input type="number" class="form-control total_amount" id="total_amount" name="total_amount" readonly>
                          </div>
                        </div><!--row-->

                        <div class="row mt-3">
                          <div class="col-sm-6">
                            <label>Payment Method</label>
                          </div>
                          <div class="col-sm-6">
                            <!--<select class="form-control payment_mode"  name="payment_mode" style="width: 75%;">	-->
                                                            
                            <!--  <option >Cheque</option>-->
                            <!--  <option selected>Cash</option>-->
                            <!--  <option>NEFT</option>-->
                            <!--  <option>UPI</option>-->
                            
                            <!--</select>-->
                            <select class="form-control payment_mode"  name="payment_mode">
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
                            <input type="text" class="form-control details" name="details">
                          </div>
                        </div><!--row-->

                      </div>

                      <div class="col-sm-6">

                        <div class="row">
                          <div class="col-sm-6">
                            <label>Amount Paid</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" class="form-control amount_paid" id="amount_paid" name="amount_paid">
                          </div>
                        </div><!--row-->

                        <div class="row mt-3">
                          <div class="col-sm-6">
                            <label>Balance Amount</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" class="form-control balance_amount" id="balance_amount" name="balance_amount" value="0" readonly>
                          </div>
                        </div><!--row-->

                        <div class="row mt-3">
                          <div class="col-sm-6">
                            <label>Received By</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" value="<?php echo $sname; ?>" class="form-control received_by" name="received_by">
                          </div>
                        </div><!--row-->
                        
                        
                      </div>
                    </div>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer" id="printappend" >
                    <button type="submit" class="btn btn-primary save"  >Save</button>
                    <!-- <button type="button" class="btn btn-primary" >Print</button> -->
                    <!-- <a href="<?php echo base_url('GeneralBooking/print');?>" class=" btn btn-primary print">Print</a> -->
                  </div>
                  
                </div>
              </div>
            </div><!--modal-->


        </form>  

    </div>


      
 
   
  </div> <!--content-wrapper-->

</div> <!--wrapper---> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript">

 $(".others").hide();
    function show(){
      $(".indian").hide();
      $(".others").show();
    }
    function show1(){
      $(".indian").show();
      $(".others").hide();
     
    }
function vald(){
  var c=$('#name').val();
  var letters=/^[a-zA-z]+([\s][a-zA-Z]+)*$/;
  if(c.match(letters)){
    $('.vald').hide();
  }else{
    $('.vald').show();
  }
}
function check(){
		var g=$('#pan').val();
		var valpan=/[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
		if(g.match(valpan)){
			$('.check').hide();
		}else{
			$('.check').show();
		}
	}
	function checks(){
		var k=$('#adhar').val();
		var valdhar=/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
		if(k.match(valdhar)){
			$('.checks').hide();
		}else{
			$('.checks').show();
		}
	}
    
   $(".validation").hide();
    function validation() {

      var phone = $('#mobile_number').val();
      if(phone.length==10) {
          $(".validation").hide();

      }
      else {
          $(".validation").show();
      }
    }
        
function get_details(){
	var pincode = $('#pin_code').val();
	if(pincode == ''){
		$('#city').val(' ');
		$('#state').val(' ');
	}else{
		$.ajax({
			type : "POST",
			url : '<?php echo base_url("GeneralBooking/getcityState") ?>',
			data : {pincode:pincode},
			success:function(response){
				if(response=='no'){
					toastr.error('Wrong pincode! please enter correct pin');
					$('#city').val(' ');
					$('#state').val(' ');
				}else{
					var getData = $.parseJSON(response);
					console.log(response);
					$('#city').val(getData.city);
					$('#state').val(getData.state);
				}
			}
		});
	}
}
</script>


<script type="text/javascript">

  function goBack() {
		location.href = '<?php echo base_url("GeneralBooking")?>';
	}
  $(document).ready(function(){
    let count = Number(localStorage.getItem('count')) || 0;
    // alert(`count ${count}`);
    localStorage.setItem('count', count + 1);
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear(); 
    document.getElementById("booking_date").value = date;

  // -------------------------------random booking_pnr--------------------
  var random1 = Math.floor(Math.random()*1000*1000);
  
  var random = Math.floor(new Date().valueOf() * Math.random());
  var year = today.getFullYear();
  var value="<?php echo $prefix ?>";
  var ab = value+"-"+year+"/"+random1;

//   alert(ab);
  $('.booking_pnr').val(random);
  $('#receipt_no_e').val(ab);
  addrow();
});
  function checkmobile(){

    var mobile = $("#mobile_number").val();
    
    $.ajax({

      type : "POST",
      url : '<?php echo base_url("GeneralBooking/check_mobile") ?>',
      data : {mobile:mobile},

      success:function(response){

        response=jQuery.parseJSON(response);
        console.log(response);
        if(response.result==1){
         $("#name").val(response.message.name);
          for(var i=0; i<response.message.length; i++){
            var mode='';
            mode += '<option>'+response.message[i].name+'</option>';
            $('#names').append(mode);
          }
        }
        else {
        //   toastr["error"](response.message);
        }

      }

    });

  }
  
  function checkname(){

    var name = $("#name").val();
    var mobile_number = $('#mobile_number').val(); 
    // alert(name);

    $.ajax({

      type : "POST",
      url : '<?php echo base_url("GeneralBooking/check_name") ?>',
      data : {name:name,mobile_number:mobile_number},

      success:function(response){
        response=jQuery.parseJSON(response);
        console.log(response);

        if(response.result== 1){
         $(".address1").val(response.message.address1);
         $(".address2").val(response.message.address2);
         $(".city").val(response.message.city);
         $(".pin_code").val(response.message.pin_code);
         $(".state").val(response.message.state);
         $(".email").val(response.message.email);
        //  $(".comment").val(response.message.comment);
        //  $(".booking_date").val(response.message.booking_date);
         $(".status :selected").text(response.message.status);
         $(".pan").val(response.message.pan);
         $(".adhar").val(response.message.adhar);
         $(".purpose").val(response.message.purpose);
         $("#gothra").val(response.message.gothra);
         $("#rashi").val(response.message.rashi);
         $("#nakshathra").val(response.message.nakshathra);
        }
        else {
        //   toastr["error"](response.message);
        }  
      }
    });
  }
  
  
   $("#mobile_number").autocomplete({
  source: function(request, response) {
      $.ajax({
      url: '<?php echo base_url("GeneralBooking/auto") ?>',
      data: {
              term1 : request.term
        },
      dataType: "json",
      success: function(data){
        // console.log(data);
          var resp = $.map(data,function(obj){
              return obj.mobile_number;
          }); 
        //   console.log(resp);
          response(resp);
      }
  });
  },
  minLength: 1
  });


//   $("#gothra").autocomplete({
//   source: function(request, response) {
//       $.ajax({
//       url: '<?php echo base_url("GeneralBooking/auto") ?>',
//       data: {
//               term1 : request.term
//         },
//       dataType: "json",
//       success: function(data){
//           var resp = $.map(data,function(obj){
//               return obj.gothra;
//           }); 

//           response(resp);
//       }
//   });
//   },
//   minLength: 1
//   });
//   $("#purpose").autocomplete({
//   source: function(request, response) {
//       $.ajax({
//       url: '<?php echo base_url("GeneralBooking/auto") ?>',
//       data: {
//               term4 : request.term
//         },
//       dataType: "json",
//       success: function(data){
//           var resp = $.map(data,function(obj){
//               return obj.purpose;
//           }); 

//           response(resp);
//       }
//   });
//   },
//   minLength: 1
//   });
//   $("#rashi").autocomplete({
//   source: function(request, response) {
//       $.ajax({
//       url: '<?php echo base_url("GeneralBooking/auto") ?>',
//       data: {
//               term2 : request.term
//         },
//       dataType: "json",
//       success: function(data){
//           var resp = $.map(data,function(obj){
//               return obj.rashi;
//           }); 

//           response(resp);
//       }
//   });
//   },
//   minLength: 1
//   });
//   $("#nakshathra").autocomplete({
//   source: function(request, response) {
//       $.ajax({
//       url: '<?php echo base_url("GeneralBooking/auto") ?>',
//       data: {
//               term3 : request.term
//         },
//       dataType: "json",
//       success: function(data){
//           var resp = $.map(data,function(obj){
//               return obj.nakshathra;
//           }); 

//           response(resp);
//       }
//   });
//   },
//   minLength: 1
//   });
//   $("#city").autocomplete({
//   source: function(request, response) {
//       $.ajax({
//       url: '<?php echo base_url("GeneralBooking/auto") ?>',
//       data: {
//               term5 : request.term
//         },
//       dataType: "json",
//       success: function(data){
//           var resp = $.map(data,function(obj){
//               return obj.city;
//           }); 

//           response(resp);
//       }
//   });
//   },
//   minLength: 1
//   });

  $(".add_more_button1").click(function(){
    addrow();
  });
  

  
  
 

  function addrow(){

    var insert_id =  $("#insert_id").val();   
    insert_id = parseFloat(insert_id) + 1;

    // var count = '';
    // for(var i=0; i<insert_id ; i++){
    //   count++;
    // }
    // alert(count);
    
    $("#insert_id").val(insert_id);
    // var sevacode = "seva_code"+insert_id;
    // var sevacode_new = "seva_code_new"+insert_id;
    var sevadate = "seva_date"+insert_id;
    var seva_id = "seva_id"+insert_id;
    var sevaname = "seva_name"+insert_id;
    var sevaname_new = "seva_name_new"+insert_id;
    var price = "price"+insert_id;
    var sevaunits = "seva_units"+insert_id;
    var remarks = "remark"+insert_id;
    var amount = "amount"+insert_id;
    var sp_id = "sp_id"+insert_id;

    var mode = '';
    mode += '<tr class="trappend">';
    mode += '<td style="width:50px;"><input type="text" class="form-control seva_date" name="seva_date[]" id='+sevadate+'  style="width:110px;"><input type="hidden" class="form-control seva_id" name="seva_id[]" id='+seva_id+'  ></td>';
 
   // mode += '<td><select type="text" class="form-control seva_codes" name="seva_code[]"  id='+sevacode+' style="width:100px;"><option></option></select></td>';
//   mode += '<td><input  name="seva_code[]"  id='+sevacode_new+' type="text" class="form-control"  list='+sevacode+'>';
//   mode += '<datalist  id='+sevacode+' name='+sevacode+'> </datalist>';
//   mode += '</td>';

   mode += '<td><input name="seva_name[]" id='+sevaname_new+' type="text" class="form-control a" onfocusout="get_amount('+insert_id+')"  list='+sevaname+' style="" readonly><i onclick="clean('+insert_id+')" class="fa fa-times" aria-hidden="true" style="float:right; margin-top: -22px; color:#ee6304;cursor: pointer;"></i>';
   mode += '<datalist  id='+sevaname+' >  </datalist>';
   mode += '</td>';
    //mode += '<td>'+$(".list_data").show()+'</td>';

    // mode += '<td><select type="text" class="form-control seva_names" name="seva_name[]"  id='+sevaname+' style="width:100px;"><option></option></select></td>';
    mode += '<td><input type="number" class="form-control prices" name="price[]" id='+price+' style="width:80px;" readonly></td>';
    mode += '<td><input type="text" class="form-control seva_unit" id='+sevaunits+' name="seva_units[]" style="width:45px;" readonly></td>';
    mode += '<td><input type="number" class="form-control amounts" id='+amount+' name="amount[]" style="width:80px;" readonly > <input type="hidden" name="sp_id[]" id='+sp_id+'></td>';
    mode += '<td><input type="text" class="form-control remarks" id='+remarks+' name="remark[]" style="width:220px;"  ></td>';
    mode += '<td><button  type="button" class="glyphicon glyphicon-minus remove "><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';
    mode += '</tr>';

    $("#maintable1").append(mode).fadeIn('slow');
    document.querySelector(".paymode").style.display = "none";

    $(".remove").click(function(){
      $(this).closest('tr').remove(); 
        var insert_id =  $("#insert_id").val();  
        if(insert_id >= 1){
            insert_id = parseFloat(insert_id) - 1;
            $("#insert_id").val(insert_id);
        }
         alert(insert_id);
        if(insert_id == 0){
         document.querySelector(".paymode").style.display = "none";
        }
        
        
    });

    // if ($('#maintable1').hasClass('trappend')) {

    // document.querySelector(".paymode").style.display = "block";
      
    // }
    // else {
    //     document.querySelector(".paymode").style.display = "";
    // }
    var pay = $('#amount'+insert_id).val(); 
   
    if(pay!==''){
      document.querySelector(".paymode").style.display = "block";
    }
    
  
    
    
   
    
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
     // alert(seva_date);

      $.ajax({ 
        type : "POST",
        url : '<?php echo base_url("GeneralBooking/check_codes") ?>',
        data : {seva_date:seva_date},
        success:function(response){
          response=jQuery.parseJSON(response);

          console.log(response);
          if(response.result==1){
            // if(count==1)
            // {
            //   count++;
            // var mode='';
            var mode1='';
            $('#seva_name_new'+insert_id).removeAttr('readonly'); 

              // $('#seva_code_new'+id).empty();
              $('#seva_name_new'+id).empty();
              // $('#seva_code'+id).empty();
              $('#seva_name'+id).empty(); 
              //mode += '<datalist  id="main_seva" name="main_seva"  >';
              
              for(var i=0; i<response.message.length; i++){                                     
                  // mode += '<option>'+response.message[i].seva_code+' / '+response.message[i].seva_name+'</option>';
                  mode1 += '<option>'+response.message[i].seva_code+' - '+response.message[i].seva_name+'</option>'; 
                  // $('#seva_code'+id).append(mode); 
                  // $('#seva_name'+id).append(mode1);  

                  // $('#seva_date'+id).click(function(){
                  //   $('#seva_code'+id).empty();
                  // });

                } 
                $('#seva_name'+id).append(mode1);
          }
          else {
            toastr["error"](response.message);
            
          }
        }
      });
    }


  }

 function clean(insert_id){

    var work = 'seva_name_new'+insert_id;   
    var seva_name = $('#'+work).val(' '); 
    var price = "price"+insert_id;
    var price1 = $('#'+price).val(' '); 
    var sevaunits = "seva_units"+insert_id;
    var sevaunits1 = $('#'+sevaunits).val(' '); 
    var amount = "amount"+insert_id;
    var amount1 = $('#'+amount).val(' '); 



    document.querySelector(".clean") = seva_name ;  
    document.querySelector(".clean") = price1 ; 
    document.querySelector(".clean") = sevaunits1 ;
    document.querySelector(".clean") = amount1 ; 

   document.querySelector(".paymode").style.display = "none";


  }
    
	  


  function get_amount(insert_id){

    // var sevaname_new = 'seva_name_new'+insert_id;
    var work = 'seva_name_new'+insert_id;   
    var seva_name = $('#'+work).val();   
    var date = 'seva_date'+insert_id; 
    var seva_date = $('#'+date).val();
    
		//alert(seva_name);
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

            document.querySelector(".paymode").style.display = "block";
            $('#seva_id'+insert_id).val(response.seva_id);
					
          $('#price'+insert_id).val(response.msg.amount);
          $('#amount'+insert_id).attr('readonly','readonly');          
          $('#sp_id'+insert_id).val(response.sp_id.id);         

          if(response.enableamount == '0' && response.work == '0'){

            document.getElementById('seva_units'+insert_id).value = '1';
            $('#price'+insert_id).attr('readonly','readonly');
            $('#seva_units'+insert_id).attr('readonly','readonly');	

            var seva_units = $('#seva_units'+insert_id).val();	
            var price = $('#price'+insert_id).val();
            var amount = (seva_units*price);
            document.getElementById('amount'+insert_id).value = amount;	
            // $('#seva_id'+insert_id).val((response.seva_id);

          }
          else if(response.work == '0' ){
            
            $('#price'+insert_id).removeAttr('readonly');

            // $('#price'+insert_id).attr('readonly','readonly');
            $('#seva_units'+insert_id).attr('readonly','readonly');		
            document.getElementById('seva_units'+insert_id).value = '1';
            var seva_units = $('#seva_units'+insert_id).val();	
            var price = $('#price'+insert_id).val();
            var amount = (seva_units*price);
            document.getElementById('amount'+insert_id).value = amount;	
            // $('#seva_id'+insert_id).val((response.seva_id);

            $('#price'+insert_id).keyup(function(){
              var seva_units = $('#seva_units'+insert_id).val();
              var price = $('#price'+insert_id).val();
              var amount = (seva_units*price);
              document.getElementById('amount'+insert_id).value = amount;	
            });
            }
          
          else if(response.work == '1' && response.enableamount == '1'){

            $('#price'+insert_id).removeAttr('readonly');
            $('#seva_units'+insert_id).removeAttr('readonly');
            // $('#seva_id'+insert_id).val((response.seva_id);
            

            document.getElementById('seva_units'+insert_id).value = '1';
            var seva_units = $('#seva_units'+insert_id).val();	
            var price = $('#price'+insert_id).val();
            var amount = (seva_units*price);
            document.getElementById('amount'+insert_id).value = amount;	

            $('#seva_units'+insert_id).keyup(function(){
              var seva_units = $('#seva_units'+insert_id).val();
              var price = $('#price'+insert_id).val();
              var amount = (seva_units*price);
              document.getElementById('amount'+insert_id).value = amount;	
            });  

            $('#price'+insert_id).keyup(function(){
              var seva_units = $('#seva_units'+insert_id).val();
              var price = $('#price'+insert_id).val();
              var amount = (seva_units*price);
              document.getElementById('amount'+insert_id).value = amount;	
            });

          }
         
          else{
            $('#price'+insert_id).attr('readonly','readonly');
            $('#seva_units'+insert_id).removeAttr('readonly');


            document.getElementById('seva_units'+insert_id).value = '1';
						var seva_units = $('#seva_units'+insert_id).val();
            var price = $('#price'+insert_id).val();
            var amount = (seva_units*price);           
            document.getElementById('amount'+insert_id).value = amount;	
            // alert(amount);
            $('#seva_units'+insert_id).keyup(function(){
              var seva_units = $('#seva_units'+insert_id).val();
              var price = $('#price'+insert_id).val();
              var amount = (seva_units*price);
              document.getElementById('amount'+insert_id).value = amount;	
            });          

					}
				}
				else {
				    toastr["error"](response.message);
				    //toastr["error"]('hello');
				    document.querySelector(".paymode").style.display = "none";
				}  
			}
		});
  }


    
  $(document).ready(function(){

    $(".calculation_modal").click(function(){
      var total_amount = 0;
      // var i = 0;
      sum = 0;
      $('.amounts').each(function() {
              if($(this).val()){
                sum += parseFloat($(this).val()); 
            }
      });
      $(".gr_total").val(sum);
      $(".total_amount").val(sum);
      $(".amount_paid").val(sum);
      $("#myModal").modal("show");    

    });

    $('#general').submit(function(e){
      e.preventDefault();
      var value="<?php echo $temple_details[0]['receipt_number_prefix'] ?>";
      var address1 = $('.address1').val();
      var address2 = $('.address2').val();
      var comment = $('.comment').val();
      // var city = $('#city').val();
	    // var state = $('#state').val();

      var formData= new FormData(this);

      // alert(formData);

      formData.append('address1',address1);
      formData.append('address2',address2);
      formData.append('comment',comment);
      // formData.append('city',city);
	    // formData.append('state',state);
      // formData.append('value',value);
      var s = $(".vald").is(":hidden");
      var n = $(".validation").is(":hidden");
      var r = $(".check").is(":hidden");
      var t = $(".checks").is(":hidden");
      if((s) && (n) && (r) && (t)){
        $.ajax({
          type : "POST",
          url : '<?php echo site_url("GeneralBooking/contact") ?>',
          data : formData,
          
          contentType: false,
          processData: false,

          success:function(response){

            response = jQuery.parseJSON(response);


            if(response.result==1){ 

              console.log(response.msg);
              toastr["success"](response.message);   

                    
              $("#general").trigger("reset"); 
              // window.location.href="<?php echo site_url('GeneralBooking') ?>"; 

              var ids = response.msg;

              $('#printappend').append('<button type="button" id="print" class="btn btn-primary" onclick="generate('+ids+')">Print</button>');
              location.href = '<?php echo base_url("GeneralBooking")?>';

                    
            }
            else 
            {
                  
              toastr["error"](response.message);            
                          
            }

          }

        });
      }
      else{
				toastr.error('please enter correct data');
      }
    });
  });

  function generate(ids){

    //alert(ids);

    window.open('<?php echo site_url("GeneralBooking/print")?>?id='+ids+'');
    window.location.href="<?php echo site_url('GeneralBooking') ?>"; 
  }

</script>

<!-- -------------------------for payment details (model popup)------------------------------------------- -->

<script>

  var total_amount = $('.total_amount').val();
  var amount_paid = $('.amount_paid').val();
  var balance_amount = ((total_amount) - (amount_paid));

  $('.amount_paid').keyup(function(){
    var total_amount = $('.total_amount').val();
    var amount_paid = $('.amount_paid').val();
    var balance_amount = ((total_amount) - (amount_paid));
    
    document.getElementById('balance_amount').value = balance_amount;
  });

</script>

<style type="text/css">
  .wrapper-radio{
  display: inline-flex;
 /* background: #fff;*/
  /*height: 100px;
  width: 400px;*/
  align-items: center;
  justify-content: space-evenly;
  border-radius: 5px;
 /* padding: 20px 15px;
  box-shadow: 5px 5px 30px rgba(0,0,0,0.2);*/
}
.wrapper-radio .option{
  background: #fff;
 /* height: 100%;
  width: 100%;*/
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  margin: 0 10px;
  border-radius: 5px;
  cursor: pointer;
/*  padding: 0 8px;*/
  padding: 0 5px;
  border: 2px solid lightgrey;
  transition: all 0.3s ease;
}
.wrapper-radio .option .dot{
 /* height: 20px;
  width: 20px;*/
  height: 15px;
  width: 15px;
  background: #d9d9d9;
  border-radius: 50%;
  position: relative;
}
.wrapper-radio .option .dot::before{
  position: absolute;
  content: "";
  top: 4px;
  left: 3px;
  width: 8px;
  height: 8px;
  background: #F39309;
  border-radius: 50%;
  opacity: 0;
  transform: scale(1.5);
  transition: all 0.3s ease;
}
input[type="radio"]{
  display: none;
}
#option-1:checked:checked ~ .option-1,
#option-2:checked:checked ~ .option-2{
  border-color: #F39309;
  background: #F39309;
}
#option-1:checked:checked ~ .option-1 .dot,
#option-2:checked:checked ~ .option-2 .dot{
  background: #fff;
}
#option-1:checked:checked ~ .option-1 .dot::before,
#option-2:checked:checked ~ .option-2 .dot::before{
  opacity: 1;
  transform: scale(1);
}
.wrapper-radio .option span{
  font-size: 15px;
  color: #808080;
}
#option-1:checked:checked ~ .option-1 span,
#option-2:checked:checked ~ .option-2 span{
  color: #fff;
}

</style>



<?php
  echo view('includes/footer');
?>