
 <?php
    echo view('includes/header',$temple_details, $rel);

?>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/seva.css');?>" />


    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">        
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Seva</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                <li class="breadcrumb-item active">Add Seva</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="Seva-add" style="margin: 20px;">
       <form class="add_form"  id = "add_seva_details"> 


        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">

              <div class="row" style="padding-bottom: 15px;">
                <div class="col-sm-4">
                  <label>Seva Code <span style="color:red">*</span></label>
                </div>

                <div class="col-sm-8">
    
                  <input type="text" class="form-control seva_code" name="seva_code" onfocusout="checkseva()" required>
                </div>
              </div> <!--row   value ="<?php  echo  $seva_code;?>" readonly--> 

              <div class="row" style="padding-bottom: 15px;">
                  <div class="col-sm-4">
                     <label>Seva Name <span style="color:red">*</span></label>
                  </div>
                  <div class="col-sm-8">
                     <input type="text" class="form-control seva_name" name="seva_name" onfocusout="checkseva()" required>
                  </div>
              </div> <!--row-->

              <div class="row" style="padding-bottom: 15px;">
                  <div class="col-sm-4">
                     <label>Regional Name</label>
                  </div>
                  <div class="col-sm-8">
                     <input type="text" class="form-control regional_value" name="regional_value">
                  </div>
               </div> <!--row-->

               <div class="row" style="padding-bottom: 15px;">
                  <div class="col-sm-4">
                     <label>Description</label>
                  </div>
                  <div class="col-sm-8">
                     <input type="text" class="form-control description" name="description">
                  </div>
               </div> <!--row-->

               <div class="row" style="padding-bottom: 15px;">
                  <div class="col-sm-4">
                     <label>Type <span style="color:red">*</span></label>
                  </div>
                  <div class="col-sm-8">
                     <select class="form-control type" id="type" name="type" required>
                       <!--<option value = 'General' selected>General</option>-->
                       <!--<option value = 'Endowment'>Endowment</option>-->
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
                       <label>Booking Open Date</label>
                    </div>

                    <div class="col-sm-8">
                       <input type="text" id="booking_start" class="form-control booking_start" value="01-01-2020" name="booking_start" style="width: 75%;"/>
                    </div>
                 </div>  <!--row-->  

                 <div class="row" style="padding-bottom: 15px;">
                    <div class="col-sm-4">
                       <label>Booking End Date</label>
                    </div>
                    <div class="col-sm-8">
                       <input type="text" id="booking_end" class="form-control booking_end" value="01-01-2030" name="booking_end" style="width: 75%;"/>
                    </div>
                 </div>   <!--row-->  

                  <div class="row" style="padding-bottom: 15px;">
                    <div class="col-sm-4">
                       <label>Status <span style="color:red">*</span></label>
                    </div>
                    <div class="col-sm-8">
                       <select class="form-control status" id="status" name="status" required>
                         <option value = "-1">Draft</option>
                         <option value = "1" selected>Open</option>
                         <option value = "0">Disabled</option>
                       </select>
                    </div>
                 </div>  <!--row--> 

                  <div class="row" style="padding-bottom: 15px;">
                    <div class="col-sm-4" >
                       <label class="acc" style="width:166px;">Account Reference Code</label>
                    </div>
                    <div class="col-sm-8">
                       <input type="text" class="form-control a_r_code" name="a_r_code">
                    </div>
                 </div> 
                 <div class="row" style="padding-bottom: 15px;">
                    <div class="col-sm-4" >
                       <label class="special" style="width:134px;">Special instructions</label>
                    </div>
                    <div class="col-sm-8">
                       <input type="text" class="form-control s_instructions" name="s_instructions">
                    </div>
                  </div>  <!--row--> 
               </div>
            </div>

          <div class="col-sm-6">
            <div class="form-group">


            <!--<div class="row" style="padding-bottom: 15px;">-->
            <!--      <div class="col-sm-4">-->
            <!--         <label>Seva Enable</label>-->
            <!--      </div>-->
            <!--      <div class="col-sm-8">-->
                       <!--<div class="form-check">
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio1" name="seva_enable" value = "1"  >Yes
                          </label>
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio2" name="seva_enable" value = "0"  checked>No
                          </label>
                      </div>-->
                      <!--<div class="wrapper-radio">-->
                      <!--   <input type="radio" name="seva_enable" id="option-1" value = "1" >-->
                      <!--   <input type="radio" name="seva_enable" id="option-2" value = "0" checked>-->
                      <!--        <label for="option-1" class="option option-1">-->
                      <!--            <div class="dot"></div>-->
                      <!--            <span>Yes</span>-->
                      <!--        </label>-->
                      <!--         <label for="option-2" class="option option-2">-->
                      <!--            <div class="dot"></div>-->
                      <!--            <span>No</span>-->
                      <!--         </label>-->
                      <!--  </div>-->
               <!--   </div>-->
               <!--</div>-->
              
              <div class="row" style="padding-bottom: 15px;">
                  <div class="col-sm-4">
                     <label>Enable Units</label>
                  </div>
                  <div class="col-sm-8">
                       <!--<div class="form-check">
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio1" name="enable_units" value = "1"  >Yes
                          </label>
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio2" name="enable_units" value = "0"  checked>No
                          </label>
                      </div>-->
                      <div class="wrapper-radio-a">
                         <input type="radio" name="enable_units" id="option-3" value = "1">
                         <input type="radio" name="enable_units" id="option-4" value = "0" checked>
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
                  <div class="col-sm-4">
                     <label>Enable Amount</label>
                  </div>
                  <div class="col-sm-8">
                     <!--<div class="form-check">
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio3" name="enable_amount"  value = "1" >Yes
                          </label>
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio4" name="enable_amount" value = "0"  checked>No
                          </label>
                      </div>-->
                       <div class="wrapper-radio-b">
                         <input type="radio" name="enable_amount" id="option-5" value = "1">
                         <input type="radio" name="enable_amount" id="option-6" value = "0" checked>
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
                    <div class="col-sm-4">
                       <label class="enable-on" style="width:153px;">Enable online Booking</label>
                    </div>
                    <div class="col-sm-8">
                         <!--<div class="form-check">
                            <label class="form-check-label" for="radio1" id="seva-radio">
                              <input type="radio" class="form-check-input" id="radio5" name="online_booking" value = "1"  checked>Yes
                            </label>
                            <label class="form-check-label" for="radio1" id="seva-radio">
                              <input type="radio" class="form-check-input" id="radio6" name="online_booking" value = "0" >No
                            </label>
                        </div>-->
                         <div class="wrapper-radio-c">
                         <input type="radio" name="online_booking" id="option-7" value = "1" checked>
                         <input type="radio" name="online_booking" id="option-8" value = "0">
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
                      <div class="col-sm-4">
                         <label>SMS Required</label>
                      </div>
                      <div class="col-sm-8">
                       <!--<div class="form-check">
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio7" name="sms_required" value = "1"  checked>Yes
                          </label>
                          <label class="form-check-label" for="radio1" id="seva-radio">
                            <input type="radio" class="form-check-input" id="radio8" name="sms_required"  value = "0" >No
                          </label>
                      </div>-->
                       <div class="wrapper-radio-d">
                         <input type="radio" name="sms_required" id="option-9" value = "1" checked>
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
                      <div class="col-sm-4">
                         <label class="rem" style="width:132px;">Reminder Required</label>
                      </div>
                      <div class="col-sm-8">
                        <!--<div class="form-check">
                            <label class="form-check-label" for="radio1" id="seva-radio" >
                              <input type="radio" class="form-check-input" id="radio9" name = "reminder_required" value = "1"  checked>Yes
                            </label>
                            <label class="form-check-label" for="radio1" id="seva-radio">
                              <input type="radio" class="form-check-input" id="radio10" name = "reminder_required" value = "0"  >No
                            </label>
                        </div>-->
                         <div class="wrapper-radio-e">
                         <input type="radio" name="reminder_required" id="option-11" value = "1" checked>
                         <input type="radio" name="reminder_required" id="option-12" value = "0" >
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
                         <input type="number"  class="form-control" name = "p_d_quota" style="width: 30%;" value="100">
                      </div>
                   </div>

                    <div class="row" style="padding-bottom: 15px;">
                        <div class="col-sm-4">
                           <label> Online Quota</label>
                        </div>
                        <div class="col-sm-8">
                           <input type="number" class="form-control"  style="width: 30%;" name = "o_quota" value="100">
                        </div>
                     </div>

                      <div class="row" style="padding-bottom: 15px;">
                        <div class="col-sm-4">
                           <label>Meals Count</label>
                        </div>
                        <div class="col-sm-8">
                           <input type="number" class="form-control"  style="width: 30%;" name = "m_count" value="0">
                        </div>
                     </div>

                      <div class="row" style="padding-bottom: 15px;">
                        <div class="col-sm-4">
                           <label>Devotees Count</label>
                        </div>
                        <div class="col-sm-8">
                           <input type="number" class="form-control" name="d_count" style="width: 30%;" value="2">
                        </div>
                     </div>


            </div>
          </div>
        </div> <!--row main-->


        <!-- <div class="row" style="padding-bottom: 20px;">
          <div class="col-sm-5">
            <div class="row">
              <div class="col-sm-4">
                <label>Attribute</label>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="">
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="row">
              <div class="col-sm-4">
                <label>Value</label>
              </div>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="">
              </div>
            </div>
          </div>
          <div class="col-sm-2"><button><i class="fa fa-plus" aria-hidden="true"></i></button></div>
        </div> -->

      
        <div class="table-responsive">
          <table class="table table-bordered" id = "maintable1">
            <thead>
              <tr>
                <th>Price Start Date <span style="color:red">*</span></th>
                <th>Price End Date <span style="color:red">*</span></th>
                <th>Amount <span style="color:red">*</span></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" id="amt_open0" class="form-control amt_open" name="amt_open[]"  required /></td>
                <td><input type="text" id="amt_end0" class="form-control amt_end" name="amt_end[]"  required /></td>
                <td><input type="text" class="form-control" name="amt[]"  required ></td>
                <td><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div></br>

        <div class="table-responsive" >
          <table class="table table-bordered" id = "maintable2">
            <thead>
              <tr>
                <th style="text-align : center;">Attribute</th>
                <th style="text-align : center;">Value</th>
                <th></th>
              </tr>
            </thead>
            <tbody >
              <tr>
                <td><input type="text" id="attribute" class="form-control attribute" style="width : 250px;" name="attribute[]"/></td>
                <td><input type="number" id="value" class="form-control value" name="value[]" style="width : 250px;"/>
                <td><button  type="button" class="add_up"><i class="fa fa-plus certify" aria-hidden="true"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div><br>




        

          <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-2">
              
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary center-block add" style="float:left;color:black;margin-top:10px;margin-right:10px;">Submit</button>
               <button type="button" class="btn btn-primary" onclick="goBack()" style="color:black;margin-top:10px;">Cancel</button>
            </div>
          </div>

       </form> 

    </section>

     

      
       

  
    </div><!---content-wrapper----->
   

    <!-- <script type="text/javascript">  
      $(document).ready(function () {
        $('input[id$=tbDate]').datepicker({dateFormat: "dd-mm-yy"});

      });  
     
   </script> -->
<script type="text/javascript">
  $('#booking_start').datepicker({dateFormat: "dd-mm-yy"});
  $('#booking_end').datepicker({dateFormat: "dd-mm-yy"});
  $('.amt_open').datepicker({dateFormat: "dd-mm-yy"});
  $('.amt_end').datepicker({dateFormat: "dd-mm-yy"});

  // function myFunction(count){
  //   //alert('hi');
  //    $('#amt_open'+count).datepicker({dateFormat: "yy-mm-dd"});
  //    $('#amt_end'+count).datepicker({dateFormat: "yy-mm-dd"});
  //    //$("#tbDate1").on("click", function(e){
  //      //$('#tbDate1').datepicker();
  //   //});
  //    //$('#tbDate1').datepicker();
  // }

  function goBack() {
    location.href = '<?php echo base_url("Seva")?>';
  }
  
  function checkseva(){
    // alert('work');

    var seva_code = $('.seva_code').val();
    var seva_name = $('.seva_name').val();

     
    $.ajax({

      type : 'POST',
      url  : '<?php echo base_url("seva/check_seva")?>',
      data : {seva_code:seva_code,seva_name:seva_name},

      // contentType: false,
    	// processData: false,

      success:function(response){
        console.log(response);
        response = jQuery.parseJSON(response);

        if(response.result==1){
          toastr["error"](response.message);
          document.querySelector(".seva_code").style.borderColor = "red";
          document.querySelector(".seva_code").style.backgroundColor  = "#ffe6e6";
          document.querySelector(".seva_name").style.borderColor = "red";
          document.querySelector(".seva_name").style.backgroundColor  = "#ffe6e6";


        }
        else{
          // toastr["success"](response.message);
          document.querySelector(".seva_code").style.borderColor = "green";
          document.querySelector(".seva_code").style.backgroundColor  = "#e6ffe6";
          document.querySelector(".seva_name").style.borderColor = "green";
          document.querySelector(".seva_name").style.backgroundColor  = "#e6ffe6";
        } 


      }
    });


  }


</script>
<script type="text/javascript">
    $(".add_more_button1").click(function(){
      let mode = '';
      
      mode += '<tr>';
      mode += '<td><input type="text" class="form-control amt_open1" name="amt_open[]"  required /></td>';

      mode += '<td><input type="text"  class="form-control amt_end2" name="amt_end[]"  required /></td>';

      mode += '<td><input type="text" class="form-control" name="amt[]"  required ></td>';
      mode += '<td><button  type="button" class="glyphicon glyphicon-plus remove "><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';
      
      
      mode += '</tr>';

     

      $("#maintable1").append(mode).fadeIn('slow');

      $('.amt_open1').datepicker({dateFormat: "dd-mm-yy"});
      $('.amt_end2').datepicker({dateFormat: "dd-mm-yy"});

      $(".remove").click(function(){
        $(this).closest('tr').remove();
      });

     

     

  });
  

  $(".add_up").click(function(){
      var mode = '';
      mode += '<tr>';
      mode += '<td><input type="text" class="form-control" name="attribute[]" style="width : 250px;" ></td>';
      mode += '<td><input type="number" class="form-control" name="value[]" style="width : 250px;" ></td>';
      mode += '<td><button  type="button" class="glyphicon glyphicon-plus sub_down "><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';
      mode += '</tr>';
        $("#maintable2").append(mode).fadeIn('slow');
        $(".sub_down").click(function(){
          $(this).closest('tr').remove();
        });
      });
  $('#add_seva_details').submit(function(e){  
    e.preventDefault();
       
      
        var formdata = new FormData($(this)[0]);
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            $.ajax({

                type   : 'post',
                url    : '<?php echo site_url("Seva/add_seva_details")?>',
                data   : formdata,
                contentType: false,
                processData: false,
                                          
                  success:function(response){
                  response = jQuery.parseJSON(response);
                  console.log(response);

                    
                    if(response.result==1)
                    {  
                        toastr["success"](response.message);
                        console.log(response.msg);
                        $('#add_seva_details').trigger("reset");
                        
                        $('.update').removeAttr("disabled");
                        $(".update").text("Update");   
                        location.href = '<?php echo base_url("Seva")?>';

                    }
                    else 
                    {
                        toastr["error"](response.message);
                        $('.update').removeAttr("disabled");
                        $(".update").text("Update");   
                                      
                    }
                }
           });
  });



</script>

<?php
  echo view('includes/footer');
?>