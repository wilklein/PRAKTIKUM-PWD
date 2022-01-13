<?php
session_start();
//koneksi ke data basae
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <!-- Bootstrap CSS -->
    <title>BagusDistro</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="fontawesome-free/js/6b1befa562.js" ></script>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css">  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  
  <link rel="stylesheet" type="text/css" href="produk.css">
  </head>
<body >

<!-- Pemanggilan nav bar -->
<?php include 'menu.php';?> 

	<h1 class="animate__animated  animate__fadeInUp mt-4 ml-5 mr-5" style="font-size: 25px;">Produk</h1>
	<hr class="ml-5 mr-5" >
	<div class="alert alert-info ml-5 mr-5 animate__animated  animate__fadeInUp">Silahkan cek stok barang terlebih dahulu Pada detai produk sebelum melakukan pembelian !!</div>

<div class="container mx-auto animate__animated  animate__fadeInUp" >
			<div class="row mx-auto" >	
		<!-- membuat menu paging -->
<?php 
			$batas = 8;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                $previous = $halaman - 1;
				$next = $halaman + 1;
            	$data = mysqli_query($koneksi,"SELECT * from produk");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
				$data_produk = mysqli_query($koneksi,"select * from produk limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
			
				while($perproduk = mysqli_fetch_array($data_produk))
                {    
    ?>        
<!-- menampilkan produk -->
				
			<div class="card">
			<div class="img mx-auto">
  			<img src="fotoproduk/<?php echo $perproduk['foto_produk'];?>" >
  			</div>
  			<div class="top-text">
    		<p class="card-text mt-3 ml-2"><b><?php  echo $perproduk['nama_produk']; ?> </b></p>
    		<p class="card-text ml-2" > Rp. <?php  echo number_format($perproduk['harga_produk']); ?></p>

    		
    		<div>

    		<div class="bottom-text ml-4">
    		<?php  if ($perproduk['stok']<1){
							echo "produk Kosong"; 
					} 
					else{?>
    			<a href="beli.php?id=<?php echo $perproduk['id_produk'];?> " name="beli"   class="btn btn-outline-success ">
    				<i class="fas fa-shopping-cart"></i> Beli
    			</a> 
                <?php } ?>
				<a href="detail.php?id=<?php echo $perproduk["id_produk"];?>" name="detail" class="btn btn-outline-info " >
				<i class="fas fa-info mx-auto"></i> Detail </a>
			</div>
			</div>
			</div>
					</div>
				 <?php } ?>				
		</div>
		</div>	

		<nav>
			<ul class="pagination justify-content-center mt-3 mb-4 animate__animated  animate__fadeInUp">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>> << </a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>> >> </a>
				</li>
			</ul>
		</nav>





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
          			<h6 class="text-uppercase font-weight-bold">Toko</h6>
          				<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto " style="width: 125px; height: 2px;">
          				<p class="mt-2">toko ini menjual baju kaos distro, kemeja,crewneck,jaket, hoodie dan lain-lainnya
                  </p>
                  
          		</div>

        		<div class="col-md-3 mx-auto mb-4">
         			 <h6 class="text-uppercase font-weight-bold">PRODUCT</h6>
         				 <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto " style="width: 85px; height: 2px;">
          					<ul class="list-unstyled">
          						<li class="my-2">- Baju Kaos</li>
          						<li class="my-2">- Hoodie</li>
          						<li class="my-2">- Baju Kemeja</li>
								<li class="my-2">- crewneck</li>
        					</ul>
          		</div>

          		<div class="col-md-3 mx-auto mb-4">
          			<h6 class="text-uppercase font-weight-bold">Contact</h6>
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