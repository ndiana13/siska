<?php 
include '../login/config.php';
include 'function.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}

?>
<?php
$row_sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE jns_sp ='skmengajar'");
$jumlah_sk_mengajar = mysqli_num_rows($row_sk_mengajar);
?>

<?php

$row_sk_magang = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE jns_sp ='skmagang'");
$jumlah_sk_magang = mysqli_num_rows($row_sk_magang);
?>

<?php

$row_sk_doswal = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE jns_sp ='skdoswal'");
$jumlah_sk_doswal = mysqli_num_rows($row_sk_doswal);
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
            <h1 class="m-0">Selamat Datang, <?php echo $_SESSION['nama'];?> di SISKA PNC</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div>
<!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah_sk_mengajar; ?></h3>

                <p>Pengajuan Surat Mengajar</p>
              </div>
              <div class="icon">
                <i class="ion ion-easel"></i>
              </div>
              <a href="tb_sp_mengajar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlah_sk_magang; ?></h3>
                <p>Pengajuan Surat Magang</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_sk_doswal; ?></h3>

                <p>Pengajuan Surat Dosen Wali</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
          <!-- Profile Image -->
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Profil</h3>
              </div>
            <div class="card-body box-profile">
             <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../AdminLTE/dist/img/<?= $_SESSION['foto'];?>" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center"><?php echo $_SESSION['nama'] ?></h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NIP/NPAK</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT nip FROM tb_pengguna WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['nip']."<br>";
                  }

                  ?></a>
                </li>

                <li class="list-group-item">
                  <b>Username</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT username FROM tb_pengguna WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['username']."<br>";
                  }

                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Hp</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT no_hp FROM tb_pengguna WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['no_hp']."<br>";
                  }

                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?php
                  include '../login/config.php';
                  $username = $_SESSION['username'];

                  $sql = "SELECT email FROM tb_pengguna WHERE username='$username'"; 
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) {
                    echo $row['email']."<br>";
                  }

                  ?></a>
                </li>
                   <a  class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal<?php echo $_SESSION['username']; ?>"><b>Edit Profil</b></a>
                </ul>
              </div>
              <?php $sql = "SELECT * FROM tb_pengguna WHERE username='$username'"; 
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) {
                  if ($row['level']== 0) {
                    $t_level = 'Jurusan';
                  }
                   elseif ($row['level']== 1) {
                    $t_level = 'Kajur';
                  }
                  elseif ($row['level']== 2) {
                    $t_level = 'BAAK';
                  }
                  elseif ($row['level']== 3) {
                    $t_level = 'Bagian Umum';
                  }
                  elseif ($row['level']== 4) {
                    $t_level = 'Wakil Direktur';
                  }
                  elseif ($row['level']== 5) {
                    $t_level = 'Direktur';
                  }

                  if ( isset($_POST["submit"])) {
                    //cek data berhasil ubah atau tidak
                    if  (ubah_profil($_POST)>0){
                      echo "
                      <script>
                      alert('data berhasil diubah');
                      document.location.href='index.php';
                      </script>
                      ";
                    }else {
                    echo "
                      <script>
                      alert('data gagal diubah');
                      document.location.href='index.php';
                      </script>
                      ";
                    }
                  }
               ?>
              <div class="modal fade" id="myModal<?php echo $_SESSION['username']; ?>">
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
                        <input type="hidden" name="nip" value="<?= $row["nip"];?>">
                          <input type="hidden" name="fotoLama" value="<?= $row["foto"];?>">
                           <input type="hidden" name="ttdLama" value="<?= $row["ttd"];?>">
                        <div class="form-group">
                          <label for="">NIP/NPAK</label>
                          <input type="text" class="form-control"  required id="nip_edit" name="nip_edit" value="<?= $row["nip"];?>">
                        </div>
                        <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" class="form-control"  required id="username" name="username" value="<?= $row["username"];?>">
                        </div>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="text" class="form-control"  required id="password" name="password" value="<?= $row["password"];?>">
                        </div>
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="text" class="form-control"  required id="email" name="email" value="<?= $row["email"];?>">
                        </div>
                        <div class="form-group">
                          <label for="">Nama Lengkap</label>
                          <input type="text" class="form-control"  required id="nama_lengkap" name="nama_lengkap" value="<?= $row["nama_lengkap"];?>">
                        </div>
                        <div class="form-group">
                          <label for="">No HP</label>
                          <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $row["no_hp"];?>">
                        </div>
                        <div class="form-group">
                          <label for="">Level</label>
                          <div class="form-group">
                            <select class="form-control" name="level" required>
                              <option hidden selected value="<?= $row["level"];?>"><?= $t_level ?></option>
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
                          <img src="../AdminLTE/dist/img/<?= $row['foto'];?>"  width="100" height="100"><br><br>
                          <input type="file" name="foto" id="foto"> 
                        </div>
                        <div class="form-group">
                          <label for="">Tanda Tangan</label><br>
                          <img src="../AdminLTE/dist/img/<?= $row['ttd'];?>"  width="100" height="100"><br><br>
                          <input type="file" name="ttd" id="ttd">             
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
            <!-- About Me Box -->
            <div class="col-lg-8 col-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Syarat dan Ketentuan Pengajuan SK</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">

                      <!-- /.user-block -->
                      <p><ol>
                        <li>Pegawai terdaftar sebagai pegawai di Politeknik Negeri Cilacap</li>
                        <li>Lampiran yang akan dilampirkan di SK Magang/SK Mengajar/SK Dosen Wali (Format lampiran dalam bentuk .xls)</li>
                         <a class="btn btn-primary" href="../AdminLTE/coba.xls"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Mengajar</a>
                      </ol></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php    include "../AdminLTE/footer.php"; ?>
</div>
</body>
</html>
