<?php
    session_start();
    if (!isset($_SESSION['masuk'])) {
        header("location:masuk.php");
    }

    require 'konek.php';

    $jumlahdatatiaphalaman = 12; 
    $jumlahdata = count(query("SELECT * FROM pengguna")); 
    $jumlahhalaman = ceil($jumlahdata / $jumlahdatatiaphalaman); 
    $halamanaktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
    $awaldata = ($jumlahdatatiaphalaman * $halamanaktif) - $jumlahdatatiaphalaman;

    $err = "";
    if (isset($_POST["cari"])) {
        $katakunci = $_POST["katakunci"];

        if (!empty($katakunci)) {
            
            $jumlahdatatiaphalaman = 12;
            $jumlahdata = count(query("SELECT * FROM pengguna WHERE 
                            Pengguna LIKE '%$katakunci%' OR 
                            Kode LIKE '%$katakunci%' OR 
                            NIK LIKE '%$katakunci%'")); 
            $jumlahhalaman = ceil($jumlahdata / $jumlahdatatiaphalaman);
            $halamanaktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
            $awaldata = ($jumlahdatatiaphalaman * $halamanaktif) - $jumlahdatatiaphalaman;

            $laporan = query("SELECT * FROM pengguna WHERE 
                            Pengguna LIKE '%$katakunci%' OR 
                            Kode LIKE '%$katakunci%' OR 
                            NIK LIKE '%$katakunci%' ORDER BY Id DESC LIMIT $awaldata,$jumlahdatatiaphalaman");
        }else{
            $laporan = query("SELECT * FROM pengguna ORDER BY Id DESC LIMIT $awaldata,$jumlahdatatiaphalaman");
        }
    }else{
        $laporan = query("SELECT * FROM pengguna ORDER BY Id DESC LIMIT $awaldata,$jumlahdatatiaphalaman");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rekap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/beranda.css" rel="stylesheet">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark p-2" style="background-color: #2961AE;">
        <div class="container">
            <a class="navbar-brand align-text-center fs-2 d-flex align-items-center fw-semibold " href="#">
                <img src="assets/logoputih.png" alt="" height="50" class="d-inline-block me-3">Rekapitulasi Data
                Absensi</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="keluar.php">Keluar</a>
                    </li </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- container -->
    <div class="container">

        <!-- bagian atas -->
        <div class="row mt-3">
            <div class="col-6">
                <div>
                    <form class="d-flex align-items-center" method="post" action="">

                        <!-- cari kata kunci -->
                        <div class=" w-100 input-group input-group-sm">
                            <input type="text" name="katakunci"
                                class="form-control text-center border shadow-none rounded-start border-end-0"
                                aria-label="Sizing example input" autofocus autocomplete="off"
                                title="Masukkan kata kunci pencarian Anda" placeholder="Cari Nama, Kode, & NIK"
                                aria-describedby="inputGroup-sizing-sm">
                            <button class="bg-white border rounded-end border-start-0" type="submit" name="cari">
                                <img src="assets/search.svg" title="Cari" alt="">
                            </button>
                        </div>
                        <!-- akhir cari kata kunci -->

                    </form>
                </div>
            </div>
            <div class="col-6">

                <!-- pagination -->
                <div>
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end pagination-sm">
                            <?php if ($halamanaktif > 1) : ?>
                            <li class="page-item">
                                <a class="page-link " href="?halaman=<?= $halamanaktif -1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php for($i=1; $i <= $jumlahhalaman; $i++) : ?>

                            <?php if($i == $halamanaktif) : ?>
                            <li class="page-item active ">
                                <a class="page-link" style="background-color: #2961AE; border: #2961AE 1px solid"
                                    href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                            <?php else :?>
                            <li class="page-item ">
                                <a class="page-link " href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($halamanaktif < $jumlahhalaman) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $halamanaktif +1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <!-- akhir pagination -->

            </div>
        </div>
        <!-- akhir bagian atas -->

        <div class="row">
            <div class="col">
                <div id="tabel">

                    <!-- tabel -->
                    <table class="table table-borderless text-center ">
                        <thead style="background-color: rgba(41, 97, 174, 1);" class="text-white">
                            <tr>
                                <!-- <th scope="col" class="col-3">Nomer</th> -->
                                <th scope="col" class="col-3">Nama</th>
                                <th scope="col" class="col-3">Kode</th>
                                <th scope="col" class="col-3">NIK</th>
                                <th scope="col" class="col-3">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            if (empty($laporan)) {
                                    $err = "Data tidak ditemukan !";
                            } 
                            foreach ($laporan as $row) : 
                            
                            ?>
                            <tr>
                                <td><?= $row["Pengguna"]; ?></td>
                                <td><?= $row["Kode"]; ?></td>
                                <td><?= $row["NIK"]; ?></td>
                                <td>ha </td>
                            </tr>
                            <?php endforeach ?>

                            <?php if ($err) { ?>
                            <tr>
                                <td colspan="6" style="padding-top: 5%; color:red;"><?php echo $err ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                    <!-- akhir tabel -->

                </div>
            </div>
        </div>

    </div>
    <!-- akhir container -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/beranda.js"></script>
</body>

</html>