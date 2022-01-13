<?php  

session_start();
include 'koneksi.php';

 ?>

<!DOCTYPE html>
<html>
<head>
 		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />  
</head>
<body>
	 <?php include 'menu.php';?>  
	<hr>

		<section class="konten" style="font-family: Geneva;">
				<div class="container " >

				<!--menangkap keyword yang dimasukan user-->
				<?php
				$keyword=$_GET["keyword"];
				$semuadata=array();
				$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '$keyword%' OR deskripsi LIKE '%$keyword'");
				while ($pecah=$ambil->fetch_assoc()) 
				{
					$semuadata[]=$pecah;
				}
				?>

				<!--menampilkan hasil pencarian user -->
				<h5 class=" animate__animated  animate__fadeInUp mt-5">Hasil Pencarian : <?php echo $keyword; ?> </h5>
				<?php if (empty($semuadata)): ?>
					<div class="alert alert-danger  animate__animated  animate__fadeInUp">Pencarian Produk  <b><?php echo $keyword; ?></b> !! tidak ditemukan</div>
				<?php endif ?>
				<hr>
					<div class="row  animate__animated  animate__fadeInUp">
						<?php  foreach ($semuadata as $key => $value) : ?>
			<div class="col-md-3">
					<div class="card shadow" style="height: 98%;">
  							<img src="fotoproduk/<?php echo $value['foto_produk'];?>"class="card-img-top" alt="card card-img-top">
  			<div class="card-body">
    				<p class="card-text"><b><?php  echo $value['nama_produk']; ?> </b></p>
    				<p class="card-text" > Rp. <?php  echo number_format($value['harga_produk']); ?></p>
    		<div>
    		<div>
    			<a href="beli.php?id=<?php echo $value['id_produk'];?>" class="btn btn-outline-success">Beli</a>
				<a class="btn btn-outline-info"   href="detail.php?id=<?php echo $value["id_produk"];?>"  >Detail </a>
			</div>
			</div>
			</div>
			</div>
			</div>
						<?php  endforeach  ?>
			</div>
			</div>			

	</section>

	

   	</body>
   	 
	</html>
