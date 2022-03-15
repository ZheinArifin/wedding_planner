<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm',array(300, 230));
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(205,7,'Laporan ',0,1,'C');
$pdf->Cell(205,7,'Data Pelanggan Ramayana Print',0,1,'C');
$pdf->SetFont('Times','',11);
$pdf->Cell(205,8,'Jln. Raya Bojong Cilimus Kuningan ',0,1,'C');
$pdf->SetFont('Times','B',18);


for($i=1;$i<=205;$i++)
    $pdf->Cell(1,5,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,8,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->SetDrawColor(25,25,12);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(39, 55, 184);
$pdf->Cell(10,6,'No',1,0,'C',true );
$pdf->Cell(40,6,'Nama',1,0,'C',true );
$pdf->Cell(30,6,'Gender',1,0,'C',true );
$pdf->Cell(50,6,'Alamat',1,0,'C',true );
$pdf->Cell(30,6,'Telepon',1,0,'C',true );
$pdf->Cell(50,6,'Email',1,1,'C',true );

include '../koneksi.php';
$sql = mysql_query("select * from pelanggan");
$no=1;
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);

while ($row = mysql_fetch_array($sql)){
	// Mengatur posisi tabel
	
	//end
    if ($row['gender'] = "Laki - Laki") {
    	$L++;
    }else{
    	$P++;
    }

     $cellWidth=50; //lebar sel
	$cellHeight=6; //tinggi sel satu baris normal
	
	
	if($pdf->GetStringWidth($row['almt_pel']) < $cellWidth){
		
		$line=1;
	}else{
		
		
		$textLength=strlen($row['almt_pel']);	
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
				$tmpString=substr($row['almt_pel'],$startChar,$maxChar);
			}
			
			$startChar=$startChar+$maxChar;
			
			array_push($textArray,$tmpString);
			
			$maxChar=0;
			$tmpString='';
			
		}
		
		$line=count($textArray);
	}
	
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	$pdf->Cell(10,($line * $cellHeight),$no++,1,0,'C',true); 
	$pdf->Cell(40,($line * $cellHeight),$row['nama_pel'],1,0); 
	$pdf->Cell(30,($line * $cellHeight),$row['gender'],1,0); 
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth,$cellHeight,$row['almt_pel'],1);

	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell(30,($line * $cellHeight),$row['telp_pel'],1,0);
    $pdf->Cell(50,($line * $cellHeight),$row['email_pel'],1,1);
    

}
if ($P == "") {
	$P = 0;
}
$pdf->Cell(40,6,'',0,1,'C');
$pdf->Cell(25,6,'Laki-Laki',0,0 );
$pdf->Cell(20,6,': '.$L,0,1 );
$pdf->Cell(25,6,'Perempuan',0,0 );
$pdf->Cell(20,6,': '.$P,0,1 );

$pdf->Output();
?>