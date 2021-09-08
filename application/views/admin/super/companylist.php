<?php
  $this->load->view('admin/super/include/header');
?>
  <!-- /.navbar -->

<?php
  $this->load->view('admin/super/include/sidebar');
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
                  <h4 style="text-align: center;"><?php echo $pg_title;?> Companies List</h4>
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
                    <th>Sr. No.</th>
                    <th>Organisation</th>
                    <th>Owner Name</th>
                    <th>Mobile No.</th>
                    <th>Tel. No.</th>
                    <th>Status</th>
                    <th>Address</th>
                    <?php 
                      if(!isset($set_action) && empty($set_action)) {
                    ?>
                      <th>Actions</th>
                    <?php    
                      }
                    ?>

                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                     $sr= 0;
                     foreach($comp_list as $key => $value){
                      $sr++;
                   ?>
                  <tr id="<?php echo $sr;?>">
                    <td><?php echo $sr;?></td>
                    <td><?php echo $value->org_name;?></td>
                    <td><?php echo $value->owner_name;?></td>
                    <td><?php echo $value->mobileno;?></td>
                    <td><?php echo $value->phone_no;?></td>
                    <td><?php echo $value->status;?></td>
                    <td><?php echo $value->address;?></td>

                  <?php 
                      if(!isset($set_action) && empty($set_action)) {
                    ?>
                    <td>
                        <?php 
                          if($value->status == 'Approved'){
                          ?>  
                            <button type="button" class="btn btn-primary btn-sm approved" data-tr="<?php echo $sr;?>" data-id="<?php echo $value->user_id;?>">Unapproved</button>
                          <?php
                          } else {
                          ?>  
                            <button type="button" class="btn btn-danger btn-sm  pending" data-tr="<?php echo $sr;?>" data-id="<?php echo $value->user_id;?>">Approved</button>
                          <?php
                          }
                        ?>
                        

                      <!-- <a href="<?php //echo base_url('admin/dashboard/view/companies/'.$value->user_id); ?>"><span><i class="fa fa-edit"></i> Edit</span></a> --> </td>
 
                    <?php    
                      }
                    ?>


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
<script>
  var baseURL = "<?php echo base_url(); ?>";
</script>

<?php

  $this->load->view('admin/super/include/footer');
?>