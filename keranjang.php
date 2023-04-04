<?php
include 'layout/navbar.php';
?>

<?php
if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))){
    echo"
    <script type='text/javascript'>
    alert('keranjang anda masi kosong,silahkan belanja terlebih dahulu');
    window.location = 'index.php'
    </script>
    ";
}
?>
<div class="produk container my-2 mb-2">
    <h2>Produk Yang Tersedia</h2>
    <table class="table table-responsive table-hover my-3">
        <tr>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total Harga</th>
            <th>Aksi</th>

        </tr>
        <?php $grandTotal = 0; ?>
        <?php foreach($_SESSION["cart"] as $id_produk => $kuantitas) : ?>
        <?php
            $data = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0]; 
            $totalHarga = $data["harga"] * $kuantitas;
            $grandTotal += $totalHarga;
        ?>
        <tr>
            <td><img src="image/<?= $data["foto"]; ?>" alt="" width="100"></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td>Rp. <?= number_format($data["harga"],0,',','.');  ?></td>
            <td><?= $kuantitas; ?></td>
            <td>Rp. <?= number_format(($totalHarga),0,',','.'); ?></td>
            <td><a class="text-primary me-2" href="editkeranjang.php?id=<?= $data["id_produk"]; ?>"><i
                        class="fa-solid fa-pen"></i></a>
                <a class="text-danger" href="hapuskeranjang.php?id=<?= $data["id_produk"]; ?>"
                    onclick="return confirm('Apakah anda yakin ingin menghapus produk ini dari keranjang?')"><i
                        class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6">
                <h4>Total Yang Harus di Bayar</h4>
                <p>Rp. <?= number_format(($grandTotal),0,',','.'); ?></p>
            </td>
        </tr>
        <tr>
            <a class="btn btn-purple my-2" href="checkout.php">Checkout</a>
        </tr>
    </table>
</div>
<?php include 'layout/footer.php'; ?>