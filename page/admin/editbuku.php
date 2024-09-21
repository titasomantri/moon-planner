<link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
include"../../conn.php";
$e=$_GET['id'];
$edit=mysqli_query($conn,"SELECT * FROM buku WHERE id_buku='$e'");
$book = mysqli_fetch_assoc($edit);
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#ffa200;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Planner
</div>
<form action="e_book.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_buku" class="form-control" value =" <?php  echo $book['id_buku'];?>">
 		<b>Kategori :</b><select name="kategori" class="form-control">
 			<?php
 			$d = mysqli_query($conn,"SELECT * from kategori");
 			while($data = mysqli_fetch_assoc($d)){ ?>;
 			<option> <?php echo $data['kategori']; ?> </option>
 			<?php } ?>
 		</select><br>
 		<b>Planner:</b> <input type="text" name="planner" class="form-control" value =" <?php  echo $book['judul'];?>" ><br>
 		<b>Penerbit:</b><input type="text" name="penerbit" class="form-control" value =" <?php  echo $book['penerbit'];?>"><br>
 		<b>Designer:</b><input type="text" name="designer" class="form-control" value =" <?php  echo $book['pengarang'];?>"><br>
 		<b>Gambar:</b><input type="file" name="gambar" class="form-control" value =" <?php  echo $book['gambar'];?>" ><br>
 		<b>Halaman:</b><input type="text" name="halaman" class="form-control" value =" <?php  echo $book['halaman'];?>"><br>
 		<b>Harga:</b><input type="text" name="harga" class="form-control" value =" <?php  echo $book['harga'];?>" ><br>
 		<b>Stok:</b><input type="text" name="stok" class="form-control" value =" <?php  echo $book['stok'];?>" ><br>
 		<td><input type="submit" class="btn btn-warning" value="Simpan">
</form>