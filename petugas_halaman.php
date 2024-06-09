<?php
include('auth.php');
$koneksi = require('koneksi.php');
$petugasRaw = "SELECT *  FROM petugas";
$petugasData = $koneksi->query($petugasRaw);
$petugas = $petugasData->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-2 table-responsive-sm p-4  shadow-sm">
            <div class="d-flex justify-content-end mb-2">
                <div class="">
                    <a href="petugas_tambah.php" class="btn btn-primary fw-bold">Tambah Petugas <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <Table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">ID PETUGAS</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">NAMA PETUGAS</th>
                        <th scope="col">LEVEL</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <Tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($petugas as $data) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $data["id_petugas"]; ?></td>
                            <td><?= $data["username"]; ?></td>
                            <td><?= $data["nama_petugas"]; ?></td>
                            <td><?= $data["level"]; ?></td>
                            <td>
                                <a href="petugas_edit.php?id=<?= $data["id_petugas"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="petugas_hapus.php?id=<?= $data["id_petugas"]; ?>" onclick="return confirm('Data Petugas Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </Tbody>
            </Table>
        </div>
    </div>
</body>