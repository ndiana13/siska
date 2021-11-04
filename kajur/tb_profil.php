<?php
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
error_reporting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../AdminLTE/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
      <?php    include '../AdminLTE/header.php'; ?>
      <?php    include '../AdminLTE/sidebar.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10">
          <!-- Profile Image -->
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Profil User</h3>
              </div>
            <div class="card-body box-profile">
              <h3 class="profile-username text-center"><?php echo $_SESSION['username']; ?></h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NIP/NPAK</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT nip FROM tb_user WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['nip']."<br>";
                  }

                  ?></a>
                </li>

                <li class="list-group-item">
                  <b>Username</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT username FROM tb_user WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['username']."<br>";
                  }

                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Hp</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT no_hp FROM tb_user WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['no_hp']."<br>";
                  }

                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT jabatan FROM tb_user WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['jabatan']."<br>";
                  }

                  ?></a>
                </li>

                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT email FROM tb_user WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['email']."<br>";
                  }

                  ?></a>
                </li>
                  <a href="edit_profil.php" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </section>

  </div>
  <!-- /.content-wrapper -->
  <?php include '../AdminLTE/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
</script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../AdminLTE/dist/js/pages/dashboard.js"></script>
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
</body>
</html>