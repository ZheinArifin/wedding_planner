<?php
// memanggil library FPDF
require('laporan/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(196,7,'Laporan Data Pembayaran',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(196,8,'Jln. Otista No. 56, Pasapen 1, Kelurahan Kuningan, Kabupaten Kuningan, Jawa Barat 45511',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=192;$i++)
    $pdf->Cell(1,6,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(30,6,'Pemesan',1,0,'C');      
$pdf->Cell(26,6,'Katalog Produk',1,0,'C');   
$pdf->Cell(45,6,'Alamat',1,0,'C');
$pdf->Cell(32,6,'Tanggal Sewa',1,0,'C');   
$pdf->Cell(27,6,'Tanggan Bayar',1,0,'C');   
$pdf->Cell(25,6,'Harga',1,1,'C');   

include '../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
  $sql = mysqli_query($con,"SELECT * FROM pembayaran WHERE status='Dibayar' OR status='Lunas'");

$no=1;

$pdf->SetFont('Times','',10);
$xc = mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(*) FROM pembayaran WHERE status='Dibayar' OR status='Lunas'"));
$xc = $xc[0];
while ($row = mysqli_fetch_array($sql)){
  $sql1 = $con -> query("SELECT * FROM pelanggan WHERE id='$row[id_pelanggan]'");
  $plg = $sql1 -> fetch_array(MYSQLI_ASSOC);
  
  $sql3 = $con -> query("SELECT * FROM penyewaan WHERE id='$row[id_penyewaan]'");
  $sewa = $sql3 -> fetch_array(MYSQLI_ASSOC); 
  
  $sql2 = $con -> query("SELECT * FROM katalog_produk WHERE id='$sewa[id_katalog]'");
  $produk = $sql2 -> fetch_array(MYSQLI_ASSOC);


  $cellWidth=45; //lebar sel
  $cellHeight=6; //tinggi sel satu baris normal
  
  
  
    $textLength=strlen($sewa['alamat']);  
    $errMargin=6;   
    $startChar=0;   
    $maxChar=0;     
    $textArray=array();
    $tmpString="";    
    
    while($startChar < $textLength){ 
      
      while( 
      $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
      ($startChar+$maxChar) < $textLength ) {
        $maxChar++;

        $tmpString=substr($sewa['alamat'],$startChar,$maxChar);
      }
      
      $startChar=$startChar+$maxChar;

      array_push($textArray,$tmpString);
      
      $maxChar=0;
      $tmpString='';
      
    }

    $total = $produk['harga'];
    $line=count($textArray);
    //tulis selnya
    $pdf->SetFillColor(266,266,266);
    $pdf->Cell(10,($line * $cellHeight),$no,1,0,'C',true); 
    $pdf->Cell(30,($line * $cellHeight),$plg['nama'],1,0); 
    $pdf->Cell(26,($line * $cellHeight),$produk['katalog_produk'],1,0,'C');
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY(); 
    $pdf->MultiCell($cellWidth,$cellHeight,$sewa['alamat'],LRTB,L,0);
    $pdf->SetXY($xPos + $cellWidth , $yPos);
    $pdf->Cell(32,($line * $cellHeight),date('d F Y', strtotime($sewa['tgl_sewa'])),1,0,'C');
    $pdf->Cell(27,($line * $cellHeight),date('d F Y', strtotime($row['tgl_bayar'])),1,0,'C');
    $pdf->Cell(25,($line * $cellHeight),"Rp. ".number_format($total,0,'.','.'),1,1);
    $ttl += $total;
$no++;
}
    $pdf->SetFillColor(266,266,266);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(170,6,'Total',1,0,'C'); 
    $pdf->Cell(25,6,"Rp. ".number_format($ttl,0,'.','.'),1,1); 


$pdf->Output();
?>