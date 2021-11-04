<?php 
require 'function.php';
$id_sp =$_GET['id_sp'];
if (acc_kajur($id_sp)>0){
		echo "
			<script>
			alert('Data Berhasil Disetujui');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal Disetujui');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}
?>