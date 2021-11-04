<?php
error_reporting();
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include 'function_jurusan.php';
if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah($_POST)<0){

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
    document.location.href='tb_jurusan.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
     document.location.href='tb_jurusan.php';
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
  <title>SISKA | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
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
            <h1 class="m-0">Tabel Jurusan</h1>
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
          <div class="col-12">
            <div class="card">
              <div class="card-body">
               <button type="button" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-circle"></i>
                    Tambah Jurusan
              </button>
              <div><br></div>
              <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Form Data Jurusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="">ID Jurusan</label>
                        <input type="text" class="form-control" id="id_jurusan" name="id_jurusan" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="">Nama Jurusan</label>
                        <input type="text" class="form-control" id="nm_jurusan" name='nm_jurusan' placeholder="">
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
                          <th>
                            NO
                          </th>
                          <th>
                            ID JURUSAN
                          </th>
                          <th>
                            NAMA JURUSAN
                          </th>
                          <th>
                            ACTION
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($conn,"select * from tb_jurusan");
                        while($d = mysqli_fetch_array($data)){
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['id_jurusan']; ?></td>
                            <td><?php echo $d['nm_jurusan']; ?></td>
                            <td class="text-center">
                            <a class="btn btn-app" data-toggle="modal" data-target="#myModal<?php echo $d['id_jurusan']; ?>"><i class="fas fa-edit"></i> Edit</a>
                            <a class="btn btn-app" href="hapus_tb_jurusan.php?id_jurusan=<?php echo $d['id_jurusan']; ?>"onclick="return confirm('Anda yakin ingin menghapus item ini ?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                            
                            </td>
                          </tr>
                          <div class="modal fade" id="myModal<?php echo $d['id_jurusan']; ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Data User</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="update_jurusan.php" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="">Kode Jurusan</label>
                                         <input type="text" class="form-control"  required id="id_jurusan" name="id_jurusan" value="<?php echo $d['id_jurusan']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Nama Jurusan</label>
                                         <input type="text" class="form-control"  required id="nm_jurusan" name="nm_jurusan" value="<?php echo $d['nm_jurusan']; ?>">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary col-md-3" id="submit" name="submit" >Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
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

<!-- ./wrapper -->

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
<!-- AdminLTE App -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../AdminLTE/dist/js/pages/dashboard.js"></script>
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4AdminLTE/ -->
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
<script src="..AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
