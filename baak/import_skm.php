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

  if(isset($_GET['berhasil'])){
   echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href='import_skm.php';
    </script>
    ";
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
      <?php    include '../AdminLTE/sidebar1.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Import</h1>
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

                <form method="post" enctype="multipart/form-data" action="import_aksi.php">
                  <div class="form-group">
                      <label for="">Import File</label>
                    <div class="form-group">
                      <input name="lampiranskm" type="file" required="required">
                      <input name="upload" type="submit" value="Import" class="btn btn-primary col-sm-2"><br><small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.xls (file excel)!</small>
                    </div>
                    </div>
                  
                </form><br>
                
                 <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>
                    Nama Dosen
                  </th>
                  <th>
                    Mata Kuliah
                  </th>
                  <th>
                    Prodi
                  </th>
                  <th>
                    Kelas
                  </th>
                  <th>
                    SKS Mata Kuliah
                  </th>
                  
                  <th>
                    SKS Paralel
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php                    
                $connection = mysqli_connect("localhost",'root',"","siska");
                $sql = "select * from lam_skm";
                $result = mysqli_query($connection,$sql);
                $no= 1;
                while($d = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nm_dosen']; ?><br><?php echo $d['nidn']; ?><br><?php echo $d['nip_dis']; ?><br>
                      <td><?php echo $d['matkul1']; ?><br><?php echo $d['matkul2']; ?><br><?php echo $d['matkul3']; ?><br><?php echo $d['matkul4']; ?><br><?php echo $d['matkul5']; ?><br><?php echo $d['matkul6']; ?><br><?php echo $d['matkul7']; ?><br><?php echo $d['matkul8']; ?><br><?php echo $d['matkul9']; ?><br><?php echo $d['matkul10']; ?></td>
                      <td><?php echo $d['prodi1']; ?><br><?php echo $d['prodi2']; ?><br><?php echo $d['prodi3']; ?><br><?php echo $d['prodi4']; ?><br><?php echo $d['prodi5']; ?><br><?php echo $d['prodi6']; ?><br><?php echo $d['prodi7']; ?><br><?php echo $d['prodi8']; ?><br><?php echo $d['prodi9']; ?><br><?php echo $d['prodi10']; ?></td>
                      <td><?php echo $d['kelas1']; ?><br><?php echo $d['kelas2']; ?><br><?php echo $d['kelas3']; ?><br><?php echo $d['kelas4']; ?><br><?php echo $d['kelas5']; ?><br><?php echo $d['kelas6']; ?><br><?php echo $d['kelas7']; ?><br><?php echo $d['kelas8']; ?><br><?php echo $d['kelas9']; ?><br><?php echo $d['kelas10']; ?></td>
                      <td><?php echo $d['sks_matkul1']; ?><br><?php echo $d['sks_matkul2']; ?><br><?php echo $d['sks_matkul3']; ?><br><?php echo $d['sks_matkul4']; ?><br><?php echo $d['sks_matkul5']; ?><br><?php echo $d['sks_matkul6']; ?><br><?php echo $d['sks_matkul7']; ?><br><?php echo $d['sks_matkul8']; ?><br><?php echo $d['sks_matkul9']; ?><br><?php echo $d['sks_matkul10']; ?></td>
                      <td><?php echo $d['sks1']; ?><br><?php echo $d['sks2']; ?><br><?php echo $d['sks3']; ?><br><?php echo $d['sks4']; ?><br><?php echo $d['sks5']; ?><br><?php echo $d['sks6']; ?><br><?php echo $d['sks7']; ?><br><?php echo $d['sks8']; ?><br><?php echo $d['sks9']; ?><br><?php echo $d['sks10']; ?></td>
                      
                      <td>
                        <div><a class="btn-sm btn-outline-success" href="accept_baak.php?id_sk_mengajar=<?php echo $d['id_sk_mengajar']; ?>"><i class="fas fa-check"></i> ACCEPT</a></div>
                        <div><a class="btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menolak item ini ?'" href="decline_baak.php?id_sk_mengajar=<?php echo $d['id_sk_mengajar']; ?>" ><i class="fas fa-times"></i> DECLINE</a></div> 
                          
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