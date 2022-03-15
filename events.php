<?php 
include "koneksi.php";
$chat = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) as x FROM chat WHERE id_pelanggan='$_SESSION[id_pel]' AND  status = 'Delivered' "));

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Susie Wedding Palnner</title>
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

<style>
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
	<div class="w3ls-banner-11" style="min-height: 100px"> 
		<!-- banner-text --> 
	
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
							<li><a class="hvr-sweep-to-right" href="index">Booking</a></li>
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
								$login = "<a href='index' ><i class='fas fa-sign-in-alt'></i></a>";
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
	<!-- events -->
	<!--Events --> 
		<div class="events-agileits-w3layouts">
		<div class="container">
		<h2 class="heading-agileinfo">Events<span>Events is a professionally managed Event</span></h2>
				<div class="popular-grids">
					<?php 
					$date = date('Y-m-d');
					$sql =  mysqli_query($con, "SELECT * from penyewaan WHERE tgl_sewa >= '$date'");
					while($row = mysqli_fetch_array($sql)){
					if($row['status'] != 'Dibayar' || $row['status'] != 'Lunas'){
						$prd = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM katalog_produk WHERE id='$row[id_katalog]'"));
					?>
					<div class="col-md-4 popular-grid">
						<img src="images/wedding2.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="javascript:void(0)" data-toggle="dmodal" data-target="#myModal2">Wedding</a></h5>
							<div class="detail-bottom" style="padding-bottom: 10px">
								<ul style="text-align:left">
									<li>
										<table>
											<tr>
												<td><i class="fa fa-calendar"  aria-hidden="true"></i></td>
												<td><?= date('d F Y', strtotime($row['tgl_sewa'])); ?></td>
											</tr>
										</table>
									</li>
									<li>
										<table>
											<tr>
												<td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
												<td><?= $row['alamat']; ?></td>
											</tr>
										</table>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
					<?php 
					}
					}
					?>
					
					<div class="clearfix"></div>
				</div>
		</div>
		</div>
<!-- //Events --> 

	<!-- //events -->
							

<!-- footer -->
<div class="copy-right" style="position:fixed; bottom:0px; width:100%">
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

<script src="js/jquery-2.2.3.min.js"></script> 
	
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