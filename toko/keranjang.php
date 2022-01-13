<?php
session_start();
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";
include 'koneksi.php';
$koneksi = new mysqli("localhost","root","","toko_baju");
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {

//larikan ke halaman beranda
	echo "<script> alert('kerjangan kosong silakan belanja dulu') </script>";
	echo "<script>location='produk.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

</head>
<body>
	<?php include 'menu.php'; ?>
<!-- akhir dari nav bar -->


<section class="konten" style="font-family: Candara;" >
	<div class="container" >
		
		<div class="panel panel-default"  >
		<div class="panel-heading">
		<h1 class="animate__animated  animate__fadeInUp mt-5 mb-3" style="font-size: 30px;">Keranjang Belanja</h1>
		</div>

<div class="container">
<div class="table-responsive">
	<table class="table table-hover animate__animated  animate__fadeInUp ">
  <thead>
    <tr style="font-size: 18px;">
      <td scope="col">NO</td>
      <td scope="col">Produk</td>
      <td scope="col">Harga</td>
      <td scope="col">Jumlah</td>
      <td scope="col">SubHarga</td>
      <td scope="col">Opsi</td>
    </tr>
  </thead>
  <tbody>
  	<?php $nomor=1?>
			<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
			<!-- menampilkan produk yang sedang diperulkan berdasakan  id_produk-->
			<?php $ambil =$koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
			$pecah=$ambil->fetch_assoc();
			$subharga=$pecah["harga_produk"] * $jumlah; ?>
				<tr style="font-size: 18px;">
					<td><?php echo $nomor ?>  </td>
<!-- nama produk huruf depannya kafital -->
					<td><?php echo $pecah["nama_produk"]; ?> </td>
			

					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>

					<td> <?php echo $jumlah ?> </td>

					<td>Rp.<?php echo number_format($subharga); ?></td>
						
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="btn btn-outline-danger " style="font-size: 18px;">
						<i class="far fa-trash-alt " style="font-size: 18px;"></i> Hapus</a>

					</td>


				</tr>
					<?php $nomor++; ?>
				<?php endforeach ?>
    <tr>

    </tr>
  
  </tbody>
</table>
</div>
</div>
	</div>
	<hr>
	

<a href="produk.php"  class="btn btn-outline-success animate__animated  animate__fadeInUp"> <i class="fas fa-arrow-right "></i> Lanjut Belanja </a>
<?php $data = mysqli_query($koneksi,"SELECT * from produk where stok");
	$jumlah_data = mysqli_num_rows($data); ?>
<?php  if ($pecah["stok"]<$jumlah){
			echo " Stok melebihi batas silahkan  dihapus"; 
				} 
						else{?>
<a href="checkout.php" class="btn btn-outline-primary animate__animated  animate__fadeInUp"><i class="fas fa-shipping-fast"></i> checkout</a>
   <?php } ?>
<br>
<br>
</section>	

	<!-- memanggil menu footer -->

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
</html>
