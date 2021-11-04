<?php
error_reporting();
 include '../login/config.php';
 include 'function.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$username = $_SESSION['username'];

$sql = "SELECT * FROM tb_user WHERE username='$username'"; 
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {

  if ( isset($_POST["submit"])) {
    //cek data berhasil ubah atau tidak
    if  (ubah_profil($_POST)>0){
      echo "
      <script>
      alert('data berhasil diubah');
      document.location.href='tb_profil.php';
      </script>
      ";
    }else {
    echo "
      <script>
      alert('data gagal diubah');
      document.location.href='tb_profil.php';
      </script>
      ";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../AdminLTE/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      <?php    include "../AdminLTE/header.php"; ?>
      <?php    include "../AdminLTE/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Profil</h3>
              </div>
                  <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="card-body">
                    <input type="hidden" name="nip" value="<?= $row["nip"];?>">
                    <div class="form-group">
                      <label for="">NIP</label>
                      <input type="text" class="form-control"  required id="nip" name="nip_edit" value="<?= $row["nip"];?>">
                    </div>
                    <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control"  required id="username" name="username" value="<?= $row["username"];?>">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" class="form-control"  required id="password" name="password" value="<?= $row["password"];?>">
                    </div>
                    <div class="form-group">
                      <label for="">No Hp</label>
                     <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $row["no_hp"];?>">
                    </div>
                    <div class="form-group">
                      <label for="">Jabatan</label>
                      <input type="text" class="form-control"  required id="jabatan" name="jabatan" value="<?= $row["jabatan"];?>">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control"  required id="email" name="email" value="<?= $row["email"];?>">
                    </div>
                    <div class="form-group" hidden="">
                      <label for="">Level</label>
                      <input type="text" class="form-control"  required id="level" name="level" value="<?= $row["level"];?>">
                    </div>
                    
                    <button type="submit" id="submit" name="submit" class="btn btn-primary mr-2">Ubah</button>
                    <a href="index.php" class="btn btn-light">Cancel</a>
                  </div>
              </form>
              <?php
            }
            ?>
              </div>
              </div>
            </div>
          </div>
        </section>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../AdminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../AdminLTE/plugins/moment/moment.min.js"></script>
<script src="../AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../AdminLTE/dist/js/pages/dashboard.js"></script>
</html>