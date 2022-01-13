<?php
session_start();
//koneksi ke data basae
include 'koneksi.php';
$id_pembelian=$_GET["id"];
   $ambil=$koneksi->query("SELECT * FROM pembayaran  LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
  	WHERE pembelian.id_pembelian='$id_pembelian'");
  $pecah=$ambil->fetch_assoc();

//validasi jika data pembayarn belum ada
  if (empty($pecah)) {
   echo "<script>alert('belum ada data pembayaran');</script>";
   echo "<script>location='riwayat.php';</script>";
   exit();
  }
  //jika data pembayran tidak sesuai dengan yang login
  if ($_SESSION["pelanggan"]['id_pelanggan']!==$pecah["id_pelanggan"]) {
  	  echo "<script>alert('Anda tidak berhak melihat data orang lain');</script>";
  	  echo "<script>location='riwayat.php';</script>";
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detai Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
</head>
<body>
	<?php include 'menu.php'; ?>

  <div>
  	<div class="container ">
  		<h3 class="text-center">Detail Pembayaran </h3>
  		<hr>
  		<br>
  		<div class="row ">
  			<div class="col-md-6 animate__animated  animate__fadeInUp">
  					<table class="table ">
  						<th> NAMA </th>
								<td><?php echo $pecah["nama"] ?></td>
							</tr>

							<tr>
							<th> BANK </th>
								<td><?php echo $pecah["bank"] ?></td>
							</tr>
							<tr>
							<th> Jumlah </th>
								<td><?php echo number_format($pecah['jumlah']) ?></td>
							</tr>
							<tr>
							<th> Tanggal </th>
									<td><?php echo $pecah["tanggal"] ?></td>
							</tr>
					
					</table>
				</div>
  					<div class="col-md-6">
					<img style="width: 80%" src="buktipembayaran/<?php echo $pecah['bukti'];?>"  alt="" >
					</div>
			</div>
  		</div>
  <br>
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

</html>
</html>