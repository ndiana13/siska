<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$id_verifikasi = $_GET['id_verifikasi'];
 
// menghapus data dari database
$hapusdata = mysqli_query($conn,"delete from tb_verifikasi where id_verifikasi='$id_verifikasi'");
 // mengalihkan halaman kembali ke index.php
if  (!$hapusdata){


    echo "
    <script>
    alert('Data Gagal Dihapus');
    document.location.href='tb_verifikasi.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Dihapus');
     document.location.href='tb_verifikasi.php';
    </script>
    ";

  }
 
?>