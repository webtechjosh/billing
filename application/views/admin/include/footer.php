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

<script>
$(document).ready(function(){
    $("#payment_mode").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $(".box").not("." + optionValue).find('input, textarea, button, select').attr('disabled','disabled');
                 $("." + optionValue).find('input, textarea, button, select').removeAttr('disabled'); 
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();


       $("#payment_mode").find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $(".box").not("." + optionValue).find('input, textarea, button, select').attr('disabled','disabled');
                 $("." + optionValue).find('input, textarea, button, select').removeAttr('disabled'); 
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
    }).change(); 
});
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
});
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="<?php echo base_url('assets/admin/plugins/summernote/summernote-bs4.min.js');?>"></script>
<script>

    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
    });

  $(function () {
    $('.narration').summernote({
      toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']]
        ]      
    });

    $('.footercontents').summernote({
      toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']]
        ]
    });
  })
</script>
<?php
  if(isset($script)){
    foreach($script as $key => $value){
?>
  <script src="<?php echo base_url($value);?>"></script>  
<?php
    }

  }
?>

<script>
 
    document.getElementById("invoice_date").defaultValue = "<?php echo $billData->invoice_date?>";
</script>
</body>
</html>
