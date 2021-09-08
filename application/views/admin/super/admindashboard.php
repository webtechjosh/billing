<?php
  $this->load->view('admin/super/include/header');
?>
  <!-- /.navbar -->

<?php
  $this->load->view('admin/super/include/sidebar');
?>

  <!-- Content Wrapper. Contains page contdent -->
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
    <section style="margin:0px 10px;">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo bill_count();?></h3>

                <h4>Total Invoice</h4>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/dashboard/listinvoice');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo business_company('Free', 'Approved');?></h3>

                <h4>Free Companies</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/dashboard/companies/free');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo business_company('Business', 'Approved');?></h3>

                <h4>Paid Companies</h4>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('admin/dashboard/companies/paid');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo business_company('Business', 'Pending');?></h3>

                <h4>Pending Approval</h4>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('admin/dashboard/companies/pending');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo business_company('Business');?></h3>

                <h4>Business Companies</h4>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('admin/dashboard/companies/pending');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
              <pre>
              <?php 

                //print_r($comp_list);
              ?>
            </pre>
            </div>  
        </div>    
      </div>
    </section>
    <!-- /.Main content -->


  <!-- /.content-wrapper -->
<script>
        var baseURL = "<?php echo base_url(); ?>";
  </script>
<?php
  $this->load->view('admin/include/footer');
?>