<h3>Ubah Data Pengaturan</h3>
<hr>
<?php 
$idpengaturan =  $_GET['id'];

$datapengaturan = $pengaturan->ambil_pengaturan($idpengaturan);
?>

<form method="post">
	<div class="form-group">
		<label>Kolom</label>
		<input type="text" class="form-control" value="<?php echo  $datapengaturan['kolom']; ?>" readonly>
	</div>
	<div class="form-group">
		<label>Isi</label>
		<textarea class="form-control" name="isi"><?php echo $datapengaturan['isi']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php 
if (isset($_POST['ubah'])) 
{
	$pengaturan->ubah_pengaturan($_POST['isi'],$idpengaturan);

	echo "<script>alert('Data Berhasil Diubah'); location='index.php?halaman=pengaturan';</script>";
}
?>