<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm',array(330, 240));
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(215,7,'Laporan ',0,1,'C');
$pdf->Cell(215,7,'Data Pembayaran Ramayana Print',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(215,8,'Jln. Raya Bojong Cilimus Kuningan ',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=215;$i++)
    $pdf->Cell(1,5,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->SetDrawColor(25,25,12);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(39, 55, 184);
$pdf->Cell(10,6,'No',1,0,'C',true );
$pdf->Cell(40,6,'Nama',1,0,'C',true );
$pdf->Cell(30,6,'Nama Produk',1,0,'C',true );
$pdf->Cell(25,6,'Jumlah',1,0,'C',true );
$pdf->Cell(40,6,'Metode Pembayaran',1,0,'C',true );
$pdf->Cell(40,6,'Tanggal Pembayaran',1,0,'C',true );
$pdf->Cell(35,6,'Harga Total',1,1,'C',true );

include '../koneksi.php';
$sql = mysql_query("select * from pembayaran where status_pembayaran='Lunas [Dibayar]'");
$no=1;
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$kaos=0;
$undangan=0;
$banner=0;
while ($row = mysql_fetch_array($sql)){
	// Mengatur posisi tabel
	$xc = mysql_fetch_row(mysql_query("select COUNT(*) from pembayaran where status_pembayaran='Lunas [Dibayar]'"));
	$xc = $xc[0];
	$dt1 = mysql_fetch_row(mysql_query("select * from pelanggan where id_pelanggan='$row[id_pelanggan]'"));
	$dt2 = mysql_fetch_row(mysql_query("select * from pemesanan where id_pesanan='$row[id_pesanan]'"));
	$dt3 = mysql_fetch_row(mysql_query("select * from produk where id_produk='$dt2[2]'"));

	$total = $row['pembayaran'] + $row['sisa_pembayaran'];
	$htotal += $total;
	//end
    if ($dt3['2'] == "Kaos") {
    	$kaos++;
    }elseif ($dt3['2'] == "Undangan"){
    	$undangan++;
    }elseif ($dt3['2'] == "Banner"){
    	$banner++;
    }

     $cellWidth=40; //lebar sel
	$cellHeight=6; //tinggi sel satu baris normal
	
	
	if($pdf->GetStringWidth($row['metode_pembayaran']) < $cellWidth){
		
		$line=1;
	}else{
		
		
		$textLength=strlen($row['metode_pembayaran']);	
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

				$tmpString=substr($row['metode_pembayaran'],$startChar,$maxChar);
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
	$pdf->Cell(40,($line * $cellHeight),$dt1['1'],1,0); 
	$pdf->Cell(30,($line * $cellHeight),$dt3['2'],1,0); 
	$pdf->Cell(25,($line * $cellHeight),$dt2['3'],1,0); 
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	
	if($no == 4){
	$pdf->MultiCell($cellWidth,$cellHeight,$row['metode_pembayaran'],LRTB,L,false);

	}else{
	if ($xc == $no) {
	$pdf->MultiCell($cellWidth,$cellHeight,$row['metode_pembayaran'],LRTB,L,false);
		
	}else{
	$pdf->MultiCell($cellWidth,$cellHeight,$row['metode_pembayaran'],LRT,L,false);

	}
	}
	

	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell(40,($line * $cellHeight),$row['tgl_bayar'],1,0);
	$pdf->Cell(35,($line * $cellHeight),"Rp ".number_format($total,"0",".","."),1,1); 
    
$no++;
}
$pdf->Cell(185,6,'Total',1,0,'C');
$pdf->Cell(35,6,"Rp ".number_format($htotal,"0",".","."),1,1);

$pdf->SetFont('Times','B');
$pdf->Cell(40,6,'',0,1,'C');
$pdf->Cell(37,6,'Kategori Produk',0,1,'','B' );
$pdf->SetFont('Times','');
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(40,6,'1. Kaos',0,0 );
$pdf->Cell(20,6,': '.$kaos,0,1 );
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(40,6,'2. Undangan Pernikahan',0,0 );
$pdf->Cell(20,6,': '.$undangan,0,1 );
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(40,6,'3. Banner',0,0 );
$pdf->Cell(20,6,': '.$banner,0,1 );


$pdf->Output();
?>