<?php
    // Start Sesi
    session_start();

    // Konek database
    include('konek.php');

    $err = "";

    // Cek tombol sudah ditekan
    if (isset($_POST['masuks'])) {
        $user = $_POST['pengguna'];
        $pass = $_POST['katasandi'];

        // Cek form login
        if ($user == "" && $pass == "") {
            $err = "Masukkan nama super admin dan kata sandi !";
        } else if ($user == "") {
            $err = "Masukkan nama super admin !";
        } else if ($pass == "") {
                $err = "Masukkan kata sandi !";
        } else {
            // Ambil data dari tabel
            $ambil = mysqli_query($conn, "SELECT * FROM sadmin WHERE Pengguna = '$user'");

            // Cek ketersediaan data
            if (mysqli_num_rows($ambil) === 1) {
                $data = mysqli_fetch_assoc($ambil);

                // Cek password
                if (password_verify($pass, $data['Katasandi'])) {
                    $_SESSION['masuks'] = true;

                    // Pindah halaman
                    header("location:beranda.php");
                    exit();
                } else {
                    $err .= "Kata sandi salah !";
                }
            } else {
                $err .= "Super Admin <b>$user</b> belum terdaftar !";
            }
        }
    }

    // Cek tombol sudah ditekan
    if (isset($_POST['masuk'])) {
        $user = $_POST['pengguna'];
        $pass = $_POST['katasandi'];

        // Cek form login
        if ($user == "" && $pass == "") {
            $err = "Masukkan nama admin dan kata sandi !";
        } else if ($user == "") {
            $err = "Masukkan nama admin !";
        } else if ($pass == "") {
                $err = "Masukkan kata sandi !";
        } else {
            
            // Ambil data dari tabel
            $ambil = mysqli_query($conn, "SELECT * FROM admin WHERE Pengguna = '$user'");

            // Cek ketersediaan data
            if (mysqli_num_rows($ambil) === 1) {
                $data = mysqli_fetch_assoc($ambil);

                // Cek password
                if (password_verify($pass, $data['Katasandi'])) {
                    $_SESSION['masuk'] = true;

                    // Pindah halaman
                    header("location:rekapa.php");
                    exit();
                } else {
                    $err .= "Kata sandi salah !";
                }
            } else {
                $err .= "Admin <b>$user</b> belum terdaftar !";
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
    <title>Masuk</title>

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

<body>
    <div class=" container d-flex align-items-center justify-content-center ">
        <div class=" p-3 rounded" style="width: 300px; background:white;">

            <form action="" method="post">

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
                            <h4 class="mb-0">Masuk</h4>
                        </div>
                    </div>
                </div>
                <!-- akhir label -->

                <!-- admin -->
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input
                                class="shadow-sm form-control rounded-0 rounded-top text-center border-0 border-end border-start border-top"
                                type="text" name="pengguna" id="pengguna" placeholder="Nama"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded-0 rounded-bottom text-center border"
                                type="password" name="katasandi" id="katasandi" placeholder="Kata Sandi"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <!-- akhir admin -->

                <!-- notif -->
                <div class="row m-0 mb-1">
                    <div class="col">
                        <div class=" d-flex justify-content-center ">
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
                <div class="row">
                    <div class="col">
                        <div class=" d-flex justify-content-center align-align-items-center ">
                            <button type="submit" name="masuks"
                                class=" shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1); width:70px;">
                                S Admin
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class=" d-flex justify-content-center align-align-items-center ">
                            <button type="submit" name="masuk"
                                class=" shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1); width:70px;">
                                Admin
                            </button>
                        </div>
                    </div>
                </div>
                <!-- akhir tombol -->

                <div class="row mt-5">
                    <div class="col">
                        <div class="text-center">
                            <a target="_blank" style="text-decoration: none; color:rgba(41,97,174,1);"
                                href="confadmin/daftar_admin.php">Admin
                                baru ?</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>