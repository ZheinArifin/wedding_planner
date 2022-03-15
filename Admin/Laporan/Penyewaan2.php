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
$pdf->Cell(196,7,'Laporan Data Pemesanan',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(196,8,'Jln. Otista No. 56, Pasapen 1, Kelurahan Kuningan, Kabupaten Kuningan, Jawa Barat 45511',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=192;$i++)
    $pdf->Cell(1,6,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(45,6,'Pemesan',1,0,'C');      
$pdf->Cell(33,6,'Produk',1,0,'C');   
$pdf->Cell(17,6,'Bahan',1,0,'C');   
$pdf->Cell(35,6,'Tanggal Pemesanan',1,0,'C');
$pdf->Cell(15,6,'Jumlah',1,0,'C'); 
$pdf->Cell(40,6,'Harga',1,1,'C');   

include '../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
  $sql = mysqli_query($con,"SELECT * FROM pemesanan WHERE status='Selesai' OR status='Diterima'");

$no=1;

$pdf->SetFont('Times','',10);
$xc = mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(*) FROM pembayaran WHERE status='Selesai' OR status='Diterima'"));
$xc = $xc[0];
while ($row = mysqli_fetch_array($sql)){
  $sqlx = $con -> query("SELECT * FROM pemesanan WHERE id_pemesanan='$row[id_pemesanan]'");
  $pesan = $sqlx -> fetch_array(MYSQLI_ASSOC);
  $sql1 = $con -> query("SELECT * FROM pelanggan WHERE id_pelanggan='$row[id_pelanggan]'");
  $plg = $sql1 -> fetch_array(MYSQLI_ASSOC); 
  
  $sql2 = $con -> query("SELECT * FROM produk WHERE id_produk='$pesan[id_produk]'");
  $produk = $sql2 -> fetch_array(MYSQLI_ASSOC);

  $sql3 = $con -> query("SELECT * FROM bahan WHERE id_bahan='$pesan[id_bahan]'");
  $bahan = $sql3 -> fetch_array(MYSQLI_ASSOC);

  $cellWidth=33; //lebar sel
  $cellHeight=6; //tinggi sel satu baris normal
  
  
  
    $textLength=strlen($produk['nama_produk']);  
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

        $tmpString=substr($produk['nama_produk'],$startChar,$maxChar);
      }
      
      $startChar=$startChar+$maxChar;

      array_push($textArray,$tmpString);
      
      $maxChar=0;
      $tmpString='';
      
    }

    $total = $pesan['jumlah'] * $bahan['harga'];
    $line=count($textArray);
    //tulis selnya
    $pdf->SetFillColor(266,266,266);
    $pdf->Cell(10,($line * $cellHeight),$no,1,0,'C',true); 
    $pdf->Cell(45,($line * $cellHeight),$plg['nama'],1,0); 
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY(); 
    $pdf->MultiCell($cellWidth,$cellHeight,$produk['nama_produk'],LRTB,L,0);
    $pdf->SetXY($xPos + $cellWidth , $yPos);
    $pdf->Cell(17,($line * $cellHeight),$bahan['nama_bahan'],1,0,'C');
    $pdf->Cell(35,($line * $cellHeight),$row['tgl_pesan'],1,0,'C');
    $pdf->Cell(15,($line * $cellHeight),number_format($pesan['jumlah'],0,'.','.'),1,0);
    $pdf->Cell(40,($line * $cellHeight),"Rp. ".number_format($total,0,'.','.'),1,1);
    $qty += $pesan['jumlah'];
    $ttl += $total;
$no++;
}
    $pdf->SetFillColor(266,266,266);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(140,6,'Jumlah',1,0,'C'); 
    $pdf->Cell(15,6,$qty,1,0); 
    $pdf->Cell(40,6,"Rp. ".number_format($ttl,0,'.','.'),1,1); 


$pdf->Output();
?>