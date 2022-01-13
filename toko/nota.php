<?php 
session_start();
include 'koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>nota pembelian</title>
	
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 

	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
  	
  	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />


</head>
<body>
<?php include 'menu.php';?>
<section class="konten" style="font-family: Verdana;" >
<div class="container" >
	<div class="panel panel-default"  >
	<div class="panel-heading">
	<h2 class="mt-5" style="font-size: 30px; text-align: center; ">Detail Pembelian</h2>
	<hr>
	</div>
<!--nota disni copas di menu admin -->
<?php
$ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail =$ambil->fetch_assoc();
?>
<!-- jika pelangan yang beli tidak sama dengan pelangan yang login,maka dikembalikan ke riwayat php karena dia tidak berhak melihat nota orang lain -->
<!--pelanggan yang beli harus login -->
<?php
//mendapatkan id pelangan yang beli
$idpalanganyangbeli=$detail["id_pelanggan"];
//mrfspsysksn if ptslsngsn ysng login
$idpelangganyanglogin=$_SESSION["pelanggan"]["id_pelanggan"];
if ($idpalanganyangbeli!==$idpelangganyanglogin) {
echo "<script>alert('bukan data anda')</script>";
echo "<script>location='riwayat.php'</script>";
exit();
}
?>

<div class="row animate__animated  animate__fadeInUp mt-3" >
<div class="col-md-4 " >
<h3 style="font-size: 20px;">Informasi Pembelian</h3>
<strong style="font-size: 12px;">No. Pembelian :<?php echo $detail['id_pembelian']?></strong><br>
<p style="font-size: 12px;">Tanggal : <?php echo $detail['tgl_pembelian'];?><br>
Total : Rp. <?php echo number_format($detail['total_pembelian']);?> 
</p>
</div>

<div class="col-md-4" >
<h3 style="font-size: 20px;">Informasi Pelanggan</h3>
<strong style="font-size: 12px;">Nama Pelangan : 	<?php echo $detail['nama_pelanggan'];?></strong> 
<br>
<P style="font-size: 12px;" > Nomor Telpon :
<?php echo $detail['telpn_pelanggan'];?>
<br>
Alamat Email  : <?php echo $detail['email_pelanggan'];?>
</P>
</div>
	<div class="col-md-4" >
		<h3 style="font-size: 25px;">Lokasi Pengiriman</h3>
		<strong style="font-size: 15px;"> Opsi Pengiriman : <?Php echo $detail['nama_kota']; ?></strong><br>
<p style="font-size: 12px;">
		Ongkos Kirim : Rp. <?php  echo number_format($detail['tarif']); ?>
	<br>
		Alamat pengiriman : <?php echo $detail['alamat_pengiriman'] ; ?>
	</p>
	</div>
</div>
<div class="container">
<div class="table-responsive">
<table class="table table-hover animate__animated  animate__fadeInUp mt-3">
	<thead>
		<tr>
			<th scope="col">No </th>
			<th scope="col">Nama produk</th>
			<th scope="col">Harga</th>
			<th scope="col">Berat</th>
			<th scope="col">jumlah</th>
			<th scope="col">subberat</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1;?>
			<?php $totalbelanja = 0; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama'];?></td>
			<td> RP.<?php echo number_format($pecah['harga']);?></td>
			<td><?php echo $pecah['berat'];?> Gr.</td>
			<td><?php echo $pecah['jumlah'];?></td>
			<td><?php echo $pecah['subberat'];?> Gr.</td>
		</tr>
		<?php $nomor++; ?>
	<?php }?>
	</tbody>

		<tr>
			<td colspan="2" >Total belanja</td>
			<td>Rp.<?php echo  number_format($detail['total_pembelian']); ?> </td>
		</tr>
</table>
</div>
<div class="col-md-6 animate__animated  animate__fadeInUp" >
	<div class="alert alert-info" >
		<p>silakan melakukan pembayaran Rp.
			<?php  echo  number_format($detail['total_pembelian']); ?>
			<br>
			<strong> BANK BRI 015001052521506 M HABIB JUMHARI </strong>
			<br>
			Lalu Kirim Bukti Pembayaran diriwayat Belanja

		</p>

	</div>
</div>

	</tbody>
</table>
</div>
</div>
</section>

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