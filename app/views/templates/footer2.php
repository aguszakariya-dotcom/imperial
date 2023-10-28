
</div>

<script>
     feather.replace();
</script>
  <!-- /.content-wrapper -->
  <footer class="main-footer fixed-bottom">
    <strong>Copyright &copy; 2014-2023 <a href="https://about.me/aguszakariya">Agus zakariya</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= BASEURL; ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASEURL; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= BASEURL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= BASEURL; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL; ?>/dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</body>
</html>
