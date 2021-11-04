<?php 

require 'function.php';
$id_sp=$_GET["id_sp"];
if (hapus_sp($id_sp)>0){
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href='tb_pengajuan.php';
            </script>
            ";
        }else {
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href='tb_pengajuan.php';
            </script>
            ";
        }

?>