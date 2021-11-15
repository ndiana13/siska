<?php
error_reporting();
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}
require 'function.php';
if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah_sp($_POST)>0){


    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href='tb_pengajuan.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
     document.location.href='tb_pengajuan.php';
    </script>
    ";

  }
}
if ( isset($_POST["submit1"])) {
    //cek data berhasil ubah atau tidak
    if  (ubah_sp($_POST)>0){
      echo "
      <script>
      alert('Data berhasil diubah');
      document.location.href='tb_pengajuan.php';
      </script>
      ";
    }else {
    echo "
      <script>
      alert('Data gagal diubah');
      document.location.href='tb_pengajuan.php';
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
  <!-- Theme style -->
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
            <h1 class="m-0">Tabel Print SK</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
          <div class="col-12">
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
                        Jurusan
                      </th>
                      <th>
                        Perihal
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        No SK<br>Lampiran
                      </th>
                      <th>
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php   
                    $username = $_SESSION['nama'];                 
                    $connection = mysqli_connect("localhost",'root',"","siska");
                    $sql = "SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip WHERE nama_lengkap='$username' AND status=4 ORDER BY id_sp DESC";
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
                          <td><?php echo $d['nip']; ?><br><?php echo $d['tgl_sp']; ?></td>
                          <td><?php echo $d['no_sp']; ?></td>
                          <td><?php echo $d['nm_jurusan']; ?><br><?php echo $d['thn_akademik']; ?></td>
                          <td><?php echo $d['perihal']; ?></td>
                          <td><?php echo "<a a href= '#' class='badge bg-". $warna."'>". $status."</a>";?><br><?php echo "<a>" .$tgl. "<a>"?></td>
                          <td><?php echo $d['no_sk']; ?><br><?php echo $d['lampiran_sp']; ?></td>
                          <td>
                            <a class="btn btn-app" href="../baak/sk/<?php echo $d['upload_sk']; ?>">
                              <i class="fas fa-file-download"></i>Print SK</a>
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
    <!-- Main content -->
   
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->
<?php    include "../AdminLTE/footer.php"; ?>
      

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

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
      "responsive": false,
    });
  });
</script>
</body>
</html>
