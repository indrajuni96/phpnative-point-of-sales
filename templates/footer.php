<footer class="main-footer">
  <strong>Copyright &copy <?= date("Y"); ?> <a href="#">Jonatan</a>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?= BASEURL; ?>/assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= BASEURL; ?>/assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL; ?>/assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= BASEURL; ?>/assets/template/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= BASEURL; ?>/assets/template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= BASEURL; ?>/assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function() {
    $("#tables").DataTable();
  });
</script>
<script src="<?= BASEURL; ?>/public/ajax/master.js"></script>
</body>

</html>