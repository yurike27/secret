<?php 
require 'functions.php';

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$transaksi = query("SELECT * FROM transaksi WHERE status = 'proses'");
$tolak = query("SELECT * FROM transaksi WHERE status = 'ditolak'");
$verifikasi = query("SELECT * FROM transaksi WHERE status = 'terverifikasi'");

?>

<?php require '../layout/sidebar.php'; ?>

<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content">
        <h1>Data Transaksi</h1>
        <hr>
        <h3>Proses Request</h3>
        <table class="table table-responsive table-hover mb-5">
            <tr>
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pemesanan</th>
                <th>Alamat</th>
                <th>No Wa</th>
                <th>Produk Yang di Pesan</th>
                <th>Total Harga</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($transaksi as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tanggal_transaksi"]; ?></td>
                <td><?= $data["nama_lengkap"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><?= $data["nomor_whatsapp"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= $data["subtotal"]; ?></td>
                <td><img src="../image/<?= $data["foto_produk"]; ?>" alt="" width="70"></td>
                <td><?= $data["status"]; ?></td>
                <td>
                    <a class="text-success me-2" href="verifikasi.php?id=<?= $data["id_transaksi"]; ?>"
                        onclick="return confirm('Apakah anda yakin ingin verifikasi pesanan?');"><i
                            class="fa-solid fa-check"></i></a>
                    <a class="text-danger" href="tolak.php?id=<?= $data["id_transaksi"]; ?>"
                        onclick="return confirm('Apakah anda yakin ingin menolak pesanan?');"><i
                            class="fa-solid fa-xmark"></i></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <br>
        <h3>Produk Selesai Diverifikasi</h3>
        <table class="table table-responsive table-hover md-5">
            <tr>
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pemesanan</th>
                <th>Alamat</th>
                <th>No Wa</th>
                <th>Produk Yang di Pesan</th>
                <th>Total Harga</th>
                <th>Foto</th>
                <th>Status</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($verifikasi as $data_1) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data_1["tanggal_transaksi"]; ?></td>
                <td><?= $data_1["nama_lengkap"]; ?></td>
                <td><?= $data_1["alamat"]; ?></td>
                <td><?= $data_1["nomor_whatsapp"]; ?></td>
                <td><?= $data_1["nama_produk"]; ?></td>
                <td><?= $data_1["subtotal"]; ?></td>
                <td><img src="../image/<?= $data_1["foto_produk"]; ?>" alt="" width="70"></td>
                <td><?= $data_1["status"]; ?></td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <br>

        <h3>Produk Selesai Ditolak</h3>
        <table class="table table-responsive table-hover mb-5">
            <tr>
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pemesanan</th>
                <th>Alamat</th>
                <th>No Wa</th>
                <th>Produk Yang di Pesan</th>
                <th>Total Harga</th>
                <th>Foto</th>
                <th>Status</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($tolak as $data_2) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data_2["tanggal_transaksi"]; ?></td>
                <td><?= $data_2["nama_lengkap"]; ?></td>
                <td><?= $data_2["alamat"]; ?></td>
                <td><?= $data_2["nomor_whatsapp"]; ?></td>
                <td><?= $data_2["nama_produk"]; ?></td>
                <td><?= $data_2["subtotal"]; ?></td>
                <td><img src="../image/<?= $data_2["foto_produk"]; ?>" alt="" width="70"></td>
                <td><?= $data_2["status"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require '../layout/footer-admin.php'; ?>