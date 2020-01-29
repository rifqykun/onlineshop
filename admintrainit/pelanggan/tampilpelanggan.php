<?php 
$data_pelanggan = $pelanggan->tampil_pelanggan();
?>
<h2>Data Pelanggan</h2>
<hr>
<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_pelanggan as $key => $value): ?>	
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['nama_pelanggan']; ?></td>
				<td><?php echo $value['email_pelanggan']; ?></td>
				<td><?php echo $value['telepon_pelanggan']; ?></td>
				<td><?php echo $value['alamat_pelanggan']; ?></td>
				<td><?php echo $value['foto_pelanggan']; ?></td>
				<td>
					<a href="index.php?halaman=hapuspelanggan&id=<?php echo $value['id_pelanggan'] ?>" onclick="return confirm('Apakah anda yakin?')"class="btn btn-danger btn-xs">Hapus</a>
					<a href="index.php?halaman=ubahpelanggan&id=<?php echo $value['id_pelanggan'] ?>" class="btn btn-warning btn-xs">Ubah</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<!-- <a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah</a> -->