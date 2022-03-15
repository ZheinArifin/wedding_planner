<?php 
include "../koneksi.php";
$dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penyewaan WHERE tgl_sewa = '$_POST[tgl]' "));
if(empty($dt['tgl_sewa'])){
    echo "Kosong";
}else{
    echo "Penuh";
}

?>