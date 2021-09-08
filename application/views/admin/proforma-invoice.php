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

    <section class="content-header">

      <div class="container-fluid">

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

      </div><!-- /.container-fluid -->
    </section>

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
                <h4 style="text-align: center;">Proforma Invoice</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="proformabill" name="proformabill" method="post" action="<?php echo base_url('bill/create_proforma_bill');?>">
<!--                 <input type="hidden" id="email" name="email" value=""> -->
                <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party Name: </label>
                        <input type="text" id="party_name" name="party_name" class="form-control" placeholder="Enter ..." value="<?php echo $this->input->post('party_name');?>"><span id="errorname"></span>
                        <div id="display"></div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party GST Number: </label>
                        <input type="text" id="gstno" name="gstno" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('gstno');?>" /><span id="errorgst"></span>
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party Mobile Number: </label>
                        <input id="mobileno" name="mobileno" class="form-control" placeholder="Enter..." value="<?php echo $this->input->post('mobileno');?>"><span id="errormob"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party Address: </label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter ..." value="<?php echo $this->input->post('address');?>"><span id="erroradd"></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email: </label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter ..." value="<?php echo $this->input->post('email');?>"><span id="erroradd"></span>
                      </div>
                    </div>                    
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party State: </label>

                        <input type="hidden" id="state" name="state" value="<?php echo $this->input->post('state');?>">
                          <select id="state_code" name="state_code" class="form-control select11" required>
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
                          </select><span id="errorstate"></span>  
                      </div>
                    </div>
                  </div>
                  <hr>  
                <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="hidden" id="bill_type" name="bill_type" value="Proforma">
                        <label>Proforma Invoice No. Prefix: </label>
                        <input type="text" id="prefix" name="prefix" class="form-control" placeholder="Enter ..." value="<?php echo $this->input->post('prefix');?>"><span id="errorprefix"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Proforma Invoice No.: </label>
                        <input type="text" id="billno" name="billno" class="form-control" placeholder="Enter ..." value="<?php
                        if($this->input->post('billno') == ''){
                          echo nextbillno('Proforma');
                        } else {
                          echo $this->input->post('billno');
                        }
                        ?>" ><span id="errorinvno"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Date: </label>
                        <input type="date" id="invoice_date" name="invoice_date" class="form-control" placeholder="Enter ..." value=""><span id="errordate"></span>
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
                          <tr id="rowid<?php echo $sn ?>">
                            <td><input class="form-control" id="desc_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][desc]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="hsn_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][hsn]" value="0" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="rate_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][rate]" value="0" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="gst_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][gst]" value="0" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="mrpgst_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][mrpgst]" value="0" onchange="calwithrespecttogst(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="qty_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][qty]" value="1" onchange="calculate1(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="disc_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][disc]" value="0" onchange="calculate1(<?php echo $sn;?>)"></td>
                            <td><input class="form-control" id="total_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][total]" value="0" onchange="calculate(<?php echo $sn;?>)" readonly></td>
                            <td><button type="button" class="btn btn-info addrow" ><i class="fas fa-plus"></i></button></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      </div>
                      <div style="float:left">
                        <button type="button" class="btn btn-info addrow"><i class="fas fa-plus"></i></button>  Add New Row 
                      </div>
                      <div style="float:right">
                        <h4>Grand Total: <span id="grand_total"></span></h4>
                      </div>
                      <div class="clearfix"></div>
                      
                    </div>

                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Narration: </label>
                        <textarea id="narration" name="narration" class="form-control narration" rows="5" placeholder="Enter ..."><?php echo $this->input->post('narration');?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bill Footer Content (declaration, bank info, etc)</label>
                        <textarea id="bill_footer" name="bill_footer" class="form-control footercontents" rows="5">We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. 
                       <br>Banking: <b><?php echo $bankdetails->bank_name;?></b>
                                                    <br>Account Name: <b><?php echo $bankdetails->acc_name;?></b>
                                                    <br>Account Number: <b><?php echo $bankdetails->acc_number;?></b>
                                                    <br>IFSC Code: <b><?php echo $bankdetails->ifsc;?></b>
                                                    <br>Branch: <b><?php echo $bankdetails->branch;?></b>
                                                    <br>UPI: <b><?php echo $bankdetails->upi;?></b></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton">
                      <div class="previewModal">
                        <button type="button" id="previewprofomainvoice" class="btn btn-success" data-toggle="modal">
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
                                    </table>
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" rowspan="2" style="width: 60%; font-size:12px;" >
                                              <div class="declarationHeading"><h5><u>Narration</u></h5></div>
                                              <span id="printnarration"></span>
                                              <div class="declarationHeading"><h5><u>Declaration</u></h5></div>
                                              <span id="printfooter"></span> 
                                            </td>
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
                          <button type="button" id="saveprofomainvoice" name="saveprofomainvoice" class="btn btn-primary"><i class="fa fa-send"></i> Generate</button>
                       <!--  </form> -->
                        </div>
                      </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  <!-- Modal end -->
                <style>
                  .errorClass { border:  1px solid red; }
                </style>  
  <script>
        var xx = <?php echo $sn; ?>; //initlal text box count
        var baseURL = "<?php echo base_url(); ?>";
  </script>
<?php
  $this->load->view('admin/include/footer');
?>