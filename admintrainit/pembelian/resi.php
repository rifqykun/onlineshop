<form method="post">
	<div class="form-group">
		<label>Nomor Resi</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<button class="btn btn-primary" name="submit">Submit</button>
	<?php 
	if (isset($_POST['submit'])) 
	{
		$pembelian->simpan_resi($_POST['resi'],$_GET['id']);

		echo "<script>alert('Resi telah terupload'); location='index.php?halaman=pembelian';</script>";
	}
	 ?>
</form>