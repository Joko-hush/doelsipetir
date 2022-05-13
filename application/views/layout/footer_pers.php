  <!-- Main Footer -->
  <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
          <b>Version</b> 0.3
      </div>
      <strong>Copyright &copy; 2021-
          <?= date('Y'); ?> <a href="https://rsdustira.com">RS. DUSTIRA</a>.
      </strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>dist/js/adminlte.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/raphael/raphael.min.js"></script>
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('vendor/AdminLTE-3.1.0/'); ?>plugins/chart.js/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
      $(document).ready(function() {
          $('#myTable').DataTable();
      });
  </script>
  <script>
      if (window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
      }

      function showdapok() {
          let x = document.getElementById("dapok");
          let y = document.getElementById("dakel");
          if (x.style.display === "none") {
              x.style.display = "block";
              y.style.display = "none";
          } else {
              x.style.display = "none";
          }
      }

      function showdakel() {
          let x = document.getElementById("dapok");
          let y = document.getElementById("dakel");
          if (y.style.display === "none") {
              y.style.display = "block";
              x.style.display = "none";
          } else {
              y.style.display = "none";
          }
      }
  </script>
  </body>

  </html>