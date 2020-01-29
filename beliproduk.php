<?php 
include 'config/class.php';

if (isset($_GET['id'])) 
{
	echo $id_produk = $_GET['id'];
}
if (isset($_SESSION['keranjang'][$id_produk])) 
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}
echo "<script>alert('Produk tersimpan di keranjang'); location='keranjang.php';</script>";
?>
