<?php 
include 'config/class.php';
$id_pembelian = $_GET['id'];

$produkpembelian = $pembelian->tampil_produk_pembelian($id_pembelian);
$data_pembelian = $pembelian->tampil_keranjang();


$detail = $pembelian->ambil_pembelian($id_pembelian);
$data_pengaturan = $pengaturan->tampil_pengaturan();
if ($_SESSION['pelanggan']['id_pelanggan']!==$detail['id_pelanggan']) 
{
	echo "<script>alert('Silahkan transaksi terlebih dahulu'); location='produk.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Warung Rifqy</title>
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
		<div class="row">
			<div class="col-md-4">
				<h3>Pembelian</h3>
				<p>No:	<?php echo $detail['id_pelanggan']; ?></p>
				<p>Tanggal:	<?php echo $detail['tanggal_pembelian']; ?></p>
				<p>Status:	<span class="btn btn-danger btn-xs"><?php echo $detail['status_pembelian']; ?></span></p>
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<p>Pelanggan: <?php echo $detail['nama_pelanggan']; ?></p>
				<p>Email: <?php echo $detail['email_pelanggan']; ?></p>
				<p>Telepon: <?php echo $detail['telepon_pelanggan']; ?></p>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				<p>
					<?php echo $detail['tipe']; ?>
					<?php echo $detail['distrik']; ?>
					<?php echo $detail['provinsi']; ?>
					<?php echo $detail['kodepos_pengiriman']; ?>
				</p>
				<p>Nama Penerima: <?php echo $detail['nama_penerima']; ?></p>
				<p>Telepon: <?php echo $detail['telepon_penerima']; ?></p>
				<p>Alamat: <?php echo $detail['alamat_penerima']; ?></p>
				<p>
					Paket Pengiriman: <?php echo $detail['paket_pengiriman']; ?>,
					<?php echo $detail['ekspedisi_pengiriman']; ?>
					<?php echo $detail['lama_pengiriman']; ?> hari.
				</p>
			</div>
		</div>

		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Berat</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subberat</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($produkpembelian as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_produk']; ?></td>
						<td><?php echo $value['berat_produk']; ?> gram</td>
						<td>Rp. <?php echo number_format($value['harga_produk']); ?></td>
						<td><?php echo $value['jumlah_produk']; ?></td>
						<td><?php echo $value['berat_produk']; ?> gram</td>
						<td>Rp. <?php echo number_format($value['subharga_produk']); ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="6">Total Belanja</th>
					<th>Rp. <?php echo number_format($detail['total_belanja']); ?></th>
				</tr><tr>
					<th colspan="6">Total Ongkos Kirim</th>
					<th>Rp. <?php echo number_format($detail['total_ongkir']); ?></th>
				</tr><tr>
					<th colspan="6">Total Pembelian</th>
					<th>Rp. <?php echo number_format($detail['total_pembelian']); ?></th>
				</tr>
			</tfoot>
		</table>
		<div class="row">
			<div class="col-md-6 col-md-push-0 hidden-print">
				<div class="alert alert-info">
					<p><strong>Terima Kasih telah melakukan pembelian</strong>,
					Untuk menyelesaikan proses pembelian Anda</p><ul><li>silahkan melakukan pembayaran dengan cara Tansfer ke rekening Mandiri 123-456-7890 A.N <strong>Rifqy</strong> dan upload bukti transfer.</li><li>
						Total tagihan pembayaran <strong>Rp. <?php echo number_format($detail['total_pembelian']); ?></strong>
					</li></ul>
				</div>
			</div>
		</div>
	</div>
	<a href="pembayaran.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary col-md-offset-1 hidden-print">Pembayaran</a>
	<a href="#" onclick="return print()" class="btn btn-info hidden-print">Cetak <i class="fa fa-print"></i></a>
	<br><br>



	<?php 
	include 'footer.php'; ?>

</body>
</html>