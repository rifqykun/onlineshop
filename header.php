<header class="header hidden-print">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
					<img src="assets/img/logo.png" class="img-responsive">
				</div>
			</div>
			<div class="col-md-6">
				<div class="search">
					<form method="post">
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" name="keyword">
								<select class="form-control" name="kategori">
									<option>--Pilih Kategori--</option>
									<?php foreach ($data_kategori as $key => $value): ?>
										
									<option value="<?php echo $value['nama_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
									<?php endforeach ?>
								</select>
								<span class="input-group-btn">
									<button class="btn btn-color" name="cari">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</div>
					</form>
					<?php 
					if (isset($_POST['cari']) AND $_POST['keyword']) 
					{
						echo "<script>location='cari_produk.php?keyword=$_POST[keyword]';</script>";
					}
					elseif (isset($_POST['cari']) AND $_POST['kategori']) 
					{
						echo "<script>location='cari_kategori.php?keyword=$_POST[kategori]';</script>";
					}
					 ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="keranjang">
					<div class="btn-group">
						<a href="keranjang.php" class="btn btn-color">
							<i class="fa fa-shopping-bag">
								<span class="badge">
									<?php if (isset($_SESSION['keranjang'])): ?>
										<?php echo count($_SESSION['keranjang']); ?>
										<?php else: ?>
											<?php echo ""; ?>
									<?php endif ?>
								</span>
							</i>
						</a>
						<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Keranjang</a>
						<ul class="dropdown-menu">
							<?php foreach ($data_pembelian as $key => $value): ?>
								
							<li><a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>"><?php echo $value['nama_produk']; ?></a></li>
							<?php endforeach ?>
							<li class="divider"></li>
							<li><a href="">Lihat Keranjang</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>