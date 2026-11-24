<?php
// 1. Daftar 6 halaman utama yang valid
$daftar_halaman = ['home', 'about', 'menu', 'gallery', 'custom', 'credit'];

// 2. Tangkap ?page= dari URL (jika kosong, otomatis ke 'home')
$page = (isset($_GET['page']) && in_array($_GET['page'], $daftar_halaman)) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($page) ?> - Café Ruri</title>
    <!-- Font, Bootstrap 5 & Custom CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600&family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- NAVBAR (6 Menu Utama) -->
    <nav class="navbar navbar-expand-lg sticky-top ruri-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php?page=home">
                <img src="assets/img/logo cafe.svg" alt="Café Ruri" class="ruri-logo">
            </a>

            <div class="d-flex gap-2 order-lg-3">
                <button class="btn btn-ruri-sand rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-bag-fill"></i> Belanja (<span id="cartCount">0</span>)
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse order-lg-2" id="navMenu">
                <ul class="navbar-nav mx-auto gap-lg-1">
                    <li class="nav-item"><a class="nav-link <?= ($page == 'home') ? 'active' : '' ?>" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($page == 'about') ? 'active' : '' ?>" href="index.php?page=about">About</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($page == 'menu') ? 'active' : '' ?>" href="index.php?page=menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($page == 'gallery') ? 'active' : '' ?>" href="index.php?page=gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($page == 'custom') ? 'active' : '' ?>" href="index.php?page=custom">Custom Drink</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($page == 'credit') ? 'active' : '' ?>" href="index.php?page=credit">Credit</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA (Memanggil file pages.php) -->
    <main class="container py-4 flex-grow-1">
        <?php include 'pages.php'; ?>
    </main>

    <!-- FOOTER -->
    <footer class="ruri-footer text-center py-4 mt-5">
        <div class="container">
            <h5 class="font-title mb-1">Café Ruri</h5>
            <p class="small mb-1">Jl. Tanjung Duren Raya No. 42, Jakarta Barat &bull; Buka 08.00 – 22.00 WIB</p>
            <small>&copy; <?= date('Y') ?> Café Ruri — Reynard Liu</small>
        </div>
    </footer>

    <!-- MODAL KERANJANG -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ruri-card">
                <div class="modal-header">
                    <h5 class="modal-title font-title">Keranjang Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="cartList"></div>
                <div class="modal-footer justify-content-between">
                    <strong class="fs-5">Total: <span id="cartTotal">Rp 0</span></strong>
                    <button type="button" id="btnCheckout" class="btn btn-ruri">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>