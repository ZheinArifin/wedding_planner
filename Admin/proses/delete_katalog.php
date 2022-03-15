<?php 
include '../views/koneksi.php';
$sql = mysqli_query($con, "DELETE FROM katalog_produk WHERE id='$_POST[id]'");
if($sql){
    echo "Data Katalog Berhasil Dihapus!";
}
?>