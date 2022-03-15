<?php 
include '../views/koneksi.php';
$sql = mysqli_query($con, "DELETE FROM admin WHERE id='$_POST[id]'");
if($sql){
    echo "Data Admin Berhasil Dihapus!";
}
?>