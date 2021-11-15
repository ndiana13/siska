<?php
require 'function.php';
$id_sp =$_GET["id_sp"];
if (dec_kajur($id_sp)>0){
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
			";p