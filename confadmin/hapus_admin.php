<?php
    require '../konek.php';

    $nik = $_GET["nik"];

    if(hapus_admin($nik) > 0){
        echo "
            <script>
                alert('Karyawan berhasil dihapus !');
                document.location.href = '../admin.php';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('Karyawan gagal dihapus !');
                document.location.href = '../admin.php';
            </script>
        ";
    }
?>