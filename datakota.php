<?php 
include 'config/class.php';

$data_kota = $apiongkir->update_kota($_POST['idprov']);
?>



<option>--Pilih Kota--</option>
<?php foreach ($data_kota as $key => $value): ?>
	<option value="<?php echo $value['city_id']; ?>" nama="<?php echo $value['city_name']; ?>" kodepos="<?php echo $value['postal_code'] ?>" tipe="<?php echo $value['type']; ?>">
		<?php echo $value['type']; ?>
		<?php echo $value['city_name']; ?>
	</option>
	<?php endforeach ?>