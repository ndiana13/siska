<?php
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
error_reporting();
require 'function_user.php';

$user = query("SELECT * FROM tb_user");

if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah($_POST)<0){

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
    document.location.href='tb_user.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
     document.location.href='tb_user.php';
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
            <h1 class="m-0">Tabel User</h1>
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
           <div class="card">
            <div class="card-body">
            <button type="button" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-circle"></i>
                  Tambah User
            </button>
            <div><br></div>
            <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Isi Data User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="">NIP/NPAK</label>
                      <input type="text" class="form-control" id="nip" name="nip" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" id="username" name='username' placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Jabatan</label>
                      <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">No HP</label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Level</label>
                      <div class="form-group">
                        <select class="form-control" id="level" name="level">

                          <option value="0">Jurusan</option>
                          <option value="1">BAAK</option>
                          <option value="2">Bagian Umum</option>
                          <option value="3">Wakil Direktur I</option>
                          <option value="4">Direktur</option>
                        </select>
                      </div>
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
            <!-- /.modal-dialog -->
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center">
                    <tr>
                      <th>NO</th>
                      <th>NIP</th>
                      <th>USERNAME</th>
                      <th>JABATAN</th>
                      <th>EMAIL</th>
                      <th>NO HP</th>
                      <th>LEVEL</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   if ( isset($_POST["submit1"])) {
                      //cek data berhasil ubah atau tidak
                      if  (ubah($_POST)>0){
                        echo "
                        <script>
                        alert('data berhasil diubah');
                        document.location.href='tb_user.php';
                        </script>
                        ";
                      }else {
                      echo "
                        <script>
                        alert('data gagal diubah');
                        document.location.href='tb_user.php';
                        </script>
                        ";
                      }
                    } 
                        $no = 1;
                        $data = mysqli_query($conn,"SELECT * FROM tb_user ORDER BY nip");
                        while($d = mysqli_fetch_array($data)){
                          ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $d['nip']; ?></td>
                            <td class="text-center"><?php echo $d['username']; ?></td>
                            <td class="text-center"><?php echo $d['jabatan']; ?></td>
                            <td class="text-center"><?php echo $d['email']; ?></td>
                            <td class="text-center"><?php echo $d['no_hp']; ?></td>
                            <td class="text-center"><?php echo $d['level']; ?></td>
                            <td>

                            <a class="btn" data-toggle="modal" data-target="#myModal<?php echo $d['nip']; ?>"><i class="far fa-edit" style="color:#ffc107;"></i></a>
                            <a class="far fa-trash-alt" style="color:#dc3545;" href="hapus_user.php?nip=<?php echo $d['nip']; ?>"></a>
                            <a class="btn" data-toggle="modal" data-target="#lihatmodal<?php echo $d['nip']; ?>"><i class="fas fa-list" style= "color:#dc3545;"></i></a> 
                            
                            <div class="modal fade" id="myModal<?php echo $d['nip']; ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Data User</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <div class="card-body">
                                        <input type="hidden" name="nip" value="<?= $d["nip"];?>">
                                        <div class="form-group">
                                          <label for="">NIP/NPAK</label>
                                          <input type="text" class="form-control"  required id="nip_edit" name="nip_edit" value="<?= $d["nip"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Username</label>
                                          <input type="text" class="form-control"  required id="username" name="username" value="<?= $d["username"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Password</label>
                                          <input type="text" class="form-control"  required id="password" name="password" value="<?= $d["password"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Email</label>
                                         <input type="text" class="form-control"  required id="email" name="email" value="<?= $d["email"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Jabatan</label>
                                          <input type="text" class="form-control"  required id="jabatan" name="jabatan" value="<?= $d["jabatan"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">No HP</label>
                                          <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $d["no_hp"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Level</label>
                                          <div class="form-group">
                                            <select class="form-control" name="level" required>
                                              <option hidden selected><?= $d["level"]; ?></option>
                                              <option value="0">Jurusan</option>
                                              <option value="1">BAAK</option>
                                              <option value="2">Bagian Umum</option>
                                              <option value="3">Wakil Direktur</option>
                                              <option value="4">Direktur</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary col-md-3" id="submit1" name="submit1" >Simpan</button>
                                        </div>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="lihatmodal<?php echo $d['nip']; ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Detail Data User</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="card-body box-profile">
                                        <div class="text-center"></div>

                                        <h3 class="profile-username text-center"><?php echo $d['username']?></h3>

                                        <p class="text-muted text-center"><?php echo $d['jabatan']?></p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                          <li class="list-group-item">
                                            <b>NIP/NPAK</b> <a class="float-right"><?php echo $d['nip']?></a>
                                          </li>
                                          <li class="list-group-item">
                                            <b>Username</b> <a class="float-right"><?php echo $d['username']?></a>
                                          </li>
                                          <li class="list-group-item">
                                            <b>Password</b> <a class="float-right"><?php echo $d['password']?></a>
                                          </li>
                                          <li class="list-group-item">
                                            <b>Email</b> <a class="float-right"><?php echo $d['email']?></a>
                                          </li>
                                          <li class="list-group-item">
                                            <b>NO HP</b> <a class="float-right"><?php echo $d['no_hp']?></a>
                                          </li>
                                          <li class="list-group-item">
                                            <b>Level</b> <a class="float-right"><?php echo $d['level']?></a>
                                          </li>
                                        </ul>

                                        <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                          </div>
                            </td>
                                </div>
                              </div>
                            </div>
                          </tr>
                        <?php 
                          }
                        ?>
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