<?php if (isset($_POST['jenis']) AND $_POST['jenis']=="magang"): ?>
	
<tr>
	<td>1</td>
	<td>Paijo</td>
	<td>Jepara</td>
</tr>
<tr>
	<td>2</td>
	<td>Budi</td>
	<td>Pati</td>
</tr>
<?php endif ?>

<?php if (isset($_POST['jenis']) AND $_POST['jenis']=="pegawai"): ?>
	
<tr>
	<td>1</td>
	<td>Rifqy</td>
	<td>Cilacap</td>
</tr>
<tr>
	<td>2</td>
	<td>Rin Nohara</td>
	<td>Jogja</td>
</tr>
<?php endif ?>

<?php if (!isset($_POST['jenis'])): ?>
	<tr>
		<td>--Pilih Jenis--</td>
	</tr>
<?php endif ?>