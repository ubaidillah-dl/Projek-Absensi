<?php
    require '../konek.php';

    $kode = $_GET["kode"];

    if(hapus($kode) > 0){
        echo "
            <script>
                alert('Karyawan berhasil dihapus !');
                document.location.href = '../karyawan.php';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('Karyawan gagal dihapus !');
                document.location.href = '../karyawan.php';
            </script>
        ";
    }
?>