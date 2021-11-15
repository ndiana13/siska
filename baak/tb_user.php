<?php
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}
error_reporting();
require 'function_user.php';

if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah_pengguna($_POST)<0){

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
                      <label for="">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="">
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
                          <option value="1">Kajur</option>
                          <option value="2">BAAK</option>
                          <option value="3">Bagian Umum</option>
                          <option value="4">Wakil Direktur I</option>
                          <option value="5">Direktur</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Foto</label><br>
                      <input type="file" id="foto" name="foto" placeholder=""><br>
                     <small style="color:#dc3545;"> Format foto 4x4.jpg, .jpeg atau .png dengan ukuran max 5MB</small>
                    </div>
                    <div class="form-group">
                        <label for="">Tanda Tangan</label><br>
                        <input type="file" id="ttd" name="ttd" ><br>
                        <small style="color:#dc3545;"> Format tanda tangan .jpg, .jpeg atau .png dengan ukuran max 5MB</small>          
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
                      <th>NAMA</th>
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
                      if  (ubah_profil($_POST)>0){
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
                        $data = mysqli_query($conn,"SELECT * FROM tb_pengguna");
                        while($d = mysqli_fetch_array($data)){
                          if ($d['level']== 0) {
                            $t_level = 'Jurusan';
                          }
                          elseif ($d['level']== 1) {
                            $t_level = 'Kajur';
                          }
                          elseif ($d['level']== 2) {
                            $t_level = 'BAAK';
                          }
                          elseif ($d['level']== 3) {
                            $t_level = 'Bagian Umum';
                          }
                          elseif ($d['level']== 4) {
                            $t_level = 'Wakil Direktur';
                          }
                          elseif ($d['level']== 5) {
                            $t_level = 'Direktur';
                          }
                          ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $d['nip']; ?></td>
                            <td class="text-center"><?php echo $d['nama_lengkap']; ?></td>
                            <td class="text-center"><?php echo $d['email']; ?></td>
                            <td class="text-center"><?php echo $d['no_hp']; ?></td>
                            <td class="text-center"><?php echo $t_level ?></td>
                            <td class="text-center">
                              <a class="btn btn-app" data-toggle="modal" data-target="#myModal<?php echo $d['nip']; ?>"><i class="fas fa-edit"></i> Edit</a>
                              <a class="btn btn-app" href="hapus_user.php?nip=<?php echo $d['nip']; ?>" onclick="return confirm('Anda yakin ingin menghapus item ini ?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                              <a class="btn btn-app" data-toggle="modal" data-target="#lihatModal<?php echo $d['nip']; ?>"><i class="fas fa-edit"></i>Detail</a>
                            </td>
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
                                        <input type="hidden" name="nip" value="<?= $d["nip"];?>">
                                        <input type="hidden" name="fotoLama" value="<?= $d["foto"];?>">
                                        <input type="hidden" name="ttdLama" value="<?= $d["ttd"];?>">
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
                                          <label for="">Nama Lengkap</label>
                                          <input type="text" class="form-control"  required id="nama_lengkap" name="nama_lengkap" value="<?= $d["nama_lengkap"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">No HP</label>
                                          <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $d["no_hp"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Level</label>
                                          <div class="form-group">
                                            <select class="form-control" name="level" required>
                                              <option hidden selected value="<?= $d['level'];?>"><?= $t_level ?></option>
                                              <option value="0">Jurusan</option>
                                              <option value="1">Kajur</option>
                                              <option value="2">BAAK</option>
                                              <option value="3">Bagian Umum</option>
                                              <option value="4">Wakil Direktur</option>
                                              <option value="5">Direktur</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Foto</label><br>
                                          <img src="../AdminLTE/dist/img/<?= $d['foto'];?>"  width="100" height="100"><br><br>
                                          <input type="file" name="foto" id="foto">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Tanda Tangan</label><br>
                                          <img src="../AdminLTE/dist/img/<?= $d['ttd'];?>"  width="100" height="100"><br><br>
                                          <input type="file" name="ttd" id="ttd">             
                                      </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary col-md-3" id="submit1" name="submit1" >Simpan</button>
                                        </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="lihatModal<?php echo $d['nip']; ?>">
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
                                        <div class="text-center"><img class="profile-user-img img-fluid img-circle" src="../AdminLTE/dist/img/<?= $d['foto'];?>" alt="User profile picture"></div>

                                        <h3 class="profile-username text-center"><?php echo $d['nama_lengkap']?></h3>

                                        <p class="text-muted text-center"><?php echo $t_level?></p>

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
                                            <b>Tanda Tangan</b> <a class="float-right"><img src="../AdminLTE/dist/img/<?= $d['ttd'];?>" width="50" height="50"></a>
                                          </li>
                                        </ul>

                                        <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </div>
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