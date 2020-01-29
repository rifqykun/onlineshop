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
	<title>Registrasi</title>
</head>
<body>

	<?php 
	include 'topbar.php';
	include 'header.php';
	include 'nav.php'; ?>

	<div class="container">
		<form method="post" enctype="multipart/form-data" class="form-group col-md-12">
			<div class="row">
				<div class=" form-group col-md-6">
					<label class="col-md-2 control-label">Email</label>
					<div class="col-md-8">
						<input type="text" oninput="return cek_email()" name="email" class="form-control">
						<span id="pesan"></span>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label class="col-md-2 control-label">Password</label>
					<div class="col-md-8">
						<input type="password" name="pass" class="form-control">
					</div>
				</div>
				<div class="form-group col-md-6">
					<label class="col-md-2 control-label">Nama</label>
					<div class="col-md-8">
						<input type="text" name="nama" class="form-control">
					</div>
				</div>
				<div class="form-group col-md-6">
					<label class="col-md-2 control-label">Telepon</label>
					<div class="col-md-8">
						<input type="text" name="tlp" class="form-control">
					</div>
				</div>
				<div class="form-group col-md-6">
					<label class="col-md-2 control-label">Alamat</label>
					<div class="col-md-8">
						<textarea class="form-control" name="alamat"></textarea>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label class="col-md-2">Foto</label>
					<div class="col-md-8">
						<input type="file" name="foto" class="form-control">
					</div>
				</div>
			</div>
			<button class="btn btn-primary col-md-offset-1" name="simpan">Simpan</button>
		</form>
	</div>

	<?php 
	include 'footer.php'; ?>
	<script>
		function cek_email()
		{
			var email = $("input[name=email]").val();
			$.ajax({
				type:'POST',
				url:'ajax/email.php',
				data:'email='+email,
				success:function(hasil)
				{
					if (parseInt(hasil)==1) 
					{
						// console.log('haii');
						$("#pesan").html('<i>** Maaf Email Sudah Digunakan</i>');
					}
					else
					{
						$("#pesan").html('<i></i>');
					}
				}
			})
		}
	</script>

	<?php 
	if (isset($_POST['simpan'])) 
	{
		$pelanggan->tambah_pelanggan($_POST['email'],$_POST['pass'],$_POST['nama'],$_POST['tlp'],$_POST['alamat'],$_FILES['foto']);

			echo "<script>alert('Berhasil registrasi'); location='login.php';</script>";
	}
?>
</body>
</html>