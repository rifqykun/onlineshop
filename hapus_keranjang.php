<?php 
include 'config/class.php';
unset($_SESSION['keranjang'][$_GET['id']]);

echo "<script>location='keranjang.php'</script>";
?>