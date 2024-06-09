<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-warning shadow-sm">
    <div class="container-fluid">
        <div class="rounded-5">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'index.php') ? 'active fw-bold' : ''; ?>" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'siswa_halaman.php') ? 'active fw-bold' : ''; ?>" href="siswa_halaman.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'petugas_halaman.php') ? 'active fw-bold' : ''; ?>" href="petugas_halaman.php">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'spp_halaman.php') ? 'active fw-bold' : ''; ?>" href="spp_halaman.php">Spp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'kelas_halaman.php') ? 'active fw-bold' : ''; ?>" href="kelas_halaman.php">Kelas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($currentPage == 'pembayaran_tambah.php' || $currentPage == 'history_pembayaran.php' || $currentPage == 'laporan_transaksi.php') ? 'active fw-bold' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?= ($currentPage == 'pembayaran_tambah.php') ? 'active' : ''; ?>" href="pembayaran_tambah.php">Pembayaran SPP</a></li>
                            <li><a class="dropdown-item <?= ($currentPage == 'history_pembayaran.php') ? 'active' : ''; ?>" href="history_pembayaran.php">History Pembayaran</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= ($currentPage == 'laporan_transaksi.php') ? 'active' : ''; ?>" href="laporan_transaksi.php">Laporan Transaksi</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 bg-white d-flex justify-content-center align-items-center" style="border-radius: 50%;height: 40px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"><?php echo $_SESSION['login_user']; ?> - <?php echo $_SESSION['level']; ?></a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item text-danger" href="logout_halaman.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php endif ?>

            <?php if ($_SESSION['level'] == 'petugas') : ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'index.php') ? 'active fw-bold' : ''; ?>" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($currentPage == 'pembayaran_tambah.php' || $currentPage == 'history_pembayaran.php' || $currentPage == 'laporan_transaksi.php') ? 'active fw-bold' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?= ($currentPage == 'pembayaran_tambah.php') ? 'active' : ''; ?>" href="pembayaran_tambah.php">Pembayaran SPP</a></li>
                            <li><a class="dropdown-item <?= ($currentPage == 'history_pembayaran.php') ? 'active' : ''; ?>" href="history_pembayaran.php">History Pembayaran</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= ($currentPage == 'laporan_transaksi.php') ? 'active' : ''; ?>" href="laporan_transaksi.php">Laporan Transaksi</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 bg-white d-flex justify-content-center align-items-center" style="border-radius: 50%;height: 40px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"><?php echo $_SESSION['login_user']; ?> - <?php echo $_SESSION['level']; ?></a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item text-danger" href="logout_halaman.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php endif ?>

            <?php if ($_SESSION['level'] == 'siswa') : ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'index.php') ? 'active fw-bold' : ''; ?>" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($currentPage == 'pembayaran_tambah.php' || $currentPage == 'history_pembayaran.php' || $currentPage == 'laporan_transaksi.php') ? 'active fw-bold' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?= ($currentPage == 'history_pembayaran.php') ? 'active' : ''; ?>" href="history_pembayaran.php">History Pembayaran</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 bg-white d-flex justify-content-center align-items-center" style="border-radius: 50%;height: 40px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"><?php echo $_SESSION['login_user']; ?> - <?php echo $_SESSION['level']; ?></a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item text-danger" href="logout_halaman.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</nav>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
