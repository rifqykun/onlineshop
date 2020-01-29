<?php 
include 'config/class.php';
$id = $_GET['id'];
$detail_blog = $blog->ambil_blog($id);
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
		<div class="text-center">
			<h3><?php echo $detail_blog['nama_blog'];  ?></h3>
			<br><br>
			<img src="foto_blog/<?php echo $detail_blog['foto_blog']; ?>" width="500px">
			<br><br>
			<p>
				<?php echo $detail_blog['deskripsi_panjang']; ?>
			</p>
			<br><br>
			<small class="col-md-offset-4"><?php echo date("d F Y", strtotime($detail_blog['tanggal_blog'])) ?></small>
		</div>
	</div>
<!-- </main> -->

	<?php 
	include 'footer.php'; ?>

</body>
</html>