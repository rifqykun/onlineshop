<?php 
$id = $_GET['id'];
$kategori->hapus_kategori($id);
echo "<script>alert('data berhasil dihapus'); location='index.php?halaman=kategori'</script>";
?>