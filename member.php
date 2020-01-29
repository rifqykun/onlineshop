<?php 
include 'config/class.php';
$data_pengaturan = $pengaturan->tampil_pengaturan();
$id = $_SESSION['pelanggan']['id_pelanggan'];
$data_pelanggan = $pelanggan->ambil_pelanggan($id);
$data_pembelian_pelanggan = $pembelian->ambil_pembelian_pelanggan($id);
$data_pembelian = $pembelian->tampil_keranjang();

if (!isset($_SESSION['pelanggan'])) 
{
	echo "<script>alert('Silahkan LOGIN terlebih dulu'); location='login.php';</script>";
}
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
	<title></title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

	<section class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="page-header text-center img-circle">
							<img src="foto_pelanggan/<?php echo $data_pelanggan['foto_pelanggan']; ?>" width="200">
						</div>
						<div class="panel-body">
							<ul class="list-group">
								<li class="list-group-item"><?php echo $data_pelanggan['nama_pelanggan']; ?></li>
								<li class="list-group-item"><?php echo $data_pelanggan['telepon_pelanggan']; ?></li>
								<li class="list-group-item"><?php echo $data_pelanggan['email_pelanggan']; ?></li>
							</ul>
						</div>
						<div class="panel-footer">
							<a href="edit_pelanggan.php?id=<?php echo $data_pelanggan['id_pelanggan'] ?>" class="btn btn-primary">Edit</a>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="section-title" style="margin-bottom: 10px;">
						<h3>Riwayat belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>
					</div>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Total bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_pembelian_pelanggan as $key => $value): ?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo date("d F Y H:i:s", strtotime($value['tanggal_pembelian'])); ?></td>
									<td><?php echo $value['status_pembelian']; ?></td>
									<td>Rp. <?php echo number_format($value['total_pembelian']);  ?></td>
									<td>
										<?php if ($value['status_pembelian']=="pending"): ?>
											<a href="nota.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-primary">Nota</a>
											<a href="pembayaran.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
											<?php elseif ($value['status_pembelian']=="Barang Dikirim"): ?>
												<a href="nota.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info btn-xs">Nota</a>
												<a href="lihat_pembayaran.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-primary btn-xs">Pembayaran</a>
												<a href="barang_sampai.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-warning btn-xs">Barang Sampai</a>
											<?php elseif ($value['status_pembelian']=="barang sampai"): ?>
												<a href="nota.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info btn-xs">Nota</a>
												<a href="lihat_pembayran.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-primary btn-xs">Pembayaran</a>
												<a href="testimoni.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-danger btn-xs">Testimoni</a>
											<?php else: ?>
												<a href="nota.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-primary">Nota</a>
												<a href="lihat_pembayaran.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
											<?php endif ?>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		<?php 
		include 'footer.php'; ?>

	</body>
	</html>