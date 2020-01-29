<?php 
$datapembelian = $pembelian->tampil_pembelian();
?>
<h2>halaman pembelian</h2>
<hr>
<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Pelanggan</th>
			<th>Status</th>
			<th>Total Pembelian</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datapembelian as $key => $value): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['tanggal_pembelian']; ?></td>
			<td><?php echo $value['nama_pelanggan']; ?></td>
			<td><?php echo $value['status_pembelian']; ?></td>
			<td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
			<td>
				<a href="index.php?halaman=nota&id=<?php echo $value["id_pembelian"]; ?>" class="btn btn-info btn-group-sm">Nota</a>
				<a href="index.php?halaman=pembayaran&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success btn-group-sm">Pembayaran</a>
				<?php if ($value['status_pembelian']=="konfirmasi"): ?>
					<a href="index.php?halaman=resi&id=<?php echo $value['id_pembelian'] ?>" class="btn btn-warning">Input Resi</a>
				<?php endif ?>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>