<?php 
$semuaproduk = $produk->tampil_produk();
?>

<h2>Data Produk</h2>
<hr>
<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Deskripsi</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($semuaproduk as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama_kategori']; ?></td>
				<td><?php echo $value['nama_produk']; ?></td>
				<td><?php echo $value['harga_produk']; ?></td>
				<td><?php echo $value['berat_produk']; ?></td>
				<td><?php echo $value['deskripsi_produk']; ?></td>
				<td><?php echo $value['foto_produk']; ?></td>
				<td>
					<a href="index.php?halaman=ubahproduk&id=<?php echo $value['id_produk'] ?>" class="btn btn-warning">Ubah</a>
					<a href="index.php?halaman=hapusproduk&id=<?php echo $value['id_produk'] ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>
