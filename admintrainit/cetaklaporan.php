<?php 
include '../config/class.php';
$laporan = $pembelian->tampil_laporan_bulan();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
	<h2 align="center">Laporan Bulanan</h2>
	<table class="table table-striped">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Pelanggan</th>
 			<th>Tanggal Pembelian</th>
 			<th>Total Pembelian</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $total=0 ?>
 		<?php foreach ($laporan as $key => $value): ?>
 	<?php $total+=$value['total_pembelian']; ?>
 		<tr>
 			<td><?php echo $key+1; ?></td>
 			<td><?php echo $value['nama_pelanggan']; ?></td>
 			<td><?php echo $value['tanggal_pembelian']; ?></td>
 			<td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 	<tfoot>
 		<th colspan="3">Total Pendapatan</th>
 		<th>Rp. <?php echo number_format($total); ?></th>
 	</tfoot>
 </table>
 <a href="#" onclick="return print()" class="btn btn-info hidden-print">Cetak</a>
</div>
</body>
</html>