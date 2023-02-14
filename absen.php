<?php
    require 'konek.php';

    date_default_timezone_set("Asia/Jakarta");
    date_default_timezone_get();
    $tanggal = (date('y-m-d'));
    $jam = (date('H:i:s'));

    $err = "";
    $notif = "";
    if (isset($_POST["datang"])) {
        $pengguna = htmlspecialchars($_POST["pengguna"]);
        $kode = htmlspecialchars($_POST["kode"]);
        $garislintang = htmlspecialchars($_POST["latitude"]);
        $garisbujur = htmlspecialchars($_POST["longitude"]);

        if ($pengguna == "" && $kode == "") {
            $err = "Masukkan nama karyawan dan kode !";
        } else if ($pengguna == "") {
            $err = "Masukkan nama karyawan !";
        } else if ($kode == "") {
            $err = "Masukkan kode !";
        }else if($garisbujur == "" && $garislintang == ""){
            $err = "Tidak dapat mendeteksi lokasi !";
        }else {
                
            $ambil = mysqli_query($conn, "SELECT * FROM pengguna WHERE Pengguna = '$pengguna' AND Kode = '$kode'");

            // Cek ketersediaan data
            if (mysqli_num_rows($ambil) >= 1) {
                $data = mysqli_fetch_assoc($ambil);

                $ambillaporan = mysqli_query($conn, "SELECT * FROM laporan WHERE Nama = '$pengguna' AND Kode = '$kode' ORDER BY Id DESC");

                if ($pengguna == $data['Pengguna'] && $kode == $data['Kode']) {
                    $datalaporan = mysqli_fetch_assoc($ambillaporan);
                    $datalaporan = isset($datalaporan["Tanggal"]) ? $datalaporan["Tanggal"] : ''; 
            
                    if (strtotime($datalaporan) == strtotime($tanggal)) {
                        $err ="Anda sudah absen datang hari ini !";
                    }else if(strtotime($datalaporan) != strtotime($tanggal)){
                        $laporan = mysqli_query($conn, "INSERT INTO laporan VALUES ('','$pengguna','$kode','$tanggal','$jam','','1','Hadir','$garislintang','$garisbujur')");
                        $notif = "Selamat datang <b>$pengguna</b> !";
                    }            
                } else {
                    $err = "Kode salah !";
                }
            } else {
                $err = "Karyawan <b>$pengguna</b> dengan kode <b>$kode</b> belum terdaftar !";
            }
        }
    }else if (isset($_POST["pulang"])) {
        $pengguna = htmlspecialchars($_POST["pengguna"]);
        $kode = htmlspecialchars($_POST["kode"]);
        $tanggal = (date('y-m-d'));
        $jam = (date('H:i:s', time()));

        if ($pengguna == "" && $kode == "") {
            $err = "Masukkan nama karyawan dan kode !";
        } else if ($pengguna == "") {
            $err = "Masukkan nama karyawan !";
        } else if ($kode == "") {
            $err = "Masukkan kode !";
        }else{
            $ambil = mysqli_query($conn, "SELECT * FROM pengguna WHERE Pengguna = '$pengguna' AND Kode = '$kode'");

            // Cek ketersediaan data
            if (mysqli_num_rows($ambil) > 0) {
                $data = mysqli_fetch_assoc($ambil);

                $cektanggal = mysqli_query($conn, "SELECT * FROM laporan WHERE Nama = '$pengguna' AND Kode = '$kode' AND Tanggal = '$tanggal'");

                if (mysqli_num_rows($cektanggal) > 0) {
                    $data = mysqli_fetch_assoc($cektanggal);
                    $datatgl = isset($data["Tanggal"]) ? $data["Tanggal"] : '';
                    $datack = isset($data["Cek"]) ? $data["Cek"] : '';

                    if (strtotime($datatgl) == strtotime($tanggal)) {
                        if ($datack == 1) {
                            // $err = $datack;
                            mysqli_query($conn, "UPDATE laporan SET Cek = '0', Pulang = '$jam' WHERE Nama = '$pengguna' AND Kode = '$kode' AND Tanggal = '$tanggal'");
                            $err = "Selamat tinggal <b>$pengguna</b> !";
                        }else if($datack != 1){
                            $err = "Anda sudah absen pulang hari ini !";
                        }
                    }else{
                        $err = "anda belum absen";
                    }
                } else{
                    $err = "Anda belum absen datang !";
                }
            } else {
                $err = "Karyawan <b>$pengguna</b> dengan kode <b>$kode</b> belum terdaftar !";
            }
        }
    }else if (isset($_POST["izin"])) {
        $pengguna = htmlspecialchars($_POST["pengguna"]);
        $kode = htmlspecialchars($_POST["kode"]);
        $garislintang = htmlspecialchars($_POST["latitude"]);
        $garisbujur = htmlspecialchars($_POST["longitude"]);
        $keteranganizin = htmlspecialchars($_POST["keteranganizin"]);

        if ($pengguna == "" && $kode == "") {
            $err = "Masukkan nama karyawan dan kode !";
        } else if ($pengguna == "") {
            $err = "Masukkan nama karyawan !";
        } else if ($kode == "") {
            $err = "Masukkan kode !";
        }else if($garisbujur == "" && $garislintang == ""){
            $err = "Tidak dapat mendeteksi lokasi !";
        }else{
            $ambil = mysqli_query($conn, "SELECT * FROM pengguna WHERE Pengguna = '$pengguna' AND Kode = '$kode'");

            // Cek ketersediaan data
            if (mysqli_num_rows($ambil) >= 1) {
                $data = mysqli_fetch_assoc($ambil);

                $ambillaporan = mysqli_query($conn, "SELECT * FROM laporan WHERE Nama = '$pengguna' AND Kode = '$kode' ORDER BY Id DESC");

                if ($pengguna == $data['Pengguna'] && $kode == $data['Kode']) {
                    $datalaporan = mysqli_fetch_assoc($ambillaporan);
                    $datalaporan = isset($datalaporan["Tanggal"]) ? $datalaporan["Tanggal"] : ''; 
            
                    if (strtotime($datalaporan) == strtotime($tanggal)) {
                        $err ="Anda sudah melakukan izin tidak datang hari ini  !";
                    }else if(strtotime($datalaporan) != strtotime($tanggal)){
                        $laporan = mysqli_query($conn, "INSERT INTO laporan VALUES ('','$pengguna','$kode','$tanggal','','','0','$keteranganizin','$garislintang','$garisbujur')");
                        $notif = "Terimakasih <b>$pengguna</b>, izin sudah dikirim !";
                    }            
                } else {
                    $err = "Kode salah !";
                }
            } else {
                $err = "Karyawan <b>$pengguna</b> dengan kode <b>$kode</b> belum terdaftar !";
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
    <title>Absen</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/absen.css" rel="stylesheet">

    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".notif").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    });
    </script>
</head>

<body onload="getLocation();">
    <div class=" container d-flex align-items-center justify-content-center ">
        <div class=" p-3 rounded" style="width: 300px; background:white;">
            <form class="myform" action="" method="post">
                <!-- label -->
                <div class="row mb-2">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="assets/favicon.png" alt="" height="50">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <h4 class="mb-0">Absen</h4>
                        </div>
                    </div>
                </div>
                <!-- akhir label -->

                <!-- nama karyawan -->
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded-0 rounded-top text-center border" type="text"
                                id="pengguna" name="pengguna" placeholder="Nama Karyawan"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <!-- akhir nama karyawan -->

                <!-- nomor karyawan -->
                <div class="row mb-2">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input
                                class="form-control shadow-sm rounded-0 rounded-bottom text-center border-0 border-bottom border-end border-start"
                                type="text" id="kode" name="kode" placeholder="Kode"
                                aria-label=".form-control-sm example">
                            <input type="hidden" name="latitude" id="latitude" value="">
                            <input type="hidden" name="longitude" id="longitude" value="">
                        </div>
                    </div>
                </div>
                <!-- akhir nomor karyawan -->

                <!-- notif -->
                <div class="row m-0 mb-2">
                    <div class="col">
                        <div class=" d-flex justify-content-center " id="demo">
                            <?php if ($err) { ?>
                            <div class="notif text-danger" style="font-size: 14px;">
                                <?php echo $err ?>
                            </div>
                            <?php  } ?>
                            <?php if ($notif) { ?>
                            <div class="notif text-success" style="font-size: 14px;">
                                <?php echo $notif ?>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
                <!-- akhir notif -->

                <!-- tombol -->
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex justify-content-start">

                            <button type="submit" id="datang" name="datang"
                                class="shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1);  width:70px">
                                Datang
                            </button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" d-flex justify-content-center">

                            <!-- izin -->
                            <button type="button" class="shadow-sm btn-sm btn rounded fw-normal text-white px-2"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="background-color: rgba(41,97,174,1);  width:70px">
                                Izin
                            </button>

                            <div class="modal modal-sm fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Keterangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="d-flex justify-content-center ">
                                                        <input class="form-control shadow-sm rounded text-center border"
                                                            type="text" id="keteranganizin" autocomplete="off"
                                                            name="keteranganizin" placeholder="Tulis Keterangan Izin"
                                                            aria-label=".form-control-sm example">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex justify-content-center ">
                                                        <button type="submit" name="izin" id="izin"
                                                            class="shadow-sm button rounded btn btn-sm fw-normal text-white px-2"
                                                            style="background-color: rgba(41,97,174,1); height: 30px; width:50px">
                                                            Kirim
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir izin -->

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end ">
                            <button type="submit" id="pulang" name="pulang"
                                class=" shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1); width:70px">
                                Pulang
                            </button>
                        </div>
                    </div>
                </div>
                <!-- akhir tombol -->

                <div class="row mt-5">
                    <div class="col">
                        <div class="text-center">
                            <a target="_blank" style="text-decoration: none; color:rgba(41,97,174,1);"
                                href="confkaryawan/daftar_karyawan.php">Karyawan
                                baru ?</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-8">
                    <div class="col">
                        <div class="text-center" style="font-size: 0.7em;">
                            <p class="mt-5 mb-3 text-muted">&copy; 2023 Teknik Mekatronika (UTM) - v1.1</p>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/geolocation.js"></script>

</body>

</html>