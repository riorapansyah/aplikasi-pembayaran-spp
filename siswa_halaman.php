<?php
    include('auth.php');
    $koneksi = require('koneksi.php');

    $sql = "SELECT * FROM siswa";
    $stmt = $koneksi->query($sql); 
    $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['search']) && $_GET['search'] != '') {
        $search = $_GET['search'];
        $sql = "SELECT * FROM siswa WHERE nisn='$search' OR nama LIKE '%$search%'";
    }

    $stmt = $koneksi->query($sql);
    $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 table-responsive-sm p-4 shadow-sm">
            <div class="d-flex justify-content-between p-2">
                <form class="row row-cols-lg-auto g-3 align-items-center" method="GET" action="">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Cari NISN atau Nama Siswa">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass" style="font-size: 21px;"></i></button>
                    </div>
                </form>
                <div class="">
                    <a href="siswa_tambah.php" class="btn btn-primary fw-bold">Tambah Siswa <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">NISN</th>
                        <th scope="col">NIS</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">KONTAK</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $data) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $data["nisn"]; ?></td>
                            <td><?= $data["nis"]; ?></td>
                            <td><?= $data["nama"]; ?></td>
                            <td><?= $data["alamat"]; ?></td>
                            <td><?= $data["no_telp"]; ?></td>
                            <td>
                                <a href="siswa_edit.php?id=<?= $data["nisn"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="siswa_hapus.php?nisn=<?= $data["nisn"]; ?>" onclick="return confirm('Data Siswa Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
