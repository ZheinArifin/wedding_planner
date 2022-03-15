  <?
    error_reporting(0);
  session_start();

  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- collapse   -->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
  <title>Administrasion MTs YASPIKA</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css?v=1.0" rel="stylesheet">
</head>

<body id="page-top" class="font" >

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index">MTs YASPIKA</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
       
      </div>
    </form>
 
<!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>  
  
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Cetak</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="./laporan/formulir">Formulir Pendaftaran</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form">Data Pendaftar</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Pendaftaran">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Pendaftaran</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="setting">
          <i class="fas fa-fw fa-cog"></i>
          <span>Setting</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables">
          <i class="fas fa-fw fa-table"></i>
          <span>Informasi Penerimaan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="persetujuan">
          <i class="fas fa-fw fa-table"></i>
          <span>Persetujuan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Kelola-Akun">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Akun</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
       <center class="card bg-dark text-white"><h1>MTs YASPIKA<br></h1>
        <h3>
        Madrasah Hebat Bermartabat !!!
        </h3>
       </center>
      	<div style="padding: 30px 50px 50px 50px;" class="row">
    	   <div class="card shadow p-3 mb-5 rounded bg-primary text-white col-sm-5 visi ">
    		  <div class="card-header bg-primary">
    			<center><label class="Tvisi">Visi MTs Yaspika</label></center>
    		  </div>
          <span class="text-justify">
  		    Unggul Dalam Keimanan, Keilmuan, Keterampilan, Dan Akhlak Guna Mempersiapkan Siswa Ke Jenjang Pendidikan Yang Lebih Tinggi
          </span>
 		     </div>

         <span style="padding: 20px 20px 20px 55px;"></span>

         <div class="card  bg-success text-white col-sm-6 visi " style="padding-top: 17px">
          <div class="card-header bg-success ">
          <center><label class="Tvisi">Misi MTs Yaspika</label></center>
          </div>
          <ol>
            <li>Menanamkan keyakinan kebesaran Allah SWT</li>
            <li>Mengaktifkan kegiatan kurikuler dikalangan guru, siswa, dan staf tata usaha</li>
            <li>Mengembangkan potensi, minat, dan bakat siswa sebagai bekal pengalamannya menuju masa depan </li>
            <li>Mengembangkan seluruh potensi yang dimiliki MTs YASPIKA dalam rangka meningkatkan pelayanan pendidikan kepada masyarakat </li>
          </ol>
         </div>
  </div>
 		   </div><br>
       <div class="fasilitas">
        <center><h1 style="color: white;">Fasilitas Sekolah</h1></center><br>
       <div class="row ">
        <!--Fasilitas 1-->
          <div class="col-sm-3"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-school" style="font-size: 45px; color: blue; padding-top: 10px;"></div>
            </center>
            <span class="isi">Ruang Belajar </span>
          </div>

         <!--Fasilitas 2-->
         <div class="col-sm-3"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-laptop-code" style="font-size: 45px; color: blue; padding-top: 10px;"></div>
            </center>
            <span class="isi">Labolatorium Komputer</span>
        </div>

        <!--Fasilitas 3-->
        <div class="col-sm-3"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-flask" style="font-size: 45px; color: blue; padding-top: 10px;"></div>
            </center>
            <span class="isi">Labolatorium IPA</span>
        </div>

        <!--Fasilitas 4-->
        <div class="col-sm-3"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-book" style="font-size: 45px; color: blue; padding-top: 10px;"></div>
            </center>
            <span class="isi">Perpustakaan</span>
        </div>
        </div>
        <div class="row">
       <!--Fasilitas 5-->
        <div class="col-sm-4"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-futbol" style="font-size: 45px; color: blue; padding-top: 13px;"></div>
            </center>
            <span class="isi">Sarana Olahraga</span>
        </div>

        <!--Fasilitas 6-->
        <div class="col-sm-4"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-mosque" style="font-size: 44px; color: blue; padding-top: 13px;"></div>
            </center>
            <span class="isi">Mushola</span>
        </div>

        <!--Fasilitas 6-->
        <div class="col-sm-4"  style="text-align: center; padding-bottom: 20px;">
            <center class="fs rounded-circle">
              <div class="fas fa-mosque" style="font-size: 44px; color: blue; padding-top: 13px;"></div>
            </center>
            <span class="isi">Pondok Pesantren</span>
        </div>
        </div>
       </div><br><br><br>

    <div style="background-image: url(background.jpg); background-size: 1400px 600px;" >
    <div id="accordion">
      
    <div class="card text-white" style="padding: 0px 20px 20px 20px; opacity: 0.8; width: 100%; background-color: rgb(6, 4, 64);">
      <div class="card-header" id="headingOne" style="background-color: rgb(6, 4, 64);">
        <h1 align="center">
          <button class="btn text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">   
            <i class="far fa-arrow-alt-circle-down" style="font-size: 30px;" aria-hidden="true"></i>
            <span style="font-size: 30px;">  &nbsp Kegiatan Ekstrakurikuler </span>
          </button>
        </h1>
      </div>

      <div class="row" style="padding-top: 20px">
      <div class="col">
      <div id="collapseOne" class="collapse list-type5" aria-labelledby="headingOne" data-parent="#accordion">
        <ol>
          <li><a href="">Pramuka</a></li>
          <li><a href="">Seni Kaligrafi</a></li>
          <li><a href="">Hadroh</a></li>
          <li><a href="">Tilawah</a></li>
          <li><a href="">Paskibra</a></li>
        </ol>
      </div>
      </div>

      <div class="col">
      <div id="collapseOne" class="collapse list-type5" aria-labelledby="headingOne" data-parent="#accordion">
        <ol>
          <li><a href="">Futsal</a></li>
          <li><a href="">Karate</a></li>
          <li><a href="">Tenis Meja</a></li>
          <li><a href="">Badminton</a></li>
        </ol>
      </div>
      </div>
      </div>
    </div>
  
</div>
</div>
       <!--
       <div class="fasilitas">
              <ul class="ul">
                <li class="li">
                    <center class="fs rounded-circle" >
                      <div class="fas fa-school" style="font-size: 45px; color: blue; padding-top: 6px;"></div>
                    </center>
                    <span class="isi"><br>Ruang Belajar</span>
                    You just don't understand economics, like supply and demand. Don't worry kiddo, where there's a demand there will be a supply; we'll all have our roads.
                </li>
                <li  class="li">
                    <span  class="isi">Is taxation theft?</span>
                    If I came to your house with some heavily armed buddies, demanded that you and your neighbors give me a percentage of your income, in return for some crappy monopolized services that you didn't ask for, would you consider that theft?
                </li>
                <li  class="li">
                    <span  class="isi">So, what you're saying is...?</span>
                    Libertarians want to live in a world where gay couples can protect their poppy fields with fully automatic weapons.

A world where voluntaryism and property rights are treated with the highest respect.
                </li>
                <li class="li">
                    <span class="isi">So, what you're saying is...?</span>
                    Libertarians want to live in a world where gay couples can protect their poppy fields with fully automatic weapons.

A world where voluntaryism and property rights are treated with the highest respect.
                </li>
              </ul>
</div>
-->

      <!--<div class="col-sm-5 visi ">
          
          <center><label class="Tvisi">Visi MTs Yaspika</label></center>
          
          <span class="text-justify">
          Unggul Dalam Keimanan, Keilmuan, Keterampilan, Dan Akhlak Guna Mempersiapkan Siswa Ke Jenjang Pendidikan Yang Lebih Tinggi
          </span>
         </div>
       /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Mts Yaspika 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout">Logout</a>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
</body>
</html>
<?
  if($_SESSION['sesi']=="berhasil"){
  ?> 
  <body onload="myFunction()"> </body>   
  <?
  $_SESSION['sesi']='sudah login';
  }else if($_SESSION['sesi'] ==""){
  ?>
   <script>
   location= "../";
   </script>   
   <?
}
?>
<script>
  function myFunction() {
    swal("Login Sukses", "Selamat Datang Di Sistem Pendaftaran Peserta Didik Baru \n MTs YASPIKA", "success");
}
</script>