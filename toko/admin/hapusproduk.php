<?php
include 'koneksi.php';


$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk= $pecah['foto_produk'];
if (file_exists("../fotoproduk/$fotoproduk"))
{
	unlink("../fotoproduk/$fotoproduk");
}
$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('produk terhapus '); </script>";
echo "<script>location='produk.php'; </script>";
?>