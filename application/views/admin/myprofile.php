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
            <!-- general form elements disabled -->
            <div class="card card-success">
              <div class="card-header">
                <h4>My Profile</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>User ID: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->user_id;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Organisation Name: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->org_name;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Owner Name: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->owner_name;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email ID: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->login_name;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>GST: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->gst;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>CIN Number: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->tin;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->address;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Postal Code: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->zip;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>City: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->city;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>State: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->state;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Landmark: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->landmark;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Approval Status: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->status;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->login_name;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password: </label>
                        <input id="" name="" type="text" class="form-control" value="" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email Status: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->mail_status;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>SMS Status: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->msg_status;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Registration Year: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->msg_status;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Package: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->package_name;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Price: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->price;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Discount: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->discount;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Discount By: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->discount_by;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Documentation Status: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->documentation_status;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Remarks: </label>
                        <input id="" name="" type="text" class="form-control" value="<?php echo $compinfo->remarks;?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton" style="text-align: center;">
                        <a href="<?php echo base_url('user/editprofile'); ?>">
                          <button type="button" class="btn btn-warning">Edit Details</button>
                        </a>
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