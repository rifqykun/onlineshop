<?php 
include 'config/class.php';
$data_pembelian = $pembelian->ambil_pembelian($_GET['id']);
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_pembelian = $pembelian->tampil_keranjang();

if (!isset($_GET['id'])) 
{
	echo "<script>alert('Silahakan lakukan transaksi'); location='produk.php';</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

	<div class="container">
		<h3>Konfirmasi Pembayaran</h3>
		<form method="post" enctype="multipart/form-data">
			<br><br>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" class="form-control">
				<p class="text-danger">Nama Pemilik Rekening</p>
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" name="bank" class="form-control">
			</div>
			<div class="form-group">
				<label>Tanggal Bayar</label>
				<input type="date" name="tanggalbayar" class="form-control">
			</div>
			<div class="form-group">
				<label>Total Bayar</label>
				<input type="text" name="total" class="form-control" value="<?php echo $data_pembelian['total_pembelian'] ?>" readonly>
			</div>
			<div class="form-group">
				<label>Bukti Pembayaran</label>
				<input type="file" name="bukti" class="form-control">
			</div>
			<button class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
			<br><br>
		</form>
		<?php 
			if (isset($_POST['konfirmasi'])) 
			{
				$status="terbayar";
				$pembelian->simpan_pembayaran($_POST['nama'],$_POST['bank'],$_POST['tanggalbayar'],$_POST['total'],$_FILES['bukti'],$status,$_GET['id']);
			}
		 ?>
	</div>


	<?php 
	include 'footer.php'; ?>

</body>
</html>