<?php

require 'function.php';
$id_sk_mengajar =$_GET["id_sk_mengajar"];
if (acc_wadir($id_sk_mengajar)>0){
		echo "
			<script>
			alert('Data Berhasil di Acc');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal di Acc');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}
?>