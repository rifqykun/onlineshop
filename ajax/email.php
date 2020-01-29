<?php 
include '../config/class.php';
$email = $_POST['email'];
$data_email = $pelanggan->ambil_pelanggan_email($email);
echo $data_email;
?>
