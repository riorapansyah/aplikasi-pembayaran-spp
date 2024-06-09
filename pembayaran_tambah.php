<?php 
include('auth.php');
$koneksi = require('koneksi.php');

if (isset($_POST["transaksi"])) {
    proses_transaksi($_POST);
}
function proses_transaksi($data){
    global $koneksi;

    $query = "INSERT INTO pembayaran VALUES (null, :id_petugas, :nisn, :tgl_bayar, :bulan_bayar, :tahun_bayar, :id_spp, :jumlah_bayar)";
    $pay = $koneksi->prepare($query);
    $pay->execute([
        ':id_petugas'    => $data['id_petugas'],
        ':nisn'          => $data['nisn'],
        ':tgl_bayar'     => $data['tgl_bayar'],
        ':bulan_bayar'   => $data['bulan_bayar'],
        ':tahun_bayar'   => $data['tahun_bayar'],
        ':id_spp'        => $data['id_spp'],
        ':jumlah_bayar'  => $data['jumlah_bayar'],
    ]);
    
    if(!$pay){
        echo "<script>
        alert('gagal menambahkan data pembayaran!!');
        </script>";
    } else {
        echo "<script>
        alert('berhasil menambahkan data pembayaran!!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<body>
    <div class="container-fluid p-5">
        <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
            <div class="col-md-12">
                <div class="m-3 d-flex justify-content-between justify">
                    <div class="">
                        <h3 class="fw-bold">Pembayaran SPP</h3>
                    </div>
                    <div class="">
                        <a href="siswa_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="m-2">ID Petugas</label>
                        <input type="number" name="id_petugas" value="" class="form-control" placeholder="ID Petugas Pembayaran">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">NISN</label>
                        <input type="number" class="form-control" name="nisn" required="" value="" placeholder="Masukan NISN Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Tanggal Bayar</label>
                        <input type="date" class="form-control" name="tgl_bayar" required="" value="">
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Bulan Bayar</label>
                        <select class="form-select" aria-label="Default select example" name="bulan_bayar">
                            <option selected>Open this select month</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Tahun Bayar</label>
                        <?php 
                            $raw = "SELECT * FROM spp";
                            $data = $koneksi->query($raw);
                            $spp = $data->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <select class="form-select" aria-label="Default select example" name="tahun_bayar">
                            <option selected>Open this select year</option>
                            <?php foreach ($spp as $d) : ?>
                                <option value="<?= $d['tahun']; ?>"><?= $d['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="m-2">ID Spp</label>
                        <select class="form-select" aria-label="Default select example" name="id_spp">
                            <option selected>Open this select year</option>
                            <?php foreach ($spp as $d) : ?>
                                <option value="<?= $d['id_spp']; ?>"><?= $d['id_spp']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="m-2">Jumlah Bayar</label>
                        <input type="number" class="form-control" name="jumlah_bayar" required="" value="" placeholder="Masukkan Nominal Bayar">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary" name="transaksi">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>