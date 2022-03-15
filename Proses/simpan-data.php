<?php
//koneksi database
include '../koneksi.php';
$chat=$_POST['chat'];

if (!empty($_SESSION['id_pel'])) {
    
	$cari_kd=mysqli_query($con, "select max(id)as kode from chat"); 
    $tm_cari=mysqli_fetch_array($cari_kd);
    $kode=substr($tm_cari['kode'],0,5);
    $kd =$kode+1;
    $time = date("Y-m-d h:i:sa");
 //simpan data kedalam database
$sql = mysqli_query($con, "INSERT INTO chat VALUES('$kd', '$_SESSION[id_pel]', '', '$chat', '$time','Delivered') ") or die(mysql_error());
if ($sql) {
    $xy = mysqli_query($con, "SELECT * FROM chat WHERE id_pelanggan='$_SESSION[id_pel]'");
    while ($row = mysqli_fetch_array($xy)) {
        if ($row['pesan_masuk'] !="") {
        ?>
		<div class="row">
            <div class="bubble clearfix" style="float: left;">
                <!-- <img src="img/instagram/user (1).png" style="width: auto; height: 40px; " alt="Person"> -->
                <div class="bubble-content col-md-12" style=" background-color: rgb(38,45,49);">
                    <div class="point"></div>
                    <p style="color: white; padding:2px"><?=$row['pesan_masuk'];?></p>
                    <small style="color: white; float: right;"><?=date('h:i', strtotime($row['time']));?></small>
                </div>
            </div>
        </div>
        <?php
        }elseif ($row['pesan_keluar'] !="") {
        ?>
		<div class="row">
            <div class="bubble clearfix" style="float: right;">            
                <div class="bubble-content col-md-12" style=" background-color: rgb(5,71,64);">
                    <div class="point"></div>
                    <p style="color: white; padding:2px"><?=$row['pesan_keluar'];?></p>
                    <small style="color: white; float: right;"><?=date('h:i', strtotime($row['time']));?></small>
                </div>
                <!-- <img style="padding-left: 20px; width: auto; height: 40px" src="img/instagram/user.png"  alt="Person"> -->
            </div>
        </div>
        <?php
            }
        }
 }else{
  echo "<div style='color:red'>Data gagal disimpan!</div>";
 }
 }else{
    ?>
    <script type="text/javascript">
        location="index"
    </script>
    <?php
 }
?>