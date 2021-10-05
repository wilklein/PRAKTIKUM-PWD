<?php
echo "<head><title>My Guest Book</head></title>";
$fp = fopen("guestbook.txt","a+"); 
fputs($fp,"$nama|$alamat|$email|$status|$komentar"); 
fclose($fp);
echo "Terima Kasih Atas Partisipasi Anda Mengisi Buku Tamu<br>"; echo "<a href=tampilan.php> Isi Buku Tamu </a><br>";
echo "<a href=lihat.php> Lihat Buku Tamu </a><br>";
?>
