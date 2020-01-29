<h2>Tambah Pelanggan</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="alamat"></textarea>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class=" form-group">
		<label>Password</label>
		<input type="text" name="pass" class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-success" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$pelanggan->tambah_pelanggan($_POST['nama'],$_POST['alamat'],$_POST['telepon'],$_POST['email'],$_POST['pass'],$_FILES['foto']);

	echo "<script>alert('berhasil menyimpan data'); location='index.php?halaman=pelanggan';</script>";
}
?>