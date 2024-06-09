<?php 
include("auth.php");
$koneksi = require('koneksi.php');
$sppRaw = "SELECT * FROM spp";
$sppdata = $koneksi->query($sppRaw);
$spp = $sppdata->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-3 table-responsive-sm p-4 shadow-sm">
            <div class="d-flex justify-content-end p-2">
                <div class="">
                    <a href="spp_tambah.php" class="btn btn-primary fw-bold">Tambah Spp <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">ID SPP</th>
                        <th scope="col">TAHUN</th>
                        <th scope="col">NOMINAL</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spp as $data) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $data["id_spp"]; ?></td>
                            <td><?= $data["tahun"]; ?></td>
                            <?php
                                $angka = $data['nominal'];
                                $format_rupiah = number_format($angka, 0, ',', '.');
                            ?>
                            <td><?php echo "<b> Rp. </b>".$format_rupiah; ?></td>
                            <td>
                                <a href="spp_edit.php?id=<?= $data["id_spp"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="spp_hapus.php?id=<?= $data["id_spp"]; ?>" onclick="return confirm('Data Siswa Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>