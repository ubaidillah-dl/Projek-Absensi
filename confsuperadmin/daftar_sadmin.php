<?php
    require '../konek.php';

    $notif = "";
    $err = "";
    if (isset($_POST["daftar"])){
        $pengguna = htmlspecialchars($_POST['pengguna']);
        $nik = htmlspecialchars($_POST['nik']);
        $katasandi = htmlspecialchars($_POST['katasandi']);
        $konfirmasisandi = htmlspecialchars($_POST['konfirmasisandi']);
        

        if ($pengguna == "" or $nik == "" or $katasandi == "" or $konfirmasisandi == "") {
            $err = "Isi semua data !";
        } else{
            if ($katasandi != $konfirmasisandi) {
                $err = "Konfirmasi sandi tidak sesuai !";
            } else {
                $admin = mysqli_query($conn, "SELECT * FROM sadmin WHERE NIK = '$nik'");
                if (mysqli_num_rows($admin) === 1) {
                    $err = "<b>$nik</b> sudah terdaftar !";
                }else {
                    $katasandi = password_hash($katasandi, PASSWORD_DEFAULT);
                    mysqli_query($conn, "INSERT INTO sadmin VALUES ('','$pengguna','$nik','$katasandi')");
                    $notif = "Super Admin berhasil ditambahkan !";
                }
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
    <title>Daftar S Admin</title>

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
                            <h4 class="mb-0">Daftar Super Admin</h4>
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
                                type="text" name="pengguna" id="pengguna" placeholder="Nama Super Admin"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded-0 border-bottom-0 text-center border"
                                type="text" maxlength="16" name="nik" id="nik" placeholder="NIK"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded-0 border-bottom-0 text-center border"
                                type="password" name="katasandi" id="katasandi" placeholder="Kata Sandi"
                                aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded-0 rounded-bottom text-center border"
                                type="password" name="konfirmasisandi" id="konfirmasisandi"
                                placeholder="Konfirmasi Kata Sandi" aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <!-- akhir daftar -->

                <!-- notif -->
                <div class="row m-0 mb-1">
                    <div class="col">
                        <div class=" d-flex justify-content-center ">
                            <?php if ($notif) { ?>
                            <div class="notif text-success mb-2 text-center" style="font-size: 14px;">
                                <?php echo $notif ?>
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
                <div class="row">
                    <div class="col">
                        <div class=" d-flex justify-content-center align-align-items-center ">
                            <button type="submit" name="daftar"
                                class=" shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1); width:70px;">
                                Daftar
                            </button>
                        </div>
                    </div>
                </div>
                <!-- akhir tombol -->

            </form>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>