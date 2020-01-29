<?php 
include 'config/class.php';

$data_provinsi = $apiongkir->update_provinsi();
?>
<pre><?php print_r($data_provinsi); ?></pre>


<option>--Pilih Provinsi--</option>
<?php foreach ($data_provinsi as $key => $value): ?>
	<option value="<?php echo $value['province_id']; ?>" nama="<?php echo $value['province']; ?>"><?php echo $value['province']; ?></option>
<?php endforeach ?>