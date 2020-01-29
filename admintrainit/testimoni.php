<?php 
$datatestimoni = $testimoni->tampil_testimoni();
?>
<h2>TESTIMONI</h2>
<table class="table" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Testimoni</th>
			<th>Foto</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datatestimoni as $key => $value): ?>	
		<tr>
			 <td><?php echo $key+1; ?></td>
			 <td><?php echo $value['nama_pelanggan']; ?></td>
			 <td><?php echo $value['isi_testimoni']; ?></td>
			 <td><?php echo $value['foto_testimonni']; ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>