<?php
  include '../login/config.php';
    // membaca id file dari link
    $id_sk_mengajar = $_GET['id_sk_mengajar'];
 
    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM tb_sk_mengajar WHERE id_sk_mengajar = '$id_sk_mengajar'";
    $hasil  = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);
  
    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$data['lampiran_sp']);
 
 
   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen("data/".$data['lampiran_sp'], 'd');
   $content = fread($fp, filesize('data/'.$data['lampiran_sp']));
   fclose($fp);
 
   // menampilkan isi file yang akan didownload
   echo $content;
     
   exit;
?>