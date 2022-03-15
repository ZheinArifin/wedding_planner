<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm',array(330, 270));
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(245,7,'Laporan ',0,1,'C');
$pdf->Cell(245,7,'Data Pemesanan Ramayana Print',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(245,8,'Jln. Raya Bojong Cilimus Kuningan ',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=245;$i++)
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
$pdf->Cell(70,6,'Catatan',1,0,'C',true );
$pdf->Cell(35,6,'Tanggal Pemesanan',1,0,'C',true );
$pdf->Cell(40,6,'Status',1,1,'C',true );

include '../koneksi.php';
$sql = mysql_query("select * from pemesanan");
$no=1;
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);

while ($row = mysql_fetch_array($sql)){
	// Mengatur posisi tabel
	$xc = mysql_fetch_row(mysql_query("select COUNT(*) from pemesanan"));
	$xc = $xc[0];
	$dt1 = mysql_fetch_row(mysql_query("select * from pelanggan where id_pelanggan='$row[id_pelanggan]'"));
	$dt2 = mysql_fetch_row(mysql_query("select * from produk where id_produk='$row[id_produk]'"));

	//end
    if ($row['status'] == "Di Ambil") {
    	$take++;
    }elseif ($row['status'] == "Dalam Antrian Produksi"){
    	$queque++;
    }elseif ($row['status'] == "Selesai Di Produksi"){
    	$done++;
    }

     $cellWidth=70; //lebar sel
	$cellHeight=6; //tinggi sel satu baris normal
	
	
	if($pdf->GetStringWidth($row['catatan']) < $cellWidth){
		
		$line=1;
	}else{
		
		
		$textLength=strlen($row['catatan']);	
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

				$tmpString=substr($row['catatan'],$startChar,$maxChar);
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
	$pdf->Cell(30,($line * $cellHeight),$dt2['1'],1,0); 
	$pdf->Cell(25,($line * $cellHeight),$row['jml'],1,0); 
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	
	if($no == 4){
	$pdf->MultiCell($cellWidth,$cellHeight,$row['catatan'],LRTB,L,false);

	}else{
	if ($xc == $no) {
	$pdf->MultiCell($cellWidth,$cellHeight,$row['catatan'],LRTB,L,false);
		
	}else{
	$pdf->MultiCell($cellWidth,$cellHeight,$row['catatan'],LRT,L,false);

	}
	}
	

	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell(35,($line * $cellHeight),$row['tgl_pemesanan'],1,0);
    $pdf->Cell(40,($line * $cellHeight),$row['status'],1,1);
    
$no++;
}

$pdf->Cell(40,6,'',0,1,'C');
$pdf->Cell(47,6,'Pemesanan Di Ambil',0,0 );
$pdf->Cell(20,6,': '.$take,0,1 );
$pdf->Cell(47,6,'Pemesanan Dalam Antrian',0,0 );
$pdf->Cell(20,6,': '.$queque,0,1 );
$pdf->Cell(47,6,'Pemesanan Selesai Di Produksi',0,0 );
$pdf->Cell(20,6,': '.$done,0,1 );

$pdf->Output();
?>