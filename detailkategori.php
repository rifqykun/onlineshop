<?php 
include 'config/class.php';
$id = $_GET['id'];
$jenis = $_GET['jenis'];
$detail = $produk->tampil_produk_kategori($id,$jenis);
$data_pengaturan = $pengaturan->tampil_pengaturan();
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
	<title></title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php';
	 ?>

	 <?php if (empty($detail)): ?>
	 	<div class="alert alert-danger">Produk belum tersedia</div>
	 <?php else: ?>
	 	<div class="container">
		<div class="box">
			<div class="box-header" style="margin-bottom: 20px;">
				<h3 class="text-center"><?php echo $detail['0']['nama_kategori']; ?>-<?php echo $detail['0']['jenis_kategori']; ?></h3>
				<hr>
			</div>
			<div class="box-body">
				<div class="row">
					<?php foreach ($detail as $key => $value): ?>
						<div class="col-md-3">
							<div class="text-center thumbnail">
								<div class="image-product img-responsive" style="margin-bottom: 20px">
									<img src="foto_produk/<?php echo $value['foto_produk']; ?>" height="150" width="150">
								</div>
								<h3 class="title-produk">
									<h4><?php echo $value['nama_produk']; ?></h4>
								</h3>
								<br><br>
								<b>Rp. <?php echo $value['harga_produk']; ?></b>
								<br><br>
								<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
								<a href="beliproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
								<br><br>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
	 <?php endif ?>

	 <?php 
	 include 'footer.php';
	  ?>

</body>
</html>