<h3>Tambah Data Blog</h3>
<hr>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Blog</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi Pendek</label>
		<textarea class="form-control" name="deskpen"></textarea>
	</div>
	<div class="form-group">
		<label>Deskripsi Panjang</label>
		<textarea class="form-control" name="deskpan" id="editor"></textarea>
	</div>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" name="tgl" class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button  class="btn btn-primary" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$blog->tambah_blog($_POST['nama'],$_POST['deskpen'],$_POST['deskpan'],$_POST['tgl'],$_FILES['foto']);
}
?>