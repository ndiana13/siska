<?php 

require 'function.php';
$id_sk_mengajar =$_GET["id_sk_mengajar"];
if (hapus($id_sk_mengajar)>0){
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href='tb_sp_mengajar.php';
            </script>
            ";
        }else {
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href='tb_sp_mengajar.php';
            </script>
            ";
        }

?>