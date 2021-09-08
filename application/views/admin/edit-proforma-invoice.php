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
    <!--<section class="content-header">-->
    <!--  <div class="container-fluid">-->
        <!-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proforma Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Proforma Invoice</li>
            </ol>
          </div>
        </div> -->
      <!--</div>--><!-- /.container-fluid -->
    <!--</section>-->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
    <?php
    $idLogo = $this->session->userdata('userID'); 
    $logo_name = insert_logo_on_bill($idLogo);
    ?>

          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-success">
              <div class="card-header">
                <h4 style="text-align: center;">Edit Proforma Invoice</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="editproformabill" name="editproformabill" method="post" action="<?php echo base_url('bill/edit_proforma_bill/'.$billData->id);?>">
                <input type="hidden" id="action" name="action" value="save">                  
                <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party Name: </label>
                        <input type="text" id="party_name" name="party_name" class="form-control" placeholder="Enter ..." value="<?php echo $billData->party_name ;?>"><span id="errorname"></span>
                        <div id="display"></div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party GST Number: </label>
                        <input type="text" id="gstno" name="gstno" class="form-control" placeholder="Enter..." value="<?php echo $billData->gstno ;?>" /><span id="errorgst"></span>
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party Mobile Number: </label>
                        <input id="mobileno" name="mobileno" class="form-control" placeholder="Enter..." value="<?php echo $billData->mobileno ;?>"><span id="errormob"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party Address: </label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter ..." value="<?php echo $billData->address ;?>"><span id="erroradd"></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email: </label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter ..." value="<?php echo $billData->email ;?>"><span id="erroradd"></span>
                      </div>
                    </div>                    


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party State: </label>
                        <!--<input type="text" id="state" name="state" class="form-control" placeholder="Enter ..." value="<?php //echo $billData->state ;?>">-->
                          <input type="hidden" id="state" name="state" value="<?php echo $billData->state ;?>">
                          <select id="state_code" name="state_code" class="form-control" required>
                              <option value="">--State--</option>
                              <option value="35" <?= ($billData->state_code=="35")?'selected' :'';?>>Andaman and Nicobar Islands</option>
                              <option value="28" <?= ($billData->state_code=="28")?'selected' :'';?>>Andhra Pradesh</option>
                              <option value="37" <?= ($billData->state_code=="37")?'selected' :'';?>>Andhra Pradesh (New)</option>
                              <option value="12" <?= ($billData->state_code=="12")?'selected' :'';?>>Arunachal Pradesh</option>
                              <option value="18" <?= ($billData->state_code=="18")?'selected' :'';?>>Assam</option>
                              <option value="10" <?= ($billData->state_code=="10")?'selected' :'';?>>Bihar</option>
                              <option value="04" <?= ($billData->state_code=="04")?'selected' :'';?>>Chandigarh</option>
                              <option value="22" <?= ($billData->state_code=="22")?'selected' :'';?>>Chattisgarh</option>
                              <option value="26" <?= ($billData->state_code=="26")?'selected' :'';?>>Dadra and Nagar Haveli</option>
                              <option value="25" <?= ($billData->state_code=="25")?'selected' :'';?>>Daman and Diu</option>
                              <option value="07" <?= ($billData->state_code=="07")?'selected' :'';?>>Delhi</option>
                              <option value="30" <?= ($billData->state_code=="30")?'selected' :'';?>>Goa</option>
                              <option value="24" <?= ($billData->state_code=="24")?'selected' :'';?>>Gujarat</option>
                              <option value="06" <?= ($billData->state_code=="06")?'selected' :'';?>>Haryana</option>
                              <option value="02" <?= ($billData->state_code=="02")?'selected' :'';?>>Himachal Pradesh</option>
                              <option value="01" <?= ($billData->state_code=="01")?'selected' :'';?>>Jammu and Kashmir</option>
                              <option value="20" <?= ($billData->state_code=="20")?'selected' :'';?>>Jharkhand</option>
                              <option value="29" <?= ($billData->state_code=="29")?'selected' :'';?>>Karnataka</option>
                              <option value="32" <?= ($billData->state_code=="32")?'selected' :'';?>>Kerala</option>
                              <option value="38" <?= ($billData->state_code=="38")?'selected' :'';?>>Ladakh</option>
                              <option value="31" <?= ($billData->state_code=="31")?'selected' :'';?>>Lakshadweep Islands</option>
                              <option value="23" <?= ($billData->state_code=="23")?'selected' :'';?>>Madhya Pradesh</option>
                              <option value="27" <?= ($billData->state_code=="27")?'selected' :'';?>>Maharashtra</option>
                              <option value="14" <?= ($billData->state_code=="14")?'selected' :'';?>>Manipur</option>
                              <option value="17" <?= ($billData->state_code=="17")?'selected' :'';?>>Meghalaya</option>
                              <option value="15" <?= ($billData->state_code=="15")?'selected' :'';?>>Mizoram</option>
                              <option value="13" <?= ($billData->state_code=="13")?'selected' :'';?>>Nagaland</option>
                              <option value="21" <?= ($billData->state_code=="21")?'selected' :'';?>>Odisha</option>
                              <option value="34" <?= ($billData->state_code=="34")?'selected' :'';?>>Pondicherry</option>
                              <option value="03" <?= ($billData->state_code=="03")?'selected' :'';?>>Punjab</option>
                              <option value="08" <?= ($billData->state_code=="08")?'selected' :'';?>>Rajasthan</option>
                              <option value="11" <?= ($billData->state_code=="11")?'selected' :'';?>>Sikkim</option>
                              <option value="33" <?= ($billData->state_code=="33")?'selected' :'';?>>Tamil Nadu</option>
                              <option value="36" <?= ($billData->state_code=="36")?'selected' :'';?>>Telangana</option>
                              <option value="16" <?= ($billData->state_code=="16")?'selected' :'';?>>Tripura</option>
                              <option value="09" <?= ($billData->state_code=="09")?'selected' :'';?>>Uttar Pradesh</option>
                              <option value="05" <?= ($billData->state_code=="05")?'selected' :'';?>>Uttarakhand</option>
                              <option value="19" <?= ($billData->state_code=="19")?'selected' :'';?>>West Bengal</option>
                          </select><span id="errorstate"></span>                        
                      </div>
                    </div>
                  </div>
                  <hr>  
                <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Proforma Invoice No. Prefix: </label>
                        <input type="text" id="prefix" name="prefix" class="form-control" placeholder="Enter ... "value="<?php echo $billData->prefix ;?>" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Proforma Invoice No.: </label>
                        <input type="text" id="billno" name="billno" class="form-control" placeholder="Enter ..." value="<?php echo $billData->billno ;?>" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Date: </label>
                        <input type="date" id="invoice_date" name="invoice_date" class="form-control" value=""><span id="errordate"></span>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <?php
                        $sn = 1;
                      ?>
                    
                      <label>Particulars: </label>
                      <!-- /.card-header -->
                      <div class="table-responsive">
                      <table class="table table-bordered partiCularTable" id="invoiceparticulars">
                        <thead>                  
                          <tr>
                            <th>Particulars</th>
                            <th>HSN</th>
                            <th>Rate</th>
                            <th>GST(%)</th>
                            <th>MRP(With GST)</th>
                            <th>Quantity</th>
                            <th>Discounts(%)</th>
                            <th>Total</th>
                            <th>Add/Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $particulars = json_decode($billData->particulars);
                         // print_r($particulars);
                          foreach ($particulars as $key => $value) {
                         ?>  
                          <tr id="rowid<?php echo $sn ?>">
                            <td><input id="desc_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][desc]" value="<?php echo $value->desc;?>"></td>
                            <td><input id="hsn_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][hsn]" value="<?php echo $value->hsn;?>" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="rate_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][rate]" value="<?php echo $value->rate;?>" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="gst_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][gst]" value="<?php echo $value->gst;?>" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="mrpgst_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][mrpgst]" value="<?php echo $value->mrpgst;?>" onchange="calwithrespecttogst(<?php echo $sn;?>)"></td>
                            <td><input id="qty_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][qty]" value="<?php echo $value->qty;?>" onchange="calculate1(<?php echo $sn;?>)"></td>
                            <td><input id="disc_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][disc]" value="<?php echo $value->disc;?>" onchange="calculate1(<?php echo $sn;?>)"></td>
                            <td><input id="total_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][total]" value="<?php echo $value->total;?>" onchange="calculate1(<?php echo $sn;?>)" readonly></td>

                            <?php
                              if($sn>1){
                             ?>  
                             <td> 
                             <button type="button" class="btn btn-danger removerow" onclick="removeitem(<?php echo $sn;?>)"><i class="fas fa-trash"></i></button></td>
                            <?php   
                              }
                            ?>
                          </tr>
                          <?php 
                          $sn++;
                            }
                          ?>
                        </tbody>
                      </table>
                      </div>

                       <div style="float:left">
                        <button type="button" class="btn btn-info addrow"><i class="fas fa-plus"></i></button>  Add New Row 
                      </div>
                      <div style="float:right">
                        <h4>Grand Total: <span id="grand_total"></span></h4>
                      </div>
                      
                    </div>

                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Narration: </label>
                        <textarea id="narration" name="narration" class="form-control narration" rows="3" placeholder="Enter..."><?php echo $billData->narration;?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bill Footer Content (declaration, bank info, etc)</label>
                        <textarea id="bill_footer" name="bill_footer" class="form-control footercontents" rows="3" placeholder="Enter..."><?php echo $billData->bill_footer;?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton">
                        <div class="previewModal">
                        <button type="button" id="previeweditproformainvoice" class="btn btn-success" data-toggle="modal">
                          Preview Invoice
                        </button>
                      </div>

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



                    <!-- Modal start -->
                  <div class="modal fade" id="modal-xl">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Invoice Preview</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                          <div class="row">
                            <div class="col-md-12">
                              <div class="taxinvoice" id="printableArea1">
                    
                                <div class="invoiceBody">
                                    <table width="100%" class="header">
                                        <tr>
                                            <td rowspan="3"><div class="printLogo center" style="text-align: center;"><img src="<?php echo base_url('uploads/'.$logo_name) ?>" alt="image" ></div></td>
                                            <td>
                                                <div class="center"><h2><?php echo $this->session->userdata('userCompanyName');?></h2></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="center">
                                                    <p><?php echo $this->session->userdata('userCompanyAddress');?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
<!--                                         <tr>
                                            <td>
                                                <div class="center">
                                                    <p>GSTIN: 09AAHCG8640C1ZL</p>
                                                </div>
                                            </td>
                                        </tr>         -->
                                    </table>
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td  height="30" style="text-align: center;">
                                                <div class="center"><h2>PROFORMA INVOICE</h2></div>
                                            </td>
                                        </tr>
                                    </table>
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td colspan="2" width="50%">
                                                <div class="center"><h4>Bill To Party</h4></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="center"><h4>Details</h4></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div><p>Name</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printpartyname"></p></div>
                                            </td>
                                            <td>
                                                <div><p>Invoice No.</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printinvoiceno"></p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>Address</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printaddress"></p></div>
                                            </td>
                                            <td>
                                                <div><p>Invoice Date</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printdate"></p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>GSTIN</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printgst"></p></div>
                                            </td>
                                            <td>
                                                <div><p>State</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printstate"></p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>Mobile No</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printmobno"></p></div>
                                            </td>
                                            <td>
                                                <div><p>State Code</p></div>
                                            </td>
                                            <td>
                                                <div><p id="printstatecode"></p></div>
                                            </td>
                                        </tr>
                                    </table>
    
                                    <table width="100%" class="itemtable" >
                                        <thead>
                                            <tr>
                                                <th><p>SR NO.</p></th>
                                                <th><p>PARTICULARS</p></th>
                                                <th><p>HSN/SAC</p></th>
                                                <th><p>RATE(INR)</p></th>
                                                <th><p>QTY</p></th>
                                                <th><p>DISCOUNT%</p></th>
                                                <th><p>TOTAL (INR)</p></th>
                                            </tr>
                                        </thead>
                                        <tbody id="itembody">
                                        </tbody>
                                    </table width="100%">
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <th colspan="3" rowspan="2" style="width: 70%;" >
                                              <div class="declarationHeading"><h5><u>Narration:</u></h5></div>
                                              <span id="printnarration"></span>
                                              <div class="declarationHeading"><h5><u>Declaration:</u></h5></div>
                                              <span id="printfooter"></span> 
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4" >
                                                <div class="sign">
                                                   <h4>For <?php echo $this->session->userdata('userCompanyName');?></h4>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="10" height="25px" style="text-align: center;"> This is a computer generated document.
                                                                                        <?php 
                                                if($this->session->userdata('regType') == 'Free' ){
                                            ?>
                                            By <img src="<?php echo base_url('assets/admin/dist/img/logo.png') ?>" alt="image" style="height:30px;" >
                                            
                                            <?php
                                                }
                                            ?>

                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

 <!--                           <form id="invoiceData" name="invoiceData" action="<?php //echo base_url('bill/create_proforma_bill');?>" method="POST">  
                            <input type="hidden" id="invoiceformdata" name="invoiceformdata">-->
                          <button type="button" id="saveeditiproformanvoice" name="saveeditiproformanvoice" class="btn btn-primary"><i class="fa fa-send"></i> Generate</button>
                       <!--  </form> -->
                        </div>
                      </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  <!-- Modal end -->

  <script>
        var xx = <?php echo $sn-1; ?>; //initlal text box count
        var baseURL = "<?php echo base_url(); ?>";
  </script>
<?php
  $this->load->view('admin/include/footer');
?>