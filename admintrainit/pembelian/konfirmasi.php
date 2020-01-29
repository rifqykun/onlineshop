<?php 
$pembelian->konfirmasi_pembayaran($_GET['id']);

echo "<script>alert('Konfirmasi Berhasil'); location='index.php?halaman=pembelian';</script>";
 ?>