<?php include 'layout/navbar.php';
$produk = query("SELECT * FROM produk");

?>
<div id="home" class="produk container">
    <div id="carouselHome" class="mt-4 carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="assets/images/baner1.jpg" class="d-block w-100" alt="banner 1">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/Banner2.jpeg" class="d-block w-100" alt="banner 2">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/Banner3.jpeg" class="d-block w-100" alt="banner 3">
            </div>
        </div>
    </div>
    <h2 class="my-3">Produk Yang Tersedia</h2>
    <div class="row">
        <?php $i = 1; ?>
        <?php foreach($produk as $data) : ?>
        <div class="col-md-3 mb-3">
            <div class="card" ">
                <img src=" image/<?= $data["foto"]; ?>" class="card-img-top" alt="<?= $data['nama_produk']?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['nama_produk']?></h5>
                    <p class="card-text"><?= $data['deskripsi']?></p>
                    <hr>
                    <h6 class="card-text">Rp. <?= number_format($data['harga'],0,',','.')?></h6>
                    <p class="text-secondary">Tersisa <?= $data['stok']?> Barang</p>
                    <a href="detail.php?id=<?= $data["id_produk"]; ?>" class="btn btn-success"><i
                            class="fa-solid fa-basket-shopping me-2"></i>Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</div>
<?php include 'layout/footer.php';?>