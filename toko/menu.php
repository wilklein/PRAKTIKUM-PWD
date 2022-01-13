
<?php
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

<!--NAV bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info" >
  <a class="navbar-brand" href="#" style="color:  #223F38; " ><b style="font-family: Candara; font-size: 40px;">BagusDistro</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: Verdana;">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="index.php">Home  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="produk.php" style="color: black">Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="keranjang.php" style="color: black">Keranjang</a>
      </li>
        
        <li class="nav-item ">
        <a class="nav-link " href="checkout.php" style="color: black">Checkout</a>
         </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Akun
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <?php  if (isset($_SESSION["pelanggan"])): ?>
         <a class="dropdown-item" href="riwayat.php"  > <i class="fas fa-history"></i> Riwayat Belanja </a>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt "></i> Logout</a> 
             <?php else : ?>
          <a  class="dropdown-item" href="login.php"  ><i class="fas fa-user"></i> Login</a> 
                  <?php endif  ?> 
           <a  class="dropdown-item" href="daftar.php  "  ><i class="fas fa-user-plus"></i> Daftar</a> 
        </div>
      </li>
     
    </ul>
     <form action="pencarian.php" class="form-inline my-2 my-lg-0" method="get">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                 <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
        </form>
  </div>
</nav>
   <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>
