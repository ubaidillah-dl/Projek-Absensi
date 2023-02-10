<?php
    require 'konek.php';
    require 'vendor/autoload.php';
    require_once __DIR__ . '/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Writer\Csv;

    date_default_timezone_set("Asia/Jakarta");
    date_default_timezone_get();
    $tanggal = (date('y-m-d'));

    $html = "";

    if(isset($_POST["unduhexcel"])) {
        $kode = $_POST["kode"];
        $bulan = $_POST["bulan"];
        $tahun = $_POST["tahun"];

        if ($bulan == "Pilih Bulan") {
            $bulan = $tanggal;
        }else{
            $bulan = $bulan;
        }
        
        if($tahun == "Pilih Tahun"){
            $tahun = $tanggal;
        }else{
            $tahun = $tahun;
        }

        $laporan = query("SELECT * FROM laporan WHERE 
                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = '$bulan' AND 
                                                        YEAR(Tanggal) = '$tahun' OR 
                                                        
                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = MONTH('$bulan') AND 
                                                        YEAR(Tanggal) = YEAR('$tahun') OR

                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = '$bulan' AND 
                                                        YEAR(Tanggal) = YEAR('$tahun') OR

                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = MONTH('$bulan') AND 
                                                        YEAR(Tanggal) = '$tahun' ORDER BY Tanggal ASC
                        ");
        foreach ($laporan as $rows) {
            $nama = $rows["Nama"];
            $tanggalambil = $rows["Tanggal"];
            
            $ambilbulan = date("F", strtotime($tanggalambil));
            $ambiltahun = date("Y", strtotime($tanggalambil));

            require 'konversi_bulan.php';
        }
        
                        
        if($laporan > 0){
            if (!empty($nama)) {
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();

                $sheet->mergeCells('A1:E1');
                $sheet->setCellValue('A1', 'Daftar Hadir Pegawai PT Gresik Migas (Perseroda)');

                $sheet->setCellValue('A2', 'Bulan');
                $sheet->mergeCells('B2:E2');
                $sheet->setCellValue('B2', $ambilbulan.' '.$ambiltahun);

                $sheet->setCellValue('A3', 'Nama');
                $sheet->mergeCells('B3:E3');
                $sheet->setCellValue('B3', $nama);

                $sheet->setCellValue('A4', 'Kode');
                $sheet->mergeCells('B4:E4');
                $sheet->setCellValue('B4', $kode);

                $sheet->mergeCells('A5:E5');

                $sheet->setCellValue('A6', 'No');
                $sheet->setCellValue('B6', 'Tanggal');
                $sheet->setCellValue('C6', 'Datang');
                $sheet->setCellValue('D6', 'Pulang');
                $sheet->setCellValue('E6', 'Keterangan');

                $sheet->getColumnDimension('A')->setAutoSize(true);
                $sheet->getColumnDimension('B')->setAutoSize(true);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setAutoSize(true);

                $sheet->getStyle('A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

                $count = 7;
                $no = 1;

                foreach($laporan as $row) {
                    $balik = $row["Tanggal"];
                    $tanggalbalik = date("d-m-Y",strtotime($balik));

                    require 'keterangan.php';

                    $sheet->setCellValue('A'.$count,$no);
                    $sheet->setCellValue('B'.$count,$tanggalbalik);
                    $sheet->setCellValue('C'.$count,$row['Datang']);
                    $sheet->setCellValue('D'.$count,$row['Pulang']);
                    $sheet->setCellValue('E'.$count,$statusjamdatang);
                    $count++;
                    $no++;
                }

                
                $writer = new Xlsx($spreadsheet);

                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename='.$nama.'_'.$ambilbulan.'.xlsx');
                $writer->save('php://output');
            }else{
                echo "
                    <script>
                        alert('Tidak ada data !');
                        document.location.href = 'rekapa.php';
                    </script>
                ";
                exit();
                
            }
        }
    } else if(isset($_POST["unduhpdf"])){
        $kode = $_POST["kode"];
        $bulan = $_POST["bulan"];
        $tahun = $_POST["tahun"];

        if ($bulan == "Pilih Bulan") {
            $bulan = $tanggal;
        }else{
            $bulan = $bulan;
        }
        
        if($tahun == "Pilih Tahun"){
            $tahun = $tanggal;
        }else{
            $tahun = $tahun;
        }

        $laporan = query("SELECT * FROM laporan WHERE 
                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = '$bulan' AND 
                                                        YEAR(Tanggal) = '$tahun' OR 
                                                        
                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = MONTH('$bulan') AND 
                                                        YEAR(Tanggal) = YEAR('$tahun') OR

                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = '$bulan' AND 
                                                        YEAR(Tanggal) = YEAR('$tahun') OR

                                                        Kode = '$kode' AND 
                                                        MONTH(Tanggal) = MONTH('$bulan') AND 
                                                        YEAR(Tanggal) = '$tahun' ORDER BY Tanggal ASC
                        ");
        foreach ($laporan as $row) {
            $nama = $row["Nama"];
            $tanggalambil = $row["Tanggal"];
            
            $ambilbulan = date("F", strtotime($tanggalambil));
            $ambiltahun = date("Y", strtotime($tanggalambil));

            require 'konversi_bulan.php';
        }

        $mpdf = new \Mpdf\Mpdf();
        if($laporan > 0){
            if (!empty($nama)) {
                $html .= '
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                        <link rel="icon" type="image/x-icon" href="assets/favicon.png">
                    </head>

                    <body>
                        <p>
                            Daftar Hadir Pegawai PT Gresik Migas (Perseroda)<br>
                            Bulan '.$ambilbulan.' '.$ambiltahun.'<br>
                            Nama : '.$nama.'<br>
                            Kode : '.$kode.'
                        </p>
                        <table style="text-align:center" border="1" cellpadding="3" cellspacing="0" width="100%">  
                            <tr>
                                <th style="height:35px; width:60px;">No</th>
                                <th style="height:35px;">Tanggal</th>
                                <th style="height:35px; ">Datang</th>
                                <th style="height:35px; ">Pulang</th>
                                <th style="height:35px; ">Keterangan</th>
                            </tr>';
                $i = 1;
                foreach ($laporan as $row) {
                    $balik = $row["Tanggal"];
                    $tanggalbalik = date("d-m-Y",strtotime($balik));

                    require 'keterangan.php';
                    
                    $html .= '
                            <tr> 
                                <td> '.$i.'</td>
                                <td> '.$tanggalbalik.'</td>
                                <td> '.$row['Datang'].'</td>    
                                <td> '.$row['Pulang'].'</td>
                                <td> '.$statusjamdatang.'</td>
                            </tr>';
                            $i++;
                }

                    $html .= '
                        </table>
                    </body>
                    </html>
                ';
            }else{
                echo "
                    <script>
                        alert('Tidak ada data !');
                        document.location.href = 'rekapa.php';
                    </script>
                ";
                exit();
            }
        }
        $mpdf->WriteHTML($html);
        $mpdf->Output($nama.'_'.$ambilbulan.'.pdf', \Mpdf\Output\Destination::INLINE);
    }
?>