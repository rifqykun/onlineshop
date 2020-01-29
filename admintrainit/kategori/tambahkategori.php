<h2>Tambah Data Kategori</h2>
<form method="post" enctype="multipart/data-form">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="namakategori" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<select class="form-control" name="jenis">
			<option>--Pilih Jenis--</option>
			<option value="laptop">Laptop</option>
			<option value="pc">PC</option>
		</select>
	</div>
	<button class="btn btn-success" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$kategori->tambah_kategori($_POST['namakategori'],$_POST['jenis']);

	echo "<script>alert('Berhasil menyimpan'); location='index.php?halaman=kategori'</script>";
}
?>