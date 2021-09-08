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
                <h4 style="text-align: center;">Edit Party Details</h4>
              </div>
              <?php //print_r($partyDetails); ?>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="editparty" name="editparty" action="<?php echo base_url('bill/editparty/'.$partyDetails->id);?>" method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Company Name </label>
                        <input id="company_name" name="company_name" type="text" class="form-control" value="<?php echo $partyDetails->company_name;?>" placeholder="Enter...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>GST: </label>
                        <input id="gst" name="gst" type="text" class="form-control" value="<?php echo $partyDetails->gst;?>" placeholder="Enter..." pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}" oninvalid="this.setCustomValidity('Invalid GST no. format')" oninput="this.setCustomValidity('')">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Owner Name: </label>
                        <input id="owner_name" name="owner_name" type="text" class="form-control" value="<?php echo $partyDetails->owner_name;?>" placeholder="Enter..." >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number: </label>
                        <input id="mobileno" name="mobileno" type="text" class="form-control" value="<?php echo $partyDetails->mobileno;?>" placeholder="Enter..." pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Mobile no. should be 10 digits')" oninput="this.setCustomValidity('')" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email ID: </label>
                        <input id="email" name="email" type="text" class="form-control" value="<?php echo $partyDetails->email;?>" placeholder="Enter..." >
                          <?php 
                           if(isset($erromail)) echo "<span>".$erromail."</span>";
                        ?>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Street Address: </label>
                        <input id="address" name="address" type="text" class="form-control" value="<?php echo $partyDetails->address;?>" placeholder="Enter..."  >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>City: </label>
                        <input id="city" name="city" type="text" class="form-control" value="<?php echo $partyDetails->city;?>" placeholder="Enter..."  >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>State: </label>
                        <!--<input id="state" name="state" type="text" class="form-control" value="<?php //echo $partyDetails->state;?>" placeholder="Enter..."  >-->
                        
                        <input type="hidden" id="state" name="state" value="<?php echo $partyDetails->state ;?>">
                          <select id="state_code" name="state_code" class="form-control" required>
                              <option value="">--State--</option>
                              <option value="35" <?= ($partyDetails->state_code == "35")?'selected':'';?>>Andaman and Nicobar Islands</option>
                              <option value="28" <?= ($partyDetails->state_code == "28")?'selected':'';?>>Andhra Pradesh</option>
                              <option value="37" <?= ($partyDetails->state_code == "37")?'selected':'';?>>Andhra Pradesh (New)</option>
                              <option value="12" <?= ($partyDetails->state_code == "12")?'selected':'';?>>Arunachal Pradesh</option>
                              <option value="18" <?= ($partyDetails->state_code == "18")?'selected':'';?>>Assam</option>
                              <option value="10" <?= ($partyDetails->state_code == "10")?'selected':'';?>>Bihar</option>
                              <option value="04" <?= ($partyDetails->state_code == "04")?'selected':'';?>>Chandigarh</option>
                              <option value="22" <?= ($partyDetails->state_code == "22")?'selected':'';?>>Chattisgarh</option>
                              <option value="26" <?= ($partyDetails->state_code == "26")?'selected':'';?>>Dadra and Nagar Haveli</option>
                              <option value="25" <?= ($partyDetails->state_code == "25")?'selected':'';?>>Daman and Diu</option>
                              <option value="07" <?= ($partyDetails->state_code == "07")?'selected':'';?>>Delhi</option>
                              <option value="30" <?= ($partyDetails->state_code == "30")?'selected':'';?>>Goa</option>
                              <option value="24" <?= ($partyDetails->state_code == "24")?'selected':'';?>>Gujarat</option>
                              <option value="06" <?= ($partyDetails->state_code == "06")?'selected':'';?>>Haryana</option>
                              <option value="02" <?= ($partyDetails->state_code == "02")?'selected':'';?>>Himachal Pradesh</option>
                              <option value="01" <?= ($partyDetails->state_code == "01")?'selected':'';?>>Jammu and Kashmir</option>
                              <option value="20" <?= ($partyDetails->state_code == "20")?'selected':'';?>>Jharkhand</option>
                              <option value="29" <?= ($partyDetails->state_code == "29")?'selected':'';?>>Karnataka</option>
                              <option value="32" <?= ($partyDetails->state_code == "32")?'selected':'';?>>Kerala</option>
                              <option value="38" <?= ($partyDetails->state_code == "38")?'selected':'';?>>Ladakh</option>
                              <option value="31" <?= ($partyDetails->state_code == "31")?'selected':'';?>>Lakshadweep Islands</option>
                              <option value="23" <?= ($partyDetails->state_code == "23")?'selected':'';?>>Madhya Pradesh</option>
                              <option value="27" <?= ($partyDetails->state_code == "27")?'selected':'';?>>Maharashtra</option>
                              <option value="14" <?= ($partyDetails->state_code == "14")?'selected':'';?>>Manipur</option>
                              <option value="17" <?= ($partyDetails->state_code == "17")?'selected':'';?>>Meghalaya</option>
                              <option value="15" <?= ($partyDetails->state_code == "15")?'selected':'';?>>Mizoram</option>
                              <option value="13" <?= ($partyDetails->state_code == "13")?'selected':'';?>>Nagaland</option>
                              <option value="21" <?= ($partyDetails->state_code == "21")?'selected':'';?>>Odisha</option>
                              <option value="34" <?= ($partyDetails->state_code == "34")?'selected':'';?>>Pondicherry</option>
                              <option value="03" <?= ($partyDetails->state_code == "03")?'selected':'';?>>Punjab</option>
                              <option value="08" <?= ($partyDetails->state_code == "08")?'selected':'';?>>Rajasthan</option>
                              <option value="11" <?= ($partyDetails->state_code == "11")?'selected':'';?>>Sikkim</option>
                              <option value="33" <?= ($partyDetails->state_code == "33")?'selected':'';?>>Tamil Nadu</option>
                              <option value="36" <?= ($partyDetails->state_code == "36")?'selected':'';?>>Telangana</option>
                              <option value="16" <?= ($partyDetails->state_code == "16")?'selected':'';?>>Tripura</option>
                              <option value="09" <?= ($partyDetails->state_code == "09")?'selected':'';?>>Uttar Pradesh</option>
                              <option value="05" <?= ($partyDetails->state_code == "05")?'selected':'';?>>Uttarakhand</option>
                              <option value="19" <?= ($partyDetails->state_code == "19")?'selected':'';?>>West Bengal</option>
                          </select>  
                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Country: </label>
                        <input id="country" name="country" type="text" class="form-control" value="<?php echo $partyDetails->country;?>" placeholder="Enter..."  >
                      </div>
                    </div>                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Postal Code: </label>
                        <input id="zip" name="zip" type="text" class="form-control" value="<?php echo $partyDetails->zip;?>" placeholder="Enter..." pattern="[0-9]{6}" oninvalid="this.setCustomValidity('Zip should be 6 digits')" oninput="this.setCustomValidity('')" >
                      </div>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label>Remark: </label>
                        <input id="remark" name="remark" type="text" class="form-control" placeholder="Enter..." value="<?php echo $partyDetails->remark;?>">
                      </div>
                    </div>
                  </div>                  
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton" style="text-align: center;">
                        <button type="submit" id="updateparty" name="submit" value="update" class="btn btn-success">Update</button>
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