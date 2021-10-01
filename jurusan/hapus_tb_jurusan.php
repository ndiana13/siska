<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
$id_jurusan = $_GET['id_jurusan'];
 
 
// menghapus data dari database
$hapusdata = mysqli_query($conn,"delete from tb_jurusan where id_jurusan='$id_jurusan'");
 // mengalihkan halaman kembali ke index.php
if  (!$hapusdata){


    echo "
    <script>
    alert('Data Gagal Dihapus');
    document.location.href='tb_jurusan.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Dihapus');
     document.location.href='tb_jurusan.php';
    </script>
    ";

  }
 
?>