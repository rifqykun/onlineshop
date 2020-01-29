<?php 
include 'config/class.php';

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
<style>
	body#LoginForm
	{ 
		background-repeat:no-repeat;
		background-position:center;
		background-size:cover;
		padding:10px;
		background-image: url('assets/img/jalan.jpg');
	}

	.panel h2{ 
		color:#444444;
		margin:0 0 8px 0;
	}
	.login-form .form-control {
		background: #f7f7f7 none repeat scroll 0 0;
		border: 1px solid #d4d4d4;
		border-radius: 4px;
		font-size: 14px;
		height: 50px;
	}

	.main-div {
		background: #ffffff none repeat scroll 0 0;
		border-radius: 2px;
		margin: 3em auto 20px;
		padding: 50px 70px 70px 71px;
	}

	.login-form .form-group {
		margin-bottom:10px;
	}
	.form-group a {
		color: #777777;
		font-size: 15px;
		text-decoration: underline;
	}
	.login-form  .btn.btn-primary {
		color: #ffffff;
		font-size: 14px;
		width: 100%;
		height: 50px;
		line-height: 50px;
		padding: 0;
	}
	.form-group 
	{
		text-align: left; margin-bottom:30px;
	}


</style>
<body id="LoginForm">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="login-form">
					<div class="main-div">
						<div class="panel">
							<h2 class="text-center">Login</h2>
						</div>
						<form method="POST">
							<div class="form-group">
								<input required name="em" type="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<input required name="ps" type="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<a href="daftar.php">Daftar? </a>
							</div>
							<button class="btn btn-primary" name="login">Login</button>
						</form>
						<?php 
						if (isset($_POST['login'])) 
						{
							$hasil = $pelanggan->login_pelanggan($_POST['em'],$_POST['ps']);
							if ($hasil=="sukses-admin") 
							{
								echo "<div class='alert alert-info'>Login Sukses</div>";
								echo "<meta http-equiv='refresh' content='1;url=admintrainit/index.php'>";
							}
							elseif ($hasil=="sukses-member") 
							{
								echo "<div class='alert alert-info'>Login Sukses</div>";
								echo "<meta http-equiv='refresh' content='1;url=utama.php'>";
							}
							else
							{
								echo "<div class='alert alert-danger'>Login Gagal</div>";
								echo "<meta http-equiv='refresh' content='1;url=login.php'>";
							}
						}
						?>
					</div>
				</div>		
			</div>
		</div>
	</div>
</body>
</html>