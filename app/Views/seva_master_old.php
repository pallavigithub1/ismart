<?php

  echo view('includes/header',$temple_details);

?>
<div class="content-wrapper">

  		<div class="content-header">
	      <div class="container-fluid">        
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Seva Master</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Seva Master</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>

  	<section class="seva-content">
  		<div class="">
  			<div class="seva-master">
  				<div class="row">
  					<div class="col-sm-9">
  						
  					</div>
  					<div class="col-sm-3">
  						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add New  </button> -->
  						<a href="<?php echo base_url('Seva/add_seva');?>" class="add-seva">Add New</a>
  					</div>
  				</div>
  				<div class="table-responsive">
  					<table class="table table table-bordered">
  						 <thead>
						      <tr>
						        <th>Seva Code</th>
						        <th>Seva Name</th>
						        <th>Amount</th>
						        <th>Per Day_Quota</th>
						        <th>Effective Start Date</th>
						        <th>Effective End Date</th>
						        <th>Per Day_Online Quota</th>
						        <th>Booking End Date</th>
						      </tr>
				    	</thead>
				    	<tbody>
				    		<tr>
				    			<td>
				    			  <input type="text"  id="code"  name="seva_code" required>	
				    			</td>
				    			<td>
				    				<input type="name"  id="code"  name="seva_name" required>		
				    			</td>
				    			<td>
				    				<input type="number"  id="code"  name="seva_num" required>	
				    			</td>
				    			<td>
				    				<input type="text"  id="code"  name="seva_code" required>	
				    			</td>
				    			<td>
				    				<input type="date"  id="code"  name="seva_date" required>	
				    			</td>
				    			<td>
				    				<input type="date"  id="code"  name="seva_date" required>	
				    			</td>
				    			<td>
				    				<input type="text"  id="code"  name="seva_code" required>	
				    			</td>
				    			<td>
				    				<input type="date"  id="code"  name="seva_code" required>	
				    			</td>
				    		</tr>
				    		<tr>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    		</tr>
				    		<tr>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    		</tr>
				    		<tr>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    		</tr>
				    		<tr>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    			<td></td>
				    		</tr>
				    	</tbody>
  					</table>
  				</div>
  			</div>	
  		</div>

  		 <!-- <div class="modal" id="myModal">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		      
		       
		        <div class="modal-header">
		          <h4 class="modal-title">Add New</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		       
		        <div class="modal-body">

		         	<div class="row">
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Seva Code</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="number" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Seva Name</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="text" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         	</div>

		         	<div class="row">
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Amount</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="number" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Per_Day_Quota</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="number" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         	</div>

		         	<div class="row">
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Effective Start</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="date" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Effective End</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="date" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         	</div>

		         	<div class="row">
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>Per Day Quota</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="number" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         		<div class="col-sm-6">
		         			<div class="form-group">
		         				<div class="row">
		         					<div class="col-sm-4">
		         						<label>End Date</label>
		         					</div>
		         					<div class="col-sm-8">
		         						<input type="date" class="form-control" name="">
		         					</div>
		         				</div>
		         			</div>
		         		</div>
		         	</div>

		         	<div class="row">
	  					<div class="col-sm-4"></div>
	  					<div class="col-sm-4" style="text-align: center;"> <button type="button" class="btn btn-primary">Submit</button></div>
	  					<div class="col-sm-4"></div>
	  				</div>

		        </div>
		        
		        
		       
		        
		      </div>
		    </div>
  		</div> -->


  	</section>

  	</div><!---content-wrapper----->	


 <?php
  echo view('includes/footer');
?>	

  	