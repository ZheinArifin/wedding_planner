<?php
// memanggil library FPDF
// require('fpdf.php');
// class PDF extends FPDF
// {
// protected $B = 0;
// protected $I = 0;
// protected $U = 0;
// protected $HREF = '';
// // Page footer
// function Footer()
// {
// 	// Position at 1.5 cm from bottom
// 	$this->SetY(-15);
// 	// Arial italic 8
// 	$this->SetFont('Arial','I',8);
// 	// Page number
// 	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
// }

// function WriteHTML($html)
// {
// 	// HTML parser
// 	$html = str_replace("\n",' ',$html);
// 	$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
// 	foreach($a as $i=>$e)
// 	{
// 		if($i%2==0)
// 		{
// 			// Text
// 			if($this->HREF)
// 				$this->PutLink($this->HREF,$e);
// 			else
// 				$this->Write(5,$e);
// 		}
// 		else
// 		{
// 			// Tag
// 			if($e[0]=='/')
// 				$this->CloseTag(strtoupper(substr($e,1)));
// 			else
// 			{
// 				// Extract attributes
// 				$a2 = explode(' ',$e);
// 				$tag = strtoupper(array_shift($a2));
// 				$attr = array();
// 				foreach($a2 as $v)
// 				{
// 					if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
// 						$attr[strtoupper($a3[1])] = $a3[2];
// 				}
// 				$this->OpenTag($tag,$attr);
// 			}
// 		}
// 	}
// }

// function OpenTag($tag, $attr)
// {
// 	// Opening tag
// 	if($tag=='B' || $tag=='I' || $tag=='U')
// 		$this->SetStyle($tag,true);
// 	if($tag=='A')
// 		$this->HREF = $attr['HREF'];
// 	if($tag=='BR')
// 		$this->Ln(5);
// }

// function CloseTag($tag)
// {
// 	// Closing tag
// 	if($tag=='B' || $tag=='I' || $tag=='U')
// 		$this->SetStyle($tag,false);
// 	if($tag=='A')
// 		$this->HREF = '';
// }

// function SetStyle($tag, $enable)
// {
// 	// Modify style and select corresponding font
// 	$this->$tag += ($enable ? 1 : -1);
// 	$style = '';
// 	foreach(array('B', 'I', 'U') as $s)
// 	{
// 		if($this->$s>0)
// 			$style .= $s;
// 	}
// 	$this->SetFont('',$style);
// }

// function PutLink($URL, $txt)
// {
// 	// Put a hyperlink
// 	$this->SetTextColor(0,0,255);
// 	$this->SetStyle('U',true);
// 	$this->Write(5,$txt,$URL);
// 	$this->SetStyle('U',false);
// 	$this->SetTextColor(0);
// }
// }
// intance object dan memberikan pengaturan halaman PDF


$html= '
<style type="text/css">
.table{
	border-collapse:collapse;
}
.table th{
	 background-color:#070fb0; color:#fff;
}
table td{
	padding: 3px;
}
img {
	width:auto;
	height : 150px;
}
.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
';
$html .='<page>

	<div style="padding: 2px; " align="center">
		<span style=" font-size: 25px">Laporan<br>Data Produk Ramayana Print</span><br>
		<span style=" font-size: 20px">Jln. Raya Bojong Cilimus Kuningan</span>
	</div><br>
	

	<div style="text-align: center;"">
	<table border="1px" class="table center" style=" padding: 20px 40px; " >
		<tr>
			<th style="padding:8px 5px;">No.</th>
			<th style="padding:8px 30px;">Nama Produk</th>
			<th style="padding:8px 30px;">Kategori Ppoduk</th>
			<th style="padding:8px 30px;">Gambar</th>
		</tr>
	';
	$no = 1;
	include '../koneksi.php';
	$sql = mysql_query("select * from produk");
	while ($row = mysql_fetch_array($sql)){
	// Mengatur posisi tabel
	$kalimat = $row['file_produk'];
	$kata = explode("/",$kalimat);
	
	$html .= '
	<tr>
		<td align="center" style="padding:8px 5px;">'.$no++.'</td>
		<td style="padding:8px 30px;">'.$row['nama_produk'].'</td>
		<td style="padding:8px 30px;">'.$row['kategori'].'</td>
		<td align="center" style="padding:8px 30px;"><img src="'.$row['file_produk'].'"></td>
	</tr>';
}
	$html .= '
	</table>
	</div>
	</page>';
require_once('html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
// membuat halaman baru
try
 {
$html2pdf->WriteHTML($html);
$html2pdf->Output('contoh.pdf');
}
 catch(HTML2PDF_exception $e) { echo $e; }
?>