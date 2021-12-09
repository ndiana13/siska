<?php 
include '../login/config.php';
include 'function.php';
session_start();
 
if (!isset($_SESSION['nip'])) {
    header("Location: index.php");
}

$row_sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE jns_sp ='skmengajar' AND status=3");
$jumlah_sk_mengajar = mysqli_num_rows($row_sk_mengajar);

$sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE jns_sp ='skmengajar' AND status=4");
$j_sk_mengajar = mysqli_num_rows($sk_mengajar);

$row_sk_magang = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE jns_sp ='skmagang' AND status=3");
$jumlah_sk_magang = mysqli_num_rows($row_sk_magang);

$sk_magang = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE jns_sp ='skmagang' AND status=4");
$j_sk_magang = mysqli_num_rows($sk_magang);

$row_sk_doswal = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE jns_sp ='skdoswal' AND status=3");
$jumlah_sk_doswal = mysqli_num_rows($row_sk_doswal);

$sk_doswal = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE jns_sp ='skdoswal' AND status=4");
$j_sk_doswal = mysqli_num_rows($sk_doswal);

$row_sk = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE status=3");
$jumlah_sk = mysqli_num_rows($row_sk);

$sk = mysqli_query($conn,"SELECT * FROM tb_pengajuan WHERE status=4");
$j_sk = mysqli_num_rows($sk);
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
            <h1 class="m-0">Selamat Datang, <?php echo $row['nama_lengkap'];?> di SISKA PNC</h1>
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
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pengajuan SK Mengajar</span>
                <span class="info-box-number"><?php echo $jumlah_sk_mengajar; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pengajuan SK Magang</span>
                <span class="info-box-number"><?php echo $jumlah_sk_magang; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pengajuan SK Dosen Wali</span>
                <span class="info-box-number"><?php echo $jumlah_sk_doswal; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pengajuan SK</span>
                <span class="info-box-number"><?php echo $jumlah_sk; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SK Mengajar Yang Sudah Diverifikasi</span>
                <span class="info-box-number"><?php echo $j_sk_mengajar; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SK Magang Yang Sudah Diverifikasi</span>
                <span class="info-box-number"><?php echo $j_sk_magang; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SK DosWal Yang Sudah Diverifikasi</span>
                <span class="info-box-number"><?php echo $j_sk_doswal; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah SK</span>
                <span class="info-box-number"><?php echo $j_sk; ?></span>
              </div>
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
                <img class="profile-user-img img-fluid img-circle" src="../AdminLTE/dist/img/<?= $row['foto'];?>" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center"><?php echo $row['nama_lengkap'] ?></h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NIP/NPAK</b> <a class="float-right"><?php
                    echo $_SESSION['nip'];?></a>
                </li>

                <li class="list-group-item">
                  <b>Username</b> <a class="float-right"><?php
                    echo $row['username'];?></a>
                </li>

                <li class="list-group-item">
                  <b>No HP</b> <a class="float-right"><?php
                    echo $row['no_hp'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?php
                    echo $row['email'];?></a>
                </li>
                  <a  class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg<?php echo $_SESSION['nip']; ?>"><b>Edit Profil</b></a>
              </ul>
              </div>
              <?php 
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
              <div class="modal fade" id="modal-lg<?php echo $_SESSION['nip']; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Profil</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" class="forms-sample" enctype="multipart/form-data">
                        <input type="hidden" name="nip" value="<?= $row["nip"];?>">
                        <input type="hidden" name="fotoLama" value="<?= $row["foto"];?>">
                        <input type="hidden" name="ttdLama" value="<?= $row["ttd"];?>">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">NIP/NPAK</label>
                              <input type="text" class="form-control"  required id="nip_edit" name="nip_edit" value="<?= $row["nip"];?>">
                            </div>  
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Nama Lengkap</label>
                              <input type="text" class="form-control"  required id="nama_lengkap" name="nama_lengkap" value="<?= $row["nama_lengkap"];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" class="form-control"  required id="username" name="username" value="<?= $row["username"];?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control"  required id="password" name="password" value="<?= $row["password"];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label for="">Email</label>
                              <input type="text" class="form-control"  required id="email" name="email" value="<?= $row["email"];?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">No HP</label>
                              <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $row["no_hp"];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row" hidden="">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Level</label>
                              <select class="form-control" name="level" required>
                                <option hidden selected value="<?= $row["level"];?>"><?php echo $t_level ?></option>
                                <option value="0">Jurusan</option>
                                <option value="1">Kajur</option>
                                <option value="2">BAAK</option>
                                <option value="3">Bagian Umum</option>
                                <option value="4">Wakil Direktur</option>
                                <option value="5">Direktur</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="exampleInputFile">Foto</label><br>
                              <img src="../AdminLTE/dist/img/<?= $row['foto'];?>"  width="100" height="100"><br><br>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="foto" name="foto">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>  
                              </div>
                              <label for="exampleInputFile" style="color: gray;">*ukuran foto max 5MB (4x4)</label>
                            </div> 
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="exampleInputFile">Tanda Tangan</label><br>
                              <img src="../AdminLTE/dist/img/<?= $row['ttd'];?>"  width="100" height="100"><br><br>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="ttd" name="ttd">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>  
                              </div>
                              <label for="exampleInputFile" style="color: gray;">*ukuran foto max 5MB</label>
                            </div> 
                          </div>
                        </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary col-md-2" id="submit" name="submit" >Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
                        <li>Lampiran yang akan dilampirkan di SK Magang/SK Mengajar/SK Dosen Wali (Format lampiran dalam bentuk .xls)</li><br>
                        <div class="row">
                          <div class="col-md-4">                          
                            <a class="btn btn-primary btn-block" href="../baak/contoh/Format_Pengajuan_SK_Mengajar.docx"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Mengajar</a>
                          </div>
                           <div class="col-md-4">                          
                            <a class="btn btn-success btn-block" href="../baak/contoh/Format_Pengajuan_SK_Magang.docx"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Magang</a>
                          </div>
                          <div class="col-md-4">                          
                            <a class="btn btn-warning btn-block" href="../baak/contoh/Format_Pengajuan_SK_Doswal.docx"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Dosen Wali</a>
                          </div>
                        </div>
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
<!-- ./wrapper -->
</body>
</html>
