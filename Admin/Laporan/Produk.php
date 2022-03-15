
<?php
include "../koneksi.php";
require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","letter");
ob_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
.table tr td{
    border:1px solid black;
}
</style>
<div >
    <h2 style="font-family:times new roman; text-align:center">Laporan Penjualan Barang</h2>
    <p style="text-align:center">Jln. Otista No. 56, Pasapen 1, Kelurahan Kuningan, Kabupaten Kuningan, Jawa Barat 45511</p>
    <hr style="height:2px; border-width:0; color:black; background-color:black">
    <hr style="height:1px; border-width:0; color:black; background-color:black; margin-top:-12px">
    <table class="table table-bordered " style="font-family:times new roman;  ">
        <thead>
        <tr class="thead-dark" >
            <th style="color:white">No</th>
            <th style="color:white">Katalog Produk</th>
            <th style="color:white">Deskripsi</th>
            <th style="color:white">Harga</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $qry=mysqli_query($con, "SELECT * FROM katalog_produk ");
        while($row=mysqli_fetch_array($qry)){
        echo "
        <tr >
            <td>$row[id]</td>
            <td>$row[katalog_produk]</td>
            <td>$row[deskripsi]</td>
            <td>Rp. ".number_format($row[harga],0,'.','.')."</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>
    
    <table class="" width="100%">
        <tr>
            <td width="50%"></td>
            <td width="50%" align="right">Kuningan <?=date("d F Y");?></td>
        </tr>
        <tr>
            <td width="50%"></td>
            <td width="50%" align="right" style="padding-top:45px">___________________________</td>
        </tr>
    </table>
</div>
<?php
    $mpdf->setFooter('{PAGENO}');
    $html = ob_get_contents(); 
    ob_end_clean();
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output();
?>