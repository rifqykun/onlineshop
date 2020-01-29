<?php 
session_destroy();
echo "<div class='alert alert-info'>Anda telah Logout</div>";
echo "<meta http-equiv='refresh' content='1;url=../login.php'>";
?>