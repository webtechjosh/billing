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
                <h4 style="text-align: center;">Settings</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if($this->session->flashdata('settingUpdate') !=''){
                  echo $this->session->flashdata('settingUpdate');
                }
                 ?>
                <form role="form" name="frmSetting" action="<?php echo base_url('bill/setting');?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email ID: </label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->email;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number: </label>
                        <input id="mobileno" name="mobileno" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->mobileno;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Upload Logo: </label>
                        <input id="logo" name="logoname" type="file" class="form-control" placeholder="Enter..." >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Upload Signature Stamp: </label>
                        <input id="signature" name="signature" type="file" class="form-control" placeholder="Enter..." >
                      </div>
                    </div>
                    
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Account Name: </label>
                        <input id="acc_name" name="acc_name" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->acc_name;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Account Number: </label>
                        <input id="acc_number" name="acc_number" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->acc_number;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IFSC Code: </label>
                        <input id="ifsc" name="ifsc" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->ifsc;?>">
                      </div>
                    </div>                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Bank Name: </label>
                        <input id="bank_name" name="bank_name" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->bank_name;?>"  >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Branch: </label>
                        <input id="branch" name="branch" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->branch;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>UPI ID: </label>
                        <input id="upi" name="upi" type="text" class="form-control" placeholder="Enter..." value="<?php echo $companyInfo->upi;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton" style="text-align: center;">
                        <button type="submit" name="submit" value="save" class="btn btn-success">Update</button>
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
  <script>
        var xx = <?php echo $sn; ?>; //initlal text box count
  </script>
<?php
  $this->load->view('admin/include/footer');
?>