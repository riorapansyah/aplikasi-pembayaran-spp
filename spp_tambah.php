<?php 
include('auth.php');
$koneksi = require('koneksi.php');

if (isset($_POST["tambah_spp"])) {
    proses_tambah_spp($_POST);
}
function proses_tambah_spp($data){
    global $koneksi;

    $query = "INSERT INTO spp VALUES ( null, :tahun, :nominal)";
    $send = $koneksi->prepare($query);
    $send->execute([
         ':tahun' => $data['tahun'],
         ':nominal' => $data['nominal']
    ]);

    if(!$send){
        echo "<script>console.log('Data Spp Berhasil Di Tambah');</script";
    } else{
        echo "<script>console.log('Data Spp Berhasil Di Tambah');document.location.href = 'spp_halaman.php';</script>";
    }
}
?>

<body>
<div class="container-fluid p-5 bg-light h-100">
        <div class="row justify-content-center shadow rounded-4 p-2 bg-white shadow-sm">
            <div class="col-md-12">
                <div class="p-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Tambah Spp</h3>
                    </div>
                    <div class="">
                        <a href="spp_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="m-2">Tahun</label>
                        <input type="number" name="tahun" class="form-control" placeholder="Tahun">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Nominal</label>
                        <input type="number" name="nominal" id="" class="form-control" placeholder="Masukkan Nominal Spp">
                    </div>
                    <button type="submit" class="btn btn-primary d-flex gap-3 justify-content-center" name="tambah_spp">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>