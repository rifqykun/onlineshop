<?php 
include 'config/class.php';
session_destroy();
echo "<script>alert('Anda telah Logout'); location='utama.php';</script>";
 ?>