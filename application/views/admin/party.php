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
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card card-success">
             
              <div class="card-header">
                <div style="float: left;">
                  <h4 style="text-align: center;">Party Master</h4>
                </div>
                <div style="float: right;">
                  <a href="<?php echo base_url('user/addparty'); ?>"><button name="addparty" class="btn btn-default">+ Add New Party</button></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  //print_r($partylist); 
                ?>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Party Name</th>
                    <th>GST</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                     foreach($partylist as $key => $value){
                   ?>
                  <tr>
                    <td><?php echo $value->company_name;?></td>
                    <td><?php echo $value->gst;?></td>
                    <td><?php echo $value->mobileno;?></td>
                    <td><?php echo $value->city;?></td>
                    <td><a href="<?php echo base_url('user/editparty/'.$value->id); ?>"><span><i class="fa fa-edit"></i> Edit</span></a> </td>
                  </tr>
                   <?php   
                    }
                   ?> 

                  
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

<?php
  $this->load->view('admin/include/footer');
?>