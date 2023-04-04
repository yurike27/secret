<?php

session_start();

$id = $_GET['id'];
unset($_SESSION["cart"][$id]);

echo"
<script type='text/javascript'>
alert('Produk telah di Hapus');
window.location = 'keranjang.php'
</script>";
?>