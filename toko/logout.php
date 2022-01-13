<?php
session_start();
//menghancurkan $_session['pelangan']
session_destroy();
echo "<script> alert('anda telah berhasil logout')</script>";
echo "<script>location='produk.php';</script>";

?>