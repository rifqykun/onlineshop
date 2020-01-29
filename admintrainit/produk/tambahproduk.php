<?php 
$datakategori = $kategori->tampil_kategori();
?>
<pre><?php print_r($datakategori); ?></pre>
<h2>Tambah Data Produk</h2>
<hr>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-8">
			<select class="form-control" name="id_kategori">
				<option>Pilih Kategori</option>
				<?php foreach ($datakategori as $key => $value): ?>
					<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?>-<?php echo $value['jenis_kategori']; ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Nama Produk</label>
		<div class="col-md-8">
			<input type="text" name="nama" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Harga</label>
		<div class="col-md-8">
			<input type="text" name="harga" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Berat</label>
		<div class="col-md-8">
			<input type="text" name="berat" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Deskripsi</label>
		<div class="col-md-8">
			<textarea class="form-control" name="desk"></textarea>
		</div>
	</div>
	<div class=" form-group">
		<label class="col-md-2 control-label">Foto Produk</label>
		<div class="col-md-8">
			<input type="file" name="foto">
		</div>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<button class="btn btn-primary" name="simpan">Simpan</button>
	</div>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$produk->simpan_produk($_POST['id_kategori'],$_POST['nama'],$_POST['harga'],$_POST['berat'],$_POST['desk'],$_FILES['foto']);

	echo "<script>alert('Berhasil menyimpan'); location='index.php?halaman=produk';</script>";
}
?>