<?php 
include 'config/class.php';

$dataongkir = $apiongkir->update_ongkir(105,$_POST['id_kota'],$_POST['total_berat'],$_POST['ekspedisi']);

?>



<option>--Pilih Paket--</option>
<?php foreach ($dataongkir as $key => $value): ?>
	<option
	nama="<?php echo $value['service']; ?>"
	biaya="<?php echo $value['cost']['0']['value']; ?>"
	lama="<?php echo $value['cost']['0']['etd'] ?> Hari"
	>
	<?php echo $value['service']; ?>
	Rp. <?php echo number_format($value['cost']['0']['value']); ?>
	<?php echo $value['cost']['0']['etd']; ?> Hari
</option>
<?php endforeach ?>