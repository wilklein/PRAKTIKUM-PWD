<?php
session_start();
//koneksi ke data base
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>toko lisa</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
		  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

</head>

<body>
	<?php include 'menu.php'; ?>

	<section class="riwayat"style="font-family: Geneva;" >
		<div class="container"> 
			<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="animate__animated  animate__fadeInUp mt-5 mb-4 ml-3" style="font-size: 25px;">Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?> </h3>
		</div>

<div class="container">
<div class="table-responsive">
		<table class="table animate__animated  animate__fadeInUp " style="font-size: 17px;">
  			<thead class="thead-light">
    		<tr>
      			<th scope="col">NO</th>
      			<th scope="col">Tanggal</th>
      			<th scope="col">Status</th>
      			<th scope="col">Total</th>
         		<th scope="col">opsi</th>
    		</tr>
  			</thead>
  		<tbody>
  		
  		   <tr><?php 
				$nomor=1;
				//mendapatakan id pelanggan dari session
				$id_pelanggan =$_SESSION["pelanggan"]['id_pelanggan'];
				$ambil= $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
				while ($pecah=$ambil->fetch_assoc()){
				?>   
     			<td><?php echo $nomor?></td>
  
    			<td><?php echo $pecah["tgl_pembelian"]?></td>
							
				<td>
				<?php echo $pecah["status_pembelian"]?>
				<br>
				<?php
				if (!empty($pecah['resi_pengiriman'])) : ?>
				No resi : <?php echo $pecah["resi_pengiriman"]?>
				<?php endif ?>	
				</td>
							
				<td>RP. <?php echo number_format($pecah["total_pembelian"])?></td>
							
				<td>
				<a href="nota.php?id=<?php echo$pecah["id_pembelian"] ?>"class="btn btn-info mt-2"  style="font-size: 15px;" >Nota</a>
				<?php if ($pecah['status_pembelian']=="pending"): ?>
				<a href="pembayaran.php?id=<?php echo$pecah["id_pembelian"] ?>"class="btn btn-success mt-2" style="font-size: 15px;">pembayaran</a>
						<?php else : ?>
				<a href="liatpembayaran.php?id=<?php echo$pecah["id_pembelian"]?>" class="btn btn-info mt-2" style="font-size: 15px;">Liat Pembayaran </a>
						<?php endif ?>
				</td>
				</tr>
						 
				<?php $nomor++;?>
				<?php } ?>
  		</tbody>
		</table>
  </div>
</div>
			</div>
		</div>
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
</body>
</html>