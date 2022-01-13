<h2>ubah produk</h2>
<?php
include 'koneksi.php';
 $ambil=$koneksi->query("SELECT * from produk  WHERE id_produk='$_GET[id]'"); 
$pecah=$ambil->fetch_assoc();?>
<form  method="post" enctype="multipart/form-data " >
		<div class="form-group">
		<label>Nama produk </label>
		<input type="text " name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
		</div>
		<br>

		<div class="form-group">
		<label>Harga Rp </label>
		<input type="number " name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?> ">
		</div>
		<br>

		<div class="form-group">
		<label>Berat Gr </label>
		<input type="number " name="berat" class="form-control" value="<?php echo $pecah['berat_produk'];?>">
		</div>
		<br>

		<div class="form-group">
		<label>Stok</label>
		<input type="number " name="stok" class="form-control" value="<?php echo $pecah['stok'];?>">
		</div>

		<br>
	
		<div class="form-group">
		<img src="../gambar/<?php echo $pecah['foto_produk'] ?>" width="200" >
		</div>
		<br>
		<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
		</div>	
		<div class="form-group">
		<label> Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"> <?php echo $pecah['deskripsi'];?> </textarea>
		</div>
		<br>

		<button class="btn btn-primary"  name="simpan" >Ubah</button>
	</form>
	<?php
$koneksi =mysqli_connect("localhost", "root", "","toko_baju");
if (isset($_POST['simpan']))

 {	
	 $nama=$_FILES ['foto']['name'];
	 $folder =$_FILES['foto']['tmp_name']; 

	move_uploaded_file($folder, "../fotoproduk/$nama");
	//jika foto dirubah
	if (!empty($lokasi))
	{
		move_uploaded_file($folder, "../fotoproduk/$foto");


		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$foto',deskripsi='$_POST[deskripsi]',stok='$_POST[stok]' WHERE id_produk='$_GET[id]'");
			echo "<script>alert('data produk telah diubah');</script>";
			echo "<script>location='produk.php';</script>";
	}
}?>