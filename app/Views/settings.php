
 <?php
    echo view('includes/header',$temple_details);

?>


    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">        
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='<?php echo base_url("Dashboard")?>'>Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="general-booking ml-4 mr-4">

        <h4>change password</h4><br/>

        <form class="bg-white" id="change_password" >
          <div class="row">

            <div class="">
                <div class="form-group">
                    <div class="row book-detail">

                        <div class="">
                            <label for="number">Enter Old Password</label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control old_pwd " name="old_pwd">
                        </div>

                    </div>
                </div>
            </div>               
          </div>

          <div class="row">

            <div class="">
                <div class="form-group">
                    <div class="row book-detail">

                        <div class="">
                            <label for="number">New Password</label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control  new_pwd" name="new_pwd">
                        </div>

                    </div>
                </div>
            </div>               
          </div>

          <div class="row">

            <div class="">
                <div class="form-group">
                    <div class="row book-detail">

                        <div class="">
                            <label for="number">Confirm New Password</label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control  conf_pwd" name="conf_pwd">
                        </div>

                    </div>
                </div>
            </div>               
          </div>

          <div class="col-sm-4 mt-4">

            <div class="">
              
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="button" id="reset" class="btn btn-primary">Reset</button>
                
            </div>

          </div>
            
         
        </form>
      </div>

     
     <!-- <section class="settings">
       
     </section> -->

      
       

  
    </div><!---content-wrapper----->
   
  <script>

      $('#change_password').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          type : 'POST',
          url : '<?php echo site_url("Settings/change") ?>',
          data : formData, 

          contentType: false,
          processData: false,
          success:function(response){
            response = jQuery.parseJSON(response);
            console.log(response);
            if(response.result== 1){
              toastr["success"](response.message);
              $('#change_password')[0].reset();
            }
            else
              toastr["error"](response.message);
          }
        });
      });

      $('#reset').click(function(){
        // document.getElementById('#change_password').reset();
        $('.old_pwd').val('');
        $('.new_pwd').val('');
        $('.conf_pwd').val('');
      });

    
  </script>
   


<?php
  echo view('includes/footer');
?>
