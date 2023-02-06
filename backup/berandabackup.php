<?php
    session_start();
    if (!isset($_SESSION['masuk'])) {
        header("location:masuk.php");
    }

    require 'konek.php';

    $err = "";
    if (isset($_POST["cari"])) {
        $katakunci = $_POST["katakunci"];
        $tanggal = $_POST["tanggal"];
        $keytanggal = strtotime($katakunci);

        if (!empty($tanggal) && !empty($katakunci)) {
            $laporan = query("SELECT * FROM laporan WHERE Tanggal = '$tanggal' AND Nama LIKE '%$katakunci%' OR Kode LIKE '%$katakunci%'");
        } else if (!empty($tanggal)) {
            $laporan = query("SELECT * FROM laporan WHERE Tanggal = '$tanggal'");
        }else if (!empty($katakunci)) {
            $laporan = query("SELECT * FROM laporan WHERE Nama LIKE '%$katakunci%' OR Kode LIKE '%$katakunci%'");
        }else{
            $laporan = query("SELECT * FROM laporan ORDER BY Id DESC");
        }
    }else{
        $laporan = query("SELECT * FROM laporan ORDER BY Id DESC");
    }

    $notif = "";
    if(isset($_POST['unduhexcel'])){
        $nama = $_POST['nama'];
        $kode = $_POST['kode'];
        $bulan = $_POST['bulan'];

        if ($nama == "" or $kode == "" or $bulan = "") {
            $notif = "Isi semua data";
        } else {
            $cek = mysqli_query($conn, "SELECT * FROM laporan WHERE Nama = '$nama' AND Kode = '$kode'");
            $ambilcek = mysqli_fetch_assoc($cek);

            // cek nama dan kode
            if ($nama == $ambilcek['Nama'] && $kode == $ambilcek['Kode']) {
                $notif = "cocok";
            }else{
                $notif = "tidak cocok";
            }
        
        // if (mysqli_num_rows($ambilexcel) > 0) {
        //     $cekexcel = mysqli_fetch_assoc($ambilexcel);

        //     if ($cekexcel['Nama'] == $nama && $cekexcel['Kode'] == $kode) {
        //        $err ="sama kok";
        //     }

        // }else{
        //     $err = "ra cocok";
        // }
        }



        
        // $unduhexcel = mysqli_fetch_assoc($ambilexcel);

        // $excel = $unduhexcel['Nama'];
        // $unduhexcel = isset($unduhexcel["Nama"]) ? $datalaporan["Nama"] : ''; 

        // $err = $unduhexcel['Nama'];
        
    }elseif (isset($_POST['unduhpdf'])) {
        $err = "unduh pdf";
    }


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
                <img src="assets/logoputih.png" alt="" height="50" class="d-inline-block me-3">Absensi</a>
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
                        <a class="nav-link active" aria-current="page" href="pengguna.php">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
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

        <!-- tombol -->
        <div class="row my-3">
            <div class="col">
                <div>
                    <form class="d-flex align-items-center" method="post" action="">
                        <div class="container d-flex justify-content-center ">
                            <div class=" w-50 input-group input-group">
                                <input type="text"
                                    class="form-control text-center border shadow-none rounded-start border-end-0"
                                    aria-label="Sizing example input" autofocus
                                    title="Masukkan kata kunci pencarian Anda"
                                    placeholder="Cari Nama, Kode, Tanggal, Bulan & Tahun"
                                    aria-describedby="inputGroup-sizing-sm">
                                <button class="bg-white border rounded-end border-start-0 ">
                                    <img src="assets/search.svg" title="Cari" alt="">
                                </button>
                            </div>
                        </div>

                        <!-- cari kata kunci -->
                        <!-- <div style="width: 180px;" class="me-2">
                            <select class="form-select form-select-sm text-center" aria-label=".form-select-sm example">
                                <option selected>Nama</option>
                                <option value="1">One dddddddddddddddddddddddddd</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div style="width: 110px;" class="me-2">
                            <select class="form-select form-select-sm text-center" aria-label=".form-select-sm example">
                                <option selected>Kode</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div style="width: 110px;" class="me-2">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Tanggal</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div> -->

                        <!-- <button type="submit" name="cari" id="cari"
                            class="shadow-sm submit rounded btn btn-sm fw-normal text-white px-2"
                            style="background-color: rgba(41,97,174,1); height: 30px;">
                            Cari
                        </button> -->
                        <!-- akhir cari kata kunci -->

                        <!-- unduh -->
                        <!-- <button type="button" class="shadow-sm btn ms-auto rounded btn-sm fw-normal text-white px-2"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="background-color: rgba(41,97,174,1); height: 30px;">
                            Unduh
                        </button> -->

                        <div class="modal fade modal-sm" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-center">
                                        <h5 class=" modal-title" id="exampleModalLabel">
                                            Pilih
                                            ekstensi file
                                        </h5>
                                    </div>
                                    <div class="modal-body ">

                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex justify-content-center">
                                                    <input
                                                        class="form-control form-control-sm text-center shadow-sm border-bottom-0 rounded-0 rounded-top"
                                                        placeholder="Masukkan Nama" type="text" name="nama" id="nama"
                                                        aria-label=".form-control-sm example">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex justify-content-center">
                                                    <input
                                                        class="form-control form-control-sm border-bottom-0 shadow-sm rounded-0 text-center"
                                                        placeholder="Masukkan Kode" type="text" name="kode" id="kode"
                                                        aria-label=".form-control-sm example">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="d-flex justify-content-center">
                                                    <input
                                                        class="form-control form-control-sm rounded-0 shadow-sm rounded-bottom text-center"
                                                        type="text" placeholder="Masukkan bulan 1-12" name="bulan"
                                                        id="bulan" aria-label=".form-control-sm example">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div>
                                                    <?php if ($notif) { ?>
                                                    <?php echo $notif ?></td>
                                                    <?php  } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex justify-content-center ">
                                                    <button type="submit" name="unduhexcel" id="unduhexcel"
                                                        value="unduhexcel"
                                                        class="shadow-sm submit rounded btn btn-sm fw-normal text-white px-2"
                                                        style="background-color: rgba(41,97,174,1); height: 30px; width:50px">
                                                        .xlsx
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex justify-content-center ">
                                                    <button type="submit" name="unduhpdf" id="unduhpdf" value="unduhpdf"
                                                        class="shadow-sm submit rounded btn btn-sm fw-normal text-white px-2"
                                                        style="background-color: rgba(41,97,174,1); height: 30px; width:50px">
                                                        .pdf
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- akhir unduh -->

                    </form>
                </div>
            </div>
        </div>
        <!-- akhir tombol -->

        <div class="row">
            <div class="col">
                <div id="tabel">

                    <!-- tabel -->
                    <table class="table table-borderless text-center ">
                        <thead style="background-color: rgba(41, 97, 174, 1);" class="text-white">
                            <tr>
                                <th scope="col" class="col-2">Nama</th>
                                <th scope="col" class="col-2">Tanggal</th>
                                <th scope="col" class="col-2">Datang</th>
                                <th scope="col" class="col-2">Pulang</th>
                                <th scope="col" class="col-2">Status</th>
                                <th scope="col" class="col-2">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $no = 1; 
                                if (empty($laporan)) {
                                    $err = "Data tidak ditemukan !";
                                }

                                foreach ($laporan as $row) : 
                                $balik = $row["Tanggal"];
                                $tanggal = date("d-m-Y",strtotime($balik));

                                $jamdatang = $row["Datang"]; 
                                $statusjamdatang = $row["Datang"]; 
                                $jampulang = $row["Pulang"]; 
                                $jammasuk = "08:00:00";
                                $statusjammasuk = "08:00:00";
                                $jamkeluar = "17:00:00";

                                // cek ada yang izin atau tidak
                                if ($jamdatang == "00:00:00" && $jampulang == "00:00:00") {
                                    $jamdatang = "<img src='assets/emoji-frown-fill.svg '>";
                                    $statusjamdatang = "<img src='assets/emoji-frown-fill.svg '>";
                                    $jampulang = "<img src='assets/emoji-frown-fill.svg '>";
                                }else if ($jampulang == "00:00:00" && $jamdatang == $jamdatang) {
                                    if($jamdatang > $jammasuk){
                                        $jamdatang = "
                                            <div class='fw-semibold text-white d-flex align-items-center justify-content-center'>
                                                <div class='bg-danger rounded px-2'>$jamdatang
                                                </div>
                                            </div>";
                                    }

                                    if($jampulang < $jamkeluar){
                                        $jampulang = "Belum Pulang";    
                                    }
                                    
                                    if($statusjamdatang > $statusjammasuk){
                                        $statusjamdatang = "Terlambat";
                                    } else {
                                        $statusjamdatang = "Tepat Waktu";
                                    }

                                }else {
                                    if($jamdatang > $jammasuk){
                                        $jamdatang = "
                                            <div class='fw-semibold text-white d-flex align-items-center justify-content-center'>
                                                <div class='bg-danger rounded px-2'>$jamdatang
                                                </div>
                                            </div>";
                                    } 

                                    if($jampulang < $jamkeluar){
                                        $jampulang = "
                                            <div class='fw-semibold text-white d-flex align-items-center justify-content-center'>
                                                <div class='bg-danger rounded px-2'>$jampulang
                                                </div>
                                            </div>";    
                                    }

                                    if($statusjamdatang > $statusjammasuk){
                                        $statusjamdatang = "Terlambat";
                                    } else {
                                        $statusjamdatang = "Tepat Waktu";
                                    }
                                }
                            ?>

                            <tr>
                                <td><?= $row["Nama"]?> ( <?= $row["Kode"]; ?> )</td>
                                <td><?= $tanggal; ?></td>
                                <td><?= $jamdatang ?></td>
                                <td><?= $jampulang?></td>
                                <td><?= $statusjamdatang ?></td>
                                <td><?= $row["Izin"]; ?></td>
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
                    <!-- akhir tabel -->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <?php
                    echo $err; 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir container -->

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>