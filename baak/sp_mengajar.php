<?php
error_reporting(0);
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

require 'function.php';

if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah($_POST)>0){


    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href='tb_sp_mengajar.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
     document.location.href='tb_sp_mengajar.php';
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
                <h3 class="card-title">Form Pengajuan SK</h3>
              </div>
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                     <div class="card-body">
                      <div class="form-group">
                       <label for="">NIP/NPAK</label>
                        <select class="form-control" id="nip" name="nip">
                         <?php 
                          $kon = mysqli_connect("localhost",'root',"","sisk");
                          if (!$kon){
                              die("Koneksi database gagal:".mysqli_connect_error());
                          }
                          $sql="select * from tb_user";
                          $hasil=mysqli_query($kon,$sql);
                          $no=0;
                          while ($data = mysqli_fetch_array($hasil)) {
                          $no++;
                         ?>
                          <option value="<?php echo $data['nip'];?>"><?php echo $data['nip'];?></option>
                            <?php 
                                }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Nama Jurusan</label>
                        <select class="form-control" id="nm_jurusan" name="nm_jurusan">
                         <?php 
                          $kon = mysqli_connect("localhost",'root',"","sisk");
                          if (!$kon){
                              die("Koneksi database gagal:".mysqli_connect_error());
                          }
                          $sql="select * from tb_jurusan";
                          $hasil=mysqli_query($kon,$sql);
                          $no=0;
                          while ($data = mysqli_fetch_array($hasil)) {
                          $no++;
                         ?>
                          <option value="<?php echo $data['id_jurusan'];?>"><?php echo $data['nm_jurusan'];?></option>
                            <?php 
                                }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="tgl_sp" name='tgl_sp' placeholder="Tanggal Pengajuan">
                      </div>
                      <div class="form-group">
                        <label for="">Tahun Akademik</label>
                        <input type="text" class="form-control" id="thn_akademik" name="thn_akademik" placeholder="Exp: 2021/2022">
                      </div>
                      
                      <div class="form-group">
                        <label for="">Semester</label>
                         <select class="form-control" id="semester" name="semester">
                            <option>Ganjil</option>
                            <option>Genap</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Exp: Pengajuan Surat Mengajar">
                      </div>
                      <div class="form-group">
                      <label for="">Lampiran</label>
                      <div class="form-group">
                        <input type="file" id="lampiran_sp" name="lampiran_sp">
                        <small class="red-text">*Format file yang diperbolehkan berformat *.csv (file excel)!</small>
                      </div>
                      </div>

                    <button type="submit" id="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="tb_sp_mengajar.php" class="btn btn-light">Cancel</a>
                  </div>
                  </form>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
   
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <?php    include "../AdminLTE/footer.php"; ?>

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
