<?php

  echo view('includes/header',$temple_details, $rel);
  $sname = session()->get('name'); $prefix = session()->get('prefix'); ?>
<div class="wrapper">
  <!-- Navbar -->

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 id="receiptHeading" class="m-0">Endowment Booking</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href='<?php echo base_url("Dashboard")?>'>Home</a>
              </li>
              <li class="breadcrumb-item active">Endowment Booking</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

    <div class="row">
      <div class="col-sm-12 spacing">
        <form id="booking">
          <section>
            <!--<div class="row">-->
            <!--	<div class="col-sm-8"></div>-->
            <!--	<div class="col-sm-4">-->
            <!--	  	<div class="submission">-->
            <!--			<button type="submit" class="btn btn-primary save">Save</button>-->
            <!--			<button type="button" class="btn btn-primary" >Print</button>-->
            <!--			<button type="button" class="btn btn-primary">Cancel</button>-->
            <!--		</div>-->
            <!--	</div>-->
            <!--</div>-->

            <div class="row">
              <div class="col-12 mx-auto">
                <div class="accordion" id="accordionExample">
                  <!------------------------------accor 1--------------------------------------->
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapseOne"
                          aria-expanded="true"
                          aria-controls="collapseOne"
                        >
                          Contact Details
                          <span
                            class="glyphicon glyphicon-plus subnav-icon"
                            aria-hidden="true"
                          ></span>
                        </button>
                      </h5>
                    </div>

                    <div
                      id="collapseOne"
                      class="collapse show fade"
                      aria-labelledby="headingOne"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label
                                    for="number"
                                    class="mob"
                                    style="width: 124px"
                                    >Mobile Number
                                  </label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="number"
                                    value=""
                                    name="mobile_number"
                                    class="form-control"
                                    id="mobile_number"
                                    onchange="checkmobile()"
                                    onfocusout="validation()"
                                  />
                                  <small class="validation" style="color: red"
                                    >Please enter 10 digits</small
                                  >
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="name"
                                    >Name
                                    <span style="color: red">*</span></label
                                  >
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    list="names"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    onfocusout="checkname()"
                                    onkeyup="vald()"
                                  />
                                  <small
                                    class="vald"
                                    style="color: red; display: none"
                                    >Please enter Valid name</small
                                  ><br />
                                  <small
                                    class="nm"
                                    style="color: red; display: none"
                                    >Please enter name</small
                                  >
                                  <datalist id="names"> </datalist>
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="address1"
                                    >Address Line1
                                    <span style="color: red">*</span></label
                                  >
                                </div>
                                <div class="col-sm-8">
                                  <textarea
                                    name="address1"
                                    class="form-control address1"
                                    id="address1"
                                    onfocusout="checkad1()"
                                    rows="1"
                                    cols="5"
                                  ></textarea>
                                  <small
                                    class="ad1"
                                    style="color: red; display: none"
                                    >Please enter address1</small
                                  >
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="address2"
                                    >Address Line2
                                    <span style="color: red">*</span></label
                                  >
                                </div>
                                <div class="col-sm-8">
                                  <textarea
                                    name="address2"
                                    class="form-control address2"
                                    id="address2"
                                    onfocusout="checkad2()"
                                    rows="1"
                                    cols="5"
                                  ></textarea>
                                  <small
                                    class="ad2"
                                    style="color: red; display: none"
                                    >Please enter address2</small
                                  >
                                </div>
                              </div>

                              <!--<div class="row book-detail">-->
                              <!--	<div class="col-sm-4">-->
                              <!--		<label for="code">PIN Code</label>-->
                              <!--	</div>-->
                              <!--	<div class="col-sm-8">-->
                              <!--		<input type="number" class="form-control pin_code" onfocusout="get_details()" name="pin_code" id= "pin_code">-->
                              <!--	</div>-->
                              <!--</div>-->

                              <!--<div class="row book-detail">-->
                              <!--	<div class="col-sm-4">-->
                              <!--		<label for="city">City</label>-->
                              <!--	</div>-->
                              <!--	<div class="col-sm-8">-->
                              <!--		<input type="text" class="form-control city" name="city" id = "city" placeholder="City" disabled>-->
                              <!--	</div>-->
                              <!--</div>-->

                              <!--<div class="row book-detail">-->
                              <!--	<div class="col-sm-4">-->
                              <!--		<label for="state">State</label>-->
                              <!--	</div>-->
                              <!--	<div class="col-sm-8">-->
                              <!--		<input type="text" class="form-control state" name="state" id = "state" placeholder="State" disabled>-->
                              <!--	</div>-->
                              <!--</div>-->

                              <div class="others">
                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="pin_code">PIN Code</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <div class="wrapper-radio">
                                      <input
                                        type="radio"
                                        name="select9"
                                        value="others"
                                        id="option-1"
                                        onclick="show1()"
                                        style="display: none"
                                      />
                                      <input
                                        type="radio"
                                        name="select9"
                                        value="others"
                                        id="option-2"
                                        onclick="show()"
                                        style="display: none"
                                      />
                                      <label
                                        for="option-1"
                                        class="option option-1"
                                      >
                                        <div class="dot"></div>
                                        <span>India</span>
                                      </label>
                                      <label
                                        for="option-2"
                                        class="option option-2"
                                      >
                                        <div class="dot"></div>
                                        <span>Others</span>
                                      </label>
                                    </div>
                                    <!--wrapper-radio-->
                                  </div>
                                </div>
                                <!--pin code-->

                                <div class="row book-detail">
                                  <div class="col-sm-4"></div>
                                  <div class="col-sm-8">
                                    <input
                                      type="number"
                                      class="form-control pin_code"
                                      name="pin_code1"
                                    />
                                  </div>
                                </div>

                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="city">City</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input
                                      type="text"
                                      class="form-control city"
                                      name="city1"
                                    />
                                  </div>
                                </div>

                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="state">State</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input
                                      type="text"
                                      class="form-control state"
                                      name="state1"
                                    />
                                  </div>
                                </div>

                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="country">Country</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input
                                      type="text"
                                      class="form-control country"
                                      name="country"
                                    />
                                  </div>
                                </div>
                              </div>
                              <!--others-->

                              <div class="indian">
                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="pin_code">PIN Code</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <div class="wrapper-radio">
                                      <input
                                        type="radio"
                                        name="select"
                                        value="india"
                                        id="option-1"
                                        onclick="show1()"
                                        style="display: none"
                                        checked
                                      />
                                      <input
                                        type="radio"
                                        name="select"
                                        value="india"
                                        id="option-2"
                                        onclick="show()"
                                        style="display: none"
                                      />
                                      <label
                                        for="option-1"
                                        class="option option-1"
                                      >
                                        <div class="dot"></div>
                                        <span>India</span>
                                      </label>
                                      <label
                                        for="option-2"
                                        class="option option-2"
                                      >
                                        <div class="dot"></div>
                                        <span>Others</span>
                                      </label>
                                    </div>
                                    <!--wrapper-radio-->
                                  </div>
                                </div>
                                <!--pin code-->

                                <div class="row book-detail">
                                  <div class="col-sm-4"></div>
                                  <div class="col-sm-8">
                                    <input
                                      type="number"
                                      class="form-control pin_code"
                                      onfocusout="get_details()"
                                      name="pin_code"
                                      id="pin_code"
                                    />
                                  </div>
                                </div>

                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="city">City</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input
                                      type="text"
                                      id="city"
                                      class="form-control city"
                                      name="city"
                                      placeholder="City"
                                      
                                    />
                                  </div>
                                </div>

                                <div class="row book-detail">
                                  <div class="col-sm-4">
                                    <label for="state">State</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input
                                      type="text"
                                      class="form-control state"
                                      name="state"
                                      id="state"
                                      placeholder="State"
                                      
                                    />
                                  </div>
                                </div>
                              </div>
                              <!----indian--->

                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="email">E-mail </label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control email"
                                    id="email"
                                    name="email"
                                  />
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="comment">Comments</label>
                                </div>
                                <div class="col-sm-8">
                                  <textarea
                                    name="comment"
                                    class="form-control"
                                    form="usrform"
                                    id="comment"
                                    rows="1"
                                    cols="5"
                                  ></textarea>
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
                                  <input
                                    type="number"
                                    name="g_total"
                                    id="g_total"
                                    class="form-control g_total"
                                    readonly
                                  />
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="date">Booking Date </label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control booking_date"
                                    id="booking_date"
                                    name="booking_date"
                                    readonly
                                  />
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="pnr">Booking PNR</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control booking_pnr"
                                    id="booking_pnr"
                                    name="booking_pnr"
                                    readonly
                                  />
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="receipt">Receipt No</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    name="receipt_no"
                                    class="form-control receipt_no"
                                    id="receipt_no_e"
                                    readonly
                                  />
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="status">Status</label>
                                </div>
                                <div class="col-sm-8">
                                  <select
                                    class="form-control status"
                                    id="status"
                                    name="status"
                                  >
                                    <option>Select</option>
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
                                  <input
                                    type="text"
                                    name="pan"
                                    class="form-control pan"
                                    onkeyup="check()"
                                    id="pan"
                                  />
                                  <small
                                    class="check"
                                    style="color: red; display: none"
                                    >Please enter Valid PAN in caps</small
                                  >
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="adhar">Aadhar</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    name="adhar"
                                    class="form-control adhar"
                                    onkeyup="checks()"
                                    id="adhar"
                                  />
                                  <small
                                    class="checks"
                                    style="color: red; display: none"
                                    >Please enter Valid Aadhar number (only 12
                                    digits)</small
                                  >
                                </div>
                              </div>
                              <div class="row book-detail">
                                <div class="col-sm-4">
                                  <label for="purpose">Purpose</label>
                                </div>
                                <div class="col-sm-8">
                                  <select
                                    class="form-control purpose"
                                    id="purpose"
                                    name="purpose"
                                  >
                                    <option>Select</option>
                                    <option>Wedding Anniversary</option>
                                    <option>Birthday</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- 1 -->

                  <!------------------------------accor 1--------------------------------------->

                  <!------------------------------accor 2--------------------------------------->

                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link collapsed btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapseTwo"
                          aria-expanded="false"
                          aria-controls="collapseTwo"
                        >
                          Seva Details
                          <span
                            class="glyphicon glyphicon-plus subnav-icon"
                            aria-hidden="true"
                          ></span>
                        </button>
                      </h5>
                    </div>
                    <div
                      id="collapseTwo"
                      class="collapse fade"
                      aria-labelledby="headingTwo"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="name">In the Name of</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    name="name_of"
                                    class="form-control name_of"
                                    id="name_of"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="gothra"
                                    >Gothra
                                    <span style="color: red">*</span></label
                                  >
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="gothra"
                                    id="gothra"
                                    onfocusout="checkgo()"
                                    list="gothra1"
                                  />
                                  <small
                                    class="go"
                                    style="color: red; display: none"
                                    >Please enter gothra</small
                                  >
                                  <datalist id="gothra1">
                                    <?php
																			foreach($gothra as $key=>
                                    $val){ ?>
                                    <option>
                                      <?php echo $val['master_value']; ?>
                                      -
                                      <?php echo $val['regional_value']; ?>
                                    </option>
                                    <?php
																			} 
																			?>
                                  </datalist>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--row-->
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="rashi"
                                    >Rashi
                                    <span style="color: red">*</span></label
                                  >
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="rashi"
                                    id="rashi"
                                    onfocusout="checkra()"
                                    list="rashi1"
                                  />
                                  <small
                                    class="ra"
                                    style="color: red; display: none"
                                    >Please enter rashi</small
                                  >
                                  <datalist id="rashi1">
                                    <?php
															foreach($rashi as $key=>
                                    $val){ ?>
                                    <option>
                                      <?php echo $val['master_value']; ?>
                                      -
                                      <?php echo $val['regional_value']; ?>
                                    </option>
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
                                  <label for="nakshathra"
                                    >Nakshathra
                                    <span style="color: red">*</span></label
                                  >
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="nakshathra"
                                    id="nakshathra"
                                    onfocusout="checkns()"
                                    list="nakshathra1"
                                  />
                                  <small
                                    class="ns"
                                    style="color: red; display: none"
                                    >Please enter nakshathra</small
                                  >
                                  <datalist id="nakshathra1">
                                    <?php
															foreach($nakshathra as $key=>
                                    $val){ ?>
                                    <option>
                                      <?php echo $val['master_value']; ?>
                                      -
                                      <?php echo $val['regional_value']; ?>
                                    </option>
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
                    </div>
                  </div>
                  <!-- 2 -->

                  <!------------------------------accor 2--------------------------------------->

                  <!------------------------------accor 3--------------------------------------->

                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link collapsed btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapseThree"
                          aria-expanded="false"
                          aria-controls="collapseThree"
                        >
                          Seva Date
                          <span
                            class="glyphicon glyphicon-plus subnav-icon"
                            aria-hidden="true"
                          ></span>
                        </button>
                      </h5>
                    </div>
                    <div
                      id="collapseThree"
                      class="collapse fade"
                      aria-labelledby="headingThree"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="boxes" style="display: flex">
                          <div class="form-check" id="box_bg1">
                            <label class="form-check-label" id="seva-label">
                              <input
                                type="radio"
                                class="form-check-input"
                                value="date"
                                name="optradio"
                                onclick="datee()"
                              />Date
                              <img
                                src="../assets/images/date.jpg"
                                class="img-fluid d-block mx-auto"
                                style="width: 10%; float: right"
                              />
                            </label>
                          </div>

                          <div class="form-check" id="box_bg1">
                            <label class="form-check-label" id="seva-label">
                              <input
                                type="radio"
                                class="form-check-input"
                                value="festival"
                                onclick="festival2()"
                                name="optradio"
                              />By Festival
                              <img
                                src="../assets/images/festival.jpg"
                                class="img-fluid d-block mx-auto"
                                style="width: 20%; float: right"
                              />
                            </label>
                          </div>

                          <!-- <div class="form-check" id="box_bg1">
											 	 <label class="form-check-label" id="seva-label">
											   		 <input type="radio" class="form-check-input" value="others" name="optradio">Others
											   		  <img src="assets/images/others.jpg" class="img-fluid d-block mx-auto" style="width: 18%;float: right;">
											  	  </label>
											 	</div> -->

                          <div
                            class="form-check"
                            id="box_bg1"
                            style="width: 245px"
                          >
                            <label class="form-check-label" id="seva-label">
                              <input
                                type="radio"
                                class="form-check-input"
                                value="calendar"
                                onclick="simple2()"
                                name="optradio"
                              />Simple date by calender
                              <img
                                src="../assets/images/calender.jpg"
                                class="img-fluid d-block mx-auto"
                                style="width: 10%; float: right"
                              />
                            </label>
                          </div>

                          <div class="form-check" id="box_bg1">
                            <label class="form-check-label" id="seva-label">
                              <input
                                type="radio"
                                class="form-check-input"
                                value="panchanga"
                                onclick="panchanga2()"
                                name="optradio"
                              />By Panchanga

                              <img
                                src="../assets/images/panchanga.jpg"
                                class="img-fluid d-block mx-auto"
                                style="width: 10%; float: right"
                              />
                            </label>
                          </div>
                        </div>
                        <!--boxes-->

                        <div class="row">
                          <div class="col-sm-3">
                            <!-- others -->
                          </div>
                          <!--col-sm-3-->

                          <div class="col-sm-5">
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
                                    <p style="font-weight: 600">
                                      Simple date by calender
                                    </p>
                                    <div class="row" style="padding-top: 12px">
                                      <div class="col-sm-4">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Month
                                        </p>
                                        <select
                                          onfocusout="myFun('calendar','calendar')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist[]"
                                        >
                                          <?php
																									foreach($month as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['value']; ?>
                                          </option>
                                          <?php
																									} 
																									?>
                                        </select>
                                      </div>
                                      <div class="col-sm-3">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Week
                                        </p>
                                        <select
                                          onfocusout="myFun('calendar','calendar')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist[]"
                                        >
                                          <?php
																									foreach($week as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['value']; ?>
                                          </option>
                                          <?php
																									} 
																									?>
                                        </select>
                                      </div>
                                      <div class="col-sm-5">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Day
                                        </p>
                                        <select
                                          onfocusout="myFun('calendar','calendar')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist[]"
                                        >
                                          <?php
																									foreach($day as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['value']; ?>
                                          </option>
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
                            <!--row-->

                            <div class="row che1">
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="seva-box-1">
                                    <!-- <div class="form-check" id="box_bg">
																					  <label class="form-check-label" id="seva-label">
																					    <input type="radio" class="form-check-input" value="date" name="optradio" checked>Date
																					    	<img src="assets/images/date.jpg" class="img-fluid d-block mx-auto" style="width: 10%;float: right;">
																					  </label>
																				</div> -->
                                    <div class="row" style="padding-top: 4%">
                                      <label>Date</label>
                                      <input
                                        type="text"
                                        name="seva_date"
                                        class="form-control"
                                        id="seva_date"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--row-->

                            <div class="row che2">
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="seva-box-1">
                                    <!-- <div class="form-check" id="box_bg">
																					  <label class="form-check-label" id="seva-label">
																					    <input type="radio" class="form-check-input" value="festival" name="optradio">By Festival
																					    <img src="assets/images/festival.jpg"    value="<?php echo $val['id']; ?>"     class="img-fluid d-block mx-auto" style="width: 20%;float: right;">
																					  </label>
																				</div> -->
                                    <div class="row" style="padding-top: 4%">
                                      <label>By festival</label>
                                      <select
                                        class="form-control"
                                        id="festival"
                                        onfocusout="myFun('festival','festival')"
                                        name="seva_festival"
                                      >
                                        <?php
																					  foreach($festival as $key=>$val){ ?>
                                        <option>
                                          <?php echo $val['master_value']; ?>
                                        </option>
                                        <?php
																					  } 
																					  ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--row-->

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
                                    <p style="font-weight: 600">By Panchanga</p>
                                    <div class="col-sm-12">
                                      <select
                                        onfocusout="myFun('panchanga','panchanga')"
                                        class="form-control m-auto"
                                        id="sel1"
                                        name="sellist1[]"
                                      >
                                        <?php
																						foreach($panchanga as $key=>$val){ ?>
                                        <option>
                                          <?php echo $val['master_value']; ?>
                                        </option>
                                        <?php
																						} 
																						?>
                                      </select>
                                    </div>

                                    <!-- <div class="row" style="padding-top: 6%;">-->
                                    <!--	<div class="col-sm-3"></div>-->
                                    <!--	<div class="col-sm-6">	-->
                                    <!--    		<select class="form-control" id="sel1" name="sellist1[]">-->
                                    <!--	        <option >1</option>-->
                                    <!--	        <option >2</option>-->
                                    <!--     		</select>-->
                                    <!--	</div>-->
                                    <!--	<div class="col-sm-3"></div>-->
                                    <!--</div>-->
                                    <div class="row" style="padding-top: 12px">
                                      <div class="col-sm-6">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Masa
                                        </p>
                                        <select
                                          onfocusout="myFun('panchanga','panchanga')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist1[]"
                                        >
                                          <?php
																						foreach($masa as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['master_value']; ?>
                                          </option>
                                          <?php
																						} 
																						?>
                                        </select>
                                      </div>
                                      <div class="col-sm-6">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Paksha
                                        </p>
                                        <select
                                          onfocusout="myFun('panchanga','panchanga')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist1[]"
                                        >
                                          <?php
																						foreach($paksha as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['master_value']; ?>
                                          </option>
                                          <?php
																						} 
																						?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Nakshatra
                                        </p>
                                        <select
                                          onfocusout="myFun('panchanga','panchanga')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist1[]"
                                        >
                                          <?php
																						foreach($nakshathra as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['master_value']; ?>
                                          </option>
                                          <?php
																						} 
																						?>
                                        </select>
                                      </div>
                                      <div class="col-sm-6">
                                        <p
                                          style="
                                            margin-bottom: 5px;
                                            font-weight: 600;
                                          "
                                        >
                                          Tithi
                                        </p>
                                        <select
                                          onfocusout="myFun('panchanga','panchanga')"
                                          class="form-control"
                                          id="sel1"
                                          name="sellist1[]"
                                        >
                                          <?php
																						foreach($tithi as $key=>$val){ ?>
                                          <option>
                                            <?php echo $val['master_value']; ?>
                                          </option>
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
                          </div>
                          <!--col-sm-6-->

                          <div class="col-sm-4"></div>
                        </div>
                        <!--main row--->
                      </div>
                    </div>
                  </div>
                  <!-- 3 -->

                  <!------------------------------accor 3--------------------------------------->

                  <!------------------------------accor 4--------------------------------------->

                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link collapsed btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapseFour"
                          aria-expanded="false"
                          aria-controls="collapseFour"
                        >
                          Main Seva
                          <span
                            class="glyphicon glyphicon-plus subnav-icon"
                            aria-hidden="true"
                          ></span>
                        </button>
                      </h5>
                    </div>
                    <div
                      id="collapseFour"
                      class="collapse fade"
                      aria-labelledby="headingFour"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="seva">Main Seva</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="main_seva"
                                    id="main_seva1"
                                    list="main_seva"
                                    onfocusout="checksevaname()"
                                    readonly
                                  />
                                  <datalist id="main_seva">
                                    <?php
																		  foreach($sevas as $key=>
                                    $val){ ?>
                                    <!-- <option ><?php echo $val['seva_name']; ?></option> -->
                                    <?php
																		  } 
																		  ?>
                                  </datalist>
                                </div>
                                <!-- 	<div class="col-sm-2"><button type="button" class="btn"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></button></div> -->
                              </div>
                              <!-- row -->
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="seva">Amount</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="number"
                                    class="form-control amount"
                                    name="amount"
                                    id="amount"
                                    readonly
                                  />
                                  <input
                                    type="number"
                                    class="form-control sp_id"
                                    name="sp_id"
                                    id="sp_id"
                                    readonly
                                  />
                                  <input
                                    type="hidden"
                                    class="form-control seva_id"
                                    name="seva_id"
                                    id="seva_id"
                                    readonly
                                  />
                                </div>
                              </div>
                              <!-- row -->
                            </div>
                          </div>
                        </div>
                        <!--row-->

                        <h5 style="font-size: 14px">
                          Sevas Included <span style="color: red">*</span>
                        </h5>
                        <div class="row" style="margin-bottom: 20px">
                          <?php
													 		  foreach($subseva as $key=>$val){ if(($key%3) == 0){ ?>

                          <div id="seva_include">
                            <ul class="seva-list">
                              <?php
																			} 
																	?>
                              <li style="display: inline" class="seva-list">
                                <input
                                  type="checkbox"
                                  name="seva_include[]"
                                  value="<?php echo $val['master_value']; ?>"
                                /><span>
                                  <?php echo $val['master_value']; ?></span
                                >
                              </li>
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
                      </div>
                    </div>
                  </div>
                  <!-- 4 -->

                  <!------------------------------accor 4--------------------------------------->

                  <!------------------------------accor 5 --------------------------------------->

                  <div class="card">
                    <div class="card-header" id="headingFive">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link collapsed btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapseFive"
                          aria-expanded="false"
                          aria-controls="collapseFive"
                        >
                          Payment Details
                          <span
                            class="glyphicon glyphicon-plus subnav-icon"
                            aria-hidden="true"
                          ></span>
                        </button>
                      </h5>
                    </div>
                    <div
                      id="collapseFive"
                      class="collapse fade"
                      aria-labelledby="headingFive"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="seva">Payment Mode</label>
                                </div>
                                <div class="col-sm-8">
                                  <!--<select class="form-control" id="sel1" name="payment_mode" style="width: 75%;">-->

                                  <!--       <option selected>Cheque</option>-->
                                  <!--	<option >Cash</option>-->
                                  <!--       <option>NEFT</option>-->
                                  <!--       <option>UPI</option>-->

                                  <!--   </select>-->
                                  <select
                                    class="form-control"
                                    id="sel1"
                                    name="payment_mode"
                                  >
                                    <?php
																		foreach($paymentmode as $key=>$val){ ?>
                                    <option>
                                      <?php echo $val['master_value']; ?>
                                    </option>
                                    <?php
																		} 
																		?>
                                  </select>
                                </div>
                              </div>
                              <!-- row -->
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="date">Date</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    id="payment_date"
                                    class="form-control"
                                    name="payment_date"
                                    readonly
                                  />
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
                                  <input
                                    type="text"
                                    value="<?php echo $sname; ?>"
                                    class="form-control"
                                    id="name"
                                    name="crb"
                                  />
                                  <input
                                    type="hidden"
                                    class="form-control"
                                    name="added_by"
                                    value="<?php echo $sname; ?>"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="information">Grand Total</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="number"
                                    class="form-control g_total1"
                                    readonly
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="information">Details</label>
                                </div>
                                <div class="col-sm-8">
                                  <input
                                    type="text"
                                    id="details"
                                    class="form-control"
                                    name="details"
                                    id="details"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="col-sm-6">
														<div class="form-group">
															<div class="row">
																<div class="col-sm-4">
																	<label for="information">Advance Amount</label>
																</div>
																<div class="col-sm-8">
																 <input type="number"   class="form-control advance_amount" name="advance_amount" id="advance_amount" >
																</div>
															</div>
														</div>
													</div> -->
                          <!-- <div class="col-sm-6">
														<div class="form-group">
															<div class="row">
																<div class="col-sm-4">
																	<label for="information">Balance Amount</label>
																</div>
																<div class="col-sm-8">
																 <input type="number"   class="form-control balance_amount" name="balance_amount" id="balance_amount" value="0" readonly >
																</div>
															</div>
														</div>
													</div> -->
                        </div>
                        <!--row-->
                      </div>
                    </div>
                  </div>
                  <!-- 5 -->

                  <!------------------------------accor 5 --------------------------------------->

                  <!-----------------------------accor 6 ----------------------------------------->

                  <div class="card">
                    <div class="card-header" id="headingSix">
                      <h5 class="mb-0">
                        <button
                          class="btn btn-link collapsed btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapseSix"
                          aria-expanded="false"
                          aria-controls="collapseSix"
                        >
                          Additional Information
                          <span
                            class="glyphicon glyphicon-plus subnav-icon"
                            aria-hidden="true"
                          ></span>
                        </button>
                      </h5>
                    </div>
                    <div
                      id="collapseSix"
                      class="collapse fade"
                      aria-labelledby="headingSix"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="add-table">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="text-align: center">Relation</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">BirthDay</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <select
                                    class="form-control"
                                    id="sel1"
                                    name="relation[]"
                                    style="width: 300px"
                                  >
                                    <option>Spouse</option>
                                    <option>Children</option>
                                    <option>Husband</option>
                                    <option>Son</option>
                                    <option>Daughter</option>
                                  </select>
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="Ai_name[]"
                                    style="width: 300px"
                                  />
                                </td>
                                <td>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="date1"
                                    name="birthday[]"
                                    style="width: 300px"
                                  />
                                </td>
                                <td class="text-center">
                                  <button type="button" class="btn add">
                                    <i
                                      class="fa fa-plus-square fa-2x"
                                      aria-hidden="true"
                                    ></i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- 6 -->

                  <!-----------------------------accor 6 ----------------------------------------->
                </div>
                <!-- accordion -->
              </div>
            </div>
          </section>

          <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
              <div class="submission">
                <button type="submit" class="btn btn-primary save">Save</button>
                <button
                  type="button"
                  onclick="goBack()"
                  class="btn btn-primary"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- col-12 -->

      <!-- -------------------------------------Receipt start----------------------------------------------------------------- -->

      <!-- <div class="container" id="hi" style="margin-right:70px;">

			<div class="row receipt" style="padding-top: 12px;">
				<div class="col-sm-6"><p style="margin-bottom: 0px;font-weight: 600;">|| Hari Sarvothamma ||</p></div>
				<div class="col-sm-6"><p style="margin-bottom: 0px;float: right;font-weight: 600;">|| Vaayu Jeevothamma ||</p></div>
			</div>
			<div class="main" style="border:2px solid #000;padding: 2%;">
				<div class="row">
					<div class="col-sm-2">
						<img src="assets/receipt_logo/logo.png" class="img-fluid d-block mx-auto" style="width:128px;height: 128px;">
					</div>
					<div class="col-sm-10" style="text-align: center;">
						<h5 style="margin-bottom: 0px;">Sri Raghvendra Swamy Seva Samithi (R)</h5>
						<h5>Jayalakshmipuram,Mysore 570012 - Phone:2511355</h5>
						<h5>SEVA  RECEIPT</h5>
					</div>
				</div> -->
      <!------------------------------------------------------>
      <!-- <div class="row" style="padding-top:20px;">
					<div class="col-sm-6">
						<p style="font-weight: 600;margin-bottom: 0px;"><label>Receipt #:</label><input type="text" name="" value="JLPRM-2022/33026" style="border:none;"></p>
						<p style="font-weight: 600;margin-bottom: 0px;"><label>PNR Number:</label><input type="text" name="r_pnr_no" id="r_pnr_no" style="border:none;" readonly></p>
					</div>
					<div class="col-sm-6" style="text-align:end;margin-bottom: 0px;">
						<p style="font-weight: 600;"><label>Date:</label><input type="text" value=""  id="r_date" name="" style="border:none;"></p>
					</div>
				</div> -->
      <!-------------------------------------------------------->
      <!-- <div class="row" style="border-top: 2px dotted;border-bottom: 2px dotted;padding: 8px 0;">
					<div class="col-sm-8">
						<p style="font-weight: 600;margin-bottom: 0px;"><label style="margin-bottom: 0px;font-weight: 600;">Name: &nbsp;&nbsp;</label><input type="text" id="r_name" name="r_name" style="border:none;"></p> -->
      <!-------------------------------------------------------->
      <!-- <p style="margin-bottom: 0px;"><label style="margin-bottom: 0px;font-weight: 600;">Address: &nbsp;&nbsp;</label><input type="text" name="r_address" id="r_address" style="border:none;width: 82%;"></p> -->
      <!-------------------------------------------------------->
      <!-- <div class="row">
							<div class="col-sm-6"><p style="margin-bottom: 0px;"><label style="font-weight:600;margin-bottom: 0px;">Gothra: &nbsp;&nbsp;</label><input type="text" id="r_gothra" name="r_gothra" style="border:none;" readonly>||</p></div>
							<div class="col-sm-6"><p style="margin-bottom: 0px;"><label style="font-weight:600;">Nakshathra: &nbsp;&nbsp;</label><input type="text" id="r_nakshathra" name="r_nakshathra" style="border:none;" readonly></p></div>
						</div>
					</div>
					<div class="col-sm-4" style="text-align: end;">
						<p style="font-weight: 600;margin-bottom: 0px;"><label>Phone:</label><input type="number" id="r_phone" name="r_phone" style="border:none;"></p>
					</div>
				</div> -->
      <!------------------------------------------------------->
      <!-- <div class="row">
					<div class="col-sm-8" style="border-bottom: 2px dotted;">
						<p style="font-weight: 600;margin-bottom: 0px;margin-top: 8px;"><label style="margin-bottom: 0px;">Seva:&nbsp;&nbsp;</label><input type="text" value="Brahmana Hasthodaka Santharpane-0-150" id="r_seva" name="r_seva" style="border:none;width: 92%;"></p>
						<p style="font-weight: 600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Seva Date:&nbsp;&nbsp;</label><input type="text" id="receipt_date1" name="r_sevaDate" style="border:none;"></p>
						<div class="row">
							<div class="col-sm-3">
								<p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Quantity:</label><input type="number" value="1" id="r_quantity" name="" style="border:none;width: 34%;" readonly></p>
							</div>
							<div class="col-sm-4"><p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Rate:</label><input type="number" id="r_rate" name="r_rate" style="border:none;width: 50%;"></p></div>
							<div class="col-sm-4">
								<p style="font-weight:600;margin-bottom: 0px;"><label style="margin-bottom:0px;">Amount:</label><input type="number" id="r_amount" name="r_amount" style="border:none;width: 50%;"></p>
							</div>
						</div>
						<p style="margin-bottom: 8px;font-weight:600;"><label style="margin-bottom:0px;">Remarks:</label><input type="text" name="" style="border:none;"></p>
					</div>
					<div class="col-sm-4" style="border-bottom: 2px dotted;"></div>
				</div> -->
      <!---------------------------------------------------------->
      <!-- <div class="row">
					<div class="col-sm-5">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;">Seva 1 of 1 ** <label style="margin-bottom:0px;">TOTAL AMOUNT:</label><input type="number" id="r_total" name="r_total" style="border:none;width: 35%;">**</p>
					</div>
					<div class="col-sm-4">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;"><label>AMOUNT PAID:</label><input type="number" id="r_amount_paid" name="r_amount_paid"  style="border:none;width: 40%;"></p>
					</div>
					<div class="col-sm-3">
						<p style="font-weight:600;margin-bottom:0px;margin-top: 8px;"><label>BALANCE</label><input type="number" id="r_balance" name="r_balance" style="border:none;width: 40%;"></p>
					</div>
				</div>
				<p style="font-weight:600;margin-bottom:0px;"><label>Cash</label><input type="text" name="" style="border:none;"></p>
				<div class="row" style="border-top: 2px dotted;border-bottom: 2px dotted;margin: 25px 0;">
					<div class="col-sm-4">
						<p style="font-weight:600;margin-top: 8px;">Persons Allowed:&nbsp;&nbsp; <label>For Pooja:</label><input type="number" name="" value="0" style="border: none;width: 20%;">||</p>
					</div>
					<div class="col-sm-3">
						<p style="font-weight:600;margin-top: 8px;"><label>For Hasthodka:</label><input type="number" value="1" name="" style="border:none;width: 25%;"></p>
					</div>
					<div class="col-sm-5">
						<p style="font-weight:600;margin-top: 8px;"><label>Special Instructions:</label><input type="text" id="r_special_instruction" name="r_special_instruction" style="border: none;"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3"><p style="margin-bottom:0px;font-weight: 600;">E.& O.E</p></div>
					<div class="col-sm-6" style="text-align:center;font-weight: 600"><p style="margin-bottom:0px;">PLEASE BRING THIS RECEIPT AT THE TIME OF SEVA</p></div>
					<div class="col-sm-3" style="text-align:end;"><p style="margin-bottom:0px;font-weight: 600">P.T.O</p></div>
				</div>
			</div> -->
      <!-- <div class="row">
				<div class="col-sm-3">
					<a href="" style="color:#000;text-decoration: none;font-weight: 600;">info.ismartonline@gmail.com</a>
				</div>
				<div class="col-sm-6">
					<p style="text-align: center;font-weight: 600;">-iSmart Technologies-</p>
				</div>
				<div class="col-sm-3"></div>
			</div>

			<button type="button" class="btn btn-primary print float-right mr-5" onclick="generatePDF()">Print</button>

		</div> -->

      <!-- ------------------------------------------------receipt end------------------------------------------------------------------ -->
    </div>
    <!-- row -->
  </div>
  <!---content-wrapper----->
</div>
<!--wrapper--->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>

<script>
  $(".others").hide();
  function show() {
    $(".indian").hide();
    $(".others").show();
  }
  function show1() {
    $(".indian").show();
    $(".others").hide();
  }
  function vald() {
    var c = $("#name").val();
    var letters = /^[a-zA-z]+([\s][a-zA-Z]+)*$/;
    if (c.match(letters)) {
      $(".vald").hide();
    } else {
      $(".vald").show();
    }
  }
  function check() {
    var g = $("#pan").val();
    var valpan = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    if (g.match(valpan)) {
      $(".check").hide();
    } else {
      $(".check").show();
    }
  }
  function checks() {
    var k = $("#adhar").val();
    var valdhar = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
    if (k.match(valdhar)) {
      $(".checks").hide();
    } else {
      $(".checks").show();
    }
  }

  $(".validation").hide();
  function validation() {
    var phone = $("#mobile_number").val();
    if (phone.length == 10) {
      $(".validation").hide();
    } else {
      $(".validation").show();
    }
  }

  var total_amount = $(".g_total1").val();
  var amount_paid = $(".advance_amount").val();
  var balance_amount = total_amount - amount_paid;

  $(".advance_amount").keyup(function () {
    var total_amount = $(".g_total1").val();
    var amount_paid = $(".advance_amount").val();
    var balance_amount = total_amount - amount_paid;

    document.querySelector(".balance_amount").value = balance_amount;
  });
</script>

<script type="text/javascript">
  function goBack() {
    location.href = '<?php echo base_url("Puduvattu")?>';
  }

  $("#receipt_date").datepicker({ dateFormat: "dd-mm-yy" });
  $("#receipt_date1").datepicker({ dateFormat: "dd-mm-yy" });

  function generatePDF() {
    var PDF = document.getElementById("hi");
    // newWin.document.write(divToPrint.outerHTML);
    var opt = {
      filename: "Receipt.pdf",
      image: { type: "jpeg", quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: "in", format: "a4", orientation: "portrait" },
    };
    html2pdf().set(opt).from(PDF).save();
    // .from(PDF)
    // .save();
  }
</script>

<!-- <script type="text/javascript">

	//   var mobile = ["1234567890" , "8884013481" , "9844387606"]; 

	  $("#name").autocomplete(
		  {
			  
			  source : function(request, response) {
				$.ajax({
				url: '<?php echo base_url("Puduvattu/auto") ?>',
				data: {
						term : request.term
					},
				dataType: "json",
				success: function(data){
					
					var resp = $.map(data,function(obj){
						return obj.name;
					}); 

					response(resp);
				}
				});
				}
		  },
		  {
			  autoFocus : true,
			  delay : 0,
			  minlength :1 
		  }
	  );
  </script> -->

<script>
  document.querySelector(".che1").style.display = "none";
  document.querySelector(".che2").style.display = "none";
  document.querySelector(".che3").style.display = "none";
  document.querySelector(".che4").style.display = "none";

  function datee() {
    document.querySelector(".che1").style.display = "block";
    document.querySelector(".che2").style.display = "none";
    document.querySelector(".che3").style.display = "none";
    document.querySelector(".che4").style.display = "none";
  }
  function festival2() {
    document.querySelector(".che1").style.display = "none";
    document.querySelector(".che2").style.display = "block";
    document.querySelector(".che3").style.display = "none";
    document.querySelector(".che4").style.display = "none";
  }
  function simple2() {
    document.querySelector(".che1").style.display = "none";
    document.querySelector(".che2").style.display = "none";
    document.querySelector(".che3").style.display = "block";
    document.querySelector(".che4").style.display = "none";
  }
  function panchanga2() {
    document.querySelector(".che1").style.display = "none";
    document.querySelector(".che2").style.display = "none";
    document.querySelector(".che3").style.display = "none";
    document.querySelector(".che4").style.display = "block";
  }
</script>

<script>
  var today = new Date();
  var date =
    today.getDate() + "-" + (today.getMonth() + 1) + "-" + today.getFullYear();
  document.getElementById("booking_date").value = date;
  document.getElementById("payment_date").value = date;

  $("#date1").datepicker({ dateFormat: "dd-mm-yy" });

  var random1 = Math.floor(Math.random() * 1000 * 1000);
  var random = Math.floor(new Date().valueOf() * Math.random());
  var year = today.getFullYear();
  var value = "<?php echo $prefix ?>";
  var ab = value + "-" + year + "/" + random1;

  // 	alert(ab);

  $("#booking_pnr").val(random);
  $("#receipt_no_e").val(ab);

  function get_details() {
    var pincode = $("#pin_code").val();
    if (pincode == "") {
      $("#city").val(" ");
      $("#state").val(" ");
    } else {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url("Puduvattu/city_state") ?>',
        data: { pincode: pincode },
        success: function (response) {
          if (response == "no") {
            toastr.error("Wrong pincode! please enter correct pin");
            $("#city").val(" ");
            $("#state").val(" ");
          } else {
            var getData = $.parseJSON(response);
            console.log(response);
            $("#city").val(getData.city);
            $("#state").val(getData.state);
          }
        },
      });
    }

    // else{
    // 	alert('Please enter 6 digits!');
    // }
  }
</script>

<script type="text/javascript">
  // var date = new Date();

  $("#seva_date").datepicker({
    dateFormat: "dd-mm-yy",
    onSelect: function (dateString, txtDate) {
      myFun(dateString, "date");
    },
  });

  var seva_date = "";

  function myFun(message, type) {
    $("#main_seva").empty();
    seva_date = message;
    date = type;
    if (date == "date") {
      seva_date = message;
      // alert(seva_date);
    } else {
      const today = new Date();
      const yyyy = today.getFullYear();
      let mm = today.getMonth() + 1; // Months start at 0!
      let dd = today.getDate();

      if (dd < 10) dd = "0" + dd;
      if (mm < 10) mm = "0" + mm;

      seva_date = dd + "-" + mm + "-" + yyyy;
      // seva_date = message;
      // alert(seva_date);
    }

    $.ajax({
      type: "POST",
      url: '<?php echo base_url("Puduvattu/check_codename") ?>',
      data: { seva_date: seva_date },
      success: function (response) {
        response = jQuery.parseJSON(response);

        console.log(response);
        if (response.result == 1) {
          $("#main_seva1").removeAttr("readonly");

          for (var i = 0; i < response.message.length; i++) {
            console.log(response.message);
            var mode = "";

            mode += "<option>" + response.message[i].seva_name + "</option>";

            $("#main_seva").append(mode);
          }
        } else {
          toastr["error"](response.message);
        }
      },
    });
  }

  $("#mobile_number").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: '<?php echo base_url("Puduvattu/auto") ?>',
        data: {
          term1: request.term,
        },
        dataType: "json",
        success: function (data) {
          console.log(data);
          var resp = $.map(data, function (obj) {
            return obj.mobile_number;
          });
          console.log(resp);
          response(resp);
        },
      });
    },
    minLength: 1,
  });

  function checksevaname() {
    var seva_name = $("#main_seva1").val();
    // var seva_date = $("#seva_date").val();
    // alert(seva_date);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url("Puduvattu/check_sevaname") ?>',
      data: { seva_name: seva_name, seva_date: seva_date },

      success: function (response) {
        response = jQuery.parseJSON(response);
        console.log(response);

        if (response.result == 1) {
          console.log(response.message);
          console.log(response.msg);
          console.log(response.work);

          $(".amount").val(response.msg.amount);
          $(".sp_id").val(response.sp_id.id);
          $(".seva_id").val(response.seva_id);
          $("#g_total").val(response.msg.amount);
          $(".g_total1").val(response.msg.amount);
          $(".advance_amount").val(response.msg.amount);

          if (response.work == "0") {
            $(".amount").attr("readonly", "readonly");
          } else {
            $("#amount").removeAttr("readonly");
            $(".amount").keyup(function () {
              var amount = $(".amount").val();
              document.getElementById("g_total").value = amount;
              document.querySelector(".g_total1").value = amount;
              document.querySelector(".advance_amount").value = amount;
            });
          }
        } else {
          toastr["error"](response.message);
        }
      },
    });
  }

  //   --------------------------- booking_pnr in contact_details-----------------------

  $(document).ready(function () {
    $("#hide").click(function () {
      $("#radio2").hide();
    });
    $("#show").click(function () {
      $("#radio3").show();
    });
  });

  function checkmobile() {
    var mobile = $("#mobile_number").val();

    $.ajax({
      type: "POST",

      url: '<?php echo base_url("Puduvattu/check_mobile")?>',

      data: { mobile: mobile },

      success: function (response) {
        console.log(response);
        response = jQuery.parseJSON(response);

        console.log(response);

        if (response.result == 1) {
          $(".name").val(response.message.name);

          for (var i = 0; i < response.message.length; i++) {
            var mode = "";
            mode += "<option>" + response.message[i].name + "</option>";

            $("#names").append(mode);
          }
        } else {
          // toastr["error"](response.message);
        }
      },
    });
  }
  function checkad1() {
    var ad1 = $("#address1").val();
    if (ad1 != "") {
      $(".ad1").hide();
    }
  }
  function checkad2() {
    var ad2 = $("#address2").val();
    if (ad2 != "") {
      $(".ad2").hide();
    }
  }
  function checkgo() {
    var go = $("#gothra").val();
    if (go != "") {
      $(".go").hide();
    }
  }
  function checkra() {
    var ra = $("#rashi").val();
    if (ra != "") {
      $(".ra").hide();
    }
  }
  function checkns() {
    var ns = $("#nakshathra").val();
    if (ns != "") {
      $(".ns").hide();
    }
  }

  function checkname() {
    var nm = $("#name").val();
    if (nm != "") {
      $(".nm").hide();
    }
    var name = $("#name").val();
    var mobile_number = $("#mobile_number").val();

    $.ajax({
      type: "POST",

      url: '<?php echo base_url("Puduvattu/check_name")?>',

      data: { name: name, mobile_number: mobile_number },

      success: function (response) {
        console.log(response);
        response = jQuery.parseJSON(response);

        console.log(response);

        if (response.result == 1) {
          // $(".mobile_number").val(response.message.mobile_number);
          $(".address1").val(response.message.address1);
          $(".address2").val(response.message.address2);
          $(".city").val(response.message.city);

          $(".pin_code").val(response.message.pin_code);
          $(".state").val(response.message.state);
          $(".email").val(response.message.email);
          $(".pan").val(response.message.pan);
          $(".adhar").val(response.message.adhar);

          $("#name_of").val(response.message.name);
          $("#rashi").val(response.msg.rashi);
          $("#gothra").val(response.msg.gothra);
          $("#nakshathra").val(response.msg.nakshathra);

          // --------------------for receipt-----------------------------

          $("#r_phone").val(response.message.mobile_number);
          $("#r_address").val(response.message.address1);

          // $(".description").val(response.message.pin_code);
          // $(".r_value").val(response.message.state);
        } else {
          // toastr["error"](response.message);
        }
      },
    });
  }

  $(document).ready(function () {
    $("#booking").show();
    $("#hi").hide();

    $("#booking").submit(function (e) {
      e.preventDefault();
      var aa = "",
        bb = "",
        cc = "",
        dd = "",
        ee = "",
        ff = "";
      var ad1 = $("#address1").val();
      var ad2 = $("#address2").val();
      var nm = $("#name").val();
      var go = $("#gothra").val();
      var ra = $("#rashi").val();
      var ns = $("#nakshathra").val();
      if (ad1 != "") aa = true;
      else {
        $(".ad1").show();
        toastr.error("please enter address1");
      }
      if (ad2 != "") bb = true;
      else {
        $(".ad2").show();
        toastr.error("please enter address2");
      }
      if (nm != "") cc = true;
      else {
        $(".nm").show();
        toastr.error("please enter name");
      }
      if (go != "") dd = true;
      else {
        $(".go").show();
        toastr.error("please enter gothra");
      }
      if (ra != "") ee = true;
      else {
        $(".ra").show();
        toastr.error("please enter rashi");
      }
      if (ns != "") ff = true;
      else {
        $(".ns").show();
        toastr.error("please enter nakshathra");
      }
      if (aa && bb && cc && dd && ee && ff) {
        // if((ad1 != '') && (ad2 != '') && (nm != '') && (go != '') && (ra != '') && (ns != '')){
        // var city = $('#city').val();
        // var state = $('#state').val();
        var comment = $("#comment").val();
        var formData = new FormData(this);

        // formData.append('address1',address1);
        // formData.append('address2',address2);
        // formData.append('city',city);
        // formData.append('state',state);
        formData.append("comment", comment);
        var s = $(".vald").is(":hidden");
        // alert(s);
        var n = $(".validation").is(":hidden");
        var r = $(".check").is(":hidden");
        var t = $(".checks").is(":hidden");
        if (s && n && r && t) {
          $.ajax({
            type: "POST",
            url: '<?php  echo site_url("Puduvattu/cool")  ?>',
            data: formData,

            contentType: false,
            processData: false,

            success: function (response) {
              response = jQuery.parseJSON(response);

              if (response.result == 1) {
                toastr["success"](response.message);

                // console.log(response.message);

                // $("#edit_modal").modal("hide");

                // $('.save').removeAttr("disabled");
                // $(".save").text("hola");

                // $("#booking").trigger("reset");

                // -----------------------------receipt---------------------------------

                console.log(response.gothra);
                console.log(response.msg);

                var date = response.gothra.booking_date;
                var split1 = date.split("-");
                var join = [split1[2], split1[1], split1[0]].join("-");

                $("#r_gothra").val(response.gothra.gothra);
                $("#r_nakshathra").val(response.gothra.nakshathra);
                $("#r_date").val(join);
                $("#r_pnr_no").val(response.gothra.booking_pnr);
                $("#receipt_date1").val(response.gothra.seva_date);
                $("#r_seva").val(response.gothra.main_seva);
                $("#r_name").val(response.gothra.name_of);
                $("#r_rate").val(response.msg.seva_price);

                var quantity = $("#r_quantity").val();
                var rate = $("#r_rate").val();
                var sum = quantity * rate;

                document.getElementById("r_amount").value = sum;
                document.getElementById("r_total").value = sum;

                $("#r_amount_paid").keyup(function () {
                  var totalAmount = $("#r_total").val();
                  var amount_paid = $("#r_amount_paid").val();
                  var balance_amount = totalAmount - amount_paid;

                  document.getElementById("r_balance").value = balance_amount;
                });

                // console.log(response.msg1);
                // var ids = response.msg1;

                // $('.submission1').append('<button type="button" id="print" class="btn btn-primary" onclick="generate('+ids+')">Print</button>');

                // window.location.href="";
                // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
                location.href = '<?php echo base_url("Puduvattu")?>';
              } else {
                toastr["error"](response.message);

                // console.log(response.message);

                // $('.save').removeAttr("disabled");
                // $(".save").text("howla");
                // $("#list3").jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
              }
            },
          });
        } else {
          toastr.error("please enter correct data");
        }
      }
      // else{
      // 	toastr.error('please enter all marked fields');
      // }
    });
  });

  function generate(ids) {
    var id = ids;
    $("#booking").hide();
    $("#hi").show();
    $("#receiptHeading").text("Receipt");

    // alert(id);

    // $.ajax({
    // 	type : "POST",
    // 	url : '<?php  echo base_url("Receipt")  ?>',
    // 	data : {id:id},

    // 	// contentType: false,
    // 	// processData: false,

    // 		// success:function(response){
    // 		// response=jQuery.parseJSON(response);
    // 		// console.log(response);

    // 		// if(response.result== 1){

    // 		// 	toastr["success"](response.message);
    // 		// }
    // 		// else {
    // 		//     toastr["error"](response.message);
    // 		// }
    // 	// }
    // });
  }

  // -------------------------------------adding addition information (jqury)-------------------------

  $(document).ready(function () {
    $(".add").click(function () {
      $("tbody").append(
        '<tr><td><select class="form-control" id="sel1" style="width :300px;" name="relation[]"><option>Spouse</option><option>Children</option><option>Husband</option><option>Son</option><option>Daughter</option></select></td><td><input type="text" class="form-control" style="width :300px;" name="Ai_name[]"></td><td><input type="text" class="form-control date2"  style="width :300px;" name="birthday[]"></td><td class="text-center"><button type="button" class="btn remove" ><i  class="fa fa-minus-square fa-2x " aria-hidden="true"></i></button></td></tr>'
      );

      $(".date2").datepicker({ dateFormat: "dd-mm-yy" });
    });

    $(document).on("click", ".remove", function () {
      $(this).parents("tr").remove();
    });
  });
</script>

<style type="text/css">
  .wrapper-radio {
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
  .wrapper-radio .option {
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
  .wrapper-radio .option .dot {
    /* height: 20px;
  width: 20px;*/
    height: 15px;
    width: 15px;
    background: #d9d9d9;
    border-radius: 50%;
    position: relative;
  }
  .wrapper-radio .option .dot::before {
    position: absolute;
    content: "";
    top: 4px;
    left: 3px;
    width: 8px;
    height: 8px;
    background: #f39309;
    border-radius: 50%;
    opacity: 0;
    transform: scale(1.5);
    transition: all 0.3s ease;
  }
  /*--input[type="radio"]{
  display: none;
}--*/
  #option-1:checked:checked ~ .option-1,
  #option-2:checked:checked ~ .option-2 {
    border-color: #f39309;
    background: #f39309;
  }
  #option-1:checked:checked ~ .option-1 .dot,
  #option-2:checked:checked ~ .option-2 .dot {
    background: #fff;
  }
  #option-1:checked:checked ~ .option-1 .dot::before,
  #option-2:checked:checked ~ .option-2 .dot::before {
    opacity: 1;
    transform: scale(1);
  }
  .wrapper-radio .option span {
    font-size: 15px;
    color: #808080;
  }
  #option-1:checked:checked ~ .option-1 span,
  #option-2:checked:checked ~ .option-2 span {
    color: #fff;
  }
</style>

<?php
  echo view('includes/footer');
?>
