<?php 
$id = $_GET['id'];
$pelanggan->hapus_pelanggan($id);
echo "<script>alert('data berhasil dihapus'); location='index.php?halaman=pelanggan'</script>";
?>