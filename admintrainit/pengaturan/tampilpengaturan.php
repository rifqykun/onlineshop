<h2>Pengaturan</h2>
<hr>
<?php 
$datapengaturan = $pengaturan->tampil_pengaturan();
?>

<table class="table table-bordered table-striped table-hover" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Kolom</th>
			<th>Isi</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datapengaturan as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['kolom']; ?></td>
				<td><?php echo $value['isi']; ?></td>
				<td>
					<a href="index.php?halaman=ubahpengaturan&id=<?php echo $value['id_pengaturan'] ?>" class="btn btn-warning">Ubah</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>