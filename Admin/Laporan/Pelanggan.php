<?php
// memanggil library FPDF
require('laporan/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm',array(225,300));
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(206,7,'Laporan Data Pelanggan',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(206,8,'Jln. Otista No. 56, Pasapen 1, Kelurahan Kuningan, Kabupaten Kuningan, Jawa Barat 45511',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=202;$i++)
    $pdf->Cell(1,6,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(10,6,'No',1,0,'C');   
$pdf->Cell(40,6,'Nama Lengkap',1,0,'C');   
$pdf->Cell(25,6,'Username',1,0,'C');   
$pdf->Cell(35,6,'Email',1,0,'C');   
$pdf->Cell(70,6,'Alamat',1,0,'C');
$pdf->Cell(25,6,'Telpon',1,1,'C');

include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$sql = mysqli_query($con,"SELECT * FROM pelanggan");

$no=1;

$pdf->SetFont('Times','',10);
$xc = mysqli_fetch_row(mysqli_query($con, "select COUNT(*) from pelanggan "));
$xc = $xc[0];
while ($row = mysqli_fetch_array($sql)){

  $cellWidth=70; //lebar sel
  $cellHeight=6; //tinggi sel satu baris normal
  
  
  
    
    
    $textLength=strlen($row['alamat']);  
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

        $tmpString=substr($row['alamat'],$startChar,$maxChar);
      }
      
      $startChar=$startChar+$maxChar;

      array_push($textArray,$tmpString);
      
      $maxChar=0;
      $tmpString='';
      
    }
    
    $line=count($textArray);
    //tulis selnya
    $pdf->SetFillColor(266,266,266);
    $pdf->Cell(10,($line * $cellHeight),$no,1,0,'C',true); 
    $pdf->Cell(40,(($line) * $cellHeight),$row['nama'],1,0); 
    $pdf->Cell(25,(($line) * $cellHeight),$row['username'],1,0); 
    $pdf->Cell(35,(($line) * $cellHeight),$row['email'],1,0); 
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell($cellWidth,$cellHeight,$row['alamat'],'LRTB','L',false);
    $pdf->SetXY($xPos + $cellWidth , $yPos);
    $pdf->Cell(25,(($line) * $cellHeight),$row['telp'],1,1);
    
$no++;
}



$pdf->Output();
?>