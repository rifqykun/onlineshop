<h3>Data Blog</h3>
<hr>
<?php 
$datablog = $blog->tampil_blog();
?>

<table class="table" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Blog</th>
			<th>Deskripsi</th>
			<th>Tanggal</th>
			<th>Foto</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datablog as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama_blog']; ?></td>
				<td><?php echo $value['deskripsi_pendek']; ?></td>
				<td><?php echo $value['tanggal_blog']; ?></td>
				<td><?php echo $value['foto_blog']; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahblog" class="btn btn-primary">Tambah Blog</a>