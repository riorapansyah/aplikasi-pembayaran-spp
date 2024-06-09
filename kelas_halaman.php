<?php 
include("auth.php");
$koneksi = require("koneksi.php");
$kelasRaw = "SELECT *FROM kelas";
$kelasData = $koneksi->query($kelasRaw);
$kelas = $kelasData->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 shadow-sm table-responsive-sm p-4">
            <div class="d-flex justify-content-end p-2">
                <div class="">
                    <a href="kelas_tambah.php" class="btn btn-primary fw-bold">Tambah Kelas <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">ID Kelas</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Kompetensi Keahlian</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $data) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $data["id_kelas"]; ?></td>
                            <td><?= $data["nama_kelas"]; ?></td>
                            <td><?= $data["kompetensi_keahlian"]; ?></td>
                            <td>
                                <a href="kelas_edit.php?id=<?= $data["id_kelas"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="kelas_hapus.php?id=<?= $data["id_kelas"]; ?>" onclick="return confirm('Data Siswa Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>