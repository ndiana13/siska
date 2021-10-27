<?php 

require 'function_doswal.php';
$id_sk_doswal =$_GET["id_sk_doswal"];
if (hapus($id_sk_doswal)>0){
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href='tb_sp_doswal.php';
            </script>
            ";
        }else {
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href='tb_sp_doswal.php';
            </script>
            ";
        }

?>