<?php
session_start();
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  /> 
</head>

<body style=" font-family: Candara; background-color:#EAEBEB"  >
  
<?php include 'menu.php'; ?>
<!-- akhir dari nav bar -->


<div class="animate__animated  animate__fadeInUp mt-3 ml-2 mr-2" >
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" align="center "  style="height:540px;" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="profil4.jpg" class="img-fluid mt-1 " alt="Responsive image"  style="height:540px; width:1200px; "alt="...">
      <div class="carousel-caption d-none d-md-block">  
      </div>
    </div>
    <div class="carousel-item">
      <img src="profil 2.jpg" class="img-fluid mt-1" alt="Responsive image"  style="height:540px; width:1200px; "  alt="...">
      <div class="carousel-caption d-none d-md-block">
    
      </div>
    </div>
    <div class="carousel-item">
      <img src="profil 1.jpg" class="img-fluid mt-1 " alt="Responsive image"  style="height:540px; width:1200px" alt="...">
      <div class="carousel-caption d-none d-md-block">
   
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


  
      <h4 class=" mt-5 ml-5" style="font-size: 30px;">Produk</h4>
      <hr class="mr-5 ml-5">
   <div class="container mx-auto animate__animated  animate__fadeInUp" >
        <div class="row mx-auto" >
        <?php 
         $batas = 8;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         $previous = $halaman - 1;
        $next = $halaman + 1;
        $data = mysqli_query($koneksi,"SELECT * from produk");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        $data_baju = mysqli_query($koneksi,"select * from produk limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
      
        while($perproduk = mysqli_fetch_array($data_baju))
          {    
    ?>
          <div class="card">
            <div class="img mx-auto">
            <img src="fotoproduk/<?php echo $perproduk['foto_produk'];?>"class="card-img-top"  alt="card card-img-top">
          </div>
         <div class="top-text ml-2 mt-1">
           <p class="card-text "><b><?php  echo $perproduk['nama_produk']; ?> </b></p>
           <p class="card-text" > Rp. <?php  echo number_format($perproduk['harga_produk']); ?></p>

          <div>
            <div class="bottom-text ml-4">
              <?php  if ($perproduk['stok']<1){
                echo "produk Kosong"; 
                }
                 else
                {?>
              <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>"   class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i> Beli</a> 
                <?php } ?>
               <a class="btn btn-outline-info"   href="detail.php?id=<?php echo $perproduk["id_produk"];?>"  >
          <i class="fas fa-info"></i> Detail </a>
       </div>
      </div>
      </div>
          </div>
         <?php } ?> 
     </div>
    </div>  

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