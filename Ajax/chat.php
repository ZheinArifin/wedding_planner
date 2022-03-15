<?php 
include "../koneksi.php";
$xy = mysqli_query($con,"SELECT * FROM chat WHERE id_pelanggan='$_POST[id]'");
while ($row = mysqli_fetch_array($xy)) {
    mysqli_query($con,"UPDATE chat set status ='Read' WHERE id_pelanggan='$_POST[id]'");
    if ($row['pesan_keluar'] !="") {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="bubble clearfix" style="float: left;">
                <!-- <img src="img/instagram/user (1).png" style="width: auto; height: 40px; " alt="Person"> -->
                <div class="bubble-content col-md-12" style=" background-color: rgb(38,45,49);">
                    <div class="point"></div>
                    <label style="color: white; padding:2px; padding-right:20px"><?=$row['pesan_keluar'];?></label>
                    <small style="color: white; float: right;"><?=date('h:i', strtotime($row['time']));?></small>
                </div>
                
            </div>
        </div>
    </div>
    <?php
    }elseif ($row['pesan_masuk'] !="") {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="bubble clearfix" style="float: right;">            
                <div class="bubble-content col-md-12" style=" background-color: rgb(5,71,64);">
                    <div class="point"></div>
                    <label style="color: white; padding:2px; padding-right:20px"><?=$row['pesan_masuk'];?></label>
                    <small style="color: white; float: right;"><?=date('h:i', strtotime($row['time']));?></small>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}
?>