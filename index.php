<?php 
include "koneksi.php";
$date = date('Y-m-d');
$event = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM penyewaan WHERE tgl_sewa >= '$date'"));
$service = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM pembayaran WHERE status = 'Lunas'"));
$happy = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM feedback "));
$chat = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM chat WHERE id_pelanggan='$_SESSION[id_pel]' AND  status = 'Delivered' "));
$pel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan WHERE id='$_SESSION[id_pel]'"));

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
<link href="css/style.css?v=1" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->

<!-- Login -->
<link href="css/md-pro.scss" rel="stylesheet">
<style>
/* login */
.modal-login {		
	color: #636363;
	width: 350px;
}
.modal-login .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
}
.modal-login .modal-header {
	border-bottom: none;   
	position: relative;
	justify-content: center;
}
.modal-login h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -15px;
}
.modal-login .form-control:focus {
	border-color: #70c5c0;
}
.modal-login .form-control, .modal-login .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-login .close {
	position: absolute;
	top: -5px;
	right: -5px;
}	
.modal-login .modal-footer {
	background: #ecf0f1;
	border-color: #dee4e7;
	text-align: center;
	justify-content: center;
	margin: 0 -20px -20px;
	border-radius: 5px;
	font-size: 13px;
}
.modal-login .modal-footer a {
	color: #999;
}		
.modal-login .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -70px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #60c7c1;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-login .avatar img {
	width: 100%;
}
.modal-login.modal-dialog {
	margin-top: 80px;
}
.modal-login .btn, .modal-login .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1 !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.modal-login .btn:hover, .modal-login .btn:focus {
	background: #45aba6 !important;
	outline: none;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
.badge {
  position: absolute;
  top: 5px;
  right: 5px;
  border-radius: 50%;
  background-color: red;
  color: white;
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
	<div id="home" class="w3ls-banner"> 

		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">

							<div class="container">
								<div class="agileits-banner-info">
									<h3>We Celebrate Wedding</h3>
									<!-- <div class="agileits_w3layouts_more menu__item"> -->
										<!-- <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a> -->
									<!-- </div> -->
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="agileits-banner-info">
									<h3>We Celebrate Wedding</h3>
									<!-- <h3>We Celebrate  <span>Newyear Parties</span></h3> -->
										<!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p> -->
									<!-- <div class="agileits_w3layouts_more menu__item">
										<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
									</div> -->
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
									<h3>We Celebrate Wedding</h3>
								</div>
								
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			
			<!--banner Slider starts Here-->
		</div>
		 
 
	</div>	
	<!-- //banner --> 
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
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="hvr-sweep-to-right" href="index">Home</a></li>
							<li><a class="hvr-sweep-to-right x" href="javascript:void(0)">Booking</a></li>
							<li><a class="hvr-sweep-to-right" href="events">Events</a></li>
							<li><a class="hvr-sweep-to-right" href="gallery">Gallery</a></li>
							<li><a class="hvr-sweep-to-right" href="contact">Contact</a></li>
							<li>
								<a href="javascript:void(0)" data-toggle="modal" data-target="#Chat" data-section="chat"><i class="fa fa-comment"></i>
									<?php
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
		<!-- ser_agile -->
		<div class="ser_agile">
			<div class="container">
			<h2 class="heading-agileinfo">Selamat Datang<span>SUSIE MAKE UP </span></h2>
			<div class="ser_w3l">  
			  <div class="outer-wrapper " style="width:100%">
				<div class="inner-wrapper">
				  <div class="content-wrapper">
					<p>Susie Makeup adalah perusahaan yang menawarkan jasa rias pengantin dengan hasil rias dan hijab 
					hairdo yang maksimal dan berkualitas. Susie Make Up berdiri sejak tahun 2016 dengan pemilik bernama Susie yang sudah memiliki 25 karyawan, baik sebagai asisten make up maupun sebagai kru dekorasi.</p>
				  </div>
				</div>
			  </div>
			  
			  <div class="clearfix"></div>
			  </div>
			</div>
		</div>
	<!-- //ser_agile -->
	<div class="diskon">
		<div class="container">
			<h3 class="heading-agileinfo">Diskon</h3>
			<div class="flex-slider">
				<ul id="flexiselDemo2">
					<?php 
					$sql2 = mysqli_query($con, "SELECT * FROM diskon");
					while($row2 = mysqli_fetch_array($sql2)){
						$produk1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM katalog_produk WHERE id='$row2[id_katalog]'"));
					?>
						<li>
							<div class="laptop" style="border-radius:10px">
								<div class="col-md-8 team-right">
									<div class="name-w3ls">
										<h5><?=$row2['nama_diskon'];?></h5>
										<span><?=$produk1['katalog_produk'];?><br> Diskon <?=$row2['diskon'];?>%</span>
									</div>
									<p><?=$row2['ket'];?></p>
									
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
					<?php
					}
					?>
				</ul>
				
			</div>

		</div>
	</div>	
	<!-- Stats -->
	<div class="stats-agileits">
		<div class="container">
			<h3 class="heading-agileinfo white-w3ls">Kami Memiliki Sesuatu Untuk Dibanggakan<span class="black-w3ls"></span></h3>
		</div>
		<div class="stats-info agileits w3layouts">
			<div class="container">
				<div class="col-md-4 col-sm-4agileits w3layouts stats-grid stats-grid-1">
					<i class="fa fa-users" aria-hidden="true"></i>
					<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='<?=$happy['x'];?>' data-delay='3' data-increment="2"><?=$happy['x'];?></div>
					<div class="stat-info-w3ls">
						<h4 class="agileits w3layouts">Happy Clients</h4>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 agileits w3layouts stats-grid stats-grid-2">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
					<div class="numscroller agileits-w3layouts" data-slno='11' data-min='0' data-max='<?=$event['x'];?>' data-delay='3' data-increment="2"><?=$event['x'];?></div>
					<div class="stat-info-w3ls">
						<h4 class="agileits w3layouts">Events</h4>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 stats-grid agileits w3layouts stats-grid-3">
					<i class="fa fa-cog" aria-hidden="true"></i>
					<div class="numscroller agileits-w3layouts" data-slno='13' data-min='0' data-max='<?=$service['x'];?>' data-delay='3' data-increment="2"><?=$service['x'];?></div>
					<div class="stat-info-w3ls">
						<h4 class="agileits w3layouts">Services</h4>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //Stats -->
	
	<!-- showcase_w3layouts -->	
	<div class="showcase_w3layouts">
		<div class="container">
		<h3 class="heading-agileinfo">Paket</h3>
			<div class="our_agile-info">
				<div class="row">
				<?php
				$sql = mysqli_query($con, "SELECT * FROM katalog_produk");
				$no = 1;
				while($row = mysqli_fetch_array($sql)){
					if($no % 2 != 0){
				?>
					<div class="col-md-6 col-lg-6 col-sm-12 showcase">
						<div class="thumbnail thumbnail--awesome1">
							<div class="thumbnail__overlay">
								
							</div>
						</div>
						<div class="desc">
						
							<h4><?=$row['katalog_produk'];?></h4>
							<h4 style="font-size:18px; margin-bottom:8px"><?=number_format($row['harga'],0,'.','.');?></h4>
							<div style="text-align:left">
								<?=$row['deskripsi'];?>
							</div>
						</div>
					</div>
				<?php
					}else{
				?>
					<div class="col-md-6 col-lg-6 col-sm-12 showcase showcase--inverted">
						<div class="desc">
							
							<h4><?=$row['katalog_produk'];?></h4>
							<h4 style="font-size:18px; margin-bottom:8px" ><?=number_format($row['harga'],0,'.','.');?></h4>
							<div style="text-align:left">
								<?=$row['deskripsi'];?>
							</div>
						</div>
						<div class="thumbnail thumbnail--awesome2">
							<div class="thumbnail__overlay">
								
							</div>
						</div>
					</div>
				<?php
					}
					$no++;
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<!-- //showcase_w3layouts -->	
	<section class="about_agile " id="penyewaan">
		<div class="container">	
					<h3 class="heading-agileinfo white-w3ls">Event Booking<span class="black-w3ls">Events is a professionally managed Event</span></h3>
			<div class="about-grids">
				
				<div class="abt-rt-grid">
					<div class="w3ls-grid-head text-center ">
						<h3>online event booking </h3>
					</div>
					<div class="abt-form text-center">
						<form method="post">
							<div class="col-sm-4 col-xs-4 w3ls-lt-form">
								<div class="w3ls-pr">
									<input type="text" name="Name" placeholder="Name" readonly value="<?= $_SESSION['nama']; ?>">
	
									
								</div>
							</div>
							<div class="col-sm-4 col-xs-4 w3ls-lt-form">
								<div class="w3ls-pr">
									<select class="sel" required="" name="katalog">
										<option value="">Paket</option>
										<?php
										$sql1 = mysqli_query($con, "SELECT * FROM katalog_produk");
										while($rows = mysqli_fetch_array($sql1)){
											echo "<option value='$rows[id]'>$rows[katalog_produk]</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4 col-xs-4 w3ls-lt-form">
								<div class="w3ls-pr">
									<input type="date" name="date" required="required" min="<?php echo date('Y-m-d', strtotime('+1 Month')); ?>" onchange="cek_date(this.value)">
								</div>
							</div>
							<div class="col-sm-12 col-xs-12 w3ls-lt-form">
								<div class="w3ls-pr">
									<textarea name="alamat" readonly id=""  rows="5" placeholder="Alamat Lengkap" class="col-sm-12"><?=$pel['alamat'];?></textarea>
									<small>*Total Pembayaran untuk booking sebesar 10% dari total harga, pembayaran tersebut dianggap sebagai DP </small>
								</div>
							</div>
							<div class="clearfix"></div>
							<input type="submit" value="Book Now" name="sewa" <?php if($_SESSION['id_pel'] == ""){ echo "disabled "; } ?>  class="btn btn-rounded">

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--testimonials-->
	<div class="testimonials">
		<div class="container">
			<h3 class="heading-agileinfo">Feedback Customer</h3>
			<div class="flex-slider">
				<ul id="flexiselDemo1">
					<?php 
					$sql1 = mysqli_query($con, "SELECT * FROM feedback");
					while($row1 = mysqli_fetch_array($sql1)){
						$sewa = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penyewaan WHERE id='$row1[id_penyewaan]'"));
						$produk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM katalog_produk WHERE id='$sewa[id_katalog]'"));
						$pel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan WHERE id='$row1[id_pelanggan]'"));
					?>
						<li>
							<div class="laptop" style="border-radius:10px">
								<div class="col-md-8 team-right">
									<p><?=$row1['ulasan'];?></p>
									<div class="name-w3ls">
										<h5><?=$pel['nama'];?></h5>
										<span><?=$produk['katalog_produk'];?></span>
									</div>
								</div>
								<div class="col-md-4 team-left">
									<img class="img-responsive" src="images/user.png" alt=" " />
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
					<?php
					}
					?>
				</ul>
				
			</div>

		</div>
	</div>
	<!--//testimonials-->

							

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

<!-- Modal Pendaftaran -->
<!--Modal: Login / Register Form-->
<div id="login" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="images/avatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Member Login</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form  method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn" name="Login">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				Don't Have An Account?<a href="#" class="text-primary" data-dismiss="modal" data-target="#register" data-toggle="modal"> Register</a>
			</div>
		</div>
	</div>
</div>   

<div id="register" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="images/avatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Register</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="nama" placeholder="Name" required="required" minlength="4">		
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required" minlength="6">		
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required" minlength="6" maxlength="12">	
					</div>    
					<div class="form-group">
						<textarea name="alamat" required placeholder="Your Address" class="form-control"></textarea>	
					</div>    
					<div class="form-group">
						<input type="text" class="form-control" name="telp" placeholder="Phone Number" required="required" onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="13">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn" name="Register">Register</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				Have An Account?<a href="#" data-dismiss="modal" data-target="#login" data-toggle="modal"> Login</a>
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
<!--Modal: Login / Register Form-->
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<script src="js/sweetalert2.js"></script>
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>	
<!-- skills -->
<script src="js/responsiveslides.min.js"></script>
<!-- chat -->
<script type="text/javascript">
    $('.x').each(function(){
		$(this).click(function(){ 
		$('html,body').animate({ scrollTop: $('#penyewaan').offset().top }, 1500);
		return false; 
		});
  	});
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
			url: 'Proses/simpan-data.php',
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
	
	function read(z){
		$.ajax({
			url: 'notif.php',
			type: 'post',
			data: {id:z},             
			success: function(data) { 
			$('#chats').html(data);              
			}
		});
	}
        
</script>
<!-- end Chat -->
	<script>
		// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
	</script>
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>

<!-- start-smoth-scrolling -->
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!--flexiselDemo1 -->
 <script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 2,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 1
										},
										tablet: { 
											changePoint:991,
											visibleItems: 1
										}
									}
								});

								$("#flexiselDemo2").flexisel({
									visibleItems: 2,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 1
										},
										tablet: { 
											changePoint:991,
											visibleItems: 1
										}
									}
								});
								
							});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!--//flexiselDemo1 -->

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
<script>
function cek_date(tgl){
	$.ajax({
		url: "Ajax/Cek-Event.php",
		type: "POST",
		dataType: "html",
		data: {
			tgl:tgl,
		},
		success: function(data){
			if(data == "Penuh"){
				swal({
					icon: 'warning',
					title: 'Warning!',
					text: 'Tanggal Yang Dipilih Sudah Penuh',
					closeOnClickOutside: false,
					buttons: false,
					timer: 2000
				});
				document.getElementsByName('date')[0].value="";
			}
		}
	})
}
</script>
<!-- proses -->
<?php
if (isset($_POST['Login'])) {
  $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan WHERE ( username='$_POST[username]' OR email = '$_POST[username]') AND password='$_POST[password]'"));
  if ($data['id'] != "") {
    $_SESSION['id_pel'] = $data['id'];
    $_SESSION['nama'] = $data['nama'];
    ?>
    <script>
      setTimeout(function(){
        swal({
          icon: 'success',
          title: 'Login Berhasil!!',
          text: 'Selamat Datang Susie Make Up',
          closeOnClickOutside: false,
          timer: 2000
        }).then(function(){
          location="index";
        });
      }, 2000);
    </script>
    <?php
  }else{
    ?>
    <script>
      setTimeout(function(){
        swal({
          icon: 'warning',
          title: 'Login Gagal!',
          text: 'Email Atau Password Yang Anda Masukan Salah',
          closeOnClickOutside: false,
          buttons: false,
          timer: 2000
        });
      }, 2000);
    </script>
    <?php
  }
}

// Proses Register
if (isset($_POST['Register'])) {
  $id = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as x FROM pelanggan"));
  $kd = $id['x'] + 1;
  $sql = mysqli_query($con, "INSERT INTO pelanggan values('$kd','$_POST[nama]','$_POST[username]','$_POST[email]','$_POST[password]','$_POST[alamat]','$_POST[telp]')");
  if ($sql) {
    ?>
    <script>
      setTimeout(function(){
        swal({
              icon: 'success',
              title: 'Berhasil!!',
              text: 'Pendaftaran berhasil dilakukan',
              closeOnClickOutside: false,
              timer: 2000
            }).then(function(){
              location="index";
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

// proses Sewa
if(isset($_POST['sewa'])){
  $id = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as x FROM penyewaan"));
  $kd = $id['x'] + 1;
  $sql = mysqli_query($con, "INSERT INTO penyewaan values('$kd','$_SESSION[id_pel]','$_POST[katalog]','$_POST[date]','$_POST[alamat]','Belum Bayar')");
  if ($sql) {
	$id1 = mysqli_fetch_array(mysqli_query($con, "SELECT max(id) as x FROM pembayaran"));
	$kd1 = $id1['x'] + 1;

	
	$katalog = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM katalog_produk WHERE id = '$_POST[katalog]'"));
  	$sql1 = mysqli_query($con, "INSERT INTO pembayaran values('$kd1','$_SESSION[id_pel]','$kd','','$katalog[harga]','','','Belum Bayar')");
    ?>
    <script>
      setTimeout(function(){
        swal({
              icon: 'success',
              title: 'Berhasil!!',
              text: 'Penyewaan berhasil dilakukan!',
              closeOnClickOutside: false,
              timer: 2000
            }).then(function(){
              location="index";
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

// Cek Proses Pembayaran
if($_SESSION['berhasil'] == 1){
	?>
	<script>
		swal({
              icon: 'success',
              title: 'Berhasil!!',
              text: 'Pembayaran berhasil dilakukan!',
              closeOnClickOutside: false,
              timer: 3000
            })
	</script>
	<?php
	unset($_SESSION['berhasil']);
}


?>