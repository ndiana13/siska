<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$id_nosk = $_GET['id_nosk'];
 
// menghapus data dari database
$hapusdata = mysqli_query($conn,"delete from tb_nosk where id_nosk='$id_nosk'");
 // mengalihkan halaman kembali ke index.php
if  (!$hapusdata){


    echo "
    <script>
    alert('Data Gagal Dihapus');
    document.location.href='tb_nosk.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Dihapus');
     document.location.href='tb_nosk.php';
    </script>
    ";

  }
 
?>