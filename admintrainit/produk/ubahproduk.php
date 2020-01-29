<h2>Ubah Data Produk</h2>
<hr>
<?php 
$idproduk = $_GET['id'];

$dataproduk = $produk->ambil_produk($idproduk);
$datakategori = $kategori->tampil_kategori();
?>

<pre><?php print_r($dataproduk); ?></pre>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-8">
			<select class="form-control" name="idkate">
				<option>--Pilih Kategori--</option>
				<?php foreach ($datakategori as $key => $value): ?>
					<option value="<?php echo $value['id_kategori'] ?>" <?php if ($value['id_kategori']==$dataproduk['id_kategori']) {echo "selected";} ?>><?php echo $value['nama_kategori']; ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Nama Produk</label>
		<div class="col-md-8">
			<input type="text" name="nama" class="form-control" value="<?php echo $dataproduk['nama_produk']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Harga</label>
		<div class="col-md-8">
			<input type="text" name="harga" class="form-control" value="<?php echo $dataproduk['harga_produk']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Berat</label>
		<div class="col-md-8">
			<input type="text" name="berat" class="form-control" value="<?php echo $dataproduk['berat_produk']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Deskripsi</label>
		<div class="col-md-8">
			<textarea class="form-control" name="desk"><?php echo $dataproduk['deskripsi_produk']; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Foto</label>
		<div class="col-md-8">
			<img src="../foto_produk/<?php echo $dataproduk['foto_produk']; ?>" width="200">
			<input type="file" name="foto" class=" form-control">
		</div>
	</div>
	<div class="col-md-2 col-md-offset-2">
		<button class="btn btn-primary" name="simpan">Simpan</button>
	</div>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$produk->ubah_produk($_POST['idkate'],$_POST['nama'],$_POST['harga'],$_POST['berat'],$_POST['desk'],$_FILES['foto'],$_GET['id']);

	echo "<script>alert('Produk berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>