<?php
require 'function.php';
if (hapus_lam_skm()>0){
        echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href='import_skm.php';
            </script>
            ";
        }else {
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href='import_skm.php';
            </script>
            ";
        }

?>