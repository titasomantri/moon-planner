<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#ffa200;color:#fff;line-height:60px;font-size:20px;">
<b>Pembelian Selesai</b>
</div>
<?php
include"../../conn.php";
$id_pembeli = $_SESSION['id_pembeli'];
$query_checkout = mysqli_query($conn,"SELECT * from  chekout where id_pembeli='$id_pembeli'");
$data_chekout = mysqli_fetch_assoc($query_checkout);
?>
	<div style="margin-left:30px;"
	<div class="row" style="margin:20px;">
<h3><b>Data Penerima:</b></h3>
<table>
	<tr>
		<td><p><b>Nama</b></p></td>  	<td>: <?php echo $data_chekout['nama']; ?></td>
	</tr>

	<tr>
		<td><p><b>Alamat</b></p></td>	<td>: <?php echo $data_chekout['alamat']; ?></td>
	</tr>

	<tr>
		<td><p><b>Nomor Telepon</b></p></td>	<td>: <?php echo $data_chekout['nomor_tlp']; ?></td>
	</tr>
</table>
<div style="margin-left:0px;"
<div class="row" style="margin:20px;">
<h3><b>Data Order</b></h3>
<?php
$qry = mysqli_query($conn,"SELECT * from keranjang where id_pembeli='$id_pembeli'");
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Tema Planner</th><th>Harga</th><th>Qty</th><th>Total Harga</th>
	<?php while($keranjang=mysqli_fetch_assoc($qry)){?>
		<tr>
		<td><?php
		$q = mysqli_query($conn,"SELECT * from buku where id_buku='$keranjang[id_buku]'");
		$d = mysqli_fetch_assoc($q);
		$judul = $d['judul']; echo $judul;
		$qbyar = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?>
			
		</td>
		<td><?php echo $keranjang['harga'] ?></td>
		<td><?php echo $keranjang['qty']?></td>
		<td><?php echo $keranjang['total_harga']?></td>
		</tr>
<?php } ?>
<tr>
	<td colspan="3">Total Harga Keseluruhan</td><td><?php echo @$bayar; ?></td>
</tr>
<tr>
	<td colspan="3">Ongkos Kirim (Minimal)</td><td>Rp.20,000,00</td>
</tr>
<tr>	
	<td colspan="3">Total Bayar</td><td>Rp.<?php $t_bayar=@$bayar+20000; echo number_format($t_bayar); ?>,00</td>
</tr>
</table>
<div style="margin-left:0px;"
<div class="row" style="margin:20px;">
<p>Selanjutnya anda harus mentransfer uang yang tertera pada total bayar ke <b>no. rek: 102.000.728.398.6</b> atas nama <b>Tita Suratmi Somantri</b>. Setelah melakukan pembayaran anda bisa mengkonfirmasi melalui <b><a href="http://wa.me/089609000732"> No.WA:(+62) 896-0900-732</a></b>. <a href="index.php" class="btn btn-warning"> Selesai</a> </p>
</div>
