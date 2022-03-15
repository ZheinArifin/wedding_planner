<?php 
include 'koneksi.php';
$dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `admin` WHERE id='$_GET[id]'"));
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
          <li class="nav-item active">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User</p>
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
            <a class="navbar-brand" href="javascript:void(0)">User</a>
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
                  <h4 class="card-title ">Tabel User</h4>
                </div>
                <div class="card-body">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#AddAdmin"  class="btn btn-success btn-round">
                    <i class="fas fa-plus"></i> Tambah
                  </a><br><br>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Username
                        </th>
                        <th>
                          Password
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Status
                        </th>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                          $sql = mysqli_query($con, "SELECT * FROM admin");
                          while($row = mysqli_fetch_array($sql)){
                        ?>
                          <tr>
                            <td>
                              <?=$no++;?>
                            </td>
                            <td>
                              <?=$row['nama'];?>
                            </td>
                            <td>
                              <?=$row['username'];?>
                            </td>
                            <td>
                              <?=$row['password'];?>
                            </td>
                            <td>
                              <?=$row['status'];?>
                            </td>
                            <td>
                              <a href="user.php?id=<?=$row['id'];?>" style="padding:10px; background-color:orange; border-radius:50px">
                              <i class="fas fa-info-circle"></i> Edit</a>
                              
                              <a href="javascript:void(0)" onclick="hapus_admin('<?=$row['id'];?>')" style="padding:10px; background-color:red; border-radius:50px">
                              <i class="fas fa-trash"></i> Delete</a>
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

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tabel Pelanggan</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Telpon
                        </th>
                        <th>
                          Alamat
                        </th>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                          $sql = mysqli_query($con, "SELECT * FROM pelanggan");
                          while($row = mysqli_fetch_array($sql)){
                        ?>
                          <tr>
                            <td>
                              <?=$no++;?>
                            </td>
                            <td>
                              <?=$row['nama'];?>
                            </td>
                            <td>
                              <?=$row['email'];?>
                            </td>
                            <td>
                              <?=$row['telp'];?>
                            </td>
                            <td>
                              <?=$row['alamat'];?>
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

<div class="modal" id="AddAdmin">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-dark text-white">
            <h4 class="modal-title"><b>Tambah Admin</b></h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Nama</b></label>
                  <input type="text" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px" class="form-control" onkeypress="return /[A-Z .]/i.test(event.key)" name="nama" required autofocus>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Username</b></label>
                  <input type="text" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px" class="form-control" onkeypress="return /[A-Z 0-9.]/i.test(event.key)" name="username" required >
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Password</b></label>
                  <input type="password" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px" class="form-control" onkeypress="return /[A-Z0-9]/i.test(event.key)" name="password" required >
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Status</b></label>
                  <select name="status" class="form-control text-dark " required placeholder="-- Pilih Katalog Produk --" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px">
                    <option vlaue="">-- Pilih Status --</option>
                    <option vlaue="Admin">Admin</option>
                    <option vlaue="Pemilik">Pemilik</option>
                  </select>
              </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-round" name="simpan" value="Simpan">Simpan</button>
            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Batal</button>
        </div>
        </form>

        </div>
    </div>
</div>

<div class="modal" id="EditAdmin">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-dark text-white">
            <h4 class="modal-title"><b>Edit Admin</b></h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Nama</b></label>
                  <input type="text" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px" class="form-control" onkeypress="return /[A-Z .]/i.test(event.key)" value="<?=$dt['nama'];?>" name="nama" required autofocus>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Username</b></label>
                  <input type="text" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px" class="form-control" onkeypress="return /[A-Z 0-9.]/i.test(event.key)" value="<?=$dt['username'];?>" name="username" required >
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Password</b></label>
                  <input type="password" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px" class="form-control" onkeypress="return /[A-Z0-9]/i.test(event.key)" value="<?=$dt['password'];?>" name="password" required >
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-dark"><b>Status</b></label>
                  <select name="status" class="form-control text-dark " required placeholder="-- Pilih Katalog Produk --" style="color:black; padding: 10px; border: 1px solid grey; border-radius:5px">
                    <option vlaue="">-- Pilih Status --</option>
                    <option vlaue="Admin" <? if($dt['status'] == "Admin"){ echo "selected"; }?>>Admin</option>
                    <option vlaue="Pemilik" <? if($dt['status'] == "Pemilik"){ echo "selected"; }?>>Pemilik</option>
                  </select>
              </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-round" name="update" value="Update">Update</button>
            <a href="user.php" class="btn btn-danger btn-round" >Batal</a>
        </div>
        </form>

        </div>
    </div>
</div>

<script>
  function hapus_admin(x){
    $.ajax({
      url : "../proses/delete_admin.php",
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
              location = "user.php";
            });
      }
    })
  }
</script>

<?php 
if($_GET['id'] !=""){
  ?>
  <script>
  $('#EditAdmin').modal('show');

  </script>
  <?php
}

if(isset($_POST['simpan'])){
  $kd = mysqli_fetch_array(mysqli_query($con, "SELECT MAX(id) as x FROM `admin`"));
  $id = $kd['x']+1;

  $sql = mysqli_query($con, "INSERT INTO admin VALUES('$id','$_POST[nama]','$_POST[username]','$_POST[password]','$_POST[status]')");
  if($sql){
    ?>
      <script>
        swal({
          icon: 'success',
          title: "Berhasil",
          text: "Data Berhasil Disimpan!",
          closeOnClickOutside: false,
          buttons: false,
          timer: 3000
        }).then(() => {
          location = "user.php";
        });
      </script>
    <?php
  }else{
    ?>
      <script>
        swal({
          icon: 'warning',
          title: "Warning",
          text: "Data Gagal Disimpan!. Ket <?=mysqli_error($con);?>",
          closeOnClickOutside: false,
          buttons: false,
          timer: 3000
        }).then(() => {
          location = "user.php";
        });
      </script>
    <?php
  }
}

if(isset($_POST['update'])){
  $sql = mysqli_query($con, "UPDATE `admin` set nama='$_POST[nama]', username='$_POST[username]', password='$_POST[password]', status='$_POST[status]' WHERE id='$_GET[id]'");
  if($sql){
    ?>
      <script>
        swal({
          icon: 'success',
          title: "Berhasil",
          text: "Data Berhasil Dipperbaharui!",
          closeOnClickOutside: false,
          buttons: false,
          timer: 3000
        }).then(() => {
          location = "user.php";
        });
      </script>
    <?php
  }else{
    ?>
      <script>
        swal({
          icon: 'warning',
          title: "Warning",
          text: "Data Gagal Diperbaharui!. Ket <?=mysqli_error($con);?>",
          closeOnClickOutside: false,
          buttons: false,
          timer: 3000
        }).then(() => {
          location = "user.php";
        });
      </script>
    <?php
  }
}
?>