<?php 
include 'config/class.php';
$data_produk = $produk->tampil_produk();
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_kategori = $kategori->tampil_kategori();
$data_pembelian = $pembelian->tampil_keranjang();

$batas=4;
if (isset($_GET['page']) AND !empty($_GET['page'])) 
{
	$posisi = ($_GET['page']-1)*$batas;
}
else
{
	$posisi=0;
}
$produk_halaman = $produk->tampil_produk_halaman($posisi,$batas);
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
	<title>Produk</title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php';
	?>

	<div class="container">
		<div class="box">
			<div class="box-header">
				<h3>Produk</h3>
				<hr>
			</div>
			<div class="box-body">
				<div class="row">
					<?php foreach ($produk_halaman as $key => $value): ?>
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
	<nav class="col-md-offset-4">
		<ul class="pagination">
			<li>
				<a href="produk.php">Previous</a>
			</li>
			<?php 
				$perpage = $produk->tampil_produk_halaman(0,999999);
				$jumlah = count($perpage);
				$halaman = ceil($jumlah/$batas);
				$nomor=1;
				while ($nomor <= $halaman) 
				{
					?>
					<li>
						<a href="produk.php?page=<?php echo $nomor ?>"><?php echo $nomor; ?></a>
					</li>
					<?php
					$nomor+=1;
				}
			 ?>
			 <li>
			 	<a href="produk.php?page=<?php echo $nomor ?>">Next</a>
			 </li>
			 <?php  ?>
		</ul>
	</nav>
	<?php 
	include 'footer.php';
	?>

</body>
</html>