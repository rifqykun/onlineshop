<?php 
include 'config/class.php';
$cariproduk = $produk->cari_produk($_GET['keyword']);
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_kategori = $kategori->tampil_produk_pencarian();
$data_pembelian = $pembelian->tampil_keranjang();

?>
<pre><?php print_r($cariproduk); ?></pre>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
	include 'nav.php';
	?>

	<section class="content">
		<div class="container">
			<div class="section-title">
				<h3 style="margin-bottom: 20px;">Pencarian Produk: <?php echo $_GET['keyword']; ?></h3>
			</div>
			<?php if (empty($cariproduk)): ?>
				<div class="alert alert-danger">Maaf Produk Tidak Tersedia</div>
				<?php else: ?>
					<div class="row">
						<?php foreach ($cariproduk as $key => $value): ?>
							<div class="col-md-2">
								<div class="thumbnail">
									<div class="product-image">
										<img src="foto_produk/<?php echo $value['foto_produk']; ?>" class="img-responsive">
									</div>
									<div class="caption">
										<h3 class="product-title text-center" style="margin-bottom: 20px;"><?php echo $value['nama_produk']; ?></h3>
										<h4 class="text-center" style="margin-bottom: 20px;">Rp. <?php echo number_format($value['harga_produk']); ?></h4>
										<a href="detailproduk.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-color">Detail</a>
										<a href="beli.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-primary">Beli</a>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
			<?php endif ?>
		</div>
	</section>


	<?php 
	include 'footer.php';
	?>
</body>
</html>