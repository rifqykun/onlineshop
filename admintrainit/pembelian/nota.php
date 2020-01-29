<h3>Nota Pembelian</h3>
<hr>
<?php  
$id_pembelian = $_GET['id'];

$produkpembelian = $pembelian->tampil_produk_pembelian($id_pembelian);

$detail = $pembelian->ambil_pembelian($id_pembelian);
?>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>No:	<?php echo $detail['id_pelanggan']; ?></p>
		<p>Tanggal:	<?php echo $detail['tanggal_pembelian']; ?></p>
		<p>Status:	<span class="btn btn-danger btn-xs"><?php echo $detail['status_pembelian']; ?></span></p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<p>Pelanggan: <?php echo $detail['nama_pelanggan']; ?></p>
		<p>Email: <?php echo $detail['email_pelanggan']; ?></p>
		<p>Telepon: <?php echo $detail['telepon_pelanggan']; ?></p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<p>
			<?php echo $detail['tipe']; ?>
			<?php echo $detail['distrik']; ?>
			<?php echo $detail['provinsi']; ?>
			<?php echo $detail['kodepos_pengiriman']; ?>
		</p>
		<p>Nama Penerima: <?php echo $detail['nama_penerima']; ?></p>
		<p>Telepon: <?php echo $detail['telepon_penerima']; ?></p>
		<p>Alamat: <?php echo $detail['alamat_penerima']; ?></p>
		<p>
			Paket Pengiriman: <?php echo $detail['paket_pengiriman']; ?>,
			<?php echo $detail['ekspedisi_pengiriman']; ?>
			<?php echo $detail['lama_pengiriman']; ?> hari.
		</p>
	</div>
</div>

<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Berat</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subharga</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($produkpembelian as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama_produk']; ?></td>
				<td><?php echo $value['berat_produk']; ?> gram</td>
				<td>Rp. <?php echo number_format($value['harga_produk']); ?></td>
				<td><?php echo $value['jumlah_produk']; ?></td>
				<td><?php echo $value['berat_produk']; ?> gram</td>
				<td>Rp. <?php echo number_format($value['subharga_produk']); ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="6">Total Belanja</th>
			<th>Rp. <?php echo number_format($detail['total_belanja']); ?></th>
		</tr><tr>
			<th colspan="6">Total Ongkos Kirim</th>
			<th>Rp. <?php echo number_format($detail['total_ongkir']); ?></th>
		</tr><tr>
			<th colspan="6">Total Pembelian</th>
			<th>Rp. <?php echo number_format($detail['total_pembelian']); ?></th>
		</tr>
	</tfoot>
</table>
