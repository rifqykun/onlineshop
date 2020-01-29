<h3>Data Pembayaran</h3>
<hr>
<?php 
$idpembayaran = $_GET['id'];

$datapembayaran = $pembelian->ambil_pembayaran($idpembayaran);
$data_pembelian = $pembelian->ambil_pembelian($idpembayaran);
?>

<?php if (empty($datapembayaran)): ?>
	<div class="alert alert-danger">Pelanggan belum melakukan konfirmasi pembayaran</div>
	<?php else: ?>

		<div class="row">
			<div class="col-md-6">
				<table class="table table-striped">
					<tr>
						<td>Nama</td>
						<td><?php echo $datapembayaran['nama']; ?></td>
					</tr>
					<tr>
						<td>Bank</td>
						<td><?php echo $datapembayaran['bank']; ?></td>
					</tr>
					<tr>
						<td>Jumlah Dibayar</td>
						<td>Rp. <?php echo $datapembayaran['jumlah']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Pembayaran</td>
						<td><?php echo $datapembayaran['tanggal_bayar']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Konfirmasi</td>
						<td><?php echo $datapembayaran['tanggal_konfirmasi']; ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="../bukti_pembayaran/<?php echo $datapembayaran['bukti']; ?>" class="img-responsive">
			</div>

			<?php if ($data_pembelian['status_pembelian']=="konfirmasi"): ?>

				<?php elseif ($data_pembelian['status_pembelian']=="barang terkirim"): ?>
					
					<?php else: ?>

						<a href="index.php?halaman=konfirmasi&id=<?php echo $_GET['id'] ?>" class="btn btn-primary">Konfirmasi</a>
					<?php endif ?>
				</div>
				<?php endif ?>