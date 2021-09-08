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
                <h4>Edit Profile</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <?php
                $alertmsg = $this->session->flashdata('profileupdatemsg');
                if($alertmsg){

                ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $alertmsg;?> <span class="alert alert-danger"> (Logout and Login required)</span>
                </div>

                <script>
                    $(".alert").delay(4000).slideUp(200, function() {
                        $(this).alert('close');
                    });
                </script>
                <?php  
                }
                    
               ?>




                <form role="form" id="updateprofile" name="updateprofile" action="<?php echo base_url('bill/editprofile');?>" method="POST">
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
                        <input id="org_name" name="org_name" type="text" class="form-control" value="<?php echo $compinfo->org_name;?>"  >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Owner Name: </label>
                        <input id="owner_name" name="owner_name" type="text" class="form-control" value="<?php echo $compinfo->owner_name;?>"  >
                      </div>
                    </div>
<!--                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Email ID: </label>
                        <input id="login_name" name="login_name" type="text" class="form-control" value="<?php //echo $compinfo->login_name;?>"  >
                      </div>
                    </div>-->
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>GST: </label>
                        <input id="gst" name="gst" type="text" class="form-control" value="<?php echo $compinfo->gst;?>" pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}" oninvalid="this.setCustomValidity('Invalid GST no. format')" oninput="this.setCustomValidity('')">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>CIN Number: </label>
                        <input id="tin" name="tin" type="text" class="form-control" value="<?php echo $compinfo->tin;?>"  >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address: </label>
                        <input id="address" name="address" type="text" class="form-control" value="<?php echo $compinfo->address;?>"  >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Postal Code: </label>
                        <input id="zip" name="zip" type="text" class="form-control" value="<?php echo $compinfo->zip;?>" pattern="[0-9]{6}" oninvalid="this.setCustomValidity('Zip should be 6 digits')" oninput="this.setCustomValidity('')">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>City: </label>
                        <input id="city" name="city" type="text" class="form-control" value="<?php echo $compinfo->city;?>"  >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>State: </label>
                        <!--<input id="state" name="state" type="text" class="form-control" value="<?php //echo $compinfo->state;?>"  >-->
                        <input type="hidden" id="state" name="state" value="<?php echo $compinfo->state ;?>">
                          <select id="state_code" name="state_code" class="form-control" required>
                              <option value="">--State--</option>
                              <option value="35" <?= ($compinfo->state_code == "35")?'selected':'';?>>Andaman and Nicobar Islands</option>
                              <option value="28" <?= ($compinfo->state_code == "28")?'selected':'';?>>Andhra Pradesh</option>
                              <option value="37" <?= ($compinfo->state_code == "37")?'selected':'';?>>Andhra Pradesh (New)</option>
                              <option value="12" <?= ($compinfo->state_code == "12")?'selected':'';?>>Arunachal Pradesh</option>
                              <option value="18" <?= ($compinfo->state_code == "18")?'selected':'';?>>Assam</option>
                              <option value="10" <?= ($compinfo->state_code == "10")?'selected':'';?>>Bihar</option>
                              <option value="04" <?= ($compinfo->state_code == "04")?'selected':'';?>>Chandigarh</option>
                              <option value="22" <?= ($compinfo->state_code == "22")?'selected':'';?>>Chattisgarh</option>
                              <option value="26" <?= ($compinfo->state_code == "26")?'selected':'';?>>Dadra and Nagar Haveli</option>
                              <option value="25" <?= ($compinfo->state_code == "25")?'selected':'';?>>Daman and Diu</option>
                              <option value="07" <?= ($compinfo->state_code == "07")?'selected':'';?>>Delhi</option>
                              <option value="30" <?= ($compinfo->state_code == "30")?'selected':'';?>>Goa</option>
                              <option value="24" <?= ($compinfo->state_code == "24")?'selected':'';?>>Gujarat</option>
                              <option value="06" <?= ($compinfo->state_code == "06")?'selected':'';?>>Haryana</option>
                              <option value="02" <?= ($compinfo->state_code == "02")?'selected':'';?>>Himachal Pradesh</option>
                              <option value="01" <?= ($compinfo->state_code == "01")?'selected':'';?>>Jammu and Kashmir</option>
                              <option value="20" <?= ($compinfo->state_code == "20")?'selected':'';?>>Jharkhand</option>
                              <option value="29" <?= ($compinfo->state_code == "29")?'selected':'';?>>Karnataka</option>
                              <option value="32" <?= ($compinfo->state_code == "32")?'selected':'';?>>Kerala</option>
                              <option value="38" <?= ($compinfo->state_code == "38")?'selected':'';?>>Ladakh</option>
                              <option value="31" <?= ($compinfo->state_code == "31")?'selected':'';?>>Lakshadweep Islands</option>
                              <option value="23" <?= ($compinfo->state_code == "23")?'selected':'';?>>Madhya Pradesh</option>
                              <option value="27" <?= ($compinfo->state_code == "27")?'selected':'';?>>Maharashtra</option>
                              <option value="14" <?= ($compinfo->state_code == "14")?'selected':'';?>>Manipur</option>
                              <option value="17" <?= ($compinfo->state_code == "17")?'selected':'';?>>Meghalaya</option>
                              <option value="15" <?= ($compinfo->state_code == "15")?'selected':'';?>>Mizoram</option>
                              <option value="13" <?= ($compinfo->state_code == "13")?'selected':'';?>>Nagaland</option>
                              <option value="21" <?= ($compinfo->state_code == "21")?'selected':'';?>>Odisha</option>
                              <option value="34" <?= ($compinfo->state_code == "34")?'selected':'';?>>Pondicherry</option>
                              <option value="03" <?= ($compinfo->state_code == "03")?'selected':'';?>>Punjab</option>
                              <option value="08" <?= ($compinfo->state_code == "08")?'selected':'';?>>Rajasthan</option>
                              <option value="11" <?= ($compinfo->state_code == "11")?'selected':'';?>>Sikkim</option>
                              <option value="33" <?= ($compinfo->state_code == "33")?'selected':'';?>>Tamil Nadu</option>
                              <option value="36" <?= ($compinfo->state_code == "36")?'selected':'';?>>Telangana</option>
                              <option value="16" <?= ($compinfo->state_code == "16")?'selected':'';?>>Tripura</option>
                              <option value="09" <?= ($compinfo->state_code == "09")?'selected':'';?>>Uttar Pradesh</option>
                              <option value="05" <?= ($compinfo->state_code == "05")?'selected':'';?>>Uttarakhand</option>
                              <option value="19" <?= ($compinfo->state_code == "19")?'selected':'';?>>West Bengal</option>
                          </select>  
                        
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Landmark: </label>
                        <input id="landmark" name="landmark" type="text" class="form-control" value="<?php echo $compinfo->landmark;?>"  >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Approval Status: </label>
                        <input id="status" name="status" type="text" class="form-control" value="<?php echo $compinfo->status;?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username: </label>
                        <input id="login_name" name="login_name" type="text" class="form-control" value="<?php echo $compinfo->email;?>" disabled>
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
                        <a href="<?php echo base_url('bill/editprofile'); ?>">
                          <button type="submit" id="update" name="update" value="profile" class="btn btn-success">Update</button>
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