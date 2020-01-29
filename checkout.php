<?php 
include 'config/class.php';
$data_keranjang = $pembelian->tampil_keranjang();
$data_pengaturan = $pengaturan->tampil_pengaturan();
$data_pembelian = $pembelian->tampil_keranjang();

if (!isset($_SESSION['keranjang'])) 
{
	echo "<script>alert('Silahkan mengisi keranjang anda'); location='produk.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Warung Rifqy</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
	<title>Check Out</title>
</head>
<body>

	<?php 
	include 'topbar.php';
	//include 'header.php';
	include 'nav.php'; ?>

	<div class="container">
		<?php if (!isset($data_keranjang)): ?>
			<div class="alert alert-danger">Empity</div>
		<?php else: ?>
			
		
		<h3>Data Belanja</h3>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Jumlah</th>
					<th>Berat</th>
					<th>Harga</th>
					<th>SubBerat</th>
					<th>SubHarga</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$total_harga=0;
				$total_berat=0; ?>
				<?php foreach ($data_keranjang as $key => $value): ?>
					<?php $total_harga+=$value['sub_harga'];
					$total_berat+=$value['sub_berat']; ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['nama_produk']; ?></td>
					<td><?php echo $value['jumlah_produk']; ?></td>
					<td><?php echo $value['berat_produk']; ?> Gram</td>
					<td><?php echo $value['harga_produk']; ?></td>
					<td><?php echo $value['sub_berat']; ?> Gram</td>
					<td><?php echo $value['sub_harga']; ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="6">Total Belanja</th>
					<th>Rp. <?php echo $total_harga; ?></th>
				</tr><tr>
					<th colspan="6">Total Ongkir</th>
					<th id="total_ongkir"></th>
				</tr><tr>
					<th colspan="6">Total Bayar/Tagihan</th>
					<th id="total_bayar"></th>
				</tr>
			</tfoot>
		</table>

		<h3>Check Out</h3>
		<form method="post">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Provinsi</label>
						<select class="form-control" name="provinsi">
							<option></option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Kota</label>
						<select class="form-control" name="kota"></select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Ekspedisi</label>
						<select class="form-control" name="ekspedisi"></select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Ongkir</label>
						<select class="form-control" name="ongkir"></select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Penerima</label>
						<input class="form-control" type="text" name="nama_penerima">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Telepon Penerima</label>
						<input type="text" class="form-control" name="tlp_penerima">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat"></textarea>
			</div>

			<input class="form-group col-md-3" type="text" name="total_belanja" value="<?php echo $total_harga; ?>">
			<input class="form-group col-md-3" type="text" name="total_berat" value="<?php echo $total_berat; ?>">
			<input class="form-group col-md-3" type="text" name="nama_provinsi" placeholder="Provinsi">
			<input class="form-group col-md-3" type="text" name="nama_kota" placeholder="Kota">
			<input class="form-group col-md-3" type="text" name="tipe" placeholder="Tipe">
			<input class="form-group col-md-3" type="text" name="kode_pos" placeholder="Kode Pos">
			<input class="form-group col-md-3" type="text" name="nama_ekspedisi" placeholder="Ekspedisi">
			<input class="form-group col-md-3" type="text" name="nama_paket" placeholder="Nama Paket">
			<input class="form-group col-md-3" type="text" name="biaya_paket" placeholder="Biaya Paket">
			<input class="form-group col-md-3" type="text" name="lama_paket" placeholder="Lama Paket">
			<input class="form-group col-md-3" type="text" name="total_bayar" placeholder="Total Bayar">
			<br><br>
			<button class="btn btn-primary" name="checkout">Check Out</button>
		</form>
		<?php 
		if (isset($_POST['checkout'])) 
		{
			$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
			$tanggal_pembelian = date('Y-m-d H:i:s');
			$status ='pending';
		 	$pembelian_baru = $pembelian->simpan_pembelian($_POST['nama_penerima'],$_POST['tlp_penerima'],$_POST['alamat'],$_POST['total_belanja'],$_POST['total_berat'],$_POST['nama_provinsi'],$_POST['nama_kota'],$_POST['tipe'],$_POST['kode_pos'],$_POST['nama_ekspedisi'],$_POST['nama_paket'],$_POST['biaya_paket'],$_POST['lama_paket'],$_POST['total_bayar'],$id_pelanggan,$tanggal_pembelian,$status);

		 	echo "<script>alert('Pembelian berhasil'); location='nota.php?id=$pembelian_baru';</script>";
		 } 
		 ?>
	</div>
	<?php endif ?>



	<script src="assets/dist/js/jquery-3.3.1.min.js"></script>
	<script src="assets/dist/jsjs/bootstrap.min.js"></script>

	<script>
		$(document).ready(function(){
			$.ajax({
				url:'dataprovinsi.php',
				success:function(hasil)
				{
					$("select[name=provinsi]").html(hasil);
				}
			})
		});
		$(document).ready(function(){
			$("select[name=provinsi]").on("change",function(){
				var data_provinsi = $(this).val();
				var nama_provinsi = $("option:selected").attr("nama");
				$("input[name=nama_provinsi]").val(nama_provinsi);
				$.ajax({
					url:'datakota.php',
					type:'POST',
					data:'idprov='+data_provinsi,
					success:function(hasil)
					{
						$("select[name=kota]").html(hasil);
					}
				});
				$("select[name=ekspedisi]").val(null);
				$("select[name=ongkir]").val(null);
				$("input[name=nama_kota]").val(null);
				$("input[name=tipe]").val(null);
				$("input[name=kode_pos]").val(null);
				$("input[name=nama_ekspedisi]").val(null);
				$("input[name=nama_paket]").val(null);
				$("input[name=biaya_paket]").val(null);
				$("input[name=lama_paket]").val(null);
			})
		});
		$(document).ready(function(){
			$("select[name=kota]").on('change',function(){
				var nama = $("option:selected",this).attr("nama");
				var kodepos = $("option:selected",this).attr("kodepos");
				var tipe = $("option:selected",this).attr("tipe");

				$("input[name=nama_kota]").val(nama);
				$("input[name=kode_pos]").val(kodepos);
				$("input[name=tipe]").val(tipe);
			})
		});
		$(document).ready(function(){
			$.ajax({
				url:'dataekspedisi.php',
				success:function(hasil)
				{
					$("select[name=ekspedisi]").html(hasil);
				}
			})
		});
		$(document).ready(function(){
			$("select[name=ekspedisi]").on('change',function(){
				var nama_eks = $("option:selected",this).attr("nama");

				$("input[name=nama_ekspedisi]").val(nama_eks);

			})
		});
		$(document).ready(function(){
			$("select[name=ekspedisi]").on('change',function(){
				var id_kota = $("select[name=kota]").val();
				var ekspedisi = $("select[name=ekspedisi]").val();
				var total_berat = $("input[name=total_berat]").val();

				$.ajax({
					url:'dataongkir.php',
					type:'POST',
					data:'id_kota='+id_kota+'&ekspedisi='+ekspedisi+'&total_berat='+total_berat,
					success:function(hasil)
					{
						$("select[name=ongkir]").html(hasil);
					}
				})
			})
		});
		$(document).ready(function(){
			$("select[name=ongkir]").on('change',function(){
				var nama_paket = $("option:selected",this).attr("nama");
				var biaya = $("option:selected",this).attr("biaya");
				var lama = $("option:selected",this).attr("lama");

				$("input[name=nama_paket]").val(nama_paket);
				$("input[name=biaya_paket]").val(biaya);
				$("input[name=lama_paket]").val(lama);
				$("#total_ongkir").html("Rp. "+biaya);

				var total_belanja = $("input[name=total_belanja]").val();
				var biaya_paket = $("input[name=biaya_paket]").val();

				var total_bayar = parseInt(total_belanja) + parseInt(biaya_paket);

				$("#total_bayar").html("Rp. "+total_bayar);
				$("input[name=total_bayar]").val(total_bayar);
			})
		})
	</script>

	<?php 
	include 'footer.php'; ?>
</body>
</html>