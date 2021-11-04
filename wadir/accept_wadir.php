<?php

require 'function.php';
$id_sp =$_GET["id_sp"];
if (acc_wadir($id_sp)>0){
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