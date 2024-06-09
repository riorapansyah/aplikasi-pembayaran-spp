<?php 
include('auth.php');
$koneksi = require('koneksi.php');
?>

<body>
    <div class="p-5">
        <div class="row">
            <div class="bg-white p-3 rounded-4 shadow-sm">
                <div class="align-items-center p-3">
                    <form action="" method="GET" class="row">
                        <div class="mb-3 col-4"></div>
                        <div class="mb-3 col-4">
                            <input type="number" name="nisn" value="" class="form-control" placeholder="NISN Siswa">
                        </div>
                        <div class="mb-3 col-4">
                           <button class="btn btn-success">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="">
                    <?php
                    if (isset($_GET['nisn']) && $_GET['nisn'] != '') {
                        $query ="SELECT p.*, s.nama FROM pembayaran p JOIN siswa s ON p.nisn = s.nisn WHERE p.nisn='$_GET[nisn]'";
                        $raw = $koneksi->query($query);
                        $data = $raw->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <h3 class="p-2 fw-bold">History Pembayaran :</h3>
                        <h4 class="p-2 fw-bold"><?= $data['nama']; ?></h4>
                        <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th scope="col">ID PETUGAS</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">TANGGAL BAYAR</th>
                                        <th scope="col">BULAN BAYAR</th>
                                        <th scope="col">TAHUN BAYAR</th>
                                        <th scope="col">ID SPP</th>
                                        <th scope="col">JUMLAH</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM pembayaran WHERE nisn='$data[nisn]' ORDER BY bulan_dibayar ASC";
                                        $detail = $koneksi->query($query);
                                        while ($d = $detail->fetch(PDO::FETCH_ASSOC)) {
                                            echo " <tr>
                                                    <td>$d[id_petugas]</td>
                                                    <td>$d[nisn]</td>
                                                    <td>$d[tgl_bayar]</td>
                                                    <td>$d[bulan_dibayar]</td>
                                                    <td>$d[tahun_dibayar]</td>
                                                    <td>$d[id_spp]</td>
                                                    <td>$d[jumlah_bayar]</td>
                                                </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
