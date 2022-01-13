
<?php
session_start();
//koneksi ke data basae
$koneksi = new mysqli("localhost","root","","toko_baju");

if (!isset($_SESSION["pelanggan"])) {
echo "<script> alert('silakan login terlebih dahulu'); </script>";
echo "<script> location='login.php'; </script>";
}

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {

//larikan ke halaman beranda
echo "<script> alert('belum ada produk yang di beli,silakan belanja dulu') </script>";
	echo "<script>location='produk.php'; </script>";
}

//jk tidak ada session pelangan maka ke login php


?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
		<!--navbar -->
<?php include 'menu.php';?>

<section class="konten"style="font-family: Geneva;" >
	<div class="container" >
		
		<h1 class="animate__animated  animate__fadeInUp mt-5" style="font-size: 30px;">Checkout</h1>
		<hr>


<div class="container">
<div class="table-responsive">
<table class="table animate__animated  animate__fadeInUp"style="font-size: 18px;">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">SubHarga</th>
    </tr>
  </thead>

  <tbody>
  		<?php $nomor=1?>
			<?php $totalbelanja = 0; ?>
			<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
			<!-- menampilkan produk yang sedang diperulkan berdasakan  id_produk-->
			<?php $ambil =$koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
			$pecah=$ambil->fetch_assoc();
			$subharga=$pecah["harga_produk"]*$jumlah; ?>
				<tr style="font-size: 18px;">
					<td><?php echo $nomor ?>  </td>
					<td><?php echo $pecah["nama_produk"]; ?> </td>

					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>

					<td> <?php echo $jumlah ?> </td>

					<td>Rp.<?php echo number_format($subharga); ?></td>

				</tr>
					<?php $nomor++; ?>
					<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4" >Total belanja</th>
					<th>Rp.<?php echo number_format($totalbelanja)?> </th>
				</tr>

			</tfoot>
   
     
  </tbody>
</table>
</div>
</div>

<form method="post" >
	<div class="row" >

		<hr>
		<div class="col-md-6 animate__animated  animate__fadeInUp" >
		
			<div  class="form-group" >
				<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']?>" class="form-control" >
			</div>
			</div>

		
	<div class="col-md-6 animate__animated  animate__fadeInUp" >

		<div  class="form-group " >
		<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telpn_pelanggan']?>" class="form-control" >
		</div>
	</div>

	<div class="col-md-6 animate__animated  animate__fadeInUp">
		<h6>Diterima 2-7 Hari setelah paket Diserahkan Ke Kurir</h6>
		<select class="form-control" name="id_ongkir" >
			<option value="" >Opsi Pengiriman</option>

			<?php
			$ambil =$koneksi->query("SELECT * FROM ongkir"); 
			while ($perongkir=$ambil->fetch_assoc()) {
			?>

			<option value="<?php echo $perongkir["id_ongkir"]; ?> ">

				<?php echo $perongkir['nama_kota']; ?> -
			  Rp.<?php echo number_format($perongkir['tarif']) ?>  

			</option>
		<?php } ?>
		</select>
	</div>
</div>
<br>
<div class="form-group animate__animated  animate__fadeInUp" >
	<label>Alamat Lengkap Pengiriman</label>
	<textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat Lengkap pengiriman(termasuk kode pos)"></textarea>
</div>
<button class="btn btn-outline-primary animate__animated  animate__fadeInUp"name="checkout"><i class="fas fa-shipping-fast"></i> Buat Pesanan </button>
</form>
<?php
if (isset($_POST["checkout"])) 
{
	$id_pelanggan= $_SESSION["pelanggan"]["id_pelanggan"];
	$id_ongkir=$_POST["id_ongkir"];
	$tgl_pembelian=date("Y-m-d");
	$alamat_pengiriman= $_POST['alamat_pengiriman'];
	$ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
	$arrayongkir=$ambil->fetch_assoc();
	$nama_kota=$arrayongkir['nama_kota'];
	$tarif = $arrayongkir['tarif'];
	
	$total_pembelian = $totalbelanja + $tarif;

	//1.menyimpan data ke table pembelian 
if ($alamat_pengiriman==null) {
		echo "<script>alert('isi Data dengan benar'); </script>  ";
		echo "<script>location='checkout.php'; </script>  ";

	}

else{	
		if ($nama_kota==null) {
			echo "<script>alert('pilih opsi pengiriman'); </script>  ";
		echo "<script>location='checkout.php'; </script>  ";
				}
else{
	$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tgl_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tgl_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')"); 
	
	//mendapatakan id_pembelian 
	$id_pembelian_baruan=$koneksi->insert_id;
foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
{
	//mendapatkan data produk berdasarkan id_produk
	$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$perproduk=$ambil->fetch_assoc();

	$nama= $perproduk['nama_produk'];
	$harga= $perproduk['harga_produk'];
	$berat= $perproduk['berat_produk'];

	$subberat=$perproduk['berat_produk']*$jumlah;
	$subharga=$perproduk['harga_produk']*$jumlah;

	$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah ) VALUES ('$id_pembelian_baruan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah') ");

	///uupdate skrip prudk
	$koneksi->query("UPDATE produk SET stok =stok -$jumlah WHERE id_produk='$id_produk'");
}


//kosongkan keranjang
unset($_SESSION["keranjang"]);

//TAMPILKAN DIA ALIKAN KE HALAMAN NOTA KE PEMBELIAN BARUAN
echo "<script>alert('pembelian sukses'); </script>  ";
echo "<script>location='nota.php?id=$id_pembelian_baruan'; </script>  ";
}
}
}
?>
</div>
</section>
<br>

<footer class="page-footer bg-drak mx-auto"style="font-family: Verdana; "   >
        <div style="background-color: #817577"  >
            <div class="container mx-auto">
              <div class="row py-4 d-flex align-items-center mx-auto">
                <div class="col-sm-12 text-center " >
                <a href="https://web.facebook.com/?_rdc=1&_rdr" target="_BLANK"><i class="fab fa-facebook-f text-white mr-4"></i></a>
                <a href="https://wa.me/6285266891091?text=Isi Pesan" target="_BLANK"><i class="fab fa-whatsapp text-white  mr-4" ></i></a>
                <a href="https://www.instagram.com" target="_BLANK"><i class="fab fa-instagram text-white  mr-4"></i></a>
              
                </div>
                </div>
            </div>
          </div>
<div style="background-color:#D5D5D5">
      
          <div class="container text-center text-md-left mt-3">
      			<div class="row">
				<div class="col-md-3 mx-auto mb-4">
          			<h6 class="text-uppercase font-weight-bold mt-3">Toko</h6>
          				<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto " style="width: 125px; height: 2px;">
          				<p class="mt-2">toko ini menjual baju kaos distro, kemeja,crewneck,jaket, hoodie dan lain-lainnya
                  </p>
                  
          		</div>

        		<div class="col-md-3 mx-auto mb-4">
         			 <h6 class="text-uppercase font-weight-bold mt-3">PRODUCT</h6>
         				 <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto " style="width: 85px; height: 2px;">
          					<ul class="list-unstyled">
          						<li class="my-2">- Baju Kaos</li>
          						<li class="my-2">- Hoodie</li>
          						<li class="my-2">- Baju Kemeja</li>
								<li class="my-2">- crewneck</li>
        					</ul>
          		</div>

          		<div class="col-md-3 mx-auto mb-4">
          			<h6 class="text-uppercase font-weight-bold mt-3">Contact</h6>
          				<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto " style="width: 75px; height: 2px;">
          					<ul class="list-unstyled">
	           					    <li class="my-2"><i class="fas fa-home mr-0"></i>kota Manna,Bengkulu Selatan</li>
                      <li class="my-2"><i class="fas fa-envelope mr-1"></i> bagus_distro@gmail.com</li>
                      <li class="my-2"><i class="fas fa-phone mr-1"></i>0852-6689-1091 </li>
                      <li class="my-2"><i class="fas fa-print mr-1"></i>Kota Manna</li>
				          	</ul>
            </div>  
            </div>
          </div>
          </div>
    </footer>

</body>

</html>
