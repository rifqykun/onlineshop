<?php 
include 'config/class.php';
$id = $_GET['id'];
$data_pembayaran = $pembelian->ambil_pembayaran($id);
$data_pengaturan=$pengaturan->tampil_pengaturan();
$data_pembelian = $pembelian->tampil_keranjang();

?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
	<title></title>
</head>
<body>
	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<table class="table table-striped">
					<tr>
						<th>Nama Pengirim</th>
						<td><?php echo $data_pembayaran['nama']; ?></td>
					</tr>
					<tr>
						<th>Nama Bank</th>
						<td><?php echo $data_pembayaran['bank']; ?></td>
					</tr>
					<tr>
						<th>Tanggal Pembayaran</th>
						<td><?php echo date("d F Y", strtotime($data_pembayaran['tanggal_bayar'])); ?></td>
					</tr>
					<tr>
						<th>Tanggal Konfirmasi</th>
						<td><?php echo date("d F Y", strtotime($data_pembayaran['tanggal_konfirmasi'])); ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($data_pembayaran['jumlah']); ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="bukti_pembayaran/<?php echo $data_pembayaran['bukti']; ?>" class="img-responsive">
			</div>


		</div>

	</div>
	<br><br><br><br>
	<?php 
	include 'footer.php'; ?>

</body>
</html>