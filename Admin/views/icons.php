<?php 
include "koneksi.php";
if($_SESSION['id_admin']){
  unset($_SESSION['id_admin']);
  unset($_SESSION['nm_admin']);
}else{
  unset($_SESSION['id_pemilik']);
  unset($_SESSION['nm_pemilik']);
}

header("Location:../index.php")
?>