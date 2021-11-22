<?php
error_reporting();
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nip'])) {
    header("Location: index.php");
}
require 'function.php';
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
            <h1 class="m-0">Tabel Verifikasi</h1>
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
                    Detail
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php
                $kajur      = mysqli_query($conn, "SELECT * FROM tb_kajur INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan WHERE tb_kajur.nip = '$nip'");
                $r          = mysqli_fetch_array($kajur);
                $jurusan    = $r['id_jurusan'];                   
                $pengajuan  = mysqli_query($conn,"SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip WHERE tb_pengajuan.id_jurusan ='$jurusan' AND status=0 ORDER BY id_sp");
                $no= 1;
                while($d = mysqli_fetch_array($pengajuan)) {
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
                      <td><?php echo "<a  href= 'accept_kajur.php?id_sp=".$d['id_sp']."'  class='badge bg-". $warna."'>". $status."</a>";?><br><?php echo "<a>" .$tgl. "<a>"?>
                      <!--<td>
                        <a class="buttons" onclick= "return confirm('Anda yakin ingin menerima pengajuan ini ?')" href="accept_kajur.php?id_sp=<?php echo $d['id_sp']; ?>" style="color: green;"><i class="fas fa-check" style="color: green;"></i> Accept</a><br>
                        <a class="buttons" href="decline_kajur.php?id_sp=<?php echo $d['id_sp']; ?>" style="color: red;" onclick="return confirm('Anda yakin ingin menolak pengajuan ini ?')"><i class="fas fa-check" style="color: red;"></i> Decline</a>
                      </td> -->
                      <td>
                        <a class="btn btn-app" href="../baak/lampiran/<?php echo $d['lampiran_sp']; ?>">
                          <i class="fas fa-file-download"></i>Lampiran</a>
                        <a class="btn btn-app" href="../baak/sk/<?php echo $d['upload_sk']; ?>">
                          <i class="fas fa-save"></i>SK</a>
                        <a class="btn btn-app" href="cetak_sp.php?id_sp=<?php echo $d['id_sp']; ?>" target="_BLANK">
                          <i class="fas fa-save"></i>SP</a>

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
  </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->
<?php    include "../AdminLTE/footer.php"; ?>
      
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

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
