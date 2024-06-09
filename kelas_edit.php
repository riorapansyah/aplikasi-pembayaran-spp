<?php 
include("auth.php");
$koneksi = require('koneksi.php');
?>

<body>
    <div class="container-fluid p-5 bg-light h-100">
        <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
            <div class="col-md-12">
                <div class="p-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Edit Kelas</h3>
                    </div>
                    <div class="">
                        <a href="kelas_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form method="post" action="kelas_aksi_edit.php">
                    <?php
                        $raw = "SELECT * FROM kelas WHERE id_kelas = " . $_GET['id'];
                        $data = $koneksi->query($raw);
                        while ($d = $data->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="mb-3">
                            <label>Nama Kelas</label>
                            <input type="hidden" name="id_kelas" id="" value="<?php echo $d['id_kelas']; ?>">
                            <input type="text" class="form-control" name="nama_kelas" required="" value="<?php echo $d['nama_kelas']; ?>" placeholder="Masukkan Nama Kelas">
                        </div>
                        <div class="mb-3">
                            <label>Kompetensi Keahlian</label>
                            <input type="text" class="form-control" name="kompetensi_keahlian" required="" value="<?php echo $d['kompetensi_keahlian']; ?>" placeholder="Masukan Kompetensi Keahlian">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>