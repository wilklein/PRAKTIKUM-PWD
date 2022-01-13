<?php
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");
echo "<script>alert('data pembelian Berhasil dihapus '); </script>";
echo "<script>location='pembelian.php'; </script>";
?>