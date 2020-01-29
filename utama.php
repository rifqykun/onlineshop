<?php 
include 'config/class.php';
$produk_terbaru = $produk->tampil_produk_terbaru();
$data_kategori = $kategori->tampil_kategori_pencarian();
$kategori = $kategori->tampil_kategori();
$data_blog = $blog->tampil_blog_terbaru();
$data_testimoni = $testimoni->tampil_testimoni_terbaru();
$data_pengaturan = $pengaturan->tampil_pengaturan();
$terlaris = $pembelian->tampil_produk_terlaris();
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
</head>
<body>
	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php';
	?>

	
	
	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="owl-carousel slider-utama">
						<div>
							<img src="assets/img/slider/hardware.jpg">
						</div>
						<div>
							<img src="assets/img/slider/hardware1.jpg">
						</div>
						<div>
							<img src="assets/img/slider/hwrd2.jpg">
						</div>
						<div>
							<img src="assets/img/slider/hwrd3.jpg">
						</div>
						<div>
							<img src="assets/img/slider/hwrd4.jpg">
						</div>
						<div>
							<img src="assets/img/slider/hwrd5.jpg">
						</div>
						<div>
							<img src="assets/img/slider/hwrd6.jpg">
						</div>
					</div>
					<!--awal infobox-->
					<div class="infobox">
						<div class="row">
							<div class="col-md-4 infobox-item text-center">
								<h3 class="infobox-title">Garansi Uang Kembali</h3>
								<span class="infobox-text">Uang kembali 100% bila cacat produk atau produk tidak sesuai dengan foto</span>
							</div>
							<div class="col-md-4 infobox-item text-center">
								<h3 class="infobox-title">Gratis Pengiriman</h3>
								<span class="infobox-text">Gratis pengiriman area Jawa Tengah dan Yogyakarta</span>
							</div>
							<div class="col-md-4 infobox-item text-center">
								<h3 class="infobox-title">Harga Termurah</h3>
								<span class="infobox-text">Jaminan harga termurah tapi tidak murahan dan mutu terbaik</span>
							</div>
						</div>
					</div>
					<!--akhir infobox-->
					<!--awal slider produk-->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Produk Terbaru</h3>
							<div class="box-tools" id="letaknavproduk"></div>
						</div>
						<div class="box-body">
							<div class="owl-carousel slider-produk owl-theme">
								<?php foreach ($produk_terbaru as $key => $value): ?>
									
									<div class="text-center">
										<div class="image-product">
											<img height="150" src="foto_produk/<?php echo $value['foto_produk']; ?>">
										</div>
										<h3 class="title-product">
											<a href=""><?php echo $value['nama_produk']; ?></a>
										</h3>
										<span class="price-product">Rp. <?php echo number_format($value['harga_produk']); ?></span>
										<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
										<a href="beliproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<!--akhir slider produk-->

					<!--awal slider blog-->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Blog</h3>
							<div class="box-tools" id="letaknavblog"></div>
						</div>
						<div class="box-body">
							<div class="owl-carousel slider-blog owl-theme">
								<?php foreach ($data_blog as $key => $value): ?>
									<div>
										<div class="blog-image">
											<img height="250" src="foto_blog/<?php echo $value['foto_blog']; ?>">
										</div>
										<h3 class="blog-title">
											<a href=""><?php echo $value['nama_blog']; ?></a>
										</h3>
										<p class="blog-content">
											<?php echo $value['deskripsi_pendek']; ?>
											<br><br>
											<small class="col-md-offset-9">
												<?php echo date("d F Y", strtotime($value['tanggal_blog'])); ?>
											</small>
										</p>
										<a href="detail_blog.php?id=<?php echo $value['id_blog']; ?>" class="btn btn-primary">Selengkapnya</a>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<!--akhir slider blog-->

				</div>
				<div class="col-md-3 col-md-pull-9">
					<!--awal sidebar kategori-->
					<div class="panel panel-color">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-bars"></i> Kategori</h3>
							</div>
							<div class="list-group">
								<?php foreach ($kategori as $key => $value): ?>
									
									<a href="detailkategori.php?id=<?php echo $value['id_kategori']; ?>&jenis=<?php echo $value['jenis_kategori']; ?>" class="list-group-item"><i class="fa fa-chevron-circle-right"></i> <?php echo $value['nama_kategori']; ?> - <?php echo $value['jenis_kategori']; ?></a>
								<?php endforeach ?>
							</div>
						</div>
						<!--akhir slidebar kategori-->

						<!--awal sidebar terlaris-->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Terlaris</h3>
								<div class="box-tools" id="letaknavterlaris"></div>
							</div>
							<div class="box-body">
								<div class="owl-carousel slider-terlaris owl-theme">
									<?php foreach ($terlaris as $key => $value): ?>
										<div>
											<div class="image-product">
												<img src="foto_produk/<?php echo $value['foto_produk']; ?>">
											</div>
											<h3 class="title-product"><?php echo $value['nama_produk']; ?></h3>
											<span class="price-product">Rp. <?php echo number_format($value['harga_produk']); ?></span>
											<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
											<a href="beliproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
										</div>
									<?php endforeach ?>
								</div>
							</div>
							
						</div>
						<!--akhir sidebar terlaris-->

						<!--awal sidebar testimoni-->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Testimoni</h3>
							</div>
							<div class="box-body">
								<div class="owl-carousel slider-testimoni owl-theme">
									<?php foreach ($data_testimoni as $key => $value): ?>
										<div class="text-center">
											<img height="100" src="foto_pelanggan/<?php echo $value['foto_pelanggan']; ?>" class="img-circle testimoni-image">
											<h4 class="testimoni-title"><?php echo $value['nama_pelanggan']; ?></h4>
											<p class="testimoni-content">
												<?php echo substr( $value['isi_testimoni'], 0,50); ?>
											</p>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
						<!--akhir sidebar testimoni-->
					</div>
				</div>
			</div>
		</main>
		<?php include 'footer.php'; ?>

		</html>