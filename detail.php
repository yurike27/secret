<?php

include 'layout/navbar.php';

$id = $_GET['id'];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

?>
<div id="detail" class="container my-5">
    <form action="" method="POST">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <img src="image/<?= $produk["foto"]; ?>" class="w-100">
            </div>
            <div class="col-md-5">
                <div class="detail container">
                    <h1><?= $produk["nama_produk"]; ?></h1>
                    <h4>Rp. <?= number_format($produk['harga'],0,',','.')?></h4>
                    <div class="text-secondary">Tersisa <?= $produk["stok"]; ?> barang</div>
                    <div><?= $produk["deskripsi"]; ?></div>
                    <div class="mt-5">
                        <label for="qty" class="form-label">Masukan Jumlah Produk yang mau dibeli</label>
                        <input class="form-control" type="number" name="qty" id="qty" placeholder="0 Barang">
                    </div>

                    <div class="mt-2"><button class="btn btn-success" type="submit" name="beli"><i
                                class="fa-solid fa-basket-shopping me-2"></i>Masukan Ke Dalam Keranjang!</button></div>
                </div>
    </form>
    <?php

if(isset($_POST["beli"])){
    $qty = $_POST['qty'];
    $_SESSION["cart"][$id] = $qty;

    echo "
    <script type='text/javascript'>
        alert('Produk berhasil ditambahkan ke keranjang belanja')
        window.location = 'keranjang.php'
    </script>
    ";
}
?>
    <? include 'layout/footer.php';
?>