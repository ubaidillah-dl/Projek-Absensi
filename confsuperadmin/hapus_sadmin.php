<?php
    require '../konek.php';

    $notif = "";
    $err = "";
    
    if (isset($_POST["ubah"])){
        $nik = htmlspecialchars($_POST['nik']);

        if ($nik == "" ) {
            $err = "Masukkan NIK !";
        } else{
            $sadmin = mysqli_query($conn, "SELECT * FROM sadmin WHERE NIK = '$nik'");

            if (mysqli_num_rows($sadmin) === 1) {
                mysqli_query($conn, "DELETE FROM sadmin WHERE NIK = '$nik'");
                $notif = "Data super admin berhasil dihapus !";
            }else {
                $err = "Super admin dengan NIK <b>$nik</b> tidak ditemukan !";
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
    <title>Hapus S Admin</title>

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
                            <h4 class="mb-0">Hapus Super Admin</h4>
                        </div>
                    </div>
                </div>
                <!-- akhir label -->

                <!-- daftar -->
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <input class="shadow-sm form-control rounded border text-center border" type="text"
                                maxlength="16" name="nik" id="nik" placeholder="NIK"
                                aria-label=" .form-control-sm example">
                        </div>
                    </div>
                </div>
                <!-- akhir daftar -->

                <!-- notif -->
                <div class="row m-0 mb-3">
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
                            <button type="submit" name="ubah"
                                class=" shadow-sm btn-sm btn rounded fw-normal text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCentered"
                                style="background-color: rgba(41,97,174,1); width:70px;">
                                Hapus
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