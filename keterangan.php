<?php
    $balik = $row["Tanggal"];
    $tanggal = date("d-m-Y",strtotime($balik));

    $jamdatang = $row["Datang"]; 
    $statusjamdatang = $row["Datang"]; 
    $jampulang = $row["Pulang"]; 
    $jammasuk = "08:00:00";
    $statusjammasuk = "08:00:00";
    $jamkeluar = "16:00:00";

    // cek ada yang izin atau tidak
    if ($jamdatang == "00:00:00" && $jampulang == "00:00:00") {
        $jamdatang = "<img src='assets/emoji-frown-fill.svg '>";
        $statusjamdatang = $row["Izin"];
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