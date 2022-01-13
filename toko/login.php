<?php
session_start();
//koneksi ke data basae
$koneksi = new mysqli("localhost", "root", "","toko_baju");
?>

<!DOCTYPE html>
<html>
		<head>
	<title>Login Pelangan</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css">
	 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />  
  <link rel="stylesheet" type="text/css" href="login.css">
	</head>
<body >

	<?php include 'menu.php';?>
		<!--navbar -->
<div class="container" style="font-family: Geneva;">
	<h2 class="text-center animate__animated  animate__fadeInUp mt-5"> Halaman Login</h2>
	<hr>
<form method="post" enctype="multipart/from-data">

  <div class="form-group animate__animated  animate__fadeInUp"  >
    	<label>Masukan email </label>
    	<div class="input-group animate__animated  animate__fadeInUp" >
    		<div class="input-group-prepend">
    		<div class="input-group-text" ><i class="fas fa-user"></i></div>
    		</div>
   	 	<input type="email"  name="email" class="form-control" placeholder=" Masukan Email">
		</div>
  </div>

  <div class="form-group animate__animated  animate__fadeInUp">
    <label >Password</label>
    <div class="input-group animate__animated  animate__fadeInUp" >
    	<div class="input-group-prepend">
    		<div class="input-group-text" ><i class="fas fa-unlock-alt" ></i></div>
    	</div>
   		 <input type="password" name="password" class="form-control"  placeholder="Password">
  </div>
</div>

  <div align ="center">
  	<button class="btn btn-primary mr-3" name="login">Login </button>

  <button class="btn btn-danger" type="reset" value="Reset Form">Reset </button>
</div>
</form>
</div>

<br>

<?php
//jika ada tombl simpan yang ditekan 
if (isset($_POST["login"])) 
{
//jika tombol simpan ditekan 
$email = $_POST["email"];
$password = $_POST["password"];

//mengecek akun di databe
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	//menghitung akun yang terambil
	$akunyangcocok = $ambil->num_rows;
	//jika 1 akun ada yang cocok maka login
	if ($akunyangcocok==1) 
	{
		//anda sudah loginn
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//simpan disession pelangan
		$_SESSION["pelanggan"]=$akun;
		echo "<script> alert('anda suskes login ');</script>";
		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
		{
			echo "<script> location='checkout.php';</script>";
		}
		elseif (isset($_SESSION["keranjang"]) OR empty($_SESSION["keranjang"]) ) {
			echo "<script> location='produk.php';</script>";
		}
		else{
	
		
		}
	}
	else
	{
		// anda gagal login
		echo "<script> alert('anda gagal login, periksa kembali');</script>";
		echo "<script> location='login.php';</script>";
	}
		
}

?>

<?php
if (isset($_POST["daftar"])) 
{
//jika tombol simpan ditekan 
$email = $_POST["email"];
$password = $_POST["password"];

//mengecek akun di databe
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	//menghitung akun yang terambil
	$akunyangcocok = $ambil->num_rows;
	//jika 1 akun ada yang cocok maka login
	if ($akunyangcocok==1) 
	{
		//anda sudah loginn
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//simpan disession pelangan
		$_SESSION["pelanggan"]=$akun;
		echo "<script> alert('anda suskes login ');</script>";
		echo "<script> location='checkout.php';</script>";

	}
	else
	{
		// anda gagal login
		echo "<script> alert('anda gagal login, periksa kembali');</script>";
		echo "<script> location='login.php';</script>";
	}
		
}

?>
</body>

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


