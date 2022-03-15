<?php 
include 'koneksi.php';
$tgl=date('Y-m-d');
$dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pembayaran where id='$_GET[id]' limit 1"));
// $pel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelanggan where id='$_SESSION[id_pel]' limit 1"));
	if(isset($_POST['Upload'])){
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$nama = $_FILES['bukti']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['bukti']['size'];
		$file_tmp = $_FILES['bukti']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 2254070){	
					$tgl = date('Y-m-d');
					// $poin = $pel['point'] + ($dt['htotal'] / 1000);
					move_uploaded_file($file_tmp, './Admin/assets/img/Bukti/'.$nama);
					if($dt['bukti'] != "" && $dt['bukti_lunas'] == ""){
						$query = mysqli_query($con, "UPDATE pembayaran SET bukti_lunas='$nama', tgl_bayar='$tgl', status='Sedang Diproses' WHERE id='$_GET[id]'");
						$query = mysqli_query($con, "UPDATE penyewaan SET status ='Sedang Diproses' WHERE id='$dt[id_penyewaan]'");
					}else{
						$query = mysqli_query($con, "UPDATE pembayaran SET bukti='$nama', tgl_bayar='$tgl', status='Sedang Diproses' WHERE id='$_GET[id]'");
						$query = mysqli_query($con, "UPDATE penyewaan SET status ='Sedang Diproses' WHERE id='$dt[id_penyewaan]'");
					}
					if($query){
						$cari_kd=mysqli_query($con, "select max(id)as kode from chat"); 
					    $tm_cari=mysqli_fetch_array($cari_kd);
					    $kode=substr($tm_cari['kode'],0,5);
					    $kd =$kode+1;
					    $time = date("Y-m-d h:i:sa");
					    //simpan data kedalam database
					    $chat = "<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.";
					    $sql = mysqli_query($con, "INSERT INTO chat VALUES('$kd', '$_SESSION[id_pel]', '$chat', '', '$time','Delivered') ") or die(mysql_error());
						$_SESSION['berhasil'] = 1;
						unset($_SESSION['mulai'.$_GET['id']]);
						?>
						<script type="text/javascript">
							location="./";
						</script>
						<?php
					}else{
						?>
						<script>
							alert('<?= mysqli_error($con); ?>')
						</script>
						<?php
					}
				}else{
					?>
					<script>
						alert("Melebihi Ukuran Maksimal!")
					</script>
					<?php
				}
			}else{
				?>
				<script>
					alert("Format file tidak didukung!")
				</script>
				<?php
			}
	}
		?>