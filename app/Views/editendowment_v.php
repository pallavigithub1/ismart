
 <?php
    echo view('includes/header',$temple_details);

?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/mystyle.css'); ?>" />

    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">        
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit English Calendar for Endowment Bookings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                <li class="breadcrumb-item active">Upload English Dates</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


      <section class="english-dates" style="background-color:#fff;padding: 3% 3%;">

          <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn">Search</button>
              <div id="myDropdown" class="dropdown-content">
                <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                <a href="#">Events</a>
                <a href="#">Panchanga</a>
                <a href="#">English Calender</a>
                <a href="#">Set Year</a>
                <a href="#custom">Custom</a>
                <a href="#support">Support</a>
                <a href="#tools">Tools</a>
              </div>
            </div><!--dropdown-->

             <form>
               <div class="row" style="padding-top:20px;">
                <div class="col-sm-3"></div>
                 <div class="col-sm-3">
                   <div class="form-group">
                      <label for="dropdown">Dropdown 1</label>
                      <select class="form-control" id="dropdown" name="sellist1" style="width:150px;">
                        <option value='0'></option>
                        <option value='1'>Events</option>
                        <option value='2'>Panchanga</option>
                        <option value='3'>English Calender</option>
                      </select>
                    </div>
                 </div>
                 <!-- <div class="col-sm-3">
                   <div class="form-group">
                      <label for="sel1">Panchanga</label>
                      <select class="form-control" id="sel1" name="sellist1">
                        <option>Hindu Panchanga</option>
                        <option>Hindu Panchanga</option>
                        <option>Hindu Panchanga</option>
                      </select>
                    </div>
                 </div> -->
                 <div class="col-sm-3">
                   <div class="form-group">
                      <label for="year">Set Year</label>
                      <select class="form-control" id="year" name="year">
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
                 </div>
                 <div class="col-sm-3"></div>
                 <!-- <div class="col-sm-3">
                   <div class="form-group">
                      <label for="sel1">English Calender</label>
                      <select class="form-control" id="sel1" name="sellist1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
                    </div>
                 </div> -->
               </div>

               <!-- <div class="row">
                 <div class="col-sm-4"></div>
                 <div class="col-sm-4 ">
                   <button type="submit" class="btn btn-primary" style="margin-left:75px;">Submit</button>
                 </div>
                 <div class="col-sm-4"></div>
               </div> -->

             </form> 
              <div class="row" style="padding-top:40px;">
                <form id="editform1">
                  <div class="col-sm-6 m-auto" id="events">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        
                        </thead>
                        <tbody>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
                <form id="editform2">
                  <div class="col-sm-8" id="fests" style="margin-left:10px;">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                       
                        </thead>
                        <tbody>
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
              </div>

              <div class="row" style="padding-top:40px;">
                <form id="editform3">
                  <div class="col-sm-6" id="times" style="margin-left:119px;">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        
                        </thead>
                        <tbody>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
                <div class="col-sm-6"></div>
              </div>

      </section>
     

      
       

  
    </div><!---content-wrapper----->
   

    

<?php
  echo view('includes/footer');
?>

<script type="text/javascript">
$(document).ready(function(){
  $("#events").hide();
  $("#fests").hide();
  $("#times").hide();
});
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
var x = document.getElementById("events");
var y = document.getElementById("fests");
var z = document.getElementById("times");
$('#dropdown').click(function () { 
    if($(this).val() === '1'){
        if(x.style.display === "none") {
            var year = $('#year').val();
            $.ajax({

                url:"<?php echo site_url("EditEndowment/event_fetch")?>",
                type:"POST",
                data:{year:year},
                success:function(response) {
                    response = jQuery.parseJSON(response);
                    console.log(response);
                    if(response.result == 1) 
                    {
                        var mode1 = ''; 
                        mode1 += '<table class="table table-bordered">';             
                        mode1 += '<tr>';
                        mode1 += '<th style="text-align:center; width:130px;">Events List</th>';
                        mode1 += '<th style="text-align:center; width:230px;">English Date</th>';
                        mode1 += '</tr>';
                        for(var i=0; i < response.message.length; i++) {
                        var english_date = response.message[i].english_date; 
                        var split3 = english_date.split('-');
                        var engdate = [ split3[2], split3[1], split3[0] ].join('-');
                        mode1 += '<tr>';
                        mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="event[]" value="'+response.message[i].event+'" style="width:130px;" readonly/></td>';
                        mode1 += '<td style="text-align:center;"><input type="text" class="form-control booking_start" name="booking_start[]" value="'+engdate+'" style="width:230px;"/></td>';
                        mode1 += '</tr>';
                        $('#dropdown').click(function () { 
                            if($(this).val() === '1'){
                            $('#events').empty();
                            }
                        });
                        }
                        var evts = '';
                        mode1 += '</table>';
                        mode1 += '<br><br>';
                        mode1 += '<button type="submit" id="eventbtn" class="btn btn-primary" style="margin-left:245px;">Update</button>';
                        $("#events").append(mode1).fadeIn('slow');
                        $('.booking_start').datepicker({
                          changeMonth: true,
                          changeYear: true,
                          dateFormat: "dd-mm-yy"
                        });
                        $('#editform1').submit(function(e){
                            var formData = new FormData(this);
                            formData.append('year',year);
                            $("#eventbtn").attr('disabled', 'disabled');
                            $("#eventbtn").text("Submitting...");
                            $.ajax({
                                type : "POST",
                                url : '<?php  echo site_url("EditEndowment/edit_event")  ?>',
                                data : formData,
                                contentType: false,
                                processData: false,
                                success:function(response){
                                    response=jQuery.parseJSON(response);
                                    console.log(response);
                                    if(response.result== 1){
                                        toastr["success"](response.message);
                                        $('#form1')[0].reset();
                                        $("#eventbtn").text("Submitted");    
                                        $("#eventbtn").removeAttr('disabled');
                                    }
                                    else 
                                    {
                                        toastr["error"](response.message);
                                        $("#eventbtn").text("Submitted"); 
                                        $("#eventbtn").removeAttr("disabled");   
                                    }
                                }
                            });
                        });
                    }
                }
            });
            y.style.display = "none";
            z.style.display = "none";
        }   
    }
    if($(this).val() === '2'){
        if(y.style.display === "none") {
            var year = $('#year').val();
            $.ajax({

                url:"<?php echo site_url("EditEndowment/panchanga_fetch")?>",
                type:"POST",
                data:{year:year},
                success:function(response) {
                    response = jQuery.parseJSON(response);
                    console.log(response);
            
                    if(response.result == 1) 
                    {
                        var mode1 = '';
                        mode1 += '<table class="table table-bordered">';              
                        mode1 += '<tr>';
                        mode1 += '<th style="text-align:center; width:115px;">Masa</th>';
                        mode1 += '<th style="text-align:center; width:115px;">Paksha</th>';
                        mode1 += '<th style="text-align:center; width:115px;">Thithi</th>';
                        mode1 += '<th style="text-align:center; width:115px;">Nakshathra</th>';
                        mode1 += '<th style="text-align:center; width:115px;">English Date</th>';
                        mode1 += '</tr>';
                        for (var i=0; i < response.message.length; i++) {
                            var english_date = response.message[i].english_date; 
                            var split3 = english_date.split('-');
                            var engdate = [ split3[2], split3[1], split3[0] ].join('-');
                            var Str = response.message[i].event;
                            var SplitOn = "/";
                            var Results = Str.split(SplitOn);   
                            if(Results.length == 4){
                            // for (var j = 0; j < 1; j++) {
                                mode1 += '<tr>';
                                mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="event1[]" value="'+Results[0]+'" style="width:115px;" readonly/></td>';
                                mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="event2[]" value="'+Results[1]+'" style="width:115px;" readonly/></td>';
                                mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="event3[]" value="'+Results[2]+'" style="width:115px;" readonly/></td>';
                                mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="event4[]" value="'+Results[3]+'" style="width:115px;" readonly/></td>';
                                mode1 += '<td style="text-align:center;"><input type="text" class="form-control panchanga_start" name="panchanga_start[]" value="'+engdate+'" style="width:115px;"/></td>';
                                mode1 += '</tr>';
                                //}
                            }
                            $('#dropdown').click(function () { 
                                if($(this).val() === '2'){
                                $('#fests').empty();
                                }
                            });
                        }
                        mode1 += '</table>'; 
                        mode1 += '<br><br>';
                        mode1 += '<button type="submit" id="panchbtn" class="btn btn-primary" style="margin-left:300px;">Update</button>';
                        $("#fests").append(mode1).fadeIn('slow');
                        $('.panchanga_start').datepicker({
                          changeMonth: true,
                          changeYear: true,
                          dateFormat: "dd-mm-yy"
                        });
                        $('#editform2').submit(function(e){
                            var formData = new FormData(this);
                            formData.append('year',year);
                            $("#panchbtn").attr('disabled', 'disabled');
                            $("#panchbtn").text("Submitting...");
                            $.ajax({
                                type : "POST",
                                url : '<?php  echo site_url("EditEndowment/edit_panchanga")  ?>',
                                data : formData,
                                contentType: false,
                                processData: false,
                                success:function(response){
                                    response=jQuery.parseJSON(response);
                                    console.log(response);
                                    if(response.result== 1){
                                        toastr["success"](response.message);
                                        $('#form2')[0].reset();
                                        $("#panchbtn").text("Submitted");    
                                        $("#panchbtn").removeAttr('disabled');
                                    }
                                    else 
                                    {
                                        toastr["error"](response.message);
                                        $("#panchbtn").text("Submitted"); 
                                        $("#panchbtn").removeAttr("disabled");   
                                    }
                                }
                            });
                        });
                    }
                }
            });
            x.style.display = "none";
            z.style.display = "none";
        }
    }
    if($(this).val() === '3'){
      if(z.style.display === "none") {
        var year = $('#year').val();
        $.ajax({

          url:"<?php echo site_url("EditEndowment/english_date_fetch")?>",
          type:"POST",
          data:{year:year},
          success:function(response) {
            response = jQuery.parseJSON(response);
            console.log(response);
  
            if(response.result == 1) 
            {
              var mode1 = ''; 
              mode1 += '<table class="table table-bordered">';             
              mode1 += '<tr>';
              mode1 += '<th style="text-align:center; width:90px;">Month</th>';
              mode1 += '<th style="text-align:center; width:90px;">Week</th>';
              mode1 += '<th style="text-align:center; width:90px;">Day</th>';
              mode1 += '<th style="text-align:center; width:95px;">English Date</th>';
              mode1 += '</tr>';
              for (var i=0; i < response.message.length; i++) {
                  var english_date = response.message[i].english_date; 
                  var split3 = english_date.split('-');
                  var engdate = [ split3[2], split3[1], split3[0] ].join('-');
                  var Str = response.message[i].event;
                  var SplitOn = "\\";
                  var Results = Str.split(SplitOn); 
                  if(Results.length == 3){
                      mode1 += '<tr>';
                      mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="english1[]" value="'+Results[0]+'" style="width:90px;" readonly/></td>';
                      mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="english2[]" value="'+Results[1]+'" style="width:50px;" readonly/></td>';
                      mode1 += '<td style="text-align:center;"><input type="text" class="form-control" name="english3[]" value="'+Results[2]+'" style="width:90px;" readonly/></td>';
                      mode1 += '<td style="text-align:center;"><input type="text" class="form-control english_start" name="english_start[]" value="'+engdate+'" style="width:95px;"/></td>';
                      mode1 += '</tr>';
                  }
                  $('#dropdown').click(function () { 
                      if($(this).val() === '3'){
                      $('#times').empty();
                      }
                  });
              }
              mode1 += '</table>';
              mode1 += '<br><br>'; 
              mode1 += '<button type="submit" id="timesbtn" class="btn btn-primary" style="margin-left:150px;">Update</button>';
              $("#times").append(mode1).fadeIn('slow');
              $('.english_start').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy"
              });
              $('#editform3').submit(function(e){
                var formData = new FormData(this);
                formData.append('year',year);
                $("#timesbtn").attr('disabled', 'disabled');
                $("#timesbtn").text("Submitting...");
                $.ajax({
                  type : "POST",
                  url : '<?php  echo site_url("EditEndowment/edit_date")  ?>',
                  data : formData,
                  contentType: false,
                  processData: false,
                  success:function(response){
                    response=jQuery.parseJSON(response);
                    console.log(response);
                    if(response.result== 1){
                        toastr["success"](response.message);
                        $('#form3')[0].reset();
                        $("#timesbtn").text("Submitted");    
                        $("#timesbtn").removeAttr('disabled');
                    }
                    else 
                    {
                        toastr["error"](response.message);
                        $("#timesbtn").text("Submitted"); 
                        $("#timesbtn").removeAttr("disabled");   
                    }
                  }
                });
              });
            }
          }
        });
        x.style.display = "none";
        y.style.display = "none";
      }
    }
    if($(this).val() === '0'){
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
    }
});
</script>

<?php
  echo view('includes/footer');
?>


