<?php
session_start();
include 'koneksi.php';
?>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 			  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  /> 




<body style="background-color: #FDF5E6 font-size: 10px;font-family: Geneva">
<?php include 'menu.php';?>
<hr>

<div class="container" style="font-family: Geneva;">
	<h3 class="alert alert-primary animate__animated  animate__fadeInUp mt-5" align="center">Pendaftaran</h3>
<form method="post" class="animate__animated  animate__fadeInUp">
	<div class="form-group">
		<label>Nama lengkap</label>
		<input type="text" name="nama" class="form-control" placeholder="Masukan nama" required>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" placeholder="Email" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" required>
	</div>
		<div class="form-group">
		<label>No telpon</label>
		<input type="text" name="telpn" class="form-control" placeholder="No Telpon" required>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" rows="5"placeholder="masukan Alamat " name="alamat" required ></textarea>
	</div>
	<div class="form-group">
	<button class="btn btn-outline-primary"name="daftar"> Daftar </button>
</form>
</div>



</div>
</div>

</form>
</div>
</div>
</div>
</div>

</div>
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

<?php
if (isset($_POST["daftar"]))
{
//menggambil issian nama email dll
	$nama=$_POST["nama"];
	$email=$_POST["email"];
	$telpn=$_POST["telpn"];
	$password=$_POST["password"];
	$alamat=$_POST["alamat"];
	
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
$yangcocok = $ambil->num_rows;
if($yangcocok==1)
	{
	echo "<script>alert('Pendaftaran gagal,email telah terdafatar');</script>";
	echo "<script>location='daftar.php';</script>";
	}
else
{
	$koneksi->query("INSERT INTO pelanggan 
		(email_pelanggan,password_pelanggan,nama_pelanggan,telpn_pelanggan,alamat)
		VALUES ('$email','$password','$nama','$telpn','$alamat')");
		echo "<script>alert('selamat anda berhasil mendaftar');</script>";
		echo "<script>location='login.php';</script>";
}
}
?>




