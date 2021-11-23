<?php
error_reporting();
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nip'])) {
    header("Location: index.php");
}
$id_sp     = $_GET['id_sp'];
$timeline  = mysqli_query($conn, "SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip WHERE id_sp='$id_sp'");
$r    = mysqli_fetch_assoc($timeline);

if ($r['status']==5){
  $ket = 'decline your SK request';
}else{
   $ket = 'accept your SK request';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Dashboard</title>
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      <?php    include "../AdminLTE/header.php"; ?>
      <?php    include "../AdminLTE/sidebar2.php"; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel History</h1>
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
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green"><?php echo $r['tgl_direktur'];?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#">Direktur</a> <?php echo $ket;?></h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-blue"><?php echo $r['tgl_wadir'] ?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#">Wakil Direktur I</a> <?php echo $ket;?></h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div class="time-label">
                <span class="bg-purple"><?php echo $r['tgl_baak'] ?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#">BAAK</a> <?php echo $ket ;?></h3>
                </div>
              </div>
              <div class="time-label">
                <span class="bg-yellow"><?php echo $r['tgl_kajur'] ?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#">Kepala Jurusan <?php echo $r['nm_jurusan'];?></a> <?php echo $ket;?></h3>

                </div>
              </div>
              <div class="time-label">
                <span class="bg-pink"><?php echo $r['tgl_sp'] ?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#"><?php echo $r['nama_lengkap'];?></a> request an SK</h3>
                </div>
              </div>
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
          </div>
        </section>
      </div>
  </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->
<?php    include "../AdminLTE/footer.php"; ?>
      
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

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
      "autoWidth": false ,
      "responsive": true,
    });
  });
</script>
</body>
</html>
