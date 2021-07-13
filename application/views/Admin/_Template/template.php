<!DOCTYPE html>
<html lang="en">
  <?php
  $getUser = $this->session->userdata('session_user');
  $getEmail = $this->session->userdata('session_email');
  ?>
  <?php echo $head; ?>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <?php echo $sidebar; ?>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <?php echo $topbar; ?>
          <!-- End of Topbar -->
          <!-- Begin Page Content -->
          <?php echo $content; ?>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <?php echo $footer; ?>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Laporkan! Modal-->
    <div class="modal fade" id="laporkanModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Laporkan Masalah</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form role="form" action="<?=base_url('h/prosesLaporkan');?>" method="post">
              <input type="hidden" name="user" value="<?=$getUser;?>">
              <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control" value="<?=$getEmail;?>" required>
              </div>
              <div class="form-group">
                <label>Judul:</label>
                <input type="text" name="judul" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Isi:</label>
                <textarea name="isi" class="form-control" required></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Laporkan!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?=base_url('h/logout');?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url();?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>assets/js/demo/datatables-demo.js"></script>
  </body>
  <script type="text/javascript">   
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Sisa", "Pengeluaran", "Pendapatan"],
        datasets: [{
          data: [<?php echo ($total-$total2);?>, <?php echo $total2;?>, <?php echo $total;?>],
          backgroundColor: ['#36b9cc', '#e74a3b', '#1cc88a'],
          hoverBackgroundColor: ['#2c9faf', '#c0392b', '#27ae60'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function (){
      var table = $('#myTable').dataTable({
          "sScrollX": false,
      });
    });
  </script>
</html>