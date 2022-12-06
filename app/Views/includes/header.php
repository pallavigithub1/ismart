<?phP
  //print_r($temple_details);
 // die();
  $role_id = session()->get('role_id');
  $username = session()->get('username');
  $pwd = session()->get('password');
  $sname = session()->get('name');
  $temple_name = session()->get('temple_name');
  $image = session()->get('image');
  if(empty($sname)){
      echo view('login_v');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | I-SMART</title> 
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>" />
     <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>"> 
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt</title> -->
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/jquery-ui.css');?>" >
    <script  src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
    <script  src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script>window.history.forward();</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars" aria-hidden="true"></i></a>
      </li>
  
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" id="logo"><?php echo $temple_name; ?></a>
      </li>
    </ul>
    <!-- data-widget="sidebar-search" -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="margin-right: 2%;">
      <!-- Navbar Search -->
        <li>
           <div class="form-inline" id="search">
            <div class="input-group" >
              <input class="form-control form-control-sidebar" id="pnr" type="search" placeholder="Booking PNR please" aria-label="Search" style="border-radius:5px;">
              <div class="input-group-append">
                <button class="btn btn-sidebar" onclick="display()">
                 <i class="fa fa-search" aria-hidden="true"></i>
                </button> 
              </div>
            </div>
          </div>
        </li>
       <li class="nav-item dropdown open" style="padding-left: 15px;padding-top: 5px;">
          
       <select  name="temple" id="templeSelect" >
            <option value="0" selected>select</option>
                
                <?php foreach($temple_details as $key=>$temple) if(!empty($temple)) { 
                
                 if(  $temple['id'] == session()->get('temple')){ 
                      ?>
                      <option value="<?php echo $temple['id']?>" selected>
                                     <?php echo $temple['name']?>       
                      </option>
                    <?php
                }
                else{
                  ?>
                  <option value="<?php echo $temple['id']?>">
                                 <?php echo $temple['name']?>       
                  </option>
                <?php
                }
              }
                ?>
        </select>
          
       </li>
       <!--<li class="nav-item dropdown open" style="padding-left: 15px;padding-top: 5px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" style="color: #fff;">
          <i class="fa fa-user-circle-o" aria-hidden="true" style="padding-right: 15px;"></i>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;"> Profile</a>
              <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
        
            <a class="dropdown-item"  href="<?php echo base_url('logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>-->
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i><?php echo $sname; ?><i class="fa fa-caret-down" aria-hidden="true"></i></button>
          <div id="myDropdown" class="dropdown-content">
           <a href="#home">Profile</a>
            <a href="#home">Settings</a>
            <a href="<?php echo base_url('Logout/logout');?>">Logout</a>
          </div>
        </div>
    </ul>
  </nav> <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="row brand-logo">
      <div class="col-sm-12">

      <?php if($rel){ ?>
        <a href='<?php echo base_url("Dashboard")?>' class="">
          <img src="../uploads/<?php echo $image; ?>" width='53' height='53'>
        </a>
      <?php 
        } elseif($endo) {  
      ?>
        <a href='<?php echo base_url("Dashboard")?>' class="">
          <img src="../../uploads/<?php echo $image; ?>" width='53' height='53'>
        </a>
      <?php
        } else{
      ?>
        <a href='<?php echo base_url("Dashboard")?>' class="cc">
          <img src="uploads/<?php echo $image; ?>" width='53' height='53'>
        </a>
        <?php
        } 
        ?>
        
      </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link booking active">               
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_07.png');?>">
                <p class="book"> Bookings <i class="fas fa-angle-left right"></i> </p>            
            </a>
             <ul class="nav nav-treeview" id="sub-booking" style="padding-left:30px;">              
             
              <li class="nav-item menu-open">
                <a href="<?php echo base_url('GeneralBooking');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                   <p>General Seva</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url('Puduvattu');?>" class="nav-link ">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Endowment Seva</p> 
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo site_url('pudavatu-detail');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Puduvattu-detail</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link booking">
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_10.png');?>">
                <p class="book"> Reports <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview" id="sub-booking" style="padding-left:30px;"> 
              <li class="nav-item">
                <a href="<?php echo site_url('SevaReports');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Seva Report</p>
                </a>
              </li>             
              <li class="nav-item">
                <a href="<?php echo site_url('SevaMasterReport');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p> Seva Master Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('SevaWiseReport');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p> Seva Wise Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('SevaSummaryReport');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p> Seva Summary Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('ConsolidatedDayReport');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Consolidated Day Wise Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('DayLoginWise');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Day Wise Login Report</p>
                </a>
              </li>
            </ul>            
         </li>
         <li class="nav-item aa">
            <a href="#" class="nav-link booking">
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_13.png');?>">
                <p class="seva"> Masters <i class="fas fa-angle-left right"></i> </p>
            </a>
             <ul class="nav nav-treeview" id="sub-seva" style="padding-left:30px;">
              <li class="nav-item">
                 <a href="<?php echo base_url('Seva');?>" class="nav-link">
                 <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Seva Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Dashboard/master');?>" class="nav-link">
                    <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Master List</p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="<?php echo base_url('Devotee/master');?>" class="nav-link">
                    <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Devotee Master</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Seva Master2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Seva Master3</p>
                </a>
              </li> -->
            </ul>
         </li>
         <!--<li class="nav-item">
            <a href="#" class="nav-link booking">
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_15.png');?>">
                 <p class="pooja"> Pooja <i class="fas fa-angle-left right"></i> </p>
            </a>
         </li>-->
          <!--<li class="nav-item">
            <a href="#" class="nav-link booking">
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_18.png');?>">
                <p class="receipt"> Receipt <i class="fas fa-angle-left right"></i> </p>
            </a>
          </li>-->
         <li class="nav-item bb">
            <a href="#" class="nav-link booking">
                 <img src="<?php echo base_url('assets/images/Administrator.png');?>">
                 <p class="admin">Administrator <i class="fas fa-angle-left right"></i> </p>
            </a>            
           <ul class="nav nav-treeview" style="padding-left:30px;">
              <li class="nav-item">
                  <a href="<?php echo base_url('Dashboard/temple');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i>
                  <p>Temples</p>
                </a>
              </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link booking">
                 <img src="<?php echo base_url('assets/images/Endowment-task.png');?>">
                 <p class="admin">Endowment Tasks <i class="fas fa-angle-left right"></i> </p>
            </a>            
           <ul class="nav nav-treeview" style="padding-left:30px;">
              
              <li class="nav-item">
                   <a href="<?php echo base_url('EditEndowment');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i> 
                  <p>Add/Edit English calender </p>
                  </a>
              </li>
                <li class="nav-item">
                   <a href="<?php echo base_url('GenerateBooking');?>" class="nav-link">
                  <i class="fa fa-circle-thin" aria-hidden="true"></i> 
                  <p>GenerateBooking </p>
                  </a>
              </li>
            </ul>
         </li>
         <!--<li class="nav-item">
            <a href="master-list.html" class="nav-link booking">
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_18.png');?>">
                <p class="receipt">Master List <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Dashboard/master');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master List</p>
                </a>
              </li>
              <li class="nav-item"> 
                <a href="<?php echo base_url('Devotee/master');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Devotee Master</p>
                </a>
              </li>
            </ul>
          </li>-->
          <li class="nav-item">
            <a href="#" class="nav-link booking">
                <img src="<?php echo base_url('assets/images/I-Smart-Technologies_20.png');?>">
                <p class="admin">Settings <i class="fas fa-angle-left right"></i> </p>
            </a>            
           <ul class="nav nav-treeview" style="padding-left:30px;">
              <li class="nav-item mu">
                 <a href="<?php echo base_url('Manageuser');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="<?php echo base_url('settings');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Communication');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Communication Letter</p>
                </a>
              </li>
            </ul>
         </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

</div>

<div class="modal fade" id="general_modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">General Booking View</h4>
        <button type="button" class="close cancel" id="hi" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form class="add_form" id="edit_item_details">
          <div class="row">
            <div class="col-sm-6">

              <div class="form-group">
                
                <div class="row">

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Mobile Number</label>
                    <input type="number" class="form-control mobile_number" id="" readonly > 
                    <!-- <p id="mobile_number_m" > </p> -->
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Name</label><br>
                    <input type="text" class="form-control name" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Address 1</label><br>
                    <input type="text" class="form-control address1" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Address 2</label><br>
                    <input type="text" class="form-control address2" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">City</label><br>
                    <input type="text" class="form-control city" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">PIN Code</label><br>
                    <input type="number" class="form-control pin_code"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">State</label><br>
                    <input type="text" class="form-control state"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">E-mail</label><br>
                    <input type="email" class="form-control email" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Comments</label><br>
                    <input type="text" class="form-control comments" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Gothra</label><br> 
                    <!-- <input type="number" class="form-control gothra" name="gothra" > -->
                    <input type="text" class="form-control gothra"  readonly>
                  </div>
                </div>            
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
               <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Grand Total</label><br>
                    <input type="number" class="form-control grand_total" readonly>
                  </div>
                </div>  
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Booking Date</label><br>
                    <input type="text" class="form-control booking_date" readonly>
                  </div>
                </div> 
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Booking PNR</label><br>
                    <input type="text" class="form-control booking_pnr"  readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Receipt No</label><br>
                    <input type="text" class="form-control receipt_no" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">status</label><br>
                    <input type="text" class="form-control status" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">PAN</label><br>
                    <input type="text" class="form-control pan" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Aadhar</label><br>
                    <input type="text" class="form-control adhar" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Purpose</label><br>
                    <input type="text" class="form-control purpose" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Rashi</label><br>
                    <!-- <input type="text" class="form-control rashi" name="rashi" > -->
                    <input type="text" class="form-control rashi" readonly>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="id">Nakshathra</label><br>
                    <!-- <input type="text" class="form-control nakshathra" name="nakshathra" > -->
                    <input type="text" class="form-control nakshathra"  readonly>
                    
                  </div>
                </div>
              </div>
            </div>
          <div class="table-responsive">
            <table class="table table-bordered" id = "maintable2">
              <thead>
                <tr>
                <th style="text-align:center;">Seva Date</th>
                  <!--<th style="text-align:center;">Seva Code</th>-->
                  <th style="text-align:center;">Seva</th>
                  <th style="text-align:center;">Price</th>
                  <th style="text-align:center;">Seva Units</th>
                  <th style="text-align:center;">Amount</th>
                  <th style="text-align:center;">Remarks</th>
                  <!-- <th><button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button></th> -->
                </tr>
              </thead>
                <tbody></tbody>
            </table>
          </div>


          </div>

          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
              <!--<button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Back</button>-->
                <button type="button" class="btn btn-primary center-block" data-dismiss="modal" id="img2" style="float:left;color:black;margin-top:10px;">Back</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="pudu_modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#F39309;">
      	<h4 class="modal-title">Endowment Booking View</h4>
        <button type="button" class="close cancels" id="his" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
        <form class="adds_form" id="edits_item_details">

          <!-- <input type="text" class="form-control id" name="id" id="id"> -->
          <!-- <input type="hidden" class="form-control master_id" name="master_id" id="master_id"  required> -->
          
          <div class="row">
            <div class="col-sm-6">

              <div class="form-group">
                
                <div class="row">

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Mobile Number</label>
                    <input type="number" class="form-control mobile_number_s" readonly >
                    <!-- <p id="mobile_number_m" > </p> -->
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Name</label><br>
                    <input type="text" class="form-control name_s" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Address 1</label><br>
                    <input type="text" class="form-control address1_s" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Address 2</label><br>
                    <input type="text" class="form-control address2_s" readonly >
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">City</label><br>
                    <input type="text" class="form-control city_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">PIN Code</label><br>
                    <input type="number" class="form-control pin_code_s"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">State</label><br>
                    <input type="text" class="form-control state_s"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">E-mail</label><br>
                    <input type="email" class="form-control email_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Comments</label><br>
                    <input type="text" class="form-control comments_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Gothra</label><br>
                    <!-- <input type="number" class="form-control gothra" name="gothra" > -->
                    <input type="text" class="form-control gothra_s"  readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">In The Name Of</label><br>
                    <input type="text" class="form-control in_the_name_of_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Main Seva</label><br>
                    <input type="text" class="form-control main_seva_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Seva Included</label><br>
                    <input type="text" class="form-control seva_included_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Received By</label><br>
                    <input type="text" class="form-control received_by_s" readonly>
                  </div>

                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Details</label><br>
                    <input type="text" class="form-control details_s" readonly>
                  </div>

                </div>            
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">

               <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Grand Total</label><br>
                    <input type="number" class="form-control grand_total_s" readonly>
                  </div>
                </div>  
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Booking Date</label><br>
                    <input type="text" class="form-control booking_date_s" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Booking PNR</label><br>
                    <input type="text" class="form-control booking_pnr_s"  readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Receipt No</label><br>
                    <input type="text" class="form-control receipt_no_s" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">status</label><br>
                    <input type="text" class="form-control status_s" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">PAN</label><br>
                    <input type="text" class="form-control pan_s" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Aadhar</label><br>
                    <input type="text" class="form-control adhar_s" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Purpose</label><br>
                    <input type="text" class="form-control purpose_s" readonly >
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Rashi</label><br>
                    <!-- <input type="text" class="form-control rashi" name="rashi" > -->
                    <input type="text" class="form-control rashi_s" readonly>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-offset-1 col-sm-12">
                    <label for="ids">Nakshathra</label><br>
                    <!-- <input type="text" class="form-control nakshathra" name="nakshathra" > -->
                    <input type="text" class="form-control nakshathra_s"  readonly>
                    
                  </div>
                </div>

                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="ids">Seva Date</label><br>
                  <input type="text" class="form-control seva_date_s" readonly>
                </div>
                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="ids">Seva Amount</label><br>
                  <input type="number" class="form-control seva_amount_s" readonly>
                </div> 
                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="ids">Payment Mode</label><br>
                  <input type="text" class="form-control payment_mode_s" readonly>
                </div> 
                <div class="form-group col-sm-offset-1 col-sm-12">
                  <label for="ids">Payment Date</label><br>
                  <input type="text" class="form-control payment_date_s" readonly>
                </div> 

              </div>

            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id = "maintable4">
              <thead>
                <tr>
                  <th style="text-align:center;">Relation</th>
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">BirthDay</th>            
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>

          <div class="col-xs-offset-2 col-sm-offset-4 col-lg-offset-4">
            <div class="modal-footer">
              <!-- <button type="submit" class="btn btn-primary center-block update" style="float:left;color:black;margin-top:10px;">Back</button> -->
              <button type="button" class="btn btn-primary center-block" data-dismiss="modal" id="img4" style="float:left;color:black;margin-top:10px;">Back</button>
              
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
   $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script>


<script type="text/javascript">
  function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
$("#img2").click(function(){
  $('#general_modal').hide();
});
$("#img4").click(function(){
  $('#pudu_modal').hide();
});
$('#general_modal').on('hidden.bs.modal', function (e) {
  history.go(0);
});
$('#pudu_modal').on('hidden.bs.modal', function (e) {
  history.go(0);
});
var ss = '<?php echo $role_id ?>';
if(ss == 3){
  $('.aa').hide();
  $('.bb').hide();
  $('.mu').hide();
}
function display(){
  var pnr = $('#pnr').val();
  // alert(pnr);
  $.ajax({
    url: "<?php echo site_url('Dashboard/view_page')?>",
    type : "POST",
    data : {pnr:pnr},
    success:function(response){
      response = jQuery.parseJSON(response);

      if(response.result == 1){
        if(response.type == 2){ //general
          $('#general_modal').modal("show");
          $(".mobile_number").val(response.msg1.mobile_number);
          $(".name").val(response.msg1.name);
          $(".address1").val(response.msg1.address1);
          $(".address2").val(response.msg1.address2);
          $(".city").val(response.msg1.city);
          $(".pin_code").val(response.msg1.pin_code);
          $(".state").val(response.msg1.state);
          $(".email").val(response.msg1.email);
          $(".comments").val(response.msg[0].comment);
          $(".receipt_no").val(response.msg[0].receipt_no);
          $(".gothra").val(response.msg1.gothra);
          $(".grand_total").val(response.message.total_amount);
          $(".nakshathra").val(response.msg1.nakshathra);
          $(".booking_pnr").val(response.message.booking_pnr);
          $(".rashi").val(response.msg1.rashi);
          $(".purpose").val(response.msg1.purpose);
          $(".adhar").val(response.msg1.adhar);
          $(".pan").val(response.msg1.pan);
          $(".status").val(response.msg[0].status);
        
          var dates = response.msg[0].booking_date;
          var split2 = dates.split('-');
          var joins = [ split2[2], split2[1], split2[0] ].join('-');
          $(".booking_date").val(joins);
          for (var i=0; i< response.msg.length; i++){

            var seva_date1 = response.msg[i].seva_date; 
            var split4 = seva_date1.split('-');
            var join3 = [ split4[2], split4[1], split4[0] ].join('-');

            var mode = '';
            mode += '<tr >';
            mode += '<td><input type="text"  value="'+join3+'" class="form-control " readonly/></td>';
            mode += '<td><input type="text"   value="'+response.msg[i].seva_name+'"  class="form-control" readonly /></td>';
            mode += '<td><input type="text" class="form-control" value="'+response.msg[i].price+'"  readonly /></td>';
            mode += '<td><input type="text"  value="'+response.msg[i].seva_units+'" class="form-control " readonly/></td>';
            mode += '<td><input type="text"   value="'+response.msg[i].amount+'"  class="form-control" readonly /></td>';
            mode += '<td><input type="text" class="form-control" value="'+response.msg[i].remark+'"  readonly /></td>';         
            mode += '</tr>';

            $("#maintable2").append(mode);
          }
        }else if(response.type == 1){   //endo
          $('#pudu_modal').modal("show");
          $('.mobile_number_s').val(response.msg1.mobile_number);
          $('.name_s').val(response.msg1.name);
          $('.address1_s').val(response.msg1.address1);
          $('.address2_s').val(response.msg1.address2);
          $('.city_s').val(response.msg1.city);
          $('.pin_code_s').val(response.msg1.pin_code);
          $('.state_s').val(response.msg1.state);
          $('.email_s').val(response.msg1.email);
          $('.comments_s').val(response.message.comments);
          $('.gothra_s').val(response.message.gothra);
          $('.grand_total_s').val(response.message.grand_total);
          // $('.booking_date_m').val(response.message.booking_date);
          $('.booking_pnr_s').val(response.message.booking_pnr);
          $('.receipt_no_s').val(response.message.receipt_no);
          $('.status_s').val(response.message.status);
          $('.pan_s').val(response.msg1.pan);
          $('.adhar_s').val(response.msg1.adhar);
          $('.purpose_s').val(response.msg1.purpose);
          $('.rashi_s').val(response.message.rashi);
          $('.nakshathra_s').val(response.message.nakshathra);

          $('.in_the_name_of_s').val(response.message.name_of);
          $('.seva_date_s').val(response.message.seva_date);
          $('.main_seva_s').val(response.message.main_seva);
          $('.seva_amount_s').val(response.message.seva_price);
          $('.seva_included_s').val(response.message.seva_include);
          $('.payment_mode_s').val(response.message.payment_mode);
          // $('.payment_date_m').val(response.message.payment_date);
          $('.details_s').val(response.message.details);
          $('.received_by_s').val(response.message.crb);
       
          var datee = response.message.booking_date;
          var split7 = datee.split('-');
          var join8 = [ split7[2], split7[1], split7[0] ].join('-');
          $(".booking_date_s").val(join8);

          var date0 = response.message.payment_date;
          var splitt = date0.split('-');
          var join10 = [ splitt[2], splitt[1], splitt[0] ].join('-');
          $(".payment_date_s").val(join10);

          for(var i=0; i< response.msg2.length; i++){

            var birthdays = response.msg2[i].birthday; 
            var split7 = birthdays.split('-');
            var join7 = [ split7[2], split7[1], split7[0] ].join('-');

            var mode = '';
            mode += '<tr >';
            mode += '<td><input type="text"   value="'+response.msg2[i].relation+'"  class="form-control" readonly /></td>';
            mode += '<td><input type="text" class="form-control" value="'+response.msg2[i].name+'"  readonly /></td>'; 
            mode += '<td><input type="text"  value="'+join7+'" class="form-control " readonly/></td>';                         
            mode += '</tr>';
          
            $("#maintable4").append(mode);
          }
        }
      }
      else {
			  toastr["error"](response.message);
		  }
    }
  });
}
</script>
  
<style type="text/css">
.dropbtn {
  background-color: transparent;
  color: white;
 /* padding: 16px;*/
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropdown i{
  padding: 0 5px;
}
.dropbtn:hover, .dropbtn:focus {
  background-color: transparent;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 110px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: transparent;}

.show {display: block;}
</style>
    
