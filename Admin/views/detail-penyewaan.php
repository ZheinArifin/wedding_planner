<?php 
include 'koneksi.php';
error_reporting(0);
$dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penyewaan WHERE id='$_GET[id]'"));
$pel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan WHERE id='$dt[id_pelanggan]'"));
$prod = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM katalog_produk WHERE id='$dt[id_katalog]'"));
$disk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM diskon WHERE id_katalog='$dt[id_katalog]'"));
if($disk['diskon']){
    $diskon = (($prod['harga'] * $disk['diskon'])/100);
}else{
    $diskon = 0;
}
$total = $prod['harga'] - $diskon;
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
          <li class="nav-item active">
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
          <li class="nav-item ">
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
            <a class="nav-link" href="./icons.php">
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
            <a class="navbar-brand" href="javascript:void(0)">Penyewaan</a>
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
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3); color: black;">
                <div class="card-header bg-dark ">
                    <h1 class="h3 text-light">Detail Penyewaan</h1>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-rounded" id="alert" style="display: none; border-radius: 50px 50px;">
                    </div>
                    <div class="alert alert-danger alert-rounded" id="alert-warning" style="display: none; border-radius: 50px 50px;">
                    </div>
                    
                    <div style="padding: 10px 20px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Pelanggan </small>
                                        <input type="text" style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;" class="form-control" value="<?= $pel['nama']; ?>" disabled style="border: 0px solid green; background:white; box-shadow: 0 0 3px aqua">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Katalog Produk</small>
                                        <input type="text"  class="form-control" value="<?= $prod['katalog_produk']; ?>" disabled style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Deskripsi</small>
                                        <n style="color:black" ><?= $prod['deskripsi']; ?></n>
                                        <hr style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;">
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Tanggal Sewa</small>
                                        <input type="text"  class="form-control" value="<?= date("d F Y", strtotime($dt['tgl_sewa'])); ?>" disabled style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Harga</small>
                                        <input type="text"  class="form-control" value="Rp. <?=number_format($prod['harga'],0,'.','.'); ?>" disabled style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Diskon</small>
                                        <input type="text"  class="form-control" value="Rp. <?=number_format($diskon,0,'.','.'); ?>" disabled style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12" >
                                        <small>Total</small>
                                        <input type="text"  class="form-control" value="Rp. <?=number_format($total,0,'.','.'); ?>" disabled style="background-color:rgba(0,0,0,0);  border-bottom: 1px solid white;">
                                    </div>
                                </div>
                                <?php
                                if ($dt['status'] == "Dibayar"){
                                    ?>      
                                    <!-- <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="post">
                                                <center>
                                                    <input type="submit" name="selesai" value="Pembayaran Lunas" class="btn btn-danger col-lg-6">
                                                </center>
                                            </form>
                                        </div>
                                    </div> -->
                                    <?php    
                                }
                                ?>
                                
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
  </script>
</body>

</html>

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
<?php 
if (isset($_POST['selesai'])) {
    $sql = $con -> query("SELECT * FROM penyewaan WHERE id='$_GET[id]'");
    $pesan = $sql -> fetch_array(MYSQLI_ASSOC);
    $sql1 = mysqli_query($con, "UPDATE pembayaran SET status ='Lunas' WHERE id_penyewaan='$_GET[id]'");
    $sql2 = mysqli_query($con, "UPDATE penyewaan SET status ='Lunas' WHERE id='$_GET[id]'");
    if ($sql1) {
      ?>
      <script>
        setTimeout(function(){
          swal({
                icon: 'success',
                title: 'Berhasil!!',
                text: 'Pemabayaran Berhasil Dilunasi',
                closeOnClickOutside: false,
                timer: 2000
              }).then(function(){
                location="detail-penyewaan.php?id=<?=$_GET['id'];?>";
              });
        }, 2000);
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        alert("<?php echo mysqli_errno($con) ?>")
      </script>
      <?php
    }
  }
?>