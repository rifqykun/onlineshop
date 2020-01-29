<?php 
include 'config/class.php';
$id = $_GET['id'];
$detail_pelanggan = $pelanggan->ambil_pelanggan($id);
$data_pembelian = $pembelian->tampil_keranjang();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Warung Rifqy</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
	<title>Registrasi</title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

	<div class="container">
		<h2>Ubah data pelanggan</h2>
<hr>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $detail_pelanggan['nama_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="alamat"><?php echo $detail_pelanggan['alamat_pelanggan']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" value="<?php echo $detail_pelanggan['telepon_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="<?php echo $detail_pelanggan['email_pelanggan'] ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="pass" class="form-control" required="" placeholder="Wajib diisi">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<img src="foto_pelanggan/<?php echo $detail_pelanggan['foto_pelanggan'] ?>" width='200'>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-success" name="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$pelanggan->ubah_pelanggan($_POST['nama'],$_POST['alamat'],$_POST['telepon'],$_POST['email'],$_POST['pass'],$_FILES['foto'],$_GET['id']);

	echo "<script>alert('berhasil diubah'); location='member.php';</script>";
}
?>
	</div>

	<?php 
	include 'footer.php'; ?>
</body>
</html>