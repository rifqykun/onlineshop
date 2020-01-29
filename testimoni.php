<?php 
include 'config/class.php';
$data_pengaturan = $pengaturan->tampil_pengaturan();
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

</body>
</html>
<?php 
include 'topbar.php';
include 'header.php';
include 'nav.php';
 ?>

 <div class="container">
 	<h3>Testimoni</h3>
 	<div class="row">
 		<form method="post" enctype="multipart/form-data">
 			<div class="form-group">
 				<textarea class="form-control" name="isi" placeholder="Komentar anda . . . ."></textarea>
 			</div>
 			<div class="form-group">
 				<input type="file" name="foto" class="form-control">
 			</div>
 			<button class="btn btn-primary" name="submit">Submit</button>
 		</form>
 		<br><br>
 	</div>
 </div>
 <?php 
if (isset($_POST['submit'])) 
{
	$testimoni->simpan_testimoni($_POST['isi'],$_FILES['foto'],$_SESSION['pelanggan']['id_pelanggan']);

	echo "<script>alert('Testimoni tersimpan'); location='member.php';</script>";
}
  ?>

 <?php 
include 'footer.php';
  ?>
