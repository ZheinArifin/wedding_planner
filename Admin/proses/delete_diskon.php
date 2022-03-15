<?php 
include '../views/koneksi.php';
$sql = mysqli_query($con, "DELETE FROM diskon WHERE id='$_POST[id]'");
if($sql){
    echo "Data Diskon Berhasil Dihapus!";
}
?>