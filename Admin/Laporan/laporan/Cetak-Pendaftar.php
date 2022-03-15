<?php
include '../koneksi.php';
$cek = mysql_fetch_array(mysql_query("select * from laporan where thn_akademik = '$_POST[tahun]'"));
if(!empty($cek['status'])){

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pendaftar.xls");
	$data=mysql_fetch_array(mysql_query("select * from psb_setup where thn_akademik = '$_POST[tahun]' order by nama desc"));
	?>
	
	<center>
		<h1 style="font-family: Times New Roman">Data Pendaftar MTs YASPIKA <br/> Tahun Akademik <?=$data['thn_akademik'] ?></h1>
	</center>

	<table border="2">
		<tr>
			<th>No</th>
			<th>Nisn</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>No STTB</th>
			<th>No SKHUN</th>
			<th>No Ujian</th>
			<th>Anak Ke</th>
			<th>Jumlah Sodara</th>
			<th>Alamat Siswa</th>
			<th>Nama Sd</th>
			<th>Alamat SD</th>
			<th>Nama Ayah</th>
			<th>Umur Ayah</th>
			<th>Agama Ayah</th>
			<th>Pendidikan Tertinggi</th>
			<th>Pekerjaan Ayah</th>
			<th>Penghailan Ayah</th>
			<th>Alamat Ayah</th>
			<th>Nama Ibu</th>
			<th>Umur Ibu</th>
			<th>Agama Ibu</th>
			<th>Pendidikan Ibu</th>
			<th>Pekerjaan Ibu</th>
			<th>Penghailan Ibu</th>
			<th>Alamat Ibu</th>
			<th>Tahun Akademik</th>

		</tr>
		<?php
		$mahasiswa = mysql_query("select * from calon_siswa");
		$no=1;
		while ($dt = mysql_fetch_array($mahasiswa)){
		?>
		<tr>
			<td><?=$no;?></td>
			<td><?=$dt['nisn']?></td>
			<td><?=$dt['nama']?></td>
			<td><?=$dt['tempat_lahir']?></td>
			<td><?=$dt['tgl_lahir']?></td>
			<td><?=$dt['jk']?></td>
			<td><?=$dt['no_sttb']?></td>
			<td><?=$dt['no_skhun']?></td>
			<td><?=$dt['no_ujiansd']?></td>
			<td><?=$dt['anakke']?></td>
			<td><?=$dt['jml_sodara']?></td>
			<td><?=$dt['alamat_siswa']?></td>
			<td><?=$dt['sd']?></td>
			<td><?=$dt['almt_sd']?></td>
			<td><?=$dt['nm_ayah']?></td>
			<td><?=$dt['umr_ayah']?></td>
			<td><?=$dt['agama_ayah']?></td>
			<td><?=$dt['pend_tertinggi1']?></td>
			<td><?=$dt['pekerjaan_ayah']?></td>
			<td><?=$dt['penghasilan_ayah']?></td>
			<td><?=$dt['almt_ayah']?></td>
			<td><?=$dt['nm_ibu']?></td>
			<td><?=$dt['umr_ibu']?></td>
			<td><?=$dt['agama_ibu']?></td>
			<td><?=$dt['pend_tertinggi2']?></td>
			<td><?=$dt['pekerjaan_ibu']?></td>
			<td><?=$dt['penghasilan_ibu']?></td>
			<td><?=$dt['almt_ibu']?></td>
			<td><?=$dt['thn_akademik']?></td>
		<?php
		$no++;
			}
		?>
		</tr>
		
	</table>
</body>
</html>
<?php
}else{
?>
<script type="text/javascript">
	alert("Laporan Untuk Tahun Akademik <?php echo $_POST[tahun] ?> Belum Divalidasi");
	location = "../index";
</script>
<?php
}
?>
