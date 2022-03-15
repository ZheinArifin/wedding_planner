<?php 
include "koneksi.php";
$pel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan WHERE id='$_SESSION[id_pel]'"));
$bg = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM penyewaan WHERE id_pelanggan='$_SESSION[id_pel]' AND (status='Lunas' OR status='Dibayar') "));
$bg1 = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM pembayaran WHERE id_pelanggan='$_SESSION[id_pel]' AND status='Belum Bayar'"));
$bg2 = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM penyewaan WHERE id_pelanggan='$_SESSION[id_pel]' AND  status = 'Sedang Diproses' "));
$chat = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM chat WHERE id_pelanggan='$_SESSION[id_pel]' AND  status = 'Delivered' "));
$fitti = mysqli_query($con, "SELECT * FROM penyewaan WHERE id_pelanggan='$_SESSION[id_pel]' AND (status = 'Lunas' OR status = 'Dibayar') ");
$fit = 0;
while ($row = mysqli_fetch_array($fitti)) {
    $date = date('Y-m-d');
    $tgl =  mysqli_fetch_array(mysqli_query($con, "SELECT * from penyewaan WHERE tgl_sewa >= '$date' AND id_pelanggan='$_SESSION[id_pel]'"));
    $fitting = date('d F Y', strtotime("-2 week", strtotime($row['tgl_sewa'])));
   
    if(!empty($tgl)){
        if($fitting < $date){
            $fit = 1;
        }else{
            $fit = 1;
        }
    }
}
if ($_SESSION['id_pel'] == "") {
    ?>
    <script>
      location="index";
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Susie Wedding Planner</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Events Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet">     <!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- //web-fonts -->
<style type="text/css">
    .dropdown-menu{
        top: 60px;
        right: 0px;
        left: unset;
        width: 460px;
        box-shadow: 0px 5px 7px -1px #c1c1c1;
        padding-bottom: 0px;
        padding: 0px;
    }
    .dropdown-menu:before{
        content: "";
        position: absolute;
        top: -20px;
        right: 12px;
        border:10px solid #343A40;
        border-color: transparent transparent #343A40 transparent;
    }
    .head{
        padding:5px 15px;
        border-radius: 3px 3px 0px 0px;
    }
    .footer{
        padding:5px 15px;
        border-radius: 0px 0px 3px 3px;
    }
    .notification-box{
        padding: 10px 0px;
    }
    .bg-gray{
        background-color: #eee;
    }
    @media (max-width: 640px) {
        .dropdown-menu{
        top: 50px;
        left: -16px;
        width: 290px;
        }
        .nav{
            display: block;
        }
        .nav .nav-item,.nav .nav-item a{
            padding-left: 0px;
        }
        .message{
            font-size: 13px;
        }
    }
    
    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }
    
    .clearfix {
        display: inline-block;
    }
    
    * html .clearfix {
        height: 1%;
    }
    
    .clearfix {
        display: block;
    }
    
    .bubble-list .bubble {
        margin-bottom: 20px;
    }
    
    .bubble-list .bubble img {
        float: left;
        width: 80px;
        border: 3px solid #fff;
        border-radius: 10px;
    }
    
    .bubble-list .bubble .bubble-content {
        position: relative;
        float: left;
        margin-left: 20px;
        width: 400px;
        padding: 0px 20px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 1px 1px 5px rgba(0,0,0,.2);
    }
    
    .bubble-list .bubble .bubble-content .point {
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-right: 12px solid #fff;
        position: absolute;
        left: -12px;
        top: 12px;
    }

    .chats {
    overflow-y: scroll; /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .chats::-webkit-scrollbar {
        display: none;
    }
</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
    <!-- banner -->
    <div class="w3ls-banner-1/" style="min-height: 80px"> 
        <!-- header -->
        <div class="header-w3layouts"> 
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Susie</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="navbar-brand" href="index">Susie</a></h1>
                    </div> 
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden"><a class="page-scroll" href="#page-top"></a> </li>
                            <li><a class="hvr-sweep-to-right" href="index">Home</a></li>
                            <li><a class="hvr-sweep-to-right" href="about">About</a></li>
                            <li><a class="hvr-sweep-to-right" href="events">Events</a></li>
                            <li><a class="hvr-sweep-to-right" href="gallery">Gallery</a></li>
                            <li><a class="hvr-sweep-to-right" href="contact">Contact</a></li>
                            <li>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#Chat" data-section="chat"><i class="fa fa-comment"></i><?php
                                    if ($chat['x'] > 0) {
                                    ?>
                                    <span class="badge badge-danger" style="margin-left: -8px; margin-top:-3px; padding: 1px; font-size:10px; background-color:red;  border-radius:20px 20px"><?=$chat['x'];?></span>
                                    <?php
                                    }
                                    ?>
                                    
                                </a>
                            </li>
                            <?php
                            if ($_SESSION['id_pel'] != "") {
                                $login = "<a href='Account'><i class='fas fa-user'></i></a>";
                            }else{
                                $login = "<a href='javascript:void(0)' data-toggle='modal' data-target='#login'><i class='fas fa-sign-in-alt'></i></a>";
                            }
                            ?>
                            <li><?= $login; ?></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>  
        </div>    
        <!-- //header -->
    </div>  
    <!-- pembayaran -->
    <div class="w3_wthree_agileits_icons main-grid-border">
        <section class="inner-page">
            <div class="container">
                <h4><a style="color: grey" href="index">Home / </a>Account</h4><br>
                <div class="row">
                <div class="col-lg-4 col-md-3">
    
                    <div class="card">
                    <div class="side-account">
                        <ul>
                        <li id="Penyewaan" class="x">
                            <a href="javascript:void(0)">Penyewaan 
                            <?php
                            if ($bg2['x'] != 0) {
                            ?>
                            <span class="badge badge-danger" style="padding: 3px; background-color:red;  border-radius:20px 20px"><?=$bg2['x'];?></span>
                            <?php
                            }
                            ?>
                            </a>
                        </li>
                        <li id="Fitting" class="x">
                            <a href="javascript:void(0)">Fitting Baju
                            <?php
                            if ($fit != 0) {
                            ?>
                            <span class="badge badge-danger" style="padding: 3px; background-color:red;  border-radius:20px 20px">!</span>
                            <?php
                            }
                            ?>
                            </a>
                        </li>
                        <li id="Pembayaran" class="x">
                            <a href="javascript:void(0)">Pembayaran 
                            <?php
                            if ($bg1['x'] != 0) {
                            ?>
                            <span class="badge badge-danger" style="padding: 3px; background-color:red;  border-radius:20px 20px"><?=$bg1['x'];?></span>
                            <?php
                            }
                            ?>
                            </a>
                        </li>
                        <li id="Riwayat" class="x">
                            <a href="javascript:void(0)">Riwayat Penyewaan 
                            <?php
                            if ($bg['x'] != 0) {
                            ?>
                            <span class="badge badge-danger" style="padding: 3px; background-color:red;  border-radius:20px 20px"><?=$bg['x'];?></span>
                            <?php
                            }
                            ?>
                            </a>
                        </li>
                        <li>
                            <a href="Logout">Logout</a>
                        </li>
                        </ul>
                    </div>
                    </div>
    
                </div>
                <div class="col-lg-8 col-md-9">
                    
                    <div class="card">
                    <!-- <div class="card-header" style="<?=$color;?>">
                        <center>
                        <h4 style="font-family: times new roman; color: white;"><?= $status; ?></h4>
                        <small style="font-family: times new roman; color: white;"><?= $ket_poin; ?></small>
                        </center>
                    </div> -->
                    <div class="card-body p-4">
                        <form method="post">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                            </div>
                            </div>
                            <div class="col-lg-9 col-12">
                            <div class="form-group">
                                <input name="nama" minlength="6" value="<?=$pel['nama'];?>" type="text" placeholder="" required class='form-control'; style="padding-left: 10px; border: 1px solid rgba(0,0,0,0.1)">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label>Username</label>
                            </div>  
                            </div>
                            <div class="col-lg-9 col-12">
                            <div class="form-group">
                                <input name="username" minlength="4" required type="text" placeholder="" value="<?=$pel['username'];?>" class='form-control'; style="padding-left: 10px; border: 1px solid rgba(0,0,0,0.1)">
                            </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label>Email</label>
                            </div>  
                            </div>
                            <div class="col-lg-9 col-12">
                            <div class="form-group">
                                <input name="email" minlength="8" required type="email" placeholder="" value="<?=$pel['email'];?>" class='form-control'; style="padding-left: 10px; border: 1px solid rgba(0,0,0,0.1)">
                            </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label>Telepon</label>
                            </div>  
                            </div>
                            <div class="col-lg-9 col-12">
                            <div class="form-group">
                                <input name="tlp" type="text" required placeholder="" value="<?=$pel['telp'];?>" class='form-control'; minlength="10" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)" style="padding-left: 10px; border: 1px solid rgba(0,0,0,0.1)">
                            </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                </div>  
                            </div>
                            <div class="col-lg-9 col-12">
                                <textarea name="alamat" class="form-control"  cols="30" rows="10"><?=$pel['alamat']?></textarea>
                            </div>
                        </div><br>
    
                        <div class="row">
                            <div class="col-lg-3 col-12">
                            <div class="form-group">
                            </div>  
                            </div>
                            <div class="col-lg-3 col-12">
                                <button name="update" type="submit" value="Update" class="form-control  btn-warning" >Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
    
                </div>
                </div>
            </div>
            <div class="container" id="tab_produk">
    
                <div id="dt-penyewaan" style="display:none; ">
                <h3>Penyewaan</h3>
                <table class='table table-striped' >
                    <thead>
                    <tr>
                        <th style="color:black">No</th>
                        <th style="color:black">Produk</th>
                        <th style="color:black">Deskripsi</th>
                        <th style="color:black">Tanggal Sewa</th>
                        <th style="color:black">Harga</th>
                        <th style="color:black">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql = mysqli_query($con, "SELECT * FROM penyewaan WHERE id_pelanggan='$_SESSION[id_pel]' AND status = 'Sedang Diproses'");
                    $no =1;
                    while ($row = mysqli_fetch_array($sql)) {
                        $sql_1 = "SELECT * FROM katalog_produk WHERE id='$row[id_katalog]'";
                        $query_1 = $con -> query($sql_1);
                        $produk = $query_1 -> fetch_array(MYSQLI_ASSOC);

                        $sql_2 = "SELECT * FROM pembayaran WHERE id_penyewaan='$row[id]'";
                        $query_2 = $con -> query($sql_2);
                        $pay = $query_2 -> fetch_array(MYSQLI_ASSOC);
                    ?>
    
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['katalog_produk'] ?></td>
                        <td><?= $produk['deskripsi'] ?></td>
                        <td><?= date('d F Y', strtotime($row['tgl_sewa'])) ?></td>
                        <td>Rp. <?= number_format($produk['harga'],0,'.','.') ?></td>
                        <?php
                        if ($row["status"] == "Belum Bayar") {
                            $action = "<a href='pembayaran?id=".$pay['id']." class='btn btn-danger text-white'><i class='fa fa-fw fa-dollar'></i> Pay</a>";
                        }else {
                            $action = "<a href='javascript:void(0)' class='btn btn-warning text-white'><i class='fa fa-fw fa-circle-notch fa-spin'></i> Sedang Diproses</a>";
                        }
                        ?>
                        <td><?= $action ?></td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
                </div>
    
                <div id="dt-pembayaran" style="display:none;">
                <h3>Pembayaran</h3>
                <table class='table table-striped'>
                    <thead>
                    <tr>
                    <th style="color:black">No</th>
                        <th style="color:black">Produk</th>
                        <th style="color:black">Deskripsi</th>
                        <th style="color:black">Tanggal Sewa</th>
                        <th style="color:black">Diskon</th>
                        <th style="color:black">Harga</th>
                        <th style="color:black">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM pembayaran WHERE id_pelanggan='$_SESSION[id_pel]' ");
                    $no =1;
                    while ($row = mysqli_fetch_array($sql)) {
                        $sql_3 = "SELECT * FROM penyewaan WHERE id='$row[id_penyewaan]'";
                        $query_3 = mysqli_query($con, $sql_3);
                        $pemesanan = mysqli_fetch_array($query_3);

                        $sql_1 = "SELECT * FROM katalog_produk WHERE id='$pemesanan[id_katalog]'";
                        $query_1 = mysqli_query($con, $sql_1);
                        $produk = mysqli_fetch_array($query_1);

                        $sql_4 = "SELECT * FROM diskon WHERE id_katalog='$pemesanan[id_katalog]'";
                        $query_4 = $con -> query($sql_4);
                        $dskn = $query_4 -> fetch_array(MYSQLI_ASSOC);
                        $ttl = $produk['harga'] - ($dskn['diskon'] ?? 0 * $produk['harga']);
                        if(empty($dskn['diskon'])){
                            $diskon = 0;
                        }else{
                            $diskon = $dskn['diskon'];
                        }
                        if($row['bukti'] == "" || $row['bukti_lunas'] == "")
                        
                        ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['katalog_produk'] ?></td>
                        <td><?= $produk['deskripsi'] ?></td>
                        <td><?= date('d F Y', strtotime($pemesanan['tgl_sewa'])) ?></td>
                        <td><?= $diskon;?>%
                        <td>Rp. <?= number_format($produk['harga'],0,'.','.') ?></td>
                        <td>
                            <a href='Pembayaran?id=<?=$row['id'] ?>' class='btn btn-primary text-white' ><i class='far fa-credit-card'></i> Bayar</a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
    
                <div id="dt-riwayat" style="display:none;">
                <h3>Riwayat Penyewaan</h3>
                <table class='table table-striped'>
                    <thead>
                    <tr>
                        <th style="color:black">No</th>
                        <th style="color:black">Produk</th>
                        <th style="color:black">Deskripsi</th>
                        <th style="color:black">Diskon</th>
                        <th style="color:black">Tanggal Sewa</th>
                        <th style="color:black">Harga</th>
                        <th style="color:black">Total</th>
                        <th style="color:black">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // $sql = mysqli_query($con, "SELECT * FROM pembayaran WHERE id_pelanggan='$_SESSION[id_pel]' AND (status = 'Lunas' OR status = 'Dibayar') AND bukti_lunas != ''");
                    $sql = mysqli_query($con, "SELECT * FROM pembayaran WHERE id_pelanggan='$_SESSION[id_pel]' ");
                    $no =1;
                    while ($row = mysqli_fetch_array($sql)) {
                        $sql_3 = "SELECT * FROM penyewaan WHERE id='$row[id_penyewaan]'";
                        $query_3 = $con -> query($sql_3);
                        $pemesanan = $query_3 -> fetch_array(MYSQLI_ASSOC);
    
                        $sql_1 = "SELECT * FROM katalog_produk WHERE id='$pemesanan[id_katalog]'";
                        $query_1 = $con -> query($sql_1);
                        $produk = $query_1 -> fetch_array(MYSQLI_ASSOC);

                        $sql_2 = "SELECT * FROM feedback WHERE id_penyewaan='$row[id_penyewaan]'";
                        $query_2 = $con -> query($sql_1);
                        $feed = $query_1 -> fetch_array(MYSQLI_ASSOC);

                        $sql_4 = "SELECT * FROM diskon WHERE id_katalog='$pemesanan[id_katalog]'";
                        $query_4 = $con -> query($sql_4);
                        $dskn = $query_4 -> fetch_array(MYSQLI_ASSOC);

                        $ttl = $produk['harga'] - ($dskn['diskon'] ?? 0 * $produk['harga']);
                        if(empty($dskn['diskon'])){
                            $diskon = 0;
                        }else{
                            $diskon = $dskn['diskon'];
                        }
                        ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['katalog_produk'] ?></td>
                        <td><?= $produk['deskripsi'] ?></td>
                        <td><?= $diskon ?>%</td>
                        <td><?= date('d F Y', strtotime($pemesanan['tgl_sewa'])) ?></td>
                        <td>Rp. <?= number_format($produk['harga'],0,'.','.') ?></td>
                        <td>Rp. <?= number_format($ttl,0,'.','.') ?></td>
                        <?php
                        if(!empty($feed['rate'])){
                        ?>
                            <td>
                                <button class='btn btn-danger ' ><i class='fas fa-check'></i> Selesai</button>
                            </td>
                        <?php
                        }else{
                        ?>
                            <td>
                                <button onclick="feed('<?=$row['id_penyewaan']?>')" class='btn btn-warning ' data-toggle="modal" data-target="#form"><i class='fas fa-comments'></i> Beri Ulasan</button>
                            </td>
                        <?php
                        }
                        ?>
                        
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </table>
                </div>

                <div id="dt-fitting" style="display:none; ">
                <h3>Fitting Baju</h3>
                <table class='table table-striped' >
                    <thead>
                    <tr>
                        <th style="color:black">No</th>
                        <th style="color:black">Produk</th>
                        <th style="color:black">Deskripsi</th>
                        <th style="color:black">Tanggal Fitting</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql = mysqli_query($con, "SELECT * FROM penyewaan WHERE id_pelanggan='$_SESSION[id_pel]' AND (status = 'Lunas' OR status = 'Dibayar') ");
                    $no =1;
                    while ($row = mysqli_fetch_array($sql)) {
                        $date = date('Y-m-d');
                        $tgl =  mysqli_fetch_array(mysqli_query($con, "SELECT * from penyewaan WHERE tgl_sewa >= '$date' AND id_pelanggan='$_SESSION[id_pel]'"));

                        $sql_1 = "SELECT * FROM katalog_produk WHERE id='$row[id_katalog]'";
                        $query_1 = $con -> query($sql_1);
                        $produk = $query_1 -> fetch_array(MYSQLI_ASSOC);

                        $sql_2 = "SELECT * FROM pembayaran WHERE id_penyewaan='$row[id]'";
                        $query_2 = $con -> query($sql_2);
                        $pay = $query_2 -> fetch_array(MYSQLI_ASSOC);

                        $fitting = date('d F Y', strtotime("-2 week", strtotime($row['tgl_sewa'])));
                        if(!empty($tgl)){
                    ?>
    
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk['katalog_produk'] ?></td>
                        <td><?= $produk['deskripsi'] ?></td>
                        <?php 
                        if($fitting < $date){
                        ?>
                        <td><span class="text-success"><i class="fas fa-fw fa-circle" style="font-size:10px"></i> <?= $fitting ?></span></td>
                        <?php 
                        }else{
                        ?>
                        <td><span style="color:red"><i class="fas fa-fw fa-circle" style="font-size:10px"></i> <?= $fitting ?></span></td>
                        <?php 
                        }
                        ?>
                        </tr>
                        <?php
                        }
                        }
                    ?>
                    </tbody>
                </table>
                </div>
    
            </div>
        </section>
    </div>
    <!-- //icons -->
                            

<!-- footer -->
<div class="copy-right">
    <div class="container">
        <div class="col-md-6 col-sm-6 col-xs-6 copy-right-grids">
            <div class="copy-left">
                <p>&copy; 2021 SUSIE. All rights reserved </p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 top-middle">
            <ul>
                <li><a href="https://www.instagram.com/susie_make_up_/?hl=id"><i class="fab fa-instagram fa-2x" style="color:pink"></i></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
            
<!-- //footer -->
<!-- bootstrap-modal-pop-up -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Events
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div>
                    <div class="modal-body">
                        <img src="images/g8.jpg" alt=" " class="img-responsive" />
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem 
                            vel eum iure reprehenderit qui in ea voluptate velit 
                            esse quam nihil molestiae consequatur, vel illum qui 
                            dolorem eum fugiat quo voluptas nulla pariatur.
                            <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
                                esse quam nihil molestiae consequatur.</i></p>
                    </div>
            </div>
        </div>
    </div>
<!-- //bootstrap-modal-pop-up --> 

<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    
<!-- skills -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/sweetalert2.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
    <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->
</body>
</html>

<!-- Rating -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-right cross"> <a href="javascript:void(0)" data-dismiss="modal" style="color:red"> <i class="fa fa-times mr-2"></i></a> </div>
            <div class="card-body text-center"> <img src=" https://i.imgur.com/d2dKtI7.png" height="100" width="100">
                <div class="comment-box text-center">
                    <h4>Add a comment</h4>
                    <form method="post">
                        <input type="hidden" id="id_penyewaan" name='id_sewa' value="">
                    <div class="rating"> 
                        <input type="radio" name="rating" value="5" id="5">
                        <label for="5">☆</label> 
                        <input type="radio" name="rating" value="4" id="4">
                        <label for="4">☆</label> 
                        <input type="radio" name="rating" value="3" id="3">
                        <label for="3">☆</label> 
                        <input type="radio" name="rating" value="2" id="2">
                        <label for="2">☆</label> 
                        <input type="radio" name="rating" required value="1" id="1">
                        <label for="1">☆</label> 
                    </div>
                    <div class="comment-area"> 
                        <textarea required class="form-control" name="ulasan" placeholder="what is your view?" rows="4"></textarea> 
                    </div><br>
                    <div class="text-center mt-4"> 
                        <button type="submit" name="send" class="btn btn-success send">Krim</button> 
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chat -->
<div class="modal fade chats" id="Chat" style="margin-bottom: 20px; margin-top: 70px; height:530px;">
    <div class="modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content col-lg-12 col-md-12">
      
        <!-- Modal Header -->
        <div class="modal-header" style="border-bottom:2px solid black">
          <label class="modal-title " style="font-family: times new roman; font-weight:bold; color:black">Chating</label>
          <button type="button" class="close" data-dismiss="modal" style="font-weight:bold; color:black; font-size:40px">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 chats" style="height:330px; overflow-y: scroll; ">
                    <div class="bubble-list"  id="chatx" >
                        <?php
                        $xy = mysqli_query($con,"SELECT * FROM chat WHERE id_pelanggan='$_SESSION[id_pel]'");
                        while ($row = mysqli_fetch_array($xy)) {
                            if ($row['pesan_masuk'] !="") {
                            mysqli_query($con,"UPDATE chat set status ='Read' WHERE id_pelanggan='$_SESSION[id_pel]'");
                            ?>
                            <div class="row">
                                <div class="bubble clearfix" style="float: left;">
                                    <!-- <img src="img/instagram/user (1).png" style="width: auto; height: 40px; " alt="Person"> -->
                                    <div class="bubble-content col-md-12" style=" background-color: rgb(38,45,49);">
                                        <div class="point"></div>
                                        <p style="color: white; padding:2px; padding-right:20px"><?=$row['pesan_masuk'];?></p>
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
                                        <p style="color: white; padding:2px; padding-right:20px"><?=$row['pesan_keluar'];?></p>
                                        <small style="color: white; float: right;"><?=date('h:i', strtotime($row['time']));?></small>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br>
            <form method="post" id="frmChat">
                <div class="row">
                    <div class="col-md-10 ">
                        <input type="text" style="height: 40px" name="chat" id="chat" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" style="height: 40px; border-radius: 50px; font-size:10px" name="send"  value="Send" class="form-control btn btn-success">
                    </div>
                </div>
            </form>
        
      </div>
    </div>
</div>
<!--End Chat  -->

<!-- chat -->
<script type="text/javascript">
    
    $('#Chat').on('shown.bs.modal', function(event) {
        var elmnt = document.getElementById("chatx");
        elmnt.scrollIntoView(false)
    });
    function x(x){
        document.getElementById("id").value= x;
    }
    
    $(document).ready(function(){
     $('#frmChat').submit(function(e){
      e.preventDefault();
       $.ajax({
            url: 'Proses/simpan-data',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) { 
            document.getElementById('chat').value="";
            $('#chatx').html(data);              
            },error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.responseText);
            }
        });
     });
    });
    
    function feed(z){
        document.getElementById('id_penyewaan').value=z;
    }
        
</script>
<!-- end Chat -->


<?php
if (isset($_POST['update'])) {
  $alamat = $_POST['rt'].",".$_POST['rw'];
  $alamat = $_POST['rt'].",".$_POST['rw'].",".$_POST['desa'].",".$_POST['kec'].",".$_POST['kab'].",".$_POST['prov'].",".$_POST['pos'];
  $sql = "UPDATE pelanggan SET nama='$_POST[nama]', username='$_POST[username]', email='$_POST[email]',  alamat='$_POST[alamat]', telp='$_POST[tlp]' WHERE id ='$_SESSION[id_pel]'";
  $query = mysqli_query($con, $sql);
  if ($query) {
    ?>
    <script type="text/javascript">
      setTimeout(function(){
        swal({
               icon: 'success',
               title: 'Success!',
               text: 'Data Pribadi Berhasil Diperbaharui!',
               closeOnClickOutside: false,
               timer: 2000
              }).then(function(){
                location="Account";
              });
      }, 2000);
    </script>
    <?php
  }else{
    ?>
    <script type="text/javascript">
      alert("<?php echo mysqli_error($con) ?>")
    </script>
    <?php
  }
}

if (isset($_POST['send'])) {
    $id = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as x FROM feedback"));
    $kd = $id['x'] + 1;
    $sql = "INSERT INTO feedback VALUES('$kd','$_POST[id_sewa]','$_SESSION[id_pel]','$_POST[ulasan]','$_POST[rating]')";
    $query = mysqli_query($con, $sql);
    if ($query) {
      ?>
      <script type="text/javascript">
          swal({
                 icon: 'success',
                 title: 'Berhasil Mengulas!',
                 text: 'Ulasan Berhasil Dikirim!',
                 closeOnClickOutside: false,
                 timer: 3000
                }).then(function(){
                  location="Account";
                });
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        alert("<?php echo mysqli_error($con) ?>")
      </script>
      <?php
    }
  }
?>

<script>
  $('.x').each(function(){
    $(this).click(function(){ 
      $('html,body').animate({ scrollTop: $('#tab_produk').offset().top }, 1500);
      return false; 
    });
  });

  $(document).ready(function(){
    $('#Penyewaan').click(function(){
      document.getElementById('dt-penyewaan').style.display="block";
      document.getElementById('dt-pembayaran').style.display="none";
      document.getElementById('dt-riwayat').style.display="none";
      document.getElementById('dt-fitting').style.display="none";
    });

    $('#Pembayaran').click(function(){
      document.getElementById('dt-pembayaran').style.display="block";
      document.getElementById('dt-penyewaan').style.display="none";
      document.getElementById('dt-riwayat').style.display="none";
      document.getElementById('dt-fitting').style.display="none";
    });

    $('#Riwayat').click(function(){
      document.getElementById('dt-pembayaran').style.display="none";
      document.getElementById('dt-penyewaan').style.display="none";
      document.getElementById('dt-riwayat').style.display="block";
      document.getElementById('dt-fitting').style.display="none";
    });

    $('#Fitting').click(function(){
      document.getElementById('dt-pembayaran').style.display="none";
      document.getElementById('dt-penyewaan').style.display="none";
      document.getElementById('dt-riwayat').style.display="none";
      document.getElementById('dt-fitting').style.display="block";
    });
  });
</script>