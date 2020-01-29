<?php 
include 'config/class.php';
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_pembelian = $pembelian->tampil_keranjang();
if (!isset($_SESSION['pelanggan'])) 
{
	echo "<script>alert('Silahkan login terlebih dulu'); location='login.php'</script>";
}
?>
<!--  -->

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
	<title></title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

	<section class="content">
		<div class="container">
			<?php if (isset($_SESSION['keranjang'])): ?>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Berat</th>
					<th>Jumlah</th>
					<th>Sub Berat</th>
					<th>Sub Harga</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $total_belanja=0; ?>
				<?php foreach ($data_pembelian as $key => $value): ?>
					<?php $total_belanja+=$value['sub_harga']; ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['nama_produk']; ?></td>
					<td>Rp. <?php echo number_format($value['harga_produk']); ?></td>
					<td><?php echo $value['berat_produk']; ?></td>
					<td><?php echo $value['jumlah_produk']; ?></td>
					<td><?php echo $value['sub_berat']; ?></td>
					<td>Rp. <?php echo number_format($value['sub_harga']); ?></td>
					<td>
						<a href="hapus_keranjang.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="6">Total Belanja</th>
					<td>Rp. <?php echo number_format($total_belanja); ?></td>
				</tr>
			</tfoot>
		</table>
		<a href="produk.php" class="btn btn-primary">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-info">Checkout</a>
		<br>
		<br>
				<?php else: ?>
					<div class="alert alert-danger">Belum ada Produk disimpan</div>
			<?php endif ?>
		</div>
	</section>
	<?php 
	include 'footer.php'; ?>

</body>
</html>