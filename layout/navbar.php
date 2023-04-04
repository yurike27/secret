<?php
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Printer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/home.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Yurike Printer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php"><i
                            class="fa-solid fa-house me-2"></i>Home</a>
                    <a class="nav-link" href="keranjang.php"><i class="fa-solid fa-cart-shopping me-2"></i>Keranjang</a>
                    <?php if (isset($_SESSION["username"])) : ?>
                    <a class="nav-link" href="#"><?= $_SESSION["nama_lengkap"];?></a>
                    <a class="nav-link" href="logout.php">logout</a>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION["username"])) : ?>
                    <a class="nav-link" href="login/index.php"><i
                            class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>