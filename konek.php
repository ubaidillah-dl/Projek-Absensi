<?php 
	$conn = mysqli_connect("localhost", "root", "", "absen");
	
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function cari($katakunci){
        $query = "SELECT * FROM laporan 
                WHERE 
                Nama LIKE '%$katakunci%' OR
                Tanggal LIKE '%$katakunci%'
                ORDER BY Id DESC
        ";
        return query($query);
    }

    function daftar($data){
        global $conn;

        $pengguna = stripslashes($data["pengguna"]);
        $nik = stripslashes($data["nik"]);

        $hasil = mysqli_query($conn, "SELECT max(Kode) as kodeterbesar FROM pengguna");
        $result = mysqli_fetch_array($hasil);

        $kode = $result['kodeterbesar'];

        $urutan = (int) substr($kode,1,3);
        $urutan++;

        $huruf = "U";
        $kode = $huruf.sprintf("%03s",$urutan);
        
        // tamabah pengguna ke database
        mysqli_query($conn, "INSERT INTO pengguna VALUES('','$pengguna','$kode','$nik')");

        return mysqli_affected_rows($conn);
    }

    function hapus($kode){
        global $conn;

        mysqli_query($conn, "DELETE FROM pengguna WHERE Kode = '$kode'");
        return mysqli_affected_rows($conn);
    }
    function hapus_admin($nik){
        global $conn;

        mysqli_query($conn, "DELETE FROM admin WHERE NIK = '$nik'");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $kode = $data["kode"];
        $pengguna = stripslashes($data["pengguna"]);
        $nik = stripslashes($data["nik"]);

        $query = "UPDATE pengguna SET Pengguna = '$pengguna', NIK = '$nik' WHERE Kode = '$kode'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ubahadmin($data){
        global $conn;

        $nik = $data["nik"];
        $pengguna = stripslashes($data["pengguna"]);
        $katasandi = stripslashes($data["katasandi"]);

        $katasandi = password_hash($katasandi, PASSWORD_DEFAULT);
        $query = "UPDATE admin SET Pengguna = '$pengguna', NIK = '$nik', Katasandi = '$katasandi' WHERE NIK = '$nik'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>