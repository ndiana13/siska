<?php
error_reporting();
$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";

$conn = mysqli_connect($server, $user, $pass, $database);
$sql = "select * from lam_skm";
$result = mysqli_query($conn,$sql);
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
session_start();
 
if (!isset($_SESSION['nip'])) {
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
                      <input name="lampiranskm" type="file" required="required">
                      <input name="upload" type="submit" value="Import" class="btn btn-primary col-sm-2"><br><small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.xls (file excel)!</small>
                  </div>
                  <div class="form-group">
                  <label>Hapus Seluruh Data</label><br><a class="btn btn-danger col-sm-2" href="hapus_isi_lampiran.php"onclick="return confirm('Anda yakin ingin menghapus item ini ?')"> Hapus</a>
                    &nbsp;&nbsp;&nbsp;<small style="color:#dc3545;">*Jika ingin menghapus seluruh data dalam Lampiran klik button Hapus ! </small>     
                  </div>    
                </form>               
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
                        <a class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal<?php echo $d['id']; ?>"><i class="far fa-edit"></i> Edit</a>
                        <a class="btn btn-outline-danger" href="hapus_lampiran.php?id=<?php echo $d['id']; ?>"onclick="return confirm('Anda yakin ingin menghapus item ini ?')"><i class="far fa-trash-alt"></i> Hapus</a>
                          
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