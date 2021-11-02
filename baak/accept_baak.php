<?php
require 'function.php';
$id_sp =$_GET["id_sp"];
if (acc_baak($id_sp)>0){
		echo "
			<script>
			alert('Data Berhasil di Verifikasi');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal di Verifikasi');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}
?>