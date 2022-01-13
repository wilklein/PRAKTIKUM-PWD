<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silakan login ')</script>";
	echo "<script>location='login.php'</script>";
	exit();
}

//mendapatkan id pembelian dari url
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem=$ambil->fetch_assoc();
//mendapatakan id pelanggan yang beli
$id_pelangganbeli = $detpem["id_pelanggan"];
$id_pelangganlogin=$_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelangganlogin!==$id_pelangganbeli) {
	echo "<script>alert('Bukan data anda ')</script>";
	echo "<script>location='riwayat.php'</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pemayaraan</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.1-web/css/all.min.css"> 
 
</head>
<body>


	<?php include'menu.php';?>
	<div class="container" style="font-family: sans-serif;">	
	
		<h2>Konfirmasi pembayaran</h2>
		<p>Kirim Bukti Pembayaran Anda Disni</p>
		<div class="alert alert-info"> total tagihan : <strong>Rp. <?php echo number_format($detpem["total_pembelian"])?> </strong>
		</div>

			<form method="post"  enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama peneytor :</label>
				<input type="text" class="form-control" name="nama" required>
			</div>

			<div class="form-group">
					<label>Bank :</label>
					<input type="text" class="form-control" name="bank" required>
			</div>

			<div class="form-group">
					<label>Jumlah :</label>
					<input type="number" class="form-control" name="jumlah" min="1">
			</div>

			<div class="form-group">
					<label>Bukti foto :</label>
					<input type="file" class="form-control" name="bukti" required><p class="text-danger"  >foto bukti harus JPG maksimal 2mb</p>
			</div>

				<button class="btn btn-outline-primary" name="kirim"> kirim</button>
				<br>
			</form>
	</div>

	<br>


	<?php
				if (isset($_POST["kirim"])) 
				{
					$namabukti=$_FILES["bukti"]["name"];
					$lokasibukti=$_FILES["bukti"]["tmp_name"];
					$namafiks=date("YmdHis").$namabukti;
					move_uploaded_file($lokasibukti, "buktipembayaran/$namafiks");


					$nama=$_POST["nama"];
					$bank=$_POST["bank"];
					$jumlah=$_POST["jumlah"];
					$tanggal=date("Y-m-d");

						//simpan pembayaran
					$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

					//ipdate pemabyaran
					$koneksi->query("UPDATE pembelian SET status_pembelian='sudah melakukan pembayaran' WHERE id_pembelian='$idpem'");

					echo "<script>alert('upload data  bukti Pembayaran sukses ')</script>";
					echo "<script>location='riwayat.php'</script>";
			}
	?>


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