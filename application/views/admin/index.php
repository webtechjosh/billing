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
        <div class="row mb-2">
          <div class="col-sm-12" style="text-align: center;">
            <div class="card card-primary card-outline companyHeading">
              <div class="card-header">

                <h4 style="color: green;"><?php echo $this->session->userdata('userCompanyName'); ?></h4>
              </div>
              <div class="card-body" style="padding: 0.25rem;">
                <h5><?php echo $this->session->userdata('userCompanyAddress'); ?></h5>
                <!--<h5><?php echo $this->session->userdata('email'); ?></h5>-->
              </div>
            </div>
                      
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <div style="float: left;">
                  <h3 class="card-title">Following are the invoices created by you:</h3>
                </div>
                <div style="float: right;">
                  <a href="javascript:excel();">Excel Download <i class="fas fa-file-excel"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Party Name</th>
                    <th>Mobile No.</th>
                    <th>Invoice Type</th>
                    <th>Invoice No.</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    foreach($bills as $key => $values){
                  ?>  
                  <tr>
                    <td><?php echo $values->party_name;?></td>
                    <td><?php echo $values->mobileno;?></td>
                    <td><?php echo $values->bill_type;?></td>
                    <td><?php echo $values->billno;?></td>
                    <td>
            <!--    <a href="<?php // echo base_url('bill/edit_proforma_bill/'.$values->id); ?>"><span><i class="fa fa-edit"></i> </span></a>-->
                    <?php 
                     if($values->bill_type == 'Proforma')  {                  
                    ?> 
                    <a href="<?php echo base_url('user/bill/performa/edit/'.$values->id); ?>"><span><i class="fa fa-edit"></i> </span></a>
                    <?php 
                     } else {
                    ?>
                    <a href="<?php echo base_url('user/bill/tax/edit/'.$values->id); ?>"><span><i class="fa fa-edit"></i> </span></a>
                    <?php 
                     }
                    ?>

                    &nbsp;&nbsp; <a href="javascript:dowloadBill(<?php echo $values->id;?>);"><span><i class="fa fa-download"></i></span></a>
                    &nbsp;&nbsp;
                    <!--<a href="javascript:printBill(<?php echo $values->id;?>);"><span><i class="fa fa-print"></i> </span></a>-->
                    </td>
                  </tr>
                  <?php 
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Party Name</th>
                    <th>Mobile No.</th>
                    <th>Invoice Type</th>
                    <th>Invoice No.</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
        var baseURL = "<?php echo base_url(); ?>";
  </script>
<?php
  $this->load->view('admin/include/footer');
?>