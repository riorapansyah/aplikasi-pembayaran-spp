<?php 
include('auth.php');
$koneksi = require('koneksi.php');

if (isset($_POST["tambah_kelas"])) {
    proses_tambah_kelas($_POST);
}
function proses_tambah_kelas($data){
    global $koneksi;

    $query = "INSERT INTO kelas VALUES ( null, :nama_kelas, :kompetensi_keahlian)";
    $kelas = $koneksi->prepare($query);
    $kelas->execute([
        ':nama_kelas' => $data['nama_kelas'],
        ':kompetensi_keahlian' => $data['kompetensi_keahlian'],
    ]);

    if(!$kelas){
        echo "<script>
                alert('Data Kelas Gagal Ditambah!');
            </script>";
    } else {
        echo "<script>
                alert('Data Kelas Berhasil Ditambah!');
                document.location.href = 'kelas_halaman.php';
            </script>";
    }
}
?>

<body>
    <div class="container-fluid p-5 h-100">
        <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
            <div class="col-md-12">
                <div class="p-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Tambah Kelas</h3>
                    </div>
                    <div class="">
                        <a href="kelas_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="m-2">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan Nama Kelas">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Kompetensi Keahlian</label>
                        <input type="text" name="kompetensi_keahlian" id="" class="form-control" placeholder="@example Rekayasa Perangkat Lunak">
                    </div>
                    <button type="submit" class="btn btn-primary d-flex gap-3 justify-content-center" name="tambah_kelas">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>