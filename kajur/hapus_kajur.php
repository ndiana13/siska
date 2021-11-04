<?php 

require 'function_kajur.php';
$id_kajur =$_GET["id_kajur"];
if (hapus($id_kajur)>0){
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href='tb_kajur.php';
            </script>
            ";
        }else {
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href='tb_kajur.php';
            </script>
            ";
        }

?>