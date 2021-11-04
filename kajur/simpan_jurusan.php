<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$id_jurusan       = $_POST['id_jurusan'];
$nm_jurusan       = $_POST['nm_jurusan'];

$query="INSERT INTO tb_jurusan SET id_jurusan='$id_jurusan',nm_jurusan='$nm_jurusan'";
$tambahdata = mysqli_query($conn, $query);

if  (!$tambahdata){


    echo "
    <script>
    alert('Data Gagal Ditambahkan');
    document.location.href='tb_jurusan.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
     document.location.href='tb_jurusan.php';
    </script>
    ";

  }
?>