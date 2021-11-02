<?php
require 'function.php';
$id_sp =$_GET["id_sp"];
if (dec_baak($id_sp)>0){
		echo "
			<script>
			alert('Data Pengajuan Ditolak');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Pengajuan Gagal Ditolak');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}
?>
?>