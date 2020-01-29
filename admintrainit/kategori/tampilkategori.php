<h2>Selamat datang di Kategori</h2>
<?php 
$data_kategori = $kategori->tampil_kategori();
?>
<h2>Data Kategori</h2>
<hr>
<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>jenis Kategori</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_kategori as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_kategori']; ?></td>
			<td><?php echo $value['jenis_kategori']; ?></td>
			<td>
				<a href="index.php?halaman=ubahkategori&id=<?php echo $value['id_kategori'] ?>" class="btn btn-warning">Ubah</a>
				<a href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori'] ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Kategori</a>