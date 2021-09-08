<?php
  $this->load->view('admin/include/header');
?>
  <!-- /.navbar -->

<?php
  $this->load->view('admin/include/sidebar');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements   -->
            <div class="card card-success">
              <div class="card-header">
                <h4 style="text-align: center;">Change Password</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                  $sucess = $this->session->flashdata('passchange');
                  if($sucess){
                     echo $sucess;
                  }
                ?>
                <form role="form" id="frmChangpassword" name="frmChangpassword" action="<?php echo base_url('bill/changepassword');?>" method="POST">
                  <div class="row">
                  <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Old Password: </label>
                        <input id="oldpassword" name="oldpassword" type="password" class="form-control" placeholder="Old passowrd" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>New Password: </label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="New passowrd" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Confirm Password: </label>
                        <input id="confpassword" name="confpassword" type="password" class="form-control" placeholder="Confirm passowrd" >
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton" style="text-align: center;">
                        <button type="submit" id="changepass" name="submit" value="changepass" class="btn btn-success">Update Password</button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
  $this->load->view('admin/include/footer');
?>