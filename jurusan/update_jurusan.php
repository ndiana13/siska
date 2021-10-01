<?php 
// koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
 
// menangkap data yang di kirim dari form
$id_jurusan = $_POST['id_jurusan'];
$nm_jurusan = $_POST['nm_jurusan'];
 
// update data ke database
$updatedata = mysqli_query($conn,"update tb_jurusan set nm_jurusan='$nm_jurusan' where id_jurusan='$id_jurusan'");
 
// mengalihkan halaman kembali ke index.php
if  (!$updatedata){


    echo "
    <script>
    alert('Data Gagal Diupdate');
    document.location.href='tb_jurusan.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Diupdate');
     document.location.href='tb_jurusan.php';
    </script>
    ";

  }
 
 
?>