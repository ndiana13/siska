<?php
require 'function.php';
$id_sk_mengajar =$_GET["id_sk_mengajar"];
if (dec_wadir($id_sk_mengajar)>0){
		echo "
			<script>
			alert('Data Berhasil di Decline');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal di Decline');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}
?>
?>