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
$pdf->Cell(195,7,'Laporan Data Transaksi Futsal Gelora Bung Tarno',0,1,'C');
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
$pdf->Cell(25,6,'Kontak',1,0,'C');
$pdf->Cell(40,6,'Lapangan',1,0,'C');
$pdf->Cell(30,6,'Waktu',1,0,'C');
$pdf->Cell(25,6,'Tanggal Bayar',1,0,'C');
$pdf->Cell(25,6,'Harga Total',1,1,'C');


$tglawal = $_POST['bulan'];
$tglakhir = $_POST['tahun'];
include '../koneksi.php';
$sql = mysql_query("SELECT * FROM pembayaran WHERE MONTH(tgl_bayar) = '$_POST[bulan]' AND YEAR(tgl_bayar) = '$_POST[tahun]' AND tagihan ='Dibayar'");
$no=1;
$pdf->SetFont('Times','',10);
while ($row = mysql_fetch_array($sql)){
$dt2 = mysql_fetch_array(mysql_query("Select *  from pelanggan where kd_pelanggan='$row[kd_pelanggan]' "));
$dt3 = mysql_fetch_array(mysql_query("Select *  from pesanan where kd_pesanan='$row[kd_pesanan]' "));
    
	
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	$pdf->Cell(10,6,$no++,1,0,'C',true); 
    $pdf->Cell(40,6,$dt2['nama_pelanggan'],1,0); 
	$pdf->Cell(25,6,$dt2['kontak'],1,0); 
	$pdf->Cell(40,6,$dt3['lapangan'],1,0); 
	$pdf->Cell(30,6,$dt3['waktu'],1,0); 
    $pdf->Cell(25,6,$row['tgl_bayar'],1,0);
    $pdf->Cell(25,6,$row['jml_bayar'],1,1);
    

}



$pdf->Output();
?>