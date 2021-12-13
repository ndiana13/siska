<?php
error_reporting();
 include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nip'])) {
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
  <title>SISKA | Pengajuan</title>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr style="text-align: center;">
                    <th>#</th>
                    <th>
                      Nama<br>Tanggal
                    </th>     
                    <th>
                      No Pengajuan<br>No SK
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
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
              <?php 
                                   
                $connection = mysqli_connect("localhost",'root',"","siska");
                $sql = "SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip ORDER BY id_sp DESC";
                $result = mysqli_query($connection,$sql);
                $no= 1;
                while($d = mysqli_fetch_array($result)) {
                  if($d['status']=='1'){
                    $status = 'Diverifikasi Kajur';
                    $warna = 'warning';
                    $t = substr($d['tgl_kajur'],0,4);
                    $b = substr($d['tgl_kajur'],5,2);
                    $h = substr($d['tgl_kajur'],8,2);

                     if($b == "01"){
                         $nm = "Januari";
                     } elseif($b == "02"){
                         $nm = "Februari";
                     } elseif($b == "03"){
                         $nm = "Maret";
                     } elseif($b == "04"){
                         $nm = "April";
                     } elseif($b == "05"){
                         $nm = "Mei";
                     } elseif($b == "06"){
                         $nm = "Juni";
                     } elseif($b == "07"){
                         $nm = "Juli";
                     } elseif($b == "08"){
                         $nm = "Agustus";
                     } elseif($b == "09"){
                         $nm = "September";
                     } elseif($b == "10"){
                         $nm = "Oktober";
                     } elseif($b == "11"){
                         $nm = "November";
                     } elseif($b == "12"){
                         $nm = "Desember";
                     }
                    $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                    }
                    elseif ($d['status']=='2'){
                    $status = 'Diverifikasi BAAK';
                    $warna = 'primary';
                    $t = substr($d['tgl_baak'],0,4);
                    $b = substr($d['tgl_baak'],5,2);
                    $h = substr($d['tgl_baak'],8,2);

                     if($b == "01"){
                         $nm = "Januari";
                     } elseif($b == "02"){
                         $nm = "Februari";
                     } elseif($b == "03"){
                         $nm = "Maret";
                     } elseif($b == "04"){
                         $nm = "April";
                     } elseif($b == "05"){
                         $nm = "Mei";
                     } elseif($b == "06"){
                         $nm = "Juni";
                     } elseif($b == "07"){
                         $nm = "Juli";
                     } elseif($b == "08"){
                         $nm = "Agustus";
                     } elseif($b == "09"){
                         $nm = "September";
                     } elseif($b == "10"){
                         $nm = "Oktober";
                     } elseif($b == "11"){
                         $nm = "November";
                     } elseif($b == "12"){
                         $nm = "Desember";
                     }
                    $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                    }
                    elseif ($d['status']=='3'){
                    $status = 'Diverifikasi Wadir';
                    $warna = 'primary';
                    $t = substr($d['tgl_wadir'],0,4);
                    $b = substr($d['tgl_wadir'],5,2);
                    $h = substr($d['tgl_wadir'],8,2);

                     if($b == "01"){
                         $nm = "Januari";
                     } elseif($b == "02"){
                         $nm = "Februari";
                     } elseif($b == "03"){
                         $nm = "Maret";
                     } elseif($b == "04"){
                         $nm = "April";
                     } elseif($b == "05"){
                         $nm = "Mei";
                     } elseif($b == "06"){
                         $nm = "Juni";
                     } elseif($b == "07"){
                         $nm = "Juli";
                     } elseif($b == "08"){
                         $nm = "Agustus";
                     } elseif($b == "09"){
                         $nm = "September";
                     } elseif($b == "10"){
                         $nm = "Oktober";
                     } elseif($b == "11"){
                         $nm = "November";
                     } elseif($b == "12"){
                         $nm = "Desember";
                     }
                    $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                    }
                    elseif ($d['status']=='4'){
                    $status = 'Diverifikasi Direktur';
                    $warna = 'success';
                    $t = substr($d['tgl_direktur'],0,4);
                    $b = substr($d['tgl_direktur'],5,2);
                    $h = substr($d['tgl_direktur'],8,2);

                     if($b == "01"){
                         $nm = "Januari";
                     } elseif($b == "02"){
                         $nm = "Februari";
                     } elseif($b == "03"){
                         $nm = "Maret";
                     } elseif($b == "04"){
                         $nm = "April";
                     } elseif($b == "05"){
                         $nm = "Mei";
                     } elseif($b == "06"){
                         $nm = "Juni";
                     } elseif($b == "07"){
                         $nm = "Juli";
                     } elseif($b == "08"){
                         $nm = "Agustus";
                     } elseif($b == "09"){
                         $nm = "September";
                     } elseif($b == "10"){
                         $nm = "Oktober";
                     } elseif($b == "11"){
                         $nm = "November";
                     } elseif($b == "12"){
                         $nm = "Desember";
                     }
                    $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
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

                   $t = substr($d['tgl_sp'],0,4);
                   $b = substr($d['tgl_sp'],5,2);
                   $h = substr($d['tgl_sp'],8,2);

                   if($b == "01"){
                       $nm = "Januari";
                   } elseif($b == "02"){
                       $nm = "Februari";
                   } elseif($b == "03"){
                       $nm = "Maret";
                   } elseif($b == "04"){
                       $nm = "April";
                   } elseif($b == "05"){
                       $nm = "Mei";
                   } elseif($b == "06"){
                       $nm = "Juni";
                   } elseif($b == "07"){
                       $nm = "Juli";
                   } elseif($b == "08"){
                       $nm = "Agustus";
                   } elseif($b == "09"){
                       $nm = "September";
                   } elseif($b == "10"){
                       $nm = "Oktober";
                   } elseif($b == "11"){
                       $nm = "November";
                   } elseif($b == "12"){
                       $nm = "Desember";
                   }
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_lengkap']; ?><br><?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></td>
                        <td><?php echo $d['no_sp']; ?><br><hr><?php echo $d['no_sk']; ?></td>
                        <td><?php echo $d['nm_jurusan']; ?><br><?php echo $d['thn_akademik']; ?></td>
                        <td><?php echo $d['perihal']; ?></td>
                        <td><?php echo "<a href='../jurusan/timeline.php?id_sp=".$d['id_sp']."' class='badge bg-". $warna."'>". $status."</a>";?><br><?php echo "<a>" .$tgl. "<a>"?></td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a href="../baak/lampiran/<?php echo $d['lampiran_sp']; ?>" class="btn btn-secondary"><i class="fas fa-download"></i> File</a>
                            <a href="cetak_sp.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-primary"><i class="fas fa-save"></i> SP</a>
                            <a href="../baak/sk/<?php echo $d['upload_sk']; ?>" class="btn btn-success"><i class="fas fa-file-alt"></i> SK</a>    
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

<!-- ./wrapper -->
<?php    include "../AdminLTE/footer.php"; ?>
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
