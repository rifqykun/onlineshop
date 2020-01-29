<?php 
$id = $_GET['id'];
$produk->hapus_produk($id);
echo "<script>alert('Data berhasil dihapus'); location='index.php?halaman=produk'</script>";
?>