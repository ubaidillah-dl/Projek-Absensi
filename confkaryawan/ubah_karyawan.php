<?php
    require '../konek.php';

    $kode = $_GET["kode"];
    $karyawan = query("SELECT * FROM pengguna WHERE Kode = '$kode'")[0];

    $notif = "";
    $err = "";

    if (isset($_POST["ubah"])) {
        $pengguna = htmlspecialchars($_POST['pengguna']);
        $nik = htmlspecialchars( $_POST['nik']);
        
        if ($pengguna == "" && $nik == "") {
            $err = "Masukkan nama karyawan dan nik !";
        } else if ($pengguna == "") {
            $err = "Masukkan nama karyawan !";
        } else if ($nik == "") {
            $err = "Masukkan nomor nik !";
        }else{
            if(ubah($_POST) > 0){
                echo "
                    <script>
                        alert('Data karyawan berhasil diubah !');
                        document.location.href = '../karyawan.php';
                    </script>
                    ";
        }else{
                $err = "Data karyawan gagal diubah !";
        }
    }        
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Karyawan</title>

    <link rel="icon" type="image/x-icon" href="../assets/favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/absen.css" rel="stylesheet">

    <script src="../js/jquery-2.2.3.min.js"></script>
    <script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".notif").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    });
    </script>
    <script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".lama").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 30000);
    });
    </script>

</head>

<body>
    <div class=" container d-flex align-items-center justify-content-center ">
        <div class=" p-3 rounded" style="width: 300px; background:white;">
            <form action="" method="post">
                <!-- label -->
                <div class="row mb-2">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="../assets/favicon.png" alt="" height="50">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <h4 class="mb-0">Ubah Data Karyawan</h4>
                        </div>
                    </div>
                </div>
                <!-- akhir label -->

                <!-- daftar -->
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input
                                class="shadow-sm form-control rounded-0 rounded-top text-center border-0 border-end border-start border-top"
                                type="hidden" name="kode" id="kode" value="<?= $karyawan["Kode"]; ?>"
                                placeholder="Nama Karyawan" aria-label=".form-control-sm example">
                            <input
                                class="shadow-sm form-control rounded-0 rounded-top text-center border-0 border-end border-start border-top"
                                type="text" name="pengguna" id="pengguna" value="<?= $karyawan["Pengguna"]; ?>"
                                placeholder="Nama Karyawan" aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded-0 rounded-bottom text-center border"
                                type="text" maxlength="20" name="nik" value="<?= $karyawan["NIK"]; ?>" id="nik"
                                placeholder="NIK" aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <!-- akhir daftar -->

                <!-- notif -->
                <div class="row m-0 mb-1">
                    <div class="col">
                        <div class=" d-flex justify-content-center ">
                            <?php if ($notif) { ?>
                            <div class="lama text-success mb-2 text-center" style="font-size: 14px;">Karyawan
                                berhasil
                                ditambahkan !<br>Gunakan kode<strong>
                                    <?php echo $notif ?></strong> untuk absen.
                            </div>
                            <?php  } ?>

                            <?php if ($err) { ?>
                            <div class="notif text-danger" style="font-size: 14px;">
                                <?php echo $err ?>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
                <!-- akhir notif -->

                <!-- tombol -->
                <div class="row m-3">
                    <div class="col">
                        <div class=" d-flex justify-content-center align-align-items-center ">
                            <button type="submit" name="ubah"
                                class=" shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1); width:70px;">
                                Ubah
                            </button>
                        </div>
                    </div>
                </div>
                <!-- akhir tombol -->

                <div class="row mt-5">
                    <div class="col">
                        <div class="text-center" style="font-size: 0.7em;">
                            <p class="mt-5 mb-3 text-muted">&copy; 2023 Teknik Mekatronika (UTM) - v1.1</p>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>