<?php
include"../../conn.php";
$qry_kategori = mysqli_query($conn,"SELECT * from kategori");

	?>
	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#ffa200;color:#fff;line-height:60px;font-size:20px;">
Tambah Planner
</div>
<form method="post" class="form-group" action="tambah_buku.php" enctype="multipart/form-data" style="margin-top:20px;">
	<select name="kat" class="form-control">
	<?php 
	while($kategori=mysqli_fetch_assoc($qry_kategori)){
	?>
			<option><?php echo $kategori['kategori']; ?></option>
			<?php } ?>
	</select><br>
	<input type="text" name="tema" placeholder="Tema Planner" class="form-control"><br>
	<input type="text" name="penerbit" placeholder="Penerbit Planner" class="form-control"><br>
	<input type="text" name="pengarang" placeholder="Designer Planner" class="form-control"><br>
	<input type="file" name="gambar" placeholder="Gambar Planner" class="form-control"><br>
	<input type="text" name="halaman" placeholder="Jumlah Halaman" class="form-control"><br>
	<input type="text" name="harga" placeholder="Harga Planner" class="form-control"><br>
	<input type="text" name="stok" placeholder="Stok Planner" class="form-control"><br>
	<input type="submit" name="simpan" value="Simpan" class="btn btn-warning"><br>
	</form>