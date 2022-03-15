<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm',array(250,400));
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(195,7,'Laporan Data Transaksi Futsal Gelora Bung Tarno',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(195,8,'Jln. Raya Bojong Cilimus Kuningan ',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=192;$i++)
    $pdf->Cell(1,5,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(40,6,'Nama Pelanggan',1,0,'C');
$pdf->Cell(20,6,'Produk',1,0,'C');
$pdf->Cell(30,6,'Jumlah Produksi',1,0,'C');
$pdf->Cell(65,6,'Catatan',1,0,'C');
$pdf->Cell(30,6,'Tgl Produksi',1,0,'C');
$pdf->Cell(35,6,'Status',1,1,'C');


// $tglakhir = $_POST['tahun'];
// include '../koneksi.php';
// $tglawal = $_POST['bulan'];
// $tglakhir = $_POST['tahun'];
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$tglawal = $_POST['bulan'];
$tglakhir = $_POST['tahun'];
$sql = mysql_query("SELECT * FROM produksi WHERE MONTH(tgl_produksi) = '$_POST[bulan]' AND YEAR(tgl_produksi) = '$_POST[tahun]'  ORDER BY tgl_produksi ASC");
$no=1;

$pdf->SetFont('Times','',10);
while ($row = mysql_fetch_array($sql)){

	$dt2 = mysql_fetch_array(mysql_query("Select *  from pelanggan where id_pelanggan='$row[id_pelanggan]' "));
    $dt3 = mysql_fetch_array(mysql_query("Select *  from pemesanan where id_pesanan='$row[id_pesanan]' "));
$xc = mysql_fetch_row(mysql_query("select COUNT(*) from produksi"));
  $xc = $xc[0];
  

  //end
    if ($row['status'] == "Di Ambil") {
      $take++;
    }elseif ($row['status'] == "Dalam Antrian Produksi"){
      $queque++;
    }elseif ($row['status'] == "Selesai Di Produksi"){
      $done++;
    }

     $cellWidth=65; //lebar sel
  $cellHeight=6; //tinggi sel satu baris normal
  
  
  if($pdf->GetStringWidth($dt3['catatan']) < $cellWidth){
    
    $line=1;
  }else{
    
    
    $textLength=strlen($dt3['catatan']);  
    $errMargin=5;   
    $startChar=0;   
    $maxChar=0;     
    $textArray=array();
    $tmpString="";    
    
    while($startChar < $textLength){ 
      
      while( 
      $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
      ($startChar+$maxChar) < $textLength ) {
        $maxChar++;

        $tmpString=substr($dt3['catatan'],$startChar,$maxChar);
      }
      
      $startChar=$startChar+$maxChar;

      array_push($textArray,$tmpString);
      
      $maxChar=0;
      $tmpString='';
      
    }
    
    $line=count($textArray)+4;
  }
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	  $pdf->Cell(10,($line * $cellHeight),$no,1,0,'C',true); 
    $pdf->Cell(40,($line * $cellHeight),$dt2['nama_pel'],1,0); 
	  $pdf->Cell(20,($line * $cellHeight),$row['kategori_produk'],1,0); 
	  $pdf->Cell(30,($line * $cellHeight),$row['jml_produksi'],1,0); 
    $xPos=$pdf->GetX();
  $yPos=$pdf->GetY();
  
  if($no == 4){
  $pdf->MultiCell($cellWidth,$cellHeight,$dt3['catatan'],LRTB,L,false);

  }else{
  if ($xc == $no) {
  $pdf->MultiCell($cellWidth,$cellHeight,$dt3['catatan'],LRTB,L,false);
    
  }else{
  $pdf->MultiCell($cellWidth,$cellHeight,$dt3['catatan'],LRT,L,false);

  }
  }
  

  $pdf->SetXY($xPos + $cellWidth , $yPos);
    $pdf->Cell(30,($line * $cellHeight),$row['tgl_produksi'],1,0);
    $pdf->Cell(35,($line * $cellHeight),$row['status_produksi'],1,1);
    
$no++;
}



$pdf->Output();
?>