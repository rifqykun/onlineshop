<?php 
include 'config/class.php';
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_blog = $blog->tampil_blog();
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
	<title>Login Page</title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

<!-- <main class="content"> -->
	<div class="container">
		<div class="row">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title text-center" style="margin-bottom: 60px">Blog</h3>
				</div>
				<div class="box-body">
					<?php foreach ($data_blog as $key => $value): ?>
					<div class="col-md-6 thumbnail">
						<div class="box-image">
							<img src="foto_blog/<?php echo $value['foto_blog']; ?>" style="padding: 30px" class="img-responsive">
						</div>
						<div class="blog-title" style="margin-bottom: 30px; margin-top: 0px; padding-left: 30px">
							<a href="detail_blog.php?id=<?php echo $value['id_blog']; ?>"><?php echo $value['nama_blog']; ?></a>
						</div>
						<p class="blog-content" style="padding-left: 30px">
							<?php echo $value['deskripsi_pendek']; ?>
							<br><br>
							<small class="col-md-offset-7"><?php echo date("d F Y", strtotime($value['tanggal_blog'])); ?></small>
						</p>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
<!-- </main> -->5

	<?php 
	include 'footer.php'; ?>

</body>
</html>