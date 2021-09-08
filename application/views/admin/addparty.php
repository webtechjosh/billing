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
                <h4 style="text-align: center;">Add Party</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                
                if($this->session->flashdata('partyemaierror') !=''){
                  echo $this->session->flashdata('partyemaierror');
                }
                 ?>
                <form role="form" id="frmpartyentry" method="post" action="<?php base_url('bill/addparty')?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party Name </label>
                        <input id="company_name" name="company_name" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('company_name');?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>GST: </label>
                        <input id="gst" name="gst" type="text" class="form-control" placeholder="Enter..."value="<?php echo $this->input->post('gst');?>" pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}" oninvalid="this.setCustomValidity('Invalid GST no. format')" oninput="this.setCustomValidity('')">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Owner Name: </label>
                        <input id="owner_name" name="owner_name" type="text" class="form-control" placeholder="Enter..."value="<?php echo $this->input->post('owner_name');?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number: </label>
                        <input id="mobileno" name="mobileno" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('mobileno');?>" placeholder="Enter..." pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Mobile no. should be 10 digits')" oninput="this.setCustomValidity('')" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email ID: </label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('email');?>" required> 
                         <?php 
                          if(isset($erromail)) echo "<span>".$erromail."</span>";
                        ?>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Street Address: </label>
                        <input id="address" name="address" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('country');?>"  required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>City: </label>
                        <input id="city" name="city" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('country');?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>State: </label>
                        <!--<input id="state" name="state" type="text" class="form-control" placeholder="Enter..." value="<?php //echo $this->input->post('country');?>" required>-->
                        <input type="hidden" id="state" name="state" value="<?php echo $this->input->post('state');?>">
                          <select id="state_code" name="state_code" class="form-control" required>
                              <option value="">--State--</option>
                              <option value="35">Andaman and Nicobar Islands</option>
                              <option value="28">Andhra Pradesh</option>
                              <option value="37">Andhra Pradesh (New)</option>
                              <option value="12">Arunachal Pradesh</option>
                              <option value="18">Assam</option>
                              <option value="10">Bihar</option>
                              <option value="04">Chandigarh</option>
                              <option value="22">Chattisgarh</option>
                              <option value="26">Dadra and Nagar Haveli</option>
                              <option value="25">Daman and Diu</option>
                              <option value="07">Delhi</option>
                              <option value="30">Goa</option>
                              <option value="24">Gujarat</option>
                              <option value="06">Haryana</option>
                              <option value="02">Himachal Pradesh</option>
                              <option value="01">Jammu and Kashmir</option>
                              <option value="20">Jharkhand</option>
                              <option value="29">Karnataka</option>
                              <option value="32">Kerala</option>
                              <option value="38">Ladakh</option>
                              <option value="31">Lakshadweep Islands</option>
                              <option value="23">Madhya Pradesh</option>
                              <option value="27">Maharashtra</option>
                              <option value="14">Manipur</option>
                              <option value="17">Meghalaya</option>
                              <option value="15">Mizoram</option>
                              <option value="13">Nagaland</option>
                              <option value="21">Odisha</option>
                              <option value="34">Pondicherry</option>
                              <option value="03">Punjab</option>
                              <option value="08">Rajasthan</option>
                              <option value="11">Sikkim</option>
                              <option value="33">Tamil Nadu</option>
                              <option value="36">Telangana</option>
                              <option value="16">Tripura</option>
                              <option value="09">Uttar Pradesh</option>
                              <option value="05">Uttarakhand</option>
                              <option value="19">West Bengal</option>
                          </select>                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Country: </label>
                        <input id="country" name="country" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('country');?>" required>
                      </div>
                    </div>                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Postal Code: </label>
                        <input id="zip" name="zip" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('zip');?>" pattern="[0-9]{6}" oninvalid="this.setCustomValidity('Zip should be 6 digits')" oninput="this.setCustomValidity('')" required>
                      </div>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label>Remark: </label>
                        <input id="remark" name="remark" type="text" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('remark');?>">
                      </div>
                    </div>
                  </div>                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton" style="text-align: center;">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">Save Party</button>
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