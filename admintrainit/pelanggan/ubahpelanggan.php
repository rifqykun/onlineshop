<?php 
$id = $_GET['id'];
$data_pelanggan = $pelanggan->ambil_pelanggan($id);
?>

<h2>Ubah data pelanggan</h2>
<hr>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $data_pelanggan['nama_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="alamat"><?php echo $data_pelanggan['alamat_pelanggan']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" value="<?php echo $data_pelanggan['telepon_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="<?php echo $data_pelanggan['email_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="pass" class="form-control" required="" placeholder="Wajib diisi">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<img src="../foto_pelanggan/<?php echo $data_pelanggan['foto_pelanggan'] ?>" width='200'>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-success" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$pelanggan->ubah_pelanggan($_POST['nama'],$_POST['alamat'],$_POST['telepon'],$_POST['email'],$_POST['pass'],$_FILES['foto'],$_GET['id']);

	echo "<script>alert('berhasil diubah'); location='index.php?halaman=pelanggan';</script>";
}
?>