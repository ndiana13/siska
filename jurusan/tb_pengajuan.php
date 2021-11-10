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
            <h1 class="m-0">Tabel Surat Pengajuan</h1>
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
              <button type="button" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus-circle"></i> &nbsp;Pengajuan 
              </button>
              <div><br></div>
            <div class="modal fade" id="modal-lg">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Form Surat Pengajuan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" placeholder="id_sp" name="id_sp" id="id_sp"  >
                   <input type="hidden" class="form-control" placeholder="id_sp" name="status" id="status"  value="0" >
                   <input type="hidden" class="form-control" placeholder="id_sp" name="no_sk" id="no_sk">

                    <div class="form-group">
                     <label for="">NIP/NPAK</label>
                       <?php 
                        $kon = mysqli_connect("localhost",'root',"","siska");
                        if (!$kon){
                            die("Koneksi database gagal:".mysqli_connect_error());
                        }
                        $nama = $_SESSION['nama'];
                        $sql="SELECT nip FROM tb_pengguna WHERE nama_lengkap='$nama'";
                        $hasil=mysqli_query($kon,$sql);
                        while ($data = mysqli_fetch_array($hasil)) {
                       ?>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data['nip'];?>">
                          <?php 
                              }
                          ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Jenis Pengajuan</label>
                       <select class="form-control" id="jns_sp" name="jns_sp">
                          <option value="skmengajar">Surat Keputusan Mengajar</option>
                          <option value="skdoswal">Surat Keputusan Dosen Wali</option>
                          <option value="skmagang">Surat Keputusan Magang</option>
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
                    <div class="form-group">
                      <label for="">No Surat Pengajuan</label>
                      <input type="text" class="form-control" id="no_sp" name="no_sp">
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal Pengajuan</label>
                      <input type="date" class="form-control" id="tgl_sp" name='tgl_sp' placeholder="Tanggal Pengajuan">
                    </div>
                    <div class="form-group">
                      <label for="">Tahun Akademik</label>
                      <input type="text" class="form-control" id="thn_akademik" name="thn_akademik" placeholder="Ex: 2021/2022">
                    </div> 
                    <div class="form-group">
                      <label for="">Semester</label>
                       <select class="form-control" id="semester" name="semester">
                          <option>Gasal</option>
                          <option>Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Perihal</label>
                      <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Ex: Pengajuan Surat Mengajar">
                    </div>
                    <div class="form-group">
                      <label for="">Lampiran</label>
                      <div class="form-group">
                        <input type="file" id="lampiran_sp" name="lampiran_sp"><br><small style="color:#dc3545;">*Format file yang diperbolehkan adalah (.xls, xlsx,docs) max 50MB!</small>
                      </div>   
                    </div>
                    <div class="form-group" hidden="">
                      <label for="">SK</label><br>
                      <input type="file" id="upload_sk" name="upload_sk"><br><small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.pdf/docx max 50MB!</small>
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
                    Tanggal
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
                $sql = "SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip WHERE nama_lengkap='$username' ORDER BY id_sp DESC";
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
                      <td><?php echo $d['nip']; ?></td>
                      <td><?php echo $d['no_sp']; ?></td>
                      <td><?php echo $d['tgl_sp']; ?></td>
                      <td><?php echo $d['nm_jurusan']; ?><br><?php echo $d['thn_akademik']; ?></td>
                      <td><?php echo $d['perihal']; ?></td>
                      <td><?php echo "<a a href= '#' class='badge bg-". $warna."'>". $status."</a>";?><br><?php echo "<a>" .$tgl. "<a>"?>
                      <td><?php echo $d['no_sk']; ?><br><?php echo $d['lampiran_sp']; ?></td>
                      <td>
                        <a class="btn btn-app" data-toggle="modal" data-target="#myModal<?php echo $d['id_sp']; ?>">
                          <i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-app" href="hapus_pengajuan.php?id_sp=<?php echo $d['id_sp']; ?>"onclick="return confirm('Anda yakin ingin menghapus item ini ?')">
                          <i class="fas fa-trash-alt"></i> Hapus</a>
                        <a class="btn btn-app" href="../baak/lampiran/<?php echo $d['lampiran_sp']; ?>">
                          <i class="fas fa-file-download"></i>Lampiran</a>
                        <a class="btn btn-app" href="cetak_sp.php?id_sp=<?php echo $d['id_sp']; ?>" target="_BLANK">
                          <i class="fas fa-save"></i>SP</a>
                          
                          <div class="modal fade" id="myModal<?php echo $d['id_sp']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Surat Pengajuan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                      <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <input type="hidden" name="lampiran_sp_lama" value="<?= $d["lampiran_sp"];?>">
                                        <input type="hidden" name="upload_sk_lama" value="<?= $d["upload_sk"];?>">
                                        <input type="hidden" name="id_sp" value="<?= $d["id_sp"];?>">
                                        <div class="form-group" hidden="">
                                          <label for="">Id Surat</label>
                                          <input type="text" class="form-control"  required id="id_sp" name="id_sp_edit" value="<?= $d["id_sp"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">NIP</label>
                                          <input type="text" class="form-control"  required id="nip" name="nip" value="<?= $d["nip"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Jenis Pengajuan</label>
                                          <div class="form-group">
                                            <?php
                                            if ($d['jns_sp']=='skmengajar'){
                                              $jns = "Surat Keputusan Mengajar";
                                            }
                                            elseif ($d['jns_sp']=='skdoswal'){
                                              $jns = "Surat Keputusan Dosen Walir";
                                            }
                                            elseif ($d['jns_sp']=='skdoswal'){
                                              $jns = "Surat Keputusan Magang";
                                            }
                                            ?>
                                              <select class="form-control" name="jns_sp" required id="jns_sp">
                                                <option hidden selected value = "<?= $d["jns_sp"];?>"><?= "<a>" .$jns. "</a>"?></option>
                                                <option value="skmengajar">Surat Keputusan Mengajar</option>
                                                <option value="skdoswal">Surat Keputusan Dosen Wali</option>
                                                <option value="skmagang">Surat Keputusan Magang</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="">No Surat</label>
                                          <input type="text" class="form-control"  required id="no_sp" name="no_sp" value="<?= $d["no_sp"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Tanggal Pengajuan</label>
                                          <input type="date" class="form-control"  required id="tgl_sp" name="tgl_sp" value="<?= $d["tgl_sp"];?>">
                                        </div>
                                        <div>
                                          <label for="">Id Jurusan</label>
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
                                              <option hidden selected value="<?= $d["id_jurusan"]; ?>"><?= $d["id_jurusan"]; ?></option>
                                              <option value="<?= $data['id_jurusan'];?>"><?php echo $data['nm_jurusan'];?></option>
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Tahun Akademik</label>
                                          <input type="text" class="form-control"  required id="thn_akademik" name="thn_akademik" value="<?= $d["thn_akademik"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Semester</label>
                                              <div class="form-group">
                                              <select class="form-control" name="semester" required id="semester">
                                                <option hidden selected><?= $d["semester"]; ?></option>
                                                <option value="Gasal">Gasal</option>
                                                <option value="Genap">Genap</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Perihal</label>
                                          <input type="text" class="form-control"  required id="perihal" name="perihal" value="<?= $d["perihal"];?>">
                                        </div>
                                        <div class="form-group" hidden="">
                                          <label for="">Status</label>
                                          <input type="text" class="form-control"  required id="status" name="status" value="<?= $d["status"];?>">
                                        </div>
                                        <div class="form-group" hidden="">
                                          <label for="">NO SK</label>
                                          <input type="text" class="form-control" name="no_sk" value="<?= $d["no_sk"];?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="">Lampiran</label><br>
                                          <p><?php echo $d['lampiran_sp'];?></p>
                                          <input type="file" name="lampiran_sp" value="<?= $d["lampiran_sp"];?>"><br>
                                          <small style="color:#dc3545;">*Format file yang diperbolehkan adalah (.xls, xlsx,docs) max 50MB!</small>
                                        </div>
                                        <div class="form-group" hidden="">
                                          <label for="">SK</label><br>
                                          <p><?php echo $d['upload_sk'];?></p>
                                          <input type="file" name="upload_sk" value="<?= $d["upload_sk"];?>"><br>
                                          <small style="color:#dc3545;">*Format file yang diperbolehkan adalah (.pdf, docx) max 50MB!</small>
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
