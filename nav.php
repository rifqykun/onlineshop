<nav class="navbar navbar-default hidden-print" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".naff">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse naff">
			<ul class="nav navbar-nav">
				<li><a href="utama.php">Home</a></li>
				<li class="active"><a href="produk.php">Produk</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="checkout.php">Check Out</a></li>
				<li><a href="blog.php">Blog</a></li>
				<?php if (isset($_SESSION['pelanggan'])): ?>
					<li><a href="testimoni.php">Testimoni</a></li>
				<?php endif ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['pelanggan'])): ?>
					
				<li><a href="member.php"><?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?></a></li>
				<li><a href="logout.php">LogOut</a></li>
				<?php else: ?>
				<li><a href="daftar.php">Daftar</a></li>
				<li><a href="login.php">Login</a></li>
				<?php endif ?>
			</ul>
		</div>
	</div>
</nav>