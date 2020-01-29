<?php 
$id = $_GET['id'];

$data_kategori = $kategori->ambil_kategori($id);
?>
<h2>Ubah Kategori</h2>
<hr>
<form method="post">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $data_kategori['nama_kategori'] ?>">
	</div>
	<div class="form-group">
		<select class="form-control" name="jenis">
			<option>--Pilih Kategori--</option>
			<option value="laptop" <?php if ($data_kategori['jenis_kategori']=='laptop') {echo "selected";
		} ?>>Laptop</option>
		<option value="pc" <?php if ($data_kategori['jenis_kategori']=='pc') {echo "selected";
	} ?>>PC</option>
</select>
</div>
<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) 
{
	$kategori->ubah_kategori($_POST['nama'],$_POST['jenis'],$id);
	echo "<script>alert('Data berhasil diubah'); location='index.php?halaman=kategori';</script>";
}
?>