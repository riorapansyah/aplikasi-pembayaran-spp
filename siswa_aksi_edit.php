<?php 
    $koneksi = require 'koneksi.php';

    $query = "UPDATE siswa SET nama = :nama, nis = :nis, id_kelas = :id_kelas, alamat = :alamat, no_telp = :no_telp, id_spp = :id_spp WHERE nisn = :nisn";
    $update = $koneksi->prepare($query);
    $update->bindParam(':nama', $_POST['nama']);
    $update->bindParam(':nis', $_POST['nis']);
    $update->bindParam(':id_kelas', $_POST['id_kelas']);
    $update->bindParam(':alamat', $_POST['alamat']);
    $update->bindParam(':no_telp', $_POST['no_telp']);
    $update->bindParam(':id_spp', $_POST['id_spp']);
    $update->bindParam(':nisn', $_POST['nisn'], PDO::PARAM_INT);
    
    
    if($update->execute()){
        echo "<script>alert('Berhasil Mengedit data siswa');document.location.href= 'siswa_halaman.php'</script>";
    } else{
        echo "<script>alert('Gagal Mengedit Data')</script>";
    }
 
?>