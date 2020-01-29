<?php 
include 'config/class.php';
$id = $_GET['id'];
$detail = $produk->ambil_produk($id);
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_kategori = $kategori->tampil_kategori();
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
	<title>Detail Produk</title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php';
	?>

	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<div class="product-image">
								<img src="foto_produk/<?php echo $detail['foto_produk'];  ?>" class="img-responsive">
							</div>
						</div>
						<div class="col-md-6">
							<h3 class="product-title"><?php echo $detail['nama_produk']; ?></h3>
							<br><br>
							<h4 class="product-price"><?php echo $detail['harga_produk']; ?></h4>
							<hr>
							<p>
								<?php echo $detail['deskripsi_produk']; ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-color">
						<div class="panel-heading">
							<h3 class="panel-title">Kategori</h3>
						</div>
						<div class="list-group">
							<?php foreach ($data_kategori as $key => $value): ?>
								<a href="kategori.php?id=<?php echo $value['id_kategori'] ?>" class="list-group-item"><?php echo $value['nama_kategori']; ?></a>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php 
	include 'footer.php';
	?>
</body>
</html>