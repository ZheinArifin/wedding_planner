<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','Legal');
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(195,7,'Laporan Data Pesanan Futsal Gelora Bung Tarno',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(195,8,'Jln. Gak Tau Jalan Namanya',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=192;$i++)
    $pdf->Cell(1,5,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(40,6,'Nama Pelanggan',1,0,'C');
$pdf->Cell(40,6,'Lapangan',1,0,'C');
$pdf->Cell(35,6,'Waktu',1,0,'C');
$pdf->Cell(35,6,'Tanggal Pemesanan',1,0,'C');
$pdf->Cell(35,6,'Total Sewa',1,1,'C');


include '../koneksi.php';
$sql = mysql_query("SELECT * FROM pesanan ");

$no=1;
$pdf->SetFont('Times','',10);
while ($row = mysql_fetch_array($sql)){

$dt1 = mysql_fetch_array(mysql_query("Select *  from pelanggan where kd_pelanggan='$row[kd_pelanggan]' "));

    
	
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	$pdf->Cell(10,6,$no++,1,0,'C',true); 
	$pdf->Cell(40,6,$dt1['nama_pelanggan'],1,0); 
	$pdf->Cell(40,6,$row['lapangan'],1,0); 
	$pdf->Cell(35,6,$row['waktu'],1,0); 
    $pdf->Cell(35,6,$row['tgl_pesan'],1,0);
    $pdf->Cell(35,6,$row['jml_bayar'],1,1);


}



$pdf->Output();
?>