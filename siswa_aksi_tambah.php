<?php

$koneksi = require('koneksi.php');
       
function proses_tambah_siswa($data){
    global $koneksi;

    $query = "INSERT INTO siswa VALUES (:nisn, :nis, :nama, :id_kelas, :alamat, :no_telp, :id_spp)";
    $result = $koneksi->prepare($query);
    $result->execute([
        ':nisn' => $data['nisn'],
        ':nis' => $data['nis'],
        ':nama' => $data['nama'],
        ':id_kelas' => $data['id_kelas'],
        ':alamat' => $data['alamat'],
        ':no_telp' => $data['no_telp'],
        ':id_spp' => $data['id_spp'],
    ]);

    if(!$result){
       echo "<script>
                alert('data gagal ditambah!');
            </script>";
    } else {
        echo "<script>
                alert('data berhasil ditambah!');
                document.location.href = 'siswa_halaman.php';
             </script>";
    }
}

?>