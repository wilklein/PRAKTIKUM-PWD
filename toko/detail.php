<?php  session_start(); ?>
<?php  include 'koneksi.php'; ?>
<?php 
//mendapatkan id produk
	$id_produk =$_GET["id"];
//query ambil data
	$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$detail = $ambil->fetch_assoc();
//echo "<pre>";
//echo print_r($detail);
//echo "</pre>";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>detail produk</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css">
			  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  /> 
</head>
<body>
	<!--navbar -->
<?php include 'menu.php' ?>

<section class="kontent mt-5 mb-4"style="font-family: Verdana; " >
		<div class="container" >	
		<div class="row animate__animated  animate__fadeInUp" >
<div class="card shadow" style="max-width: 100%;">
 		 <div class="row no-gutters">
    	<div class="col-md-4">
      	<img style="width: 100%;" src="fotoproduk/<?php echo $detail['foto_produk'] ?>" class="card-img" alt="..."  >
    	</div>

    <div class="col-md-8" style="width: 80%;" >
      <div class="card-body">
        <h5 class="card-title" align="center ">Detail Produk</h5>
        <hr style="width: 200px;">

        <?php echo $detail["nama_produk"]; ?>
        <h6>Harga : Rp. <?php echo number_format($detail["harga_produk"]); ?> </h6> 
<h6>stok : <?php 
		if ($detail['stok']>=1) {
			echo $detail['stok'];?> </h6>
	<?php	}else 
			echo "produk kosong";
	?>
       <?php if ($detail['stok']<1)
       		{
			echo "produk tidak tersedia"; 
			}
    		else {?>
    		<form method="post" >
				<div class="form-group">
  					<label>Masukan Jumlah yang ingin  di beli</label>
    				<div class="input-group" >
    				<div class="input-group-prepend">
    				<div class="input-group-text" ><i class="fas fa-shopping-cart"></i></div>
    				</div>
    				<input type="number" min="1"  name="jumlah" class="form-control" placeholder=" beli" max="<?php echo $detail['stok'];?>">
    				<button class="btn btn-outline-success" name="beli">beli</button>
    		</form>

    					<?php } ?>
				</div>
				<br>
			<p class="card-text ml-3" ><b>Deskripsi</b><p class="ml-3"> <?php echo  $detail["deskripsi"];  
			?>
			</p>
  	</div>
 <div>
			 
			</div>
      </div>
    </div>
  </div>
</div>


			<?php
			//jk ada tombol beli
		if (isset($_POST["beli"]))
		{
		//medpatkan jumlah yg diinputkan
		$jumlah=$_POST["jumlah"]; 
		if ($_POST["jumlah"]==0) 
		{
		echo "<script> alert('produk gagal ditambahkan');</script>";
		echo "<script>location='index.php';</script>";
		}
		else{			
		//masukan kerajangan
		$_SESSION["keranjang"][$id_produk]= $jumlah;
		echo "<script> alert('produk telah ditambahkan ke keranjang');</script>";
		echo "<script>location='keranjang.php';</script>";
		}	}
		    ?>
<br>

			</div>
		</div>
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

</html>