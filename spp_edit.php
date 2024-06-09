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
                        <h3 class="fw-bold">Edit SPP</h3>
                    </div>
                    <div class="">
                        <a href="spp_halaman.php" class="btn btn-primary">
                            <i class="fa fa-chevron-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <form method="post" action="spp_aksi_edit.php">
                    <?php
                        $dataRaw ="SELECT * FROM spp WHERE id_spp = " . $_GET['id'];
                        $dataSpp = $koneksi->query($dataRaw);
                        while ($d = $dataSpp->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div>
                            <input type="hidden" name="id_spp" value="<?php echo $d['id_spp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>Tahun</label>
                            <input type="number" class="form-control" name="tahun" required="" value="<?php echo $d["tahun"]; ?>" placeholder="nis">
                        </div>
                        <div class="mb-3">
                            <label>Nominal</label>
                            <input type="text" class="form-control" name="nominal" required="" value="<?php echo $d['nominal']; ?>" placeholder="Masukan email anda">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>

                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>