<?php
    session_start();
    if (!isset($_SESSION['masuks'])) {
        header("location:masuk.php");
    }

    require 'konek.php';

    error_reporting(E_ALL * E_WARNING || E_NOTICE);
    
    if (isset($_POST["cari"])) {
        $katakunci = $_POST["katakunci"];
        
        $_SESSION["katakunci"] = $katakunci;
    }else{
        $katakunci = $_SESSION["katakunci"];        
    }

    $jumlahdatatiaphalaman = 12;  
    $jumlahdata = count(query("SELECT * FROM laporan WHERE 
                                                            MONTH(Tanggal) LIKE '%$katakunci%' OR 
                                                            YEAR(Tanggal) LIKE '%$katakunci%' OR 
                                                            Nama LIKE '%$katakunci%' OR
                                                            Kode LIKE '%$katakunci%'
                            ")
                        );
    $jumlahhalaman = ceil($jumlahdata / $jumlahdatatiaphalaman); 
    $halamanaktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
    $awaldata = ($jumlahdatatiaphalaman * $halamanaktif) - $jumlahdatatiaphalaman;

    $err = "";
    $jumlahnohal = 1;

    if ($halamanaktif > $jumlahnohal) {
        $nomerawal  = $halamanaktif - $jumlahnohal;
    }else {
        $nomerawal = 1;
    }

    if ($halamanaktif < ($jumlahhalaman - $jumlahnohal)) {
        $nomerakhir = $halamanaktif + $jumlahnohal;
    }else {
        $nomerakhir = $jumlahhalaman; 
    }

    $laporan = query("SELECT * FROM laporan WHERE 
                                                    MONTH(Tanggal) LIKE '%$katakunci%' OR 
                                                    YEAR(Tanggal) LIKE '%$katakunci%' OR 
                                                    Nama LIKE '%$katakunci%' OR
                                                    Kode LIKE '%$katakunci%' 
                                                    ORDER BY Tanggal DESC LIMIT $awaldata,$jumlahdatatiaphalaman
                    ");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Beranda</title>
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
                <img src="assets/logoputih.png" alt="" height="50" class="d-inline-block me-3">Daftar Hadir Karyawan
                PTGM</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="karyawan.php">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="rekap.php">Rekap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="keluar.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- container -->
    <div class="container">

        <!-- bagian atas -->
        <div class="row my-3">
            <div class="col-8 d-flex align-items-center">
                <div>
                    <form class="d-flex align-items-center" method="post" action="beranda.php">

                        <!-- cari -->
                        <button
                            class="d-none btn btn-sm bg-white border shadow-none rounded-start rounded-0 border-end-0"
                            type="submit" name="cari">
                            <img src="assets/search.svg" title="Cari" alt="">
                        </button>
                        <!-- akhir cari -->

                        <!-- katakunci -->
                        <input type="text" name="katakunci" style="width: 260px;"
                            class="form-control form-control-sm text-center shadow-none rounded rounded"
                            aria-label="Sizing example input" autofocus autocomplete="off" 0
                            title="Masukkan kata kunci pencarian Anda" placeholder="Cari Nama, Kode, Bulan atau Tahun"
                            aria-describedby="inputGroup-sizing-sm">
                        <!-- akhir katakunci -->

                    </form>
                </div>
            </div>
            <div class="col-4">

                <!-- pagination -->
                <div class="d-flex justify-content-end ">
                    <ul class="m-0 p-0 pagination pagination-sm">
                        <?php if ($halamanaktif > 1) : ?>
                        <li class="page-item">
                            <a class="page-link rounded-start" href="?halaman=<?= $halamanaktif -1; ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php for($i=$nomerawal; $i <= $nomerakhir; $i++) : ?>

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
                            <a class="page-link rounded-end" href="?halaman=<?= $halamanaktif +1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- akhir pagination -->

            </div>
        </div>
        <!-- akhir bagian atas -->

        <!-- tabel -->
        <div class="row">
            <div class="col">

                <div id="tabel">
                    <table class="table table-borderless text-center ">
                        <thead style="background-color: rgba(41, 97, 174, 1);" class="text-white">
                            <tr>
                                <th scope="col" class="col-2">Nama</th>
                                <th scope="col" class="col-1">Kode</th>
                                <th scope="col" class="col-2">Tanggal</th>
                                <th scope="col" class="col-2">Datang</th>
                                <th scope="col" class="col-2">Pulang</th>
                                <th scope="col" class="col-2">Keterangan</th>
                                <th scope="col" class="col-1">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $no = 1; 
                                if (empty($laporan)) {
                                    $err = "Data tidak ditemukan !";
                                }

                                foreach ($laporan as $row) : 
                                require 'keterangan.php';
                            ?>

                            <tr>
                                <td><?= $row["Nama"]?></td>
                                <td><?= $row["Kode"]; ?></td>
                                <td><?= $tanggal; ?></td>
                                <td><?= $jamdatang ?></td>
                                <td><?= $jampulang?></td>
                                <td><?= $statusjamdatang ?></td>
                                <td> <a target="_blank"
                                        href="https://www.google.com/maps/place/<?= $row["Garislintang"] ?>,<?= $row["Garisbujur"]?>"><img
                                            src="assets/location.svg" alt=""></a></td>
                            </tr>
                            <?php 
                                $no++; 
                                endforeach 
                            ?>

                            <?php if ($err) { ?>
                            <tr>
                                <td colspan="6" style="padding-top: 5%; color:red;"><?php echo $err ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- akhir tabel -->

    </div>
    <!-- akhir container -->

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>