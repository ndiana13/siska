<?php
error_reporting();
$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

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
      <?php    include '../AdminLTE/sidebar2.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Verifikasi</h1>
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
          <div class="col-12">
            <!-- /.modal-dialog -->
            <div class="card">
              <div class="card-body">
                 <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr style="text-align: center;">
                    <th>#</th>
                    <th>
                      NIP
                    </th>     
                    <th>
                      No Pengajuan
                    </th>
                    <th>
                      Tanggal
                    </th>
                    <th>
                      Jurusan
                    </th>
                    <th>
                      Perihal
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      No SK
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
              </thead>
              <tbody>
              <?php          
                $connection = mysqli_connect("localhost",'root',"","siska");
                $sql = "SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip WHERE status=2";
                $result = mysqli_query($connection,$sql);
                $no= 1;
                while($d = mysqli_fetch_array($result)) {
                  if($d['status']=='1'){
                    $status = 'Diverifikasi Kajur';
                    $warna = 'warning';
                    $tgl = $d['tgl_kajur'];
                    }
                    elseif ($d['status']=='2'){
                    $status = 'Diverifikasi BAAK';
                    $warna = 'primary';
                    $tgl = $d['tgl_baak'];
                    }
                    elseif ($d['status']=='3'){
                    $status = 'Diverifikasi Wadir';
                    $warna = 'primary';
                    $tgl = $d['tgl_wadir'];
                    }
                    elseif ($d['status']=='4'){
                    $status = 'Diverifikasi Direktur';
                    $warna = 'success';
                    $tgl = $d['tgl_direktur'];
                    }
                    elseif ($d['status']=='5'){
                    $status = 'Ditolak';
                    $warna = 'danger';
                    $tgl = '';
                    }
                    else {
                        $status = 'Belum Diverifikasi';
                        $warna = 'secondary';
                        $tgl= '';
                      }
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nip']; ?></td>
                      <td><?php echo $d['no_sp']; ?></td>
                      <td><?php echo $d['tgl_sp']; ?></td>
                      <td><?php echo $d['nm_jurusan']; ?><br><?php echo $d['thn_akademik']; ?></td>
                      <td><?php echo $d['perihal']; ?></td>
                      <td><?php echo "<a href= 'accept_wadir.php?id_sp=".$d['id_sp']."' class='badge bg-". $warna."'>". $status."</a>";?><br><?php echo "<a>" .$tgl. "<a>"?>
                      <td><?php echo $d['no_sk']; ?></td>
                      <td>
                        <a class="btn btn-app" href="../baak/lampiran/<?php echo $d['lampiran_sp']; ?>">
                          <i class="fas fa-file-download"></i>Lampiran</a>
                        <a class="btn btn-app" href="../baak/sk/<?php echo $d['upload_sk']; ?>">
                          <i class="fas fa-save"></i>SK</a>
                        <a class="btn btn-app" href="cetak_sp.php?id_sp=<?php echo $d['id_sp']; ?>" target="_BLANK">
                          <i class="fas fa-save"></i>SP</a>

                      </td>
                      </tr>
                      <?php
                      }
                      ?>

                      </tbody>
                    </table>
                  </div>
                </div>
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