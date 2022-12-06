
<?php
echo view('includes/header',$temple_details, $endo);
$sname = session()->get('name');
?>

    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">        
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Endowment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                <li class="breadcrumb-item active">Edit Endowment</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="edit-endowment">
       <form class="edit_form edit_pudu_details"  id = "edit_pudu_details"> 
      
            <input type="hidden" class="form-control id" value="<?php echo $info2['id'];?>" name="id" id="id">
            <input type="hidden" class="form-control id" value="<?php echo $info1['id'];?>" name="b_id">

    <!------------------------------------------------------------------------------->
 

    <div class="edit_endo-card">
    <h4 style="margin-left:30px;">Contact Details</h4><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="number" class="mob" style="width:124px;">Mobile Number </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" value="<?php echo $info2['mobile_number'];?>" name="mobile_number" class=" form-control mobile_number" id = "mobile_number" />   
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="name">Name </label>
                    </div>
                    <div class="col-sm-8">

                        <input type="text" class="form-control name" value="<?php echo $info2['name'];?>" id="name" name = "name"  >   
                        <!-- <datalist id="names" >


                        </datalist> -->
                        
                    </div>

                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="address">Address  Line1 </label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="address1" class="form-control address1"  id = "address1" rows="1" cols="5" ><?php echo $info2['address1'];?></textarea>
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="address2">Address Line2 </label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="address2" class="form-control address2"  id = "address2" rows="1" cols="5" ><?php echo $info2['address1'];?></textarea>
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="code">PIN Code</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control pin_code" value="<?php echo $info2['pin_code'];?>" name="pin_code" id= "pin_code">
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="city">City</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control city" value="<?php echo $info2['city'];?>" name="city" id = "city" >
                    </div>
                </div>
                
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="state">State</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control state" value="<?php echo $info2['state'];?>" name="state" id = "state" >
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="country">Country</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control country" value="<?php echo $info2['country'];?>" name="country" id = "country" >
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="email">E-mail </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="email" class="form-control email" value="<?php echo $info2['email'];?>" id="email" name="email" >
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="address">Comments</label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="comment" class="form-control comment" id = "comment"  form="usrform" rows="1" cols="5"><?php echo $info1['comments'];?></textarea>
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
                        <input type="number" name = "g_total" value="<?php echo $info1['seva_price'];?>" id="g_total" class="form-control g_total" readonly >
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="date">Booking Date </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control booking_date" id="booking_date" name = "booking_date" readonly required>
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="pnr">Booking PNR</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control booking_pnr" value="<?php echo $info1['booking_pnr'];?>" id="booking_pnr" name = "booking_pnr" readonly>
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="receipt">Receipt No</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" name = "receipt_no" class="form-control receipt_no" id="receipt_no" readonly>
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="status">Status</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control status" id="status" name="status">

                            <option>Confirmed</option>
                            <option>Cancelled</option>
                            
                        </select>
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="pan">PAN</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name = "pan" value="<?php echo $info2['pan'];?>" class="form-control pan" id="pan">
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                        <label for="adhar">Aadhar</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name = "adhar" value="<?php echo $info2['adhar'];?>" class="form-control adhar" id="adhar">
                    </div>
                </div>
                <div class="row book-detail">
                    <div class="col-sm-4">
                          <label for="purpose">Purpose</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control purpose" id="purpose" name="purpose">
                            <option>Wedding Anniversary</option>
                            <option>Birthday</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div> 

 <!-------------------------------------------------------------------------------->


 <!---------------------------------------------------------------------------------->

   <div class="edit_endo-card1">
    <h4 style="margin-left:30px;">Seva Details</h4><br>
      
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name">In the Name of</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name = "name_of" value="<?php echo $info1['name_of'];?>" class="form-control name_of" id = "name_of">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="gothra">Gothra </label>
                    </div>
                    <div class="col-sm-8">
                        

                            <input type="text" class="form-control" name="gothra" id="gothra" value="<?php echo $info1['gothra']; ?>" list="gothra1">
                            <datalist  id="gothra1"   >
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
    </div> <!--row-->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="rashi">Rashi </label>
                    </div>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="rashi" value="<?php echo $info1['rashi']; ?>" id="rashi" list="rashi1">
            <datalist  id="rashi1"   >
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
            </div>
        </div>
        <div class="col-sm-6">                         
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="nakshathra">Nakshathra </label>
                    </div>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $info1['nakshathra']; ?>" name="nakshathra" id="nakshathra" list="nakshathra1">
            <datalist  id="nakshathra1"   >
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
            </div>
        </div>
    </div>    
</div>    
 <!------------------------------------------------------------------------------------->

 <!------------------------------------------------------------------------------------>

   <div class="edit_endo-card2">
     <h4 style="margin-left:30px;">Seva Date</h4><br>

        <div class="boxes" style="display:flex;">
        <?php
            $h = $info1['seva_date'];
            $searchForValue = '-';
            $stringValue = $h;
            if(strpos($stringValue, $searchForValue) !== false) {
        ?>
            <div class="form-check " id="box_bg1">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="date" id="date" name="optradio" onclick="datee()" checked>Date
                    <img src="../../assets/images/date.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                </label>
            </div>
        <?php
            } else{
        ?>
            <div class="form-check " id="box_bg1">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="date" name="optradio" onclick="datee()" >Date
                    <img src="../../assets/images/date.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                </label>
            </div>
        <?php
            } 
        ?>
        <?php
            $search = '/';
            $For = '-';
            $Value = '\\';
            if((strpos($stringValue, $search) === false) && (strpos($stringValue, $For) === false) && (strpos($stringValue, $Value) === false)) {
        ?>
            <div class="form-check" id="box_bg1">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="festival" id="festival" onclick="festival2()" name="optradio" checked>By Festival
                    <img src="../../assets/images/festival.jpg" class="img-fluid d-block mx-auto" style="width: 20%;float: right;">
                </label>
            </div>
        <?php
            } else{
        ?>
            <div class="form-check" id="box_bg1">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="festival" onclick="festival2()" name="optradio" >By Festival
                    <img src="../../assets/images/festival.jpg" class="img-fluid d-block mx-auto" style="width: 20%;float: right;">
                </label>
            </div>
        <?php
            } 
        ?>
        <!-- <div class="form-check" id="box_bg1">
         <label class="form-check-label" id="seva-label">
             <input type="radio" class="form-check-input" value="others" name="optradio">Others
              <img src="assets/images/others.jpg" class="img-fluid d-block mx-auto" style="width: 18%;float: right;">
          </label>
        </div> -->
        <?php
            // $h = $info1['seva_date'];
            $searchForValue = '\\';
            // $stringValue = $h;
            if(strpos($stringValue, $searchForValue) !== false) {
        ?>
            <div class="form-check" id="box_bg1" style="width:245px;">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="calendar" onclick="simple2()" id="calendar" name="optradio" checked>Simple date by  calender
                    <img src="../../assets/images/calender.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                </label>
            </div>
        <?php
            } else{
        ?>
            <div class="form-check" id="box_bg1" style="width:245px;">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="calendar" onclick="simple2()" name="optradio">Simple date by  calender
                    <img src="../../assets/images/calender.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                </label>
            </div>
        <?php
            } 
        ?>
        <?php
            $searchForValue = '/';
            if(strpos($stringValue, $searchForValue) !== false) {
        ?>
            <div class="form-check" id="box_bg1">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="panchanga" onclick="panchanga2()" id="panchanga" name="optradio" checked>By Panchanga
                    <img src="../../assets/images/panchanga.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                </label>
            </div>
        <?php
            } else{
        ?>
            <div class="form-check" id="box_bg1">
                <label class="form-check-label" id="seva-label">
                    <input type="radio"  class="form-check-input" value="panchanga" onclick="panchanga2()" name="optradio">By Panchanga
                    <img src="../../assets/images/panchanga.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                </label>
            </div>
        <?php
            } 
        ?>
    </div><!--boxes-->


        <div class="row">
            <div class="col-sm-3">
                            
                   

                    
               
            </div>
            <!--col-sm-3-->

            <div class="col-sm-5">
                 
            <div class="row che1">
                <div class="col-12">
                    <div class="form-group">
                        <div class="seva-box-1">
                            
                            <div class="row" style="padding-top: 4%;">
                                    <label>Date</label>
                                <input type="text" name="seva_date" class="form-control seva_date" id="seva_date">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--row-->                                


            <div class="row che2">
                <div class="col-12">
                    <div class="form-group">
                        <div class="seva-box-1">
                            <div class="row" style="padding-top: 4%;">
                                <label>By festival</label>
                                <select class="form-control" id="festival1" name="seva_festival">
                                    <?php
                                        foreach($festival as $key=>$val){																		 
                                    ?>
                                    <option><?php echo $val['master_value']; ?></option>
                                    <?php
                                        } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--row-->



                <div class="row che3">
                    <div class="col-12">
                                <div class="form-group">
                                    <div class="seva-box">
                                        <!-- <div class="form-check" id="box_bg">
                                             <label class="form-check-label" id="seva-label">
                                                 <input type="radio" class="form-check-input" value="calendar" name="optradio">Simple date by  calender
                                                 <img src="assets/images/calender.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                                            </label>
                                         </div> -->
                                        <p style="font-weight: 600;">Simple date by  calender</p>
                                        <div class="row" style="padding-top:12px;">
                                            <div class="col-sm-4">
                                                <p style="margin-bottom: 5px;font-weight: 600;">Month</p>
                                                <select class="form-control" id="month" style="width: 110px;" name="sellist[]">
                                                    <?php
                                                        foreach($month as $key=>$val){																		 
                                                    ?>
                                                    <option><?php echo $val['value']; ?></option>
                                                    <?php
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <p style="margin-bottom: 5px;font-weight: 600;">Week</p>
                                                <select class="form-control" id="week" style="width: 60px;" name="sellist[]">
                                                    <?php
                                                    foreach($week as $key=>$val){																		 
                                                    ?>
                                                    <option><?php echo $val['value']; ?></option>
                                                    <?php
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <p style="margin-bottom: 5px;font-weight: 600;">Day</p>
                                                <select class="form-control" id="day" name="sellist[]">
                                                    <?php
                                                    foreach($day as $key=>$val){																		 
                                                    ?>
                                                    <option><?php echo $val['value']; ?></option>
                                                    <?php
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div><!--row-->

                <div class="row che4">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="seva-box">
                                <!-- <div class="form-check" id="box_bg">
                                     <label class="form-check-label" id="seva-label">
                                         <input type="radio" class="form-check-input" value="panchanga" name="optradio">
                                         
                                            <img src="assets/images/panchanga.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
                                         
                                    </label>
                                 </div> -->
                                 <p style="font-weight: 600;">By Panchanga</p>
                                 <!-- <div class="row" style="padding-top: 6%;">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">  
                                        <select class="form-control" id="sel1" name="sellist1[]">
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div> -->
                                <div class="row" style="padding-top:12px;">
                                    <div class="col-sm-6">
                                        <p style="margin-bottom: 5px;font-weight: 600;">Masa</p>
                                        <select class="form-control" id="masa" name="sellist1[]">
                                            <?php
                                            foreach($masa as $key=>$val){																		 
                                            ?>
                                            <option><?php echo $val['master_value']; ?></option>
                                            <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <p style="margin-bottom: 5px;font-weight: 600;">Paksha</p>
                                        <select class="form-control" id="paksha" name="sellist1[]">
                                            <?php
                                            foreach($paksha as $key=>$val){																		 
                                            ?>
                                            <option><?php echo $val['master_value']; ?></option>
                                            <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p style="margin-bottom: 5px;font-weight: 600;">Nakshatra</p>
                                        <select class="form-control" id="nakshathra2" name="sellist1[]">
                                            <?php
                                            foreach($nakshathra as $key=>$val){																		 
                                            ?>
                                            <option><?php echo $val['master_value']; ?></option>
                                            <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <p style="margin-bottom: 5px;font-weight: 600;">Tithi</p>
                                        <select class="form-control" id="tithi" name="sellist1[]">
                                            <?php
                                            foreach($tithi as $key=>$val){																		 
                                            ?>
                                            <option><?php echo $val['master_value']; ?></option>
                                            <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--col-sm-5-->

            <div class="col-sm-4"></div>

        </div><!--main row--->
</div>
 <!------------------------------------------------------------------------------------>
 
 <!-------------------------------------------------------------------------------------->

<div class="card3">
        <h4 style="margin-left:30px;">Main Seva</h4><br>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="seva">Main Seva</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control main_seva" name="main_seva" value="<?php echo $info1['main_seva'];?>" id="main_seva1" list="main_seva" onfocusout="checkamount()">
                            <datalist  id="main_seva"   >
                            <?php
                                foreach($sevas as $key=>$val){                                                                         
                            ?>
                            <option ><?php echo $val['seva_name']; ?></option>
                            <?php
                                } 
                            ?>
                            </datalist>
                        </div>
                    <!--    <div class="col-sm-2"><button type="button" class="btn"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></button></div> -->
                    </div> <!-- row -->                             
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="seva">Seva Amount</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control seva_amount" name="seva_amount" value="<?php echo $info1['seva_price'];?>" id="seva_amount" >                                                                    
                        </div>
                    </div> <!-- row -->
                </div>  
            </div>
        </div> <!--row-->
            
        <h5 style="font-size: 14px; margin-left:40px;">Sevas Included  </h5>
        <?php
            $z = $info1['seva_include'];
            $searchForValue = ',';
            $stringValue = $z;
            $a=array();
            if(strpos($stringValue, $searchForValue) !== false) {
                $w = explode(",",$z);
        ?>
            <div class="row">
        <?php    
                foreach($subseva as $key=>$val){
                    if(($key%3) == 0){ 
        ?> 
                <div class="" id="seva_include">
                    <ul class="seva-list">
                    <?php
                        } 
                    ?>
                    <?php 
                        $a[] = $val['master_value'];
                        foreach ($w as $value) {
                            if($value === $val['master_value']){    
                    ?>
                                <li style="display:inline;" class="seva-list">
                                    <input type="checkbox" name="seva_include[]" value= "<?php echo $val['master_value']; ?>" checked/><span><?php echo $val['master_value']; ?></span>
                                </li>
                    <?php
                            }
                        }
                    ?>
                    <?php
                        if(($key%3) == 2){
                    ?>
                    </ul>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <?php
                $result = array_diff($a, $w);
                foreach ($result as $v) {
            ?>
                <div class="" id="seva_includes">
                    <ul class="seva-lists">
                        <li style="display:inline;" class="seva-lists">
                            <input type="checkbox" name="seva_include[]" value= "<?php echo $v; ?>" /><?php echo $v; ?>
                        </li>
                    </ul>
                </div>
        <?php
                    }    
            } else {
        ?>
        <div class="row" >
        <?php 
            foreach($subseva as $key=>$val){
                if(($key%3) == 0){ 
        ?>     
          
            <div id="seva_include">
                <ul class="seva-list">
                <?php
                    } 
                ?>
                <?php if($z === $val['master_value']){ ?>
                    <li style="display:inline;" class="seva-list">
                        <input type="checkbox"  name="seva_include[]" value= "<?php echo $val['master_value']; ?>" checked/><?php echo $val['master_value']; ?>
                    </li>
                <?php
                    } else{
                ?>
                    <li style="display:inline;" class="seva-list">
                        <input type="checkbox"  name="seva_include[]" value= "<?php echo $val['master_value']; ?>" /><?php echo $val['master_value']; ?>
                    </li>
                    <?php
                        } 
                    ?>
                    <?php
                        if(($key%3) == 2){
                    ?>
                </ul>
            </div>
            <?php
                    }
                }
            }
            ?>
        </div>

        <!-- <div class="form-check">-->
        <!--  <label class="form-check-label" for="check1" style="float:initial!important;">-->
        <!--    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked> Subseva1-->
        <!--  </label>-->
        <!--</div>-->
        
        <!--<div class="form-check">-->
        <!--  <label class="form-check-label" for="check2" style="float:initial!important;">-->
        <!--    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"> Subseva2-->
        <!--  </label>-->
        <!--</div>-->
        
            
</div>
<!--------------------------------------------------------------------------------------------------->  

<!--------------------------------------------------------------------------------------------------->  
  <div class="edit_endo-card4">
    <h4 style="margin-left:30px;">Payment Details</h4><br>
    
     <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="pay">Payment Mode</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control pay" id="pay" name="payment_mode" style="width: 75%;">
                            <?php
                            foreach($paymentmode as $key=>$val){																		 
                            ?>
                            <option><?php echo $val['master_value']; ?></option>
                            <?php
                            } 
                            ?>
                        </select>
                    </div>
                </div> <!-- row -->
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="date">Date</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text"  id = "payment_date" class="form-control payment_date" name="payment_date" readonly >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name"> Received By</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" value="<?php echo $sname; ?>" class="form-control" id="name" name="crb" >
                        <input type="hidden" class="form-control" name="added_by" value="<?php echo $sname; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="information">Details</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $info1['details'];?>" class="form-control" name="details" id="details">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="grt">Grand Total</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" value="<?php echo $info1['grand_total'];?>" class="form-control g_total1" id="g_total1" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--row-->   
</div>
<!--------------------------------------------------------------------------------------------------->  


<!--------------------------------------------------------------------------------------------------->  
    
 

<!--------------------------------------------------------------------------------------------------->  

<div class="edit_endo-card5">
    <h4 style="margin-left:30px;">Additional Information</h4><br>
    <div class="add-table">
        <table class="table table-bordered" id = "maintable2">
            <thead>
                <tr>
                    <th style="text-align : center;">Relation</th>
                    <th style="text-align : center;">Name</th>
                    <th style="text-align : center;">BirthDay</th>
                    <th style="text-align : center;"><button type="button" class="btn add" ><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></button></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($info3 as $key=>$val){
                        $kt = $key+1;
                        $ac = ($val['birthday']);
                        $ad = strtotime($ac);
                        $birthday = date("d-m-Y",$ad);
                ?> 
                <tr>
                    <td>
                        <select class="form-control" id="sel1<?php echo $kt; ?>" name="relation[]" style="width :300px;">
                            <option>Spouse</option>
                            <option>Children</option>
                            <option>Husband</option>
                            <option>Son</option>
                            <option>Daughter</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="Ai_name[]" value="<?php echo $val['name']; ?>" style="width :300px;">
                    </td>
                    <td>
                        <input type="text" class="form-control date1" value="<?php echo $birthday ?>" name="birthday[]" style="width :300px;">
                    </td>  
                    <td><button  type="button" class="btn remove "><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></button></td>   
                </tr>
                <script>
                    var tm = "<?php echo ($val['relation']); ?>";
                    $('#sel1<?php echo $kt; ?>').val(tm);
                </script> 
                <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>
</div>
        
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary update" style="color:white;margin-top:10px;">Update</button>
                   <button type="button" class="btn btn-primary" onclick="goBack()" style="color:white;margin-top:10px;">Cancel</button>
            </div>
        </div><br><br>
        
        
        <!--<div class="row">
           
            <div class="col-sm-11">
                <button type="submit" class="btn btn-primary update" style="color:white;margin-top:10px;float:right;">Update</button>
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-primary" onclick="goBack()" style="color:white;margin-top:10px;float:right;">Cancel</button>
            </div>
        </div>-->
        
    </form> 

    </section>

     
</div>
      
       

  
</div><!---content-wrapper----->
<script type="text/javascript">
  $('.seva_date').datepicker({dateFormat: "dd-mm-yy"});
  $('.date1').datepicker({dateFormat: "dd-mm-yy"});
  
  function goBack() {
    location.href = '<?php echo base_url("Puduvattu")?>';
  }

  var x = "<?php echo $info2['status']; ?>";
  $('#status').val(x);

  var y = "<?php echo $info1['payment_mode']; ?>";
  $('#pay').val(y);

//   var z = "<?php echo $info2['address1'];?>";
//   $('#address1').val(z);

//   var zz = "<?php echo $info2['address2'];?>";
//   $('#address2').val(zz);

//   var yy = "<?php echo $info1['comments'];?>";
//   $('#comment').val(yy);
  
    $(".add").click(function(){
        var mode = '';
        
        mode += '<tr>';
        mode += '<td><select class="form-control" id="sel1<" name="relation[]" style="width :300px;"><option>Spouse</option><option>Children</option><option>Husband</option><option>Son</option><option>Daughter</option></select></td>';
        mode += '<td><input type="text" class="form-control" name="Ai_name[]" style="width :300px;"></td>';
        mode += '<td><input type="text" class="form-control date2" name="birthday[]" style="width :300px;"></td>';
        mode += '<td><button  type="button" class="btn remove2"><i class="fa fa-minus-square fa-2x" aria-hidden="true"></i></button></td>';
        mode += '</tr>';

        $("#maintable2").append(mode).fadeIn('slow');

        $(".remove2").click(function(){
            $(this).closest('tr').remove();
        });
        
        $('.date2').datepicker({dateFormat: "dd-mm-yy"});
    });
    $(".remove").click(function(){
        $(this).closest('tr').remove();
    });

//   const cars = [];
//     $("input[type=checkbox]").each(function(){
//         cars.push($(this).val());
//     });

            document.querySelector(".che1").style.display = "none";
            document.querySelector(".che2").style.display = "none";
			document.querySelector(".che3").style.display = "none";
			document.querySelector(".che4").style.display = "none";

        function datee(){
        //    alert("hii");
			document.querySelector(".che1").style.display = "block";
            document.querySelector(".che2").style.display = "none";
			document.querySelector(".che3").style.display = "none";
			document.querySelector(".che4").style.display = "none";			
            
        }
		function festival2(){
           
		   document.querySelector(".che1").style.display = "none";
		   document.querySelector(".che2").style.display = "block";
		   document.querySelector(".che3").style.display = "none";
		   document.querySelector(".che4").style.display = "none";		   
		   
	   }
	   function simple2(){
           
		   document.querySelector(".che1").style.display = "none";
		   document.querySelector(".che2").style.display = "none";
		   document.querySelector(".che3").style.display = "block";
		   document.querySelector(".che4").style.display = "none";	   
		   
	   }
	   function panchanga2(){
           
		   document.querySelector(".che1").style.display = "none";
		   document.querySelector(".che2").style.display = "none";
		   document.querySelector(".che3").style.display = "none";
		   document.querySelector(".che4").style.display = "block";		   
		   
	   }
       

if($('#date').is(':checked')) {
    var t = "<?php echo $h ?>";
    $('#seva_date').val(t);
    datee();
}
if($('#festival').is(':checked')) {
    var k = "<?php echo $h ?>";
    $('#festival1').val(k);
    festival2();
}
if($('#calendar').is(':checked')) {
    var q = "<?php $ss = explode("\\",$h); ?>";
    var u = "<?php echo $ss[0]; ?>";
    var s = "<?php echo $ss[1]; ?>";
    var v = "<?php echo $ss[2]; ?>";
    $('#month').val(u);
    $('#week').val(s);
    $('#day').val(v);
    // alert(u);
    simple2();
}
if($('#panchanga').is(':checked')) {
    var m = "<?php echo $h ?>";
    const my = m.split("/");
    var e = my[0];
    var f = my[1];
    var g = my[2];
    var h = my[3];
    $('#masa').val(e);
    $('#paksha').val(f);
    $('#nakshathra2').val(g);
    $('#tithi').val(h);
    panchanga2();
}

// if($('#date').is(":not(:checked)")) { 
//     datee();
// }
function checkamount(){

var seva_name = $("#main_seva1").val();
var seva_date = $("#seva_date").val();
$.ajax({

    type : "POST",
    url : '<?php echo base_url("Puduvattu/check_amount") ?>',
    data : {seva_name:seva_name,seva_date:seva_date},

    success:function(response){
        response=jQuery.parseJSON(response);
        console.log(response);

        if(response.result== 1){

            console.log(response.message);
            console.log(response.msg);
            console.log(response.work);
            
            $("#seva_amount").val(response.msg.amount);                 
            $("#g_total").val(response.msg.amount);
            $("#g_total1").val(response.msg.amount);

            
            if(response.work == '0'){
                $('#seva_amount').attr('readonly','readonly');                      
            }else{
                $('#seva_amount').keyup(function(){
                    var amount = $('#seva_amount').val();
                    document.getElementById("g_total").value = amount;
                    document.getElementById("g_total1").value = amount;
                });

            }
        

        }
        else {
            toastr["error"](response.message);
        }  
    }
});
}

var a = "<?php echo $info1['booking_date'];?>";
var split1 = a.split('-');
var join = [ split1[2], split1[1], split1[0] ].join('-');
$(".booking_date").val(join);

var b = "<?php echo $info1['payment_date'];?>";
var split2 = b.split('-');
var joins = [ split2[2], split2[1], split2[0] ].join('-');
$(".payment_date").val(joins);

$('.edit_form').submit(function(e){  
    e.preventDefault();

    // alert("hello");
        
        var address1 = $('#address1').val();
		var address2 = $('#address2').val();
        var comment = $('#comment').val();
        formdata = new FormData($(this)[0]);
        
        formdata.append('address1',address1);
		formdata.append('address2',address2);
        formdata.append('comment',comment);
        $(".update").text("Updating...");
        $(".update").attr("disabled", true);
        $.ajax({

            type   : 'post',
            url    : '<?php echo site_url("Puduvattu/update_pudu_details")?>',
            data   : formdata,
            contentType: false,
            processData: false,
                                        
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                {  
                    toastr["success"](response.message);
                    $('.update').removeAttr("disabled");
                    $(".update").text("Save");
                    location.href = '<?php echo base_url("Puduvattu")?>';
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
<style>
    /*-------------------------------------edit-endowment-----------------------------------*/
.edit-endowment{
   background-color: #fff;
    padding: 3% 1%;
    margin:2%;
}
.edit-endowment label{
  float: right;
}
.edit-endowment h4{
    color: #007BFF;
    font-weight: 400;
    border-bottom: 1px solid #efefef;
    padding-bottom: 10px;
}
.edit_endo-card{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 2%;
  margin: 1%;
}
.edit_endo-card1{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 2%;
  margin: 1%;
}
.edit_endo-card2{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 2%;
  margin: 1%;
}
.card3{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 2%;
  margin: 1%;
  height:230px;
}
.edit_endo-card4{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 2%;
   margin: 1%;
   margin-left:-8px;
}
.edit_endo-card5{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 2%;
  margin: 1%;
  margin-left:-8px;
}
</style>
<?php
  echo view('includes/footer');
?>