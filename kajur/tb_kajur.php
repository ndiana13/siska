<?php
error_reporting(0);
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}
include 'function_kajur.php';
if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah($_POST)<0){

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
    document.location.href='tb_kajur.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
     document.location.href='tb_kajur.php';
    </script>
    ";

  }
}
  if ( isset($_POST["submit1"])) {
    //cek data berhasil ubah atau tidak
    if  (ubah($_POST)>0){
      echo "
      <script>
      alert('Data berhasil diubah');
      document.location.href='tb_kajur.php';
      </script>
      ";
    }else {
    echo "
      <script>
      alert('Data gagal diubah');
      document.location.href='tb_kajur.php';
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
            <h1 class="m-0">Tabel Kajur</h1>
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
                    Tambah Kajur
              </button>
              <div><br></div>
              <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Form Data Kajur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" placeholder="id_kajur" name="id_kajur" id="id_kajur"  >
                      <div class="form-group">
                        <label for="">NIP/NPAK</label>
                        <select class="form-control" id="nip" name="nip">
                         <?php 
                          $kon = mysqli_connect("localhost",'root',"","siska");
                          if (!$kon){
                              die("Koneksi database gagal:".mysqli_connect_error());
                          }
                          $sql="SELECT * FROM tb_pengguna WHERE level=2";
                          $hasil=mysqli_query($kon,$sql);
                          while ($data = mysqli_fetch_array($hasil)) {
                         ?>
                          <option value="<?php echo $data['nip'];?>"><?php echo "<a>" .$data['nip'] ." (" .$data['nama_lengkap'] .")"."</a>";?></option>
                            <?php 
                                }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="">Nama Jurusan</label>
                      <select class="form-control" id="id_jurusan" name="id_jurusan">
                       <?php 
                        $kon = mysqli_connect("localhost",'root',"","siska");
                        if (!$kon){
                            die("Koneksi database gagal:".mysqli_connect_error());
                        }
                        $sql="select * from tb_jurusan";
                        $hasil=mysqli_query($kon,$sql);
                        while ($data = mysqli_fetch_array($hasil)) {

                       ?>
                        <option value="<?php echo $data['id_jurusan'];?>"><?php echo $data['nm_jurusan'];?></option>
                          <?php 
                              }
                          ?>
                      </select>
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
                            NIP/NPAK
                          </th>
                          <th>
                            NAMA
                          </th>
                          <th>
                            JURUSAN
                          </th>
                          <th>
                            ACTION
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($conn,"SELECT * FROM tb_kajur INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip");
                        while($d = mysqli_fetch_array($data)){
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nip']; ?></td>
                            <td><?php echo $d['nama_lengkap']; ?></td>
                            <td><?php echo $d['nm_jurusan']; ?></td>
                            <td class="text-center">
                              <a class="btn btn-app" data-toggle="modal" data-target="#myModal<?php echo $d['id_kajur']; ?>"><i class="fas fa-edit"></i> Edit</a>
                            <a class="btn btn-app"href="hapus_kajur.php?id_kajur=<?php echo $d['id_kajur']; ?>"onclick="return confirm('Anda yakin ingin menghapus item ini ?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                          </tr>
                          <div class="modal fade" id="myModal<?php echo $d['id_kajur']; ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Data Kajur</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <input type="hidden" name="id_kajur" value="<?= $d["id_kajur"];?>">
                                        <div class="form-group" hidden="">
                                          <label for="">Id Surat</label>
                                          <input type="text" class="form-control"  required id="id_kajur" name="id_kajur_edit" value="<?= $d["id_kajur"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">NIP</label>
                                            <select class="form-control" id="nip" name="nip">
                                             <?php
                                              $kon = mysqli_connect("localhost",'root',"","siska");
                                              if (!$kon){
                                                  die("Koneksi database gagal:".mysqli_connect_error());
                                              }
                                              $sql="SELECT * FROM tb_pengguna WHERE level=2";
                                              $hasil=mysqli_query($kon,$sql);
                                              while ($data = mysqli_fetch_array($hasil)) {
                                             ?>
                                              <option hidden selected value="<?= $d["nip"]; ?>"><?php echo "<a>" .$d['nip'] ." (" .$d['nama_lengkap'] .")"."</a>";?></option>
                                              <option value="<?= $data['nip'];?>"><?php echo "<a>" .$data['nip'] ." (" .$data['nama_lengkap'] .")"."</a>";?></option>
                                              <?php 
                                                }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Jurusan</label>
                                            <select class="form-control" id="id_jurusan" name="id_jurusan">
                                             <?php
                                              $kon = mysqli_connect("localhost",'root',"","siska");
                                              if (!$kon){
                                                  die("Koneksi database gagal:".mysqli_connect_error());
                                              }
                                              $sql="select * from tb_jurusan";
                                              $hasil=mysqli_query($kon,$sql);
                                              while ($data = mysqli_fetch_array($hasil)) {
                                             ?>
                                              <option hidden selected value="<?= $d["id_jurusan"]; ?>"><?php echo $d['nm_jurusan'];?></option>
                                              <option value="<?= $data['id_jurusan'];?>"><?php echo $data['nm_jurusan'];?></option>
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Close</button>
                                          <button type="submit1" class="btn btn-primary col-md-3" id="submit1" name="submit1" >Simpan</button>
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
