<?php
session_start();
//koneksi ke data basae
$koneksi = new mysqli("localhost","root","","toko_baju");

if (!isset($_SESSION['admin'])) {
  echo "<script> alert('anda Harus Login');</script>";
 echo "<script> location='login.php'</script>";
 header('location:login.php');
 exit();
}

?>
<!DOCTYPE html>
<html  >
<head>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
  <link rel="stylesheet" type="text/css" href="admin.css">
   
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN |<b>Bagus Distro</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


      <div class="icon ml-auto">
        <h5>
          
              <a href="logout.php"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Logout"style="color:red;"> logout</i></a> 
        </h5>  
      </div>
  </div>
</nav> 

<div class="row no no-gutters ">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
    <li class="nav-item">
      <a class="nav-link  text-white" href="index.php"> <i class="fas fa-tachometer-alt mr-2 "></i> Dashboard</a><hr class="bg-secondary">
    </li>

    <li class="nav-item">
      <a class="nav-link text-white" href="produk.php"><i class="fab fa-product-hunt mr-2"></i> Produk</a><hr class="bg-secondary">
    </li>

    <li class="nav-item">
      <a class="nav-link text-white" href="pembelian.php"><i class="fas fa-tags mr-2"></i> Pembelian</a><hr class="bg-secondary">
    </li>

    <li class="nav-item">
      <a class="nav-link text-white" href="pelangan.php"><i class="fas fa-users mr-2"></i> Pelanggan</a><hr class="bg-secondary">
    </li>

    </ul>
    
  </div>
  <div class="col-md-10 p-5 pt-1">
    <h3><i class="fas fa-tachometer-alt mr-2 "></i>Dashboard</h3><hr>

    <div class="row text-white">
   
      <div class="card bg-info ml-5 mt-2" style="width: 18rem;">
      <div class="card-body">
           <div class="card-body-icon">
        <i class="fas fa-users mr-2"></i>
      </div>
       <h5 class="card-title">Jumlah Pelanggan</h5>
       <?php
        $data_barang = mysqli_query($koneksi,"SELECT * from pelanggan");
       $jumlah_barang = mysqli_num_rows($data_barang);
       ?>
       <div class="display-4"><?php echo $jumlah_barang; ?></div>
       <a href="pelangan.php"> <p class="card-text text-white">Liat Detail<i class="fas fa-angle-double-right ml-2 mt-2" ></i></p></a>
      </div>
</div>

  <div class="card bg-success ml-5 mt-2" style="width: 18rem;">
      <div class="card-body">
      <div class="card-body-icon">
       <i class="fas fa-tags mr-2"></i>
     </div>
       <h5 class="card-title">Jumlah Pembelian</h5>
        <?php
        $data_barang = mysqli_query($koneksi,"SELECT * from pembelian");
       $jumlah_barang = mysqli_num_rows($data_barang);
       ?>
       <div class="display-4"><?php echo $jumlah_barang; ?></div>
       <a href="pembelian.php"> <p class="card-text text-white">Liat Detail<i class="fas fa-angle-double-right ml-2" ></i></p>
       </a>
      </div>
</div>


<div class="card bg-danger ml-5 mt-2" style="width: 18rem;">
      <div class="card-body">
           <div class="card-body-icon">
     <i class="fab fa-product-hunt mr-2"></i>
   </div>
       <h5 class="card-title">Jumlah Produk</h5>
       <?php
        $data_barang = mysqli_query($koneksi,"SELECT * from produk");
       $jumlah_barang = mysqli_num_rows($data_barang);
       ?>
       <div class='display-4'><?php echo $jumlah_barang; ?></div>
       <a href="produk.php"> <p class="card-text text-white">Liat Detail<i class="fas fa-angle-double-right ml-2" ></i></p></a>
      </div>
    </div>


<div class="card bg-warning ml-5 mt-2" style="width: 18rem;">
      <div class="card-body">
           <div class="card-body-icon">
     <i class="fab fa-product-hunt mr-2"></i>
   </div>
       <h5 class="card-title">Jumlah Pembayaran</h5>
       <?php
        $data_barang = mysqli_query($koneksi,"SELECT * from pembayaran");
       $jumlah_barang = mysqli_num_rows($data_barang);
       ?>
       <div class='display-4'><?php echo $jumlah_barang; ?></div>
       <a href="pembelian.php"> <p class="card-text text-white">Liat Detail<i class="fas fa-angle-double-right ml-2" ></i></p></a>
      </div>
    </div>





    </div>
</div>

   <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
 <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.css"></script>
    
   
</body>
</html>
