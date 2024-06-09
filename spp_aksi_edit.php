<?php 
$koneksi = require('koneksi.php');

$query =  "UPDATE spp SET tahun = :tahun, nominal = :nominal WHERE id_spp";
$update = $koneksi->prepare($query);
$update->bindParam(':tahun', $_POST['tahun']);
$update->bindParam(':nominal', $_POST['nominal']);
$update->bindParam(':id_spp', $_POST['id_spp']);

if($update->execute()){
    echo "<script>alert('berhasil mengedit data siswa'); document.location.href = 'spp_halaman.php';</script>";
}
?>