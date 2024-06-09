<?php
require 'siswa_aksi_tambah.php';
$koneksi = require('koneksi.php');
include('auth.php');

if (isset($_POST["tambah_siswa"])) {
    proses_tambah_siswa($_POST); 
}
?>

<body>
    <div class="container-fluid p-5 bg-light">
        <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
            <div class="col-md-12">
                <div class="p-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Tambah Siswa</h3>
                    </div>
                    <div class="">
                        <a href="siswa_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="m-2">NISN</label>
                        <input type="number" name="nisn" class="form-control" placeholder="Masukkan Nisn Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">NIS</label>
                        <input type="number" name="nis" id="" class="form-control" placeholder="masukkan Nis Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Nama Siswa</label>
                        <input type="text" name="nama" id="" class="form-control" placeholder="masukkan nama siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Kelas</label>
                        <select class="form-select" aria-label="Default select example" name="id_kelas">
                            <option selected>Pilih Kelas</option>
                            <?php 
                                  $kelasRaw = 'SELECT * FROM kelas' ;
                                  $kelasData = $koneksi->query($kelasRaw);
                                  $kelas = $kelasData->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <?php foreach ($kelas as $d) : ?>
                                <option value="<?= $d['id_kelas'] ?>"><?= $d['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Alamat</label>
                        <input type="text" name="alamat" id="" class="form-control" placeholder="masukkan alamat siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">No Telpon</label>
                        <input type="number" name="no_telp" id="" class="form-control" placeholder="masukkan No telp siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">SPP Pertahun</label>
                        <select class="form-select" aria-label="Default select example" name="id_spp">
                            <option selected>Pilih Tahun</option>
                            <?php 
                                $sppRaw = 'SELECT * FROM spp';
                                $sppData = $koneksi->query($sppRaw);
                                $spp = $sppData->fetchAll(PDO::FETCH_ASSOC)
                            ?>
                            <?php foreach ($spp as $d) : ?>
                                <?php
                                    $angka = $d['nominal'];
                                    $format_rupiah = number_format($angka, 0, ',', '.');
                                ?>
                                <option value="<?= $d['id_spp'] ?>"><?= $d['tahun'] ?> - <?php  echo 'Rp.' . $format_rupiah?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex gap-3 justify-content-center" name="tambah_siswa">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>