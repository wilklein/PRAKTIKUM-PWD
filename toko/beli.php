<?php
session_start();
//mendapatkan id produk dari url
$id_produk=$_GET['id'];
//jika sudah ada produk dikerajnag maka produk di tambah 

if (isset($_SESSION['keranjang'][$id_produk])) 

{
	$_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu produk dibeli sAatu
else{
	$_SESSION['keranjang'][$id_produk]= 1;
}
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
//larikan ke halaman beranda
echo "<script> alert('produk berhasil ditambhakan ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";

?>