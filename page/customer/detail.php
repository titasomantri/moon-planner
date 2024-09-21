<?php
include"../../conn.php";
@$kd = $_GET['id'];
$qry = mysqli_query($conn,"SELECT * from buku where id_buku='$kd'");
$data = mysqli_fetch_assoc($qry);
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Moon Planner</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#ffa200;">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#"><img src="../../img/moon-removebg-preview.png" style="width:35px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li style="background-color:#ff8800;"><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li style="background-color:#ff8800;" class="a"><a href="detail.php?page=keranjang" style="color:#fff;"><span class="glyphicon glyphicon-shopping-cart"> Keranjang[<?php
          include"../../conn.php";
          $qcek=mysqli_query($conn,"SELECT * from keranjang where id_pembeli='$_SESSION[id_pembeli]'");
          $cek=mysqli_num_rows($qcek); 
          $q_cekout= mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cekout = mysqli_num_rows($q_cekout);
          if($cekout>=1)
          {
          echo "0";
          }
          else{
          echo $cek;
          }  ?>] | </span></a></li>
          <li style="background-color:#ff8800;"><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li style="background-color:#ff8800;"><?php include("kat.php");?></li>
</ul>
</li>
<li style="background-color:#ff8800;" class="a"><a href="cara_pesan.php" style="color:#fff;"><span class="glyphicon glyphicon-question-sign"> Cara Belanja | </span></a></li>

        <?php
        include"../../conn.php";
          $q_cek_cekout = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cek_cekout = mysqli_num_rows($q_cek_cekout);
          if($cek_cekout>=1){
          $queri_cek = mysqli_query($conn,"SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
          $cek = mysqli_num_rows($queri_cek);
          if($cek>=1)
          {?>
          <li style="background-color:#ff8800;"><a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Konfirmasi | </span></a></li><?php
          }else{
          ?>
          <li style="background-color:#ff8800;"><a href="cara_pesan.php?page=konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Konfirmasi | </span></a></li>
          <?php } }?>
          
          <li style="background-color:#ff8800;"><a href="#"><span class="glyphicon glyphicon-user" style="color:#fff;"> <?php echo $nama; ?></span></a>
              <ul>
                  <li style="background-color:#ff8800;"><a href="../admin/outpage.php"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
              </ul>
          </li>
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
     <?php
@$aksi = $_GET['aksi'];
$tanggal = date("d-m-Y");
if($aksi=="checkout")
{?>
   <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
      <img src="../../img/moon.jpg" width="400">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di<h1 style="color:#ffa200;">MOON <b>PLANNER</b></h1></h2>
        <p>Disini kamu bisa membeli dan memesan Planner yang unik dan design menarik dengan mudah.
          Kamu hanya perlu klik, maka Planner akan sampai di tempatmu, happy shopping.</p>
      </div>
    </div>
    </div>
  <div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#ffa200;color:#fff;line-height:60px;font-size:20px;">
<b>Checkout</b>
</div><br>
<div style="margin-left:30px;"
<div class="row" style="margin:20px;">
<form action="proses_chekout.php" method="post">
<label>Nama Penerima</label>
<input type="text" name="nama" placeholder="Nama Anda" class="form-control">
<label>Alamat Lengkap</label>
<input type="text" name="alamat" placeholder="Jalan/Desa/Kecamatan/Kabupaten/Provinsi/Kode Pos" class="form-control">
<label>Nomor Telepon</label>
<input type="text" name="nomor_tlp" placeholder="Nomor Telepon Anda" class="form-control">
<label>Tanggal</label>
<input type="text" name="tanggal"  class="form-control" value="<?php echo $tanggal; ?>" readonly>
<br><input type="submit" class="btn btn-warning" value="selesai">
</form> 
 <?php }else{
    @$page = $_GET['page'];
    if($page=="keranjang"){
      include("keranjang.php");
    }
    else if($page==""){
    ?>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-3" style="margin:30px;">
     <img src="../../gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
          <tr>
            <h3><td><b>Tema</b></td>   <td>: <?php echo $data['judul']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Penerbit</b></td>    <td>: <?php echo $data['penerbit']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Designer</b></td>   <td>: <?php echo $data['pengarang']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Halaman</b></td>   <td>: <?php echo $data['halaman']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Harga</b></td>   <td>: <?php echo $data['harga']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Stok</b></td>    <td>: <?php echo $data['stok']; ?></td></h3>
          </tr>
        </table><br><br>
        <form action="tambah_keranjang.php" method="post">

              <input type="number" name='qty' value="0" min="0" max="<?php echo $data['stok']; ?>">
              <input type="hidden" name='harga' value="<?php echo $data['harga'];?>">
              <input type="hidden" name='id_buku' value="<?php echo $data['id_buku'];?>">
              <?php if($data['stok']==0){ ?>
                 <a href="#" class="btn btn-danger">Tidak dapat membeli</a>
                <?php }
                else{?>
         <button type="submit" class="btn btn-warning">Beli</button>
         <?php } ?>
         </form>
        </div>
    </div>
    </div>
<?php } ?>
    <div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:#ffa200;color:#fff;line-height:60px;font-size:20px;">
<b>Produk Kami</b>
</div>
<div class="container">
     <div class="row">
      <?php
      $qrybuku= mysqli_query($conn,"SELECT * from buku");
      while($buku = mysqli_fetch_assoc($qrybuku)) {
      ?>

      <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
        <center><img src="../../gambar/<?php echo $buku['gambar'] ?>" style="margin-top:20px; width:200px;height:190px;"></center>
         <h3 style="text-align:center; color:#ffa200;"><?php echo $buku['judul'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $buku['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $buku['stok']; ?>)</center>
          <center><a class="btn btn-warning" href="detail.php?id=<?php echo $buku['id_buku'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>

        <?php } }?>
      </div>

      <hr>

      
    </div> 
    <div class="footer" style="width:100%;height:270px;color:#fff;background:#ff8800;">
      <div class="row" style="background:#ffa200;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#ffff"><h3><b>Tentang Moon Planner</b></h3></li>
        </ul></center>
          <hr>
        <ul>
          <li><b>Moon Planner</b> adalah sebuah toko online</li>
          <li>yang menyediakan planner unik dengan design</li>
          <li>menarik berdasarkan kebutuhanmu.</li>
        </ul>
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#ffff"><h3><b>Alamat Kami</b></h3></li>
        </ul></center>
          <hr>
    
          <ul>
          <li>Jl. Pasar Kemis</li>
          <li>Kab. Tangerang</li>
          <li>Banten</li>
          <li>Indonesia</li>
          <li></li>
        </ul>
      
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#ffff"><h3><b>Contact Us</b></h3></li>
          <hr>
         <div class="row">
          <div class="col-md-4">
           <a href="https://www.whatsapp.com/titasomantri"><img src="../../images/logowa-removebg-preview.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.instagram.com/titasomantri/"><img src="../../images/logoig-removebg-preview.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.twitter.com/titasomantri"><img src="../../images/logox-removebg-preview.png" style="width:70px;height:75px;"></a>
          </div>
         </div>
        </ul>
        </center>
      </div>
      </div>
      </div>
        <div class="copyright" style="line-height:50px;">
        <center>Copyright &copy; 2024 | Re-design by www.titasomantri.my.id </center>
        </div>
      </div>
  </html>
