<?php 
include "koneksi.php";
$dt = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM pembayaran WHERE id='$_GET[id]'"));
$sewa = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penyewaan WHERE id='$dt[id_penyewaan]'"));
$prd = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM katalog_produk WHERE id='$sewa[id_katalog]'"));
$disk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM diskon WHERE id_katalog='$sewa[id_katalog]'"));
if($disk['diskon']){
    $diskon = (($prd['harga'] * $disk['diskon'])/100);
}else{
    $diskon = 0;
}

$mulai = "mulai".$_GET['id'];
if (isset($_SESSION[$mulai])) { 
  //jika session sudah ada
  $telah_berlalu = time() - $_SESSION[$mulai];
} else { 
        //jika session belum ada
  $_SESSION[$mulai]  = time();
  $telah_berlalu      = 0;
}
//hitung mundur
//set session dulu dengan nama $_SESSION["mulai"]
    $temp_waktu = (60*1440) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
    $temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
    $temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik

    if ($temp_menit < 60) { 
      /* Apabila $temp_menit yang kurang dari 60 meni */
      $jam    = 0; 
      $menit  = $temp_menit; 
      $detik  = $temp_detik; 
    }else{ 
      /* Apabila $temp_menit lebih dari 60 menit */           
        $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
        $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
        $detik  = $temp_detik;
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
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- //web-fonts -->
<!-- DRAG AND DROP --> 
<link rel="stylesheet" href="css/drag.css">

<!-- CountDown -->
<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {
    /** Membuat Waktu Mulai Hitung Mundur Dengan 
        * var detik;
        * var menit;
        * var jam;
        */
    var detik   = <?= $detik; ?>;
    var menit   = <?= $menit; ?>;
    var jam     = <?= $jam; ?>;

    /**
    * Membuat function hitung() sebagai Penghitungan Waktu
    */
    function hitung() {
      /** setTimout(hitung, 1000) digunakan untuk 
      * mengulang atau merefresh halaman selama 1000 (1 detik) 
      */
      setTimeout(hitung,1000);
      /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
      if(menit < 10 && jam == 0){
        var peringatan = 'style="color:red"';
      }

      /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
      if(jam <= 0 && menit <= 0 && detik <= 0){
        var status = 'Kadaluarsa';
        $('#timer').html(
          '<h5 style="color:red">Kadaluarsa</h5>'
          );
      }else{
        $('#timer').html(
          jam+ ' Jam ' + menit + ' menit : ' + detik + ' detik'
          );
      }
      /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
      detik --;

      /** Jika var detik < 0
      * var detik akan dikembalikan ke 59
      * Menit akan Berkurang 1
      */
      if(detik < 0) {
        detik = 59;
        menit --;

        /** Jika menit < 0
        * Maka menit akan dikembali ke 59
        * Jam akan Berkurang 1
        */
        if(menit < 0) {
          menit = 59;
          jam --;

          /** Jika var jam < 0
          * clearInterval() Memberhentikan Interval dan submit secara otomatis
          */

          if(jam < 0) { 
            clearInterval(hitung); 
            /** Variable yang digunakan untuk submit secara otomatis di Form */
            var frmPaymen = document.getElementById("frmPaymen"); 

            frmPaymen.submit(); 
          } 
        } 
      } 
    }           
    /** Menjalankan Function Hitung Waktu Mundur */
    hitung();
  });
</script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
	<!-- banner -->
	<div class="w3ls-banner-1/" style="min-height: 100px"> 
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
                        <h1><a class="navbar-brand" href="index.php">Susie</a></h1>
                    </div> 
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
                            <li><a class="hvr-sweep-to-right" href="index.php">Home</a></li>
                            <li><a class="hvr-sweep-to-right" href="about.php">About</a></li>
                            <li><a class="hvr-sweep-to-right" href="events.php">Events</a></li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle hvr-sweep-to-right" data-hover="Pages" data-toggle="dropdown">Pages <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="hvr-sweep-to-right" href="icons.php">Icons</a></li>
                                        <li><a class="hvr-sweep-to-right" href="typography.php">Short Codes</a></li>
                                    </ul>
                              </li>
                            <li><a class="hvr-sweep-to-right" href="gallery.php">Gallery</a></li>
                            <li><a class="hvr-sweep-to-right" href="contact.php">Contact</a></li>
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
        <div class="container">
            <div class="row"> 
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="card" style="font-family: times new roman; box-shadow: 0 0 8px 4px rgba(0, 0, 0, 0.3); padding-top: 20px">
                        <div class="card-header bg-dark text-light">
                          <?php
                            if($dt['status'] == "Kadaluarsa"){
                                $button = "disabled";
                                ?>
                                <center>
                                  <h4 style="font-family: times new roman;">
                                    Sisa Waktu Pembayaran<br>
                                    <?=$dt['status'];?>
                                  </h4>
                                </center> 
                                <?php
                            }elseif($dt['status'] == "Dibayar" && $dt['bukti_lunas'] != ""){
                                $button = "disabled";
                                ?>
                                <center>
                                  <h4 style="font-family: times new roman;">
                                    Sisa Waktu Pembayaran<br>
                                    <?=$dt['status'];?>
                                  </h4>
                                </center> 
                                <?php
                            }else{
                                $button = "";
                                ?>
                                <center>
                                  <h4 style="font-family: times new roman; font-weight:bold">Sisa Waktu Pembayaran<br>
                                    <div id="timer"></div>
                                      <form method="post" id="frmPaymen" action="tes.php?id=<?=$_GET[id];?>"></form>
                                  </h4>
                                </center> 
                                <?php
                            }
                           
                          ?>
                        </div>
                        <div class="card-body"> 
                            <center style="padding: 20px 0px 20px 0px">
                                <p style="color: red; font-weight: 900; font-size: 30px">
                                <?php 
                                $diskon_ttl = $dt['harga_total'] - $diskon;
                                $dp = ($diskon_ttl*(10/100));
                                if($dt['bukti'] != "" && $dt['bukti_lunas'] == ""){
                                    ?>
                                    Rp. <?=number_format(( $diskon_ttl -$dp ),'0','.','.');?> 
                                    <?php
                                }else{
                                    ?>
                                    Rp. <?=number_format($dp,'0','.','.');?>
                                    <?php
                                }
                                ?>
                                </p>
                            </center>
                        <form method="post" enctype="multipart/form-data" action="bukti.php?id=<?=$_GET['id'];?>">
                            <center>
                                <div class="row">
                                    <div class="col-lg-12">
                                    <h4 style="padding-bottom: 5px; font-family:times new roman">
                                        Upload Bukti Pembayaran
                                    </h4>
                                    </div>
                                </div>
                                <?php
                                    if($dt['status'] == "Kadaluarsa"){
                                        $disable = "disabled";
                                    }elseif($dt['status'] == "Dibayar" && $dt['bukti_lunas'] != ""){
                                        $disable = "disabled";
                                    }else{
                                        $disable = "";

                                    }
                                ?>
                                    <div class="row">
                                    <div class="col-lg-12 mb-3" >
                                        <div class="drag-area " style="border-style: ridge; height: 100%; width:50%; margin-bottom:10px">
                                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                        <header>Drag & Drop File Or Click Here</header>
                                        </div>
                                    </div>
                                    <div class="input">
                                        <input type="file" style="display:none" <?=$disable;?> name="bukti" accept="image/*" required="" id="image_file">
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <center>
                                        <button class=" btn btn-success" <?=$button;?>  style="width: 150px; color: white" type="submit"  name="Upload">Upload</button>
                                        </center>
                                        </div>
                                    </div>
                        
                            </center>
                        </form>
                        <br>
                        <center>
                            <div class="row">
                                <div class="col-lg-12" style="margin-bottom:10px">
                                Pembayaran dapat dilakukan ke salah satu rekening Perusahaan berikut:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                <select class="form-control" style="width: 20%" id="BANK" onchange="bank()" name="Bank">
                                <option value="BCA">Bank BCA</option>
                                <option value="BRI">Bank BRI</option>
                                <option value="BNI">Bank BNI</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                <div class="card col-4" style="margin-top: 5px;  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3);">
                                    <div class="row" id="BCA" style="display: block">
                                    <div class="col-md-12 col-xs-12  border-right border-bottom">
                                        <div  style="text-align: center; padding: 20px">
                                        <img src="images/Logo1-bca.gif" ><br>
                                        Bank BCA, Kuningan<br>
                                        736 022 9754 <br>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row" id="BRI"  style="display: none">
                                    <div class="col-md-12 col-xs-12 border-left border-bottom">
                                        <div  style="text-align: center; padding: 20px">
                                        <img src="images/Logo1-bri.gif"><br>
                                        Bank BRI, Kuningan<br>
                                        0780 010 887 953
                                        </div>
                                    </div>
                                    </div>
            
                                    <div class="row" id="BNI"  style="display: none">
                                    <div class="col-md-12 col-xs-12 border-right border-bottom">
                                        <div  style="text-align: center; padding: 20px">
                                        <img src="images/Logo1-bni.gif"><br>
                                        Bank BNI, Kuningan<br>
                                        023 567 3075 <br>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
	</div>
	<!-- //icons -->
<!-- footer-top -->	
	<div class="footer-top">
		<div class="container">
			<div class="col-md-3 foot-left">
				<h3>About Us</h3>
			
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
			</div>
			<div class="col-md-3 foot-left">
					<h3>Get In Touch</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
				
						<div class="contact-btm">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							<p>90 Street, City, State 34789.</p>
						</div>
						<div class="contact-btm">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<p>+456 123 7890</p>
						<div class="contact-btm">
						</div>
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<p><a href="mailto:example@email.com">info@example.com</a></p>
						</div>
						<div class="clearfix"></div>

			</div>
			<div class="col-md-3 foot-left">
				<h3>Latest Events</h3>
				<ul>
					<li><a href="#" data-toggle="modal" data-target="#myModal"><img src="images/g1.jpg" alt="" class="img-responsive"></a></li>
					<li><a href="#" data-toggle="modal" data-target="#myModal"><img src="images/g2.jpg" alt="" class="img-responsive"></a></li>
					<li><a href="#" data-toggle="modal" data-target="#myModal"><img src="images/g3.jpg" alt="" class="img-responsive"></a></li>
					<li><a href="#" data-toggle="modal" data-target="#myModal"><img src="images/g4.jpg" alt="" class="img-responsive"></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-3 foot-left">
			<h3>Subscribe</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has </p>
			<form action="#" method="post">	
					<input type="email" Name="Enter Your Email" placeholder="Enter Your Email" required="">
				<input type="submit" value="Subscribe">
			</form>
			</div>
				<div class="clearfix"></div>
		</div>
	</div>
<!-- /footer-top -->							

<!-- footer -->
			<div class="copy-right">
				<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-6 copy-right-grids">
						<div class="copy-left">
						<p>&copy; 2017 Events. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
						</div>
					</div>
				<div class="col-md-6 col-sm-6 col-xs-6 top-middle">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
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
<!-- DRAG AND DROP -->
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/jquery.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/popper.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/mdb.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/bundles/4.19.2/compiled-addons.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/plugins/mdb-plugins-gathered.min.js"></script>
<script src="js/drag.js"></script>
	
<!-- skills -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
<script type="text/javascript">
  function bank(){
    var bank = document.getElementById("BANK").value;
    if (bank == "BCA") {
      document.getElementById('BCA').style.display = 'block';
      document.getElementById('BRI').style.display = 'none';
      document.getElementById('BNI').style.display = 'none';
    }else if(bank == "BRI"){
      document.getElementById('BRI').style.display = 'block';
      document.getElementById('BCA').style.display = 'none';
      document.getElementById('BNI').style.display = 'none';
    }else if(bank == "BNI"){
      document.getElementById('BRI').style.display = 'none';
      document.getElementById('BCA').style.display = 'none';
      document.getElementById('BNI').style.display = 'block';
    }
    
  };
</script>