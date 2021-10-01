<?php
error_reporting();
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
require 'function_nosk.php';

if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah($_POST)>0){


    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href='tb_noskr.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
     document.location.href='tb_nosk.php';
    </script>
    ";

  }
}
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
      <?php    include '../AdminLTE/sidebar.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Nomor SK </h1>
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
                <button type="button" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus-circle"></i>
                    Beri Nomor SK
                </button>
                <div><br></div>
                <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Penomoran SK</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">ID Verifikasi</label>
                          <select class="form-control" id="id_verifikasi" name="id_verifikasi">
                           <?php 
                            $kon = mysqli_connect("localhost",'root',"","sisk");
                            if (!$kon){
                                die("Koneksi database gagal:".mysqli_connect_error());
                            }
                            $sql="select * from tb_verifikasi";
                            $hasil=mysqli_query($kon,$sql);
                            $no=0;
                            while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                           ?>
                            <option value="<?php echo $data['id_verifikasi'];?>"><?php echo $data['id_verifikasi'];?></option>
                              <?php 
                                  }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">No Surat</label>
                          <input type="text" class="form-control" id="no_sk" name='no_sk' placeholder="">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary col-md-3" id="submit" name="submit" >Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>ID VERIFIKASI</th>
                      <th>NO SURAT</th>
                      <th class="col-sm-2">ACTION</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php
                    $no = 1;
                    $data = mysqli_query($conn,"select * from tb_nosk");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $d['id_nosk']; ?></td>
                      <td><?php echo $d['id_verifikasi']; ?></td>
                      <td><?php echo $d['no_sk']; ?></td>
                      <td>
                         <a class="btn" data-toggle="modal" data-target="#myModal<?php echo $d['id_nosk']; ?>"><i class="far fa-edit" style="color:#ffc107;"></i></a>
                         <a class="btn" href="hapus_nosk.php?id_nosk=<?php echo $d['id_nosk']; ?>"><i class="far fa-trash-alt" style= "color:#dc3545;"></i></a>
                         <a class="btn" href="lihat_detail_sk.php?id_nosk=<?php echo $d['id_nosk'];?>"><i class="fas fa-list" style= "color:#dc3545;"></i></a> 
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