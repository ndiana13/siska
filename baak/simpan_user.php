<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$nip            = $_POST['nip'];
$username       = $_POST['username'];
$password 		= $_POST['password'];
$email  	    = $_POST['email'];
$jabatan        = $_POST['jabatan'];
$no_hp         	= $_POST['no_hp'];
$level         	= $_POST['level'];

$query="INSERT INTO tb_user SET nip='$nip',username='$username',password='$password',email='$email',jabatan='$jabatan',no_hp='$no_hp',level='$level'";
$tambahdata = mysqli_query($conn, $query);

if  (!$tambahdata){


    echo "
    <script>
    alert('Data Gagal Ditambahkan');
    document.location.href='tabel_user.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
     document.location.href='tabel_user.php';
    </script>
    ";

  }
?>