<?php 
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}

?>
<?php
$data_sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sk_mengajar");
$jumlah_sk_mengajar = mysqli_num_rows($data_sk_mengajar);
?>

<?php

$data_sk_magang = mysqli_query($conn, "SELECT * FROM tb_sk_magang");
$jumlah_sk_magang = mysqli_num_rows($data_sk_magang);
?>

<?php

$data_sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sk_doswal");
$jumlah_sk_doswal = mysqli_num_rows($data_sk_doswal);
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
      <?php    include "../AdminLTE/sidebar1.php"; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6">
            <h1 class="m-0">Selamat Datang, <?php echo $_SESSION['nama'];?> di SISKA PNC</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div>
<!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah_sk_mengajar; ?></h3>

                <p>Pengajuan Surat Mengajar</p>
              </div>
              <div class="icon">
                <i class="ion ion-easel"></i>
              </div>
              <a href="tb_sp_mengajar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlah_sk_magang; ?></h3>
                <p>Pengajuan Surat Magang</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_sk_doswal; ?></h3>

                <p>Pengajuan Surat Dosen Wali</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
          <!-- Profile Image -->
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Profil</h3>
              </div>
            <div class="card-body box-profile">
             <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../AdminLTE/dist/img/<?= $_SESSION['foto'];?>" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center"><?php echo $_SESSION['nama'] ?></h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NIP/NPAK</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT nip FROM tb_pengguna WHERE username='$username'"; 
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

                  $sql = "SELECT username FROM tb_pengguna WHERE username='$username'"; 
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

                  $sql = "SELECT no_hp FROM tb_pengguna WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['no_hp']."<br>";
                  }

                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT email FROM tb_pengguna WHERE username='$username'"; 
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
            <!-- /.card -->
          </div>
            <!-- About Me Box -->
            <div class="col-lg-8 col-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Syarat dan Ketentuan Pengajuan SK</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">

                      <!-- /.user-block -->
                      <p><ol>
                        <li>Pegawai terdaftar sebagai pegawai di Politeknik Negeri Cilacap</li>
                        <li>Lampiran yang akan dilampirkan di SK Magang/SK Mengajar/SK Dosen Wali (Format lampiran dalam bentuk .xls)</li>
                      </ol>
                    </p>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        
          <!-- ./col -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php    include "../AdminLTE/footer.php"; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
<script src="../AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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
</body>
</html>
