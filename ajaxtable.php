<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="container">
		<label>Pilih Jenis</label>
		<select class="form-control" name="jenis">
			<option>Pilih Jenis</option>
			<option value="magang">Magang</option>
			<option value="pegawai">Pegawai</option>
		</select>
	</div>
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$.ajax({
			url:'isitable.php',
			success:function(hasil)
			{
				$("tbody").html(hasil);
			}
		})
	});
	$(document).ready(function(){
		$("select[name=jenis]").on('change',function(){
			var jenis = $(this).val();

			$.ajax({
				url:'isitable.php',
				type:'POST',
				data:'jenis='+jenis,
				success:function(hasil)
				{
					$("tbody").html(hasil);
				}
			})
		})
	})
</script>
</body>
</html>