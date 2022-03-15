<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SUSIE MAKE UP
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
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

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          SUSIE
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User </p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="./produk.php" >
              <i class="fas fa-box" style="font-size:20px"></i>
              <p>Katalog Produk</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./diskon.php">
              <i class="fas fa-percent" style="font-size:20px"></i>
              <p>Diskon Produk</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./penyewaan.php">
              <i class="fas fa-store-alt" style="font-size:20px"></i>
              <p>Penyewaan</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./pembayaran.php">
              <i class="fas fa-wallet" style="font-size:20px"></i>
              <p>Pembayaran</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./chat.php">
            <i class="far fa-comments"></i>
              <p>Chat</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./gallery.php">
            <i class="far fa-image"></i>
              <p>Gallery</p>
            </a>
          </li>
          <?php 
          if(!empty($_SESSION['id_pemilik'])){
          ?>
          <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseUtilities" class="collapse "  aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class=" py-2 collapse-inner rounded" style="background-color:rgba(0,0,0,0)">
                <ul>
                  <li style="list-style-type:none"><a class="collapse-item" href="../Laporan/Pelanggan">Pelanggan</a></li>
                  <li style="list-style-type:none"><a class="collapse-item" href="../Laporan/Produk">Produk</a></li>
                  <li style="list-style-type:none"><a class="collapse-item" href="../Laporan/Penyewaan">Penyewaan</a></li>
                  <li style="list-style-type:none"><a class="collapse-item" href="../Laporan/Pembayaran">Pembayaran</a></li>
                </ul>
                </div>
            </div>
          </li>
          <?php 
          }
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="./Logout.php">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Chat</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tabel Chat</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" >
                      <thead class="text-danger" >
                          <tr>
                            <th width="5%" style="text-align:center">
                                #
                            </th>
                            <th width="70%" align="center">
                                Nama
                                
                            </th>
                            <th width="25%" align="center">
                                Aksi
                            </th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php 
                        $no=1;
                        $sql = mysqli_query($con, "SELECT DISTINCT (id_pelanggan) FROM chat ");
                        while($row = mysqli_fetch_array($sql)){
                            $cht = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM chat WHERE id_pelanggan='$row[id_pelanggan]'"));
                            $pel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan WHERE id='$row[id_pelanggan]'"));
                            if($disk['diskon']){
                                $diskon = (($prod['harga'] * $disk['diskon'])/100);
                            }else{
                                $diskon = 0;
                            }
                            $total = $prod['harga'] - $diskon;
                        ?>
                          <tr style="background-color:rgba(0,0,0,0)">
                            <td >
                                <i class="fas fa-user-circle fa-3x" style="margin-top:-50px"></i>
                            </td>
                            <td>
                              <b style="font-size:15px; font-weight:bold"><?= ucfirst($pel['nama']);?></b>
                              <p><?= $cht['pesan_keluar']; ?></p>
                            </td>
                            <td>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#Chat" data-section="chat" style="padding:10px; background-color:orange; border-radius:50px" onclick="chat('<?=$row['id_pelanggan']?>')">
                                <i class="fas fa-info-circle"></i> Detail</a>
                            </td>
                          </tr>
                        <?php 
                          }  
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright" id="date">
            - Sistem Informasi Penyewaan
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div>
<!-- Chat -->
<div class="modal fade chats" id="Chat" style="margin-bottom: 20px; margin-top: 70px; height:550px;">
    <div class="modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content col-lg-12 col-md-12">
      
        <!-- Modal Header -->
        <div class="modal-header" style="border-bottom:2px solid black">
          <h4 class="modal-title " style="font-family: times new roman; font-weight:bold; font-size:25px; color:black; width:100%"><center>CHATING</center></h4>
          <button type="button" class="close" data-dismiss="modal" style="font-weight:bold; color:black; font-size:40px">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="row">
				<div class="col-md-12 chats" style="height:330px; overflow-y: scroll; ">
					<div class="bubble-list"  id="chatx" >
						
					</div>
				</div>
			</div>
        	<br>
			<form method="post" id="frmChat">
				<div class="row">
					<div class="col-md-10 ">
                        <input type="hidden" id="id_pelanggan">
						<input type="text" style="height: 40px; border-bottom:1px solid black" name="chat" id="chat" class="form-control text-dark">
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
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="../assets/js/sweetalert2.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });

    // tabel
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>
</body>

</html>
<!-- chat -->
<script type="text/javascript">
    
	$('#Chat').on('shown.bs.modal', function(event) {
		var elmnt = document.getElementById("chatx");
		elmnt.scrollIntoView(false)
	});
    
	
	$(document).ready(function(){
	 $('#frmChat').submit(function(e){
	  e.preventDefault();
	   $.ajax({
			url: '../proses/simpan-data.php',
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
	
	function chat(z){
		$.ajax({
			url: '../../Ajax/chat.php',
			type: 'post',
			data: {id:z},             
			success: function(data) { 
            document.getElementById('id_pelanggan').value=z;
			$('#chatx').html(data);              
			}
		});
	}
        
</script>
<!-- end Chat -->
<script>
  function hapus_katalog(x){
    $.ajax({
      url : "../proses/delete_katalog.php",
      type: "POST",
      data:{
        id: x,
      },
      success:function(data){
        swal({
              icon: 'success',
              title: "Berhasil",
              text: data,
              closeOnClickOutside: false,
              buttons: false,
              timer: 3000
            }).then(() => {
              location = "produk.php";
            });
      }
    })
  }
</script>