  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 - <?php echo date('Y');?> <a href="http://vyaparbill.com">VyaparBill</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.js');?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets/admin/dist/js/demo.js');?>"></script>

<!-- PAGE PLUGINS -->

<!-- jQuery Mapael -->
<script src="<?php echo base_url('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/raphael/raphael.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-mapael/maps/usa_states.min.js');?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/admin/plugins/chart.js/Chart.min.js');?>"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard2.js');?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

 <link href="<?php echo base_url('assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css');?>" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url('assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');?>"></script>

<script src="<?php echo base_url('assets/admin/plugins/summernote/summernote-bs4.min.js');?>"></script>
<?php
  if(isset($script)){
    foreach($script as $key => $value){
?>
  <script src="<?php echo base_url($value);?>"></script>  
<?php
    }

  }
?>
</body>
</html>
