<?php 
include 'config/class.php';
$pembelian->ubah_status_barang_sampai($_GET['id']);
echo "<script>location='member.php'</script>";
 ?>