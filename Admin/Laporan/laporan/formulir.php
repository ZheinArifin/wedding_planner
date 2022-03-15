<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','Legal');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('Image/logo.png',13,9,20);
// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(210,7,'FORMULIR PENDAFTARAN PESERTA DIDIK BARU',0,1,'C');
$pdf->SetFont('Times','B',18);
$pdf->Cell(210,8,'MTs YASPIKA KARANGTAWANG - KUNINGAN',0,1,'C');
$pdf->SetFont('Times','B',18);
$pdf->Cell(55,0,'',0,0,'C');
$pdf->Cell(65,8,'TAHUN PELAJARAN ',0,0);
include "../koneksi.php";
 $db=mysql_fetch_array(mysql_query("select * from psb_setup"));
$pdf->Cell(1,8,$db['thn_akademik'],0,1);

for($i=1;$i<=183;$i++)
    $pdf->Cell(1,5,'=',0,0);


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(13,5,'',0,1);

$pdf->SetFont('Times','B',12);
$pdf->Cell(40,6,'A.   Data Calon Siswa',0,1);

$pdf->Cell(13,13,'',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(65,6,'Nama Lengkap ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'NISN ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Tempat Lahir ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Tanggal Lahir ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Jenis Kelamin ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'No Seri STTB/Ijazah/SKHUN ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Nomor Seri SKHUN ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Nomor Peserta Ujian SD ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Anak Ke ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Jumlah Saudara ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Alamat ',0,0);
$pdf->Cell(65,10,' : ',0,1);

$pdf->SetFont('Times','B',12);
$pdf->Cell(40,6,'B.   Data Sekolah Asal',0,1);

$pdf->Cell(13,13,'',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(65,6,'SD / MI ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Alamat SD / MI ',0,0);
$pdf->Cell(65,10,' : ',0,1);

$pdf->SetFont('Times','B',12);
$pdf->Cell(40,6,'C.   Data Orang Tua / Wali',0,1);

$pdf->Cell(13,13,'',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(65,6,'Nama Lengkap Ayah Kandung',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Umur ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Agama ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Pendidikan Tertinggi ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Pekerjaan ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'penghasilan Orang tua ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Alamat ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Nama Lengkap ibu Kandung',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Umur ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Agama ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Pendidikan Tertinggi ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Pekerjaan ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'penghasilan Orang tua ',0,0);
$pdf->Cell(65,6,' : ',0,1);
$pdf->Cell(13,6,'',0,0);
$pdf->Cell(65,6,'Alamat ',0,0);
$pdf->Cell(65,10,' : ',0,1);

$pdf->SetFont('Times','B',12);
$pdf->Cell(40,6,'D.   Data Orang Tua / Wali',0,1);

$pdf->Cell(13,13,'',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(70,6,'1. Pas Photo 3x4',0,0);
$pdf->Cell(70,6,'(dua lembar) ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'2. Photo Copy Ijazah STTB SD / MI',0,0);
$pdf->Cell(70,6,'(dua lembar) ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'3. Photo Copy SKHUN',0,0);
$pdf->Cell(70,6,'(dua lembar) ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'4. Photo Copy Surat Tanda Kelulusan',0,0);
$pdf->Cell(70,6,'(dua lembar) ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'5. Photo Copy Kartu Keluarga',0,0);
$pdf->Cell(70,6,'(dua lembar) ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'6. Photo Copy Akta Kelahiran',0,0);
$pdf->Cell(70,6,'(dua lembar) ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'7. Photo Copy Kartu KPS, KKS, KIP, dan PKH (bagi yang punya) (satu lembar)',0,0);
$pdf->Cell(70,6,'  ',0,0);
$pdf->Cell(60,6,': Sudah / Belum ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'8. Map Folio Berwarna Merah',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->SetFont('Times','B',11);
$pdf->Cell(22,6,'Keterangan :',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(70,6,' Calon siswa yang diterima agar mendaftar ulang di MTs YASPIKA Karangtawang pada tanggal ',0,1);
$pdf->Cell(13,13,'',0,0);
$pdf->Cell(70,6,'yang akan ditentukan kemudian',0,1);

$pdf->Cell(13,13,'',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(100,6,' ',0,0);
$pdf->Cell(70,6,' .................................................................. ',0,1);

$pdf->Cell(30,13,'',0,0);
$pdf->SetFont('Times','',11);
$pdf->Cell(107,6,' PPDB,',0,0);
$pdf->Cell(70,6,' Calon SIswa, ',0,1);


$pdf->Cell(13,25,'',0,0);
$pdf->SetFont('Times','B',11);
for($i=1;$i<=23;$i++)
$pdf->Cell(2,25,' _',0,0);
$pdf->Cell(65,25,' ',0,0);
for($i=1;$i<=23;$i++)
$pdf->Cell(2,25,' _ ',0,0);
$pdf->Output();
?>