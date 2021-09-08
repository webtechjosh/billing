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
            <h1>Challan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Challan</li>
            </ol>
          </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-success">
              <div class="card-header">
                <h4 style="text-align: center;">Challan</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="proformabill" name="proformabill" method="post" action="<?php echo base_url('bill/create_proforma_bill');?>">
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="hidden" id="bill_type" name="bill_type" value="Proforma">
                        <input type="hidden" id="mobileno" name="mobileno" value="">
                        <input type="hidden" id="gstno" name="gstno" value="">                                                
                        <label>Challan No. Prefix: </label>
                        <input type="text" id="prefix" name="prefix" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Challan No.: </label>
                        <input type="text" id="billno" name="billno" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Date: </label>
                        <input type="date" id="invoice_date" name="invoice_date" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party GST Number: </label>

                        <input type="text" id="search" placeholder="Search" />
                        <div id="display">abc</div>
<!--                         <select id="billgstno" name="billgstno" class="form-control select2" style="width: 100%;">
                          <option value="">gst no</option>
                          
                            <?php
                              //foreach ($partydata as $key => $value) {
                                //echo "<option value=\"$value->id\">$value->gst</option>";
                              //}
                            ?>

                        </select> -->
                        <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party Name: </label>
                        <input type="text" id="party_name" name="party_name" class="form-control" placeholder="Enter ..." value="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party Mobile Number: </label>
                        <select id="billmobileno" name="billmobileno" class="form-control select2" style="width: 100%;">
                          <option value="">mobile no</option>
                          
                            <?php
                              foreach ($partydata as $key => $value) {
                                echo "<option value=\"$value->id\">$value->mobileno</option>";
                              }
                            ?>

                        </select>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Party Address: </label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter ..." value="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Party State: </label>
                        <input type="text" id="state" name="state" class="form-control" placeholder="Enter ..." value="">
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
                            <td><input id="desc_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][desc]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="hsn_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][hsn]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="rate_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][rate]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="gst_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][gst]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="mrpgst_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][mrpgst]" value="" onchange="calculate(<?php echo $sn;?>)" readonly></td>
                            <td><input id="qty_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][qty]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="disc_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][disc]" value="" onchange="calculate(<?php echo $sn;?>)"></td>
                            <td><input id="total_<?php echo $sn;?>" name="particulars[<?php echo $sn;?>][total]" value="" onchange="calculate(<?php echo $sn;?>)" readonly></td>
                            <td><!-- <div class="btn-group btn-group-sm">
                              <button type="button" class="btn btn-danger removerow"><i class="fas fa-trash"></i></button>
                            </div> --></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      <div style="text-align: right;">
                        <button type="button" class="btn btn-info addrow" ><i class="fas fa-plus"></i></button> 
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
                        <textarea id="narration" name="narration" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bill Footer Content (declaration, bank info, etc)</label>
                        <textarea id="bill_footer" name="bill_footer" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="invoiceButton">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">Preview</button>
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
        var baseURL = "<?php echo base_url(); ?>";
  </script>
<?php
  $this->load->view('admin/include/footer');
?>