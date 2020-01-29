<?php 
$produk_terlaris = $pembelian->tampil_produk_terlaris();
arsort($produk_terlaris);
?>
<h2 class="text-center">Selamat Datang di Administrator</h2> 
<div id="container" style="height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
	$(function () {Highcharts.chart('container', {chart: {type: 'column'},
			title: {
				text: 'Barang Terlaris'
			},
			subtitle: {
				text: 'Warung Trainit'
			},
			xAxis: {
				categories: [
				'Data Produk',
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Terjual'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [
			<?php foreach ($produk_terlaris as $key => $value): ?>
			{
				name: '<?php echo $value['nama_produk'] ?>',
				data: [
				<?php echo $value['banyak'] ?>,
				]
			},
		<?php endforeach ?>
		]
	});
	});

</script>