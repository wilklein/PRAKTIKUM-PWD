
<?php
include 'koneksi.php';
?>

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
      <a class="nav-link active text-white" href="index.php"> <i class="fas fa-tachometer-alt mr-2 "></i> Dashboard</a><hr class="bg-secondary">
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
    <h3><i class="fas fa-tags mr-2"></i>  Detai Pembelian</h3><hr>
<?php

$ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php//print_r($detail);?></pre> -->


	<hr>

<div class="row">
    <div class="col-md-4"><h3> Pembelian</h3>
   <p> Tanggal : <?php echo $detail['tgl_pembelian'];?><br>
     Total Pembelian  : Rp. <?php echo number_format($detail['total_pembelian']);?><br>
     Status pembelian : <?php echo $detail["status_pembelian"];?>

   </p>

</div>

     <div class="col-md-4"><h3>Pelanggan</h3> 
  
    <strong>Nama Pelanggan : <?php echo $detail['nama_pelanggan'];?></strong> 
    <p> Nomor Telpn : <?php echo $detail['telpn_pelanggan'];?><br>
     Email :<?php echo $detail['email_pelanggan'];?></p>
    
    </div>

     <div class="col-md-4"><h3>Pengiriman</h3>
      <strong>Opsi Pengiriman : <?php echo $detail["nama_kota"]; ?></strong>
       <p>Biaya pengiriman : <?php echo number_format($detail['tarif']); ?><br>
        Alamat : <?php echo $detail["alamat_pengiriman"]; ?></p>

    </div>
  </div>
    <div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No </th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Jumlah Produk</th>
      <th>status pembelian</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
		<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['nama_produk'];?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']);?></td>
			<td><?php echo $pecah['jumlah'];?></td>
        <td><?php echo $detail['status_pembelian'];?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']);?></td>
		</tr>
		<?php $nomor++; ?>
	<?php }?>
	</tbody>
</table>
</div>
</div>
  </div>
  </div>
</div>





