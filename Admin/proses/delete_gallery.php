<?php 
include '../views/koneksi.php';
$sql = mysqli_query($con, "DELETE FROM gallery WHERE id='$_POST[id]'");
if($sql){
    echo "Data Gallery Berhasil Dihapus!";
}
?>